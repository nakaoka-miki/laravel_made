@extends('layouts.app')

@section('content')
<main class="py-4">
    <div class="col-md-8 mx-auto">
        <div class="mx-auto">
            <div class="box14">
                <div class='text-center'>
                    <p class='h2 mt-4'>プロフィール</p>
                </div>
                <div class="row">
                    <div class="col-md-6 text-center">
                        <div class='container mt-5 '>
                            <img class="border border-dark" src="{{ asset('storage/'.$profile->img) }}" alt="プロフィール画像" width="150" height="150">
                        </div>

                        <form action="{{ route('edit.image') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                            <div class="container mt-5">
                                <input type="file" name="img" id="img" accept=".png,.jpg,.jpeg">
                                <div>
                                    <button type="submit" class='btn btn-secondary shadow mt-4 w-25'>登録</button>
                                    <a href="{{ route('delete.image') }}">
                                        <button type="button" class='btn btn btn-secondary shadow mt-4 w-25' onclick="return confirm('本当に削除してもよろしいですか？')">削除</button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="col-md-6 mb-4">
                        <div class='container mt-5'>
                            <p>＜名前＞</p>
                            <p class='h4'>{{ $profile['name'] }}</p>
                        </div>
                        <div class='container mt-3'>
                            <p>＜ニックネーム＞</p>
                            <p class='h4'>{{ $profile['nickname'] }}</p>
                        </div>
                        <div class='container mt-3'>
                            <p>＜誕生日＞</p>
                            <p class='h4'>{{ $profile['birthday'] }}</p>
                        </div>
                        <div class='container mt-3'>
                            <p>＜電話番号＞</p>
                            <p class='h4'>{{ $profile['tel'] }}</p>
                        </div>


                        <div class="container text-center mt-3">
                            <a href="{{ route('edit.user', ['user' => Auth::user()]) }}">
                                <button type="button" class='btn btn-secondary shadow w-25'>編集</button>
                            </a>
                            <button type="button" class='btn btn btn-secondary shadow w-25' onclick="history.back()">戻る</button>
                        </div>

                    </div>
                </div>
                <div class="row text-center mb-5 mx-2">
                    <div class="col-md-6">
                        <a href="{{ route('favorite') }}">
                            <button type="button" class="w-100 shadow btn btn-warning">お気に入り一覧</button>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('show.blog') }}">
                            <button type="button" class="w-100 shadow btn btn-info">投稿一覧</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
