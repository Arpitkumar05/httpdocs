<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <div class="row show-grid">
        <div class="col-md-2 col-xs-12 col-sm-4"><span><a href="{BASE_URL}siteadmin/homes"><i class="fa fa-dashboard"></i> Home</a></span></div>
        <div class="col-md-3 col-xs-12 col-sm-4"><span><a href="{BASE_URL}{CURRENT_CLASS}/managedata">Manage
            footer</a></span></div>
        <div class="col-md-7 col-xs-12 col-sm-4">
          <span><?=$EDITDATA?'Edit':'Add'?>
          footer</span></div>
      </div>
      {alert_message} </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <?=$EDITDATA?'Edit':'Add'?>
          footer <a href="{BASE_URL}{CURRENT_CLASS}/managedata" class="btn btn-default pull-right">Back</a></div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12 three-form">
              <form id="Current_page_form_admin" method="post" role="form" action="">
                <input type="hidden" name="CurrentDataID" id="CurrentDataID" value="<?=$EDITDATA['id']?>"/>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                <div class="col-lg-12">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Section<span class="required">*</span></label>
                      <input id="name" class="form-control required" name="section" type="text" value="<?php if(set_value('section')): echo set_value('section'); else: echo stripslashes($EDITDATA['section']);endif;  ?>"readonly="readonly" placeholder="section">
                      <?php if(form_error('section')): ?>
                      <label for="section" generated="true" class="error"><?php echo form_error('section'); ?></label>
                      <?php endif; ?>
                    </div>
                  </div>
                     <div class="col-lg-4">
                    <div class="form-group">
                        <label>Title<span class="required">*</span></label>
                      <input id="title" class="form-control required" name="title" type="text" value="<?php if(set_value('title')): echo set_value('title'); else: echo stripslashes($EDITDATA['title']);endif; ?>" placeholder="title">
                      <?php if(form_error('title')): ?>
                      <label for="title" generated="true" class="error"><?php echo form_error('title'); ?></label>
                      <?php endif; ?>
                    </div>
                  </div>
              
                 </div>
                
                <div class="col-lg-12">
                
                <div class="col-lg-8">
                    </br>
           
                    <div class="form-group">
                    <label> Link Url Type  <span class="required">*</span></label>
                  <?php if(set_value('link_type')): $showlink	=	set_value('link_type'); elseif($EDITDATA['link_type']): $showlink	=	stripslashes($EDITDATA['link_type']); else: $showlink	= 'page_id'; endif; ?>
                  <input  class="yes" type="radio" name="link_type" id="link_type1" value="manual" class="form-control required" <?php if($showlink == 'manual'): echo 'checked="checked"'; endif; ?> onclick="return ManualLink()"/>
                  &nbsp; Manual
                  <input  class="no"  type="radio" name="link_type" id="link_type2" value="page_id" class="form-control required" <?php if($showlink == 'page_id'): echo 'checked="checked"'; endif; ?> onclick="return pageLink()"/>
                  &nbsp; page
                  <?php if(form_error('link_type')): ?>
                  <label for="link_type" generated="true" class="error"><?php echo form_error('link_type'); ?></label>
                  <?php endif; ?>
                </div>
                </div>
                </div>
                
                 <div class="col-lg-12">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Link<span class="required">*</span></label>
                      <div id="page" <?php if($EDITDATA) :if($EDITDATA['link_type']=='manual'):echo'style="display: block;"';else:echo'style="display: none;"';
endif;
else :echo'style="display: none;"';
    

endif; ?> >
                      <input id="mlink" class="form-control required" name="mlink" type="text" value="<?php if(set_value('mlink')): echo set_value('mlink'); elseif($showlink=='manual'): echo stripslashes($EDITDATA['link']);endif; ?>" placeholder="Manual link">
                     
                  <?php if(form_error('mlink')): ?>
                      <label for="mlink" generated="true" class="error"><?php echo form_error('mlink'); ?></label>
                      <?php endif; ?>
                       </div>
                      
                        <div id="page_id"  <?php if($EDITDATA) :if($EDITDATA['link_type']=='page_id'):echo'style="display: block;"';else:echo'style="display: none;"';
endif;
else :echo'style="display: none;"';
    

endif; ?> >
                      <?php if(set_value('plink')): $pagetype	= set_value('plink'); elseif($EDITDATA['id']): $pagetype	= $EDITDATA['link']; else: $pagetype	= ''; endif; ?>
                    
                        <select name="plink" id="link" class="form-control required">
                    <option value="">Select Page</option>
                    <?php if($PAGEDATA <> ""): foreach($PAGEDATA as $PAGEINFO): ?>
                    
                    <option value="<?php echo $PAGEINFO->id; ?>" <?php if($pagetype == $PAGEINFO->id): echo 'selected="selected"'; endif; ?>><?php echo stripslashes($PAGEINFO->name); ?></option>
                    <?php endforeach; endif; ?>
                  </select>
                            
                              <?php if(form_error('plink')): ?>
                      <label for="plink" generated="true" class="error"><?php echo form_error('plink'); ?></label>
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



function pageLink()
{
if (document.getElementById)
{
document.getElementById('page_id').style.display = 'block';
document.getElementById('page').style.display = 'none';

} 
}

function ManualLink()
{
if (document.getElementById)
{
document.getElementById('page').style.display = 'block';
document.getElementById('page_id').style.display = 'none';


}
}
</script>


