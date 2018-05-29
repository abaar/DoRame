@extends('master.layout')

@section('title')
	Buat Rencana Kegiatan
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="/css/post-create.css">
<style type="text/css">

</style>
@endsection


@section('content')

	<div class="container-fluid boody">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 form-container">
				<h2 style="text-align: center;" class="">Buat rencana kegiatanmu</h2>
				<div class="col-md-2 col-md-offset-5" id="title-line"></div>
				@if($errors->any())
				<div class="col-md-12"></div>
				@else
				<div class="col-md-12" style="margin-bottom: 10%"></div>
				@endif

				@if ($errors->any())
				    <div class="alert alert-danger" style="margin-top: 10%">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				            @if (!empty($msg))
				            <li>{{$msg}}</li>
				            @endif
				        </ul>
				    </div>
				<!-- kalau ada eror biar return oldnya -->
				<form enctype="multipart/form-data" action="{{url('/post/edit/insert',$detil_kegiatans[0]->id)}}" method="post">
					<div class="form-group row">
						<div class="col-md-2 col-md-offset-1">
							<label class="" for="judul">Judul</label>							
						</div>
				 		<div class="col-md-7 col-md-offset-1 input-container">
				    		<input type="Text" class="form-control" id="judul" placeholder="Judul Kegiatan..." name="judul" value="{{old('judul')}}">			
				 		</div>
				  	</div>
					<div class="form-group row">
						<div class="col-md-2 col-md-offset-1">
							<label class="" for="budget">Budget</label>							
						</div>
				 		<div class="col-md-7 col-md-offset-1 input-container">
				    		<input type="Text" class="form-control" id="budget" placeholder="Budget..." name="budget" value="{{old('budget')}}">	
				 		</div>
				  	</div>
					<div class="form-group row">
						<div class="col-md-2 col-md-offset-1">
					    	<label class="" for="deksripsi">Deskripsi</label>
						</div>
						<div class="col-md-7 col-md-offset-1 input-container red">
							<textarea class="form-control" rows="2" id="Deskripsi" placeholder="Deskripsi Kegiatan..." onkeyup="textAreaAdjust(this)" style="overflow:hidden" name="deskripsi">{{old('deskripsi')}}
							</textarea>
						</div>
				  	</div>
				  	<div class="form-group row">
				  		<div class="col-md-2 col-md-offset-1">
					  		<label class="">Terbuka Untuk</label>		
				  		</div>
				  		<div class="col-md-7 col-md-offset-1 input-container">
				  			<select class="form-control" name="publicstatus" value="{{old('publicstatus')}}">
				  				<option value="1">Wisatawan & Tour Guide</option>
				  				<option value="2">Wisatawan</option>
				  				<option value="3">Tour Guide</option>
				  			</select>				  			
				  		</div>
				  	</div>				  	
				  	<div class="form-group row">
				  		<div class="col-md-2 col-md-offset-1">
					  		<label class="">Berangkat</label>		
				  		</div>
				  		<div class="col-md-7 col-md-offset-1 input-container">
				  			<input type="text" id="startdate" class="form-control" placeholder="Tgl Mulai" name="startdate" value="{{old('startdate')}}">				  			
				  		</div>
				  	</div>
				  	<div class="form-group row">
				  		<div class="col-md-2 col-md-offset-1">
					  		<label class="">Berakhir</label>		
				  		</div>
				  		<div class="col-md-7 col-md-offset-1 input-container">
				  			<input type="text" id="enddate" class="form-control" placeholder="Tgl Selesai" name="enddate" value="{{old('enddate')}}">				  			
				  		</div>
				  	</div>
				  	<div class="form-group row">
				  		<div class="col-md-2 col-md-offset-1">
					  		<label class="">Foto</label>		
				  		</div>
				  		<div class="col-md-7 col-md-offset-1 input-container">
				  			<input type="file" name="foto" value="{{$detil_kegiatans[0]->foto}}">				  			
				  		</div>
				  		
				  	</div>
				  	<div class="form-group row">
				  		<div id="lokasi-container">
					  		<div class="col-md-2 col-md-offset-1">
					  			<label>Lokasi</label>
					  		</div>
							@foreach($detil_lokasis as $lokasi)
					  			@if($lokasi->nama == $detil1)<div class="col-md-7 col-md-offset-1 input-container dynamicloc" id="lokasi{{$lokasi->id}}">
						  			<input type="text" name="lokasi[]" class="form-control" value="{{$lokasi->nama}}" multiple="" disabled="">
						  		</div>
						  		<div class="col-md-1 diactivate" id="divalokasi{{$lokasi->id}}">
						  			<a id="alokasi{{$lokasi->id}}" onclick="removelokasi(this.id)">X</a>
						  		</div>
						  		@else
						  		<div class="col-md-7 col-md-offset-4 input-container dynamicloc" id="lokasi{{$lokasi->id}}">
						  			<input type="text" name="lokasi[]" class="form-control" value="{{$lokasi->nama}}" multiple disabled>
						  		</div>

						  		@endif
					  		@endforeach			  			
				  		</div>
				  	</div>
				  		<div class="col-md-2 col-md-offset-1">
					  		<label class="">foto</label>		
				  		</div>
				  		<div class="col-md-7 col-md-offset-1 input-container">
				  			<input type="file" name="foto">				  			
				  		</div>
				  		
				  	</div>
				  	<div class="col-md-4 col-md-offset-4 input-container">
						<div class="checkbox">
							<label>
								<input type="checkbox" value="" name="documbyguide" >
								Dokumentasi oleh Guide
							</label>
						</div>				  		
				  	</div>
				  	<div class="col-md-4 input-container">
						<div class="checkbox">
							<label>
								<input type="checkbox" value="" name="negoable">
								Bisa di-<em>nego</em>
							</label>
						</div>				  		
				  	</div>

					<div class="form-group col-md-2 col-md-offset-5">
						<label class="sr-only">Kirim</label>
						<input type="submit" name="kirim" value="Buat" class="btn btn-success form-control">
					</div>

				</form>




















				<!-- Kalau gak ada eror -->
				 @else
				<form enctype="multipart/form-data" action="{{url('/post/edit/insert',$detil_kegiatans[0]->id)}}" method="post">
					<div class="form-group row">
						<div class="col-md-2 col-md-offset-1">
							<label class="" for="judul">Judul</label>							
						</div>
				 		<div class="col-md-7 col-md-offset-1 input-container">
				    		<input type="Text" class="form-control" id="judul" placeholder="Judul Kegiatan..." value="{{$detil_kegiatans[0]->nama}}" name="judul">	
				 		</div>
				  	</div>
					<div class="form-group row">
						<div class="col-md-2 col-md-offset-1">
							<label class="" for="budget">Budget</label>							
						</div>
				 		<div class="col-md-7 col-md-offset-1 input-container">
				    		<input type="Text" class="form-control" id="bidget" placeholder="Budget" value="{{$detil_kegiatans[0]->budget}}" name="budget">	
				 		</div>
				  	</div>
					<div class="form-group row">
						<div class="col-md-2 col-md-offset-1">
					    	<label class="" for="deksripsi">Deskripsi</label>
						</div>
						<div class="col-md-7 col-md-offset-1 input-container red">
							<textarea class="form-control" rows="2" id="Deskripsi" placeholder="Deskripsi Kegiatan..." onkeyup="textAreaAdjust(this)" style="overflow:hidden" name="deskripsi">{{$detil_kegiatans[0]->deskripsi}}</textarea>
						</div>
				  	</div>
				  	<div class="form-group row">
				  		<div class="col-md-2 col-md-offset-1">
					  		<label class="">Terbuka Untuk</label>		
				  		</div>
				  		<div class="col-md-7 col-md-offset-1 input-container">
				  			<select class="form-control" name="publicstatus">
				  				<option value="1">Wisatawan & Tour Guide</option>
				  				<option value="2">Wisatawan</option>
				  				<option value="3">Tour Guide</option>
				  			</select>				  			
				  		</div>
				  	</div>
				  	<div class="form-group row">
				  		<div class="col-md-2 col-md-offset-1">
					  		<label class="">Berangkat</label>		
				  		</div>
				  		<div class="col-md-7 col-md-offset-1 input-container">
				  			<input type="text" id="startdate" class="form-control" placeholder="Tgl Mulai" value="{{$detil_kegiatans[0]->mulai}}" name="startdate">				  			
				  		</div>
				  	</div>
				  	<div class="form-group row">
				  		<div class="col-md-2 col-md-offset-1">
					  		<label class="">Berakhir</label>		
				  		</div>
				  		<div class="col-md-7 col-md-offset-1 input-container">
				  			<input type="text" id="enddate" class="form-control" placeholder="Tgl Selesai" value="{{$detil_kegiatans[0]->selesai}}" name="enddate">				  			
				  		</div>
				  	</div>
				  	<div class="form-group row">
				  		<div class="col-md-2 col-md-offset-1">
					  		<label class="">Foto</label>		
				  		</div>
				  		<div class="col-md-7 col-md-offset-1 input-container">
				  			<input type="file" name="foto" value="{{$detil_kegiatans[0]->foto}}">				  			
				  		</div>
				  		
				  	</div>
				  	<div class="form-group row">
				  		<div id="lokasi-container">
					  		<div class="col-md-2 col-md-offset-1">
					  			<label>Lokasi</label>
					  		</div>
					  		@foreach($detil_lokasis as $lokasi)
					  			@if($lokasi->nama == $detil1)<div class="col-md-7 col-md-offset-1 input-container dynamicloc" id="lokasi{{$lokasi->id}}">
						  			<input type="text" name="lokasi[]" class="form-control" value="{{$lokasi->nama}}" multiple="" disabled="">
						  		</div>
						  		<div class="col-md-1 diactivate" id="divalokasi{{$lokasi->id}}">
						  			<a id="alokasi{{$lokasi->id}}" onclick="removelokasi(this.id)">X</a>
						  		</div>
						  		@else
						  		<div class="col-md-7 col-md-offset-4 input-container dynamicloc" id="lokasi{{$lokasi->id}}">
						  			<input type="text" name="lokasi[]" class="form-control" value="{{$lokasi->nama}}" multiple disabled>
						  		</div>

						  		@endif
					  		@endforeach	
				  		</div>
				  	</div>

				  	<div class="col-md-4 col-md-offset-4 input-container">
						<div class="checkbox">
							<label>
								<input type="checkbox" value="a" name="documbyguide">
								Dokumentasi oleh Guide
							</label>
						</div>				  		
				  	</div>
				  	<div class="col-md-4 input-container">
						<div class="checkbox">
							<label>
								<input type="checkbox" value="b" name="negoable">
								Bisa di-<em>nego</em>
							</label>
						</div>				  		
				  	</div>
					<div class="form-group col-md-2 col-md-offset-4">
						<label class="sr-only">Simpan</label>
						<input type="submit" name="kirim" value="Simpan" class="btn btn-success form-control">
					</div>
				</form>

				@endif
					<div class="form-group col-md-2">
						<label class="sr-only">Batal</label>
						<input type="submit" name="kirim" value="Batal" class="btn btn-danger form-control" onclick="back({{$detil_kegiatans[0]->id}})">
					</div>
			</div>
		</div>
	</div>
@endsection
<script type="text/javascript">

	function back(id){
		location.href='/post/'+id;
	}
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

function textAreaAdjust(o) {
  o.style.height = "1px";
  o.style.height = (25+o.scrollHeight)+"px";
}
</script>

@section('script')
<script src="/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
		$("#startdate").datepicker({
		format:'yyyy-mm-dd'
	});
	$("#enddate").datepicker({
		format:'yyyy-mm-dd'
	});
</script>
@endsection