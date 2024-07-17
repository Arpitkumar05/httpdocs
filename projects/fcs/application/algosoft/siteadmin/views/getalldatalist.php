<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
  <div class="row">
    <div class="col-sm-12">
      <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;" width="100%">
        <thead>
          <tr role="row">
            <th>Sr.No.</th>
            <th>Name</th>
          
   
            <th>Email</th>
            <th>Mobile</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if($ADMINDATA <> ""): $i=1; foreach($ADMINDATA as $ADMININFO): ?>
          <tr class="<?php if($i%2 == 0): echo 'gradeA odd'; else: echo 'gradeA even'; endif; ?>" role="row">
            <td class="sorting_1"><?=$i++?></td>
            <td><?=stripslashes($ADMININFO['name'])?></td>
         
            <td><?=stripslashes($ADMININFO['email'])?></td>
            <td><?=stripslashes($ADMININFO['mobile'])?></td>
            <td><div class="table_action_data"><a href="{BASE_URL}{CURRENT_CLASS}/editmyaccount/<?=manoj_encript($ADMININFO['id'])?>" data-placement="bottom" data-toggle="tooltip" title="Edit" class="btn btn-info btn-circle tooltipVal"><i class="fa fa-pencil"></i></a></div></td>
          </tr>
          <?php $i++; endforeach; endif; ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="row mar-top-20">
      <div class="col-sm-12"> <span class="btn btn-outline btn-default">Note :-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="javascript:void(0);" title="Edit data" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i></a>&nbsp;->&nbsp;<strong>Edit data</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </span> </div>
  </div>
</div>
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