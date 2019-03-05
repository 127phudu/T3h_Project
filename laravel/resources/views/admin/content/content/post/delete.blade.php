@extends('admin.layouts.adminlte')

@section('title')
    Xóa bài viết
@endsection

@section('content-header')
    <h1>Xóa bài viết: {{ $post->name }}</h1>
@endsection

@section('content')

    <form  class="form-horizontal" action="{{ url('admin/content/post/'.$post->id.'/delete') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">Xóa</button>
    </form>


@endsection
