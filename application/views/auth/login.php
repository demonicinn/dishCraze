<?php if($this->session->userdata('restaurant_session'))
	{
		redirect("admin","");
	}
?>

<div class="container">
	<div class="row">
		<div class="col-xs col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<div class="authentication">
				<div class="authentication-wrapper">
					<div class="authentication-header">
						<h4>Sign In</h4>
					</div>
					<div class="authentication-content">
						
						<form data-toggle="validator" action="<?=base_url();?>auth/verify" method="post">
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
							
							<div class="form-group">
								<label class="form-label">Email</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
									<input type="email" class="form-control" name="email" required>
								</div>
								<div class="help-block with-errors"></div>
							</div>
							<div class="form-group">
								<label class="form-label">Password</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
									<input class="form-control" type="password" name="password" required>
								</div> 
								<div class="help-block with-errors"></div>
							</div>
							
							<div class="form-footer">
								<input type="submit" name="submit" class="btn btn-primary pull-right" value="Sign In">
								<a href="<?=base_url();?>forgot-password">Forgot Password?</a>
							</div>
						</form>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
