@extends('frontend.layouts.userHome')

@section('title')
    Đơn hàng
@endsection

@section('content')
    <style type="text/css">

        #payment-form .row {
            display: -ms-flexbox; /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap; /* IE10 */
            flex-wrap: wrap;
            margin: 0 -16px;
        }

        #payment-form .col-25 {
            -ms-flex: 25%; /* IE10 */
            flex: 25%;
        }

        #payment-form .col-50 {
            -ms-flex: 50%; /* IE10 */
            flex: 50%;
        }

        #payment-form .col-75 {
            -ms-flex: 75%; /* IE10 */
            flex: 75%;
        }

        #payment-form .col-25,
        #payment-form .col-50,
        #payment-form .col-75 {
            padding: 0 16px;
        }

        #payment-form .container {
            background-color: #f2f2f2;
            padding: 5px 20px 15px 20px;
            border: 1px solid lightgrey;
            border-radius: 3px;
        }

        #payment-form input[type=text] {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        #payment-form label {
            margin-bottom: 10px;
            display: block;
        }

        #payment-form .icon-container {
            margin-bottom: 20px;
            padding: 7px 0;
            font-size: 24px;
        }

        #payment-form .btn {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            margin: 10px 0;
            border: none;
            width: 100%;
            border-radius: 3px;
            cursor: pointer;
            font-size: 17px;
        }

        #payment-form .btn:hover {
            background-color: #45a049;
        }

        #payment-form span.price {
            float: right;
            color: grey;
        }

        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
        @media (max-width: 800px) {
            #payment-form .row {
                flex-direction: column-reverse;
            }
            #payment-form .col-25 {
                margin-bottom: 20px;
            }
        }
    </style>

    <div class="w3l_banner_nav_right">
        <!-- payment -->
        <div class="privacy about" style="padding-top: 0">
            <h3><label style="font-weight: normal">Hoàn thiện đơn hàng</label></h3>

            <div class="checkout-right">
                <!--Horizontal Tab-->
                <div id="parentHorizontalTab">
                    <ul class="resp-tabs-list hor_1">
                        <li>Thanh toán khi nhận hàng (COD)</li>
                    </ul>
                    <div class="resp-tabs-container hor_1" style="background-color: rgba(177, 177, 177, 0.2)">
                        <div>
                            <div class="vertical_post check_box_agile">
                                <div class="col-50" id="payment-form">
                                    <form method="post" action="{{ url('/shop/payment/') }}">
                                        @csrf
                                        <h3><label style="font-weight: normal; font-size: 30px">Thông tin liên lạc</label></h3>
                                        <div class="row" style="margin-top: 20px">
                                            <div class="col-50">
                                                <label for="customer_name"> Họ và tên</label>
                                                <input type="text" id="customer_name" name="customer_name" placeholder="John M. Doe" value="{{ $order->customer_name }}" required>
                                            </div>
                                            <div class="col-50">
                                                <label for="customer_phone">Số điện thoại</label>
                                                <input type="text" id="customer_phone" name="customer_phone" placeholder="0123456789" value="{{ $order->customer_name }}"required>
                                            </div>
                                        </div>
                                        <input type="hidden" name="product_id" value="{{ $order->id }}">
                                        <label for="customer_email">Email</label>
                                        <input type="text" id="customer_email" name="customer_email" placeholder="john@example.com" value="{{ $order->customer_email }}" required>
                                        <label for="customer_address"> Địa chỉ</label>
                                        <input type="text" id="customer_address" name="customer_address" placeholder="542 W. 15th Street" value="{{ $order->customer_address }}" required>
                                        <label for="customer_note">Ghi chú</label>
                                        <input type="text" id="customer_note" name="customer_note" placeholder="Ghi chú" value="{{ $order->customer_note }}">
                                        <div class="row">
                                            <div class="col-50">
                                                <label for="customer_city">Thành phố</label>
                                                <input type="text" id="customer_city" name="customer_city" placeholder="Hà Nội" value="{{ $order->customer_city }}" required>
                                            </div>
                                            <div class="col-50">
                                                <label for="customer_country">Quốc gia</label>
                                                <input type="text" id="customer_country" name="customer_country" placeholder="Tên quốc gia" value="{{ $order->customer_country }}" required>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-success"  value="Xong">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Plug-in Initialisation-->

                <!-- // Pay -->

            </div>

        </div>
        <!-- //payment -->
    </div>

    <!-- easy-responsive-tabs -->
    <link rel="stylesheet" type="text/css" href="{{asset( 'user-asset/css/easy-responsive-tabs.css')}} " />
    <script src="{{asset( 'user-asset/js/easyResponsiveTabs.js')}}"></script>
    <!-- //easy-responsive-tabs -->
    <script type="text/javascript">
        $(document).ready(function() {
            //Horizontal Tab
            $('#parentHorizontalTab').easyResponsiveTabs({
                width: 'auto', //auto or any width like 600px
                tabidentify: 'hor_1', // The tab groups identifier
            });
        });
    </script>
    <!-- credit-card -->
    <script type="text/javascript" src="{{asset( 'user-asset/js/creditly.js')}}"></script>
    <link rel="stylesheet" href="{{asset( 'user-asset/css/creditly.css')}}" type="text/css" media="all" />

@endsection
