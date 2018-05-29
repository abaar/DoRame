<nav class="navbar transparent navbar-fixed-top" style="margin:0">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand nav-content" href="#" style="color : white; font-size: 1.5em;"">Dorame</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#" data-toggle="modal" data-target="#myModal" class="nav-content" style="color : white; font-size: 1.5em;">Login</a></li>

            <li><a href="#" class="nav-content" style="color : white; font-size: 1.5em;">Get Started</a></li>
        </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="padding: 5%; text-align: center;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Mulai petualanganmu sekarang!</h4>
      </div>
      <div class="modal-body">
        <form action="/login" method="post">
          <div class="form-group"> 
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" placeholder="enter username">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="enter password">
          </div>
          <div class="checkbox">
          <label><input type="checkbox" value="" checked>Remember me</label>
          </div>
          <button type="submit" class="btn btn-block" style="background-color: #27ae60; color: white"> Login</button>

        </form>
      </div>
      <div class="modal-footer">
        <p>Belum punya akun?<a href="/regist"> Daftar sekarang!</a></p>
      </div>
    </div>

  </div>
</div>