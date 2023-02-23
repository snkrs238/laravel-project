@extends('layouts.app')

@section('title', 'ユーザー登録')

@section('content_header')
    <h1>登録</h1>
@stop


@section('content')
@include('navi')

<div class="container-fluid">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">名前</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="名前" value="{{ old('name') }}">
                        <div class="error p-0 text-danger">
                            <p class="alert-danger rounded mt-1">{{$errors->first('name')}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="メールアドレス" value="{{ old('email') }}">
                        <div class="error p-0 text-danger">
                            <p class="alert-danger rounded mt-1">{{$errors->first('email')}}</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="パスワード">パスワード</label>
                        <input type="password" class="form-control" name="password" placeholder="{{ 'パスワード(8文字以上)' }}">
                        <div class="error p-0 text-danger">
                            <p class="alert-danger rounded mt-1">{{$errors->first('password')}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="確認用パスワード">確認用パスワード</label>   
                        <input type="password" class="form-control" name="password_confirmation" placeholder="{{ 'もう一度入力してください' }}">
                    </div>
                    <div class="error p-0 text-danger">
                        <p class="alert-danger rounded mt-1">{{$errors->first('password_confirmation')}}</p>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-5">登録</button>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
</div>