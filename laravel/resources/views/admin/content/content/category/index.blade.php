@extends('admin.layouts.adminlte')

@section('title')
    Quản trị danh mục bài viết
@endsection

@section('content-header')
    <h1>Quản trị danh mục bài viết</h1>
@endsection

@section('content')

    <div>
        <a href="{{ url('/admin/content/category/create') }}" class="btn btn-primary">Thêm danh mục</a>
    </div>


    <div class="table">
        <h4>Tổng số: <?php echo count($cats); ?></h4>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Tên</th>
                <th>Slug</th>
                <th>Ảnh</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cats as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->slug }}</td>
                    <td>{{ $item->images }}</td>
                    <td>
                        <a href="{{ url('admin/content/category/'.$item->id.'/edit') }}" class="btn btn-warning">Sửa</a>
                        <a href="{{ url('admin/content/category/'.$item->id.'/delete') }}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $cats->links() }}
    </div>

@endsection
