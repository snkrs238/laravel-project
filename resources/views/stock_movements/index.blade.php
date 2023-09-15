@extends('adminlte::page')

@section('title', '入出庫一覧')

@section('content_header')
    <h1>出入庫履歴</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">入出庫検索</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('stock_movements') }}" method="get">
                        <div class="form-group d-flex">
                            <div class="control-group mr-2">
                                <input type="search"  name="keyword" size="100" maxlength="100" value="{{ $keyword }}">
                            </div>
                            <div class="control-group">
                                <input type="submit" class="btn btn-sm btn-primary" value="検索">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center"></div>
            </div>
            <div class="card card-purple">
                <div class="card-header">
                    <h5 class="card-title">入出庫履歴</h5>
                    <h5>{{ ":".$count."件" }}</h5>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>商品名</th>
                                <th>在庫移動</th>
                                <th>移動数量</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $stockMovements as $stockMovement)
                                <tr>
                                    <td>{{ $stockMovement->id }}</td>
                                    <td>
                                        {{ $stockMovement->item->name  }}
                                    </td>
                                    <td>
                                        @if ($stockMovement->movement_type == 1)
                                            {{ '出庫' }}
                                        @else
                                            {{ '入庫' }}
                                        @endif
                                        </td>
                                        <td>{{ $stockMovement->quantity }}</td>
                                    {{-- <td> <button type="submit" class="btn btn-sm btn-danger" formaction="/suppliers/delete/{{ $supplier->id }}">削除</button></td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-center m-3">
                {!! $stockMovements->links() !!}
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="css/modal.css">
@stop

@section('js')
    <script src="{{ asset('js/editor.js') }}"></script>
@stop