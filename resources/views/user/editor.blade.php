@extends('adminlte::page')

@section('title','ユーザーID:'.Auth::user()->id)

@section('content_header')
    <div class="form-group d-flex justify-content-between">
        <h1>ユーザー編集</h1>
        <form action="/users" method="get">
            <button type="submit" class="btn btn-sm btn-secondary mr-3 text-right">一覧に戻る</button>
        </form>
    </div>
@stop

@section('content')    
<div class="row">
    <div class="col-12">
        <div class="card card-purple">
            <div class="card-header">
                <h2 class="card-title">{{ 'ID:'.Auth::user()->id }}</h2>
            </div>
        <form action="/users/edit/{{ Auth::user()->id }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
            <div class="card-body">
                <div class="form-group">
                    <div class="control-group">
                        <label for="name">名前</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->name  }}">
                    </div>
                    <div class="error p-0 text-danger">
                        <p class="alert-danger rounded mt-1">{{$errors->first('name')}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-group">
                        <label for="email">メールアドレス</label>
                        <input type="email" class="form-control" value="{{ Auth::user()->email }}">
                    </div>
                    <div class="error p-0 text-danger">
                        <p class="alert-danger rounded mt-1">{{$errors->first('email')}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-group">
                        <label for="password">パスワード</label>
                        <input type="password" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-group">
                        <label for=""></label>
                        <input type="text">
                    </div>
                </div>
            </div>
            <div class="card-footer justify-content-center ">
                <button type="submit" class="btn btn-sm btn-primary" id="update">更新</button>
            </div>
        </form>
        </div>
    </div>
</div>

@stop    