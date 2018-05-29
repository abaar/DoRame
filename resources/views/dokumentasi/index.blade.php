<?php //use Str; ?>
@extends('master.layout')
@section('title', 'Timeline')

@section('content')
    <div class="container">
        <h2 style="font-weight: bold; text-align: center;">See Other's Journey</h2>
        <hr>
        {{--<div class="row">--}}
            @foreach($trips as $trip)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="/storage/docum/default.jpeg" alt="">
                        <div class="caption">
                            <h4><a href="/journey/{{$trip->id}}">{{$trip->judul}}</a></h4>
                            {{--<p>{{$trip->desktipsi}}</p>--}}
                            {{--<p><a href="/journey/{{$trip->id}}" class="btn btn-default" role="button">See more</a></p>--}}
                            {{--<p><a href="/user/{{$trip->user()->namaDepan}}">{{$trip->user()->namaDepan}}</a></p>--}}
                        </div>
                    </div>
                </div>
                {{--<div class="clearfix visible-md-block"></div>--}}
            @endforeach
        {{--</div>--}}
    </div>
@endsection                                                                                                                                                                                                                                                                                            