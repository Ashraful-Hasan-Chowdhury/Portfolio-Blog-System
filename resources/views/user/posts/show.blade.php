@extends('user/app')
@section('content')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0&appId=869149773554446&autoLogAppEvents=1"></script>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0&appId=869149773554446&autoLogAppEvents=1"></script>

<article class="blog-post">
    <div class="blog-post-image">
        <a href="{{route('post',$post->slug)}}"><img style="width:750px;height:500px;" class="img-fluid" src="{{asset($post->image)}}"></a>
    </div>
    <div class="blog-post-body">
        <h2><a href="#">{{$post->title}}</a></h2>
        <hr>
        <small><strong>{{$post->subtitle}}</strong></small>
        <div class="post-meta"><span><i class="far fa-calendar-alt"></i> <a href="#">{{$post->created_at->diffForHumans()}}</a></span><span><i class="fas fa-folder"></i>
            @foreach($post->categories as $category)
                <a href="{{route('category',$category->cslug)}}">{{$category->cname}}&nbsp;</a>
            @endforeach
        </span></div>
        <p>{!!htmlspecialchars_decode($post->body)!!}
        </p>

        <div style="float:left;"><i class="fas fa-tags"></i>
            @foreach($post->tags as $tag)
            <a href="{{route('tag',$tag->tslug)}}" style="border-radius:5px;border:1px solid gray;padding:5px;">{{$tag->tname}}&nbsp;</a>
            @endforeach
        </div>

        <div class="fb-like" style="float:right" data-href="{{Request::url()}}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="true"></div>

        <div class="fb-comments" style="float:left;margin-top:50px;background:#f5f5ef; border-radius:5px;border:1px solid gray;padding:5px;width:100%;margin-bottom:30px;" data-href="{{Request::url()}}" data-numposts="10" data-width=""></div>

    </div>
</article>
<script src={{asset('public/js/prism.js')}}></script>
@endsection
