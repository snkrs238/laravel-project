@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <div class="form-group d-flex justify-content-between">
        <h1>商品登録</h1>
        <form action="/items" method="get">
            <button type="submit" class="btn btn-sm btn-secondary mr-3 text-right">一覧に戻る</button>
        </form>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card card-primary">
                <form method="POST" action="/items/add" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="名前" value="{{ old('name') }}">
                            <div class="error p-0 text-danger">
                                <p class="alert-danger rounded mt-1">{{$errors->first('name')}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="order">注文数</label>
                            <input type="number" class="form-control" id="order" name="order"  value="{{ old('order') }}">
                            <div class="error p-0 text-danger">
                                <p class="alert-danger rounded mt-1">{{$errors->first('order')}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="supplier_id">仕入れ先</label>
                            <select name="supplier_id" class="form-control">
                                <option value="">選択してください</option>
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" @if(old('supplier_id') == $supplier->id) selected @endif>{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                            <div class="error p-0 text-danger">
                                <p class="alert-danger rounded mt-1">{{$errors->first('supplier_id')}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="type">種別</label>
                            <select name="type" class="form-control">
                                <option value="">選択してください</option>
                                <option value="1" @if(old('type') == 1) selected @endif>文具・事務用品</option>
                                <option value="2" @if(old('type') == 2) selected @endif>OA機器・AV機器</option>
                                <option value="3" @if(old('type') == 3) selected @endif>衣料・寝具・手芸・ゴム製品</option>
                                <option value="4" @if(old('type') == 4) selected @endif>工具器具備品</option>
                            </select>
                            <div class="error p-0 text-danger">
                                <p class="alert-danger rounded mt-1">{{$errors->first('type')}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price">価格</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
                            <div class="error p-0 text-danger">
                                <p class="alert-danger rounded mt-1">{{$errors->first('price')}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deliveryDate">納入日</label>
                            <input type="date" class="form-control" id="deliveryDate" name="deliveryDate"  value="{{ old('deliveryDate') }}">
                            <div class="error p-0 text-danger">
                                <p class="alert-danger rounded mt-1">{{$errors->first('deliveryDate')}}</p>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    画像アップロード<input type="file" name="image" style="display:none" class="uploadFile" id="inputFile">
                                </span>
                            </label>
                            <input type="text" class="form-control" readonly="">
                        </div>
                        <label for="">画像容量を50KB以下にしてください。</label>
                        <div class="mb-2">
                            <img src="" id="img">
                        </div>
                        <div class="error p-0 text-danger">
                            <p class="alert-danger rounded mt-1">{{$errors->first('image')}}</p>
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
