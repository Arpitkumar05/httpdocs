<?php if($this->session->flashdata('alert_warning')): ?>
<div class="alert alert-warning alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
  <a href="javascript:void(0);" class="alert-link">Warning! </a>
  <?=$this->session->flashdata('alert_warning')?>
</div>
<?php elseif($this->session->flashdata('alert_error')): ?>
<div class="alert alert-danger alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
  <a href="javascript:void(0);" class="alert-link">Error! </a>
  <?=$this->session->flashdata('alert_error')?>
</div>
<?php elseif($this->session->flashdata('alert_success')): ?>
<div class="alert alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
  <a href="javascript:void(0);" class="alert-link">Success! </a>
  <?=$this->session->flashdata('alert_success')?>
</div>
<?php endif; ?>
