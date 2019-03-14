@extends('frontend.layouts.userHome')

@section('title')
    {{$tag->name}}
@endsection

@section('bannerRight')
    <h1 style="text-align: center"><label style="font-weight: normal;">{{$tag->name}}</label></h1>

    <div class="container">
        @foreach($posts as $post)
            <div class="row" style="padding-top: 50px; margin-bottom: 50px">
                <div class="col-md-5" style="margin-left: 30px;">
                    <a href="{{url('content/post/'.$post->id)}}"><img src="{{url($post->images)}}" style="width: 100%"></a>
                </div>
                <div class="col-md-5">
                    <div>
                        <p style="font-size: 13px">{{$post->updated_at}}</p>
                    </div>
                    <h4 style="text-align: center"><label style="font-weight: bold;">{{$post->name}}</label></h4>
                    <br>
                    <div> <?php echo $post->intro ;?> </div>
                </div>
            </div>

        @endforeach
    </div>
@endsection