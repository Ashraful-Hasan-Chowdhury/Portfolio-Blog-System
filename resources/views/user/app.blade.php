<!DOCTYPE html>
<html lang="en">
	<head>
		@include('user/layouts/head')
	</head>
	<body>
		<!-- Navigation -->
        @include('user/layouts/nav')

		<div class="container">
        <!-- Header start -->
            @include('user/layouts/header')
		<!-- Header end -->
        <!-- Slider start  -->
        @if($isHome)
        @include('user/layouts/slider')
        @endif
        <!-- Slider end  -->
		<section>
			<div class="row">
				<div class="col-md-8">
					@yield('content')
				</div>
				<!-- Sidebar start -->
                @include('user/layouts/sidebar')
                <!-- sidebar end -->
				</div>
			</div>
		</section>
		</div><!-- /.container -->

        @include('user/layouts/footer')

		<!-- Bootstrap core JavaScript
			================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
        <script src="{{asset('public/user/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/user/js/jquery.bxslider.js')}}"></script>
        <script src="{{asset('public/user/js/mooz.scripts.min.js')}}"></script>
		<script src="{{asset('public/js/prism.js')}}" ></script>

	</body>
</html>
