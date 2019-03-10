@extends('admin.layouts.adminlte')

@section('title')
    Quản trị đơn hàng
@endsection

@section('content-header')

@endsection

@section('content')
    <div class="table">
        <h4>Tổng số</h4>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Tên</th>
                <th>SĐT</th>
                <th>Email</th>
                <th>Giá</th>

                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($orders as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->customer_name }}</td>
                    <td>{{ $item->customer_phone }}</td>
                    <td>{{ $item->customer_email }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        <a href="{{ url('admin/shop/order/'.$item->id.'/edit') }}" class="btn btn-warning">Sửa</a>
                        <a href="{{ url('admin/shop/order/'.$item->id.'/delete') }}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $orders->links() }}
    </div>
@endsection