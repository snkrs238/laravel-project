@extends('adminlte::page')

@section('title', '商品管理')

@section('content_header')
    <h1>商品管理</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center">
                    <form action="{{ url('items/add') }}" method="get">
                        <button type="submit" class="btn btn-md btn-primary">新規登録</button>
                    </form>
                </div>
            </div>
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">商品検索</h3>
                    {{-- <div class="dropdown text-right">
                        <button class="btn btn-default dropdown-toggle btn-sm" type="button" id="dropdownMenu1" data-toggle="dropdown">操作</button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item text-muted js-download" href="/items/downloadPdf">pdf</a>
                            <a class="dropdown-item text-muted js-download" href="/items/downloadExcel">Excel</a>
                        </div>
                    </div> --}}
                </div>
                <div class="card-body">
                    <form action="{{ url('items') }}" method="get">
                        <div class="form-group d-flex">
                            <div class="control-group mr-2">
                                <input type="text"  name="keyword" size="100" maxlength="100" value="{{ $keyword }}">
                            </div>
                            <div class="control-group mr-2">
                                <select name="typeKeyword" class="h-100" value="{{ $typeKeyword }}">
                                    <option value="">全て</option>
                                    <option value="1" @if(old('type') == 1) selected @endif>野菜</option>
                                    <option value="2" @if(old('type') == 2) selected @endif>果物</option>
                                    <option value="3" @if(old('type') == 3) selected @endif></option>
                                    <option value="4" @if(old('type') == 4) selected @endif></option>
                                </select>
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
                    <h3 class="card-title">商品一覧</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>ステータス</th>
                                <th>商品名</th>
                                <th>種別</th>
                                <th>価格</th>
                                <th>在庫数</th>
                                <th>登録日時</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        @if( $item->status =='active' )
                                            {{  '表示' }}
                                        @else
                                            {{ '非表示' }}
                                        @endif
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @if ($item->type == 1)
                                            {{ "野菜"}}
                                        @elseif ($item->type == 2)
                                            {{ "果物" }}
                                        @elseif ($item->type === 3)
                                            {{ '肉類' }}
                                        @elseif ($item->type === 4)
                                            {{ '魚介類' }}
                                        @endif
                                    </td>
                                    <td>{{ $item->price.'円' }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <form action="items/detail/{{ $item->id }}" method="get">
                                            <button type="submit" class="btn btn-sm btn-primary">詳細</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-2 ml-2">
                        {!! $items->links() !!}
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
