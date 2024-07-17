<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <div class="row show-grid">
        <div class="col-md-2 col-xs-12 col-sm-4"><span><a href="{BASE_URL}siteadmin/homes"><i class="fa fa-dashboard"></i> Home</a></span></div>
        <div class="col-md-3 col-xs-12 col-sm-4"><span><a href="{BASE_URL}{CURRENT_CLASS}/myaccount">Admin
            details</a></span></div>
        <div class="col-md-7 col-xs-12 col-sm-4"><span>Edit admin details</span></div>
      </div>
      {alert_message} </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading"> Edit admin details <a href="{BASE_URL}{CURRENT_CLASS}/myaccount" class="btn btn-default pull-right">Back</a></div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-1">&nbsp;</div>
            <div class="col-lg-8">
              <form id="Current_page_form" method="post" role="form" action="">
                <input type="hidden" name="CurrentDataID" id="CurrentDataID" value="<?=$profileuserdata['id']?>"/>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                <div class="form-group">
                  <label>Name<span class="required">*</span></label>
                  <input id="name" class="form-control required" name="name" type="text" value="<?php if(set_value('name')): echo set_value('name'); else: echo stripslashes($profileuserdata['name']);endif; ?>" placeholder="Name">
                  <?php if(form_error('name')): ?>
                  <label for="name" generated="true" class="error"><?php echo form_error('name'); ?></label>
                  <?php endif; ?>
                </div>
              
               
                <div class="form-group">
                  <label>Email<span class="required">*</span></label>
                  <input id="email" class="form-control required email" name="email" type="text" value="<?php if(set_value('email')): echo set_value('email'); else: echo stripslashes($profileuserdata['email']);endif; ?>" placeholder="Email">
                  <?php if(form_error('email')): ?>
                  <label for="email" generated="true" class="error"><?php echo form_error('email'); ?></label>
                  <?php endif; ?>
                </div>
                <div class="form-group">
                  <label>Phone<span class="required">*</span></label>
                  <input id="mobile" class="form-control required" name="mobile" type="text" value="<?php if(set_value('mobile')): echo set_value('mobile'); else: echo stripslashes($profileuserdata['mobile']);endif; ?>" placeholder="Mobile" minlength="10" maxlength="15">
                  <?php if(form_error('mobile')): ?>
                  <label for="mobile" generated="true" class="error"><?php echo form_error('mobile'); ?></label>
                  <?php endif; if($mobileerror):  ?>
                  <label for="mobile" generated="true" class="error"><?php echo $mobileerror; ?></label>
                  <?php endif; ?>
                </div>
                
                <div class="form-group">
                  <label>Address<span class="required">*</span></label>
                  <input id="address" class="form-control required" name="address" type="text" value="<?php if(set_value('address')): echo set_value('address'); else: echo stripslashes($profileuserdata['address']);endif; ?>" placeholder="Address" minlength="10" maxlength="15">
                  <?php if(form_error('address')): ?>
                  <label for="address" generated="true" class="error"><?php echo form_error('address'); ?></label>
                  <?php endif; ?>
                </div>
             
                <div class="form-group">
                  <label>New password</label>
                  <input id="new_password" class="form-control" name="new_password" type="password" value="<?php if(set_value('new_password')): echo set_value('new_password'); endif; ?>" placeholder="New Password" minlength="6" maxlength="25">
                  <?php if(form_error('new_password')): ?>
                  <label for="new_password" generated="true" class="error"><?php echo form_error('new_password'); ?></label>
                  <?php endif; ?>
                </div>
                <div class="form-group">
                  <label>Confirm password</label>
                  <input id="conf_password" class="form-control" name="conf_password" type="password" value="<?php if(set_value('conf_password')): echo set_value('conf_password'); endif; ?>" placeholder="Confirm Password" minlength="6" maxlength="25">
                  <?php if(form_error('conf_password')): ?>
                  <label for="conf_password" generated="true" class="error"><?php echo form_error('conf_password'); ?></label>
                  <?php endif; ?>
                </div>
                <div class="form-group">
                  <label>Logo</label>
                  <br clear="all" />
                  <span style="display:inline-block;" id="uploadIds0"><img class="img-responsive" src="{ASSET_ADMIN_URL}images/browse-white.png" border="0" alt="" /></span>
                  <input type="text" id="uploadimage0" name="uploadimage0" value="<?php if(set_value('uploadimage0')): echo set_value('uploadimage0'); else: echo stripslashes($profileuserdata['image']); endif; ?>" class="browseimageclass" />
                  <br clear="all">
                  <?php if(form_error('uploadimage0')): ?>
                  <label for="uploadimage0" generated="true" class="error"><?php echo form_error('uploadimage0'); ?></label>
                  <?php endif; ?>
                  <div id="uploadloader0" style="margin:0 0 10px 0px; float:left;display:none;"><img src="{ASSET_ADMIN_URL}images/ajax-loader.gif" border="0" /></div>
                  <span id="uploadphoto0" style="float:left;">
                  <?php if(set_value('uploadimage0')):?>
                  <img src="<?php echo stripslashes(set_value('uploadimage0'))?>" width="100" border="0" alt="" /> <a href="javascript:void(0);" onClick="DeleteImage('<?php echo stripslashes(set_value('uploadimage0'))?>','0');"> <img src="{ASSET_ADMIN_URL}images/cross.png" border="0" alt="" /> </a>
                  <?php elseif($profileuserdata['image']):?>
                  <img src="<?php echo stripslashes($profileuserdata['image'])?>" width="100" border="0" alt="" /> <a href="javascript:void(0);" onClick="DeleteImage('<?php echo stripslashes($profileuserdata['image'])?>','0');"> <img src="{ASSET_ADMIN_URL}images/cross.png" border="0" alt="" /> </a>
                  <?php endif; ?>
                  </span> <br clear="all" />
                </div>
                <input type="submit" name="SaveChanges" id="SaveChanges" value="Submit" class="btn btn-default" />
                <a href="{BASE_URL}{CURRENT_CLASS}/myaccount" class="btn btn-default">Cancel</a>
                <div class="col-sm-12" style="text-align:right;"> <span class="btn btn-outline btn-default">Note
                    :- <strong><span style="color:#FF0000;">*</span> Indicates
                    required field</strong> </span> </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
$(function(){
	UploadImage('0');
});
</script>
