@extends('admin.layouts.adminlte')

@section('title')
    Quản trị banners
@endsection

@section('content-header')
    <h1>Quản trị banners</h1>
@endsection

@section('content')

    <div>
        <a href="{{ url('/admin/banners/create') }}" class="btn btn-primary">Thêm banner</a>
    </div>


    <div class="table">
        <h4>Tổng số</h4>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Tên</th>
                <th>Link</th>
                <th>Ảnh</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($banners as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->link }}</td>
                    <td>{{ $item->image }}</td>
                    
                    <td>
                        <a href="{{ url('admin/banners/'.$item->id.'/edit') }}" class="btn btn-warning">Sửa</a>
                        <a href="{{ url('admin/banners/'.$item->id.'/delete') }}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $banners->links() }}
    </div>

@endsection
