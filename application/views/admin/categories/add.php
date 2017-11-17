<div class="col-md-4 mt-4">        
	<div class="card">
		<div class="card-heading">
			<h5>Add <?=$title;?></h5>
		</div>
		<div class="card-body">
			<form data-toggle="validator" method="POST" novalidate="true">
				<div class="form-group">
					<label>Name <em>*</em></label>
					<input type="text" class="form-control" name="name" required>
				</div>
				<div class="form-group">
					<label>Status</label><br>
					<label class="radio-inline">
						<input checked="" name="status" type="radio" value="1">Active &nbsp;&nbsp;
						<input name="status" type="radio" value="0">De-active
					</label>
				</div>
				<input type="submit" name="submit" class="btn btn-primary pull-right disabled" value="Add">
			</form>
		</div>
	</div>
</div>