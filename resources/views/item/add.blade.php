@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <div class="form-group d-flex justify-content-between">
        <h1>商品管理</h1>
        <form action="/items" method="get">
            <button type="submit" class="btn btn-sm btn-secondary mr-3 text-right">一覧に戻る</button>
        </form>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card card-primary">
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="名前" value="{{ old('name') }}">
                            <div class="error p-0 text-danger">
                                <p class="alert-danger rounded mt-1">{{$errors->first('name')}}</p>
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
                        {{-- <div class="col-sm-4">
                            <img src="data:image/png;base64,{{ $item->image }}" id="img">
                        </div> --}}
                        <div class="form-group">
                            <label for="type">種別</label>
                            <select name="type" class="form-control">
                                <option value="">選択してください</option>
                                <option value="1" @if(old('type') == 1) selected @endif>野菜</option>
                                <option value="2" @if(old('type') == 2) selected @endif>果物</option>
                                <option value="3" @if(old('type') == 3) selected @endif>肉類</option>
                                <option value="4" @if(old('type') == 4) selected @endif>魚介類</option>
                            </select>
                            <div class="error p-0 text-danger">
                                <p class="alert-danger rounded mt-1">{{$errors->first('type')}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="production_aria">産地</label>
                            <select name="production_aria" class="form-control">
                                <option value="" selected>都道府県</option>
                                <option value="1" @if(old('type') == 1) selected @endif>北海道</option>
                                <option value="2" @if(old('type') == 2) selected @endif>青森県</option>
                                <option value="3" @if(old('type') == 3) selected @endif>岩手県</option>
                                <option value="4" @if(old('type') == 4) selected @endif>宮城県</option>
                                <option value="5" @if(old('type') == 5) selected @endif>秋田県</option>
                                <option value="6" @if(old('type') == 6) selected @endif>山形県</option>
                                <option value="7" @if(old('type') == 7) selected @endif>福島県</option>
                                <option value="8" @if(old('type') == 8) selected @endif>茨城県</option>
                                <option value="9" @if(old('type') == 9) selected @endif>栃木県</option>
                                <option value="10" @if(old('type') == 10) selected @endif>群馬県</option>
                                <option value="11" @if(old('type') == 11) selected @endif>埼玉県</option>
                                <option value="12" @if(old('type') == 12) selected @endif>千葉県</option>
                                <option value="13" @if(old('type') == 13) selected @endif>東京都</option>
                                <option value="14" @if(old('type') == 14) selected @endif>神奈川県</option>
                                <option value="15" @if(old('type') == 15) selected @endif>新潟県</option>
                                <option value="16" @if(old('type') == 16) selected @endif>富山県</option>
                                <option value="17" @if(old('type') == 17) selected @endif>石川県</option>
                                <option value="18" @if(old('type') == 18) selected @endif>福井県</option>
                                <option value="19" @if(old('type') == 19) selected @endif>山梨県</option>
                                <option value="20" @if(old('type') == 20) selected @endif>長野県</option>
                                <option value="21" @if(old('type') == 21) selected @endif>岐阜県</option>
                                <option value="22" @if(old('type') == 22) selected @endif>静岡県</option>
                                <option value="23" @if(old('type') == 23) selected @endif>愛知県</option>
                                <option value="24" @if(old('type') == 24) selected @endif>三重県</option>
                                <option value="25" @if(old('type') == 25) selected @endif>滋賀県</option>
                                <option value="26" @if(old('type') == 26) selected @endif>京都府</option>
                                <option value="27" @if(old('type') == 27) selected @endif>大阪府</option>
                                <option value="28" @if(old('type') == 28) selected @endif>兵庫県</option>
                                <option value="29" @if(old('type') == 29) selected @endif>奈良県</option>
                                <option value="30" @if(old('type') == 30) selected @endif>和歌山県</option>
                                <option value="31" @if(old('type') == 31) selected @endif>鳥取県</option>
                                <option value="32" @if(old('type') == 32) selected @endif>島根県</option>
                                <option value="33" @if(old('type') == 33) selected @endif>岡山県</option>
                                <option value="34" @if(old('type') == 34) selected @endif>広島県</option>
                                <option value="35" @if(old('type') == 35) selected @endif>山口県</option>
                                <option value="36" @if(old('type') == 36) selected @endif>徳島県</option>
                                <option value="37" @if(old('type') == 37) selected @endif>香川県</option>
                                <option value="38" @if(old('type') == 38) selected @endif>愛媛県</option>
                                <option value="39" @if(old('type') == 39) selected @endif>高知県</option>
                                <option value="40" @if(old('type') == 40) selected @endif>福岡県</option>
                                <option value="41" @if(old('type') == 41) selected @endif>佐賀県</option>
                                <option value="42" @if(old('type') == 42) selected @endif>長崎県</option>
                                <option value="43" @if(old('type') == 43) selected @endif>熊本県</option>
                                <option value="44" @if(old('type') == 44) selected @endif>大分県</option>
                                <option value="45" @if(old('type') == 45) selected @endif>宮崎県</option>
                                <option value="46" @if(old('type') == 46) selected @endif>鹿児島県</option>
                                <option value="47" @if(old('type') == 47) selected @endif>沖縄県</option>
                            </select>
                            <div class="error p-0 text-danger">
                                <p class="alert-danger rounded mt-1">{{$errors->first('production_aria')}}</p>
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
                            <label for="quantity">在庫数</label>
                            <input type="text" class="form-control" id="quantity" name="quantity"  value="{{ old('quantity') }}">
                            <div class="error p-0 text-danger">
                                <p class="alert-danger rounded mt-1">{{$errors->first('quantity')}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <textarea type="text" class="form-control" id="detail" name="detail" placeholder="詳細説明" cols="50" rows="5">{{ old('detail') }}</textarea>
                            <div class="error p-0 text-danger">
                                <p class="alert-danger rounded mt-1">{{$errors->first('detail')}}</p>
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
