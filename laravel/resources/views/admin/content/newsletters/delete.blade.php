@extends('admin.layouts.adminlte')

@section('title')
    Xóa newsletter
@endsection

@section('content-header')
    <h1>Xóa newsletter: {{ $newsletter->name }}</h1>
@endsection

@section('content')

    <form  class="form-horizontal" action="{{ url('admin/newsletters/'.$newsletter->id.'/delete') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">Xóa</button>
    </form>


@endsection
