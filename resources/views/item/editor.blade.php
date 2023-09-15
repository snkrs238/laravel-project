@extends('adminlte::page')

@section('title',$item->name)

@section('content_header')
    <div class="form-group d-flex justify-content-between">
        <h1>更新</h1>
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
                <h2 class="card-title">{{ 'ID:'.$item->id }}</h2>
            </div>
        <form action="/items/edit/{{ $item->id }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="name" value="{{ $item->name }}">
            <input type="hidden" name="type" value="{{ $item->type }}">
            <input type="hidden" name="quantity" value="{{ $item->quantity }}">
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
                    <div class="control-group">
                        <label for="quantity">在庫数</label>
                        <div class="col-sm-4 t-1">{{ $item->quantity }}</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-group">
                        <label for="price">価格</label>
                        <input type="number" name="price" class="form-control" value="{{ $item->price }}">
                    </div>
                    <div class="error p-0 text-danger">
                        <p class="alert-danger rounded mt-1">{{$errors->first('price')}}</p>
                    </div>
                </div>
                {{-- <div class="form-group">
                    <div class="control-group">
                        <label for="quantity">在庫数</label>
                        <input type="number" name="quantity" class="form-control" value="{{ $item->quantity }}">
                    </div>
                    <div class="error p-0 text-danger">
                        <p class="alert-danger rounded mt-1">{{$errors->first('quantity')}}</p>
                    </div>
                </div> --}}
                <div class="form-group">
                    <label for="supplier_id">仕入れ先</label>
                    <select name="supplier_id" class="form-control">
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" @if(old('supplier_id') == $supplier->id) selected @endif>{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                    <div class="error p-0 text-danger">
                        <p class="alert-danger rounded mt-1">{{$errors->first('supplier_id')}}</p>
                    </div>
                </div>
                {{-- <div class="form-group">
                    <label for="quantity">納入日</label>
                    <input type="date" class="form-control" id="date" name="deliveryDate"  value="{{ $item->deliveryDate }}">
                    <div class="error p-0 text-danger">
                        <p class="alert-danger rounded mt-1">{{$errors->first('deliveryDate')}}</p>
                    </div>
                </div> --}}
                <div class="input-group">
                    <label class="input-group-btn">
                        <span class="btn btn-primary">
                            画像アップロード<input type="file" name="image" style="display:none" class="uploadFile" id="inputFile">
                        </span>
                    </label>
                    <input type="text" class="form-control" readonly="">
                </div>
                <label for="">画像容量を50KB以下にしてください。</label>
                <div class="error p-0 text-danger">
                    <p class="alert-danger rounded mt-1">{{$errors->first('image')}}</p>
                </div>
                @if(isset($item->image))
                    <div class="col-sm-4">
                        <img src="data:image/png;base64,{{ $item->image }}" id="img">
                    </div>
                @endif
            </div>
            <div class="card-footer justify-content-center ">
                <button type="submit" class="btn btn-sm btn-primary" id="update">更新</button>
                <button type="submit" class="btn btn-sm btn-danger" formaction="/items/delete/{{ $item->id }}" id="itemDelete">削除</button>
                <button type="submit" class="btn btn-sm btn-secondary" formaction="/items" id="item">@method('get') 戻る</button>
            </div>
        </form>
    </div>
</div>

@stop    
@section('js')
    <script src="{{ asset('js/editor.js') }}"></script>
@stop