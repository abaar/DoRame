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
				    <form action="{{url('/post/create/insert')}}" method="post">
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
				  		<div id="lokasi-container">
					  		<div class="col-md-2 col-md-offset-1">
					  			<label>Lokasi</label>
					  		</div>
					  		<div class="col-md-7 col-md-offset-1 input-container dynamicloc" id="lokasi1">
					  			<input type="text" name="lokasi[]" class="form-control" multiple="">
					  		</div>
					  		<div class="col-md-1 diactivate" id="divalokasi1">
					  			<a id="alokasi1" onclick="removelokasi(this.id)">X</a>
					  		</div>				  			
				  		</div>
				  		<div class="col-md-7 col-md-offset-4 input-container" style="text-align: center;">
				  			<a onclick="addlokasi()">Tambah Lokasi</a>
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

				@else

					<form action="{{url('/post/create/insert')}}" method="post">
					<div class="form-group row">
						<div class="col-md-2 col-md-offset-1">
							<label class="" for="judul">Judul</label>							
						</div>
				 		<div class="col-md-7 col-md-offset-1 input-container">
				    		<input type="Text" class="form-control" id="judul" placeholder="Judul Kegiatan..." name="judul">			
				 		</div>
				  	</div>
					<div class="form-group row">
						<div class="col-md-2 col-md-offset-1">
							<label class="" for="budget">Budget</label>							
						</div>
				 		<div class="col-md-7 col-md-offset-1 input-container">
				    		<input type="Text" class="form-control" id="budget" placeholder="Budget..." name="budget">	
				 		</div>
				  	</div>
					<div class="form-group row">
						<div class="col-md-2 col-md-offset-1">
					    	<label class="" for="deksripsi">Deskripsi</label>
						</div>
						<div class="col-md-7 col-md-offset-1 input-container red">
							<textarea class="form-control" rows="2" id="Deskripsi" placeholder="Deskripsi Kegiatan..." onkeyup="textAreaAdjust(this)" style="overflow:hidden" name="deskripsi"></textarea>
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
				  			<input type="text" id="startdate" class="form-control" placeholder="Tgl Mulai" name="startdate">				  			
				  		</div>
				  	</div>
				  	<div class="form-group row">
				  		<div class="col-md-2 col-md-offset-1">
					  		<label class="">Berakhir</label>		
				  		</div>
				  		<div class="col-md-7 col-md-offset-1 input-container">
				  			<input type="text" id="enddate" class="form-control" placeholder="Tgl Selesai" name="enddate">				  			
				  		</div>
				  	</div>
				  	<div class="form-group row">
				  		<div id="lokasi-container">
					  		<div class="col-md-2 col-md-offset-1">
					  			<label>Lokasi</label>
					  		</div>
					  		<div class="col-md-7 col-md-offset-1 input-container dynamicloc" id="lokasi1">
					  			<input type="text" name="lokasi[]" class="form-control" multiple>
					  		</div>
					  		<div class="col-md-1 diactivate" id="divalokasi1">
					  			<a id="alokasi1" onclick="removelokasi(this.id)">X</a>
					  		</div>				  			
				  		</div>
				  		<div class="col-md-7 col-md-offset-4 input-container" style="text-align: center;">
				  			<a onclick="addlokasi()">Tambah Lokasi</a>
				  		</div>
				  	</div>
				  	<div class="col-md-4 col-md-offset-4 input-container">
						<div class="checkbox">
							<label>
								<input type="checkbox" value="1" name="documbyguide">
								Dokumentasi oleh Guide
							</label>
						</div>				  		
				  	</div>
				  	<div class="col-md-4 input-container">
						<div class="checkbox">
							<label>
								<input type="checkbox" value="1" name="negoable">
								Bisa di-<em>nego</em>
							</label>
						</div>				  		
				  	</div>
					<div class="form-group col-md-2 col-md-offset-5">
						<label class="sr-only">Kirim</label>
						<input type="submit" name="kirim" value="Buat" class="btn btn-success form-control">
					</div>

				</form>
				@endif
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
		$("#lokasi-container").append("<div class='col-md-7 col-md-offset-4 input-container dynamicloc' id='lokasi"+last+"'><input type='text' name='lokasi[]' class='form-control' multiple></div><div class='col-md-1' id='divalokasi"+last+"'><a id='alokasi"+last+"' onclick='removelokasi(this.id)'>X</a></div>");

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