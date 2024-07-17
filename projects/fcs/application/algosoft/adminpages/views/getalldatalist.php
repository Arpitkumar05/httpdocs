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
          <label>Select fields:</label>
          <select size="1" name="search_field" id="search_field" class="form-control input-sm">
            <option value="">Select Field</option>
            <option value="name" <?php if($searchfield == 'name')echo 'selected="selected"'; ?>>Name</option>
          
          <input type="text" name="search_value" id="search_value" value="<?php echo $searchvalue; ?>" placeholder="Enter search text" class="form-control input-sm">
          <input type="button" name="search_in_table" id="search_in_table" value="Search" class="btn btn-outline btn-default">
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
            <th>Name</th>
            <th>Slug</th>
           <?php if($edit_data == 'Y' || $delete_data == 'Y' || $view_data == 'Y'): ?>
              <th>Action</th>
              <?php endif; ?>
          </tr>
          </thead>
          <tbody>
             
            <?php if($ALLDATA <> ""): $i=1; foreach($ALLDATA as $ALLDATAINFO): 
			?>
            <tr class="<?php if($i%2 == 0): echo 'gradeA odd'; else: echo 'gradeA even'; endif; ?>" role="row">
              <td class="sorting_1"><?=$i++?></td>
            <td><?=stripslashes($ALLDATAINFO->name)?></td>
            <td><?=stripslashes($ALLDATAINFO->slug)?></td>
         
              <td><div class="table_action_data">
                        
                  <?php if($view_data == 'Y'): ?>
              <a class="btn btn btn-success btn-circle tooltipVal" href="<?=base_url().$this->router->fetch_class()?>/addeditdata/<?=$ALLDATAINFO->id?>" title="Edit"><i class="fa fa-pencil"></i></a>  
                <?php endif; 
               if($view_data == 'Y'): ?>
              <a class="btn btn-info btn-circle tooltipVal " href="<?=base_url()?><?=$ALLDATAINFO->slug?>"target="_blank" title="View Page"><i class="fa fa-eye"></i></a><?php endif ; ?><?php /*?><a class="btn btn-danger btn-circle tooltipVal" href="<?=base_url().$this->router->fetch_class()?>/deletedata/<?=$ALLDATAINFO->id?>" title="Delete"><i class="fa fa-trash-o"></i></a><?php */?></span> 
              </td>
          </tr>
          <?php endforeach; else: ?>
          <tr>
            <td colspan="4" style="text-align:center;">No data available in table</td>
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
    
    <div class="row mar-top-20">
      <div class="col-sm-12"> <span class="btn btn-outline btn-default">Note :-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   
      <a href="javascript:void(0);" title="Active" class="btn btn-success btn-circle"><i class="fa fa-pencil"></i></a>&nbsp;->&nbsp;<strong>Edit data</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
      
      <a href="javascript:void(0);" title="Edit data" class="btn btn-info btn-circle"><i class="fa fa-eye"></i></a>&nbsp;->&nbsp;<strong>View Page</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   
    
     
      </span> </div>
    </div>
   
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
