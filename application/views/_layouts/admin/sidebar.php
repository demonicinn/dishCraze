<div id="left-sidebar" class="">
	<div class="bg"></div>
	<nav id="nav" class="sidebar-nav menu-scroll">		
		<ul id="menu" class="side-nav metismenu">
			<li class="sidebar-header">Menu</li>
			
			<li><a href="<?=base_url();?>admin/dashboard" class="collapse <?=($active=='dashboard'?'active':'')?>"><i class="fa fa-home" aria-hidden="true"></i><span class="drop-header">Dashboard</span></a></li>
			<li><a href="<?=base_url();?>admin/categories" class="collapse <?=($active=='categories'?'active':'')?>"><i class="fa fa-tasks" aria-hidden="true"></i><span class="drop-header">Categories</span></a></li>
			<li><a href="<?=base_url();?>admin/product" class="collapse <?=($active=='product'?'active':'')?>"><i class="fa fa-th" aria-hidden="true"></i><span class="drop-header">Products</span></a></li>
			<li><a href="<?=base_url();?>admin/settings" class="collapse <?=($active=='settings'?'active':'')?>"><i class="fa fa-cog" aria-hidden="true"></i><span class="drop-header">Settings</span></a></li>
			
		</ul>
	</nav>
</div>

<div id="content">
