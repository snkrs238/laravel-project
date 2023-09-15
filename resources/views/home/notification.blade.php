@extends('adminlte::page')

@section('title', '通知')

@section('content_header')
    <div class="form-group d-flex justify-content-between">
        <h1>通知</h1>
    </div>
@stop

@section('content')

<div class="container d-flex flex-wrap mt-3">
    <div class="card ml-3" style="width: 25rem;">
        <img src="https://jimocoro-cdn.com/ch/jimocoro/wp-content/uploads/2023/03/61117520673f9008a0d6621d47237cb2.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">以下の備品の在庫が少ないです。</h5>
          {{-- <p class="card-text">card's content.</p> --}}
        </div>
        <ul class="list-group list-group-flush">
            @foreach ($items as $item)
            @if ($item->quantity <= 10)
                <li class="list-group-item"><span>⚫︎</span>{{ $item->name }}<span> => 残り </span>{{ $item->quantity }}<span> 個<span></li>
            @endif
            @endforeach
        </ul>
        <div class="d-flex justify-content-center mt-3 mb-3">
            {!! $items->links() !!}
        </div>
        {{-- <div class="card-body">
          <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a>
        </div> --}}
    </div>
    <div class="card ml-5" style="width: 25rem;">
        <img src="https://img.pathee.com/general_images/3157c5022fda2dd4f682757ec12d68f3" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">新規注文履歴</h5>
          {{-- <p class="card-text">card's content.</p> --}}
        </div>
        <ul class="list-group list-group-flush">
            @foreach ($order_items as $order_item)
            
                <li class="list-group-item"><span>⚫︎</span>
                    @foreach ($users as $user)
                        @if ($user->id == $order_item->item->user_id)
                            {{ $user->name }}
                        @endif
                        @endforeach
                    <span> さんが </span>{{ $order_item->item->name }}<span> を</span>
                    {{ $order_item->order }} <span>個発注しました。</span>
                </li>
            @endforeach
        </ul>
        {{-- <div class="d-flex justify-content-center mt-3 mb-3">
            {!! $order_items->links() !!}
        </div> --}}
        {{-- <div class="card-body">
          <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a>
        </div> --}}
    </div>
    <div class="card ml-3" style="width: 25rem;">
        <img src="https://media.istockphoto.com/id/1414378934/ja/%E3%82%B9%E3%83%88%E3%83%83%E3%82%AF%E3%83%95%E3%82%A9%E3%83%88/%E5%A4%9A%E3%81%8F%E3%81%AE%E3%82%AB%E3%83%A9%E3%83%95%E3%83%AB%E3%81%AA%E5%AD%A6%E7%94%A8%E5%93%81%E3%81%A8%E3%83%90%E3%83%83%E3%82%AF%E3%83%91%E3%83%83%E3%82%AF%E3%81%8C%E9%9D%92%E3%81%84%E8%83%8C%E6%99%AF%E3%81%AB%E9%85%8D%E7%BD%AE%E3%81%95%E3%82%8C%E3%81%A6%E3%81%84%E3%81%BE%E3%81%99.jpg?s=1024x1024&w=is&k=20&c=vFk1FmhgLug2-t2WuDBM45s-1K65JYZu0XsdS6wcyhs=" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">入出庫履歴</h5>
          {{-- <p class="card-text">card's content.</p> --}}
        </div>
        <ul class="list-group list-group-flush">
            @foreach ($stockMovements as $stockMovement)
            <li class="list-group-item"><span>⚫︎</span>
                {{ $stockMovement->item->name  }}<span>を</span>
                {{ $stockMovement->quantity }}<span>個</span>
                @if ($stockMovement->movement_type == 1)
                    {{ '出庫' }}
                @else   
                    {{ '入庫' }}
                @endif
                <span>しました。</span>
            </li>
            @endforeach
            {{-- <div class="d-flex justify-content-center mt-3 mb-3">
                {!! $stockMovements->links() !!}
            </div> --}}
        </ul>
        {{-- <div class="card-body">
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div> --}}
        {{-- <div class="d-flex justify-content-center mt-3 mb-3">
            {!! $stockMovements->links() !!}
        </div> --}}
    </div>
</div>




@stop

@section('css')
@stop

@section('js')
    <script src="{{ asset('js/editor.js') }}"></script>
@stop
