@extends('frontend.layouts.userHome')

@section('bannerRight')
<?php
    $images = isset($product->images) ? json_decode($product->images) : array();
?>
<div class="w3l_banner_nav_right">

    <div class="agileinfo_single">
        <h5><label><?php echo $product->name; ?></label></h5>
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

            <div class="w3agile_description">
                <label style="font-size: 20px">Giới thiệu :</label>
                <p><?php echo $product->intro; ?></p>
            </div>
            <div class="snipcart-item block">
                <div class="bid">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form-horizontal"  action="{{ url('shop/product/'.$product->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="priceCore" class="control-label col-sm-3">Người ra giá cao nhất: </label>
                            <div class="col-sm-3">
                                <p id="best_user" style="padding-top: 7px"> <?php echo $best_user_name; ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="priceCore" class="control-label col-sm-3">Giá hiện tại: </label>
                            <div class="col-sm-3">
                                <p id="price"  style="padding-top: 7px"> <?php echo $product->price; ?> VND</p>
                            </div>
                            <input type="hidden" name="user_id" value="{{ $cur_user_id }}">
                        </div>
                        <div class="form-group">
                            <label for="priceCore" class="control-label col-sm-3" style="padding-left: 0">Thời gian còn lại:  </label>
                            <div class="col-sm-3">
                                <p id="mytimer" style="padding-top: 7px"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price" class="control-label col-sm-3">Giá đưa ra: </label>
                            <div class="col-sm-4">
                                <input id="bid_price" name="price" class="form-control tinymce" id="price" value="{{ old('price') }}">
                            </div>
                        </div>
                            <button type="submit" name="submit" class="btn btn-danger">Ra giá</button>
                    </form>
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

<script src="https://js.pusher.com/4.3/pusher.min.js"></script>
<script type="text/javascript">
    //Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('{{env('PUSHER_APP_KEY')}}', {
        cluster: 'ap1',
        encrypted: true
    });

    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('Bidding');

    // Bind a function to a Event (the full Laravel class)
    channel.bind('channel-bid', function(data) {
        $('#best_user').text(data.best_user_name);
        $('#price').text(data.price + ' VND');
        console.log('hello');
    });
</script>

<?php
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $finish = strtotime($product->finish);
    $now = time();
?>

<script type="text/javascript">
    function startTimer(duration, display) {
        var timer = duration, days, hours, minutes, seconds;
        setInterval(function () {
            if (timer >= 0) {
                temp = timer;
                days = parseInt(temp / 86400, 10);
                temp = parseInt(temp % 86400, 10);
                hours = parseInt(temp / 3600, 10);
                temp = parseInt(temp % 3600, 10);
                minutes = parseInt(temp / 60, 10);
                seconds = parseInt(temp % 60, 10);

                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.text(((days > 0) ? (days + " Ngày ") : '') + hours + ":" + minutes + ":" + seconds);
                timer --;
            } else {
                $('#mytimer').text('Hết thời gian đấu giá');
                $('#bid_price').attr("disabled", true);
            }
        }, 1000);
    }

    jQuery(function ($) {
        var now = <?php echo $now ?>;
        var finish = <?php echo $finish ?>;
        var timeRemain = parseInt((finish - now), 10),
            display = $('#mytimer');
        startTimer(timeRemain, display);
    });
</script>

@endsection