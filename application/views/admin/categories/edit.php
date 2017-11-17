<div class="col-md-4 mt-4">        
	<div class="card">
		<div class="card-heading">
			<h5>Edit <?=$title;?></h5>
		</div>
		<div class="card-body">
			<form data-toggle="validator" method="POST" novalidate="true">
				<div class="form-group">
					<label>Name <em>*</em></label>
					<input type="text" class="form-control" name="name" value="<?= $dataId->name;?>" required>
				</div>
				<div class="form-group">
					<label>Status</label><br>
					<label class="radio-inline">
						<input name="status" type="radio" value="1" <?=($dataId->status=='1')?'checked':''?>>Active &nbsp;&nbsp;
						<input name="status" type="radio" value="0" <?=($dataId->status=='0')?'checked':''?>>De-active
					</label>
				</div>
				<input type="submit" name="submit" class="btn btn-danger pull-right disabled" value="Update">
			</form>
		</div>
	</div>
</div>