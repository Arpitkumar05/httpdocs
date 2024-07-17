<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <div class="row show-grid">
        <div class="col-md-2 col-xs-12 col-sm-4"><span><a href="{BASE_URL}siteadmin/homes"><i class="fa fa-dashboard"></i> Home</a></span></div>
        <div class="col-md-3 col-xs-12 col-sm-4"><span><a href="{BASE_URL}{CURRENT_CLASS}/managedata">Manage
            General data</a></span></div>
        <div class="col-md-7 col-xs-12 col-sm-4">
          <span><?=$EDITDATA?'Edit':'Add'?>
          General data</span></div>
      </div>
      {alert_message} </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <?=$EDITDATA?'Edit':'Add'?>
          General data <a href="{BASE_URL}{CURRENT_CLASS}/managedata" class="btn btn-default pull-right">Back</a></div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12 three-form">
              <form id="Current_page_form_admin" method="post" role="form" action="">
                <input type="hidden" name="CurrentDataID" id="CurrentDataID" value="<?=$EDITDATA['id']?>"/>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                <div class="col-lg-12">
                   
                      <div class="col-lg-4">
                    <div class="form-group">
                        <label>Title<span class="required">*</span></label>
                      <input id="title" class="form-control required" name="title" type="text" value="<?php if(set_value('title')): echo set_value('title'); else: echo stripslashes($EDITDATA['title']);endif; ?>" placeholder="title">
                      <?php if(form_error('title')): ?>
                      <label for="title" generated="true" class="error"><?php echo form_error('title'); ?></label>
                      <?php endif; ?>
                    </div>
                  </div>
                    
               <!--      <div class="col-lg-4">
                    <div class="form-group">
                        <label>type<span class="required">*</span></label>
                      <input id="type" class="form-control required" name="type" type="text" value="<?php if(set_value('type')): echo set_value('type'); else: echo stripslashes($EDITDATA['type']);endif; ?>" placeholder="type">
                      <?php if(form_error('type')): ?>
                      <label for="type" generated="true" class="error"><?php echo form_error('type'); ?></label>
                      <?php endif; ?>
                    </div>
                  </div>
              -->
                 </div>
                
              <div class="col-lg-12">
                  <?php if($EDITDATA['type']=='Sitelogo'):  
   ?>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label>Content<span class="required">*</span></label>
                      <?php if(set_value('content')): $content	= set_value('content'); elseif($EDITDATA['content']): $content	= $EDITDATA['content']; else: $content	= ''; endif; ?>
                      <textarea style="resize:none" name="content" id="Description" class="required" placeholder="content"><?php echo stripslashes($content); ?></textarea>
                      <?php if(form_error('content')): ?>
                      <label for="content" generated="true" class="error"><?php echo form_error('content'); ?></label>
                      <?php endif; ?>
                    </div>
                  </div>
                  
                  <?php else:  ?>
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label>Content<span class="required">*</span></label>
                        <input id="content" class="form-control required"  name="content" type="text" value="<?php if(set_value('content')): echo set_value('content'); else: echo stripslashes($EDITDATA['content']);endif; ?>" placeholder="content">
                      <?php if(form_error('content')): ?>
                      <label for="content" generated="true" class="error"><?php echo form_error('content'); ?></label>
                      <?php endif; ?>
                    </div>
                  </div>
                  <?php endif; ?>
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
