@extends('admin.layouts.adminlte')

@section('title')
    Xóa banner
@endsection

@section('content-header')
    <h1>Xóa banner: {{ $banner->name }}</h1>
@endsection

@section('content')

    <form  class="form-horizontal" action="{{ url('admin/banners/'.$banner->id.'/delete') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">Xóa</button>
    </form>


@endsection
