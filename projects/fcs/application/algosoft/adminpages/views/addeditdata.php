<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <div class="row show-grid">
        <div class="col-md-2 col-xs-12 col-sm-4"><span><a href="{BASE_URL}siteadmin/homes"><i class="fa fa-dashboard"></i> Home</a></span></div>
        <div class="col-md-3 col-xs-12 col-sm-4"><span><a href="{BASE_URL}{CURRENT_CLASS}/managedata">Manage
            Pages</a></span></div>
        <div class="col-md-7 col-xs-12 col-sm-4">
            
          <span><?=$EDITDATA?'Edit':'Add'?>
          Pages</span></div>
      </div>
      {alert_message} </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
             
        
          <?=$EDITDATA?'Edit':'Add'?>
          Pages <a href="{BASE_URL}{CURRENT_CLASS}/managedata" class="btn btn-default pull-right">Back</a></div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12 three-form">
              <form id="Current_page_form_admin" method="post" role="form" action="">
            <input type="hidden" name="CurrentDataID" id="CurrentDataID" value="<?=$EDITDATA['id']?>"/>
           
             <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
            <div class="box-body">
            <div class="col-lg-12">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Name</label>
                  <input id="name" class="form-control required" name="name" type="text" value="<?php if(set_value('name')): echo set_value('name'); else: echo stripslashes($EDITDATA['name']);endif; ?>" placeholder="Name" readonly="readonly">
                  <?php if(form_error('name')): ?>
                  <label for="name" generated="true" class="error"><?php echo form_error('name'); ?></label>
                  <?php endif; ?>
                </div>
              </div>
                <div class="col-lg-4">
                    <div class="form-group">
                      <label>Page Slug</label>
                   <input id="slug" class="form-control" name="slug" type="text" value="<?php if(set_value('slug')): echo set_value('slug'); else: echo stripslashes($EDITDATA['slug']);endif; ?>" placeholder="Slug">
                  <?php if(form_error('slug')): ?>
                  <label for="slug" generated="true" class="error"><?php echo form_error('slug'); ?></label>
                  <?php endif; ?>
                </div>
              </div>
                      <div class="col-lg-4">
                    <div class="form-group">
                             <input type="hidden" name="parent" id="CurrentDataID" value="0_____0"/>
                             <!--
                      <label>Parent Page</label>
                    <?php if(set_value('parent')): $parent = set_value(parent); else: $parent = $EDITDATA['parent_id']; endif; ?>
                 <select name="parent" id="parent" class="form-control col-md-7 col-xs-12 required">
                    <option value="0_____0">None</option>
                  <?php //echo $this->admindata_model->get_parent('0',$parent); ?>
                  </select>
                  <?php if(form_error('parent')): ?>
                  <label for="parent" generated="true" class="error"><?php echo form_error('parent'); ?></label>
                  <?php endif; ?>
                             -->
                </div>
              </div>
            </div>
               <div class="col-lg-12">
                   </br>
                  <div class="col-lg-4">
                    <div class="form-group">
                         <label>Show On Header &nbsp;&nbsp;</label>
                  <?php if(set_value('show_header')): $showheader	=	set_value('show_header'); elseif($EDITDATA['show_header']): $showheader	=	stripslashes($EDITDATA['show_header']); else: $showheader	= 'Y'; endif; ?>
                  <input type="radio" name="show_header" id="show_header1" value="Y" class="required" <?php if($showheader == 'Y'): echo 'checked="checked"'; endif; ?> />
                  &nbsp; Yes
                  <input type="radio" name="show_header" id="show_header2" value="N" class="required" <?php if($showheader == 'N'): echo 'checked="checked"'; endif; ?> />
                  &nbsp; No
                  <?php if(form_error('show_header')): ?>
                  <label for="show_header" generated="true" class="error"><?php echo form_error('show_header'); ?></label>
                  <?php endif; ?>
                  
                </div>
              </div>
               </div>
               
                
              <fieldset>
              <legend>SEO section</legend>
                 <div class="col-lg-12">
                  <div class="col-lg-12">
                    <div class="form-group">
                     <label >Title</label>
                  <input id="title" class="form-control" name="title" type="text" value="<?php if(set_value('title')): echo set_value('title'); else: echo stripslashes($EDITDATA['title']);endif; ?>" placeholder="Title">
                  <?php if(form_error('title')): ?>
                  <label for="title" generated="true" class="error"><?php echo form_error('title'); ?></label>
                  <?php endif; ?>
                </div>
              </div>
                 </div>
             <div class="col-lg-12">
                  <div class="col-lg-12">
                    <div class="form-group">
                     <label >Keyword</label>
                  <textarea name="keyword" id="keyword" class="form-control" placeholder="Keyword"><?php if(set_value('keyword')): echo set_value('keyword'); else: echo stripslashes($EDITDATA['keyword']);endif; ?></textarea>
                  <?php if(form_error('keyword')): ?>
                  <label for="keyword" generated="true" class="error"><?php echo form_error('keyword'); ?></label>
                  <?php endif; ?>
                </div>
              </div>
             </div>
         <div class="col-lg-12">
                  <div class="col-lg-12">
                    <div class="form-group">
                       <label>Description</label>
                  <textarea name="description" id="description" class="form-control" placeholder="Description"><?php if(set_value('description')): echo set_value('description'); else: echo stripslashes($EDITDATA['description']);endif; ?></textarea>
                  <?php if(form_error('description')): ?>
                  <label for="description" generated="true" class="error"><?php echo form_error('description'); ?></label>
                  <?php endif; ?>
                </div>
              </div>
         </div>
              </fieldset>
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