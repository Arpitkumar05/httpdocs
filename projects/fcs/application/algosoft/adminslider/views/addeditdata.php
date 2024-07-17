<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <div class="row show-grid">
        <div class="col-md-2 col-xs-12 col-sm-4"><span><a href="{BASE_URL}siteadmin/homes"><i class="fa fa-dashboard"></i> Home</a></span></div>
        <div class="col-md-3 col-xs-12 col-sm-4"><span><a href="{BASE_URL}{CURRENT_CLASS}/managedata">Manage
            Slider</a></span></div>
        <div class="col-md-7 col-xs-12 col-sm-4">
          <span><?=$EDITDATA?'Edit':'Add'?>
          Slider</span></div>
      </div>
      {alert_message} </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <?=$EDITDATA?'Edit':'Add'?>
          Slider <a href="{BASE_URL}{CURRENT_CLASS}/managedata" class="btn btn-default pull-right">Back</a></div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12 three-form">
              <form id="Current_page_form_admin" method="post" role="form" action="">
                <input type="hidden" name="CurrentDataID" id="CurrentDataID" value="<?=$EDITDATA['id']?>"/>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                <fieldset>
                <legend>Slider details</legend>
                
                <div class="col-lg-12">
                     <div class="col-lg-4">
                    <div class="form-group">
                      <label>Title</label>
                      <input id="name" class="form-control " name="title" type="text" value="<?php if(set_value('title')): echo set_value('title'); else: echo stripslashes($EDITDATA['title']);endif; ?>" placeholder="Title">
                      <?php if(form_error('title')): ?>
                      <label for="title" generated="true" class="error"><?php echo form_error('title'); ?></label>
                      <?php endif; ?>
                    </div>
                  </div>
                     <div class="col-lg-4">
                  <div class="form-group">
                    <label>Image</label>
                    <br clear="all" />
                    <span style="display:inline-block;" id="uploadIds0"><img class="img-responsive " src="{ASSET_ADMIN_URL}images/browse-white.png" border="0" alt="" /></span><br clear="all" />
                    <input type="text" id="uploadimage0" name="uploadimage0" value="<?php if(set_value('uploadimage0')): echo set_value('uploadimage0'); else: echo stripslashes($EDITDATA['image']); endif; ?>" class="browseimageclass " />
                    <br clear="all">
                    <?php if(form_error('uploadimage0')): ?>
                    <label for="uploadimage0" generated="true" class="error"><?php echo form_error('uploadimage0'); ?></label>
                    <?php endif; ?>
                    <label id="uploadstatus0" class="error"></label>
                    <div id="uploadloader0" style="margin:0 0 10px 0px; float:left;display:none;"><img src="{ASSET_ADMIN_URL}images/ajax-loader.gif" border="0" /></div>
                    <span id="uploadphoto0" style="float:left;">
                    <?php if(set_value('uploadimage0')):?>
                    <img src="<?php echo stripslashes(set_value('uploadimage0'))?>" width="100" border="0" alt="" /> <a href="javascript:void(0);" onClick="DeleteImage('<?php echo stripslashes(set_value('uploadimage0'))?>','0');"> <img src="{ASSET_ADMIN_URL}images/cross.png" border="0" alt="" /> </a>
                    <?php elseif($EDITDATA['image']):?>
                    <img src="<?php echo stripslashes($EDITDATA['image'])?>" width="100" border="0" alt="" /> <a href="javascript:void(0);" onClick="DeleteImage('<?php echo stripslashes($EDITDATA['image'])?>','0');"> <img src="{ASSET_ADMIN_URL}images/cross.png" border="0" alt="" /> </a>
                    <?php endif; ?>
                    </span> <br clear="all" />
                   </div>
                 </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Image Alt</label>
                      <input id="name" class="form-control " name="image_alt" type="text" value="<?php if(set_value('image_alt')): echo set_value('image_alt'); else: echo stripslashes($EDITDATA['image_alt']);endif; ?>" placeholder="Image Alt">
                      <?php if(form_error('image_alt')): ?>
                      <label for="image_alt" generated="true" class="error"><?php echo form_error('image_alt'); ?></label>
                      <?php endif; ?>
                    </div>
                  </div>
                        
                 
                </div>
                
                <!--
                
                 <div class="col-lg-12">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label>Content</label>
                      <textarea  style="resize:none" name="content" id="content" class="form-control " placeholder="Content"><?php if(set_value('content')): echo set_value('content'); else: echo stripslashes($EDITDATA['content']);endif; ?></textarea>
                      <?php if(form_error('Content')): ?>
                      <label for="Content" generated="true" class="error"><?php echo form_error('Content'); ?></label>
                      <?php endif; ?>
                    </div>
                  </div>
                      </fieldset>
                
                        <fieldset>
                <legend>link details</legend>
                <div class="col-lg-12">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Link Title </label>
                      <input type="text" name="linktitle" id="linktitle" class="form-control " value="<?php if(set_value('linktitle')): echo set_value('linktitle'); else: echo stripslashes($EDITDATA['linktitle']);endif; ?>" placeholder="link title">
                      <?php if(form_error('linktitle')): ?>
                      <label for="linktitle" generated="true" class="error"><?php echo form_error('linktitle'); ?></label>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Link Content</label>
                      <input type="text" name="linkcontent" id="linkcontent" class="form-control " value="<?php if(set_value('linkcontent')): echo set_value('linkcontent'); else: echo stripslashes($EDITDATA['linkcontent']);endif; ?>" placeholder="link content">
                      <?php if(form_error('linkcontent')): ?>
                      <label for="linkcontent" generated="true" class="error"><?php echo form_error('linkcontent'); ?></label>
                      <?php endif; ?>
                    </div>
                  </div>
                
                </div>
                  </fieldset>
                       
         -->
                      
                 </div>
                </div>
                <br clear="all" />
                <div class="col-md-12 add-padding">
                  <input type="submit" name="SaveChanges" id="SaveChanges" value="Submit" class="btn btn-default" />
                  <a href="{BASE_URL}{CURRENT_CLASS}/managedata" class="btn btn-default">Cancel</a>
                  <div class="col-sm-12" style="text-align:right;"> <span class="btn btn-outline btn-default">Note
                    :- <strong><span style="color:#FF0000;">*</span> Indicates
                    required field</strong> </span> </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
  $('#Current_page_form_admin').validate({ 
  });
});  
</script>
<script>
$(function(){
	UploadImage('0');
});
</script>