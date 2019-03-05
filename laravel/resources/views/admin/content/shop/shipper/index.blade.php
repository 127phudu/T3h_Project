@extends('admin.layouts.adminlte')

@section('title')
    Quản trị nhà vận chuyển
@endsection

@section('content-header')
    <h1>Quản trị nhà vận chuyển</h1>

@endsection

@section('content')
    <div>
        <a href="{{ url('/admin/shop/shipper/create') }}" class="btn btn-primary">Thêm khách hàng</a>
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
            @foreach ($shippers as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        <a href="{{ url('admin/shop/shipper/'.$item->id.'/edit') }}" class="btn btn-warning">Sửa</a>
                        <a href="{{ url('admin/shop/shipper/'.$item->id.'/delete') }}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $shippers->links() }}
    </div>
@endsection