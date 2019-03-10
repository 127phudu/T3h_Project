@extends('admin.layouts.adminlte')

@section('title')
    Thêm sản phẩm
@endsection

@section('content-header')
    <h1>Thêm sản phẩm</h1>
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
    <form  class="form-horizontal" action="{{ url('admin/shop/product') }}" method="post">
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
            <label for="slug" class="control-label col-sm-2">Slug: </label>
            <div class="col-sm-10">
                <input type="text" name="slug" class="form-control" id="slug" value="{{ old('slug') }}">
            </div>
        </div>


        <div class="form-group">
            <label for="images1" class="control-label col-sm-2">Ảnh 1: </label>
            <div class="col-sm-10">
                <div class="input-group">
                <span class="input-group-btn">
                    <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="lfm-choose btn btn-primary">
                        <i class="fa fa-picture-o"></i> Choose
                    </a>
                    <a class="btn btn-warning remove-image">
                        <i class="fa fa-remove"> Xóa</i>
                    </a>
                </span>
                    <input id="thumbnail1" class="form-control" type="text" name="images[]" value="" placeholder="Chọn ảnh">
                </div>
                <img id="holder1" src="" style="margin-top:15px;max-height:100px;">
            </div>
        </div>


        <div class="form-group">
            <label for="focusedinput" class="col-sm-2 control-label">Thêm ảnh</label>
            <div class="col-sm-8">
                <a id="plus-image" class="btn btn-vimeo">
                    <i class="fa fa-plus"></i> Thêm
                </a>
            </div>
        </div>

        <div class="form-group">
            <label for="priceFirst" class="control-label col-sm-2">Giá khởi điểm: </label>
            <div class="col-sm-10">
                <input type="text" name="priceFirst" class="form-control" id="priceFirst" value="{{ old('priceFirst') }}" required>
            </div>
        </div>
        <div class="form-group">
            <label for="finish" class="control-label col-sm-2">Ngày kết thúc: </label>
            <div class="col-sm-4">
                <input type="datetime-local" name="finish" class="form-control" id="finish" value="{{ old('finish') }}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="intro" class="control-label col-sm-2">Giới thiệu: </label>
            <div class="col-sm-10">
                <textarea type="text" name="intro" class="form-control tinymce" id="intro" > {{ old('intro') }} </textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="desc" class="control-label col-sm-2">Mô tả: </label>
            <div class="col-sm-10">
                <textarea type="text" name="desc" class="form-control tinymce" id="desc" > {{ old('desc') }} </textarea>
            </div>
        </div>

        <div class="form-group">
            <div  class="control-label col-sm-5">
            </div>
            <button  type="submit" class="btn btn-vimeo">Submit</button>

        </div>

    </form>

    <script src="{{ asset('/vendor/laravel-filemanager/js/lfm.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var domain = "http://localhost/T3h_Project/laravel/public/laravel-filemanager";
            $('.lfm-choose').filemanager('image', {prefix: domain});

            $('#plus-image').on('click', function (e) {
                e.preventDefault();

                var html= '';

                var lfm_btn_length = $('.lfm-btn').length;
                var lfm_btn_id_next = + 1;

                for(var i = 1; i < 1000; i++) {
                    if ($('#lfm'+lfm_btn_id_next).length < 1) {
                        html += '<div class="form-group">\n' +
                            '            <label for="images'+lfm_btn_id_next+'" class="control-label col-sm-2">Ảnh '+lfm_btn_id_next+': </label>\n' +
                            '            <div class="col-sm-10">\n' +
                            '                <div class="input-group">\n' +
                            '                    <span class="input-group-btn">\n' +
                            '                        <a id="lfm'+lfm_btn_id_next+'" data-input="thumbnail'+lfm_btn_id_next+'" data-preview="holder'+lfm_btn_id_next+'" class="lfm-choose btn btn-primary">\n' +
                            '                            <i class="fa fa-picture-o"></i> Choose\n' +
                            '                        </a>\n' +
                            '                        <a class="btn btn-warning remove-image">\n' +
                            '                            <i class="fa fa-remove"> Xóa</i>\n' +
                            '                        </a>\n' +
                            '                    </span>\n' +
                            '                    <input id="thumbnail'+lfm_btn_id_next+'" class="form-control" type="text" name="images[]" value="" placeholder="Chọn ảnh">\n' +
                            '                </div>\n' +
                            '                <img id="holder'+lfm_btn_id_next+'" style="margin-top:15px;max-height:100px;">\n' +
                            '            </div>\n' +
                            '        </div>';
                        break;
                    }
                    lfm_btn_id_next ++;
                }


                var box = $(this).closest('.form-group');

                $( html ).insertBefore( box );

                var domain = "http://localhost/T3h_Project/laravel/public/laravel-filemanager";
                $('.lfm-choose').filemanager('image', {prefix: domain});
            });

            $('body').on('click', '.remove-image', function (e) {
                e.preventDefault();
                $(this).closest('.form-group').remove();
            });
        });

    </script>
@endsection
