@extends('frontend.layouts.userHome')

@section('bannerRight')
    <div class="w3l_banner_nav_right">
        <!-- payment -->
        <div class="privacy about">
            <h3>Pay<span>ment</span></h3>

            <div class="checkout-right">
                <!--Horizontal Tab-->
                <div id="parentHorizontalTab">
                    <ul class="resp-tabs-list hor_1">
                        <li>Cash on delivery (COD)</li>
                        <li>Credit/Debit</li>
                        <li>Netbanking</li>
                        <li>Paypal Account</li>
                    </ul>
                    <div class="resp-tabs-container hor_1">

                        <div>
                            <div class="vertical_post check_box_agile">
                                <h5>COD</h5>
                                <div class="checkbox">
                                    <div class="check_box_one cashon_delivery">
                                        <label class="anim">
                                            <input type="checkbox" class="checkbox">
                                            <span> We also accept Credit/Debit card on delivery. Please Check with the agent.</span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div>
                            <form action="#" method="post" class="creditly-card-form agileinfo_form">
                                <section class="creditly-wrapper wthree, w3_agileits_wrapper">
                                    <div class="credit-card-wrapper">
                                        <div class="first-row form-group">
                                            <div class="controls">
                                                <label class="control-label">Name on Card</label>
                                                <input class="billing-address-name form-control" type="text" name="name" placeholder="John Smith">
                                            </div>
                                            <div class="w3_agileits_card_number_grids">
                                                <div class="w3_agileits_card_number_grid_left">
                                                    <div class="controls">
                                                        <label class="control-label">Card Number</label>
                                                        <input class="number credit-card-number form-control" type="text" name="number"
                                                               inputmode="numeric" autocomplete="cc-number" autocompletetype="cc-number" x-autocompletetype="cc-number"
                                                               placeholder="&#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149;">
                                                    </div>
                                                </div>
                                                <div class="w3_agileits_card_number_grid_right">
                                                    <div class="controls">
                                                        <label class="control-label">CVV</label>
                                                        <input class="security-code form-control"
                                                               inputmode="numeric"
                                                               type="text" name="security-code"
                                                               placeholder="&#149;&#149;&#149;">
                                                    </div>
                                                </div>
                                                <div class="clear"> </div>
                                            </div>
                                            <div class="controls">
                                                <label class="control-label">Expiration Date</label>
                                                <input class="expiration-month-and-year form-control" type="text" name="expiration-month-and-year" placeholder="MM / YY">
                                            </div>
                                        </div>
                                        <button class="submit"><span>Make a payment </span></button>
                                    </div>
                                </section>
                            </form>

                        </div>
                        <div>
                            <div class="vertical_post">
                                <form action="#" method="post">
                                    <h5>Select From Popular Banks</h5>
                                    <div class="swit-radio">
                                        <div class="check_box_one"> <div class="radio_one"> <label><input type="radio" name="radio" checked=""><i></i>Syndicate Bank</label> </div></div>
                                        <div class="check_box_one"> <div class="radio_one"> <label><input type="radio" name="radio"><i></i>Bank of Baroda</label> </div></div>
                                        <div class="check_box_one"> <div class="radio_one"> <label><input type="radio" name="radio"><i></i>Canara Bank</label> </div></div>
                                        <div class="check_box_one"> <div class="radio_one"> <label><input type="radio" name="radio"><i></i>ICICI Bank</label> </div></div>
                                        <div class="check_box_one"> <div class="radio_one"> <label><input type="radio" name="radio"><i></i>State Bank Of India</label> </div></div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <h5>Or SELECT OTHER BANK</h5>
                                    <div class="section_room_pay">
                                        <select class="year"><option value="">=== Other Banks ===</option><option value="ALB-NA">Allahabad Bank NetBanking</option><option value="ADB-NA">Andhra Bank</option><option value="BBK-NA">Bank of Bahrain and Kuwait NetBanking</option><option value="BBC-NA">Bank of Baroda Corporate NetBanking</option><option value="BBR-NA">Bank of Baroda Retail NetBanking</option><option value="BOI-NA">Bank of India NetBanking</option><option value="BOM-NA">Bank of Maharashtra NetBanking</option><option value="CSB-NA">Catholic Syrian Bank NetBanking</option><option value="CBI-NA">Central Bank of India</option><option value="CUB-NA">City Union Bank NetBanking</option><option value="CRP-NA">Corporation Bank</option><option value="DBK-NA">Deutsche Bank NetBanking</option><option value="DCB-NA">Development Credit Bank</option><option value="DC2-NA">Development Credit Bank - Corporate</option><option value="DLB-NA">Dhanlaxmi Bank NetBanking</option><option value="FBK-NA">Federal Bank NetBanking</option><option value="IDS-NA">Indusind Bank NetBanking</option><option value="IOB-NA">Indian Overseas Bank</option><option value="ING-NA">ING Vysya Bank (now Kotak)</option><option value="JKB-NA">Jammu and Kashmir NetBanking</option><option value="JSB-NA">Janata Sahakari Bank Limited</option><option value="KBL-NA">Karnataka Bank NetBanking</option><option value="KVB-NA">Karur Vysya Bank NetBanking</option><option value="LVR-NA">Lakshmi Vilas Bank NetBanking</option><option value="OBC-NA">Oriental Bank of Commerce NetBanking</option><option value="CPN-NA">PNB Corporate NetBanking</option><option value="PNB-NA">PNB NetBanking</option><option value="RSD-DIRECT">Rajasthan State Co-operative Bank-Debit Card</option><option value="RBS-NA">RBS (The Royal Bank of Scotland)</option><option value="SWB-NA">Saraswat Bank NetBanking</option><option value="SBJ-NA">SB Bikaner and Jaipur NetBanking</option><option value="SBH-NA">SB Hyderabad NetBanking</option><option value="SBM-NA">SB Mysore NetBanking</option><option value="SBT-NA">SB Travancore NetBanking</option><option value="SVC-NA">Shamrao Vitthal Co-operative Bank</option><option value="SIB-NA">South Indian Bank NetBanking</option><option value="SBP-NA">State Bank of Patiala NetBanking</option><option value="SYD-NA">Syndicate Bank NetBanking</option><option value="TNC-NA">Tamil Nadu State Co-operative Bank NetBanking</option><option value="UCO-NA">UCO Bank NetBanking</option><option value="UBI-NA">Union Bank NetBanking</option><option value="UNI-NA">United Bank of India NetBanking</option><option value="VJB-NA">Vijaya Bank NetBanking</option></select>
                                    </div>
                                    <input type="submit" value="PAY NOW">
                                </form>
                            </div>
                        </div>
                        <div>
                            <div id="tab4" class="tab-grid" style="display: block;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img class="pp-img" src="{{ asset('user-asset/images/paypal.png') }}" alt="Image Alternative text" title="Image Title">
                                        <p>Important: You will be redirected to PayPal's website to securely complete your payment.</p><a class="btn btn-primary">Checkout via Paypal</a>
                                    </div>
                                    <div class="col-md-6">
                                        <form class="cc-form">
                                            <div class="clearfix">
                                                <div class="form-group form-group-cc-number">
                                                    <label>Card Number</label>
                                                    <input class="form-control" placeholder="xxxx xxxx xxxx xxxx" type="text"><span class="cc-card-icon"></span>
                                                </div>
                                                <div class="form-group form-group-cc-cvc">
                                                    <label>CVV</label>
                                                    <input class="form-control" placeholder="xxxx" type="text">
                                                </div>
                                            </div>
                                            <div class="clearfix">
                                                <div class="form-group form-group-cc-name">
                                                    <label>Card Holder Name</label>
                                                    <input class="form-control" type="text">
                                                </div>
                                                <div class="form-group form-group-cc-date">
                                                    <label>Valid Thru</label>
                                                    <input class="form-control" placeholder="mm/yy" type="text">
                                                </div>
                                            </div>
                                            <div class="checkbox checkbox-small">
                                                <label>
                                                    <input class="i-check" type="checkbox" checked="">Add to My Cards</label>
                                            </div>
                                            <input class="btn btn-primary submit" type="submit" class="submit" value="Proceed Payment">
                                        </form>
                                    </div>
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
                type: 'default', //Types: default, vertical, accordion
                width: 'auto', //auto or any width like 600px
                fit: true, // 100% fit in a container
                tabidentify: 'hor_1', // The tab groups identifier
                activate: function(event) { // Callback function if tab is switched
                    var $tab = $(this);
                    var $info = $('#nested-tabInfo');
                    var $name = $('span', $info);
                    $name.text($tab.text());
                    $info.show();
                }
            });
        });
    </script>
    <!-- credit-card -->
    <script type="text/javascript" src="{{asset( 'user-asset/js/creditly.js')}}"></script>
    <link rel="stylesheet" href="{{asset( 'user-asset/css/creditly.css')}}" type="text/css" media="all" />

    <script type="text/javascript">
        $(function() {
            var creditly = Creditly.initialize(
                '.creditly-wrapper .expiration-month-and-year',
                '.creditly-wrapper .credit-card-number',
                '.creditly-wrapper .security-code',
                '.creditly-wrapper .card-type');

            $(".creditly-card-form .submit").click(function(e) {
                e.preventDefault();
                var output = creditly.validate();
                if (output) {
                    // Your validated credit card output
                    console.log(output);
                }
            });
        });
    </script>
    <!-- //credit-card -->


@endsection
