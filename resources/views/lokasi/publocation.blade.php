@extends('master.layout')

@section('title')
	Halo
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="/css/post.css">
<link rel="stylesheet" type="text/css" href="/css/post-discuss.css">
<link rel="stylesheet" type="text/css" href="/css/location.css">
@endsection

@section('content')
	<div class="container-fluid boody">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h3 class="post-title">{{$data[0]->nama}}</h3>
			</div>
			<div class="col-md-10 col-md-offset-1 image-container" style="">
				<div class="left-img-container"></div>
					@if($data[0]->fotoLokasi==null)
						<img src="/img/nopict.jpg" id="img-container">
					@else
						<img src="{{$data[0]->fotoLokasi}}" id="img-container">
					@endif
				<div class="right-img-container"></div>
			</div>
			<!--End of foto -->
			<div class="col-md-7 col-md-offset-1" id="side-info">
				<div class="col-md-12 desc-info">
					<p>{{$data[0]->deskripsi}}<p>
				</div>
				<div class="col-md-12 comment-section">
					<div>
						<form>
							<div class="form-group">
								<label class="sr-only">Komentar</label>
								<textarea class="form-control" rows="3" id="komentar" placeholder="Komentar..." disabled="">Login untuk berkomentar</textarea>
							</div>
							<div class="form-group">
								<label class="sr-only">submit</label>
								<input type="submit" name="submit" class="form-control" disabled="">
							</div>
						</form>
					</div>
					<!-- end of comment container -->
					
					@if (count($komentar)==0)
						Belum ada komentar!
					@endif
					@foreach($komentar as $k)
					<div>
						<div class="col-md-1 img-comment-cont" style="">
							<img src="/img/1.jpg" class="img-comment">
						</div>
						<div class="col-md-11 inline-block" style="">
							<p><span class="comment-user"><a class="float-me-left" href="#">{{$k->namaDepan}}</a></span> {{$k->created_at}}</p>
						</div>
						<div class="col-md-11 col-md-offset-1 comment-cont">
							<p>{{$k->komentar}}</p>
						</div>
						<div class="col-md-11 col-md-offset-1 inline-block comment-footer-cont" id="akbarnoto">
							<p class="float-me-left comment-footer" id="akbarnoto_rep" onclick="komenme(this.id)">Reply</p>
							<p class="float-me-left comment-footer" id="akbarnoto_del">Delete</p>
						</div>
					</div>
					@endforeach
								
					<!-- end of ppl's comment -->
				</div>
			</div>
			<div class="col-md-3 main-info-cont" style="margin-top:5%">
					<div class="col-md-12" id="main-info" style="margin-bottom: 10%;">
					<div class="col-md-12 " id="main-info-header">
						
					</div>
					<div class="col-md-12">
						<p class="main-info-content" id="wisata"><span class="glyphicon glyphicon-user"></span>@if(count($totalkunjungan)==0) 0 @else {{$totalkunjungan[0]->total}} @endif kali dikunjungi. </p>
					</div>
					<div class="col-md-12">
						<p class="main-info-content" id="wisata"><span class="glyphicon glyphicon-user"></span>@if(count($jumlahkomentar)==0) 0 @else {{$jumlahkomentar[0]->total}} @endif Total komentar. </p>
					</div>
					<div class="col-md-12">
	
					</div>

				</div>
			</div>
			<!-- end of more photos -->
		</div>
		<!-- end of row -->
	</div>
	<!-- end of container fluid -->
@endsection


@section('script')
<script type="text/javascript">
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
</script>

@endsection