@extends('frontend.layouts.userHome')

@section('bannerRight')
<div class="w3l_banner_nav_right">
    <div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_sub" style="padding-top: 0">
        <h3>Household Products</h3>
        <div class="w3ls_w3l_banner_nav_right_grid1">
            <div class="container">
                <h6>cleaning</h6>
                <?php $i = 0; ?>
                <div class="row" style="margin-bottom: 50px">
                @foreach($products as $product)
                        <div class="col-md-3 w3ls_w3l_banner_left">
                                <div class="hover14 column">
                                    <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                                        <div class="agile_top_brand_left_grid1">
                                            <figure>
                                                <div class="snipcart-item block">
                                                    <div class="snipcart-thumb">
                                                        <?php
                                                            $images = (isset($product->images) && $product->images) ? json_decode($product->images) : array();
                                                        ?>
                                                        <a href="{{ url('/shop/product/'.$product->id) }}"><img src="{{ asset($images[0]) }}" alt=" " class="img-responsive"></a>
                                                        <p>{{ $product->name }}</p>
                                                        <h4>{{ $product->priceSale }} <span>{{ $product->priceCore }}</span></h4>
                                                    </div>
                                                </div>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @if($i % 4 == 3)
                </div>
                <div class="row" style="margin-bottom: 50px">
                    @endif
                    <?php $i ++; ?>
                @endforeach
                </div>

                <div class="clearfix"> </div>

            </div>
            <div style="margin-left: 40%">{{ $products->links() }}</div>
        </div>
    </div>
</div>

@endsection