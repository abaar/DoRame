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
						<form action="/search">
							<div class="search-more" >
								<div class="form-group col-md-12">
									<label class="sr-only" for="destinasi">Destinasi</label>
									<input type="text" class="form-control input-lg" id="destinasi" name="destinasi" placeholder="Destinasi">
								</div>
								<div class="form-group col-md-12">
									<label class="sr-only" for="budget">
										budget?
									</label>
									<input type="text" class="form-control input-lg" id="budget" name="budget" placeholder="Budget?">
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
								<option value="1">Budget Terendah</option>
								<option value="2">Budget Tertinggi </option>
								<option value="3">Jadwal Terdekat</option>
								<option value="4">Jadwal Terjauh</option>
							</select>
						</div>
						<p class="float-right sortme-title">Urutkan : </p>
					</div>
					<div class="row" id="postingan-container">
						@foreach($getKegiatans as $kegiatan)
						<div class="col-md-12 outerpost-container" id="{{$kegiatan->id}}" onclick="redirect(this.id)">
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
										<p class="post-ptcp">Tourist / Guide Aplicants: 
											<?php $found=0; $found2=0;?>
											@foreach($pesertas as $peserta)
												@if($peserta->id == $kegiatan->id)
													{{$peserta->jumlah}}
													<?php $found=1;?>
												@endif
											@endforeach
											@if($found==0)0 @endif
											/
											@foreach($guides as $guide)
												@if($guide->id == $kegiatan->id)
													{{$guide->jumlah}}
													<?php $found2=1;?>
												@endif
											@endforeach
											@if($found2==0)0 @endif
										</p>
										<p class="post-date">{{date('d-m-Y',strtotime($kegiatan->mulai))}} - {{date('d-m-Y',strtotime($kegiatan->selesai))}} </p>
									</div>
									<div class="col-md-6 col-xs-12 no-padding">
										@if($kegiatan->public==1)
										<button class="btn turisbtn btn-content float-right">Daftar Turis</button>
										@endif
										@if($kegiatan->needguide==1)
										<button class="btn guidebtn btn-content float-right">Daftar Guide</button>
										@endif
									</div>
								</div>								
							</div>
						</div>
					</div>
					@endforeach	
					</div>	
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
	function redirect(id){
		location.href='/post/'+id;
	}

	$("#startdate").datepicker();
	$("#enddate").datepicker();
	$("#startdate").disableAutoFill();
	$("#enddate").disableAutoFill();	
	var last=0;
	var len=0;
	var js_budget=[];
	var js_desc=[];
	var js_nama=[];
	var js_mulai=[];
	var js_selesai=[];
	var js_id=[];
	var js_peserta=[];
	var js_daterange=[];
	var js_needguide=[];
	var js_public=[];

	$(document).ready(function(){
		var post= document.getElementsByClassName('outerpost-container');
		var post_len = post.length;
		len=post_len;
		if (post_len>5){
			$("#more-btn").removeClass("unactive");
			for (var i=5 ; i<post_len ; ++i){
				post[i].style.display='none';
			}
			last=5;
		}


		var post_ptcp=document.getElementsByClassName("post-ptcp");
		var post_date=document.getElementsByClassName("post-date");
		var post_desc=document.getElementsByClassName("post-desc");
		var post_cost=document.getElementsByClassName("post-cost");
		var needguide='@foreach($getKegiatans as $kegiatan){{$kegiatan->needguide}}@endforeach';
		var post_title=document.getElementsByClassName("post-title");	
		var public ='@foreach($getKegiatans as $kegiatan){{$kegiatan->public}}@endforeach';
		
		for (var i=0; i<post_len; ++i){
			js_needguide.push(needguide[i]);
			js_public.push(public[i]);
			js_id.push(post[i].id);
			js_nama.push(post_title[i].innerHTML);
		}


		for (var i=0 ; i<post_len;++i){
			var hold=post_cost[i].innerHTML;
			js_budget.push(parseInt(hold.slice(1,hold.length)));
		}


		for (var i=0 ; i<post_len;++i){
			js_desc.push(post_desc[i].innerHTML);
		}


		for (var i=0 ; i<post_len;++i){
			var hold=post_date[i].innerHTML;
			js_mulai.push(hold.slice(0,10));
			js_selesai.push(hold.slice(13,hold.length));
		}

		for (var i=0 ; i<post_len;++i){
			var hold=post_ptcp[i].innerHTML;
			js_peserta.push(hold.slice(27,hold.length));
		}

		var date1= new Date();
		for (var i=0; i<post_len; ++i){
			var day=js_mulai[i].slice(0,2);
			var month=js_mulai[i].slice(3,5);
			var year=js_mulai[i].slice(6,js_mulai[i].length);

			var date2 = new Date((parseInt(month)+"/"+parseInt(day)+"/"+parseInt(year)).toString());
			var timeDiff = (date2.getTime() - date1.getTime());
			var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
			js_daterange.push(diffDays);
		}
	});

	$("#more-btn").click(function(){
		var post= document.getElementsByClassName('outerpost-container');
		var post_len = post.length;
		var bool=0;
		for (var i=last; i<last+5;++i){
			if (i+1==post_len){
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

		for (var i=post_len-1; i>=5; --i){
			$("#"+post[i].id).fadeOut()
		}
		last=5;
		$("#less-btn").fadeOut();
		$("#more-btn").fadeIn();
	});

	$("#sel1").change(function(){
		var option=$(this).val();
		var today= new Date();
		
		if (option==2){
			for (var i=0; i<len; ++i){
				var idx=i;
				for (var j=i+1; j<len;++j){
					if (js_budget[idx]<js_budget[j]){
						idx=j;
					}
				}
				var holder = js_daterange[idx];
				js_daterange[idx]=js_daterange[i];
				js_daterange[i]=holder;

				var holder = js_budget[idx];
				js_budget[idx]=js_budget[i];
				js_budget[i]=holder;

				var holder = js_peserta[idx];
				js_peserta[idx]=js_peserta[i];
				js_peserta[i]=holder;

				var holder = js_selesai[idx];
				js_selesai[idx]=js_selesai[i];
				js_selesai[i]=holder;

				var holder =js_mulai[idx];
				js_mulai[idx]=js_mulai[i];
				js_mulai[i]=holder;

				var holder =js_desc[idx];
				js_desc[idx]=js_desc[i];
				js_desc[i]=holder;

				var holder= js_nama[idx];
				js_nama[idx]=js_nama[i];
				js_nama[i]=holder;

				var holder =js_id[idx];
				js_id[idx]=js_id[i];
				js_id[i]=holder;
			}
			console.log(js_budget);
		}
		else if (option==3){
			for (var i=0; i<len; ++i){
				var idx=i;
				for (var j=i+1; j<len;++j){
					if (js_daterange[idx]>js_daterange[j]){
						idx=j;
					}
				}
				var holder = js_daterange[idx];
				js_daterange[idx]=js_daterange[i];
				js_daterange[i]=holder;

				var holder = js_budget[idx];
				js_budget[idx]=js_budget[i];
				js_budget[i]=holder;

				var holder = js_peserta[idx];
				js_peserta[idx]=js_peserta[i];
				js_peserta[i]=holder;

				var holder = js_selesai[idx];
				js_selesai[idx]=js_selesai[i];
				js_selesai[i]=holder;

				var holder =js_mulai[idx];
				js_mulai[idx]=js_mulai[i];
				js_mulai[i]=holder;

				var holder =js_desc[idx];
				js_desc[idx]=js_desc[i];
				js_desc[i]=holder;

				var holder= js_nama[idx];
				js_nama[idx]=js_nama[i];
				js_nama[i]=holder;

				var holder =js_id[idx];
				js_id[idx]=js_id[i];
				js_id[i]=holder;
			}
		}
		else if (option=4){
			for (var i=0; i<len; ++i){
				var idx=i;
				for (var j=i+1; j<len;++j){
					if (js_daterange[idx]<js_daterange[j]){
						idx=j;
					}
				}
				var holder = js_daterange[idx];
				js_daterange[idx]=js_daterange[i];
				js_daterange[i]=holder;

				var holder = js_budget[idx];
				js_budget[idx]=js_budget[i];
				js_budget[i]=holder;

				var holder = js_peserta[idx];
				js_peserta[idx]=js_peserta[i];
				js_peserta[i]=holder;

				var holder = js_selesai[idx];
				js_selesai[idx]=js_selesai[i];
				js_selesai[i]=holder;

				var holder =js_mulai[idx];
				js_mulai[idx]=js_mulai[i];
				js_mulai[i]=holder;

				var holder =js_desc[idx];
				js_desc[idx]=js_desc[i];
				js_desc[i]=holder;

				var holder= js_nama[idx];
				js_nama[idx]=js_nama[i];
				js_nama[i]=holder;

				var holder =js_id[idx];
				js_id[idx]=js_id[i];
				js_id[i]=holder;
			}
		}
		else if (option==1){
			for (var i=0; i<len; ++i){
				var idx=i;
				for (var j=i+1; j<len;++j){
					if (js_budget[idx]>js_budget[j]){
						idx=j;
					}
				}
				var holder = js_daterange[idx];
				js_daterange[idx]=js_daterange[i];
				js_daterange[i]=holder;

				var holder = js_budget[idx];
				js_budget[idx]=js_budget[i];
				js_budget[i]=holder;

				var holder = js_peserta[idx];
				js_peserta[idx]=js_peserta[i];
				js_peserta[i]=holder;

				var holder = js_selesai[idx];
				js_selesai[idx]=js_selesai[i];
				js_selesai[i]=holder;

				var holder =js_mulai[idx];
				js_mulai[idx]=js_mulai[i];
				js_mulai[i]=holder;

				var holder =js_desc[idx];
				js_desc[idx]=js_desc[i];
				js_desc[i]=holder;

				var holder= js_nama[idx];
				js_nama[idx]=js_nama[i];
				js_nama[i]=holder;

				var holder =js_id[idx];
				js_id[idx]=js_id[i];
				js_id[i]=holder;
			}
		}
		$(".outerpost-container").fadeOut(200);
		   	$(".outerpost-container").remove();
		   	var targetappend=document.getElementById("postingan-container");
		   	for (var i=0; i<len; ++i){
		   		var hold="<div class='col-md-12 outerpost-container unactive' id='"+js_id[i]+"' onclick='redirect(this.id)'><div class='col-md-12 post-container' style='padding: 10px'><div class='row'><div class='col-md-4 post-image-container'><img src='/img/1.jpg' class='post-image'></div><div class='col-md-8'><div class='col-md-9 text-over'><h4 class='post-title'>"+js_nama[i]+"</h4></div><div class='col-md-3'><h5 class='post-cost'>$"+js_budget[i]+"</h5></div><div class='col-md-12 border-top-grey text-over'><p class='post-desc'>"+js_desc[i]+"</p></div><div class='col-md-6 col-xs-12'><p class='post-ptcp'>Tourist / Guide Aplicants: 2</p><p class='post-date'>"+js_mulai[i]+" - "+js_selesai[i]+" </p></div><div class='col-md-6 col-xs-12 no-padding'>"
		   		if (js_public[i]=='1'){
		   			hold+="<button class='btn btn-content float-right'>Daftar Turis</button>";
		   		}
		   		if (js_needguide[i]=='1'){
		   			hold+="<button class='btn btn-content float-right'>Daftar Guide</button>";
		   		}
		   		hold+="</div></div></div></div></div>";
		   		targetappend.innerHTML+=hold;
		   	}
		   	var postingansorted=document.getElementsByClassName("outerpost-container");
		  	for(var i=0; i<5 ; ++i){
			   $("#"+postingansorted[i].id).fadeIn("fast");
			   $("#"+postingansorted[i].id).removeClass("unactive");		  		
		  	} 	

	});

</script>
@endsection