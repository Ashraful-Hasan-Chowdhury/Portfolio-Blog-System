<div class="col-md-4 sidebar-gutter">
    <aside>
        <!-- sidebar-widget -->
        <div class="sidebar-widget">
            <h3 class="sidebar-title">এখানে সার্চ করুন</h3>
            <div class="widget-container">
                <div class="widget-socials">
                    <form action="{{route('find')}}">
                      <div class="form-group">
                        <input type="text" name="searchQuery" class="form-control" id="exampleInputEmail1" placeholder="খুঁজুন . . . ">

                      </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- sidebar-widget -->

        <!-- For post view -->
        @if(!$isHome)
        @foreach($post->categories as $category)
        <div class="sidebar-widget">
            <h3 class="sidebar-title">{{$category->cname}} এর অন্যান্য লেখাসমূহ </h3>
            <div class="widget-container">
                @foreach($category->posts() as $row)
                <article class="widget-post">
                    <div class="post-image">
                        <a href="{{route('post',$row->slug)}}"><img style="width:90px;height:60px;" class="img-fluid" src="{{asset($row->image)}}"></a>
                    </div>
                    <div class="post-body">
                        <h2><a href="{{route('post',$row->slug)}}">{{$row->title}}</a></h2>
                        <div class="post-meta">
                            <span><i class="fa fa-clock-o"></i>&nbsp;&nbsp;{{$row->created_at->diffForHumans()}}</span>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
        @endforeach
        @endif

        <!-- for post view -->
    <!-- sidebar-widget -->
    <div class="sidebar-widget">
        <h3 class="sidebar-title">সর্বাধিক পঠিত</h3>
        <div class="widget-container">
            @foreach($mostRead as $post)
            <article class="widget-post">

                <div class="post-image">
                    <a href="{{route('post',$post->slug)}}"><img style="width:90px;height:60px;" class="img-fluid" src="{{asset($post->image)}}"></a>
                </div>
                <div class="post-body">
                    <h2><a href="{{route('post',$post->slug)}}">{{$post->title}}</a></h2>
                    <div class="post-meta">
                        <span><i class="fa fa-clock-o"></i>&nbsp;&nbsp;{{$post->created_at->diffForHumans()}}</span>
                    </div>
                </div>

            </article>
            @endforeach
        </div>
    </div>
    <!-- sidebar-widget -->
    <div class="sidebar-widget">
        <h3 class="sidebar-title">ক্যাটাগরী সমূহ</h3>
        <div class="widget-container">
            <ul>
                @foreach($categoryhome as $category)
                <li><a href="{{route('categoryhome',$category->cslug)}}">{{$category->cname}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- sidebar-widget -->
    <div class="sidebar-widget">
        <h3 class="sidebar-title"> পরিচয়  </h3>
        <div class="widget-container widget-about">
            <a href="post.html"><img src="{{asset('public/about/dp.jpg')}}" alt=""></a>
            <h4>আশরাফুল হাসান চৌধুরী</h4>
            <div class="author-title">বিএসসি ইন সিএসই , পোর্ট সিটি ইন্টারন্যাশনাল ইউনিভার্সিটি</div>
            <p class="text-center">শিখতে এবং শেখাতে ভালোলাগে। যতটুকু জানি ততটুকু শেয়ার করার , জানার মাঝে ভুল থাকলে তা শুধরে নেবার এবং আরও জানবার জন্যেই মূলত লেখালেখি করি।</p>
        </div>
    </div>
    <!-- sidebar-widget -->
    <!-- sidebar-widget -->
    <div class="sidebar-widget">
        <h3 class="sidebar-title">সোশ্যাল মিডিয়ায় আমি </h3>
        <div class="widget-container">
            <div class="widget-socials">
                <a href="https://www.facebook.com/sakib.ashraff"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com/sakib_ashraff"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
    </div>
    <!-- sidebar-widget -->
    </div>
    </aside>
