<?php if($this->session->flashdata('message')) { ?>
<div class="alets-pop">	
	<div class="alert alert-<?=$this->session->flashdata('type');?>">
		<strong><?=ucfirst($this->session->flashdata('type'));?>!</strong> <?=$this->session->flashdata('message');?>
	</div>
</div>
<?php } ?>

<?php if(validation_errors()) { ?>
<div class="alets-pop">	
	<div class="alert alert-danger">
		<strong>Error!</strong> <?php echo validation_errors();?>
	</div>
</div>
<?php } ?>