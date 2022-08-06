@extends('layouts.app')

@section('content')
<main class="py-4 ">
    <div class="col-md-6  mx-auto">
        <form action="{{ route('register') }}"  method="post">
            @csrf
            <label for='name' class='mt-3'>氏名</label>
                <input type='text' class='form-control' name='name' id="name" placeholder="山田太郎">
            <label for='nickname' class='mt-3'>ニックネーム</label>
                <input type='text' class='form-control' name='nickname' id="nickname" placeholder="太郎ちゃん">
            <div class="form-group row">
                <div class="col-sm-6">
                    <label for='birhday' class='mt-3'>誕生日</label>
                        <input type='date' class='form-control' name='birtday' id="birtday" >
                </div>
                <div class="col-sm-6">
                    <label for='gender' class='mt-3'>性別</label>
                        <select name='gender' id='gender' class='form-control'>
                            <option value='' hidden>性別</option>
                            <option value="1">男性</option>
                            <option value="2">女性</option>
                        </select>
                </div>
            </div>
            <label for='tel' class='mt-3'>電話番号</label>
                <input type='text' class='form-control' name='tel' id="tel" placeholder="0123456789">
            <label for='email' class='mt-3'>メールアドレス</label>
                <input type='text' class='form-control' name='email' id="email" placeholder="example@icloud.com">
            <label for='password' class='mt-3'>パスワード</label>
                <input type='password' class='form-control' name='password' id="password" placeholder="半角英数字">
            <div class="mt-5">
                <div class="text-center ">
                    <button type="submit" class="btn btn-primary w-50">登録</button>
                </div>
            <div>
        </form>
        <div class='text-center mt-4'><a href="">ログインはこちら</a></div>
    </div>
</div>

@endsection