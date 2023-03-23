@php
$setting = \App\Models\Setting::where('id', 1)->first();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>@yield('title') - {{ $setting->website_name }}</title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	@php
	$fav = '/uploads/images/'.$setting->logo;
	@endphp
	<link href="{{ $fav }}" rel="icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/select2/css/select2.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/dropify/css/dropify.min.css') }}">

	<link rel="stylesheet" href="{{ asset('assets/toast/toast.min.css') }}">


	<!-- Template Main CSS File -->
	<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

	<style type="text/css">
		.select2-container .select2-selection--single {
			height: calc(1.5em + .75rem + 2px) !important;
			border: 1px solid #ced4da !important;
		}
		.select2-container--default .select2-selection--single .select2-selection__rendered{
			line-height: 2 !important;
		}
	</style>
</head>

<body>
	<header id="header" class="fixed-top ">
		<div class="container d-flex align-items-center">

			
			@if($setting->logo == null)
			<h1 class="logo mr-auto"><a href="{{ route('home')}}">{{ $setting->website_name}}</a></h1>
			@else
			<h1 class="logo mr-auto"><a href="{{ route('home')}}"><img src="{{ url('uploads/images', $setting->logo)}}" alt="{{ $setting->website_name }}"></a></h1>
			@endif




			<a href="#footer" class="get-started-btn scrollto">Search</a>

		</div>
	</header><!-- End Header -->

	<section id="hero" class="d-flex align-items-center">

		<div class="container">
			<div class="row">
				<div class="col-lg-12 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
					<h3 class="text-center" style="color: #fff">{{ $setting->banner_text_1 }}</h3>
					<h1 class="text-center" style="line-height: 1.5">{{ $setting->banner_text_2 }}</h1>
					<h2 class="text-center">{{ $setting->banner_text_3 }}</h2>

				</div>
				<!-- <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
					<img src="{{ url('assets/img/hero-img.png') }}" class="img-fluid animated" alt="">
				</div> -->
			</div>
		</div>

	</section><!-- End Hero -->


	<main id="main">




		@yield('content')

	</main><!-- End #main -->

	<!-- ======= Footer ======= -->
	<footer id="footer">

		<div class="footer-newsletter">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6">
						<h4>Search Your Application</h4>
						<p>Enter your phone number or Registration number to Search</p>
						<form action="{{ route('search')}}" method="post">
							@csrf
							<input type="text" name="search"><input type="submit" value="Search">
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="container footer-bottom clearfix">
			<div class="copyright">
				&copy; Copyright <strong><span>{{ $setting->website_name }}</span></strong>. All Rights Reserved
			</div>
			<div class="credits">

				Developed by <a href="https://gainsgroup.com.bd/it-service/">Gains Group</a>
			</div>
		</div>
	</footer><!-- End Footer -->

	<a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
	<div id="preloader"></div>

	<!-- Vendor JS Files -->
	<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
	<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
	<script src="{{ asset('assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/venobox/venobox.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/owl/owl.carousel.js') }}"></script>
	<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
	<script src="{{ asset('assets/select2/js/select2.js') }}"></script>
	<script src="{{ asset('assets/dropify/js/dropify.min.js') }}"></script>

	<script src="{{ asset('assets/toast/toast.min.js') }}"></script>


	<!-- Template Main JS File -->
	<script src="{{ asset('assets/js/main.js') }}"></script>

	@yield('script')
	<script>
		@if($errors->has('search'))
		$('html, body').animate({
			scrollTop: $('#footer').offset().top
		}, 'slow');
		
		$.toast({
			title: 'Notice!',
			content: '{{ $errors->first('search')}}',
			type: 'error',
			dismissible: true,

		});
		@endif
		
		
		@if(Session::has('error'))
		$('html, body').animate({
			scrollTop: $('#footer').offset().top
		}, 'slow');
		
		$.toast({
			title: 'Notice!',
			content: '{{ Session::get('error') }}',
			type: 'error',
			dismissible: true,

		});
		@endif

		@if(Session::has('success'))
		$.toast({
			title: 'Notice!',
			content: '{{ Session::get('success') }}',
			type: 'success',
			dismissible: true,

		});
		@endif

		@if(Session::has('mail'))
		$.toast({
			title: 'Notice!',
			content: '{{ Session::get('mail') }} <strong>If not found check your spam folder</strong>',
			type: 'success',
			dismissible: true,

		});
		@endif
	</script>

</body>

</html>