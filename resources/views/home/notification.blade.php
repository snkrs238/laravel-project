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
        <div class="d-flex justify-content-center mt-3 mb-3">
            {!! $order_items->links() !!}
        </div>
        {{-- <div class="card-body">
          <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a>
        </div> --}}
    </div>
    <div class="card ml-3" style="width: 25rem;">
        <img src="https://jimocoro-cdn.com/ch/jimocoro/wp-content/uploads/2023/03/61117520673f9008a0d6621d47237cb2.jpg" class="card-img-top" alt="...">
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
        <div class="d-flex justify-content-center mt-3 mb-3">
            {!! $stockMovements->links() !!}
        </div>
    </div>
</div>




@stop

@section('css')
@stop

@section('js')
    <script src="{{ asset('js/editor.js') }}"></script>
@stop
