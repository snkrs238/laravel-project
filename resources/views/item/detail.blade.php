@extends('adminlte::page')

@section('title', $item->name)

@section('content_header')
    <div class="form-group d-flex justify-content-between">
        <h1>商品一覧</h1>
        <form action="/items" method="get">
            <button type="submit" class="btn btn-sm btn-secondary mr-3 text-right">一覧に戻る</button>
        </form>
    </div>
@stop

@section('content')    
<div class="row">
    <div class="col-12">
        <div class="card card-purple">
            <div class="card-header">
                <h3 class="card-title">{{ '商品ID:'.$item->id }}</h3>
                {{-- <div class="dropdown text-right">
                    <button class="btn btn-default dropdown-toggle btn-sm" type="button" id="dropdownMenu1" data-toggle="dropdown">操作</button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                        <a class="dropdown-item text-muted js-download" href="/items/detail/downloadPdf">pdf</a>
                        <a class="dropdown-item text-muted js-download" href="/items/detail/downloadExcel">Excel</a>
                    </div>
                </div> --}}
            </div>
        <div class="card-body">
            <div class="form-group">
                <div class="control-group">
                    <label class="col-sm-2 control-label" for="name">品名</label>
                    <div class="col-sm-4">{{ $item->name }}</div>
                </div>
            </div>
            <div class="form-group">
                <div class="control-group">
                    <label class="col-sm-2 control-label" for="quantity">在庫数</label>
                    <div class="col-sm-4">{{ $item->quantity }}</div>
                </div>
            </div>
            <div class="form-group">
                <div class="control-group">
                    <label class="col-sm-2 control-label" for="type">カテゴリ</label>
                    <div class="col-sm-4">
                        @if ($item->type === 1)
                            {{ '文具・事務用品' }}
                        @elseif ($item->type === 2)
                            {{ 'OA機器・AV機器' }}
                        @elseif ($item->type === 3)
                            {{ '衣料・寝具・手芸・ゴム製品' }}
                        @elseif ($item->type === 4)
                            {{ '工具器具備品' }}
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="control-group">
                    <label class="col-sm-2 control-label" for="supplier">仕入れ先</label>
                    <div class="col-sm-4">
                        @foreach ($suppliers as $supplier)
                            @if ($item->supplier_id == $supplier->id)
                                {{ $supplier->name }}
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="control-group">
                    <label class="col-sm-2 control-label" for="price">価格</label>
                    <div class="col-sm-4">{{ $item->price .' 円'}}</div>
                </div>
            </div>
            <div class="form-group">
                <div class="control-group">
                    <label class="col-sm-2 control-label" for="image">商品画像</label>
                    <div class="col-sm-4">
                        @if (isset($item->image))
                            <img src="data:image/png;base64,{{ $item->image }}" class="card-img-top" alt="...">
                        @else
                            <img src="https://yamaichiba.com/wp-content/uploads/2017/11/noimage.png" alt="">    
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-center ">
            <form action="/items" method="get">
                @csrf
                <button type="submit" class="btn btn-sm btn-primary mr-3">戻る</button>
            </form>
        </div>
    </div>
</div>

@stop    
@section('js')
    <script src="{{ asset('js/editor.js') }}"></script>
@stop