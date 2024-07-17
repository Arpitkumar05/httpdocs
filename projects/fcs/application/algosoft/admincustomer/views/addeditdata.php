<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <div class="row show-grid">
        <div class="col-md-2 col-xs-12 col-sm-4"><span><a href="{BASE_URL}siteadmin/homes"><i class="fa fa-dashboard"></i> Home</a></span></div>
        <div class="col-md-3 col-xs-12 col-sm-4"><span><a href="{BASE_URL}{CURRENT_CLASS}/managedata">Manage
              Salesman</a></span></div>
        <div class="col-md-7 col-xs-12 col-sm-4"> <span>
          <?=$EDITDATA?'Edit':'Add'?>
          Salesman</span></div>
      </div>
      {alert_message} </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <?=$EDITDATA?'Edit':'Add'?>
          Salesman <a href="{BASE_URL}{CURRENT_CLASS}/managedata" class="btn btn-default pull-right">Back</a></div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12 three-form">
              <form id="Current_page_form_admin" method="post" role="form" action="">
                <input type="hidden" name="CurrentDataID" id="CurrentDataID" value="<?=$EDITDATA['id']?>"/>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                <fieldset>
                <legend>Salesman details</legend>
                <div class="col-lg-12">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Name<span class="required">*</span></label>
                      <input type="text" name="name" id="name" class="form-control required" value="<?php if(set_value('name')): echo set_value('name'); else: echo stripslashes($EDITDATA['name']);endif; ?>" placeholder="Name">
                      <?php if(form_error('name')): ?>
                      <label for="name" generated="true" class="error"><?php echo form_error('name'); ?></label>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" name="email" id="email" class="form-control " value="<?php if(set_value('email')): echo set_value('email'); else: echo stripslashes($EDITDATA['email']);endif; ?>" placeholder="Email">
                      <?php if(form_error('email')): ?>
                      <label for="email" generated="true" class="error"><?php echo form_error('email'); ?></label>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Phone<span class="required">*</span></label>
                      <input type="text" name="mobile" id="mobile" class="form-control required" value="<?php if(set_value('mobile')): echo set_value('mobile'); else: echo stripslashes($EDITDATA['mobile']);endif; ?>" placeholder="Mobile">
                      <?php if(form_error('mobile')): ?>
                      <label for="mobile" generated="true" class="error"><?php echo form_error('mobile'); ?></label>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
                  </fieldset>
                   <fieldset>
                <legend>Salesman Address</legend>
                <div class="col-lg-12">
                <div class="col-lg-12">
                    <div class="form-group">
                      <label>Address<span class="required">*</span></label>
                      <input type="text" name="address" id="address" class="form-control required" value="<?php if(set_value('address')): echo set_value('address'); else: echo stripslashes($EDITDATA['address']);endif; ?>" placeholder="Address">
                      <?php if(form_error('address')): ?>
                      <label for="address" generated="true" class="error"><?php echo form_error('address'); ?></label>
                      <?php endif; ?>
                    </div>
                  </div>
                 
               
                </div>
                
                  <div class="col-lg-12">
                <div class="col-lg-4">
                    <div class="form-group">
                      <label>City<span class="required">*</span></label>
                      <input type="text" name="city" id="city" class="form-control required" value="<?php if(set_value('city')): echo set_value('city'); else: echo stripslashes($EDITDATA['city']);endif; ?>" placeholder="City">
                      <?php if(form_error('city')): ?>
                      <label for="city" generated="true" class="error"><?php echo form_error('city'); ?></label>
                      <?php endif; ?>
                    </div>
                  </div>
                           <div class="col-lg-4">
                    <div class="form-group">
                      <label>Pincode<span class="required">*</span></label>
                      <input type="text" name="pincode" id="pincode" class="form-control required" value="<?php if(set_value('pincode')): echo set_value('pincode'); else: echo stripslashes($EDITDATA['pincode']);endif; ?>" placeholder="pincode">
                      <?php if(form_error('pincode')): ?>
                      <label for="pincode" generated="true" class="error"><?php echo form_error('pincode'); ?></label>
                      <?php endif; ?>
                    </div>
                  </div>
                        <div class="col-lg-4">
                    <div class="form-group">
                      <label>State<span class="required">*</span></label>
                      <input type="text" name="state" id="pincode" class="form-control required" value="<?php if(set_value('state')): echo set_value('state'); else: echo stripslashes($EDITDATA['state']);endif; ?>" placeholder="State">
                      <?php if(form_error('state')): ?>
                      <label for="state" generated="true" class="error"><?php echo form_error('state'); ?></label>
                      <?php endif; ?>
                    </div>
                  </div>
                    
                 
               
                </div>
                  <div class="col-lg-12">
                 <div class="col-lg-4">
                    <div class="form-group">
                      <label>Country<span class="required">*</span></label>
                      <input type="text" name="country" id="country" class="form-control required" value="<?php if(set_value('country')): echo set_value('country'); elseif($EDITDATA['country']): echo stripslashes($EDITDATA['country']);else: echo('India');endif; ?>" placeholder="Country">
                      <?php if(form_error('country')): ?>
                      <label for="country" generated="true" class="error"><?php echo form_error('country'); ?></label>
                      <?php endif; ?>
                    </div>
                  </div>
                  </div>
                </fieldset>
                <fieldset>
                <legend>Salesman Identity Proof</legend>
                   <div class="col-lg-12">
                <div class="col-lg-4">
                    <div class="form-group">
                      <label>Identity type<span class="required">*</span></label>
                      <?php if(set_value('identity_proof_id')): $idtype =	set_value('identity_proof_id'); elseif($EDITDATA['identity_proof_id']): $idtype =	$EDITDATA['identity_proof_id']; else: $idtype = ''; endif;?>
                      <select name="identity_proof_id" id="identity_proof_id" class="form-control required">
                        <option value="">Select Identity type</option>
                        <?php if($IDPROOF <> ""): foreach($IDPROOF as $IDINFO): ?>
                        <option value="<?php echo $IDINFO['id']; ?>" <?php if($IDINFO['id'] == $idtype): echo  'selected="selected"'; endif; ?> ><?php echo stripslashes($IDINFO['identity_proof']); ?></option>
                        <?php endforeach; endif; ?>
                      </select>
                      <?php if(form_error('identity_proof_id')): ?>
                      <label for="identity_proof_id" generated="true" class="error"><?php echo form_error('identity_proof_id'); ?></label>
                      <?php endif; ?>
                    </div>
                  </div>
                       
                          <div class="col-lg-4">
                    <div class="form-group">
                      <label>Identity Number<span class="required">*</span></label>
                      <input type="text" name="identity_proof_number" id="identity_proof_number" class="form-control required" value="<?php if(set_value('identity_proof_number')): echo set_value('identity_proof_number'); else: echo stripslashes($EDITDATA['identity_proof_number']);endif; ?>" placeholder="Identity Number">
                      <?php if(form_error('identity_proof_number')): ?>
                      <label for="identity_proof_number" generated="true" class="error"><?php echo form_error('identity_proof_number'); ?></label>
                      <?php endif; ?>
                    </div>
                  </div>
                       
                   </div>
                <div class="col-lg-12">
                   <div class="col-lg-4">
                  <div class="form-group">
                      <label>Upload Identity Proof <span class="required">*</span></label>
                    <br clear="all" />
                    <span style="display:inline-block;" id="uploadIds0"><img class="img-responsive" src="{ASSET_ADMIN_URL}images/browse-white.png" border="0" alt="" /></span><br clear="all" />
                    <input type="text" id="uploadimage0" name="uploadimage0" value="<?php if(set_value('uploadimage0')): echo set_value('uploadimage0'); else: echo stripslashes($EDITDATA['identity_proof_url']); endif; ?>" class="browseimageclass" />
                    <br clear="all">
                    <?php if(form_error('uploadimage0')): ?>
                    <label for="uploadimage0" generated="true" class="error"><?php echo form_error('uploadimage0'); ?></label>
                    <?php endif; ?>
                    <label id="uploadstatus0" class="error"></label>
                    <div id="uploadloader0" style="margin:0 0 10px 0px; float:left;display:none;"><img src="{ASSET_ADMIN_URL}images/ajax-loader.gif" border="0" /></div>
                    <span id="uploadphoto0" style="float:left;">
                    <?php if(set_value('uploadimage0')):?>
                    <img src="<?php echo stripslashes(set_value('uploadimage0'))?>" width="100" border="0" alt="" /> <a href="javascript:void(0);" onClick="DeleteImage('<?php echo stripslashes(set_value('uploadimage0'))?>','0');"> <img src="{ASSET_ADMIN_URL}images/cross.png" border="0" alt="" /> </a>
                    <?php elseif($EDITDATA['identity_proof_url']):?>
                    <img src="<?php echo stripslashes($EDITDATA['identity_proof_url'])?>" width="100" border="0" alt="" /> <a href="javascript:void(0);" onClick="DeleteImage('<?php echo stripslashes($EDITDATA['identity_proof_url'])?>','0');"> <img src="{ASSET_ADMIN_URL}images/cross.png" border="0" alt="" /> </a>
                    <?php endif; ?>
                    </span> <br clear="all" />
                   </div>
                 </div>
                
                  
                  </div>
             
               
               
                </fieldset>
              
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
$(function(){
	UploadImage('0');
});
</script>