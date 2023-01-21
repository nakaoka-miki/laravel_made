@extends('layouts.app')

@section('content')
<main class="py-4">
    <div class="col-md-6  mx-auto">
        <div class="text-center mt-3 ">
            <h2>記事作成</h2>
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

        <form action="{{ route('create.blog') }}"  method="post">
        @csrf
            <div class="form-group">
                <div class="row mt-5 ml-3">
                    <div class="col-md-2">
                        <label for='title' class='mt-3  h6'>タイトル</label>
                    </div>
                    <div class="col-md-10">
                        <input type='text' class='form-control' name='title' id="title" value="{{ old('title') }}"  placeholder="タイトル入力">
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <div class="col-md-offset-4 col-md-4 col-sm-6 col-xs-6">
                    <label for='region' class='mt-5' hidden>地域選択</label>
                        <select name='region' id='region' class='mt-5 form-control'>
                            <option value='' hidden>地域選択</option>
                            <option value="1" @if(old('region')=="1")selected @endif>北海道</option>
                            <option value="2" @if(old('region')=="2")selected @endif>東北</option>
                            <option value="3" @if(old('region')=="3")selected @endif>関東</option>
                            <option value="4" @if(old('region')=="4")selected @endif>中部</option>
                            <option value="5" @if(old('region')=="5")selected @endif>関西</option>
                            <option value="6" @if(old('region')=="6")selected @endif>四国</option>
                            <option value="7" @if(old('region')=="7")selected @endif>中国</option>
                            <option value="8" @if(old('region')=="8")selected @endif>九州</option>
                            <option value="9" @if(old('region')=="9")selected @endif>沖縄</option>
                        </select>
                </div> 
            </div>
            <div class="form-group mt-5">
                <label for='comment' class='text-left mt-2 ml-3 h5'>本文</label>
                    <textarea rows="10" class='form-control' name='comment' id='comment' placeholder="ここから入力">{{ old('comment') }}</textarea>
            </div>

            <!-- 動画埋め込み-->
            <div class="form-group">
                <div class="row mt-5 ml-3">
                    <div class="col-md-2">
                        <label for='youtubu' class='mt-3 h6'>参考動画</label>
                    </div>
                    <div class="col-md-10">
                        <input type='text' class='form-control' name='youtubu' id="youtubu" value=""  placeholder="url">
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-around mt-5">
                <button type="submit" id="submit" class='btn btn-primary w-25'>投稿</button>
                <button type="button" class='btn btn-outline-danger w-25' onclick="history.back()">戻る</button>
            </div>
        </form>
    </div>
</main>

@endsection
