@extends('profile.masterprofile')
@section('content')
    <div class="container">
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
                <div id="passcheck"></div>
                <br>
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary">Update</button>
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