@extends('profile.masterprofile')
@section('rightside')
    <h2>My Profile</h2>
    <hr>
    <form class="form-group" method="post" action="/myprofile/edit">
        @component('component.form.input', [
            'name' => 'namadepan',
            'label' => 'First Name',
            'placeholder' => 'Your first name'
        ])@endcomponent
        @component('component.form.input', [
            'name' => 'namabelakang',
            'label' => 'Last Name',
            'placeholder' => 'Your last name'
        ])@endcomponent
        @component('component.form.input', [
            'name' => 'asalkota',
            'label' => 'City',
            'placeholder' => 'Your origin city'
        ])@endcomponent
        {{--@component('component.form.input', [--}}
            {{--'name' => 'username',--}}
            {{--'label' => 'Username',--}}
            {{--'attributes' => 'readonly'--}}
        {{--])@endcomponent--}}
        <label for="username" class="control-label">Username</label>
        <p class="class="form-control-static"" id="username">someRandomUsername</p>
        <label for="email" class="control-label">E-mail</label>
        <p class="class="form-control-static"" id="email">example@random.com</p>
        <button type="submit" class="btn btn-primary">Update</button>
        <br>
    </form>
@endsection