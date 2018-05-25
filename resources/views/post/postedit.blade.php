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
				<form action="/edit.php">
					<div class="form-group row">
						<div class="col-md-2 col-md-offset-1">
							<label class="" for="judul">Judul</label>							
						</div>
				 		<div class="col-md-7 col-md-offset-1 input-container">
				    		<input type="Text" class="form-control" id="judul" placeholder="Judul Kegiatan..." value="
Kota kediri kota impian kota tahu tempe pecel wenak bos!">	
				 		</div>

				  	</div>
					<div class="form-group row">
						<div class="col-md-2 col-md-offset-1">
					    	<label class="" for="deksripsi">Deskripsi</label>
						</div>
						<div class="col-md-7 col-md-offset-1 input-container red">
							<textarea class="form-control" rows="3" id="Deskripsi" placeholder="Deskripsi Kegiatan...">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pellentesque luctus dui vitae consequat. Sed placerat, nunc et bibendum laoreet, quam lorem euismod purus, quis aliquam dui nibh non purus. Proin ut dictum ligula. Ut ultricies turpis ligula, sit amet hendrerit nisl mollis non. Nullam iaculis tincidunt quam, vitae dignissim lectus porta eu. Donec tristique ac felis in hendrerit. Quisque vel pulvinar nibh, ut varius tortor. Vivamus laoreet eros mi, nec interdum tellus dignissim in.</textarea>
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
					  		<div class="col-md-7 col-md-offset-1 input-container dynamicloc" id="lokasi1">
					  			<input type="text" name="lokasi" class="form-control">
					  		</div>
					  		<div class="col-md-1 diactivate" id="divalokasi1">
					  			<a id="alokasi1" onclick="removelokasi(this.id)">X</a>
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
						<label class="sr-only">Simpan</label>
						<input type="submit" name="kirim" value="Simpan" class="btn btn-success form-control">
					</div>

				</form>
			</div>
		</div>
	</div>
@endsection
<script type="text/javascript">
	var first=1;
	var counter=1;
	var last=1;
	function addlokasi(){
		++last;
		++counter;
		$("#lokasi-container").append("<div class='col-md-7 col-md-offset-4 input-container dynamicloc' id='lokasi"+last+"'><input type='text' name='lokasi' class='form-control'></div><div class='col-md-1' id='divalokasi"+last+"'><a id='alokasi"+last+"' onclick='removelokasi(this.id)'>X</a></div>");

		var myinput = document.getElementsByClassName("dynamicloc");
		var myid='';

		for (i= 6 ; i<myinput[0].id.length; ++i){
			myid=myid+myinput[0].id[i];
		}

		$("#divalokasi"+myid).fadeIn();
	}

	function removelokasi(id){
		var myinput = document.getElementsByClassName("dynamicloc");
		var myid='';
		for(i=7 ; i<id.length ; ++i){
			myid+=id[i];
		}
		myid = 'lokasi'+ myid;

		if(myinput[0].id==myid){
			var make2as1 = myinput[1].id;
			$("#"+make2as1).removeClass("col-md-offset-4");
			$("#"+make2as1).addClass("col-md-offset-1");
			$("#"+myid).remove();
			$("#div"+id).remove();
		}
		else{
			$("#"+myid).remove();
			$("#div"+id).remove();
		}
		myinput = document.getElementsByClassName("dynamicloc");
		if (myinput.length==1){
			myid='';
			for (i=6 ; i<myinput[0].id.length; ++i){
				myid=myid+myinput[0].id[i];
			}
			$("#divalokasi"+myid).fadeOut();
		}
	}
</script>

@section('script')

@endsection