@extends('frontend.layouts.userHome')
@section('title')
    Trang
    @if(isset($page) && ($page->id > 0))
        {{ $page->name }}
    @endif
@endsection
@section('content')
    @if(isset($page) && ($page->id > 0))
        <div class="w3l_banner_nav_right">
            <!-- content -->
            <div class="faq">
                <h3>{{ $page->name }}</h3>
                <?php echo $page->desc; ?>
            </div>
            <!-- //content -->
        </div>
    @else
        <p>Không có trang nào</p>
    @endif
@endsection