<div class="col-md-4 mt-4">        
	<div class="card">
		<div class="card-heading">
			<h5>Add <?=$title;?></h5>
		</div>
		<div class="card-body">
			<form data-toggle="validator" method="POST" novalidate="true" enctype="multipart/form-data">
				<div class="form-group">
					<label>Title <em>*</em></label>
					<input type="text" class="form-control" name="title" required>
				</div>
				<div class="form-group">
					<label>Price <em>*</em></label>
					<div class="input-group">
						<span class="input-group-addon">$</span>
						<input type="number" class="form-control" name="price" required>
					</div>
				</div>
				
				<div class="form-group">
					<label>Description <em>*</em></label>
					<textarea class="form-control" rows="3" name="description" required></textarea>
				</div>
				
				<div class="form-group">
					<label>Categories</label>
					<select class="form-control" name="category[]" multiple required>
						<?php foreach($category as $row){ ?>
						<option value="<?=$row->id;?>"><?=$row->name;?></option>
						<?php } ?>
					</select>
				</div>
				
				<div class="form-group">
					<label>Image <em>*</em></label>
					<input type="file" name="image" required>
				</div>

				<div class="form-check form-check-inline"> 
					<input class="check" type="checkbox" name="hot"> 
					<label class="form-label">Hot</label>        
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


