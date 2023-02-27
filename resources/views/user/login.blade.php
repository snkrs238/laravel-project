@extends('layouts.head')

@section('title', 'create/user')

@section('content_header')
    <h1>ログイン</h1>
@stop


@section('content')
@include('navi')

{{-- <div class="container-fluid">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="card-body">
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
                <button type="submit" class="btn btn-primary ml-5">ログイン</button>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
</div> --}}
    <div class="login-box container-fluid">
       {{-- フラッシュメッセージ --}}
    @if(session('add_message'))
    <div class="alert alert-success text-center">
        {{ session('add_message') }}
    </div>
    @endif
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="login-box-body">
                <h3 class="login-box-msg mb-5 text-center">ログインしてください。</h3>

                <form action="{{ route('login') }}" method="post">
                    @csrf

                    <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">メールアドレス</label>
                        <input name="email" type="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @if ($errors->has('email'))
                            <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="パスワード">パスワード</label>
                        <input name="password" type="password" class="form-control" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        @if ($errors->has('password'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        {{-- <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}> 次回から省略する
                                </label>
                            </div>
                        </div> --}}
                        <!-- /.col -->
                        <div class="col-xs-4 d-flex align-items-center">
                            <button type="submit" class="btn btn-primary ml-2">ログイン</button>
                            <div class="register-link ml-3">
                                <a href="/account/register">新規登録</a>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <hr>
                {{-- <a href="{{ route('password.request') }}">パスワードを忘れましたか？</a><br>
                <a href="{{ route('register') }}" class="text-center">ユーザー登録する</a> --}}

            </div>
            <div class="col-4"></div>
        </div>
</div>