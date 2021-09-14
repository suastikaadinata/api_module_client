<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>@yield('title') - {{ config('app.name') }}</title>
	<link href="https://fonts.googleapis.com/css?family=Cabin:400,600|Raleway:400,700" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('/fontawesome-free-5.13.1-web/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/auth.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
	<script src="{{ asset('/js/jquery.min.js') }}"></script>
	<script src="{{ asset('/js/popper-1-16-0.min.js') }}"></script>
	<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
</head>

<body>
	<div class="login-container">
		<div class="admin-login-header">
			<div class="login-header-title">
				<h3>Login</h3>
			</div>
		</div>
		<div class="admin-login-content">
			<form action="/login" method="post">
				{{ csrf_field() }}
				<div class="input-group mb-3">
					<input type="text" class="form-control" placeholder="Username" aria-label="Username"
						aria-describedby="basic-addon1" name="email" required>
				</div>
				<div class="input-group mb-3">
					<input type="password" class="form-control" placeholder="Password" aria-label="Password"
						aria-describedby="basic-addon1" name="password" required>
				</div>
				<div style="text-align: right;">
					<button type="submit" style="width: 100%;" class="btn btn-primary">Masuk</button>
				</div>
			</form>
		</div>
	</div>

	<!-- Modal Login Gagal-->
	<div class="modal fade" id="modalLoginGagal" tabindex="-1" role="dialog" aria-labelledby="modalLoginGagalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<div style="text-align: center; margin-top: 20px;">
						<h4>{{$message}}</h4>
						<i style="color: #e74c3c;
			  font-size: 40px;
			  margin-top: 15px;" class="fas fa-times-circle fa-lg"></i>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-danger">Tutup</button>
				</div>
			</div>
		</div>
	</div>

	<input type="hidden" id="login_response" value="{{ $status }}">
</body>
<script>
	$(document).ready(function(){
	  var status = $('#login_response').val();
	  if(status == 1){
		  $('#modalLoginGagal').modal('show');
	  }
  });
</script>