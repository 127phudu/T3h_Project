@extends('admin.layouts.adminlte')

@section('title')
    Xóa nhãn hiệu
@endsection

@section('content-header')
    <h1>Xóa nhãn hiệu: {{ $brand->name }}</h1>
@endsection

@section('content')

    <form  class="form-horizontal" action="{{ url('admin/shop/brand/'.$brand->id.'/delete') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">Xóa</button>
    </form>


@endsection
