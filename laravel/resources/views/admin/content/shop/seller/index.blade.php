@extends('admin.layouts.adminlte')

@section('title')
    Quản trị nhà cung cấp
@endsection

@section('content-header')
    <h1>Quản trị nhà cung cấp</h1>

@endsection

@section('content')
    <div>
        <a href="{{ url('/admin/shop/seller/create') }}" class="btn btn-primary">Thêm khách hàng</a>
    </div>


    <div class="table">
        <h4>Tổng số</h4>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($sellers as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        <a href="{{ url('admin/shop/seller/'.$item->id.'/edit') }}" class="btn btn-warning">Sửa</a>
                        <a href="{{ url('admin/shop/seller/'.$item->id.'/delete') }}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $sellers->links() }}
    </div>
@endsection