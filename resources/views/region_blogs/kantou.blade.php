@extends('layouts.app')

@section('content')
<main class="py-4">
    <div class="col-md-8  mx-auto">
        <div class="text-center mt-3">
            <h2>～関東一覧～</h2>
        </div>
        <div class='list-group list-group-flush  mt-5'>
            @foreach($kantous as $kantou)
                <a class="list-group-item list-group-item-action mt-2 shadow" href="{{ route('detail.all',['blog' => $kantou['id']]) }}">{{ $kantou['title'] }}</a>
            @endforeach
        </div>
        <div class="text-right mt-5">
            <button type="button" class='btn btn-outline-secondary w-25' onclick="history.back()">戻る</button>
        </div>
    </div>
</main>

@endsection
