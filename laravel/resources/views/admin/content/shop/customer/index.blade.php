@extends('admin.layouts.adminlte')

@section('title')
    Quản trị khách hàng
@endsection

@section('content-header')
    <h1>Quản trị khách hàng</h1>

@endsection

@section('content')

    <div class="table">
        <h4>Tổng số: <?php echo count($customers); ?></h4>
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
            @foreach ($customers as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        <a href="{{ url('admin/shop/customer/'.$item->id.'/edit') }}" class="btn btn-warning">Sửa</a>
                        <a href="{{ url('admin/shop/customer/'.$item->id.'/delete') }}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $customers->links() }}
    </div>

@endsection