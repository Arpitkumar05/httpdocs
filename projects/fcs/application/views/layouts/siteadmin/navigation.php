<div class="navbar-header">
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
</div>
<ul class="nav navbar-top-links navbar-right">
  <li> <a href="javascript:void(0);">Last login: <strong><?=$this->session->userdata('FCS_ADMIN_LASTLOGIN')?></strong> </a></li>
  <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);"> Welcome <?=$this->session->userdata('FCS_ADMIN_NAME')?> <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>  </a>
    <ul class="dropdown-menu dropdown-user">
      <li><a href="{BASE_URL}siteadmin/myaccount"><i class="fa fa-user fa-fw"></i>Profile</a> </li>
      <li class="divider"></li>
      <li><a href="{BASE_URL}siteadmin/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a> </li>
    </ul>
  </li>
</ul>
