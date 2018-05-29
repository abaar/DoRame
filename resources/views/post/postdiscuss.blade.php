@extends('post.masterpost')

@section('poststyle')
<link rel="stylesheet" type="text/css" href="/css/post.css">
<link rel="stylesheet" type="text/css" href="/css/post-discuss.css">
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
				<div class="col-md-12 comment-section">
					<div>
						<form method="post" action="/post/{{$detil[0]->id}}/discuss/insert">
							<div class="form-group">
								<label class="sr-only">Komentar</label>
								<textarea class="form-control" rows="2" id="komentar" name="komentar" placeholder="Komentar..." onkeyup="textAreaAdjust(this)" style="overflow:hidden"></textarea>
							</div>
							<div class="form-group">
								<label class="sr-only">submit</label>
								<input type="submit" name="submit" class="form-control">
							</div>
						</form>
					</div>
					<!-- end of comment container -->




					@foreach($diskusis as $diskusi)
					<div>
						<div class="col-md-1 img-comment-cont" style="">
							@if($diskusi->foto==null)
							<img src="/img/defaultava.jpg" class="img-comment">
							@else
							<img src="/storage/img/{{$diskusi->foto?:'defaultava.jpg'}}" class="img-comment">
							@endif

						</div>
						<div class="col-md-11 inline-block" style="">
							<p><span class="comment-user"><a class="float-me-left" href="/user/{{$diskusi->uid}}">{{$diskusi->nama}}</a></span> {{$diskusi->kapan}}</p>
						</div>
						<div class="col-md-11 col-md-offset-1 comment-cont">
							<p>{{$diskusi->komentar}}</p>
						</div>
						<div class="col-md-11 col-md-offset-1 inline-block comment-footer-cont" id="akbarnoto">
							<p class="float-me-left comment-footer" id="{{$diskusi->username}}" onclick="komenme(this.id)">Reply</p>
							@if(Auth::user()->id==$diskusi->uid)
							<p class="float-me-left comment-footer" id="{{$diskusi->kid}}" onclick="deleteme(this.id)">Delete</p>
							@endif
						</div>
					</div>					
					@endforeach
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
						@if($detil[0]->leader==Auth::user()->id)
						<button class="btn apply-btn float-me-right" onclick="cancelmypost({{$detil[0]->id}})">
							Batalkan Rencana
						</button>
						@else
						<button class="btn apply-btn float-me-right" onclick="batalikut({{$detil[0]->id}},{{Auth::user()->id}})">Batal Ikut
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

	
	function deleteme(me){
		if (confirm("Apakah anda yakin?")){
			location.href='/post/discuss/delete/'+me;
		}
	}
	function komenme(me){
		var txtarea=document.getElementById("komentar");
		$("")
		var start=txtarea.selectionStart;
		var end = txtarea.selectionEnd;
		var sel = txtarea.value.substring(start,end);
		var idlength = me.length;
		var id='';
		for (var i =0; i < idlength-4; i++) {
			id=id+me[i];
		}
		id=id+' ';
		
		var finText = '@'+id;
		 txtarea.value = finText;
  		txtarea.focus();
  		txtarea.selectionEnd= end + idlength+1;
	}
	function textAreaAdjust(o) {
	  o.style.height = "1px";
	  o.style.height = (25+o.scrollHeight)+"px";
	}

	function info(id){
		location.href='/post/'+id;
	}

	function diskusi(id){

	}

	function user(id){
		location.href="/post/user/"+id;
	}

	function cancelmypost(id){
		if(confirm("Apakah anda yakin?")){
			location.href="/post/cancel/"+id;
		}
	}

	function batalikut(id,user){
		if(confirm("Apakah anda yakin?")){
			location.href='/post/'+id+'/batal/'+user;
		}
	}
</script>
@endsection