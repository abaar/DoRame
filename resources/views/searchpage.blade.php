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
			
			<div class="col-md-3 col-md-offset-1 search-container">
				<div class="col-md-12 result-search">
					<h1 class="h1-primary white-font">Kediri</h1>	
					<p class="p-primary white-font">42 Hasil</p>	
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
			<div class="col-md-7 sort-container">
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
			<div class="col-md-7">
				<div class="col-md-12 post-container" style="padding: 10px">
					<div class="col-md-4 post-image-container ">
						<img src="/img/1.jpg" class="post-image">
					</div>
					<div class="col-md-8">
						<div class="col-md-10 ">
							<h4 class="post-title">Gunung Kelud, Kediri , Jawa Timuuuuuuuu.....</h4>
						</div>
						<div class="col-md-2">
							<h5 class="post-cost">$1234</h5>
						</div>
						<div class="col-md-12 border-top-grey">
							<p class="post-desc">Deskripsi disini, 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789...</p>
						</div>
						<div class="col-md-6 ">
							<p class="post-ptcp">Tourist / Guide Aplicants: 20 / 5</p>
							<p class="post-date">09 April 2018 - 08 April 2018</p>
						</div>
						<div class="col-md-6 no-padding">
							<button class="btn btn-content float-right">Daftar Turis</button>
							<button class="btn btn-content float-right">Daftar Tour Guide</button>
						</div>
					</div>
				</div>
				<div class="col-md-12 post-container" style="padding: 10px">
					<div class="col-md-4 post-image-container ">
						<img src="/img/1.jpg" class="post-image">
					</div>
					<div class="col-md-8">
						<div class="col-md-10 ">
							<h4 class="post-title">Gunung Kelud, Kediri , Jawa Timuuuuuuuu.....</h4>
						</div>
						<div class="col-md-2">
							<h5 class="post-cost">$1234</h5>
						</div>
						<div class="col-md-12 border-top-grey">
							<p class="post-desc">Deskripsi disini, 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789...</p>
						</div>
						<div class="col-md-6 ">
							<p class="post-ptcp">Tourist / Guide Aplicants: 20 / 5</p>
							<p class="post-date">09 April 2018 - 08 April 2018</p>
						</div>
						<div class="col-md-6 no-padding">
							<button class="btn btn-content float-right">Daftar Turis</button>
							<button class="btn btn-content float-right">Daftar Tour Guide</button>
						</div>
					</div>

				</div>
				<div class="col-md-12 post-container" style="padding: 10px">
					<div class="col-md-4 post-image-container ">
						<img src="/img/1.jpg" class="post-image">
					</div>
					<div class="col-md-8">
						<div class="col-md-10 ">
							<h4 class="post-title">Gunung Kelud, Kediri , Jawa Timuuuuuuuu.....</h4>
						</div>
						<div class="col-md-2">
							<h5 class="post-cost">$1234</h5>
						</div>
						<div class="col-md-12 border-top-grey">
							<p class="post-desc">Deskripsi disini, 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789...</p>
						</div>
						<div class="col-md-6 ">
							<p class="post-ptcp">Tourist / Guide Aplicants: 20 / 5</p>
							<p class="post-date">09 April 2018 - 08 April 2018</p>
						</div>
						<div class="col-md-6 no-padding">
							<button class="btn btn-content float-right">Daftar Turis</button>
							<button class="btn btn-content float-right">Daftar Tour Guide</button>
						</div>
					</div>
				</div>
				<div class="col-md-12 post-container" style="padding: 10px">
					<div class="col-md-4 post-image-container ">
						<img src="/img/1.jpg" class="post-image">
					</div>
					<div class="col-md-8">
						<div class="col-md-10 ">
							<h4 class="post-title">Gunung Kelud, Kediri , Jawa Timuuuuuuuu.....</h4>
						</div>
						<div class="col-md-2">
							<h5 class="post-cost">$1234</h5>
						</div>
						<div class="col-md-12 border-top-grey">
							<p class="post-desc">Deskripsi disini, 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789...</p>
						</div>
						<div class="col-md-6 ">
							<p class="post-ptcp">Tourist / Guide Aplicants: 20 / 5</p>
							<p class="post-date">09 April 2018 - 08 April 2018</p>
						</div>
						<div class="col-md-6 no-padding">
							<button class="btn btn-content float-right">Daftar Turis</button>
							<button class="btn btn-content float-right">Daftar Tour Guide</button>
						</div>
					</div>
				</div>
				<div class="col-md-12" id="more-btn-container">
					<button class="btn" id="more-btn">Lebih Banyak</button>
				</div>				
			</div>
			<!-- end of col-md-7 -->
		</div> 
		<!-- end of row -->
	</div>
	<!-- end of container-fluid -->
@include('footer')
@endsection