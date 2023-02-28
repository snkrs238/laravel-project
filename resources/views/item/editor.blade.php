@extends('adminlte::page')

@section('title',$item->name)

@section('content_header')
    <div class="form-group d-flex justify-content-between">
        <h1>商品編集</h1>
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
            <input type="hidden" name="id" value="{{ $item->id }}">
            <div class="card-body">
                <div class="form-group d-flex">
                    <div class="control-group">
                        <label for="status">ステータス : </label>
                        <label><input type="radio"  name="status" value="active" @if (old('status', $item->status ) == "active") checked @endif>表示</label>
                        <label><input type="radio"  name="status" value="deleted" @if (old('status', $item->status ) == "deleted") checked @endif>非表示</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-group">
                        <label for="name">名前</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="名前" value="{{ $item->name }}">
                        <div class="error p-0 text-danger">
                            <p class="alert-danger rounded mt-1">{{$errors->first('name')}}</p>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-group">
                        <label class="col-sm-2 control-label" for="type">カテゴリ</label>
                        <select name="type" class="form-control">
                            <option value="1" @if(old('type',$item->type) == 1) selected @endif>野菜</option>
                            <option value="2" @if(old('type',$item->type) == 2) selected @endif>果物</option>
                            <option value="3" @if(old('type',$item->type) == 3) selected @endif>肉類</option>
                            <option value="4" @if(old('type',$item->type) == 4) selected @endif>魚介類</option>
                        </select>
                    </div>
                    <div class="error p-0 text-danger">
                        <p class="alert-danger rounded mt-1">{{$errors->first('type')}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-group">
                        <label class="col-sm-2 control-label" for="production_aria">産地</label>
                        <select name="production_aria" class="form-control">
                            <option value="1" @if(old('production_aria',$item->production_aria) == 1) selected @endif>北海道</option>
                            <option value="2" @if(old('production_aria',$item->production_aria) == 2) selected @endif>青森県</option>
                            <option value="3" @if(old('production_aria',$item->production_aria) == 3) selected @endif>岩手県</option>
                            <option value="4" @if(old('production_aria',$item->production_aria) == 4) selected @endif>宮城県</option>
                            <option value="5" @if(old('production_aria',$item->production_aria) == 5) selected @endif>秋田県</option>
                            <option value="6" @if(old('production_aria',$item->production_aria) == 6) selected @endif>山形県</option>
                            <option value="7" @if(old('production_aria',$item->production_aria) == 7) selected @endif>福島県</option>
                            <option value="8" @if(old('production_aria',$item->production_aria) == 8) selected @endif>茨城県</option>
                            <option value="9" @if(old('production_aria',$item->production_aria) == 9) selected @endif>栃木県</option>
                            <option value="10" @if(old('production_aria',$item->production_aria) == 10) selected @endif>群馬県</option>
                            <option value="11" @if(old('production_aria',$item->production_aria) == 11) selected @endif>埼玉県</option>
                            <option value="12" @if(old('production_aria',$item->production_aria) == 12) selected @endif>千葉県</option>
                            <option value="13" @if(old('production_aria',$item->production_aria) == 13) selected @endif>東京都</option>
                            <option value="14" @if(old('production_aria',$item->production_aria) == 14) selected @endif>神奈川県</option>
                            <option value="15" @if(old('production_aria',$item->production_aria) == 15) selected @endif>新潟県</option>
                            <option value="16" @if(old('production_aria',$item->production_aria) == 16) selected @endif>富山県</option>
                            <option value="17" @if(old('production_aria',$item->production_aria) == 17) selected @endif>石川県</option>
                            <option value="18" @if(old('production_aria',$item->production_aria) == 18) selected @endif>福井県</option>
                            <option value="19" @if(old('production_aria',$item->production_aria) == 19) selected @endif>山梨県</option>
                            <option value="20" @if(old('production_aria',$item->production_aria) == 20) selected @endif>長野県</option>
                            <option value="21" @if(old('production_aria',$item->production_aria) == 21) selected @endif>岐阜県</option>
                            <option value="22" @if(old('production_aria',$item->production_aria) == 22) selected @endif>静岡県</option>
                            <option value="23" @if(old('production_aria',$item->production_aria) == 23) selected @endif>愛知県</option>
                            <option value="24" @if(old('production_aria',$item->production_aria) == 24) selected @endif>三重県</option>
                            <option value="25" @if(old('production_aria',$item->production_aria) == 25) selected @endif>滋賀県</option>
                            <option value="26" @if(old('production_aria',$item->production_aria) == 26) selected @endif>京都府</option>
                            <option value="27" @if(old('production_aria',$item->production_aria) == 27) selected @endif>大阪府</option>
                            <option value="28" @if(old('production_aria',$item->production_aria) == 28) selected @endif>兵庫県</option>
                            <option value="29" @if(old('production_aria',$item->production_aria) == 29) selected @endif>奈良県</option>
                            <option value="30" @if(old('production_aria',$item->production_aria) == 30) selected @endif>和歌山県</option>
                            <option value="31" @if(old('production_aria',$item->production_aria) == 31) selected @endif>鳥取県</option>
                            <option value="32" @if(old('production_aria',$item->production_aria) == 32) selected @endif>島根県</option>
                            <option value="33" @if(old('production_aria',$item->production_aria) == 33) selected @endif>岡山県</option>
                            <option value="34" @if(old('production_aria',$item->production_aria) == 34) selected @endif>広島県</option>
                            <option value="35" @if(old('production_aria',$item->production_aria) == 35) selected @endif>山口県</option>
                            <option value="36" @if(old('production_aria',$item->production_aria) == 36) selected @endif>徳島県</option>
                            <option value="37" @if(old('production_aria',$item->production_aria) == 37) selected @endif>香川県</option>
                            <option value="38" @if(old('production_aria',$item->production_aria) == 38) selected @endif>愛媛県</option>
                            <option value="39" @if(old('production_aria',$item->production_aria) == 39) selected @endif>高知県</option>
                            <option value="40" @if(old('production_aria',$item->production_aria) == 40) selected @endif>福岡県</option>
                            <option value="41" @if(old('production_aria',$item->production_aria) == 41) selected @endif>佐賀県</option>
                            <option value="42" @if(old('production_aria',$item->production_aria) == 42) selected @endif>長崎県</option>
                            <option value="43" @if(old('production_aria',$item->production_aria) == 43) selected @endif>熊本県</option>
                            <option value="44" @if(old('production_aria',$item->production_aria) == 44) selected @endif>大分県</option>
                            <option value="45" @if(old('production_aria',$item->production_aria) == 45) selected @endif>宮崎県</option>
                            <option value="46" @if(old('production_aria',$item->production_aria) == 46) selected @endif>鹿児島県</option>
                            <option value="47" @if(old('production_aria',$item->production_aria) == 47) selected @endif>沖縄県</option>
                        </select>
                    </div>
                    <div class="error p-0 text-danger">
                        <p class="alert-danger rounded mt-1">{{$errors->first('production_aria')}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-group">
                        <label class="col-sm-2 control-label" for="price">価格</label>
                        <input type="text" name="price" class="form-control" value="{{ $item->price }}">
                    </div>
                    <div class="error p-0 text-danger">
                        <p class="alert-danger rounded mt-1">{{$errors->first('price')}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-group">
                        <label class="col-sm-2 control-label" for="quantity">在庫数</label>
                        <input type="text" name="quantity" class="form-control" value="{{ $item->quantity }}">
                    </div>
                    <div class="error p-0 text-danger">
                        <p class="alert-danger rounded mt-1">{{$errors->first('quantity')}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-group">
                        <label class="col-sm-2 control-label" for="detail">商品説明</label>
                        <textarea name="detail" class="form-control" id="detail" cols="50" rows="5">{{ $item->detail }}</textarea>
                    </div>
                    <div class="error p-0 text-danger">
                        <p class="alert-danger rounded mt-1">{{$errors->first('detail')}}</p>
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
                <div class="error p-0 text-danger">
                    <p class="alert-danger rounded mt-1">{{$errors->first('image')}}</p>
                </div>
                @if(isset($item->image))
                    <div class="col-sm-4 w-80">
                        <img src="data:image/png;base64,{{ $item->image }}" id="img">
                    </div>
                @endif
            </div>
            <div class="card-footer justify-content-center ">
                <button type="submit" class="btn btn-sm btn-primary" id="update">更新</button>
                <button type="submit" class="btn btn-sm btn-danger" formaction="/items/delete/{{ $item->id }}" id="itemDelete">削除</button>
            </div>
        </form>
    </div>
</div>

@stop    
@section('js')
    <script src="{{ asset('js/editor.js') }}"></script>
@stop