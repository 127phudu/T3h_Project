@extends('frontend.layouts.userHome')

@section('title')
    Đăng bán
@endsection

@section('bannerRight')
    <div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_sub" style="padding-top: 0!important;">
        <h3><label style="font-weight: normal">Sửa đăng ký bán sản phẩm</label></h3>
        <br><br>
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form  class="form-horizontal" action="{{ url('seller/product/'.$id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="control-label col-sm-2">Tên: </label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="name" value="{{ $product->name }}" required>
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


                <?php
                $m = json_decode($product->images);

                $images = isset( $m ) ? $m : array();
                $i = 1;
                ?>

                @foreach($images as $image)
                    <div class="form-group">
                        <label for="delete{{$i}}" class="control-label col-sm-2">Ảnh {{$i}}: </label>
                        <div class="col-sm-5">
                            <div class="input-group">
                                <div>
                                    <img src="{{asset($image)}}" style="width: 70%">
                                </div>
                                <div>
                                    <input class="lfm-btn" type="checkbox" name="delete[]" value="{{$i-1}}">Xóa
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $i++; ?>
                @endforeach


                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Thêm ảnh</label>
                    <div class="col-sm-8">
                        <a id="plus-image" class="btn btn-default">
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
                        <input type="datetime-local" name="finish" class="form-control" id="finish" value="{{ $finish }}"  required>
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

                <div class="form-group">
                    <div  class="control-label col-sm-5">
                    </div>
                    <button  type="submit" class="btn btn-vimeo">Submit</button>

                </div>

            </form>

            <script src="{{ asset('/vendor/laravel-filemanager/js/lfm.js') }}"></script>
            <script type="text/javascript">
                $(document).ready(function () {

                    $('#plus-image').on('click', function (e) {
                        e.preventDefault();

                        var html= '';

                        var lfm_btn_length = $('.lfm-btn').length;
                        var lfm_btn_id_next = lfm_btn_length + 1;

                        for(var i = 1; i < 1000; i++) {
                            if ($('#lfm'+lfm_btn_id_next).length < 1) {
                                html += '<div class="form-group">\n' +
                                    '                    <label for="images'+lfm_btn_id_next+'" class="control-label col-sm-2">Ảnh '+lfm_btn_id_next+': </label>\n' +
                                    '                    <div class="col-sm-5">\n' +
                                    '                        <div class="input-group">\n' +
                                    '                            <span class="input-group-btn">\n' +
                                    '                                <input id="thumbnail'+lfm_btn_id_next+'" class="form-control lfm-btn" type="file" name="images[]" value="" placeholder="Chọn ảnh">\n' +
                                    '                                <a class="btn btn-warning remove-image">\n' +
                                    '                                    <i class="fa fa-remove"> Xóa</i>\n' +
                                    '                                </a>\n' +
                                    '                            </span>\n' +
                                    '                        </div>\n' +
                                    '                    </div>\n' +
                                    '                </div>';
                                break;
                            }
                            lfm_btn_id_next ++;
                        }


                        var box = $(this).closest('.form-group');

                        $( html ).insertBefore( box );

                    });

                    $('body').on('click', '.remove-image', function (e) {
                        e.preventDefault();
                        $(this).closest('.form-group').remove();
                    });
                });

            </script>
        </div>

    </div>

@endsection