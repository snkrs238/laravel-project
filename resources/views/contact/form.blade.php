@extends('layouts.app')

@section('title', 'お問い合わせフォーム')

@section('content_header')
    <h1>お問い合わせフォーム</h1>
@stop

@include('navi')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form action="/contact/form" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">名前</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="名前" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="メールアドレス" value="{{ old('email') }}">
                        <div class="error p-0 text-danger">
                            <p class="alert-danger rounded mt-1">{{$errors->first('name')}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gender">性別</label>
                        <label><input type="radio" name="gender" value="1"checked>男性</label>
                        <label><input type="radio" name="gender" value="2">女性</label>
                        <div class="error p-0 text-danger">
                            <p class="alert-danger rounded mt-1">{{$errors->first('gender')}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="age">年齢</label>
                        <select name="age" class="form-control">
                            <option value="">選択してください</option>
                            <option value="1" @if(old('type') == 1) selected @endif>~19歳</option>
                            <option value="2" @if(old('type') == 2) selected @endif>20~29歳</option>
                            <option value="3" @if(old('type') == 3) selected @endif>30~39歳</option>
                            <option value="4" @if(old('type') == 4) selected @endif>40~49歳</option>
                            <option value="5" @if(old('type') == 5) selected @endif>50~59歳</option>
                            <option value="6" @if(old('type') == 6) selected @endif>60~歳</option>
                        </select>
                        <div class="error p-0 text-danger">
                            <p class="alert-danger rounded mt-1">{{$errors->first('age')}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title">件名</label>
                        <input type="text" class="form-control" id="title" name="title"  value="{{ old('title') }}">
                        <div class="error p-0 text-danger">
                            <p class="alert-danger rounded mt-1">{{$errors->first('title')}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content">内容</label>
                        <textarea name="content" class="form-control" cols="50" rows="5">{{ old('content') }}</textarea>
                        <div class="error p-0 text-danger">
                            <p class="alert-danger rounded mt-1">{{$errors->first('content')}}</p>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-5">送信</button>
            </form>
        </div>
        <div class="col-md-3"></div>

    </div>
</div>

@stop