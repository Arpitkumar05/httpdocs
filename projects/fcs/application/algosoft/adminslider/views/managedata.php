<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <div class="row show-grid">
        <div class="col-md-2 col-xs-12 col-sm-4"><span><a href="{BASE_URL}siteadmin/homes"><i class="fa fa-dashboard"></i> Home</a></span></div>
        <div class="col-md-10 col-xs-12 col-sm-4"><span>Manage Slider</span></div>
      </div>
      {alert_message}
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">Manage Slider
        <?php if($add_data =='Y'): ?>
          <a href="{BASE_URL}{CURRENT_CLASS}/addeditdata" class="btn btn-default pull-right">Add slider</a>
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
