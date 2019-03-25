@extends('admin.layouts.adminlte')

@section('title')
    Quản trị nhãn hiệu
@endsection

@section('content-header')
    <h1>Quản trị nhãn hiệu</h1>
@endsection

@section('content')
    <div>
        <a href="{{ url('/admin/shop/brand/create') }}" class="btn btn-primary">Thêm nhãn hiệu</a>
    </div>


    <div class="table">
        <h4>Tổng số: <?php echo count($brands); ?></h4>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Tên</th>
                <th>Ảnh</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($brands as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->image }}</td>
                    <td>
                        <a href="{{ url('admin/shop/brand/'.$item->id.'/edit') }}" class="btn btn-warning">Sửa</a>
                        <a href="{{ url('admin/shop/brand/'.$item->id.'/delete') }}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $brands->links() }}
    </div>
@endsection