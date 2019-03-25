@extends('admin.layouts.adminlte')

@section('title')
    Xóa khách hàng
@endsection

@section('content-header')
    <h1>Xóa khách hàng: {{ $customer->name }}</h1>
@endsection

@section('content')

    <form  class="form-horizontal" action="{{ url('admin/shop/customer/'.$customer->id.'/delete') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">Xóa</button>
    </form>


@endsection
