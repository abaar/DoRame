@extends('layouts.layout')

@section('title') DoRame @endsection

@section('content')
@include('navbar')
<style type="text/css">
	.full-corousel-img-size{
		height: 100%;
		background-size: cover; background-position: center; background-repeat: no-repeat;
	}
</style>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-xs-12" style="height:100vh; padding: 0;">
			<div id="myCarousel" class="carousel slide" data-ride="carousel" style=" width: 100%;height: 100%;padding: 0;">
				  <!-- Indicators -->
				  <ol class="carousel-indicators">
				    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				    <li data-target="#myCarousel" data-slide-to="1"></li>
				    <li data-target="#myCarousel" data-slide-to="2"></li>
				  </ol>

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" style="height: 100%;">
				    <div class="item active full-corousel-img-size" style="background-image: url('/img/city.jpg'); ">
				      <!-- <img src="/img/city.jpg" alt="Los Angeles" style="object-fit: cover"> -->
				    </div>

				    <div class="item full-corousel-img-size" style="background-image: url('/img/laugh.jpg')">
				      <!-- <img src="/img/laugh.jpg" alt="Chicago"> -->
				    </div>

				    <div class="item full-corousel-img-size" style="background-image: url('/img/nature.jpg')">
				      <!-- <img src="/img/nature.jpg" alt="New York"> -->
				    </div>
				  </div>

				  <!-- Left and right controls -->
				  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#myCarousel" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>
		</div>
		<div class="col-md-4 col-xs-12" style="height: 100vh; background-color: yellow">
			
		</div>
	</div>
</div>
@endsection