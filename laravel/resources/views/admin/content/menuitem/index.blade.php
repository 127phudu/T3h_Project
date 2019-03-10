@extends('admin.layouts.adminlte')

@section('title')
    Quản trị menuitem
@endsection

@section('content-header')
    <h1>Quản trị menuitem</h1>
@endsection

@section('content')

    <div>
        <a href="{{ url('/admin/menuitems/create') }}" class="btn btn-primary">Thêm menuitem</a>
    </div>


    <div class="table">
        <h4>Tổng số</h4>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Tên</th>
                <th>Kiểu</th>
                <th>Liên kết</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($menuitems as $item)
                <tr>
                    <td>{{ $item['id'] }}</td>
                    <td>{{ str_repeat('-', $item['level']-1).$item['name'] }}</td>
                    <td>{{ $item['type'] }}</td>
                    <td>{{ $item['link'] }}</td>
                    <td>
                        <a href="{{ url('admin/menuitems/'.$item['id'].'/edit') }}" class="btn btn-warning">Sửa</a>
                        <a href="{{ url('admin/menuitems/'.$item['id'].'/delete') }}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
