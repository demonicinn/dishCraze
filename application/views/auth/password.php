<?php if($this->session->userdata('restaurant_session')){
		redirect("admin","");
} ?>

<div class="container">
	<div class="row">
		<div class="col-xs col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<div class="authentication">
				<div class="authentication-wrapper">
					<div class="authentication-header">
						<h4>Change Password</h4>
					</div>
					<div class="authentication-content">
						
						<form data-toggle="validator" method="post">
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
								<label class="form-label">New Password</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="form-label">Confirm Password</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="cpassword" required>
								</div>
							</div>
							
							<div class="form-footer">
								<input type="submit" name="submit" class="btn btn-primary pull-right" value="Update Password">
							</div>
						</form>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
