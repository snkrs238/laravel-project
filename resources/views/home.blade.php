@extends('layouts.head')

@section('title', 'home')

@section('content_header')
    <h1>ホーム</h1>
@stop



@section('content')
@include('navi')
<div class="card text-right">
    <div class="card-body">
        <div class="search">
            <form action="{{ route('home') }}" method="get">
                <div class="form-group ">
                    <div class="control-group">
                        <input type="search"  name="keyword" size="30" maxlength="30" value="{{ $keyword }}" placeholder="商品名を入力してください。">
                        <input type="submit" class="btn btn-sm btn-primary" value="検索">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
        

    <div class="container d-flex flex-wrap mt-3">
        @foreach ($items as $item)
                <div class="card m-3" style="width: 18rem;">
                    @if (isset($item->image))
                        <img src="data:image/png;base64,{{ $item->image }}" class="card-img-top" alt="...">
                    @else
                        <img src="https://yamaichiba.com/wp-content/uploads/2017/11/noimage.png" alt="">    
                    @endif
                    <div class="card-body">
                        <h3 class="card-title">{{ '商品名：'.$item->name  }}</h3>
                        <p class="card-text mt-3">{{ '価格：'.$item->price.'円' }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ '在庫数：'.$item->quantity }}</li>
                        <li class="list-group-item">
                            {{ 'カテゴリ：' }}
                            @if ($item->type == 1)
                            {{ "野菜"}}
                            @elseif ($item->type == 2)
                            {{ "果物" }}
                            @endif</li>
                        <li class="list-group-item">
                            {{ '産地：' }}
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
                        </li>
                    </ul>
                    <div class="card-body">
                        <button type="button" class="btn btn-sm btn-primary btn-tool" data-bs-toggle="modal" data-card-widget="collapse" data-bs-target="#homeModal">詳細</button>
                    </div>
                </div>
                {{-- 詳細モーダル --}}
                <div class="modal fade " id="homeModal" tabindex="-1" aria-hidden="true" aria-labelledby="modalLabel">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" >詳細</h5>
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                          </div>
                          <div class="modal-body">
                            <div class="card-body">
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
                                <div class="form-group">
                                    <div class="control-group">
                                        <label class="col-sm-2 control-label" for="name">商品名</label>
                                        <div class="col-sm-4">{{ $item->name }}</div>
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
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">OK</button>
                          </div>
                        </div>
                      </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {!! $items->links() !!}
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/pagination.css">
@stop

@section('js')
@stop

