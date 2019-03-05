@extends('admin.layouts.adminlte')

@section('title')
    Sửa danh mục
@endsection

@section('content-header')
    <h1>Xóa danh mục: {{ $cat->name }}</h1>
@endsection

@section('content')

    <form  class="form-horizontal" action="{{ url('admin/content/category/'.$cat->id.'/delete') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">Xóa</button>
    </form>

@endsection
