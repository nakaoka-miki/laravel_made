<?php
use App\Http\Controllers\HomeController;

use App\Http\Controllers\UserRegistrationController;
use App\Http\Controllers\AdminRegistrationController;
use App\Http\Controllers\RegionDisplayController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    
    //ログイン後 
    Route::get('/', 'HomeController@index')->name('home');
    // プロフィール遷移
    Route::get('/profile',[HomeController::class, 'Profile'])->name('profile');

    // 一般ユーザー
    Route::group(['middleware' => ['auth', 'can:user-higher']], function () {
        //ここにルートを記述

        // --------------------お気に入り表示--------------------//
        //「ajaxlike.jsファイルのurl:'ルーティング'」に書くものと合わせる。
        Route::post('/ajaxfavorite',[FavoriteController::class,'ajaxfavorite'])->name('posts.ajaxfavorite');
        Route::get('/favotite',[FavoriteController::class, 'favoriteindex'])->name('favorite');


        // // --------------------TOP表示--------------------//
        Route::get('/user_top',[UserRegistrationController::class, 'userindex'])->name('user.top');
        //検索機能
        Route::get('/search', [UserRegistrationController::class, 'getSearch']);

        // --------------------プロフィール表示--------------------//
        // プロフィール表示
        Route::get('/user_profile',[UserRegistrationController::class, 'userProfile'])->name('user.profile');
        // プロフィール編集
        Route::get('/edit_user/{user}', [UserRegistrationController::class, 'editUserForm'])->name('edit.user');
        Route::post('/edit_user/{user}', [UserRegistrationController::class, 'editUser']);

        // --------------------プロフィール画像--------------------//
        // プロフィール画像編集
        Route::post('/edit_image', [UserRegistrationController::class, 'editImage'])->name('edit.image');
        Route::get('/delete_image', [UserRegistrationController::class, 'deleteImage'])->name('delete.image');

        // --------------------ユーザーページにお知らせ表示--------------------//
        // お知らせ詳細
        Route::get('/notice/{id}/detail',[UserRegistrationController::class, 'detailNotice'])->name('detail.notice');


        // --------------------投稿一覧--------------------//
        // ページに表示
        Route::get('/blog',[UserRegistrationController::class,'showBlog'])->name('show.blog');
        // 登録
        Route::get('/create_blog',[UserRegistrationController::class,'createBlogForm'])->name('create.blog');
        Route::post('/create_blog',[UserRegistrationController::class,'createBlog']);       
        // 詳細表示
        Route::get('/detail_blog/{blog}/',[UserRegistrationController::class, 'detailBlog'])->name('detail.Blog');
        // 編集
        Route::get('/edit_blog/{blog}', [UserRegistrationController::class, 'editBlogForm'])->name('edit.Blog');
        Route::post('/edit_blog/{blog}', [UserRegistrationController::class, 'editBlog']);
        // 削除
        Route::get('/delete_blog/{blog}', [UserRegistrationController::class, 'deleteBlog'])->name('delete.Blog');


        // --------------------各地域表示--------------------//
        // 詳細表示
        Route::get('/region/{blog}/detai',[RegionDisplayController::class, 'detailRegion'])->name('detail.all');

        // 北海道一覧表示
        Route::get('/hokkaidou',[RegionDisplayController::class, 'showHokkaidou'])->name('hokkaidou');
        // 東北一覧表示
        Route::get('/tohoku',[RegionDisplayController::class, 'showTohoku'])->name('tohoku');
        // 関東一覧表示
        Route::get('/kantou',[RegionDisplayController::class, 'showKantou'])->name('kantou');
        // 中部一覧表示
        Route::get('/tyubu',[RegionDisplayController::class, 'showTyubu'])->name('tyubu');
        // 関西一覧表示
        Route::get('/kansai',[RegionDisplayController::class, 'showKansai'])->name('kansai');
        // 四国一覧表示
        Route::get('/shikoku',[RegionDisplayController::class, 'showShikoku'])->name('shikoku');
        // 中国一覧表示
        Route::get('/tyugoku',[RegionDisplayController::class, 'showTyugoku'])->name('tyugoku');
        // 九州一覧表示
        Route::get('/kyusyu',[RegionDisplayController::class, 'showKyusyu'])->name('kyusyu');
        // 沖縄一覧表示
        Route::get('/okinawa',[RegionDisplayController::class, 'showOkinawa'])->name('okinawa');

});

    // 管理者以上
    Route::group(['middleware' => ['auth', 'can:admin-higher']], function () {
    //ここにルートを記述

        // --------------------TOP表示--------------------//
        Route::get('/admin_top',[AdminRegistrationController::class, 'adminindex'])->name('admin.top');


        // --------------------プロフィール表示--------------------//
        // プロフィール表示
        Route::get('/admin_profile',[AdminRegistrationController::class, 'adminProfile'])->name('admin.profile');
        // プロフィール編集
        Route::get('/edit_admin/{user}', [AdminRegistrationController::class, 'editAdminForm'])->name('edit.admin');
        Route::post('/edit_admin/{user}', [AdminRegistrationController::class, 'editAdmin']);


        // --------------------お知らせ--------------------//
        // 新規登録
        Route::get('/create_notice',[AdminRegistrationController::class,'createNoticeForm'])->name('create.notice');
        Route::post('/create_notice',[AdminRegistrationController::class,'createNotice']);
        // 詳細表示
        Route::get('/notice/{notice}/admindetail',[AdminRegistrationController::class, 'detailAdminNotice'])->name('detail.adminNotice');
        // 編集
        Route::get('/edit_notice/{notice}', [AdminRegistrationController::class, 'editNoticeForm'])->name('edit.Notice');
        Route::post('/edit_notice/{notice}', [AdminRegistrationController::class, 'editNotice']);
        // 削除
        Route::get('/delete_notice/{notice}', [AdminRegistrationController::class, 'deleteNotice'])->name('delete.Notice');
    });
});