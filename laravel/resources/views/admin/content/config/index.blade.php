@extends('admin.layouts.adminlte')

@section('title')
    Cài đặt
@endsection

@section('content-header')
    <h1>Cấu hình trang web</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form  class="form-horizontal" action="{{ url('/admin/config') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="web_name" class="control-label col-sm-2">Tên trang web: </label>
            <div class="col-sm-10">
                <input type="text" name="web_name" class="form-control" id="web_name" value="{{ $configs['web_name'] }}" required>
            </div>
        </div>
        <div class="form-group">
            <label for="images1" class="control-label col-sm-2">Header logo : </label>
            <div class="col-sm-10">
                <div class="input-group">
                <span class="input-group-btn">
                    <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="lfm-choose btn btn-primary">
                        <i class="fa fa-picture-o"></i> Choose
                    </a>
                </span>
                    <input id="thumbnail1" class="form-control" type="text" name="header_logo" value="{{ $configs['header_logo'] }}" placeholder="Chọn ảnh">
                </div>
                <img id="holder1" src="{{ ($configs['header_logo'] != '') ? asset($configs['header_logo']) : '' }}" style="margin-top:15px;max-height:100px;">
            </div>
        </div>
        <div class="form-group">
            <label for="images1" class="control-label col-sm-2">Footer logo : </label>
            <div class="col-sm-10">
                <div class="input-group">
                <span class="input-group-btn">
                    <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="lfm-choose btn btn-primary">
                        <i class="fa fa-picture-o"></i> Choose
                    </a>
                </span>
                    <input id="thumbnail1" class="form-control" type="text" name="footer_logo" value="{{ $configs['footer_logo'] }}" placeholder="Chọn ảnh">
                </div>
                <img id="holder1" src="{{ ($configs['footer_logo'] != '') ? asset($configs['footer_logo']) : '' }}" style="margin-top:15px;max-height:100px;">
            </div>
        </div>
        <div class="form-group">
            <label for="intro" class="control-label col-sm-2">Giới thiệu: </label>
            <div class="col-sm-10">
                <textarea type="text" name="intro" class="form-control tinymce" id="intro" > {{ $configs['intro'] }} </textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="desc" class="control-label col-sm-2">Mô tả: </label>
            <div class="col-sm-10">
                <textarea type="text" name="desc" class="form-control tinymce" id="desc" > {{ $configs['desc'] }} </textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-default">Lưu</button>
    </form>

    <script src="{{ asset('/vendor/laravel-filemanager/js/lfm.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var domain = "http://localhost/T3h_Project/laravel/public/laravel-filemanager";
            $('.lfm-choose').filemanager('image', {prefix: domain});
        });

    </script>
@endsection