<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function blog(){
        return $this->belongsTo('App\Blog');
    }

    // いいねされているかの確認
    public function favorite_exist($user){
        return Favorite::where('user_id', '=', $user->id)->where('post_id', '=' ,$this->id);
    }
    
}
