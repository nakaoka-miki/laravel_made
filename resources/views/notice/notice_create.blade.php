@extends('layouts.app')

@section('content')
<main class="py-4">
    <div class="col-md-6  mx-auto">
        <div class="text-center mt-3">
            <h2>お知らせ作成</h2>
        </div>

        <div class = 'panel-body' style="background-color:#fadbda;">
        @if($errors->any())
            <div class='alert alert-denger'>
                <ul>
                    @foreach($errors->all() as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>

        <form action="{{ route('create.notice') }}"  method="post">
        @csrf
            <div class="form-group">
                <div class="row mt-5 ml-3">
                    <div class="col-md-2">
                        <label for='title' class='mt-3  h6'>タイトル</label>
                    </div>
                    <div class="col-md-10">
                        <input type='text' class='form-control' name='title' id="title" value="{{ old('title') }}" placeholder="タイトル入力">
                    </div>
                </div>
            </div>
            <div class="form-group mt-5">
                <label for='comment' class='text-left mt-2 ml-3 h5'>本文</label>
                    <textarea rows="10" class='form-control' name='comment' id='comment' placeholder="ここから入力">{{ old('title') }}</textarea>
            </div>
            <div class="d-flex justify-content-around mt-5">
                <button type="submit" id="submit" class='btn btn-primary w-25'>投稿</button>
                <button type="button" class='btn btn-outline-danger w-25' onclick="history.back()">戻る</button>
            </div>
        </form>
    </div>
</main>

@endsection
