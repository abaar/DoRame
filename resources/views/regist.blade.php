@extends('layouts.layout')

@section('title') Login - Dorame @endsection

@section('content')
@include('navbar')
<link rel="stylesheet" type="text/css" href="/css/regist.css">
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-container">
			<div class="content">
				<div class="form-container">
					<h2>Daftar</h2>
					<form>
						<div class="form-group">
							<label class="sr-only">Nama</label>
							<input type="text" class="form-control input-lg" name="nama" placeholder="Nama">
						</div>
						<div class="form-group">
							<label class="sr-only">email</label>
							<input type="email" class="form-control input-lg" name="email" placeholder="kecoa@cripsy.com">
						</div>
						<div class="form-group">
							<label class="sr-only">password</label>
							<input type="password" class="form-control input-lg" name="password" placeholder="Password">
						</div>
						<div class="form-group">
							<label class="sr-only">Nope</label>
							<input type="text" class="form-control input-lg" name="nope" placeholder="+628888888888">
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" value="">
								i've agree the <a href="#">term of use.</a>
							</label>
						</div>
						<button type="submit" class="btn btn-block">Daftar</button>
					</form>
					<div class="col-md-12">
						<p class="float-me-right">Sudah punya akun?<a href="#">Login</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('script')
	<script type="text/javascript">
		function replaceme(){
			var tinggi=$(".form-container").height()-200;
			console.log(tinggi);
			var tinggi_window=$(window).height();
			tinggi= (tinggi_window-tinggi)/2;
			tinggi=tinggi*100/tinggi_window;
			tinggi=tinggi+"%";
			$(".form-container").css("margin-top",tinggi);
		};
		$(window).ready(function(){
			replaceme();
		});
		$(window).resize(function(){
			replaceme();
		});
	</script>
@endsection