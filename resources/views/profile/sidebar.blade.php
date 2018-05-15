<div class="col-md-3 col-xs-2" style="/*border: 1px  black solid;*/ padding-top: 20px;">
    <div class="btn-group-vertical" role="group" style="text-align: left; min-width: 80%;">
        <a href="/myprofile/edit" class="btn btn-default {{(\Request::is('myprofile/edit*'))?' active':''}}" role="button" style="text-align: left;">
            <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
            <span class="side-text">&nbsp;Edit Profile</span>
        </a>
        <a href="/myprofile/password" class="btn btn-default {{(\Request::is('myprofile/password*'))?' active':''}}" role="button" style="text-align: left;">
            <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
            <span class="side-text">&nbsp;Edit Password</span>
        </a>
        <a href="/myprofile/history" class="btn btn-default {{(\Request::is('myprofile/history*'))?' active':''}}" role="button" style="text-align: left;">
            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
            <span class="side-text">&nbsp;Trip History</span>
        </a>
    </div>
</div>