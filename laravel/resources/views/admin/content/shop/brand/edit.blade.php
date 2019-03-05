@extends('admin.layouts.adminlte')

@section('title')
    Sửa nhãn hiệu
@endsection

@section('content-header')
    <h1>Sửa nhãn hiệu</h1>
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
    <form  class="form-horizontal" action="{{ url('admin/shop/brand/'.$brand->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name" class="control-label col-sm-2">Tên: </label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name" value="{{ $brand->name }}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="link" class="control-label col-sm-2">Link: </label>
            <div class="col-sm-10">
                <input type="text" name="link" class="form-control" id="link" value="{{ $brand->link }}" required>
            </div>

        </div>

        <div class="form-group">
            <label for="image" class="control-label col-sm-2">Ảnh: </label>
            <div class="col-sm-10">
                <div class="input-group">
                <span class="input-group-btn">
                    <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="lfm-choose btn btn-primary">
                        <i class="fa fa-picture-o"></i> Choose
                    </a>
                </span>
                    <input id="thumbnail1" class="form-control" type="text" name="image" value="{{ $brand->image }}" placeholder="Chọn ảnh">
                </div>
                <img id="holder1" src="{{ asset($brand->image) }}" style="margin-top:15px;max-height:100px;">

            </div>
        </div>

        <div class="form-group">
            <label for="intro" class="control-label col-sm-2">Giới thiệu: </label>
            <div class="col-sm-10">
                <textarea type="text" name="intro" class="form-control tinymce" id="intro"  required> {{ $brand->intro }} </textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="desc" class="control-label col-sm-2">Mô tả: </label>
            <div class="col-sm-10">
                <textarea type="text" name="desc" class="form-control tinymce" id="desc"  required> {{ $brand->desc }} </textarea>
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
