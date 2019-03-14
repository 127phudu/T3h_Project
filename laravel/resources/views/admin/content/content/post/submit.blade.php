@extends('admin.layouts.adminlte')

@section('title')
    Thêm bài viết
@endsection

@section('content-header')
    <h1>Thêm bài viết</h1>
@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form  class="form-horizontal" action="{{ url('admin/content/post') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name" class="control-label col-sm-2">Tên: </label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
            </div>
        </div>
        <div class="form-group">
            <label for="cat_id" class="control-label col-sm-2">Danh mục: </label>
            <div class="col-sm-10">
                <select name="cat_id">
                    <option value="0">Không có danh mục</option>
                    @foreach($cats as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="tag_id" class="control-label col-sm-2">Tag: </label>
            <div class="col-sm-10">
                <select name="tag_id">
                    <option value="0">Không có tag</option>
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="slug" class="control-label col-sm-2">Slug: </label>
            <div class="col-sm-10">
                <input type="text" name="slug" class="form-control" id="slug" value="{{ old('slug') }}">
            </div>

        </div>
        <div class="form-group">
            <label for="images1" class="control-label col-sm-2">Ảnh: </label>
            <div class="col-sm-10">
                <div class="input-group">
                <span class="input-group-btn">
                    <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="lfm-choose btn btn-primary">
                        <i class="fa fa-picture-o"></i> Choose
                    </a>
                </span>
                    <input id="thumbnail1" class="form-control" type="text" name="images" value="{{ old('images') }}" placeholder="Chọn ảnh">
                </div>
                <img id="holder1" src="" style="margin-top:15px;max-height:100px;">
            </div>
        </div>
        <div class="form-group">
            <label for="intro" class="control-label col-sm-2">Giới thiệu: </label>
            <div class="col-sm-10">
                <textarea type="text" name="intro" class="form-control tinymce" id="intro"  required> {{ old('intro') }} </textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="desc" class="control-label col-sm-2">Mô tả: </label>
            <div class="col-sm-10">
                <textarea type="text" name="desc" class="form-control tinymce" id="desc"  required> {{ old('desc') }} </textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>

    <script src="{{ asset('/vendor/laravel-filemanager/js/lfm.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var domain = "http://localhost/T3h_Project/laravel/public/laravel-filemanager";
            $('.lfm-choose').filemanager('image', {prefix: domain});
        });

    </script>

@endsection
