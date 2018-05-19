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
				<h3 class="post-title">Dolo</h3>
			</div>
			<div class="col-md-10 col-md-offset-1 image-container" style="">
				<div class="left-img-container"></div>
				<img src="/img/1.jpg" id="img-container">
				<div class="right-img-container"></div>
			</div>
			<!--End of foto -->
			<div class="col-md-7 col-md-offset-1" id="side-info">
				<div class="col-md-12 desc-info">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pellentesque luctus dui vitae consequat. Sed placerat, nunc et bibendum laoreet, quam lorem euismod purus, quis aliquam dui nibh non purus. Proin ut dictum ligula. Ut ultricies turpis ligula, sit amet hendrerit nisl mollis non. Nullam iaculis tincidunt quam, vitae dignissim lectus porta eu. Donec tristique ac felis in hendrerit. Quisque vel pulvinar nibh, ut varius tortor. Vivamus laoreet eros mi, nec interdum tellus dignissim in.<p>
				</div>
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
			</div>
			<!-- end of side-info -->
			<div class="col-md-3 col-xs-12 main-info-cont" id="page-option-container">
				<div class="col-md-12 more-img-container">
					<img src="/img/1.jpg" class="col-md-12 col-xs-12" style="">
				</div>
			</div>
			<div class="col-md-3 col-xs-12 main-info-cont" id="page-option-container">
				<div class="col-md-12 more-img-container">
					<img src="/img/1.jpg" class="col-md-12 col-xs-12" style="">
				</div>
			</div>
			<div class="col-md-3 col-xs-12 main-info-cont" id="page-option-container">
				<div class="col-md-12 more-img-container">
					<img src="/img/1.jpg" class="col-md-12 col-xs-12" style="">
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