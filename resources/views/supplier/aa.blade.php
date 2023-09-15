@extends('adminlte::page')

@section('title', '業者一覧')

@section('content_header')
    <h1>仕入れ業者一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            @if (session('message'))
            <div class="alert alert-success text-center">
                {{ session('message') }}
            </div>
            @endif
            <div class="card">
                <div class="card-body text-center">
                    <form action="{{ url('suppliers/store') }}" method="get">
                        <button type="submit" class="btn btn-md btn-primary">新規登録</button>
                    </form>
                </div>
            </div>
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">検索</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('supplier') }}" method="get">
                        <div class="form-group d-flex">
                            <div class="control-group mr-2">
                                <input type="search"  name="keyword" size="100" maxlength="100" value="{{ $keyword }}">
                            </div>
                            <div class="control-group">
                                <input type="submit" class="btn btn-sm btn-primary" value="検索">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center"></div>
            </div>
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">仕入れ業者件数</h3>
                    <h5>{{ ":".$count."件" }}</h5>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>仕入業者名</th>
                                <th>担当者</th>
                                <th>連絡先</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suppliers as $supplier)
                                <tr>
                                    <td>{{ $supplier->id }}</td>
                                    <td>{{ $supplier->name}}</td>
                                    <td>{{ $supplier->manager}}</td>
                                    <td>{{ $supplier->phone }}</td>
                                    {{-- <td>
                                        <form method="POST" action="/suppliers/delete/{{ $supplier->id }}" id="itemDelete">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">削除</button>
                                        </form>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {!! $suppliers->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="css/modal.css">
@stop

@section('js')
    <script src="{{ asset('js/editor.js') }}"></script>
@stop
