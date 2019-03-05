@extends('frontend.layouts.userHome')

@section('title')
    @if(isset($post) && ($post->id > 0))
        {{ $post->name }}
    @endif
@endsection
@section('bannerRight')
    @if(isset($post) && ($post->id > 0))
        <div class="w3l_banner_nav_right">
            <!-- content -->
            <div class="faq">
                <h3>{{ $post->name }}</h3>
                <?php echo $post->desc; ?>
            </div>
            <!-- //content -->
        </div>
    @else
        <p>Không có bài viết nào</p>
    @endif
@endsection
