@extends('admin.layouts.adminlte')

@section('title')
    Phê duyệt sản phẩm
@endsection

@section('content-header')
    <h1>Phê duyệt sản phẩm</h1>
@endsection

@section('content')

    <div class="table">
        <h4>Tổng số</h4>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Tên</th>
                <th style="width: 100px; text-align: center">Ảnh</th>
                <th>Giá hiện tại</th>
                <th>Giá khởi điểm</th>
                <th>Người bán</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <?php
                            $images = isset($item->images) ? json_decode($item->images) : array();
                        ?>
                        @if (!empty($images))
                            <img src="{{ asset($images[0]) }}" style="max-width: 100px">
                        @endif

                    </td>
                    <td>{{ $item->priceFirst }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->seller_id }}</td>
                    <td>
                        <a href="{{ url('admin/seller/registed_product/'.$item->id.'/approved') }}" class="btn btn-success">Duyệt</a>
                        <a href="{{ url('admin/seller/registed_product/'.$item->id.'/edit') }}" class="btn btn-warning">Sửa</a>
                        <a href="{{ url('admin/seller/registed_product/'.$item->id.'/delete') }}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>

@endsection
