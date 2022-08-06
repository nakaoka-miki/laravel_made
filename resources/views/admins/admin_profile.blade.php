@extends('layouts.app')

@section('content')
<main class="py-4">
    <div class="col-md-6 mx-auto">
        <div class="mx-auto">
            <div class="box14">
                <div class='text-center'>
                    <p class='h2 mt-4'>プロフィール</p>
                </div>
                <div class="row">
                    <div class="col-md-6 ml-5">
                        <div class='container mt-5'>
                            <p>＜名前＞</p>
                            <p class='h4 mt-1'>{{ $profile['name'] }}</p>
                        </div>
                        <div class='container mt-3'>
                            <p>＜誕生日＞</p>
                            <p class='h4 mt-1'>{{ $profile['birthday'] }}</p>
                        </div>
                        <div class='container mt-3 mb-5'>
                            <p>＜電話番号＞</p>
                            <p class='h4 mt-1'>{{ $profile['tel'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="row text-center mb-5 mx-2">
                    <div class="col-md-6">
                        <a href="{{ route('edit.admin', ['user' => Auth::user()]) }}">
                            <button type="button" class="btn btn-secondary w-100 shadow ">編集</button>
                        </a>
                    </div>
                    <div class="col-md-6">
                            <button type="button" class="btn btn-secondary w-100 shadow" onclick="history.back()">戻る</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
