<div id="header" class="">	
	<div class="header-left">
		<button id="mobile-menu" class="mobile hamburger hamburger--squeeze is-active" type="button">
			<span class="hamburger-box">
				<span class="hamburger-inner"></span>
			</span>
		</button>
		<div id="brand">
			<a href="<?=base_url();?>admin" class="brand-wrapper">
				<img src="<?=base_url();?>assets/admin/img/logo.png" class="img-fluid" alt="">
				<span class="title"><?= $this->settings->admin_text;?></span>
			</a>
		</div>
		<button id="mobile-btn" type="button" class="btn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
	</div>
	
	<div class="header-toggle">
		<div class="header-content header-hidden">
			
			<div class="left">
				<button id="menu-btn" class="hamburger hamburger--squeeze is-active" type="button">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</button>
			</div>
			
			<div class="right">				
				<ul class="nav">
					<li class="nav-item profile dropdown hidden-sm-down">
						<a class="dropdown-toggle" href="#" id="profile_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img style="height: 40px; margin-right: 7px;" src="<?=base_url().'assets/images/profile/'.$this->profile->image;?>" class="img-fluid" title="<?=$this->profile->fname.' '.$this->profile->lname;?>"> <?=$this->profile->fname.' '.$this->profile->lname;?>
						</a>
						<div class="dropdown-menu" aria-labelledby="profile_dropdown">
							<div class="profile-detalis ">
								<div class="profile-img">
									<img src="<?=base_url().'assets/images/profile/'.$this->profile->image;?>" class="img-fluid" title="<?=$this->profile->fname.' '.$this->profile->lname;?>">
								</div>
								<a class="dropdown-item profile-name" href="#"><?=$this->profile->fname.' '.$this->profile->lname;?></a>
							</div>
							<a class="dropdown-item single-link" href="<?=base_url();?>admin/profile">
								<i class="fa fa-envelope" aria-hidden="true"></i>
								Profile
							</a>
							<a class="dropdown-item single-link" href="<?=base_url();?>admin/profile/password">
								<i class="fa fa-key" aria-hidden="true"></i>
								Change Password
							</a>
							<a class="dropdown-item single-link" target="_blank" href="<?=base_url();?>">
								<i class="fa fa-link" aria-hidden="true"></i>
								Front View
							</a> 
							<div class="dropdown-divider"></div>            
							<a class="dropdown-item single-link" href="<?=base_url();?>logout">
								<i class="fa fa-sign-out" aria-hidden="true"></i>
								Sign Out
							</a>      
						</div>
					</li>
					
				</ul>
			</div>
		</div>
	</div>
</div>

<div id="page">