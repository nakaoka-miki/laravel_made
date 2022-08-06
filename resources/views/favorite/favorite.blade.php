@extends('layouts.app')

@section('content')
<main class="py-4">
    <div class="col-md-8  mx-auto">
        <div class="text-center mt-3">
            <h2>お気に入り一覧</h2>
        </div>
        
        <table class="table table-striped mt-5">
            @foreach($favorites as $favorite)
            <tr>
                <td class='col-8'>
                    <a href="{{ route('detail.all',$favorite['post_id'])}}">{{ $favorite['title']}}</a>
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
