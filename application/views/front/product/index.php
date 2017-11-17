<div id="portfolio">
	<ul class="cards">		
		
		<li class="cards__item filter">
			<div class="tile scale-anm">
				<div class="card">
					<div class="images grid">
						<a href="<?= $url = base_url().'product/'.$dataId->slug;?>" title="<?=$dataId->title;?>" alt="<?=$dataId->title;?>">
							<img src="<?= $image = base_url().'assets/images/products/'.$dataId->image;?>" title="<?=$dataId->title;?>" alt="<?=$dataId->title;?>">
						</a>
					</div>
					<div class="card__content">
						<div class="card__title">
							<a href="<?= $url;?>" title="<?=$dataId->title;?>" alt="<?=$dataId->title;?>">
								<?=$dataId->title;?>
							</a>
							<span>$<?=$dataId->price;?></span>
							<?php if($dataId->hot=='on'){ ?>
								<span class="glyphicon glyphicon-fire data-toggle="tooltip" data-placement="top" title="Popular Dish"" aria-hidden="true"></span>
							<?php } ?>
						</div>
						<div class="rating">
							<?php if($ratedPro==1){ ?>
								<span class="badge un-<?=$dataId->id;?>"><?=$rating;?></span><div id="rati-<?=$dataId->id;?>"></div>
								<script>jQuery("#rati-<?=$dataId->id;?>").rateYo({ rating: '<?=$ratingValue;?>', readOnly: true, starWidth: "20px", ratedFill: "#f14444" });</script>
								<?php } else { ?>							
								<span class="badge un-<?=$dataId->id;?>"><?=$rating;?></span><div class="rating_stars" data-id="<?=$dataId->id;?>"></div>
							<?php } ?>
						</div>
						
						<p class="card__text"><?=$dataId->description;?></p>	
						
						<div class="comment-section">
							<div class="fb-like" data-href="<?=$url;?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
							
						</div>
											
					</div>
				</div>
			</div>
			
			<div id="comments"> 				
				<div class="fb-comments" data-href="<?=$url;?>" data-numposts="5" data-width="415"></div>
			</div>
		</li>
		
	</ul>
</div>

<style>
	li.cards__item.filter {
	float: none;
	margin: auto;
	}
	#comments {margin-top: 20px;}
</style>

