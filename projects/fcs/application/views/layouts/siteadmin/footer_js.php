<?php if($this->router->fetch_method() == 'myaccount' || $this->router->fetch_method() == 'managedata'): ?>
<script src="{ASSET_ADMIN_URL}vendor/datatables/js/jquery.dataTables.js"></script>
<script src="{ASSET_ADMIN_URL}vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="{ASSET_ADMIN_URL}vendor/datatables-responsive/dataTables.responsive.js"></script>
<?php endif; ?>
<?php $classarray	=	array('adminproperty','adminagentproperty');
if($this->router->fetch_method() == 'editmyaccount' || $this->router->fetch_method() == 'addeditdata' || strpos($this->router->fetch_method(), 'iewdata') || in_array($this->router->fetch_class(),$classarray)): ?>
<script type="text/javascript" src="{ASSET_ADMIN_URL}js/jquery.validate.js"></script>
<script src="{ASSET_ADMIN_URL}js/ajaxupload.js"></script>
<script src="{ASSET_ADMIN_URL}dist/js/jquery-ui.js"></script>

<script>
$(function(){
  $("#datepicker").datepicker({'dateFormat':'dd-mm-yy',changeMonth: true,changeYear: true,/*maxDate: 0,*/yearRange: "2010:2050" });
  $("#datepicker1").datepicker({'dateFormat':'dd-mm-yy',changeMonth: true,changeYear: true,minDate: 0,yearRange: "2010:2050"});
  $("#datepicker2").datepicker({'dateFormat':'dd-mm-yy',changeMonth: true,changeYear: true,yearRange: "2010:2050"});
});
</script>
<script src="{ASSET_ADMIN_URL}js/ckeditor/ckeditor.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	if (document.getElementById('Description')) {
		// Replace the <textarea id="Description"> with a CKEditor
		// instance, using default configuration.
		CKEDITOR.replace('Description', {filebrowserBrowseUrl :'{ASSET_ADMIN_URL}js/ckeditor/filemanager/browser/default/browser.html?Connector={ASSET_ADMIN_URL}js/ckeditor/filemanager/connectors/php/connector.php',
		filebrowserImageBrowseUrl : '{ASSET_ADMIN_URL}js/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector={ASSET_ADMIN_URL}js/ckeditor/filemanager/connectors/php/connector.php',
		filebrowserFlashBrowseUrl :'{ASSET_ADMIN_URL}js/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector={ASSET_ADMIN_URL}js/ckeditor/filemanager/connectors/php/connector.php',
		filebrowserUploadUrl :'{ASSET_ADMIN_URL}js/ckeditor/filemanager/connectors/php/upload.php?Type=File',
		filebrowserImageUploadUrl : '{ASSET_ADMIN_URL}js/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
		filebrowserFlashUploadUrl : '{ASSET_ADMIN_URL}js/ckeditor/filemanager/connectors/php/upload.php?Type=Flash',
		allowedContent:true});	
	}
	if (document.getElementById('Description1')) {
		// Replace the <textarea id="Description1"> with a CKEditor
		// instance, using default configuration.
		CKEDITOR.replace('Description1', {filebrowserBrowseUrl :'{ASSET_ADMIN_URL}js/ckeditor/filemanager/browser/default/browser.html?Connector={ASSET_ADMIN_URL}js/ckeditor/filemanager/connectors/php/connector.php',
		filebrowserImageBrowseUrl : '{ASSET_ADMIN_URL}js/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector={ASSET_ADMIN_URL}js/ckeditor/filemanager/connectors/php/connector.php',
		filebrowserFlashBrowseUrl :'{ASSET_ADMIN_URL}js/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector={ASSET_ADMIN_URL}js/ckeditor/filemanager/connectors/php/connector.php',
		filebrowserUploadUrl :'{ASSET_ADMIN_URL}js/ckeditor/filemanager/connectors/php/upload.php?Type=File',
		filebrowserImageUploadUrl : '{ASSET_ADMIN_URL}js/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
		filebrowserFlashUploadUrl : '{ASSET_ADMIN_URL}js/ckeditor/filemanager/connectors/php/upload.php?Type=Flash',
		allowedContent:true});	
	}
	if (document.getElementById('Description2')) {
		// Replace the <textarea id="Description2"> with a CKEditor
		// instance, using default configuration.
		CKEDITOR.replace('Description2', {filebrowserBrowseUrl :'{ASSET_ADMIN_URL}js/ckeditor/filemanager/browser/default/browser.html?Connector={ASSET_ADMIN_URL}js/ckeditor/filemanager/connectors/php/connector.php',
		filebrowserImageBrowseUrl : '{ASSET_ADMIN_URL}js/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector={ASSET_ADMIN_URL}js/ckeditor/filemanager/connectors/php/connector.php',
		filebrowserFlashBrowseUrl :'{ASSET_ADMIN_URL}js/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector={ASSET_ADMIN_URL}js/ckeditor/filemanager/connectors/php/connector.php',
		filebrowserUploadUrl :'{ASSET_ADMIN_URL}js/ckeditor/filemanager/connectors/php/upload.php?Type=File',
		filebrowserImageUploadUrl : '{ASSET_ADMIN_URL}js/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
		filebrowserFlashUploadUrl : '{ASSET_ADMIN_URL}js/ckeditor/filemanager/connectors/php/upload.php?Type=Flash',
		allowedContent:true});	
	}
});
</script>
<?php endif; ?>

<script src="{ASSET_ADMIN_URL}dist/js/sb-admin-2.js"></script>
<script src="{ASSET_ADMIN_URL}js/manoj-plugin.js" type="text/javascript"></script>

<script>
$(document).ready(function(){
	setTimeout(AlertMessageTimedOut, 5000);
});
function AlertMessageTimedOut() { 
	$('.alert.alert-warning.alert-dismissable').hide();
	$('.alert.alert-danger.alert-dismissable').hide();
	$('.alert.alert-success.alert-dismissable').hide();
}
</script>

<!-- Message Modal -->
<div class="modal fade" id="myViewDetailsModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <button type="button" class="close close-view" data-dismiss="modal">×</button>
      <div class="modal-body newspop">
        <table class="table table-bordered table-striped">
          <tr class="info">
            <td><span class="view-detail-title">&nbsp;</span></td>
          </tr>
        </table>
        <span class="view-detail-data">&nbsp;</span> 
      </div>
    </div>
  </div>
</div>
<script>
$(document).on('click','.table_action_data .view-details-data',function(){ 
     
	var title	=	$(this).attr('title');
	$("#myViewDetailsModal").modal();
	$("#myViewDetailsModal .view-detail-title").html('<h3><center>'+title+'</center></h3>');
	$("#myViewDetailsModal .view-detail-data").html('<h3><center>Loading...</center></h3>');
	var viewid	=	$(this).attr('data-id');
	$.ajax({
		type: 'post',
		 url: FULLSITEURL+CURRENTCLASS+'/get_view_data',
		data: {csrf_api_key:csrf_api_value,viewid:viewid},
	 success: function(response){
	 		$("#myViewDetailsModal .view-detail-data").html(response);
	 	}	
	});
});
</script>

<!-- Alert Message Modal -->
<div class="modal fade" id="alertMessageModal" role="dialog">
  <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <button type="button" class="close close-view" data-dismiss="modal">×</button>
      <div class="modal-body newspop">
        <span class="message-detail-data msg-text">&nbsp;</span> 
      </div>
    </div>
  </div>
</div>
<script>
function alertMessageModelPopup(message,type){	
	var wheight		=	(($( window ).height()/2)-50);
	$("#alertMessageModal").modal('show');
	$("#alertMessageModal .modal-dialog").css('margin-top',wheight);
	if(type == 'red')
		$("#alertMessageModal .message-detail-data").html('<font color="red">'+message+'</span>');
	else
		$("#alertMessageModal .message-detail-data").html('<font color="green">'+message+'</span>');
	setTimeout(AlertMessageModelPopupTimedOut, 5000);
}
function AlertMessageModelPopupTimedOut() { 
	$("#alertMessageModal").modal('hide');
}
//alertMessageModelPopup('Data saved successfully');
</script>