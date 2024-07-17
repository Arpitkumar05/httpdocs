<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <div class="row show-grid">
        <div class="col-md-2 col-xs-12 col-sm-4"><span><a href="{BASE_URL}siteadmin/homes"><i class="fa fa-dashboard"></i> Home</a></span></div>
        <div class="col-md-3 col-xs-12 col-sm-4"><span><a href="{BASE_URL}{CURRENT_CLASS}/managedata">Manage Page Heading
            </a></span></div>
        <div class="col-md-7 col-xs-12 col-sm-4">
          <span><?=$EDITDATA?'Edit':'Add'?>
          city</span></div>
      </div>
      {alert_message} </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <?=$EDITDATA?'Edit':'Add'?>
          Page Heading <a href="{BASE_URL}{CURRENT_CLASS}/managedata" class="btn btn-default pull-right">Back</a></div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12 three-form">
             <form id="Current_page_form" class="form-horizontal" method="post" action="">
            <input type="hidden" name="CurrentDataID" id="CurrentDataID" value="<?=$editid?>"/>
            <div class="box-body">
              <div class="form-group">
                  
                <label for="page_type" class="col-sm-3 control-label">Page<span class="required">*</span></label>
                <div class="col-sm-7">
                  <?php if(set_value('page_id')): $pagetype	= set_value('page_id'); elseif($editid): $pagetype	= $editid; else: $pagetype	= ''; endif; ?>
                  <select name="page_id" id="page_id" class="form-control required">
                    <option value="">Select Page</option>
                    <?php if($PAGEDATA <> ""): foreach($PAGEDATA as $PAGEINFO): ?>
                    <option value="<?php echo $PAGEINFO->id; ?>" <?php if($pagetype == $PAGEINFO->id): echo 'selected="selected"'; endif; ?>><?php echo stripslashes($PAGEINFO->name); ?></option>
                    <?php endforeach; endif; ?>
                  </select>
                  <?php if(form_error('page_id')): ?>
                  <label for="page_id" generated="true" class="error"><?php echo form_error('page_id'); ?></label>
                  <?php endif; ?>
                </div>
              </div>
                          
              <?php if(set_value('TotalHeading')): $TotalHeading = set_value('TotalHeading'); elseif($EDITDATA <> ""): $TotalHeading = count($EDITDATA); else: $TotalHeading = 1; endif; ?>
              <input type="hidden" name="TotalHeading" id="TotalHeading" value="<?php echo $TotalHeading; ?>" />
              <input type="hidden" name="TotalHeadingCount" id="TotalHeadingCount" value="<?php echo $TotalHeading; ?>" />
              <div class="form-group">
                <label for="contcontent_1ent" class="col-sm-3 control-label"></label>
                <?php if($suberror): echo '<label for="" generated="true" class="error">'.$suberror.'</label>'; endif; ?>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12 padding-none" id="Headerlocation">
                <?php if(set_value('TotalHeading')): for($i=1; $i<= $TotalHeading; $i++): 
				  $content_				= 	'content_'.$i;
			?>
                <span>
                <div class="form-group">
                  <label for="content_<?php echo $i; ?>" class="col-sm-3 control-label">Heading</label>
                  <div class="col-sm-7">
                    <textarea   style="resize:none" name="content_<?php echo $i; ?>" id="content_<?php echo $i; ?>" class=" form-control" placeholder="Heading"><?php echo stripslashes($$content_); ?></textarea>
                  </div>
                  <div class="col-sm-2">
                    <?php if($i < $TotalHeading): ?>
                    <a href="javascript:void(0);" class="removeMoreHeading" id="RemoveHeading_<?php echo $i; ?>" style="display:block;"><img src="<?php echo base_url(); ?>assets/siteadmin/images/cross.png" alt="Remove current heading" /></a> <a href="javascript:void(0);" class="addMoreHeading" id="AddHeading_<?php echo $i; ?>" style="display:none;"><img src="<?php echo base_url(); ?>assets/siteadmin/images/addmore.png" alt="Add more heading" /></a>
                    <?php else: ?>
                    <a href="javascript:void(0);" class="removeMoreHeading" id="RemoveHeading_<?php echo $i; ?>" style="display:none;"><img src="<?php echo base_url(); ?>assets/siteadmin/images/cross.png" alt="Remove current heading" /></a> <a href="javascript:void(0);" class="addMoreHeading" id="AddHeading_<?php echo $i; ?>"><img src="<?php echo base_url(); ?>assets/siteadmin/images/addmore.png" alt="Add more heading" /></a>
                    <?php endif; ?>
                  </div>
                </div>
                </span>
                <?php endfor; elseif($EDITDATA <> ""): $i=1; foreach($EDITDATA as $EDITINFO): ?>
        
                <span>
                <div class="form-group">
                  <label for="content_<?php echo $i; ?>" class="col-sm-3 control-label">Heading</label>
                  <div class="col-sm-7">
                    <textarea name="content_<?php echo $i; ?>" id="content_<?php echo $i; ?>" class="form-control" placeholder="Heading"><?php echo stripslashes($EDITINFO->heading); ?></textarea>
                  </div>
                  <div class="col-sm-2">
                    <?php if($i < $TotalHeading): ?>
                    <a href="javascript:void(0);" class="removeMoreHeading" id="RemoveHeading_<?php echo $i; ?>" style="display:block;"><img src="<?php echo base_url(); ?>assets/siteadmin/images/cross.png" alt="Remove current heading" /></a> <a href="javascript:void(0);" class="addMoreHeading" id="AddHeading_<?php echo $i; ?>" style="display:none;"><img src="<?php echo base_url(); ?>assets/siteadmin/images/addmore.png" alt="Add more heading" /></a>
                    <?php else: ?>
                    <a href="javascript:void(0);" class="removeMoreHeading" id="RemoveHeading_<?php echo $i; ?>" style="display:none;"><img src="<?php echo base_url(); ?>assets/siteadmin/images/cross.png" alt="Remove current heading" /></a> <a href="javascript:void(0);" class="addMoreHeading" id="AddHeading_<?php echo $i; ?>"><img src="<?php echo base_url(); ?>assets/siteadmin/images/addmore.png" alt="Add more heading" /></a>
                    <?php endif; ?>
                  </div>
                </div>
                </span>
                <?php $i++; endforeach; else: ?>
                <span>
                <div class="form-group">
                  <label for="content_1" class="col-sm-3 control-label">Heading</label>
                  <div class="col-sm-7">
                    <textarea name="content_1" id="content_1" class="form-control" placeholder="Heading"></textarea>
                  </div>
                  <div class="col-sm-2"> <a href="javascript:void(0);" class="removeMoreHeading" id="RemoveHeading_1" style="display:none;"><img src="<?php echo base_url(); ?>assets/siteadmin/images/cross.png" alt="Remove current heading" /></a> <a href="javascript:void(0);" class="addMoreHeading" id="AddHeading_1"><img src="<?php echo base_url(); ?>assets/siteadmin/images/addmore.png" alt="Add more heading" /></a> </div>
                </div>
                </span>
                <?php endif; ?>
              </div>
            </div>
             <br clear="all" />
            <div class="box-footer">
              <div class="col-sm-3">&nbsp;</div>
              <div class="col-sm-3">
              <input type="submit" name="SaveChanges" id="SaveChanges" value="Submit" class="btn btn-default" />
                  <a href="{BASE_URL}{CURRENT_CLASS}/managedata" class="btn btn-default">Cancel</a>
                    </div>
                  <div  style="text-align:right;"> <span class="btn btn-outline btn-default">Note
                      :- <strong><span style="color:#FF0000;">*</span> Indicates
                      required field</strong> </span> </div>
          
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
<script>
$(function(){	
	var scntDiv 	= 	$('#Current_page_form #Headerlocation');
	var pi 			= 	$('#Current_page_form #Headerlocation > span').size(); 
	
	$(document).on('click', '#Current_page_form .addMoreHeading', function() { 
		var i 		= 	parseInt($('#Current_page_form #TotalHeadingCount').val());
		i++;
		pi++;
		$('<span><hr /><div class="form-group"><label for="content_'+i+'" class="col-sm-3 control-label">Heading</label><div class="col-sm-7"><textarea name="content_'+i+'" id="content_'+i+'" class="form-control" placeholder="Heading"></textarea></div><div class="col-sm-2"><a href="javascript:void(0);" class="removeMoreHeading" id="RemoveHeading_'+i+'" style="display:none;"><img src="<?php echo base_url(); ?>assets/siteadmin/images/cross.png" alt="Remove current heading" /></a><a href="javascript:void(0);" class="addMoreHeading" id="AddHeading_'+i+'"><img src="<?php echo base_url(); ?>assets/siteadmin/images/addmore.png" alt="Add more heading" /></a></div></div></span>').appendTo(scntDiv);
		$('#Current_page_form #TotalHeading').val(pi);
		$('#Current_page_form #TotalHeadingCount').val(i);
		
		$(this).closest('#Headerlocation').find('a.removeMoreHeading').show();
		$(this).closest('#Headerlocation').find('a.addMoreHeading').hide();
		$('#Current_page_form #RemoveHeading_'+i).hide();
		$('#Current_page_form #AddHeading_'+i).show();
		return false;
	});
	
	$(document).on('click', '#Current_page_form .removeMoreHeading', function() {	
		if( pi > 1 ) {
			$(this).parents('span').remove();
			pi--;
			$('#Current_page_form #TotalHeading').val(pi);
		}
		return false;
	});
});
</script>
