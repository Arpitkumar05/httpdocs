<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <div class="row show-grid">
        <div class="col-md-2 col-xs-12 col-sm-4"><span><a href="{BASE_URL}siteadmin/homes"><i class="fa fa-dashboard"></i> Home</a></span></div>
   
        <div class="col-md-3 col-xs-12 col-sm-4"><span>Manage Products</span></div>
        <div class="col-md-7 col-xs-12 col-sm-4"><span>Manage Product Sections </span></div>
          
        
  
      </div>
      {alert_message}
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
          
             <div class="panel-heading">Manage <?=$product?>   Product Sections

        <?php if($add_data =='Y'): ?>
             
                 <div class="rightbtn"><a href="{BASE_URL}adminproducts/managedata" class="btn btn-default ">Back</a>
                     <a href="{BASE_URL}{CURRENT_CLASS}/addeditdata" class="btn btn-default ">Add Section</a> </div>
                   
                   
       <?php endif; ?>
        </div>
        <div class="panel-body">
          <div id="ShowAllDataListDivMain">
              <div id="ShowAllDataListDivImage"><img src="{ASSET_ADMIN_URL}images/lodin.gif" alt=""></div>
              <div id="ShowAllDataListDiv">&nbsp;</div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

    
    
   