@extends('post.masterpost')

@section('poststyle')
<link rel="stylesheet" type="text/css" href="/css/post.css">
<link rel="stylesheet" type="text/css" href="/css/post-discuss.css">
@endsection

@section('content-posttitle')

Kota kediri kota impian kota tahu tempe pecel wenak bos!

@endsection


@section('content-postimg')
<img src="/img/1.jpg" id="img-container">
@endsection

@section('content-maincontent')
				<div class="col-md-12 comment-section">
					<div>
						<form>
							<div class="form-group">
								<label class="sr-only">Komentar</label>
								<textarea class="form-control" rows="3" id="komentar" placeholder="Komentar..."></textarea>
							</div>
							<div class="form-group">
								<label class="sr-only">submit</label>
								<input type="submit" name="submit" class="form-control">
							</div>
						</form>
					</div>
					<!-- end of comment container -->





					<div>
						<div class="col-md-1 img-comment-cont" style="">
							<img src="/img/1.jpg" class="img-comment">
						</div>
						<div class="col-md-11 inline-block" style="">
							<p><span class="comment-user"><a class="float-me-left" href="#">Akbar Noto</span></a> 09/04/2018 19:00</p>
						</div>
						<div class="col-md-11 col-md-offset-1 comment-cont">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pellentesque luctus dui vitae consequat. Sed placerat, nunc et bibendum laoreet, quam lorem euismod purus, quis aliquam dui nibh non purus. Proin ut dictum ligula. Ut ultricies turpis ligula, sit amet hendrerit nisl mollis non. Nullam iaculis tincidunt quam, vitae dignissim lectus porta eu. Donec tristique ac felis in hendrerit. Quisque vel pulvinar nibh, ut varius tortor. Vivamus laoreet eros mi, nec interdum tellus dignissim in</p>
						</div>
						<div class="col-md-11 col-md-offset-1 inline-block comment-footer-cont" id="akbarnoto">
							<p class="float-me-left comment-footer" id="akbarnoto_rep" onclick="komenme(this.id)">Reply</p>
							<p class="float-me-left comment-footer" id="akbarnoto_del">Delete</p>
						</div>
					</div>					
					<!-- end of ppl's comment -->
					<div>
						<div class="col-md-1 img-comment-cont" style="">
							<img src="/img/1.jpg" class="img-comment">
						</div>
						<div class="col-md-11 inline-block" style="">
							<p><span class="comment-user"><a class="float-me-left" href="#">Akbar Noto</span></a> 09/04/2018 19:00</p>
						</div>
						<div class="col-md-11 col-md-offset-1 comment-cont">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pellentesque luctus dui vitae consequat. Sed placerat, nunc et bibendum laoreet, quam lorem euismod purus, quis aliquam dui nibh non purus. Proin ut dictum ligula. Ut ultricies turpis ligula, sit amet hendrerit nisl mollis non. Nullam iaculis tincidunt quam, vitae dignissim lectus porta eu. Donec tristique ac felis in hendrerit. Quisque vel pulvinar nibh, ut varius tortor. Vivamus laoreet eros mi, nec interdum tellus dignissim in</p>
						</div>
						<div class="col-md-11 col-md-offset-1 inline-block comment-footer-cont" id="akbarnoto">
							<p class="float-me-left comment-footer" id="akbarnoto_rep" onclick="komenme(this.id)">Reply</p>
							<p class="float-me-left comment-footer" id="akbarnoto_del">Delete</p>
						</div>
					</div>					
					<!-- end of ppl's comment -->
					<div>
						<div class="col-md-1 img-comment-cont" style="">
							<img src="/img/1.jpg" class="img-comment">
						</div>
						<div class="col-md-11 inline-block" style="">
							<p><span class="comment-user"><a class="float-me-left" href="#">Akbar Noto</span></a> 09/04/2018 19:00</p>
						</div>
						<div class="col-md-11 col-md-offset-1 comment-cont">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pellentesque luctus dui vitae consequat. Sed placerat, nunc et bibendum laoreet, quam lorem euismod purus, quis aliquam dui nibh non purus. Proin ut dictum ligula. Ut ultricies turpis ligula, sit amet hendrerit nisl mollis non. Nullam iaculis tincidunt quam, vitae dignissim lectus porta eu. Donec tristique ac felis in hendrerit. Quisque vel pulvinar nibh, ut varius tortor. Vivamus laoreet eros mi, nec interdum tellus dignissim in</p>
						</div>
						<div class="col-md-11 col-md-offset-1 inline-block comment-footer-cont" id="akbarnoto">
							<p class="float-me-left comment-footer" id="akbarnoto_rep" onclick="komenme(this.id)">Reply</p>
							<p class="float-me-left comment-footer" id="akbarnoto_del">Delete</p>
						</div>
					</div>					
					<!-- end of ppl's comment -->
					<div>
						<div class="col-md-1 img-comment-cont" style="">
							<img src="/img/1.jpg" class="img-comment">
						</div>
						<div class="col-md-11 inline-block" style="">
							<p><span class="comment-user"><a class="float-me-left" href="#">Akbar Noto</span></a> 09/04/2018 19:00</p>
						</div>
						<div class="col-md-11 col-md-offset-1 comment-cont">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pellentesque luctus dui vitae consequat. Sed placerat, nunc et bibendum laoreet, quam lorem euismod purus, quis aliquam dui nibh non purus. Proin ut dictum ligula. Ut ultricies turpis ligula, sit amet hendrerit nisl mollis non. Nullam iaculis tincidunt quam, vitae dignissim lectus porta eu. Donec tristique ac felis in hendrerit. Quisque vel pulvinar nibh, ut varius tortor. Vivamus laoreet eros mi, nec interdum tellus dignissim in</p>
						</div>
						<div class="col-md-11 col-md-offset-1 inline-block comment-footer-cont" id="akbarnoto">
							<p class="float-me-left comment-footer" id="akbarnoto_rep" onclick="komenme(this.id)">Reply</p>
							<p class="float-me-left comment-footer" id="akbarnoto_del">Delete</p>
						</div>
					</div>					
					<!-- end of ppl's comment -->
				</div>
@endsection

@section('content-owner-regist')
<div class="col-md-4 choice-option" id="page-info">
	<p>Informasi</p>
</div>
<div class="col-md-4 choice-option" id="chat-info">
	<p>Diskusi</p>
</div>
<div class="col-md-4 choice-option" id="regist-info">
	<p>Pendaftar</p>
</div> 
@endsection


@section('content-sidecontent')
				<div class="col-md-12" id="main-info" style="">
					<div class="col-md-12 " id="main-info-header">
						<p>
							$1234
						</p>
						<button class="btn apply-btn float-me-right">
							Batalkan Rencana
						</button>
					</div>
					<div class="col-md-12">
						<p class="main-info-content" id="wisata"><span class="glyphicon glyphicon-user"></span> 10 Wisatawan & 20 Guide</p>
					</div>
					<div class="col-md-12">
						<p class="main-info-content" id="date"><span class="glyphicon glyphicon-time"></span> 09 April 1998 - 08 April 1997</p>
					</div>
					<div class="col-md-12">
						<p class="main-info-content" id="place"><span class="glyphicon glyphicon-map-marker"></span> Main City : Kediri</p>
					</div>
					<div class="col-md-12" id="anchor-container">
						<a href="#" class="float-me-right main-info-anchor" style="">Undang Teman <span class="glyphicon glyphicon-envelope"></span> </a>
						<br>
						<a href="#" class="float-me-right main-info-anchor" style="">Bagikan <span class="glyphicon glyphicon-share-alt"></span></a>	
					</div>
@endsection

@section('script-post')
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