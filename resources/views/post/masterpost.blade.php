@extends('master.layout')

@section('title','My Post')

@section('style')
	@yield('poststyle')
@endsection

@section('content')
	<div class="container-fluid boody" style="padding: 0">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h3 class="post-title">
				<!-- Kota kediri kota impian kota tahu tempe pecel wenak bos! -->
				@yield('content-posttitle')
				</h3>
			</div>
			<div class="col-md-10 col-md-offset-1 image-container" style="">
				<div class="left-img-container"></div>
				@yield('content-postimg')
				<!-- <img src="/img/1.jpg" id="img-container"> -->
				<div class="right-img-container"></div>
			</div>
			<!--End of foto -->
			<div class="col-md-7 col-md-offset-1" id="side-info">
				@yield('content-maincontent')
			</div>
			<!-- end of side-info -->
			<div class="col-md-3 main-info-cont" id="page-option-container">
				<div class="col-md-12" id="page-option">
					@yield('content-owner-regist')
				</div>
			</div>
			<div class="col-md-3 main-info-cont" style="margin-top: 2%">
				@yield('content-sidecontent')
			</div>
			<!-- end of main-info -->
		</div>
		<!-- end of row -->
	</div>
	<!-- end of container fluid -->
@endsection

@section('script')
	@yield('script-post')
@endsection