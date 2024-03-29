@extends('adminlte::page')

@section('title', '商品管理')

@section('content_header')
    <h1>在庫管理</h1>
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
                    <form action="{{ url('items/add') }}" method="get">
                        <button type="submit" class="btn btn-md btn-primary">新規発注</button>
                    </form>
                </div>
            </div>
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">商品検索</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('items') }}" method="get">
                        <div class="form-group d-flex">
                            <div class="control-group mr-2">
                                <input type="search"  name="keyword" size="100" maxlength="100" value="{{ $keyword }}">
                            </div>
                            <div class="control-group mr-2">
                                <select name="typeKeyword" class="h-100">
                                    <option value="" selected="selected">全て</option>
                                    <option value="1" @if($typeKeyword == 1) selected @endif>文具・事務用品</option>
                                    <option value="2" @if($typeKeyword == 2) selected @endif>OA機器・AV機器</option>
                                    <option value="3" @if($typeKeyword == 3) selected @endif>衣料・寝具・手芸・ゴム製品</option>
                                    <option value="4" @if($typeKeyword == 4) selected @endif>工具器具備品</option>
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
                    <h5>{{ ":".$count."件" }}</h5>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>カテゴリ</th>
                                <th>品名</th>
                                <th>在庫数</th>
                                <th>更新日</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        @if ($item->type == 1)
                                            {{ "文具・事務用品"}}
                                        @elseif ($item->type == 2)
                                            {{ "OA機器・AV機器" }}
                                        @elseif ($item->type == 3)
                                            {{ "衣料・寝具・手芸・ゴム製品" }}
                                        @elseif ($item->type == 4)
                                            {{ '工具器具備品' }}
                                        @endif
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    @if ($item->quantity <= 10)
                                        <td class="text-danger">{{ $item->quantity  }}</td>
                                    @else
                                        <td>{{ $item->quantity }}</td>
                                    @endif
                                    <td>{{ $item->updated_at }}</td>
                                    <td>
                                        <form action="/order/create/{{ $item->id }}" method="get">
                                            <button type="submit" class="btn btn-sm btn-primary">注文</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="/stock_movements/shipping/{{ $item->id }}" method="get">
                                            <button type="submit" class="btn btn-sm btn-primary">出・入庫</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="/items/edit/{{ $item->id }}" method="get">
                                            <button type="submit" class="btn btn-sm btn-success">更新</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="items/detail/{{ $item->id }}" method="get">
                                            <button type="submit" class="btn btn-sm btn-primary">詳細</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-center m-3">
                {!! $items->links() !!}
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
