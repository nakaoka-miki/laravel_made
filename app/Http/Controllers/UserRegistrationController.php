<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
use App\Blog;
use App\Favorite;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateData;
use App\Http\Requests\profile;
use GuzzleHttp\Client;


class UserRegistrationController extends Controller
{

    // TOPページ表示
    public function userindex(Request $request){
        //ブログ表示
        $notice = new Notice;
        $allnotice = $notice->all()->toArray();

        //検索表示
        $keyword = $request->input('keyword');
        $query = Blog::query();
        if (!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('comment', 'LIKE', "%{$keyword}%");
        }
        $blogs = $query->latest( 'created_at' )->paginate(5);

        //天気予報表示
        $cityName = 'Tokyo';
        $apiKey = '';
        $url = "http://api.openweathermap.org/data/2.5/forecast?units=metric&lang=ja&q=$cityName&cnt=1&units=metric&appid=$apiKey";
        $method = "GET";
        $client = new Client();
        $response = $client->request($method, $url);
        $datas = $response->getBody();
        $datas = json_decode($datas, true);
        
        return view('user/user_top',[
            'allnotices' => $allnotice,
            'blogs' => $blogs,
            'datas' => $datas,
        ]);
    }


    // ユーザーお知らせ詳細
    public function detailNotice(int $noticeId){
        $notice = new Notice;
        $onenotice = $notice->find($noticeId);
        
        return view('notice/notice_detail',[
            'onenotice' => $onenotice,
        ]);
    }


    // プロフィール表示
    public function userProfile(){
        $Profile = Auth::user();
        
        return view('user/user_profile',[
            'profile' => $Profile,
        ]);
    }

    // プロフィール編集（表示）
    public function editUserForm(User $user){

        return view('user/user_edit',[
            'user' =>$user,
        ]);
    }

    // プロフィール編集（登録）
    public function editUser(User $user, profile $request){
        $columns = ['name','nickname','birthday', 'gender', 'tel', 'email'];
        foreach($columns as $column){
            $user->$column = $request->$column;
        }
        
        $user->save();
        
        return redirect('/user_profile');
    }

    // プロフィール画像編集（登録）
    public function editImage(Request $request){
        $path = $request->img->store('public');
        $filename = basename($path);
        $user = Auth::user();
        $user->img = $filename;
        
        $user->save();

        return redirect('/user_profile');
    }

    // プロフィール画像削除
    public function deleteImage(Request $request){
        $user = Auth::user();
        $img = 'notfound.png';

        $user->img = $img;
        $user->save();

        return redirect('/user_profile');
    }

    // 自分の投稿一覧表示
    public function showBlog(){
        $blogs = Auth::user()->blog()->get();
        return view('blog/blog',[
            'blogs' => $blogs,
        ]);
    }

    // 新規投稿(表示)
    public function createBlogForm(){
    
        return view('blog/blog_create');
    }

    // 新規投稿(データ送信)
    public function createBlog(CreateData $request){
        $blog = new Blog;
        
        $blog->user_id = Auth::id();
        $blog->title = $request->title;
        $blog->region = $request->region;
        $blog->comment = $request->comment;
        $blog->youtubu = $request->youtubu;

        
        $blog->save();
        return redirect('/user_top');
    }

    // 投稿詳細
    public function detailBlog(Blog $blog){
        
        return view('blog/blog_detail',[
            'detailblog' => $blog,
        ]);
    }

    // 投稿編集（表示）
    public function editBlogForm(Blog $blog){
        return view ('blog/blog_edit',[
            'blogs' => $blog,
        ]);
    }
    // 投稿編集（登録）
    public function editBlog(Blog $blog, CreateData $request){
        $columns = ['title','region','comment'];
        foreach($columns as $column){
            $blog->$column = $request->$column;
        }
        
        $blog->save();
        
        return redirect('/blog');
    }

    // 投稿削除
    public function deleteBlog(Blog $Blog){
        $Blog->destroy($Blog['id']);
        
        return redirect('/blog');
    }



}
