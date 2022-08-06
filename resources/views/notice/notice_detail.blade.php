@extends('layouts.app')

@section('content')
<main class="py-4">
    <div class="col-md-6  mx-auto">
        <div class="ml-2 mt-3">
            <h3>{{ $onenotice['title'] }}</h3>
        </div>
        <div class='box8'>
                <div class="container">{!!nl2br(e($onenotice['comment']))!!}</div>
        </div>
        <div class="text-right mt-5">
            <button type="button" class='btn btn-outline-secondary w-25' onclick="history.back()">戻る</button>
        </div>
    </div>
</main>

@endsection

