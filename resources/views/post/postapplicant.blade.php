@extends('post.masterpost')

@section('poststyle')
<link rel="stylesheet" type="text/css" href="/css/post.css">
<link rel="stylesheet" type="text/css" href="/css/post-applicant.css">
@endsection

@section('content-posttitle')

Kota kediri kota impian kota tahu tempe pecel wenak bos!

@endsection


@section('content-postimg')
<img src="/img/1.jpg" id="img-container">
@endsection

@section('content-maincontent')
				<div class="col-md-12 applicant-section">
					<div id="applicant-option">
						<div class="col-md-2 choice-option choice-option-aplicant active" id="turis-div-btn">
							<p>Turis</p>
						</div>
						<div class="col-md-2 choice-option choice-option-aplicant" id="guide-div-btn">
							<p>Guide</p>
						</div>
						<div class="col-md-2 choice-option choice-option-aplicant" id="request-div-btn">
							<p>Pendaftar</p>
						</div>											
					</div>

					<table class="table table-striped table-active" id="turis-user">
					    <thead>
					      <tr>
					        <th class="col-md-8">Nama</th>
					        <th class="col-md-4">Aksi</th>
					      </tr>
					    </thead>
					    <tbody>
					      <tr>
					        <td>John</td>
					        <td>
					        	<input type="submit" name="terima" value="Keluarkan" onclick="return confirm ('Anda yakin?')" class="btn btn-danger">
					        </td>
					      </tr>
					      <tr>
					        <td>Mary</td>
					        <td>
					        	<input type="submit" name="terima" value="Keluarkan" onclick="return confirm ('Anda yakin?')" class="btn btn-danger">
					        </td>
					      </tr>
					      <tr>
					        <td>July</td>
					        <td>
					        	<input type="submit" name="terima" value="Keluarkan" onclick="return confirm ('Anda yakin?')" class="btn btn-danger">
					        </td>
					      </tr>
					    </tbody>
					 </table>

					<table class="table table-striped table-nonactive" id="guide-user">
					    <thead>
					      <tr>
					        <th class="col-md-8">Nama</th>
					        <th class="col-md-4">Aksi</th>
					      </tr>
					    </thead>
					    <tbody>
					      <tr>
					        <td>Johnoooo</td>
					        <td>
					        	<input type="submit" name="terima" value="Keluarkan" onclick="return confirm ('Anda yakin?')" class="btn btn-danger">
					        </td>
					      </tr>
					      <tr>
					        <td>Marry me</td>
					        <td>
					        	<input type="submit" name="terima" value="Keluarkan" onclick="return confirm ('Anda yakin?')" class="btn btn-danger">
					        </td>
					      </tr>
					      <tr>
					        <td>July januari</td>
					        <td>
					        	<input type="submit" name="terima" value="Keluarkan" onclick="return confirm ('Anda yakin?')" class="btn btn-danger">
					        </td>
					      </tr>
					    </tbody>
					  </table>


					<table class="table table-striped table-nonactive" id="request-user">
					    <thead>
					      <tr>
					        <th class="col-md-6">Nama</th>
					        <th class="col-md-2">Sebagai</th>
					        <th class="col-md-4">Aksi</th>
					      </tr>
					    </thead>
					    <tbody>
					      <tr>
					        <td>Johnoooo</td>
					        <td>Guide</td>
					        <td>
					        	<input type="submit" name="terima" value="Terima" onclick="return confirm ('Anda yakin?')" class="btn btn-success">
					        	<input type="submit" name="tolak" value="Tolak" onclick="return confirm ('Anda yakin ingin menolak?')" class="btn btn-danger">
					        </td>
					      </tr>
					      <tr>
					        <td>Marry me</td>
					        <td>Wisatawan</td>
					        <td>
					        	<input type="submit" name="terima" value="Terima" onclick="return confirm ('Anda yakin?')" class="btn btn-success">
					        	<input type="submit" name="tolak" value="Tolak" onclick="return confirm ('Anda yakin ingin menolak?')" class="btn btn-danger">
					        </td>
					      </tr>
					      <tr>
					        <td>July januari</td>
					        <td>Guide</td>
					        <td>
					        	<input type="submit" name="terima" value="Terima" onclick="return confirm ('Anda yakin?')" class="btn btn-success">
					        	<input type="submit" name="tolak" value="Tolak" onclick="return confirm ('Anda yakin ingin menolak?')" class="btn btn-danger">
					        </td>
					      </tr>
					    </tbody>
					  </table>					  
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
	$("#turis-div-btn").click(function(){
		$("#guide-user").css("display","none");
		$("#request-user").css("display","none");
		$("#turis-user").fadeIn();
		$(this).addClass("active");
		$("#guide-div-btn").removeClass("active");
		$("#request-div-btn").removeClass("active")
	});

	$("#guide-div-btn").click(function(){
		$("#turis-user").css("display","none");
		$("#request-user").css("display","none");
		$("#guide-user").fadeIn();
		$(this).addClass("active");
		$("#turis-div-btn").removeClass("active");
		$("#request-div-btn").removeClass("active");
	});

	$("#request-div-btn").click(function(){
		$("#turis-user").css("display","none");
		$("#guide-user").css("display","none");
		$("#request-user").fadeIn();
		$(this).addClass("active");
		$("#turis-div-btn").removeClass("active");
		$("#guide-div-btn").removeClass("active");
	});	
</script>
@endsection