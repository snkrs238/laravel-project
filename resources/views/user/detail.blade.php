@extends('adminlte::page')

@section('title',$user->name)

@section('content_header')
    <div class="form-group d-flex justify-content-between">
        <h1>ユーザー詳細</h1>
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
            <div class="card-body">
                <div class="form-group">
                    <div class="control-group">
                        <label for="">権限</label>
                        <div class="col-sm-4">
                            @if ($user->role == 0)
                                {{ 'ユーザー' }}
                            @elseif ($user->role == 1)
                                {{ '管理者' }}
                            @else
                                {{ 'システム管理者' }}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-group">
                        <label for="name">名前</label>
                        <div class="col-sm-4">{{ $user->name }}</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-group">
                        <label for="email">メールアドレス</label>
                        <div class="col-sm-4">{{ $user->email }}</div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <form action="/users/edit/{{ $user->id }}" method="get">
                    <button type="submit" class="btn btn-sm btn-primary">編集</button>
                </form>
            </div>
        </div>
    </div>
</div>

@stop    