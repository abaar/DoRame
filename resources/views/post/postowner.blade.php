@extends('post.masterpost')

@section('poststyle')
<link rel="stylesheet" type="text/css" href="/css/post.css">
@endsection

@section('content-posttitle')

Kota kediri kota impian kota tahu tempe pecel wenak bos!

@endsection


@section('content-postimg')
<img src="/img/1.jpg" id="img-container">
@endsection

@section('content-maincontent')
				<div class="col-md-12 blue what-info">
					<h4>Apa yang kamu dapatkan!
						<span class="float-me-right"> 
							<a href="#">
          					<span class="glyphicon glyphicon-cog"></span>
        					</a>
        				</span>
        			</h4>
					<p class="what-main"><span class="glyphicon glyphicon-briefcase"></span> Live Competent Guide</p>
					<p class="what-submain">Didampingi oleh Guide secara langsung</p>
					<p class="what-main"><span class="glyphicon glyphicon-camera"></span> Documentation</p>
					<p class="what-submain">Guidemu akan mendokumentasikan tourmu!</p>
					<p class="what-main"><span class="glyphicon glyphicon-barcode"></span> Negotiable Price</p>
					<p class="what-main"><span class="glyphicon glyphicon-bookmark"></span> Tujuan Wisata</p>
					<ul>
						<li>
							<a href="#">Gunung Kelud</a>	
						</li>
						<li>
							<a href="#">Simpang Lima Gumul</a>
						</li>
						<li>
							<a href="#">Warung pecel mbok e</a>
						</li>
					</ul>
				</div>
				<!-- end of left info -->
				<div class="col-md-12 desc-info">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pellentesque luctus dui vitae consequat. Sed placerat, nunc et bibendum laoreet, quam lorem euismod purus, quis aliquam dui nibh non purus. Proin ut dictum ligula. Ut ultricies turpis ligula, sit amet hendrerit nisl mollis non. Nullam iaculis tincidunt quam, vitae dignissim lectus porta eu. Donec tristique ac felis in hendrerit. Quisque vel pulvinar nibh, ut varius tortor. Vivamus laoreet eros mi, nec interdum tellus dignissim in.<p>
				</div>
				<!-- end of desc info -->
				<div class="col-md-12 note-info">
					<p>
						Catatan
					</p>
					<ul>
						<li>
							Jangan berak sembarangan
						</li>
						<li>
							Jangan buang sampah sembarangan
						</li>
						<li>
							Jangan norak
						</li>
						<li>
							Jangan nggodain mbak mbak
						</li>
					</ul>
					<a href="#" class="text-center"><p>see less</p></a>
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

</script>
@endsection