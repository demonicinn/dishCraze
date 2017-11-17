<div class="row">

<div class="col-md-6 mt-4">        
	<div class="card">
		<div class="card-heading">
			<h5><?=$title;?></h5>
		</div>
		<div class="card-body">
			<form data-toggle="validator" method="POST" novalidate="true" enctype="multipart/form-data">
				<div class="form-group">
					<label>Old Password <em>*</em></label>
					<input type="password" class="form-control" name="opassword" required>
				</div>
				
				<div class="form-group">
					<label>Password <em>*</em></label>
					<input type="password" class="form-control" name="password" required>
				</div>
				
				<div class="form-group">
					<label>Confirm Password <em>*</em></label>
					<input type="password" class="form-control" name="cpassword" required>
				</div>

				<input type="submit" name="submit" class="btn btn-danger pull-right disabled" value="Change">
			</form>
		</div>
	</div>
</div>





</div>