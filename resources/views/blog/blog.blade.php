@extends('layouts.app')

@section('content')
<main class="py-4">
    <div class="col-md-8  mx-auto">
        <div class="text-center mt-3">
            <h2>投稿一覧</h2>
        </div>
        <div class='mt-5'>
            <a href="{{ route('create.blog') }}">
                <button type="button" class="px-5 btn btn-primary w-25">+新規投稿</button>
            </a>
        </div>
        <table class="table table-striped mt-5">
            <!-- loop -->
            @foreach($blogs as $blog)
            <tr>
            <td class='col-8'>
                <a href="{{ route('detail.Blog', ['blog' => $blog['id']]) }}">{{ $blog['title'] }}</a>
            </td>
            <td>
                <a href="{{ route('edit.Blog', ['blog' => $blog['id']]) }}" class="btn btn-primary btn-sm">
                <button class="btn btn-primary btn-sm">編集</button>
                </a>
            <td>
                <a href="{{ route('delete.Blog',['blog'=>$blog['id']]) }}"  class="btn btn-danger btn-sm" onclick="return confirm('本当に削除してもよろしいですか？')"  class="btn btn-danger btn-sm" onclick=";">削除</a>
            </td>
            </tr>
            @endforeach
        </table>
        <div class="text-right mt-5">
            <button type="button" class='btn btn-outline-secondary w-25' onclick="history.back()">戻る</button>
        </div>
    </div>
</main>

@endsection
