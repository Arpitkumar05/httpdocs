<form id="Data_Form" name="Data_Form" method="post" action="">
  <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
    <div class="row">
      <div class="col-sm-3">
        <div class="dataTables_length" id="dataTables-example_length">
          <label>Show
          <select size="1" name="data_length" id="data_length" class="form-control input-sm">
            <option value="10" <?php if($perpage == '10')echo 'selected="selected"'; ?>>10</option>
            <option value="25" <?php if($perpage == '25')echo 'selected="selected"'; ?>>25</option>
            <option value="50" <?php if($perpage == '50')echo 'selected="selected"'; ?>>50</option>
            <option value="100" <?php if($perpage == '100')echo 'selected="selected"'; ?>>100</option>
            <option value="All" <?php if($perpage == $total_rows)echo 'selected="selected"'; ?>>All</option>
          </select>
          entries</label>
        </div>
      </div>

      <div class="col-sm-9">
        <div id="dataTables-example_filter" class="dataTables_filter">
          
        
          <input type="button" name="show_all_data_in_table" id="show_all_data_in_table" value="Show all data" class="btn btn-outline btn-default">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;" width="100%">
          <thead>
            <tr role="row">
                <th>Sr.No.</th>   
            <th>Image</th>       
          <th>Content</th>
              <?php if($edit_data == 'Y' || $delete_data == 'Y'): ?>
              <th>Action</th>
              <?php endif; ?>
            </tr>
          </thead>
          <tbody>
            <?php if($ALLDATA <> ""): $i=1; foreach($ALLDATA as $ALLDATAINFO): ?>
            <tr class="<?php if($i%2 == 0): echo 'gradeA odd'; else: echo 'gradeA even'; endif; ?>" role="row">
              <td style="width: 5px; white-space: normal;" class="sorting_1"><?=$i++?></td>
          
               <td  style="width: 100px; white-space: normal;"><img src="<?=stripslashes($ALLDATAINFO['image'])?>" alt="<?=stripslashes($ALLDATAINFO['name'])?>" /></td>
                <td  style="width: 800px; white-space: normal;"><?=stripslashes($ALLDATAINFO['content'])?></td>
              <?php if($edit_data == 'Y' || $delete_data == 'Y'): ?>
              <td style="width: 80px; white-space: normal;"><div class="table_action_data">
                  <?php if($edit_data == 'Y'): ?>
					  <?php if($ALLDATAINFO['status'] == 'Y'): ?>
                      <a href="{BASE_URL}{CURRENT_CLASS}/changestatus/<?=manoj_encript($ALLDATAINFO['id'])?>/N" title="Active"class="btn btn-success btn-circle tooltipVal" onclick="location.reload()"><i class="fa fa-check"></i></a>
                      <?php else: ?>
                      <a href="{BASE_URL}{CURRENT_CLASS}/changestatus/<?=manoj_encript($ALLDATAINFO['id'])?>/Y" title="Inactve"  class="btn btn-warning btn-circle tooltipVal" onclick="location.reload()"><i class="fa fa-times"></i></a>
                      <?php endif; ?>
                      <a class="btn btn-info btn-circle tooltipVal" href="{BASE_URL}{CURRENT_CLASS}/addeditdata/<?=manoj_encript($ALLDATAINFO['id'])?>" title="Edit"><i class="fa fa-pencil"></i></a>
                  <?php endif; ?>
                  <?php if($delete_data == 'Y'): ?>
                  <a class="btn btn-danger btn-circle tooltipVal" href="{BASE_URL}{CURRENT_CLASS}/deletedata/<?=manoj_encript($ALLDATAINFO['id'])?>" title="Delete"><i class="fa fa-trash-o"></i></a>
                  <?php endif; ?>
                  </div>
              </td>
              <?php endif; ?>
            </tr>
            <?php endforeach; else: ?>
            <tr>
              <td colspan="6" style="text-align:center;">No data available in table</td>
            </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
    <?php if($ALLDATA <> ""): ?>
    <div class="row">
      <div class="col-sm-4"> </div>

      <div class="col-sm-3">
        <div class="dataTables_info" id="dataTables-example_info" role="status" aria-live="polite">
          <?=$recordcontent?>
        </div>
      </div>
      <div class="col-sm-5">
        <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
          <ul class="pagination">
            <li>
              <?=$this->pagination->create_links()?>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <?php if($edit_data == 'Y' || $delete_data == 'Y'): ?>
    <div class="row mar-top-20">
      <div class="col-sm-12"> <span class="btn btn-outline btn-default">Note :-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php if($edit_data == 'Y'): ?>
      <a href="javascript:void(0);" title="Active" class="btn btn-success btn-circle"><i class="fa fa-check"></i></a>&nbsp;->&nbsp;<strong>Active</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
      <a href="javascript:void(0);" title="Inactive" class="btn btn-warning btn-circle"><i class="fa fa-times"></i></a>&nbsp;->&nbsp;<strong>Inactive</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="javascript:void(0);" title="Edit data" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i></a>&nbsp;->&nbsp;<strong>Edit data</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php endif; ?>
      <?php if($delete_data == 'Y'): ?>
      <a href="javascript:void(0);" title="Delete data" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>&nbsp;->&nbsp;<strong>Delete data</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php endif; ?>
      </span> </div>
    </div>
    <?php endif; ?>
    <?php endif; ?>
  </div>
</form>
<script>
$(document).ready(function() {
	$('#dataTables-example').DataTable({
		responsive: true,
		bSort : false,
		ordering: false
	});
});
</script>
<script type="text/javascript">
$('.btn btn-success btn-circle tooltipVal').click(function(event) {});
</script>
