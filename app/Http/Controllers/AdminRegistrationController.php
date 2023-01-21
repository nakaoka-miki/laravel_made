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


class AdminRegistrationController extends Controller
{
    //TOPページ表示 
    public function adminindex(){
        $notice = new Notice;
        $allnotice = $notice->all()->toArray();

        return view('admins/admin_top',[
            'allnotices' => $allnotice,
        ]);
    }

    // お知らせ新規投稿（表示）
    public function createNoticeForm(){
        return view('notice/notice_create');
    }

    // お知らせ新規投稿(データ送信)
    public function createNotice(CreateData $request){
        $notice = new Notice;
        
        $notice->title = $request->title;
        $notice->comment = $request->comment;
        

        $path = $request->image->store('public');
        $filename = basename($path);
        $notice ->image = $filename;

        $notice->save();
        return redirect('/admin_top');
    }

    // お知らせ詳細
    public function detailAdminNotice(Notice $notice){
        return view('notice/notice_admindetail',[
            'notice' => $notice,
        ]);
    }

    // お知らせ編集（表示）
    public function editNoticeForm(Notice $notice){
        
        return view ('notice/notice_edit', [
            'notices' => $notice,
        ]);
    }

    // お知らせ（編集登録）
    public function editNotice(Notice $notice, CreateData $request){
        $columns = ['title','comment'];
        foreach($columns as $column){
            $notice->$column = $request->$column;
        }
        
        $notice->save();
        
        return redirect('/admin_top');
    }

    // お知らせ削除
    public function deleteNotice(Notice $notice){
        $notice->destroy($notice['id']);
        
        return redirect('/admin_top');
    }

    // プロフィール表示
    public function adminProfile(){
        $Profile = Auth::user();

        return view('admins/admin_profile',[
            'profile' => $Profile,
        ]);
    }

    // プロフィール編集（表示）
    public function editAdminForm(User $user){
        
        return view ('admins/admin_edit_profile', [
            'user' => $user,
        ]);
    }

    // プロフィール編集（登録）
    public function editAdmin(User $user, profile $request){

        $user->name = $request->name;
        $user->birthday = $request->birthday;
        $user->tel = $request->tel;
        $user->email = $request->email;
        
        $user->save();
        return redirect('/admin_top');
    }
    
    
    


}
