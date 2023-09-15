@extends('adminlte::page')

{{-- @section('title',$items->name) --}}

@section('content_header')
    <div class="form-group d-flex justify-content-between">
        <h1>発注</h1>
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
                {{-- <h2 class="card-title">{{ 'ID:'.$items->id }}</h2> --}}
            </div>
        <form action="/order/create/{{ $item->id }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $item->id }}">
            <input type="hidden" name="name" value="{{ $item->name }}">
            <input type="hidden" name="type" value="{{ $item->type }}">
            <input type="hidden" name="supplier_id" value="{{ $item->supplier_id }}">
            <div class="card-body">
                <div class="form-group">
                    <div class="control-group">
                        <label for="name">品名</label>
                        <div class="col-sm-4 t-1">{{ $item->name }}</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-group">
                        <label for="quantity">在庫数</label>
                        <div class="col-sm-4 t-1">{{ $item->quantity }}</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-group">
                        <label for="quantity">価格</label>
                        <div class="col-sm-4 t-1">{{ $item->price }}</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-group">
                        <label for="order">注文数</label>
                        <input type="number" name="order" class="form-control">
                    </div>
                    <div class="error p-0 text-danger">
                        <p class="alert-danger rounded mt-1">{{$errors->first('order')}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-group">
                        <label for="order">納入日</label>
                        <input type="date" name="deliveryDate" class="form-control">
                    </div>
                    <div class="error p-0 text-danger">
                        <p class="alert-danger rounded mt-1">{{$errors->first('deliveryDate')}}</p>
                    </div>
                </div>
            </div>
            <div class="card-footer justify-content-center ">
                <button type="submit" class="btn btn-sm btn-primary" id="update">発注する</button>
                <button type="submit" class="btn btn-sm btn-secondary" formaction="/items" id="item">@method('get') 戻る</button>
            </div>
        </form>
    </div>
</div>

@stop    
@section('js')
    <script src="{{ asset('js/editor.js') }}"></script>
@stop