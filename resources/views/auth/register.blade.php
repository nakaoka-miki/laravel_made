@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">新規登録</div>
                @if($errors->any())
                    <div class="alert alert-danger">
                    @foreach($errors->all() as $message)
                        <p>{{ $message }}</p>
                    @endforeach
                    </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <label for='name' class='mt-3'>氏名</label>
                            <input type='text' class='form-control' name='name' id="name" value="{{ old('name')}}" placeholder="山田太郎">
                        <label for='nickname' class='mt-3'>ニックネーム</label>
                            <input type='text' class='form-control' name='nickname' id="nickname" value="{{ old('nickname')}}" placeholder="太郎ちゃん">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for='birthday' class='mt-3'>誕生日</label>
                                    <input type='date' class='form-control' name='birthday' id="birtday" value="{{ old('birthday')}}">
                            </div>
                            <div class="col-sm-6">
                                <label for='gender' class='mt-3'>性別</label>
                                    <select name='gender' id='gender' class='form-control'>
                                        <option value="" hidden>性別</option>
                                        <option value="1" @if(old('gender')=="1")selected @endif>男性</option>
                                        <option value="2" @if(old("gender")=="2")selected @endif>女性</option>
                                    </select>
                            </div>
                        </div>
                        <label for='tel' class='mt-3'>電話番号</label>
                            <input type='text' class='form-control' name='tel' id="tel" value="{{ old('tel')}}" placeholder="0123456789">
                        <label for='email' class='mt-3'>メールアドレス</label>
                            <input type='text' class='form-control' name='email' id="email" value="{{ old('email')}}" placeholder="example@icloud.com">
                        <label for='password' class='mt-3'>パスワード</label>
                            <input type='password' class='form-control' name='password' id="password" placeholder="半角英数字">
                        <div class="mt-5">
                            <div class="text-center ">
                                <button type="submit" class="btn btn-primary w-50">登録</button>
                            </div>
                        <div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
