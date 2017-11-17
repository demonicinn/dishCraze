<div class="row">

<div class="col-md-6 mt-4">        
	<div class="card">
		<div class="card-heading">
			<h5><?=$title;?></h5>
		</div>
		<div class="card-body">
			<form data-toggle="validator" method="POST" novalidate="true" enctype="multipart/form-data">
				<div class="form-group">
					<label>Title <em>*</em></label>
					<input type="text" class="form-control" name="title" value="<?=$dataId->title;?>" required>
				</div>
				
				<div class="form-group">
					<label>Address <em>*</em></label>
					<input type="text" class="form-control" name="address" value="<?=$dataId->address;?>" required>
				</div>
				
				<div class="form-group">
					<label>Footer Text <em>*</em></label>
					<input type="text" class="form-control" name="footer_text" value="<?=$dataId->footer_text;?>" required>
				</div>

				<div class="form-group">
					<label>Admin Text <em>*</em></label>
					<input type="text" class="form-control" name="admin_text" value="<?=$dataId->admin_text;?>" required>
				</div>

				<div class="form-group">
					<label>Pagination Front <em>*</em></label>
					<select class="form-control" name="pagi_front" required>
						<option <?= ($dataId->pagi_front==6)?'selected':'';?>>6</option>
						<option <?= ($dataId->pagi_front==9)?'selected':'';?>>9</option>
						<option <?= ($dataId->pagi_front==12)?'selected':'';?>>12</option>
						<option <?= ($dataId->pagi_front==15)?'selected':'';?>>15</option>
						<option <?= ($dataId->pagi_front==18)?'selected':'';?>>18</option>
					</select>
				</div>

				<div class="form-group">
					<label>Pagination Admin <em>*</em></label>
					<select class="form-control" name="pagi_admin" required>
						<option <?= ($dataId->pagi_admin==5)?'selected':'';?>>5</option>
						<option <?= ($dataId->pagi_admin==10)?'selected':'';?>>10</option>
						<option <?= ($dataId->pagi_admin==15)?'selected':'';?>>15</option>
						<option <?= ($dataId->pagi_admin==20)?'selected':'';?>>20</option>
						<option <?= ($dataId->pagi_admin==30)?'selected':'';?>>30</option>
					</select>
				</div>

				<div class="form-group">
					<label>Favicon <em>*</em></label>
					<?php if($dataId->favicon){ ?>
					<image style="width: 100px;" class="form-control" src="<?=base_url().'assets/images/site/'.$dataId->favicon;?>">
					<?php } ?></br>
					<input type="file" name="favicon">
				</div>

				<input type="submit" name="submit" class="btn btn-danger pull-right disabled" value="Update">
			</form>
		</div>
	</div>
</div>





</div>