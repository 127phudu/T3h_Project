@extends('admin.layouts.adminlte')

@section('title')
    Quản trị menu
@endsection

@section('content-header')
    <h1>Quản trị menu</h1>
@endsection

@section('content')

    <div>
        <a href="{{ url('/admin/menu/create') }}" class="btn btn-primary">Thêm menu</a>
    </div>


    <div class="table">
        <h4>Tổng số</h4>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Tên</th>
                <th>Slug</th>
                <th>Mô tả</th>
                <th>Vị trí</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($menus as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->slug }}</td>
                    <td>{{ $item->desc }}</td>
                    <td>
                        @if($item->location > 0)
                            {{ $locations[$item->location] }}
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('admin/menu/'.$item->id.'/edit') }}" class="btn btn-warning">Sửa</a>
                        <a href="{{ url('admin/menu/'.$item->id.'/delete') }}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $menus->links() }}
    </div>

@endsection
