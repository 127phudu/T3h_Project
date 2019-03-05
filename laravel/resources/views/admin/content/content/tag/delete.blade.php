@extends('admin.layouts.adminlte')

@section('title')
    Xóa tag
@endsection

@section('content-header')
    <h1>Xóa tag: {{ $tag->name }}</h1>
@endsection

@section('content')

    <form  class="form-horizontal" action="{{ url('admin/content/tag/'.$tag->id.'/delete') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">Xóa</button>
    </form>


@endsection
