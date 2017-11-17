<div class="col-md-4 mt-4">        
	<div class="card">
		<div class="card-heading">
			<h5>Edit <?=$title;?></h5>
		</div>
		<div class="card-body">
			<form data-toggle="validator" method="POST" novalidate="true" enctype="multipart/form-data">
				<div class="form-group">
					<label>Title <em>*</em></label>
					<input type="text" class="form-control" name="title" value="<?=$dataId->title;?>" required>
				</div>
				<div class="form-group">
					<label>Price <em>*</em></label>
					<div class="input-group">
						<span class="input-group-addon">$</span>
						<input type="number" class="form-control" name="price" value="<?=$dataId->price;?>" required>
					</div>
				</div>
				
				<div class="form-group">
					<label>Description <em>*</em></label>
					<textarea class="form-control" rows="3" name="description" required><?=$dataId->description;?></textarea>
				</div>
				
				<div class="form-group">
					<label>Categories</label>
					<select class="form-control" name="category[]" multiple required>
						<?php 
						$cat = json_decode($dataId->category);
						foreach($category as $row){ ?>
						<option value="<?=$row->id;?>" <?php if(in_array($row->id, $cat)){ echo 'selected';};?>><?=$row->name;?></option>
						<?php } ?>
					</select>
				</div>
				
				<div class="form-group">
					<label>Image <em>*</em></label>
					<?php if($dataId->image){ ?>
					<image class="form-control" src="<?=base_url().'assets/images/products/'.$dataId->image;?>">
					<?php } ?>
					<input type="file" name="image">
				</div>

				<div class="form-check form-check-inline"> 
					<input class="check" type="checkbox" name="hot" <?=($dataId->hot=='on')?'checked':'';?>> 
					<label class="form-label">Hot</label>        
				</div>
				
				<div class="form-group">
					<label>Status</label><br>
					<label class="radio-inline">
						<input checked="" name="status" type="radio" value="1" <?=($dataId->status==1)?'checked':'';?>>Active &nbsp;&nbsp;
						<input name="status" type="radio" value="0" <?=($dataId->status==0)?'checked':'';?>>De-active
					</label>
				</div>
				<input type="submit" name="submit" class="btn btn-danger pull-right disabled" value="Update">
			</form>
		</div>
	</div>
</div>


