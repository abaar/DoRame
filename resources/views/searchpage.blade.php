@extends('layouts.layout')



@section('content')
	<style type="text/css">
		.navbar{
			background-color: #1b1b1b;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="/css/searchpage.css">
@include('navbar')

	<div class="container-fluid boody">
		<div class="row">
			<div class="col-md-12" style="padding: 0 5%">
				
			
				<div class="col-md-3 search-container">
					<div class="col-md-12 result-search text-over">
						<h1 class="h1-primary white-font">{{$realdest}}</h1>	
						<p class="p-primary white-font"><?php echo count($getKegiatans)?> Hasil</p>	
					</div>
					<div class="form-container">
						<form class="">
							<div class="search-more" >
								<div class="form-group col-md-12">
									<label class="sr-only" for="destinasi">Destinasi</label>
									<input type="text" class="form-control input-lg" id="destinasi" name="destinasi" placeholder="Destinasi">
								</div>
								<div class="form-group col-md-12">
									<label class="sr-only">From</label>
									<input type="text" class="form-control input-lg" value="" id="startdate">
								</div>
								<div class="form-group col-md-12">
									<label class="sr-only">To</label>
									<input type="text" class="form-control input-lg" value="" id="enddate">
								</div>	
								<div class="form-group col-md-12 col-xs-12">
									<label class="sr-only">Submit</label>
									<input type="submit" class="form-control input-lg" name="Cari" value="Cari">
								</div>							
							</div>
							<div class="col-md-12 filterme">
								<h3 class="filter-title">Filter</h3>
								<h4>Applying as : </h4>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="checkguide">
										Tour Guide
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="checkguide">
										Turis
									</label>
								</div>
							</div>		
						</form>
					</div>
				</div>
				<div class="col-md-9">
					<div class="col-md-12 sort-container">
						<div class="col-md-3 form-group float-right ">
							<label class="sr-only" for="sel1">Select list:</label>
							<select class="form-control input-sm" id="sel1">
								<option>Budget Tertinggi</option>
								<option>Budget Terendah</option>
								<option>Durasi Terlama</option>
								<option>Durasi Terpendek</option>
							</select>
						</div>
						<p class="float-right sortme-title">Urutkan : </p>
					</div>		
					@foreach($getKegiatans as $kegiatan)
					<div class="col-md-12 outerpost-container" id="{{$kegiatan->id}}">
						<div class="col-md-12 post-container" style="padding: 10px">
							<div class="row">
							<div class="col-md-4 post-image-container ">
								<img src="/img/1.jpg" class="post-image">
							</div>
							<div class="col-md-8">
								<div class="col-md-9 text-over ">
									<h4 class="post-title">{{($kegiatan->nama)}}</h4>
								</div>
								<div class="col-md-3 ">
									<h5 class="post-cost">${{$kegiatan->budget}}</h5>
								</div>
								<div class="col-md-12 border-top-grey text-over">
									<p class="post-desc">{{($kegiatan->deskripsi)}}</p>
								</div>
								<div class="col-md-6 col-xs-12 ">
									<p class="post-ptcp">Tourist / Guide Aplicants: 20 / 5</p>
									<p class="post-date">09 April 2018 - 08 April 2018</p>
								</div>
								<div class="col-md-6 col-xs-12 no-padding">
									<button class="btn btn-content float-right">Daftar Turis</button>
									<button class="btn btn-content float-right">Daftar Guide</button>
								</div>
							</div>								
							</div>
						</div>
					</div>
					@endforeach		
				</div>
				<div class="col-md-12" id="more-btn-container">
					<button class="btn unactive" id="more-btn">Lebih Banyak</button>
					<button class="btn unactive" id="less-btn">Lebih Sedikit</button>
				</div>
				<!-- end of col-md-7 -->
			</div>				
		</div> 
		<!-- end of row -->
	</div>
	<!-- end of container-fluid -->
@include('footer')
@endsection

@section('script')
<script type="text/javascript">
	var last=0;
	$(document).ready(function(){
		var post= document.getElementsByClassName('outerpost-container');
		var post_len = post.length;
		if (post_len>5){
			$("#more-btn").removeClass("unactive");
			for (var i=5 ; i<post_len ; ++i){
				post[i].style.display='none';
			}
			last=5;
		}
	});

	$("#more-btn").click(function(){
		var post= document.getElementsByClassName('outerpost-container');
		var post_len = post.length;
		var bool=0;
		for (var i=last; i<last+5;++i){
			if (i==post_len){
				$("#more-btn").fadeOut();
				$("#less-btn").fadeIn();
				bool=1;
				break;

			}
			else{
				post[i].style.display="block";
			}
		}

		if (bool==0){
			last=last+5;
		}
	});

	$("#less-btn").click(function(){
		var post= document.getElementsByClassName('outerpost-container');
		var post_len = post.length;

		for (var i=post_len-1; i>=last; --i){
			$("#"+post[i].id).fadeOut();
		}
		$("#less-btn").fadeOut();
		$("#more-btn").fadeIn();
	});

</script>
@endsection