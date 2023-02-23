@extends('adminlte::page')

@section('title', 'お問い合わせ一覧')

@section('content_header')
    <h1>お問い合わせ一覧</h1>
@stop

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">お問い合わせ一覧</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>氏名</th>
                                <th>件名</th>
                                <th>登録日時</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contact_forms as $contact)
                                <tr>
                                    <td>{{ $contact->id }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->title }}</td>
                                    <td>{{ $contact->created_at }}</td>
                                    <td>
                                        <form action="/" method="get">
                                            <button type="button" class="btn btn-sm btn-primary">詳細</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@stop