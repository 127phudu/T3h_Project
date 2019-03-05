@extends('admin.layouts.adminlte')

@section('title')
    Sửa menuitem
@endsection

@section('content-header')
    <h1>Sửa menuitem</h1>
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
    <form  class="form-horizontal" action="{{ url('admin/menuitems/'.$id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name" class="control-label col-sm-2">Tên: </label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name" value="{{ $menuitem->name }}" required>
            </div>
        </div>
        <div class="form-group">
            <label for="sort" class="control-label col-sm-2">Sắp xếp: </label>
            <div class="col-sm-10">
                <input type="text" name="sort" class="form-control" id="sort" value="{{ $menuitem->sort }}" required>
            </div>
        </div>
        <div class="form-group">
            <label for="menu-type" class="control-label col-sm-2">Kiểu menu: </label>
            <div class="col-sm-10">
                <select id="menu-type" name="type">
                    @foreach($types as $type_id => $type)
                        <option value="{{ $type_id }}" data-type="type-{{ $type_id }}" {{ ($type_id == $menuitem->type) ? 'selected' : '' }}>- {{ $type }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <?php
            $params = (array)json_decode($menuitem->params);
            $params[1] = isset($params[1]) ? $params[1] : 0;
            $params[2] = isset($params[2]) ? $params[2] : 0;
            $params[3] = isset($params[3]) ? $params[3] : 0;
            $params[4] = isset($params[4]) ? $params[4] : 0;
            $params[5] = isset($params[5]) ? $params[5] : 0;
            $params[6] = isset($params[6]) ? $params[6] : 0;
            $params[7] = isset($params[7]) ? $params[7] : '';
        ?>

        <div id="type-1" class="form-group menu-type">
            <label for="" class="control-label col-sm-2">Shop category: </label>
            <div class="col-sm-10">
                <select name="param_1">
                    <option value="0">Chưa chọn</option>
                    @foreach($shop_categories as $shop_category)
                        <option value="{{ $shop_category->id }}" {{ ($shop_category->id == $params[1]) ? 'selected' : ''  }}>{{ $shop_category->id }} - {{ $shop_category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div id="type-2" class="form-group menu-type">
            <label for="" class="control-label col-sm-2">Shop product: </label>
            <div class="col-sm-10">
                <select name="param_2">
                    <option value="0">Chưa chọn</option>
                    @foreach($shop_products as $shop_product)
                        <option value="{{ $shop_product->id }}" {{ ($shop_product->id == $params[2]) ? 'selected' : ''  }}>{{ $shop_product->id }} - {{ $shop_product->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div id="type-3" class="form-group menu-type">
            <label for="" class="control-label col-sm-2">Content category: </label>
            <div class="col-sm-10">
                <select name="param_3">
                    <option value="0">Chưa chọn</option>
                    @foreach($content_categories as $content_category)
                        <option value="{{ $content_category->id }}" {{ ($content_category->id == $params[3]) ? 'selected' : ''  }}>{{ $content_category->id }} - {{ $content_category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div id="type-4" class="form-group menu-type">
            <label for="" class="control-label col-sm-2">Content post: </label>
            <div class="col-sm-10">
                <select name="param_4">
                    <option value="0">Chưa chọn</option>
                    @foreach($content_posts as $content_post)
                        <option value="{{ $content_post->id }}" {{ ($content_post->id == $params[4]) ? 'selected' : ''  }}>{{ $content_post->id }} - {{ $content_post->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div id="type-5" class="form-group menu-type">
            <label for="" class="control-label col-sm-2">Content page: </label>
            <div class="col-sm-10">
                <select name="param_5">
                    <option value="0">Chưa chọn</option>
                    @foreach($content_pages as $content_page)
                        <option value="{{ $content_page->id }}" {{ ($content_page->id == $params[5]) ? 'selected' : ''  }}>{{ $content_page->id }} - {{ $content_page->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div id="type-6" class="form-group menu-type">
            <label for="" class="control-label col-sm-2">Content tag: </label>
            <div class="col-sm-10">
                <select name="param_6">
                    <option value="0">Chưa chọn</option>
                    @foreach($content_tags as $content_tag)
                        <option value="{{ $content_tag->id }}" {{ ($content_tag->id == $params[6]) ? 'selected' : ''  }}>{{ $content_tag->id }} - {{ $content_tag->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div id="type-7" class="form-group menu-type">
            <label for="" class="control-label col-sm-2">Custom link: </label>
            <div class="col-sm-10">
                <input name="param_7" class="form-control" placeholder="EX: google.com" value="{{ $params[7] }}">
            </div>
        </div>

        <div class="form-group">
            <label for="link" class="control-label col-sm-2">Final Link: </label>
            <div class="col-sm-10">
                <input type="text" name="link" readonly class="form-control" id="link" value="{{ $menuitem->link }}" placeholder="Auto fill link" required>
            </div>
        </div>
        <div class="form-group">
            <label for="icon" class="control-label col-sm-2">Icon: </label>
            <div class="col-sm-10">
                <input type="text" name="icon" class="form-control" id="icon" value="{{ $menuitem->icon }}" placeholder="EX: fa fa-shop" required>
            </div>
        </div>
        <div class="form-group">
            <label for="parent_id" class="control-label col-sm-2">Cha: </label>
            <div class="col-sm-10">
                <select name="parent_id">
                    <option value="0">Không có cha</option>
                    @foreach($menuitems as $item)
                        <option value="{{ $item['id'] }}"  {{ ($item['id'] == $menuitem->parent_id) ? 'selected' : '' }}>{{ str_repeat('--', $item['level']).$item['name'] }}</option>
                    @endforeach
                </select>
                {{--<input type="text" name="parent_id">--}}
            </div>
        </div>
        <div class="form-group">
            <label for="menu_id" class="control-label col-sm-2">Thuộc menu: </label>
            <div class="col-sm-10">
                <select name="menu_id">
                    <option >Chưa chọn</option>
                    @foreach($menus as $menu)
                        <option value="{{ $menu->id }}" {{ ($menu->id == $menuitem->menu_id) ? 'selected' : '' }}>{{ $menu->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="desc" class="control-label col-sm-2">Mô tả: </label>
            <div class="col-sm-10">
                <textarea type="text" name="desc" class="form-control tinymce" id="desc" required> {{ $menuitem->desc }} </textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>

    <script type="text/javascript">
        $(document).ready(function () {

            $('.menu-type').hide();

            var current_type = $('#menu-type').find('option:selected').data('type');

            $('.menu-type').hide();
            if ($('#'+ current_type).length) {
                $('#'+ current_type).show();
            }

            $('#menu-type').on('change', function () {
                var value = $(this).val();
                var type = $(this).find('option:selected').data('type');
                $('.menu-type').hide();
                if ($('#'+ type).length) {
                    $('#'+ type).show();
                }
            })
        })
    </script>
@endsection
