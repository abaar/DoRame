@extends('layouts.layout')

@section('title') DoRame @endsection

@section('content')
@include('navbar')
<style type="text/css">
	.navbar.transparent.navbar-inverse .navbar-inner {
	   background: rgba(0,0,0,0);
	}
</style>
<link rel="stylesheet" type="text/css" href="/css/landing-content.css">

<div class="container-fluid" style="padding: 0">
	<div class="container-fluid img-container" style="padding: 0">

		<div class="container-div-black">
			<div class="col-md-8 col-xs-12  col-md-offset-2 vcenter">
				<h1 class="h1-primary white-font">Do-Rame</h1>
				<p class="p-primary white-font">Mulai petualanganmu bersama tour guide dan teman baru!</p>
				<br>
				<br>
				<form>
					<div class="form-group col-md-4">
						<label class="sr-only" for="destinasi">Destinasi</label>
						<input type="text" class="form-control input-lg" id="destinasi" name="destinasi" placeholder="Destinasi">
					</div>
					<div class="form-group col-md-2 col-xs-12">
						<label class="sr-only" for="budget">
							Jumlah orang
						</label>
						<input type="text" class="form-control input-lg" id="budget" name="budget" placeholder="Budget?">
					</div>
					<div class="form-group col-md-4">
						<div class="input-group input-daterange">
						    <input type="textarea" class="form-control input-lg" value="" id="startdate">
						    <div class="input-group-addon">to</div>
						    <input type="text" class="form-control input-lg" value="" id="enddate">
						</div>
					</div>
					<div class="form-group col-md-2 col-xs-12">
						<label class="sr-only">Submit</label>
						<input type="submit" class="form-control input-lg" name="Cari" value="Cari">
					</div>
				</form>
			</div>
		</div>

	</div>
</div>

<div class="container-fluid">
	<div class="row">
			<h2 class="section-title">Top Guide</h2>
			<div class="col-md-2 col-xs-2 col-xs-offset-2 guide" id="guide1">
				<div class="container-div-black disabled" id="disable1">
					<div class="guide-content-hover">
					<p>Nama</p>
					<p>Umur</p>
					<p>Asal</p>
					<p>Rating</p>							
					</div>
				</div>
				<div class="guide-content" id="enable1">
					<p style="color: white">X</p>
				</div>
			</div>
			<div class="col-md-2 col-xs-2 col-xs-offset-1 guide" id="guide2">
				<div class="container-div-black disabled" id="disable2">
					<div class="guide-content-hover">
					<p>Nama</p>
					<p>Umur</p>
					<p>Asal</p>
					<p>Rating</p>							
					</div>
				</div>
				<div class="guide-content" id="enable2">
					<p>Y</p>
				</div>
			</div>
			<div class="col-md-2 col-xs-2 col-xs-offset-1 guide" id="guide3">
				<div class="container-div-black disabled" id="disable3">
					<div class="guide-content-hover">
					<p>Nama</p>
					<p>Umur</p>
					<p>Asal</p>
					<p>Rating</p>							
					</div>
				</div>
				<div class="guide-content" id="enable3">
					<p>AAAAZ</p>
				</div>
			</div>
			<div class="col-md-2 col-xs-2 col-xs-offset-4 guide" id="guide4">
				<div class="container-div-black disabled" id="disable4">
					<div class="guide-content-hover">
					<p>Nama</p>
					<p>Umur</p>
					<p>Asal</p>
					<p>Rating</p>							
					</div>
				</div>
				<div class="guide-content" id="enable4">
					<p>A</p>
				</div>
			</div>
			<div class="col-md-2 col-xs-2 col-xs-offset-1 guide" id="guide5">
				<div class="container-div-black disabled" id="disable5">
					<div class="guide-content-hover">
					<p>Nama</p>
					<p>Umur</p>
					<p>Asal</p>
					<p>Rating</p>							
					</div>
				</div>
				<div class="guide-content" id="enable5">
					<p>B</p>
				</div>
			</div>
			<div class="col-md-12 col-xs-12 no-padding">
			<div class="btn-container">
				<button class="btn btn-more-detail">Selengkapnya</button>
			</div>
		</div>
		</div>
		<div class="col-md-8 col-md-offset-2 col-xs-8 col-xs-offset-2 bordering-top">
		</div>
	</div>
	<div class="row">
		<h2 class="section-title">Cara Mencari Guide dan Teman</h2>
		<div class="col-md-4 col-xs-4">
			<div class="col-md-10 col-xs-10 col-md-offset-2 col-xs-offset-2 red">
				<div class="use-content">
					<div class="use-header">
						<p class="use-number">1</p>
						<p class="use-title">Daftar</p>
					</div>
					<div class="use-image">
					</div>
					<div class="use-description">
						<p>
							Daftarkan diri dan isi identitasmu dan pastikan semua data yang terisi sudah benar.
						</p>
					</div>
				</div>
			</div>
		</div>	
		<div class="col-md-4 col-xs-4">
			<div class="col-md-10 col-xs-10 col-md-offset-1 col-xs-offset-1 red">
				<div class="use-content">
					<div class="use-header">
						<p class="use-number">2</p>
						<p class="use-title">Post Keinginanmu</p>
					</div>
					<div class="use-image">
					</div>
					<div class="use-description">
						<p>
							Cari dan ikut rencana liburan orang. Atau buatlah rencanamu sendiri dan para guide dari penjuru Nusantara akan menawarkan jasanya kepadamu.
						</p>
					</div>					
				</div>
			</div>
		</div>
		<div class="col-md-4 col-xs-4">
			<div class="col-md-10 col-xs-10 red">
				<div class="use-content">
					<div class="use-header">
						<p class="use-number">3</p>
						<p class="use-title">Enjoy!</p>
					</div>
					<div class="use-image">
					</div>
					<div class="use-description">
						<p>
							Nikmati petualanganmu!
						</p>
					</div>					
				</div>
			</div>
		</div>
		<div class="col-md-12 col-xs-12 no-padding">
			<div class="btn-container">
				<button class="btn btn-more-detail">Selengkapnya</button>
			</div>
		</div>
	</div>
</div>
@include('footer')
@endsection

@section('script')
<script>
//kalau end dipiih duluan dan ternyata > start pas dipilih belum
var start_date=$("stardate").val();
var flag_date=0;
$('.input-daterange input').each(function() {
	var id=$(this).attr("id");
    $(this).daterangepicker({
    	singleDatePicker:true,
    	isInvalidDate:function(date){
		var d;
		if (id=='enddate' &&flag_date==1) {
			d = start_date;
			var month = parseInt(d[0]+d[1]);
			var day = parseInt(d[3]+d[4]);
			var year = parseInt(d[6]+d[7]+d[8]+d[9]);
			if(date.format('DD')<day && date.format('MM')==month && date.format('YYYY')==year){
				return true;
			}
			else if(date.format('MM')<month){
				return true;
			}
			else if (date.format('YYYY')<year){
				return true;
			}
		}
		else{
			d = new Date();
			var year = d.getFullYear();
			var month = d.getMonth()+1;
			var day = d.getDate();
			if(date.format('DD')<day && date.format('MM')==month && date.format('YYYY')==year){
				return true;
			}
			else if(date.format('MM')<month){
				return true;
			}
			else if (date.format('YYYY')<year){
				return true;
			}
		}
	}
    },function(start,end,label){
	  	console.log('New date range selected: ' + start.format('YYYY-MM-DD') +" "+ id);
	  	if(id=='startdate'){
	  		start_date=start.format('MM')+'/'+start.format('DD')+'/'+start.format('YYYY');
	  		flag_date=1;
	  	}
   	});
});


function replaceme(){
	var tinggi=$(".vcenter").height();
	var tinggi_window=$(window).height();
	tinggi= (tinggi_window-tinggi)/2;
	tinggi=tinggi*100/tinggi_window;
	tinggi=tinggi+"%";
	$(".vcenter").css("top",tinggi);

	var width_selengkapnya=$(".btn-more-detail").width();
	var width_window=$(window).width();
	width_selengkapnya=(width_window-width_selengkapnya)/2;
	width_selengkapnya=width_selengkapnya*100/width_window;
	width_selengkapnya=width_selengkapnya+"%";
	$(".btn-more-detail").css("margin-left",width_selengkapnya);
};

var use_width=413;
var use_height=242;
var guide_height=202;
var guide_width=246;

function resizeme(){
	var current_guide=$(".guide-content").width();
	var current_use=$(".use-content").width();

	$(".guide-content").css("height",(current_guide*guide_height/guide_width)+"px");
	$(".use-image").css("height",(current_use*use_height/use_width)+"px");	
}

$("#guide1").mouseover(function(){
	$("#disable1").css("display","block");
	$("#enable1").css("display","none");
});

$("#guide1").mouseout(function(){
	$("#disable1").css("display","none");
	$("#enable1").css("display","block");
});

$("#guide2").mouseover(function(){
	$("#disable2").css("display","block");
	$("#enable2").css("display","none");
});

$("#guide2").mouseout(function(){
	$("#disable2").css("display","none");
	$("#enable2").css("display","block");
});

$("#guide3").mouseover(function(){
	$("#disable3").css("display","block");
	$("#enable3").css("display","none");
});

$("#guide3").mouseout(function(){
	$("#disable3").css("display","none");
	$("#enable3").css("display","block");
});

$("#guide4").mouseover(function(){
	$("#disable4").css("display","block");
	$("#enable4").css("display","none");
});

$("#guide4").mouseout(function(){
	$("#disable4").css("display","none");
	$("#enable4").css("display","block");
});

$("#guide5").mouseover(function(){
	$("#disable5").css("display","block");
	$("#enable5").css("display","none");
});

$("#guide5").mouseout(function(){
	$("#disable5").css("display","none");
	$("#enable5").css("display","block");
});

$(window).ready(function(){
	replaceme();
});

$(window).on("scroll",function(){
	if ($(this).scrollTop()+50>=$(this).height()){
		$(".navbar").css("background-color","#1b1b1b");
	}
	else{
		$(".navbar").css("background-color","unset");
	}
});

$(window).resize(function(){
	replaceme();
	resizeme();
});


</script>

@endsection