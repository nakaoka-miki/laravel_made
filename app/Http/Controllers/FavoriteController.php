<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
use App\Blog;
use App\Favorite;
use App\User;
use Illuminate\Support\Facades\Auth;


class FavoriteController extends Controller
{
    public function ajaxfavorite(Request $request){
        $id = Auth::user()->id;
        $post_id = $request->post_id;
        $favorited = Favorite::where('user_id',$id)->where('post_id',$post_id)->first();

        if(!$favorited){
            $favorite = new Favorite;
            $favorite->post_id = $post_id;
            $favorite->user_id = $id;

            $favorite->save();
        }else{
            Favorite::where('user_id',$id)->where('post_id',$post_id)->delete();
        }
        
        return response()->json();
    }

    // いいね一覧表示
    public function favoriteindex(){
        $user_id = Auth::user()->id;
        $blog = new Blog;
        $favorite = $blog
        ->join('favorites', 'blogs.id', '=', 'favorites.post_id')
        ->where('favorites.user_id', '=', $user_id)
        ->get();

        return view('favorite/favorite')->with([
            'favorites' => $favorite,
        ]);
    }
}
