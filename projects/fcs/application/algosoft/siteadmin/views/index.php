<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Admin login</title>
<link href="{ASSET_ADMIN_URL}vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="{ASSET_ADMIN_URL}vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
<link href="{ASSET_ADMIN_URL}dist/css/sb-admin-2.css" rel="stylesheet">
<link href="{ASSET_ADMIN_URL}vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script type="text/ecmascript">
var FULLSITEURL 	=	'<?php echo base_url(); ?>';
var CURRENTCLASS 	=	'<?php echo $this->router->fetch_class(); ?>';
var CURRENTMETHOD 	=	'<?php echo $this->router->fetch_method(); ?>';
</script>
</head>

<body class="landing_bg">
<div class="container">
  <div class="row">
   
    <div class="col-md-4 col-md-offset-4">
           <div class="login-logo"> <img src="<?= base_url() ?>/assets/sitelogo/1513755682logo.png" " alt="FCS" width="300"> </div> 
      <div class="login-panel panel panel-default landing_form">
        <div class="panel-heading" style="height:auto;">
          <h3 class="panel-title" style="text-align:center; font-weight:bold;">Login</h3>
        </div>
          
        <div class="panel-body">
          <form name="LoginForm" id="LoginForm" action="" method="post">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
            <fieldset>
            <?php if($error): ?>
            <div class="alert alert-danger">
              <?=$error?>
            </div>
            <?php endif; ?>
            <div class="form-group">
                
                
              	<input class="form-control required" name="useremail" id="useremail" type="text" value="<?php if(set_value('useremail')): echo set_value('useremail'); else: echo get_cookie('FCSUserEmail');endif; ?>" placeholder="Email" autocomplete="off" onKeyPress="capLock(event)"/>
				<?php if(form_error('useremail')): ?>
                <label for="useremail" generated="true" class="error"><?php echo form_error('useremail'); ?></label>
                <?php endif; ?>
            </div>
            <div class="form-group">
              	<input class="form-control required" name="password" id="password" type="password" value="<?php if(set_value('password')): echo set_value('password'); else: echo get_cookie('FCSUserPass');endif; ?>" placeholder="Password" autocomplete="off"/>
				        <?php if(form_error('password')): ?>
                <label for="password" generated="true" class="error"><?php echo form_error('password'); ?></label>
                <?php endif; ?>
            </div>
            <div class="checkbox">
              <label>
              <input type="checkbox" id="RememberMe" name="RememberMe" value="YES" <?php if(get_cookie('FCSRememberMe')) echo 'checked="checked"';?> />
              Remember me </label>
            </div>
            <input type="submit" name="LoginFormSubmit" id="LoginFormSubmit" value="Login" class="btn btn-lg btn-success btn-block btn-orange">
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="{ASSET_ADMIN_URL}vendor/jquery/jquery.min.js"></script>
<script src="{ASSET_ADMIN_URL}vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="{ASSET_ADMIN_URL}vendor/metisMenu/metisMenu.min.js"></script>
<script src="{ASSET_ADMIN_URL}dist/js/sb-admin-2.js"></script>
<script type="text/javascript" src="{ASSET_ADMIN_URL}js/jquery.validate.js"></script>
<script type="text/javascript" src="{ASSET_ADMIN_URL}js/manoj-plugin.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#LoginForm").validate();
});
</script>
<script>
function capLock(e){
 kc = e.keyCode?e.keyCode:e.which;
 sk = e.shiftKey?e.shiftKey:((kc == 16)?true:false);
 if(((kc >= 65 && kc <= 90) && !sk)||((kc >= 97 && kc <= 122) && sk))
  document.getElementById('divMayus').style.visibility = 'visible';
 else
  document.getElementById('divMayus').style.visibility = 'hidden';
}
</script>
</body>
</html>