@extends('admin.layouts.adminlte')

@section('title')
    Xóa đơn hàng
@endsection

@section('content-header')
    <h1>Xóa đơn hàng: {{ $order->name }}</h1>
@endsection

@section('content')

    <form  class="form-horizontal" action="{{ url('admin/shop/order/'.$order->id.'/delete') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">Xóa</button>
    </form>


@endsection
