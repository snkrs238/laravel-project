@extends('adminlte::page')

@section('title', $item->name)

@section('content_header')
    <div class="form-group d-flex justify-content-between">
        <h1>商品詳細</h1>
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
                    <label class="col-sm-2 control-label" for="name">商品名</label>
                    <div class="col-sm-4">{{ $item->name }}</div>
                </div>
            </div>
            <div class="form-group">
                <div class="control-group">
                    <label class="col-sm-2 control-label" for="status">ステータス</label>
                    <div class="col-sm-4">
                        @if( $item->status =='active' )
                            {{  '表示' }}
                        @else
                            {{ '非表示' }}
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="control-group">
                    <label class="col-sm-2 control-label" for="type">カテゴリ</label>
                    <div class="col-sm-4">
                        @if ($item->type === 1)
                            {{ '野菜' }}
                        @elseif ($item->type === 2)
                            {{ '果物' }}
                        @elseif ($item->type === 3)
                            {{ '肉類' }}
                        @elseif ($item->type === 4)
                            {{ '魚介類' }}
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="control-group">
                    <label class="col-sm-2 control-label" for="production_aria">産地</label>
                    <div class="col-sm-4">
                        @switch($item->production_aria)
                            @case(1)
                                {{ '北海道' }}
                                @break
                            @case(2)
                                {{ '青森県' }}
                                @break
                            @case(3)
                                {{ '岩手県' }}
                            @break
                            @case(4)
                                {{ '宮城県' }}
                                @break
                            @case(5)
                                {{ '秋田県' }}
                                @break
                            @case(6)
                                {{ '山形県' }}
                                @break
                            @case(7)
                                {{ '福島県' }}
                                @break
                            @case(8)
                                {{ '茨城県' }}
                                @break
                            @case(9)
                                {{ '栃木県' }}
                                @break
                            @case(10)
                                {{ '群馬県' }}
                                @break
                            @case(11)
                                {{ '埼玉県' }}
                                @break
                            @case(12)
                                {{ '千葉県' }}
                                @break
                            @case(13)
                                {{ '東京都' }}
                                @break
                            @case(14)
                                {{ '神奈川県' }}
                                @break
                            @case(15)
                                {{ '新潟県' }}
                                @break
                            @case(16)
                                {{ '富山県' }}
                                @break
                            @case(17)
                                {{ '石川県' }}
                                @break
                            @case(18)
                                {{ '福井県' }}
                                @break
                            @case(19)
                                {{ '山梨県' }}
                                @break
                            @case(20)
                                {{ '長野県' }}
                                @break
                            @case(21)
                                {{ '岐阜都' }}
                                @break
                            @case(22)
                                {{ '静岡県' }}
                                @break
                            @case(23)
                                {{ '愛知県' }}
                                @break
                            @case(24)
                                {{ '三重県' }}
                                @break
                            @case(25)
                                {{ '滋賀県' }}
                                @break
                            @case(26)
                                {{ '京都府' }}
                                @break
                            @case(27)
                                {{ '大阪府' }}
                                @break
                            @case(28)
                                {{ '兵庫県' }}
                                @break
                            @case(29)
                                {{ '奈良県' }}
                                @break
                            @case(30)
                                {{ '和歌山県' }}
                                @break
                            @case(31)
                                {{ '鳥取県' }}
                                @break
                            @case(32)
                                {{ '島根県' }}
                                @break
                            @case(33)
                                {{ '岡山県' }}
                                @break
                            @case(34)
                                {{ '広島県' }}
                                @break
                            @case(35)
                                {{ '山口県' }}
                                @break
                            @case(36)
                                {{ '徳島県' }}
                                @break
                            @case(37)
                                {{ '香川県' }}
                                @break
                            @case(38)
                                {{ '愛媛県' }}
                                @break
                            @case(39)
                                {{ '高知県' }}
                                @break
                            @case(40)
                                {{ '福岡県' }}
                                @break
                            @case(41)
                                {{ '佐賀県' }}
                                @break
                            @case(42)
                                {{ '長崎県' }}
                                @break
                            @case(43)
                                {{ '熊本県' }}
                                @break
                            @case(44)
                                {{ '大分県' }}
                                @break
                            @case(45)
                                {{ '宮崎県' }}
                                @break
                            @case(46)
                                {{ '鹿児島県' }}
                                @break
                            @case(47)
                                {{ '沖縄県' }}
                                @break   
                        @endswitch
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
                    <label class="col-sm-2 control-label" for="quantity">在庫数</label>
                    <div class="col-sm-4">{{ $item->quantity }}</div>
                </div>
            </div>
            <div class="form-group">
                <div class="control-group">
                    <label class="col-sm-2 control-label" for="detail">商品説明</label>
                    <div class="col-sm-4">{{ $item->detail }}</div>
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
            <form action="/items/edit/{{ $item->id }}" method="get">
                @csrf
                <button type="submit" class="btn btn-sm btn-primary mr-3">編集</button>
            </form>
        </div>
    </div>
</div>

@stop    
@section('js')
    <script src="{{ asset('js/editor.js') }}"></script>
@stop