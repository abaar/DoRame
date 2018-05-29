@extends('post.masterpost')

@section('poststyle')
<link rel="stylesheet" type="text/css" href="/css/post.css">
<link rel="stylesheet" type="text/css" href="/css/post-discuss.css">
@endsection

@section('content-posttitle')

{{$detil[0]->nama}}

@endsection


@section('content-postimg')
<img src="/img/1.jpg" id="img-container">
@endsection

@section('content-maincontent')
				<div class="col-md-12 comment-section">
					<!-- end of comment container -->




					@foreach($diskusis as $diskusi)
					<div>
						<div class="col-md-1 img-comment-cont" style="">
							<img src="{{$diskusi->foto}}"  class="img-comment">
						</div>
						<div class="col-md-11 inline-block" style="">
							<p><span class="comment-user"><a class="float-me-left" href="/user/{{$diskusi->uid}}">{{$diskusi->nama}}</a></span> {{$diskusi->kapan}}</p>
						</div>
						<div class="col-md-11 col-md-offset-1 comment-cont">
							<p>{{$diskusi->komentar}}</p>
						</div>
						<div class="col-md-11 col-md-offset-1 inline-block comment-footer-cont" id="akbarnoto">
							<p class="float-me-left comment-footer" id="{{$diskusi->username}}" onclick="komenme(this.id)">Reply</p>
							<p class="float-me-left comment-footer" id="{{$diskusi->kid}}" onclick="deleteme(this.id)">Delete</p>
						</div>
					</div>					
					@endforeach

					@if(count($diskusis)==0)
					<p>Belum ada Diskusi!</p>
					@endif
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
				<div class="col-md-12" id="main-info" style="">
					<div class="col-md-12 " id="main-info-header">
						<p>
							${{$detil[0]->budget}}
						</p>
							@if($detil[0]->public)
								<button class="btn apply-btn float-me-right" onclick="daftart('{{$logedin}}',{{$detil[0]->id}})">
									Daftar Jadi Turis!
								</button>
							@elseif($detil[0]->needguide)
								<button class="btn apply-btn float-me-right" onclick="daftarg('{{$logedin}}',{{$detil[0]->id}})">
									Daftar Jadi Guide!
								</button>
							@endif
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

	function info(id){
		location.href='/post/'+id;
	}

	function diskusi(id){

	}

	function user(id){
		location.href="/post/user/"+id;
	}

	function daftart(oleh,ke){
		if (oleh!='no'){
		location.href='/post/'+ke+'/regist/turis/'+oleh;
		}
		else{
			location.href='/home';
		}

	}

	function daftarg(oleh,ke){
		if (oleh!='no'){
		location.href='/post/'+ke+'/regist/guide/'+oleh;
		}
		else{
			location.href='/home';
		}
		
	}

</script>
@endsection