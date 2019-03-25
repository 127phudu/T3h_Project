<div class="agileits_header">
    <div class="w3l_offers">
        <a>Đấu giá trực tuyến</a>
    </div>
    <div class="w3l_search">
        <form action="{{url('search')}}" method="post">
            @csrf
            <input type="text" name="name" value="Search a product..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Tìm sản phẩm...';}" required="">
            <input type="submit" value=" ">
        </form>
    </div>

    <div class="w3l_header_right1" style=" display: inline-block; float: right">
        <h2><a><label style="font-weight: normal">Liên hệ</label></a></h2>
    </div>

    <div class="w3l_header_right" style="margin-right: 20px; display: inline-block; float: right">
        <ul>
            <li class="dropdown profile_details_drop">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
                <div class="mega-dropdown-menu">
                    <div class="w3ls_vegetables">
                        <ul class="dropdown-menu drp-mnu">
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <div class="clearfix"> </div>
</div>
<!-- script-for sticky-nav -->
<script>
    $(document).ready(function() {
        var navoffeset=$(".agileits_header").offset().top;
        $(window).scroll(function(){
            var scrollpos=$(window).scrollTop();
            if(scrollpos >=navoffeset){
                $(".agileits_header").addClass("fixed");
            }else{
                $(".agileits_header").removeClass("fixed");
            }
        });

    });
</script>
<!-- //script-for sticky-nav -->
<div class="logo_products">
    <div class="container">
        <div class="w3ls_logo_products_left">
            <h1><a href="{{ url('/') }}">
                    <img src="{{ asset($fe_global_settings['header_logo']) }}" style="width: 80px">
                </a></h1>
        </div>
        <div class="w3ls_logo_products_left1">
            <ul class="special_items">
                @foreach($fe_menus_items_header as $item)
                    <li><a href="{{$item->link}}">{{$item->name}}</a><i>/</i></li>
                @endforeach
            </ul>
        </div>

        <div class="w3ls_logo_products_left1" style="margin-left: 0 ;float: right">
            <ul class="phone_email">
                <li><i class="fa fa-phone" aria-hidden="true"></i>(+0123) 234 567</li>
                <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a>store@grocery.com</a></li>
            </ul>
        </div>

        <div class="clearfix"> </div>
    </div>
</div>