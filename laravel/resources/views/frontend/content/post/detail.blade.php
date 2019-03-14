@extends('frontend.layouts.userHome')

@section('title')
    @if(isset($post) && ($post->id > 0))
        {{ $post->name }}
    @endif
@endsection
@section('content')
    @if(isset($post) && ($post->id > 0))
        <div class="w3l_banner_nav_right">
            <!-- content -->
            <div class="faq">
                <h3><label style="font-weight: normal">{{ $post->name }}</label></h3>
                <br>
                <br>
                <br>
                <?php echo $post->desc; ?>
                <br>
                <br>
            </div>
            <!-- //content -->
        </div>
    @else
        <p>Không có bài viết nào</p>
    @endif
@endsection
