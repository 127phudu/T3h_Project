@extends('admin.layouts.adminlte')

@section('title')
    Sửa sản phẩm
@endsection

@section('content-header')
    <h1>Sửa sản phẩm</h1>
@endsection

@section('content')

    <form  class="form-horizontal" action="{{ url('admin/shop/product/'.$product->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name" class="control-label col-sm-2">Tên: </label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name" value="{{ $product->name }}" required>
                <input type="hidden" name="user_id" class="form-control" id="user_id" value="{{ $product->user_id }}" required>
            </div>
        </div>
        <div class="form-group">
            <label for="cat_id" class="control-label col-sm-2">Danh mục: </label>
            <div class="col-sm-10">
                <select name="cat_id">
                    <option value="0">Không có danh mục</option>
                    @foreach($cats as $cat)
                        <option value="{{ $cat->id }}" @if ($cat->id == $product->cat_id) {{ 'selected' }} @endif>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="slug" class="control-label col-sm-2">Slug: </label>
            <div class="col-sm-10">
                <input type="text" name="slug" class="form-control" id="slug" value="{{ $product->slug }}">
            </div>
        </div>

        <div class="form-group">
            <label for="recommend" class="control-label col-sm-2">Đề nghị: </label>
            <div class="col-sm-10">
                <select name="recommend">
                    <option value="0" {{ ($product->recommend == 0) ? 'selected': '' }}>Không</option>
                    <option value="1" {{ ($product->recommend == 1) ? 'selected': '' }}>Có</option>
                </select>
            </div>
        </div>


    <?php
            $m = json_decode($product->images);

            $images = isset( $m ) ? $m : array();
            $i = 0;
        ?>

        @foreach($images as $image)
            <?php $i++; ?>
            <div class="form-group">
                <label for="images{{ $i }}" class="control-label col-sm-2">Ảnh {{ $i }}: </label>
                <div class="col-sm-10">
                    <div class="input-group">
                    <span class="input-group-btn">
                        <a id="lfm{{ $i }}" data-input="thumbnail{{ $i }}" data-preview="holder{{ $i }}" class="lfm-choose btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                        </a>
                        <a class="btn btn-warning remove-image">
                            <i class="fa fa-remove"> Xóa</i>
                        </a>
                    </span>
                        <input id="thumbnail{{ $i }}" class="form-control" type="text" name="images[]" value="{{ $image }}" placeholder="Chọn ảnh">
                    </div>
                    <img id="holder{{ $i }}" src="{{ asset($image) }}" style="margin-top:15px;max-height:100px;">
                </div>
            </div>
        @endforeach


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
                <input type="text" name="priceFirst" class="form-control" id="priceFirst" value="{{ $product->priceFirst }}" required>
            </div>
        </div>
        <?php
            $finish = str_replace(' ', 'T', $product->finish);
            $finish = substr($finish, 0, -1);
            $finish = substr($finish, 0, -1);
            $finish = substr($finish, 0, -1);
        ?>
        <div class="form-group">
            <label for="finish" class="control-label col-sm-2">Ngày kết thúc: </label>
            <div class="col-sm-4">
                <input type="datetime-local" name="finish" class="form-control" id="finish" value="{{ $finish }}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="intro" class="control-label col-sm-2">Giới thiệu: </label>
            <div class="col-sm-10">
                <textarea type="text" name="intro" class="form-control tinymce" id="intro" > {{ $product->intro }} </textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="desc" class="control-label col-sm-2">Mô tả: </label>
            <div class="col-sm-10">
                <textarea type="text" name="desc" class="form-control tinymce" id="desc" > {{ $product->desc }} </textarea>
            </div>
        </div>


        <button type="submit" class="btn btn-default">Submit</button>
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
