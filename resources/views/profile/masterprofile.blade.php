@extends('master.layout')

@section('title', 'My Profile')
@section('style')
    <link rel="stylesheet" href="/css/profile.css">
@endsection
@section('content')
    <div class="container">
        @include('profile.sidebar')
        <div class="col-md-9 col-xs-10" style="/*border: 1px  black solid;*/">
            @yield('rightside')
        </div>
    </div>
@endsection