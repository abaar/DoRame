@extends('master.layout')
@section('title')
    Write My Journey
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2 style="text-align: center;" class="">Share your Journey</h2>
                <hr>
                <div class="col-md-12">
                    <form action="/journey/create" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <label for="kegiatan" class="control-label">Trip's Name</label>
                        <p style="margin-bottom: 10px;" class="form-control-static" id="kegiatan">dummynama</p>
                        @component('component.form.input', [
                        'name' => 'title',
                        'label' => 'Title',
                        'placeholder' => 'Give your story a title',
                        ])@endcomponent
                        @component('component.form.input', [
                        'type' => 'file',
                        'name' => 'foto[]',
                        'label' => 'Photos (multiple)',
                        'attributes' => 'multiple'
                        ])@endcomponent
                        <input type="hidden" name="kegiatan" value="{{isset($kegiatan)}}">
                        <label for="story" class="control-label">Story Content</label>
                        <textarea name="story" id="story"></textarea>
                        <br>
                        <button type="submit" class="btn btn-primary">Create</button>
                        <br><br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'story' );
    </script>
@endsection