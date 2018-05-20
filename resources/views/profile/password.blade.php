@extends('profile.masterprofile')
@section('content')
    <div class="container">
        {{--@include('profile.sidebar')--}}
        <h2>Change Password</h2>
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
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary">Update</button>
                <br>
            </form>
        </div>
    </div>
@endsection
