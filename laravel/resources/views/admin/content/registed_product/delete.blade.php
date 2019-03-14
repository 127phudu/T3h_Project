@extends('admin.layouts.adminlte')

@section('title')
    Xóa sản phẩm
@endsection

@section('content-header')
    <h1>Không phê duyệt sản phẩm: {{ $product->name }}</h1>
@endsection

@section('content')

    <form  class="form-horizontal" action="{{ url('admin/seller/registed_product/'.$product->id.'/delete') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">Xóa</button>
    </form>


@endsection
