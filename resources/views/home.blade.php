@extends('layouts.app')

@section('title', 'home')

@section('content_header')
    <h1>購入履歴</h1>
@stop



@section('content')
@include('navi')
{{-- カルーセル --}}
    <div id="carouselExampleIndicators" class="carousel slide w-100" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="/public/images/pine.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="" alt="Third slide">
        </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </div> 
    <div class="container d-flex flex-wrap ">
        @foreach ($items as $item)
                <div class="card ml-3" style="width: 18rem;">
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
                        <button type="button" class="btn btn-sm btn-primary btn-tool" data-card-widget="collapse">詳細</button>
                    </div>
                </div>
                {{-- 詳細モーダル --}}
                <div class="modal fade" tabindex="-1" aria-hidden="true" role="dialog" style="z-index: 1050; display: none">
                    <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" >詳細</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">OK</button>
                          </div>
                        </div>
                      </div>
                </div>
        @endforeach
    </div>
    
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script src="{{ asset('js/detail.js') }}"></script>
@stop

