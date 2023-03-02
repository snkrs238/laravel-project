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
                <h2 class="card-title">{{ 'ID:'.$user->id }}</h2>
            </div>
        <form action="/users/edit/{{ $user->id}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $user->id}}">
            <div class="card-body">
                <div class="form-group">
                    <div class="control-group">
                        <label for="role">管理者権限の切り替え : </label>
                        <label><input type="radio"  name="role" value="2" {{ $user->role == 2  ? 'checked' : '' }}>システム管理者</label>
                        <label><input type="radio"  name="role" value="1" {{ $user->role == 1  ? 'checked' : '' }}>管理者</label>
                        <label><input type="radio"  name="role" value="0" {{ $user->role == 0  ? 'checked' : '' }}>ユーザー</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-group">
                        <label for="name">名前</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name}}">
                    </div>
                    <div class="error p-0 text-danger">
                        <p class="alert-danger rounded mt-1">{{$errors->first('name')}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-group">
                        <label for="email">メールアドレス</label>
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                    </div>
                    <div class="error p-0 text-danger">
                        <p class="alert-danger rounded mt-1">{{$errors->first('email')}}</p>
                    </div>
                </div>
            </div>
            <div class="card-footer justify-content-center ">
                <button type="submit" class="btn btn-sm btn-primary" id="update">更新</button>
                <button type="submit" class="btn btn-sm btn-danger" formaction="/users/delete/{{ $user->id }}" id="userDelete">削除</button>
            </div>
        </form>
        </div>
    </div>
</div>

@stop    

@section('js')
    <script src="{{ asset('js/editor.js') }}"></script>
@stop