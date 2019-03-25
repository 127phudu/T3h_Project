@extends('frontend.layouts.userHome')

@section('title')
    Đấu giá trực tuyến
@endsection

@section('content')
    <div class="w3l_banner_nav_right">
        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    @foreach($main_banners as $main_banner)
                        <li>
                            <div class="" style="background: url('{{ url($main_banner->image) }}' ) no-repeat 0px 0px!important;">
                                <div class="w3l_banner_nav_right_banner">
                                    <?php echo $main_banner->desc; ?>
                                    <div class="more">
                                        <a href="{{ $main_banner->link }}" class="button--saqui button--round-l button--text-thick" data-text="Xem ngay">Xem ngay</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
        <!-- flexSlider -->
        <link rel="stylesheet" href="{{ asset('user-asset/css/flexslider.css') }}" type="text/css" media="screen" property="" />
        <script defer src="{{ asset('user-asset/js/jquery.flexslider.js') }}"></script>
        <script type="text/javascript">
            $(window).load(function(){
                $('.flexslider').flexslider({
                    animation: "slide",
                    start: function(slider){
                        $('body').removeClass('loading');
                    }
                });
            });
        </script>
        <!-- //flexSlider -->
    </div>
    <!-- banner -->
    <div class="banner_bottom">
        <div class="wthree_banner_bottom_left_grid_sub">
        </div>
        <div class="wthree_banner_bottom_left_grid_sub1">
            <div class="col-md-4 wthree_banner_bottom_left">
                <div class="wthree_banner_bottom_left_grid">
                    @foreach($banner_bottom_1 as $value)
                        <a href="{{$value->link}}">
                            <img src="{{asset($value->image)}}" alt=" " class="img-responsive" />
                            <?php echo $value->desc; ?>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4 wthree_banner_bottom_left">
                <div class="wthree_banner_bottom_left_grid">
                    @foreach($banner_bottom_2 as $value)
                        <a href="{{$value->link}}">
                            <img src="{{asset($value->image)}}" alt=" " class="img-responsive" />
                            <?php echo $value->desc; ?>
                        </a>
                    @endforeach

                </div>
            </div>
            <div class="col-md-4 wthree_banner_bottom_left">
                <div class="wthree_banner_bottom_left_grid">
                    @foreach($banner_bottom_3 as $value)
                        <a href="{{$value->link}}">
                            <img src="{{asset($value->image)}}" alt=" " class="img-responsive" />
                            <?php echo $value->desc; ?>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>


    <style type="text/css">
        a.disable {
            pointer-events: none;
            cursor: default;
        }
    </style>
    <div class="fresh-vegetables">
        <div class="container">
            <h3><label style="font-weight: normal">Sản phẩm được quan tâm</label></h3>
            <div class="w3l_fresh_vegetables_grids">
                <div class="col-md-3 w3l_fresh_vegetables_grid w3l_fresh_vegetables_grid_left">
                    <div class="w3l_fresh_vegetables_grid2">
                        <ul class="tab_lists">
                            <?php $isFirst = true; ?>
                            @foreach($cats as $cat)
                                <li class="tab_list_item {{ $isFirst ? 'active' : '' }}"><i class="{{ $isFirst ? 'fa fa-check' : '' }}" aria-hidden="true"></i><a href="#tab{{$cat->id}}">{{ $cat->name }}</a></li>
                                <?php $isFirst = false; ?>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="tab_contents">
                    <?php $isFirst = true; ?>
                    @foreach($cats as $cat)
                        <div id="tab{{ $cat->id }}" style="{{ $isFirst ? '' : 'display: none'}}" >
                                <h4 style="margin-top: 20px; font-size: 30px; text-align: center;"><label style="font-weight: normal">{{ $cat->name }}</label></h4>
                                <div class="agile_top_brands_grids">
                                    @if (count($top_bidding_by_cat[$cat->id]) == 0)
                                        <p style="text-align: center">Không có sản phẩm</p>
                                    @endif
                                    @foreach($top_bidding_by_cat[$cat->id] as $product)
                                        <div class="col-md-3 top_brand_left">
                                            <div class="hover14 column">
                                                <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                                                    <div class="agile_top_brand_left_grid1">
                                                        <figure>
                                                            <div class="snipcart-item block">
                                                                <div class="snipcart-thumb">
                                                                    <?php
                                                                    $images = (isset($product->images) && $product->images) ? json_decode($product->images) : array();
                                                                    ?>
                                                                    <a href="{{ url('/shop/product/'.$product->id) }}" style="height: 160px"><img src="{{ asset($images[0]) }}" alt=" " class="img-responsive"></a>
                                                                    <p>{{ $product->name }}</p>
                                                                    <p>{{ $count_bid[$cat->id][$product->id] }} lượt ra giá</p>
                                                                    <h4>Giá hiện tại {{ $product->price }}</h4>
                                                                </div>
                                                            </div>
                                                        </figure>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                        <?php $isFirst = false; ?>
                    @endforeach
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>

    <!-- top-brands -->
    <div class="top-brands">
        <div class="container">
            <h3><label style="font-weight: normal">Giới thiệu</label></h3>
            <div class="agile_top_brands_grids">

                @foreach($recommends as $recommend)
                    <div class="col-md-3 top_brand_left">
                        <div class="hover14 column">
                            <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                                <div class="agile_top_brand_left_grid1">
                                    <figure>
                                        <div class="snipcart-item block">
                                            <div class="snipcart-thumb">
                                                <?php
                                                $images = (isset($recommend->images) && $recommend->images) ? json_decode($recommend->images) : array();
                                                ?>
                                                <a href="{{ url('/shop/product/'.$recommend->id) }}" style="height: 150px"><img src="{{ asset($images[0]) }}" alt=" " class="img-responsive"></a>
                                                <p>{{ $recommend->name }}</p>
                                                <h4>Giá hiện tại {{ $recommend->price }}</h4>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //top-brands -->

    <script>
        $(document).ready(function() {
            $('.tab_list_item').click(function(event){
                event.preventDefault();//stop browser to take action for clicked anchor

                //bỏ cũ
                var old_a_element = $('li.active > a');
                old_a_element.removeClass('disable');
                var old_tab_selector = old_a_element.attr('href');
                var actived_nav = $('li.active');
                actived_nav.removeClass('active');
                actived_nav.children('i').removeClass('fa fa-check');
                $(old_tab_selector).hide();


                //Hiện mới
                $(this).addClass('active');
                var active_tab_selector = $(this).children('a').attr('href');
                $(this).children('a').addClass('disable');
                $(this).children('i').addClass('fa fa-check');
                $(active_tab_selector).show();
            });
        });
    </script>

@endsection


