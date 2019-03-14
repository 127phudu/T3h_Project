@extends('frontend.layouts.userHome')

@section('content')

    <?php
    $images = isset($product->images) ? json_decode($product->images) : array();
    ?>
    <div class="w3l_banner_nav_right">

        <div class="agileinfo_single">
            <h5><label><?php echo $product->name; ?></label></h5>
            <br>
            <div class="col-md-4 agileinfo_single_left">
                <div class="flexslider">
                    <ul class="slides">
                        @foreach($images as $image_key =>$image)
                            <li data-thumb="{{ asset($image) }}">
                                <img src="{{ asset($image) }}" class="img-responsive"/>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-8 agileinfo_single_right">
                <div class="snipcart-item block">
                    <div class="bid">
                        <br>
                        <br>
                        <br>
                        <label>Giá: {{ $product->price}} VND</label>
                        <br>
                        <br>
                        <label>Giao hàng trong 2, 3 ngày</label>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
            <div class="">
                <label style="font-size: 18px; margin-top: 30px">Mô tả chi tiết:</label>
                <p><?php echo $product->desc; ?></p>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <link rel="stylesheet" href="{{ asset('user-asset/css/flexslider.css') }}" type="text/css" media="screen" property="" />
    <script defer src="{{ asset('user-asset/js/jquery.flexslider.js') }}"></script>
    <script type="text/javascript">
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });
    </script>

@endsection
