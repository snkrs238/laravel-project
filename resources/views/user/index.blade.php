@extends('adminlte::page')

@section('title', '顧客一覧')

@section('content_header')
    <h1>顧客一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">ユーザー検索</h3>
                </div>
                <div class="card-body">
                    <form action="/users" method="get">
                            <input type="text"  name="keyword" size="100" maxlength="100" value="{{ $keyword }}">
                            <input type="submit" class="btn btn-sm btn-primary" value="検索">
                    </form>
                </div>
                <div class="card-footer text-center"></div>
            </div>
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">ユーザー一覧</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>名前</th>
                                <th>メールアドレス</th>
                                <th></th>
                                <th>登録日時</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->role == 1)
                                            {{ '管理者' }}
                                        @elseif($user->role >= 2)
                                            {{ 'システム管理者' }}
                                        @else
                                            {{ 'ユーザー' }}
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at }}</td>
                                    @can('superAdmin')
                                    <td>
                                        <form action="/users/detail/{{ $user->id }}" method="get">
                                            <button type="submit" class="btn btn-sm btn-primary">詳細</button>
                                        </form>
                                    </td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-2 ml-2">
                {!! $users->links() !!}
            </div>
        </div>
    </div>

@stop
