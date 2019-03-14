@extends('frontend.layouts.userHome')

@section('content')
    <div class="w3l_banner_nav_right">
        <div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_sub" style="padding-top: 0!important;">
            <h3><label style="font-weight: normal">Sản phẩm đã đăng bán</label></h3>

            <div class="w3ls_w3l_banner_nav_right_grid1">
                <div style="margin-left: 30px; margin-bottom: 20px">
                    <a href="{{url('seller/addNew')}}" ><button class="btn btn-success">Đăng bán sản phẩm mới</button></a>
                </div>
                <div class="container">
                    @if (count($products) == 0)
                        <p>Bạn chưa đăng bán sản phẩm nào</p>
                    @endif
                    <?php
                    $i = 0;
                    ?>
                    <div class="row" style="margin-bottom: 50px">
                        @foreach($products as $key =>$product)
                            <div class="col-md-3 w3ls_w3l_banner_left">
                                <div class="hover14 column">
                                    <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                                        <div class="agile_top_brand_left_grid1">
                                            <figure>
                                                <div class="snipcart-item block">
                                                    <div class="snipcart-thumb">
                                                        <?php
                                                        $images = (isset($product->images) && $product->images) ? (array) json_decode($product->images) : array();
                                                        ?>
                                                        @if ($product->status <= 0)
                                                            <a href="{{ url('/seller/product/'.$product->id) }}"><img src="{{ asset($images[0]) }}" alt=" " class="img-responsive" style="height: 160px"></a>
                                                        @else
                                                            <a href="{{ url('/shop/product/'.$product->sell_id) }}"><img src="{{ asset($images[0]) }}" alt=" " class="img-responsive" style="height: 160px"></a>
                                                        @endif
                                                        <p>{{ $product->name }}</p>
                                                        <p>Trạng thái:
                                                            <?php
                                                                switch ($product->status) {
                                                                    case -1:
                                                                        echo 'Không chấp nhận';
                                                                        break;
                                                                    case 1:
                                                                        echo 'Đã phê duyệt';
                                                                        break;
                                                                    case 2:
                                                                        echo 'Đấu giá thành công';
                                                                        break;
                                                                    default:
                                                                        echo 'Chưa phê duyệt';
                                                                        break;
                                                                }
                                                            ?>
                                                        </p>
                                                        <p id="price" style="margin-top: 0">Giá hiện tại: {{ $product->price }} VND</p>
                                                        @if ($product->status == 0)
                                                                <a class="btn btn-danger delete" href="{{ url('/seller/product/delete/'.$product->id) }}" id="delete{{$product->id}}" >Hủy yêu cầu</a>
                                                        @endif
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
                {{--<div style="margin-left: 40%">{{ $products->links() }}</div>--}}
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('a.delete').on('click', function (e) {
                if (!confirm('Bạn có chắc muốn xóa?')) {
                    e.preventDefault();
                }
            })
        })

    </script>

@endsection