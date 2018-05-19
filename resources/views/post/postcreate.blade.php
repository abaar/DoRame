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
				<form action="/action_page.php">
					<div class="form-group row">
						<div class="col-md-2 col-md-offset-1">
							<label class="" for="judul">Judul</label>							
						</div>
				 		<div class="col-md-7 col-md-offset-1 input-container">
				    		<input type="Text" class="form-control" id="judul" placeholder="Judul Kegiatan...">			
				 		</div>

				  	</div>
					<div class="form-group row">
						<div class="col-md-2 col-md-offset-1">
					    	<label class="" for="deksripsi">Deskripsi</label>
						</div>
						<div class="col-md-7 col-md-offset-1 input-container red">
							<textarea class="form-control" rows="3" id="Deskripsi" placeholder="Deskripsi Kegiatan..."></textarea>
						</div>

				  	</div>
				  	<div class="form-group row">
				  		<div class="col-md-2 col-md-offset-1">
					  		<label class="">Berangkat</label>		
				  		</div>
				  		<div class="col-md-7 col-md-offset-1 input-container">
				  			<input type="text" id="startdate" class="form-control" placeholder="Tgl Mulai">				  			
				  		</div>
				  	</div>
				  	<div class="form-group row">
				  		<div class="col-md-2 col-md-offset-1">
					  		<label class="">Berakhir</label>		
				  		</div>
				  		<div class="col-md-7 col-md-offset-1 input-container">
				  			<input type="text" id="enddate" class="form-control" placeholder="Tgl Selesai">				  			
				  		</div>
				  	</div>
				  	<div class="form-group row">
				  		<div id="lokasi-container">
					  		<div class="col-md-2 col-md-offset-1">
					  			<label>Lokasi</label>
					  		</div>
					  		<div class="col-md-7 col-md-offset-1 input-container">
					  			<input type="text" name="lokasi" class="form-control " id="lokasi1">
					  		</div>
					  		<div class="col-md-1">
					  			<a href="#">X</a>
					  		</div>				  			
				  		</div>
				  		<div class="col-md-7 col-md-offset-4 input-container" style="text-align: center;">
				  			<a onclick="addlokasi()">Tambah Lokasi</a>
				  		</div>
				  	</div>
				  	<div class="col-md-4 col-md-offset-2 input-container">
						<div class="checkbox">
							<label>
								<input type="checkbox" value="">
								Terbuka Untuk Wisatawan
							</label>
						</div>				  		
				  	</div>
				  	<div class="col-md-4 input-container">
						<div class="checkbox">
							<label>
								<input type="checkbox" value="">
								Terbuka Untuk Guide
							</label>
						</div>				  		
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
	var first=1;
	function addlokasi(){

		$("#lokasi-container").append("<div class='col-md-7 col-md-offset-4 input-container'><input type='text' name='lokasi' class='form-control' id='lokasi2'></div><div class='col-md-1'><a href='#'>X</a></div>")
	}

</script>

@section('script')

@endsection