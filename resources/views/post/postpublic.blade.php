@extends('post.masterpost')

@section('poststyle')
<link rel="stylesheet" type="text/css" href="/css/post.css">
@endsection

@section('content-posttitle')

{{$kegiatans[0]->nama}}

@endsection


@section('content-postimg')
	@if($kegiatans[0]->foto==null)
		<img src="/img/nopict.jpg" id="img-container">
	@else
		<img src="{{$detil[0]->foto}}" id="img-container">
	@endif
@endsection

@section('content-maincontent')
				<div class="col-md-12 blue what-info">
					<h4>Apa yang kamu dapatkan!
        			</h4>
					<p class="what-main"><span class="glyphicon glyphicon-briefcase"></span> Live Competent Guide</p>
					<p class="what-submain">Didampingi oleh Guide secara langsung</p>
					@if($kegiatans[0]->documbyguide==1)
						<p class="what-main"><span class="glyphicon glyphicon-camera"></span> Documentation</p>
						<p class="what-submain">Guidemu akan mendokumentasikan tourmu!</p>
					@endif
					@if($kegiatans[0]->negoable==1)
					<p class="what-main"><span class="glyphicon glyphicon-barcode"></span> Negotiable Price</p>
					@endif
					<p class="what-main"><span class="glyphicon glyphicon-bookmark"></span> Tujuan Wisata</p>
					<ul>
						@foreach($lokasis as $lokasi)
						<li>
							<a href="{{url('/lokasi',$lokasi->id)}}">{{$lokasi->nama}}</a>	
						</li>
						@endforeach
					</ul>
				</div>
				<!-- end of left info -->
				@foreach($kegiatans as $kegiatan)
				<div class="col-md-12 desc-info">
					<p>{{$kegiatan->deskripsi}}<p>
				</div>
				@endforeach
				<!-- end of desc info -->
				<div class="col-md-12 note-info">
					<p>
						Catatan dari Dorame
					</p>
					<ul>
						<li>
							Selalu patuhi adat setempat
						</li>
						<li>
							Jangan buang sampah sembarangan
						</li>
						<li>
							Selalu jagalah kebersihan tempat wisata
						</li>
						<li>
							Bookmark halaman kami!
						</li>
					</ul>
				</div>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="top:40%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="padding: 5%; text-align: center;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Bagikan rencana perjalananmu</h4>
      </div>
      <div class="modal-body">
        	<div class="form-group row">
        		<div class="col-md-2">
        			<label class="" for="link" style="text-align: center; line-height:2.5">Alamat</label>
        		</div>
        		<div class="col-md-8">
        			<input type="text" class="form-control" name="link" value="http://localhost:8000/post/{{$kegiatans[0]->id}}">
        		</div>
        		<div class="col-md-2">
        			<button class="btn" onclick="copythevalue({{$kegiatans[0]->id}})">Copy</button>
        		</div>
        	</div>
      </div>
    </div>

  </div>
</div>

@endsection

@section('content-owner-regist')
<div class="col-md-4 choice-option" onclick="info({{$kegiatans[0]->id}})" id="page-info">
	<p>Informasi</p>
</div>
<div class="col-md-4 choice-option" onclick="diskusi({{$kegiatans[0]->id}})" id="chat-info">
	<p>Diskusi</p>
</div>
<div class="col-md-4 choice-option"  onclick="user({{$kegiatans[0]->id}})" id="regist-info">
	<p>Pendaftar</p>
</div> 
@endsection

@section('content-sidecontent')
				@foreach($kegiatans as $kegiatan)
				<div class="col-md-12" id="main-info" style="">
					<div class="col-md-12 " id="main-info-header">
						<p>
							${{$kegiatan->budget}}
						</p>
						@if($kegiatan->public)
						<button class="btn apply-btn float-me-right" onclick="daftart('{{$logedin}}',{{$kegiatans[0]->id}})">
							Daftar Jadi Turis!
						</button>
						@elseif($kegiatan->needguide)
						<button class="btn apply-btn float-me-right" onclick="daftarg('{{$logedin}}',{{$kegiatans[0]->id}})">
							Daftar Jadi Guide!
						</button>
						@endif
					</div>
					<div class="col-md-12">
						<p class="main-info-content" id="wisata"><span class="glyphicon glyphicon-user"></span> 
							@if(count($pesertas)!=0){{$pesertas[0]->jumlah}}@elseif(count($pesertas)==0) 0 @endif Wisatawan & @if(count($guides)!=0){{$guides[0]->jumlah}}@elseif(count($guides)==0) 0 @endif  Guide</p>
					</div>
					<div class="col-md-12">
						<p class="main-info-content" id="date"><span class="glyphicon glyphicon-time"></span> {{date('Y-m-d',strtotime($kegiatan->mulai))}} - {{date('Y-m-d',strtotime($kegiatan->selesai))}}</p>
					</div>
					<div class="col-md-12">
						<p class="main-info-content" id="place"><span class="glyphicon glyphicon-map-marker"></span> Main City : {{$lokasis[0]->nama}}</p>
					</div>
					<div class="col-md-12" id="anchor-container">
						<a href="#" data-toggle="modal" data-target="#myModal" class="float-me-right main-info-anchor" style="">Bagikan <span class="glyphicon glyphicon-share-alt"></span></a>	
					</div>
				</div>
				@endforeach
@endsection

@section('script-post')
<script type="text/javascript">
	function info(id){

	}

	function diskusi(id){
		location.href="/post/discuss/"+id;
	}

	function user(id){
		location.href="/post/user/"+id;
	}

	function daftart(oleh,ke){
		if (oleh!='no'){
		location.href='/post/'+ke+'/regist/turis/'+oleh;
		}
		else{
			location.href='/login';
		}

	}

	function daftarg(oleh,ke){
		if (oleh!='no'){
		location.href='/post/'+ke+'/regist/guide/'+oleh;
		}
		else{
			location.href='/login';
		}
		
	}
</script>
@endsection