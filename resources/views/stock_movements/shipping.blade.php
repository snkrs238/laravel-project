@extends('adminlte::page')

{{-- @section('title',$items->name) --}}

@section('content_header')
    <div class="form-group d-flex justify-content-between">
        <h1>出荷</h1>
        <form action="/items" method="get">
            <button type="submit" class="btn btn-sm btn-secondary mr-3 text-right">一覧に戻る</button>
        </form>
    </div>
@stop

@section('content')    
<div class="row">
    <div class="col-12">
        @if (session('error'))
        <div class="alert alert-success text-center">
            {{ session('error') }}
        </div>
        @endif
        <div class="card card-purple">
            <div class="card-header">
                {{-- <h2 class="card-title">{{ 'ID:'.$items->id }}</h2> --}}
            </div>
        <form action="/stock_movements/shipping/{{ $item->id }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $item->id }}">
            <div class="card-body">
                <div class="form-group">
                    <div class="control-group">
                        <label for="name">品名</label>
                        <div class="col-sm-4 t-1">{{ $item->name }}</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-group">
                        <label for="type">カテゴリ</label>
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
                    <label for="movement_type">在庫移動の種類 </label>
                    <select name="movement_type" class="form-control">
                        <option value="">選択してください</option>
                        <option value="1" @if(old('movement_type') == 1) selected @endif>出庫</option>
                        <option value="2" @if(old('movement_type') == 2) selected @endif>入庫</option>
                    </select>
                    <div class="error p-0 text-danger">
                        <p class="alert-danger rounded mt-1">{{$errors->first('movement_type')}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-group">
                        <label for="quantity"> 移動数量</label>
                        <input type="number" name="quantity" class="form-control">
                    </div>
                    <div class="error p-0 text-danger">
                        <p class="alert-danger rounded mt-1">{{$errors->first('quantity')}}</p>
                    </div>
                </div>
            </div>
            <div class="card-footer justify-content-center ">
                <button type="submit" class="btn btn-sm btn-primary" id="update">移動する</button>
            </div>
        </form>
    </div>
</div>

@stop    
@section('js')
    <script src="{{ asset('js/editor.js') }}"></script>
@stop