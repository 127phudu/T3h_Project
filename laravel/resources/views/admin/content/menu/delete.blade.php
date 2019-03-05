@extends('admin.layouts.adminlte')

@section('title')
    Xóa menu
@endsection

@section('content-header')
    <h1>Xóa menu: {{ $menu->name }}</h1>
@endsection

@section('content')

    <form  class="form-horizontal" action="{{ url('admin/menu/'.$menu->id.'/delete') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">Xóa</button>
    </form>


@endsection
