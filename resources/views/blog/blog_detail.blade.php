@extends('layouts.app')

@section('content')
<main class="py-4">
    <div class="col-md-6  mx-auto">
        <div class="ml-2 mt-3">
            <h3>{{ $detailblog['title'] }}</h3>
        </div>
        <div class='box7'>
                <div class="container">{!!nl2br(e($detailblog['comment']))!!}</div>
        </div>
            <iframe class="mt-3" width="500" height="300" src="{{ $detailblog['youtubu'] }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <div class="d-flex justify-content-between">
            <a href="{{ route('edit.Blog', ['blog' => $detailblog['id']]) }}">
                <button class="btn btn-primary  ">編集</button>
            </a>
            <a href="{{ route('delete.Blog',['blog'=>$detailblog['id']]) }}">
                <button class="btn btn-danger " onclick="return confirm('本当に削除してもよろしいですか？')">削除</button>
            </a>
            <button type="button" class='btn btn-outline-secondary w-25' onclick="history.back()">戻る</button>
        </div>
    </div>
</main>

@endsection

