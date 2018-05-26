@extends('master.layout')

@section('title')
	Buat Rencana Kegiatan
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="/css/post-create.css">
@endsection


@section('content')

	<div class="container-fluid boody">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 form-container">
				<h2 style="text-align: center;" class="">Buat rencana kegiatanmu</h2>
				<div class="col-md-2 col-md-offset-5" id="title-line">
					
				</div>
				<div class="col-md-12" style="margin-bottom: 10%"></div>
				<form action="/regist/insert" method="post">
					<div class="form-group row">
						<div class="col-md-2 col-md-offset-1">
							<label class="" for="namaDepan">Nama Depan</label>							
						</div>
				 		<div class="col-md-7 col-md-offset-1 input-container">
				    		<input type="text" class="form-control" id="namaDepan"  name="namaDepan" placeholder="Sunaryo">	
				 		</div>
				  	</div>	
					<div class="form-group row">
						<div class="col-md-2 col-md-offset-1">
							<label class="" for="namaBelakang">Nama Belakang</label>							
						</div>
				 		<div class="col-md-7 col-md-offset-1 input-container">
				    		<input type="text" class="form-control" id="namaBelakang"  name="namaBelakang" placeholder="Uzumaki">	
				 		</div>
				  	</div>
					<div class="form-group row">
						<div class="col-md-2 col-md-offset-1">
							<label class="" for="asalkota">Asal Kota</label>							
						</div>
				 		<div class="col-md-7 col-md-offset-1 input-container">
				    		<input type="text" class="form-control" id="asalkota"  name="asalkota" placeholder="Jakarta">	
				 		</div>
				  	</div>	
					<div class="form-group row">
						<div class="col-md-2 col-md-offset-1">
							<label class="" for="username">Username</label>							
						</div>
				 		<div class="col-md-7 col-md-offset-1 input-container">
				    		<input type="Text" class="form-control" id="username" name="username" placeholder="username...">			
				 		</div>
				  	</div>  	
					<div class="form-group row">
						<div class="col-md-2 col-md-offset-1">
							<label class="" for="password">Password</label>							
						</div>
				 		<div class="col-md-7 col-md-offset-1 input-container">
				    		<input type="password" class="form-control" id="password"  name="password" placeholder="password...">	
				 		</div>
				  	</div>	
					<div class="form-group row">
						<div class="col-md-2 col-md-offset-1">
							<label class="" for="repassword">Re-Password</label>							
						</div>
				 		<div class="col-md-7 col-md-offset-1 input-container">
				    		<input type="repassword" class="form-control" id="repassword"  name="repassword" placeholder="Ketik ulang password...">	
				 		</div>
				  	</div>	
					<div class="form-group row">
						<div class="col-md-2 col-md-offset-1">
							<label class="" for="email">Email</label>							
						</div>
				 		<div class="col-md-7 col-md-offset-1 input-container">
				    		<input type="email" class="form-control" id="email"  name="email" placeholder="dorame@email.com">	
				 		</div>
				  	</div>	
				  	<div class="col-md-7 col-md-offset-4 input-container">

							<label>
								Dengan mendaftar, saya setuju dengan <span><a href="#">Syarat & Ketentuan</a></span>.
							</label>
			  		
				  	</div>
					<div class="form-group col-md-2 col-md-offset-5">
						<label class="sr-only">Kirim</label>
						<input type="submit" name="kirim" value="Buat" class="btn btn-success form-control">
					</div>

				</form>
			</div>
		</div>
	</div>
@endsection
<script type="text/javascript">

function textAreaAdjust(o) {
  o.style.height = "1px";
  o.style.height = (25+o.scrollHeight)+"px";
}
</script>

@section('script')

@endsection