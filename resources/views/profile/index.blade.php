@extends('profile.masterprofile')
@section('content')
    <div class="container">
        {{--@include('profile.sidebar')--}}

        <h2 style="text-align: center;">My Profile</h2>
        <hr>
        <form class="form-group" method="POST" action="/myprofile/edit" enctype="multipart/form-data">
            <div class="col-md-3 col-md-push-6 col-xs-6 col-xs-offset-3" style="margin-left:10%;">
                <img class="img-responsive" src="/storage/img/{{ Auth::user()->foto?:'defaultava.jpg'}}">
                @component('component.form.input', [
                        'type' => 'file',
                        'name' => 'foto',
                        'label' => 'Change image'
                 ])@endcomponent
            </div>
            <div class="col-md-6  col-md-pull-3 col-xs-12" style="/*border: 1px  black solid;*/">
                {{--<form class="form-group" method="post" action="/myprofile/edit" enctype="multipart/form-data">--}}
                    @component('component.form.input', [
                        'name' => 'namaDepan',
                        'label' => 'First Name',
                        'placeholder' => 'Your first name',
                        'object' => Auth::user()
                    ])@endcomponent
                    @component('component.form.input', [
                        'name' => 'namaBelakang',
                        'label' => 'Last Name',
                        'placeholder' => 'Your last name',
                        'object' => Auth::user()
                    ])@endcomponent
                    @component('component.form.input', [
                        'name' => 'asalkota',
                        'label' => 'City',
                        'placeholder' => 'Your origin city',
                        'object' => Auth::user()
                    ])@endcomponent
                    {{--@component('component.form.input', [--}}
                    {{--'name' => 'username',--}}
                    {{--'label' => 'Username',--}}
                    {{--'attributes' => 'readonly'--}}
                    {{--])@endcomponent--}}
                    <label for="username" class="control-label">Username</label>
                    <p class="class="form-control-static" id="username">{{Auth::user()->username}}</p>
                    <label for="email" class="control-label">E-mail</label>
                    <p class="class="form-control-static" id="email">{{Auth::user()->email}}</p>
                    {{csrf_field()}}
{{--                    {{method_field('POST')}}--}}
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                    <br>

            </div>
        </form>
    </div>
    <div class="container">
        <h2 style="text-align: center;">Change Password</h2>
        <hr>
        <div class="col-md-6 col-md-offset-3 col-xs-12" style="/*border: 1px  black solid;*/">
            <form class="form-group" method="post" action="/myprofile/edit">
                @component('component.form.input', [
                    'type' => 'password',
                    'name' => 'curpass',
                    'label' => 'Current password',
                    'placeholder' => 'Your current password'
                ])@endcomponent
                @component('component.form.input', [
                    'type' => 'password',
                    'name' => 'newpass',
                    'label' => 'New password',
                    'placeholder' => 'Your new password'
                ])@endcomponent
                @component('component.form.input', [
                    'type' => 'password',
                    'name' => 'repass',
                    'label' => 'Re-type new password',
                    'placeholder' => 'Re-type your new password'
                ])@endcomponent
                <div id="passcheck"></div>
                <br>
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary">Update Password</button>
                <br>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#repass').keyup(function () {
                let pass1 = $('#newpass').val();
                let pass2 = $('#repass').val();
                if (pass1 != pass2){
                    $('#passcheck').removeClass('text-success');
                    $('#passcheck').addClass('text-danger');
                    $('#passcheck').text('Password mismatch');
                }
                else{
                    $('#passcheck').removeClass('text-danger');
                    $('#passcheck').addClass('text-success');
                    $('#passcheck').text('Password match');
                }
            });
        });
    </script>
@endsection