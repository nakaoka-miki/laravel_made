<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
use App\Blog;
use App\Favorite;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role == 1){
            return redirect()->route('user.top');
        }elseif(Auth::user()->role == 2){
            return redirect()->route('admin.top');
        }
    }

    public function Profile(){
        if(Auth::user()->role == 1){
            return redirect()->route('user.profile');
        }elseif(Auth::user()->role == 2){
            return redirect()->route('admin.profile');
        }
    }
}
