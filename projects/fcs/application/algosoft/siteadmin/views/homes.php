<div id="page-wrapper">
  <div class="container-fluid">

    <div class="row">
      <div class="col-lg-12">
        <div class="row show-grid">
          <div class="col-md-12 col-xs-12 col-sm-4 border-no"><span><a href="{BASE_URL}siteadmin/homes">Dashboard</a></span></div>
        </div>
        {alert_message}
      </div>
    </div>
      
      
      <?php if($this->session->userdata('FCS_ADMIN_TYPE')=='superadmin'): ?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12 blockspace">
    	<div class="card col-md-12">
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="card cardblock">
                <a href="<?php echo base_url();?>adminpages/managedata">
                <div class="card-body">
                <div class="media">
                  <div class="p-2 text-xs-center bg-primary bg-darken-2 media-left media-middle">
                    <i class="fa fa-file-text font-large-2" aria-hidden="true"></i>
                  </div>
                  <div class="p-2 bg-gradient-x-primary white media-body">
                    <h5>PAGES</h5>
                    <h5 class="text-bold-400"><i class="fa fa-long-arrow-up" aria-hidden="true"></i> </h5>
                  </div>
                </div>
              </div>
              </a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="card cardblock">
                <a href="<?php echo base_url();?>adminproducts/managedata">
                <div class="card-body">
                <div class="media">
                      <div class="p-2 text-xs-center bg-primary bg-darken-2 media-left media-middle">
                    <i class="fa fa-product-hunt font-large-2" aria-hidden="true"></i>
                  </div>
                 <div class="p-2 bg-gradient-x-primary white media-body">
                    <h5>PRODUCT</h5>
                    <h5 class="text-bold-400"><i class="fa fa-long-arrow-up" aria-hidden="true"></i> <?php echo $tward; ?></h5>
                  </div>
                </div>
              </div>
              </a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="card cardblock">
                <a href="<?php echo base_url();?>adminplant/managedata">
                <div class="card-body">
                <div class="media">
                    <div class="p-2 text-xs-center bg-primary bg-darken-2 media-left media-middle">
                    <i class="fa fa-scribd font-large-2" aria-hidden="true"></i>
                  </div>
                <div class="p-2 bg-gradient-x-primary white media-body">
                    <h5>SERVICES</h5>
                    <h5 class="text-bold-400"><i class="fa fa-long-arrow-up" aria-hidden="true"></i> <?php echo $tplant; ?></h5>
                  </div>
                </div>
              </div>
                </a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="card cardblock">
               <a href="<?php echo base_url();?>adminpartners/managedata">
                <div class="card-body">
                <div class="media">
                    <div class="p-2 text-xs-center bg-primary bg-darken-2 media-left media-middle">
                    <i class="fa fa-american-sign-language-interpreting font-large-2" aria-hidden="true"></i>
                  </div>
               <div class="p-2 bg-gradient-x-primary white media-body">
                    <h5>PARTNERS</h5>
                    <h5 class="text-bold-400"><i class="fa fa-long-arrow-up" aria-hidden="true"></i> <?php echo $tlandfill; ?></h5>
                  </div>
                </div>
              </div>
               </a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="card cardblock">
              <a href="">
                <div class="card-body">
                <div class="media">
                     <div class="p-2 text-xs-center bg-primary bg-darken-2 media-left media-middle">
                    <i class="fa fa-envelope font-large-2" aria-hidden="true"></i>
                  </div>
                <div class="p-2 bg-gradient-x-primary white media-body">
                    <h5>MAIL</h5>
                    <h5 class="text-bold-400"><i class="fa fa-long-arrow-up" aria-hidden="true"></i> <?php echo $tvehicle;?></h5>
                  </div>
                </div>
              </div>
             </a>
            </div>
          </div>
         
        
       
        </div>
    </div>
 </div>
 
  <?php endif; ?>
 </div>
</div>


 
<script>
$(document).on('click','.table_action_data2 .view-details-data',function(){
  var title = $(this).attr('title');
  $("#myViewDetailsModal").modal();
  $("#myViewDetailsModal .view-detail-title").html('<h3><center>'+title+'</center></h3>');
  $("#myViewDetailsModal .view-detail-data").html('<h3><center>Loading...</center></h3>');
  var viewid  = $(this).attr('data-id');
  $.ajax({
    type: 'post',
     url: FULLSITEURL+CURRENTCLASS+'/view_order_detail',
    data: {viewid:viewid},
   success: function(response){
      $("#myViewDetailsModal .view-detail-data").html(response);
    } 
  });
});
</script>