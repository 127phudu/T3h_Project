@extends('admin.layouts.adminlte')

@section('title')
    Quản trị sản phẩm
@endsection

@section('content-header')
    <h1>Quản trị sản phẩm</h1>
@endsection

@section('content')

    <div>
        <a href="{{ url('/admin/shop/product/create') }}" class="btn btn-primary">Thêm sản phẩm</a>
    </div>


    <div class="table">
        <h4>Tổng số</h4>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Tên</th>
                <th>Slug</th>
                <th style="width: 100px; text-align: center">Ảnh</th>
                <th>Giá niêm yết</th>
                <th>Giá bán</th>
                <th>Tồn kho</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->slug }}</td>
                    <td>
                        <?php
                            $images = isset($item->images) ? json_decode($item->images) : array();
                        ?>
                        @if (!empty($images))
                            <img src="{{ asset($images[0]) }}" style="max-width: 100px">
                        @endif

                    </td>
                    <td>{{ $item->priceCore }}</td>
                    <td>{{ $item->priceSale }}</td>
                    <td>{{ $item->quantityInStock }}</td>
                    <td>
                        <a href="{{ url('admin/shop/product/'.$item->id.'/edit') }}" class="btn btn-warning">Sửa</a>
                        <a href="{{ url('admin/shop/product/'.$item->id.'/delete') }}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>

@endsection
