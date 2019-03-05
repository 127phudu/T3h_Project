@extends('admin.layouts.adminlte')

@section('title')
    Xóa menu item
@endsection

@section('content-header')
    <h1>Xóa menuitem: {{ $menuitem->name }}</h1>
@endsection

@section('content')

    <form  class="form-horizontal" action="{{ url('admin/menuitems/'.$menuitem->id.'/delete') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">Xóa</button>
    </form>


@endsection
