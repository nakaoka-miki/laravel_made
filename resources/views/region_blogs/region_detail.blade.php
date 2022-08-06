@extends('layouts.app')

@section('content')
<main class="py-4">
    <div class="col-md-6  mx-auto">
        <div class="ml-2 mt-3">
            <h3>{{ $blog['title'] }}</h3>
        </div>


        @if($favorite)
        <div class ="text-right">
            <button  class="favorite loved" data-postid="{{ $blog->id }}">
                <i class="fa-solid fa-star">お気に入り</i>
            </button>
        </div>
        @else
        <div class ="text-right">
            <button class="favorite text-right"   data-postid="{{ $blog->id }}">
                <i class="fa-solid fa-star">お気に入り</i>
            </button>
        </div>
        @endif


        <div class='box7'>
                <div class="container">{!!nl2br(e($blog['comment']))!!}</div>
        </div>
        <div class="text-right mt-5">
            <button type="button" class='btn btn-outline-secondary w-25' onclick="history.back()">戻る</button>
        </div>
    </div>
</main>

@endsection

