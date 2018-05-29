@extends('post.masterpost')

@section('poststyle')
<link rel="stylesheet" type="text/css" href="/css/post.css">
<link rel="stylesheet" type="text/css" href="/css/post-applicant.css">
@endsection

@section('content-posttitle')

{{$detil[0]->nama}}

@endsection


@section('content-postimg')
	@if($detil[0]->foto==null)
		<img src="/img/nopict.jpg" id="img-container">
	@else
		<img src="{{$detil[0]->foto}}" id="img-container">
	@endif
@endsection

@section('content-maincontent')
				<div class="col-md-12 applicant-section">
					<div id="applicant-option">
						<div class="col-md-2 choice-option choice-option-aplicant active" id="turis-div-btn">
							<p>Turis</p>
						</div>
						<div class="col-md-2 choice-option choice-option-aplicant" id="guide-div-btn">
							<p>Guide</p>
						</div>
						<div class="col-md-2 choice-option choice-option-aplicant" id="request-div-btn">
							<p>Pendaftar</p>
						</div>											
					</div>

					<table class="table table-striped table-active" id="turis-user">
					    <thead>
					      <tr>
					        <th class="col-md-8">Nama</th>
					        <th class="col-md-4">Aksi</th>
					      </tr>
					    </thead>
					    <tbody>
					      	@foreach($users as $user)
					      		@if($user->applyAsGuide==0 && $user->isVerified==1)
					      			<tr>
							        <td><p onclick="showprofile('{{$user->idUser}}')">{{$user->nama}}</p></td>
							        <td>
							        	<input type="submit" name="terima" value="Keluarkan" onclick="return confirm ('Anda yakin?')" class="btn btn-danger">
							        </td>
							    	</tr>
					        	@endif
					        @endforeach
					    </tbody>
					 </table>

					<table class="table table-striped table-nonactive" id="guide-user">
					    <thead>
					      <tr>
					        <th class="col-md-8">Nama</th>
					        <th class="col-md-4">Aksi</th>
					      </tr>
					    </thead>
					    <tbody>
					      	@foreach($users as $user)
					      		@if($user->applyAsGuide==1 && $user->isVerified==1)
					      			<tr>
							        <td><p onclick="showprofile('{{$user->idUser}}')">{{$user->nama}}</p></td>
							        <td>
							        	<input type="submit" name="terima" value="Keluarkan" onclick="kickme('{{$user->idUser}}',{{$detil[0]->id}})" class="btn btn-danger">
							        </td>
							    	</tr>
					        	@endif
					        @endforeach
					    </tbody>
					  </table>


					<table class="table table-striped table-nonactive" id="request-user">
					    <thead>
					      <tr>
					        <th class="col-md-6">Nama</th>
					        <th class="col-md-2">Sebagai</th>
					        <th class="col-md-4">Aksi</th>
					      </tr>
					    </thead>
					    <tbody>
					      	@foreach($users as $user)
							      @if($user->isVerified==0) 	
							      <tr>
							        <td><p onclick="showprofile('{{$user->idUser}}')">{{$user->nama}}</p></td>
							        <td>@if($user->applyAsGuide==1)Guide @else Wisatawan @endif</td>
							        <td>
							        	<input type="submit" name="terima" value="Terima" onclick="acceptme('{{$user->idUser}}',{{$detil[0]->id}})" class="btn btn-success">
							        	<input type="submit" name="tolak" value="Tolak" onclick="rejectme('{{$user->idUser}}',{{$detil[0]->id}})" class="btn btn-danger">
							        </td>
							      </tr>
							      @endif
					        @endforeach
					    </tbody>
					  </table>					  
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
        			<input type="text" class="form-control" name="link" value="http://localhost:8000/post/{{$detil[0]->id}}">
        		</div>
        		<div class="col-md-2">
        			<button class="btn" onclick="copythevalue({{$detil[0]->id}})">Copy</button>
        		</div>
        	</div>
      </div>
    </div>

  </div>
</div>
@endsection

@section('content-owner-regist')
<div class="col-md-4 choice-option" onclick="info({{$detil[0]->id}})" id="page-info">
	<p>Informasi</p>
</div>
<div class="col-md-4 choice-option" onclick="diskusi({{$detil[0]->id}})" id="chat-info">
	<p>Diskusi</p>
</div>
<div class="col-md-4 choice-option"  onclick="user({{$detil[0]->id}})" id="regist-info">
	<p>Pendaftar</p>
</div> 
@endsection

@section('content-sidecontent')
				<div class="col-md-12" id="main-info" style="margin-bottom: 10%">
					<div class="col-md-12 " id="main-info-header">
						<p>
							${{$detil[0]->budget}}
						</p>
						<button class="btn apply-btn float-me-right" onclick="cancelmypost({{$detil[0]->id}})">
							Batalkan Rencana
						</button>
					</div>
					<div class="col-md-12">
						<p class="main-info-content" id="wisata"><span class="glyphicon glyphicon-user"></span> @if(count($pesertas)!=0){{$pesertas[0]->jumlah}}@elseif(count($pesertas)==0) 0 @endif Wisatawan & @if(count($guides)!=0){{$guides[0]->jumlah}}@elseif(count($guides)==0) 0 @endif  Guide</p>
					</div>
					<div class="col-md-12">
						<p class="main-info-content" id="date"><span class="glyphicon glyphicon-time"></span> {{date('d-m-Y',strtotime($detil[0]->mulai))}} - {{date('d-m-Y',strtotime($detil[0]->selesai))}}</p>
					</div>
					<div class="col-md-12">
						<p class="main-info-content" id="place"><span class="glyphicon glyphicon-map-marker"></span> Main City : {{$lokasis[0]->nama}}</p>
					</div>
					<div class="col-md-12" id="anchor-container">
						<a href="#" data-toggle="modal" data-target="#myModal" class="float-me-right main-info-anchor" style="">Bagikan <span class="glyphicon glyphicon-share-alt"></span></a>		
					</div>
				</div>
@endsection

@section('script-post')
<script type="text/javascript">
	$("#turis-div-btn").click(function(){
		$("#guide-user").css("display","none");
		$("#request-user").css("display","none");
		$("#turis-user").fadeIn();
		$(this).addClass("active");
		$("#guide-div-btn").removeClass("active");
		$("#request-div-btn").removeClass("active")
	});

	$("#guide-div-btn").click(function(){
		$("#turis-user").css("display","none");
		$("#request-user").css("display","none");
		$("#guide-user").fadeIn();
		$(this).addClass("active");
		$("#turis-div-btn").removeClass("active");
		$("#request-div-btn").removeClass("active");
	});

	$("#request-div-btn").click(function(){
		$("#turis-user").css("display","none");
		$("#guide-user").css("display","none");
		$("#request-user").fadeIn();
		$(this).addClass("active");
		$("#turis-div-btn").removeClass("active");
		$("#guide-div-btn").removeClass("active");
	});

	function info(id){
		location.href='/post/'+id;
	}

	function diskusi(id){
		location.href="/post/discuss/"+id;
	}

	function user(id){

	}

	function cancelmypost(id){
		if(confirm("Apakah anda yakin?")){
			location.href="/post/cancel/"+id;
		}
	}

	function acceptme(email,id){
		if(confirm("Apakah anda yakin?")){
			location.href='/post/'+id+'/user/acc/'+email;
		}
	}

	function rejectme(email,id){
		if(confirm("Apakah anda yakin? Anda akan menghapusnya dari list!")){
			location.href='/post/'+id+'/user/wa/'+email;
		}
	}

	function kickme(email,id){
		if(confirm("Apakah anda yakin akan memindahkannya ke golongan pendaftar?")){
			location.href='/post/'+id+'/user/kick/'+email;
		}
	}

	function showprofile(id){
		location.href='/user/'+id;
	}
</script>
@endsection