	
	<div class="row">
		<div class="col-xs col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<h4><?=$title;?></h4>
			<?php if(empty($this->uri->segment(2)) || $this->uri->segment(2)=='dashboard'){ ?>
				<p class="text-muted">Welcome to Dashboard</p>
			<?php } else { ?>
			<nav class="breadcrumb">
				<a class="breadcrumb-item" href="<?=base_url();?>admin/dashboard">Dashboard</a>
				<a class="breadcrumb-item" href="<?=base_url().'admin/'.$this->uri->segment(2);?>"><?=$this->uri->segment(2);?></a>
			</nav>
			<?php } ?>
		</div>
	</div>