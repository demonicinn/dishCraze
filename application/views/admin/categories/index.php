<div class="row">		
	<div class="col-md-8 mt-4">       
		<div class="card">
			<div class="card-heading">
				<h5><?=$title;?> 
					<a href="<?=base_url()?>admin/categories/add" class="btn btn-round btn-success space-preview pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
				</h5>
			</div>
			<div class="card-body">
				<table class="table table-hover">
					<thead>
						<tr><th>#</th><th>Name</th><th>Date</th><th>Action</th></tr>
					</thead>
					<tbody>
						<?php foreach($dataAll as $k => $row){ ?>
						<tr class="<?= ($this->uri->segment(4)==$row->id)?'opens':'';?>">
							<th><?=$k+$pageLimit+1;?></th>
							<td><?=$row->name;?></td>
							<td><?=date('jS F Y',strtotime($row->created));?></td>
							<td>
								<?php if($row->status==1){ ?>
								<a href="javascript:void(0)" title="Active" class="success"><i class="fa fa-check"></i></a>&nbsp;&nbsp;
								<?php } else { ?>
								<a href="javascript:void(0)" title="In-active" class="success"><i class="fa fa-times"></i></a>&nbsp;&nbsp;
								<?php } ?>
								
								<a href="<?=base_url().'admin/categories/edit/'.$row->id;?>" title="Edit" class="warning"><i class="fa fa-pencil-square-o"></i></a>&nbsp;&nbsp;
								<a href="javascript:void(0)" onclick="deleteFun('<?=base_url().'admin/categories/delete/'.$row->id;?>')" title="Delete" class="danger"><i class="fa fa-trash-o"></i></a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
<?=$pagination;?>
		
	</div>
	
	<?php
		if($this->uri->segment(3)=='add'){
			require 'add.php';
		} else if($this->uri->segment(3)=='edit'){
			require 'edit.php';
		}
	?>
	
</div>






