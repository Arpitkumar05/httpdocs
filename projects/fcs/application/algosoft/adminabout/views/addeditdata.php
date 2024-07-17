<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <div class="row show-grid">
        <div class="col-md-2 col-xs-12 col-sm-4"><span><a href="{BASE_URL}siteadmin/homes"><i class="fa fa-dashboard"></i> Home</a></span></div>
        <div class="col-md-3 col-xs-12 col-sm-4"><span><a href="{BASE_URL}{CURRENT_CLASS}/managedata">Manage
            About </a></span></div>
        <div class="col-md-7 col-xs-12 col-sm-4">
          <span><?=$EDITDATA?'Edit':'Add'?>
          About Section</span></div>
      </div>
      {alert_message} </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <?=$EDITDATA?'Edit':'Add'?>
          Section <a href="{BASE_URL}{CURRENT_CLASS}/managedata" class="btn btn-default pull-right">Back</a></div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12 three-form">
              <form id="Current_page_form_admin" method="post" role="form" action="">
                <input type="hidden" name="CurrentDataID" id="CurrentDataID" value="<?=$EDITDATA['id']?>"/>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                <div class="col-lg-12">
  
                     <div class="col-lg-4">
                  <div class="form-group">
                    <label>Image<span class="required">*</span></label>
                    <br clear="all" />
                    <span style="display:inline-block;" id="uploadIds0"><img class="img-responsive " src="{ASSET_ADMIN_URL}images/browse-white.png" border="0" alt="" /></span><br clear="all" />
                    <input   type="text" id="uploadimage0" name="uploadimage0" value="<?php if(set_value('uploadimage0')): echo set_value('uploadimage0'); else: echo stripslashes($EDITDATA['image']); endif; ?>" class="browseimageclass " />
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
               
                        
                 
                </div>
           
                 <div class="col-lg-12">
                     <div class="col-lg-12">
                    <div class="form-group">
                        <label >Content <span  class="required">*</span></label>
                      <?php if(set_value('content')): $content	= set_value('content'); elseif($EDITDATA['content']): $content	= $EDITDATA['content']; else: $content	= ''; endif; ?>
                      <textarea style="resize:none" name="content" id="Description" class="required" placeholder="content"><?php echo stripslashes($content); ?></textarea>
                      <?php if(form_error('content')): ?>
                      <label for="content" generated="true" class="error"><?php echo form_error('content'); ?></label>
                      <?php endif; ?>
                    </div>
                  </div>
                 </div>
                       
         
                      
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




