<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">DoRame</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{(\Request::is('home*'))?' active':''}}"><a href="/home">Home <span class="sr-only">(current)</span></a></li>
                <li class="{{(\Request::is('trip*'))?' active':''}}"><a href="/trip">Trip</a></li>
                <li class="{{(\Request::is('timeline*'))?' active':''}}"><a href="/timeline">Timeline</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hi, {{Auth::user()->namaDepan}} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('/myprofile/edit')}}">Edit Profile</a></li>
                        {{--<li><a href="{{url('/myprofile/password')}}">Change Password</a></li>--}}
                        <li><a href="{{url('/myprofile/history')}}">Trip History</a></li>
                        {{--<li><a href="{{url('/myprofile/mytrip')}}">Active Trip</a></li>--}}
                        <li role="separator" class="divider"></li>
                        <li><a href="{{route('logout')}}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>