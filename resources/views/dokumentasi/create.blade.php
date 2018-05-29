@extends('master.layout')
@section('Tilte', 'Write My Journey')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2 style="text-align: center;" class="">Share your Journey</h2>
                <hr>
                <div class="col-md-12">
                    <form action="/story/create">

                    </form>
                </div>
            </div>
        </div>
    </div>
    <textarea id="story"></textarea>
@endsection

@section('script')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'story' );
    </script>
@endsection