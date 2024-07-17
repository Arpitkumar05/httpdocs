<link rel="shortcut icon" href="{ASSET_URL}front/images/fav.png" type="">
<link rel="icon" href="{ASSET_URL}front/images/fav.png" type="">
<script type="text/ecmascript">
var FULLSITEURL 	=	'<?php echo base_url(); ?>';
var CURRENTCLASS 	=	'<?php echo $this->router->fetch_class(); ?>';
var CURRENTMETHOD 	=	'<?php echo $this->router->fetch_method(); ?>';
var csrf_api_key	=	'<?php echo $this->security->get_csrf_token_name(); ?>';
var csrf_api_value 	=	'<?php echo $this->security->get_csrf_hash(); ?>'; 
</script>

<link href="{ASSET_ADMIN_URL}vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="{ASSET_ADMIN_URL}vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

<?php if($this->router->fetch_method() == 'myaccount' || $this->router->fetch_method() == 'managedata'): ?>
<link href="{ASSET_ADMIN_URL}vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
<link href="{ASSET_ADMIN_URL}vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
<?php endif; ?>

<link href="{ASSET_ADMIN_URL}dist/css/sb-admin-2.css" rel="stylesheet">
<link href="{ASSET_ADMIN_URL}vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<script src="{ASSET_ADMIN_URL}vendor/jquery/jquery.min.js"></script>
<script src="{ASSET_ADMIN_URL}vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="{ASSET_ADMIN_URL}vendor/metisMenu/metisMenu.js"></script>

<link rel="stylesheet" href="{ASSET_ADMIN_URL}dist/css/jquery-ui.css">
