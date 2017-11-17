<div class="row">

<div class="col-md-6 mt-4">        
	<div class="card">
		<div class="card-heading">
			<h5><?=$title;?></h5>
		</div>
		<div class="card-body">
			<form data-toggle="validator" method="POST" novalidate="true" enctype="multipart/form-data">
				<div class="form-group">
					<label>First Name <em>*</em></label>
					<input type="text" class="form-control" name="fname" value="<?=$dataId->fname;?>" required>
				</div>
				
				<div class="form-group">
					<label>Last Name <em>*</em></label>
					<input type="text" class="form-control" name="lname" value="<?=$dataId->lname;?>" required>
				</div>
				
				<div class="form-group">
				<label>Email</label>
					<input type="text" class="form-control" value="<?=$dataId->email;?>" disabled>
				</div>
				
				<div class="form-group">
					<label>Image <em>*</em></label>
					<?php if($dataId->image){ ?>
					<image style="width: 200px;" class="form-control" src="<?=base_url().'assets/images/profile/'.$dataId->image;?>">
					<?php } ?></br>
					<input type="file" name="image">
				</div>

				<input type="submit" name="submit" class="btn btn-danger pull-right disabled" value="Update">
			</form>
		</div>
	</div>
</div>





</div>