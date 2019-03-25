@extends('admin.layouts.adminlte')

@section('title')
    Quản trị trang
@endsection

@section('content-header')
    <h1>Quản trị trang</h1>
@endsection

@section('content')

    <div>
        <a href="{{ url('/admin/content/page/create') }}" class="btn btn-primary">Thêm trang</a>
    </div>


    <div class="table">
        <h4>Tổng số: <?php echo count($pages); ?></h4>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Tên</th>
                <th>Slug</th>
                <th>Ảnh</th>
                <th>Tác giả</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($pages as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->slug }}</td>
                    <td>{{ $item->images }}</td>
                    <td>{{ $item->author_id }}</td>
                    <td>
                        <a href="{{ url('admin/content/page/'.$item->id.'/edit') }}" class="btn btn-warning">Sửa</a>
                        <a href="{{ url('admin/content/page/'.$item->id.'/delete') }}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $pages->links() }}
    </div>

@endsection
