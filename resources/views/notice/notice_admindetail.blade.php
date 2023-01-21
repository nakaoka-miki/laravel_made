@extends('layouts.app')

@section('content')
<main class="py-4">
    <div class="col-md-6  mx-auto">
        <div class="ml-2 mt-3">
            <h3>{{ $notice['title'] }}</h3>
        </div>
        <div class='box8'>
                <div class="container">{!!nl2br(e($notice['comment']))!!}</div>
        </div>

        <img class="border border-dark mb-4" src="{{ asset('storage/'.$notice->image) }}" alt="プロフィール画像" width="200" height="200" >

        <div class="d-flex justify-content-between">
            <a href="{{ route('edit.Notice',['notice'=>$notice['id']]) }}">
                <button class="btn btn-primary  ">編集</button>
            </a>
            <a href="{{ route('delete.Notice',['notice'=>$notice['id']]) }}">
                <button class="btn btn-danger " onclick="return confirm('本当に削除してもよろしいですか？')">削除</button>
            </a>
            <button type="button" class='btn btn-outline-secondary w-25' onclick="history.back()">戻る</button>
        </div>
    </div>
</main>

@endsection

