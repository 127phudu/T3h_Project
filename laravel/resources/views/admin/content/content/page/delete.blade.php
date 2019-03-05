@extends('admin.layouts.adminlte')

@section('title')
    Xóa trang
@endsection

@section('content-header')
    <h1>Xóa trang: {{ $page->name }}</h1>
@endsection

@section('content')

    <form  class="form-horizontal" action="{{ url('admin/content/page/'.$page->id.'/delete') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">Xóa</button>
    </form>


@endsection
