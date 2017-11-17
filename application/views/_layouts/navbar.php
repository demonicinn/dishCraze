<h1 align="center"><a href="<?=base_url();?>"><?=$this->settings->title;?></a></h1>
<p align="center"><?=$this->settings->address;?></p>		
</br>
<?php if(empty($this->uri->segment(1))) { ?>
<div class="toolbar mb2 mt2" align="center">
	<button class="btn btn-default filter-button" data-filter="all">All</button>
	<?= $this->categories; ?>
	<a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?= $title;?>&amp;p[url]=<?= base_url(); ?>','sharer','toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)"><button type="button" class="btn btn-default" style="border:none;" data-toggle="tooltip" data-placement="top" title="Share with Friends"><span style="font-size: 25px" class="glyphicon glyphicon-share" aria-hidden="true"></span></button></a> 
	
</div> 
<?php } ?>
<div style="clear:both;"></div> 