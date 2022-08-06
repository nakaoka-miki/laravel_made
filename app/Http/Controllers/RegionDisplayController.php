<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Blog;
use App\Favorite;
use Illuminate\Support\Facades\Auth;


class RegionDisplayController extends Controller
{
    // 詳細表示
    public function detailRegion(Blog $blog){
        
        $favorite = Favorite::where('post_id',$blog->id)->where('user_id', Auth::user()->id)->first();
        
        return view('region_blogs/region_detail',compact("blog","favorite"));
    }


    //北海道表示
    public function showHokkaidou(){
        $blog = new Blog;
        $hokkaidou = $blog->where('region', 1 )->get();
        
        return view('region_blogs/hokkaidou',[
            'hokkaidous' => $hokkaidou,
        ]);
    }


    // 東北表示
    public function showTohoku(){
        $blog = new Blog;
        $tohoku = $blog->where('region', 2 )->get();
        
        return view('region_blogs/tohoku',[
            'tohokus' => $tohoku,
        ]);
    }


    // 関東表示
    public function showKantou(){
        $blog = new Blog;
        $kantou = $blog->where('region', 3 )->get();
        
        return view('region_blogs/kantou',[
            'kantous' => $kantou,
        ]);
    }


    // 中部表示
    public function showTyubu(){
        $blog = new Blog;
        $tyubu = $blog->where('region', 4 )->get();
        
        return view('region_blogs/tyubu',[
            'tyubus' => $tyubu,
        ]);
    }


    // 関西表示
    public function showKansai(){
        $blog = new Blog;
        $kansai = $blog->where('region', 5 )->get();
        
        return view('region_blogs/kansai',[
            'kansais' => $kansai,
        ]);
    }


    // 四国表示
    public function showShikoku(){
        $blog = new Blog;
        $shikoku = $blog->where('region', 6 )->get();
        
        return view('region_blogs/shikoku',[
            'shikokus' => $shikoku,
        ]);
    }


    // 中国表示
    public function showTyugoku(){
        $blog = new Blog;
        $tyugoku = $blog->where('region', 7 )->get();
        
        return view('region_blogs/tyugoku',[
            'tyugokus' => $tyugoku,
        ]);
    }


    // 九州表示
    public function showKyusyu(){
        $blog = new Blog;
        $kyusyu = $blog->where('region', 8 )->get();
        
        return view('region_blogs/kyusyu',[
            'kyusyus' => $kyusyu,
        ]);
    }


    // 九州表示
    public function showOkinawa(){
        $blog = new Blog;
        $okinawa = $blog->where('region', 9 )->get();
        
        return view('region_blogs/okinawa',[
            'okinawas' => $okinawa,
        ]);
    }

}
