@extends('admin.layouts.adminlte')

@section('title')
    Quản trị newsletters
@endsection

@section('content-header')
    <h1>Quản trị newsletters</h1>
@endsection

@section('content')

    <div>
        <a href="{{ url('/admin/newsletters/create') }}" class="btn btn-primary">Thêm newsletter</a>
    </div>


    <div class="table">
        <h4>Tổng số</h4>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <td>Email</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach ($newsletters as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        <a href="{{ url('admin/newsletters/'.$item->id.'/edit') }}" class="btn btn-warning">Sửa</a>
                        <a href="{{ url('admin/newsletters/'.$item->id.'/delete') }}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $newsletters->links() }}
    </div>

@endsection
