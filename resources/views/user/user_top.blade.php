@extends('layouts.app')

@section('content')
<main class="py-4">
    <div class="col-md-8  mx-auto">
        <div class='card shadow '>
            <div class='card-body'>
                <table class="table mt-1">
                    <thead>
                        <tr>
                        <th scope="col">～お知らせ～</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- ここにお知らせを表示する（foreach) -->
                        @foreach($allnotices as $allnotice)
                        <tr>
                        <th scope="col" class='h6'>
                            <a href="{{ route('detail.notice', ['id' => $allnotice['id']]) }}">{{ $allnotice['title'] }}</a>
                        </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="d-flex justify-content-between mt-5">
                <a href="{{ route('create.blog') }}">
                    <button type="button" class="btn btn-outline-primary px-5 shadow">+新規投稿</button>
                </a>
                <form  action="" method="GET">
                    <div class="input-group">
                        <input type="text" name="keyword"  placeholder="ワード検索">
                        <span class="input-group-btn">
                            <button type="submit"  class="btn btn-secondary">検索</button>
                        </span>
                </form>
            </div>
        </div>
        
        <div class='card shadow mt-3'>
            <div class='card-body'>
                @if($blogs->count())
                <table class="table mt-1">
                    @foreach($blogs as $blog)
                        <tr>
                            <td class="col">
                                <a href="{{ route('detail.all',['blog' => $blog['id']]) }}">{{ $blog->title }}</a>
                            </td>
                        </tr> 
                    @endforeach
                    </table>
                @else
                    <p class="box15">見つかりませんでした。</p>
                @endif
                <div>{{ $blogs->links()}}</div>
            </div>
        </div>
        


        <div class='card shadow mt-5'>
            <h2>～各地域～</h2>
            <div class='card-body'>
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('hokkaidou') }}">
                                <button type="button" class="btn btn-outline-primary shadow btn-lg px-5">北海道</button>
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{ route('tohoku') }}">
                                <button type="button" class="btn btn-outline-primary shadow btn-lg px-5">東北</button>
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{ route('kantou') }}">
                                <button type="button" class="btn btn-outline-primary shadow btn-lg px-5">関東</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="container text-center">
                    <div class="row mt-3">
                        <div class="col">
                            <a href="{{ route('tyubu') }}">
                                <button type="button" class="btn btn-outline-primary shadow btn-lg px-5">中部</button>
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{ route('kansai') }}">
                                <button type="button" class="btn btn-outline-primary shadow btn-lg px-5">関西</button>
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{ route('shikoku') }}">
                                <button type="button" class="btn btn-outline-primary shadow btn-lg px-5">四国</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="container text-center">
                    <div class="row mt-3">
                        <div class="col">
                            <a href="{{ route('tyugoku') }}">
                                <button type="button" class="btn btn-outline-primary shadow btn-lg px-5">中国</button>
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{ route('kyusyu') }}">
                                <button type="button" class="btn btn-outline-primary shadow btn-lg px-5">九州</button>
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{ route('okinawa') }}">
                                <button type="button" class="btn btn-outline-primary shadow btn-lg px-5">沖縄</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <!-- googlemapAPI記載 -->
        <div id="map" style="height:300px" class="mt-3">
            <script src="{{ asset('/js/googlemap.js') }}"></script>
            <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=&callback=initMap" async defer>
            </script>
        </div>      
    </div>
</main>

@endsection