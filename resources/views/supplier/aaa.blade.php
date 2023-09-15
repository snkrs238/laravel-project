@extends('adminlte::page')

@section('title', '業者登録')

@section('content_header')
    <div class="form-group d-flex justify-content-between">
        <h1>新しい仕入業者登録</h1>
        <form action="/supplier" method="get">
            <button type="submit" class="btn btn-sm btn-secondary mr-3 text-right">一覧に戻る</button>
        </form>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card card-primary">
                <form method="POST" action="/suppliers/store" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">メーカー</label>
                            <input type="text" class="form-control" id="name" name="name"  value="{{ old('name') }}">
                            <div class="error p-0 text-danger">
                                <p class="alert-danger rounded mt-1">{{$errors->first('name')}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="manager">担当者</label>
                            <input type="text" class="form-control" id="manager" name="manager" value="{{ old('manager') }}">
                            <div class="error p-0 text-danger">
                                <p class="alert-danger rounded mt-1">{{$errors->first('manager')}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone">電話番号</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                            <div class="error p-0 text-danger">
                                <p class="alert-danger rounded mt-1">{{$errors->first('phone')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    <script src="{{ asset('js/editor.js') }}"></script>
@stop
