@extends('layouts.app')

@section('content')
<main class="py-4">
    <div class="col-md-6 mx-auto">
        <div class="mx-auto">
            <div class="box14">
                <div class='text-center'>
                    <p class='h2 mt-4'>プロフィール編集</p>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                    @foreach($errors->all() as $message)
                        <p>{{ $message }}</p>
                    @endforeach
                    </div>
                @endif

                <form action="{{ route('edit.admin', ['user' => $user['id']]) }}"  method="post">
                @csrf
                    <div class="col-md-8 ml-5">
                        <label for='name' class='mt-3'>＜名前＞</label>
                            <input type='text' class='form-control' name='name' id="name" value="{{old('name',$user['name'])}}">
                        <label for='birthday' class='mt-3'>＜誕生日＞</label>
                            <input type='date' class='form-control' name='birthday' id="birthday" value="{{old('birthday',$user['birthday'])}}">
                        <label for='tel' class='mt-3'>＜電話番号＞</label>
                            <input type='text' class='form-control' name='tel' id="tel" value="{{old('tel',$user['tel'])}}">
                        <label for='email' class='mt-3'>＜メールアドレス＞</label>
                            <input type='text' class='form-control' name='email' id="email" value="{{old('email',$user['email'])}}">
                    </div>
                    <div class="row text-center mt-5 mb-5 mx-2">
                        <div class="col-md-6">
                            <button type="submit" id='submit' class="btn btn-secondary w-100 shadow ">登録</button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-secondary w-100 shadow" onclick="history.back()">戻る</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection
