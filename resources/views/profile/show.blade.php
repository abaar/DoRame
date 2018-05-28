@extends('profile.masterprofile')
@section('title', 'Profile')
@section('content')
    <div class="container">
        {{--@include('profile.sidebar')--}}

        <h2 style="text-align: center;">Profile</h2>
        <hr>
        {{--<div class="row">--}}
            <div class="col-md-3 col-md-push-6 col-xs-6 col-xs-offset-3" style="margin-left:10%;">
                <img class="img-responsive" src="/storage/img/{{ $user->foto?:'defaultava.jpg'}}">
            </div>
            <div class="col-md-6  col-md-pull-3 col-xs-12">
                <label for="namaDepan" class="control-label">First Name</label>
                <p class="class="form-control-static" id="namaDepan">{{$user->namaDepan}}</p>
                <label for="namaBelakang" class="control-label">Last Name</label>
                <p class="class="form-control-static" id="namaBelakang">{{$user->namaBelakang}}</p>
                <label for="asalkota" class="control-label">City</label>
                <p class="class="form-control-static" id="asalkota">{{$user->asalkota}}</p>
            </div>
        {{--</div>--}}
    </div>
    <br><br><br><br><br>
@endsection