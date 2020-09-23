@extends('user/app')
@section('content')
@foreach($posts as $post)
    <article class="blog-post">
        <div class="blog-post-image">
            <a href="{{route('post',$post->slug)}}"><img style="width:750px;height:400px;" class="img-fluid" src="{{asset($post->image)}}"></a>
        </div>
        <div class="blog-post-body">
            <h3><a href="{{route('post',$post->slug)}}">{{$post->title}}</a></h3>
            <hr>
            <h5><strong>{{$post->subtitle}}</strong></h5>
            <div class="post-meta"><span><i class="far fa-calendar-alt"></i> <a href="#">{{$post->created_at->diffForHumans()}}</a></span><span><i class="fas fa-folder"></i>
                @foreach($post->categories as $category)
                    <a href="{{route('category',$category->cslug)}}">{{$category->cname}}&nbsp;</a>
                @endforeach
            </span></div>

            <div class="read-more"><a href="{{route('post',$post->slug)}}">Continue Reading</a></div>
        </div>
    </article>
@endforeach
<div style="float:right;">{{$posts->links()}}</div>

@endsection
