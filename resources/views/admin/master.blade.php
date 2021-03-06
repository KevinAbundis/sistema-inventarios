<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sistema Inventarios - @yield('title')</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="routeName" content="{{ Route::currentRouteName() }}">

	@section('css')

	@show
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ url('/static/css/admin.css?v='.time()) }}">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />



</head>
<body>
	<div class="wrapper">
		<div class="col1">@include('admin.sidebar')</div>
		<div class="col2">
			{{-- <nav class="navbar navbar-expand-lg shadow">
				<div class="collapse navbar-collapse">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a href="{{ url('/admin') }}" class="nav-link">
								<i class="fas fa-home"></i>	Inicio
							</a>
						</li>
					</ul>
				</div>
			</nav> --}}

			<nav class="navbar navbar-expand-lg shadow">
				<div class="container">
					<div class="collapse navbar-collapse" id="navigationMain">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item dropdown link-acc link-user">
								<a href="#" class="nav-link btn dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
									@if(is_null(Auth::user()->avatar))
									<img src="{{ url('/static/images/default-avatar-1.png') }}">
									@else
									<img src="{{ url('/uploads_users/'.Auth::id().'/av_'.Auth::user()->avatar) }}">
									@endif {{ Auth::user()->name }}
								</a>
								<ul class="dropdown-menu shadow" aria-labelledby="navbarDropdown">
									@if(kvfj(Auth::user()->permissions, 'account_edit'))
									<li>
										<a class="dropdown-item" href="{{ url('/admin/account/edit') }}">
											<i class="fas fa-address-card"></i> 	Editar Perfil
										</a>
									</li>
									@endif

									<li>
										<a class="dropdown-item" href="{{ url('/logout') }}">
											<i class="fas fa-sign-out-alt"></i> 	Cerrar Sesión
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>

			<div class="page">
				<div class="container-fluid">
					<nav aria-label="breadcrumb shadow">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="{{ url('/admin') }}"><i class="fas fa-home"></i>	Inicio</a>
							</li>
							@section('breadcrumb')
							@show
						</ol>
					</nav>
				</div>

					@if(Session::has('message'))
					<div class="container-fluid">
					<div class="alert alert-{{ Session::get('typealert') }} mtop16" role="alert" style="display:block; margin-bottom: 16px;">
						{{ Session::get('message') }}
						@if($errors->any())
						<ul>
							@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
						@endif
					</div>
				</div>
				@endif


				@section('content')

				@show



			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://kit.fontawesome.com/f672163810.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  	<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  	<script src="{{url('/static/js/admin.js?v='.time()) }}"></script>
	<script>
		$(document).ready(function(){
			 $('[data-toggle="tooltip"]').tooltip()
		});
	</script>
	<script>
		$('.alert').slideDown();
		setTimeout(function(){ $('.alert').slideUp(); }, 4000);
	</script>
	@section('js')

	@show
</body>
</html>