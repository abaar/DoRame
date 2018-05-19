@extends('master.layout')

@section('title')
	Halo
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="/css/post.css">

@endsection

@section('content')
	<div class="container-fluid boody" style="margin:0">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h3 class="post-title">Kota kediri kota impian kota tahu tempe pecel wenak bos!</h3>
			</div>
			<div class="col-md-10 col-md-offset-1" style="">
				<img src="/img/1.jpg" style="width: 100%; max-height: 400px; overflow: hidden;">
			</div>
			<!--End of foto -->
			<div class="col-md-7 col-md-offset-1" id="side-info">
				<div class="col-md-12 blue what-info">
					<h4>Apa yang kamu dapatkan!</h4>
					<p><span class="glyphicon glyphicon-briefcase"></span> Live Competent Guide</p>
					<p>Didampingi oleh Guide secara langsung</p>
					<p><span class="glyphicon glyphicon-camera"></span> Documentation</p>
					<p>Guidemu akan mendokumentasikan tourmu!</p>
					<p><span class="glyphicon glyphicon-barcode"></span> Negotiable Price</p>
					<span class="glyphicon glyphicon-bookmark"></span> Tujuan Wisata
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
					<a href="#" style="text-align: center;"><p>see less</p></a>
				</div>
			</div>
			<!-- end of side-info -->
			<div class="col-md-3 main-info-cont">
				<div class="col-md-12" id="main-info">
					<div class="col-md-12 " id="main-info-header">
						<p class="" style="display:inline-block;">
							$1234
						</p>
						<button class="btn apply-btn float-me-right">
							Daftar Turis
						</button>
						<button class="btn apply-btn float-me-right">
							Daftar Guide
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
					<div class="col-md-12" style="display: inline-block">
						<a href="#" class="float-me-right main-info-anchor" style="display:block;">Undang Teman <span class="glyphicon glyphicon-envelope"></span> </a>
						<br>
						<a href="#" class="float-me-right main-info-anchor" style="display: block">Bagikan <span class="glyphicon glyphicon-share-alt"></span></a>	
					</div>
				</div>
			</div>
			<!-- end of main-info -->
			<div class="col-md-12">
				
			</div>
		</div>
		<!-- end of row -->
	</div>
	<!-- end of container fluid -->
@endsection