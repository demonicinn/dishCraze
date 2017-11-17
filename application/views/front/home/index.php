<div id="portfolio">
	<ul class="cards">		
		<?php foreach($dataAll as $row){ 
			$category = json_decode($row['category']);
		?>
		<li class="cards__item filter<?php foreach($category as $cat){ echo ' fil'.$cat;} ?>">
			<div class="tile scale-anm">
				<div class="card">
					<div class="images grid">
						<a href="<?= $url = base_url().'product/'.$row['slug'];?>"><img src="<?= $image = base_url().'assets/images/products/'.$row['image'];?>" title="<?=$row['title'];?>" alt="<?=$row['title'];?>"></a>
					</div>
					<div class="card__content">
						<div class="card__title">
							<a href="<?= $url;?>" title="<?=$row['title'];?>" alt="<?=$row['title'];?>">
								<?=$row['title'];?>
							</a>
							<span>$<?=$row['price'];?></span>
							<?php if($row['hot']=='on'){ ?>
							<span class="glyphicon glyphicon-fire data-toggle="tooltip" data-placement="top" title="Popular Dish"" aria-hidden="true"></span>
							<?php } ?>
						</div>
						<div class="rating">
							<?php if($row['ratedPro']==1){ ?>
							<span class="badge un-<?=$row['id'];?>"><?=$row['rating'];?></span><div id="rati-<?=$row['id'];?>"></div>
							<script>jQuery("#rati-<?=$row['id'];?>").rateYo({ rating: '<?=$row['ratingValue'];?>', readOnly: true, starWidth: "20px", ratedFill: "#f14444" });</script>
							<?php } else { ?>
							<span class="badge un-<?=$row['id'];?>"><?=$row['rating'];?></span><div class="rating_stars" data-id="<?=$row['id'];?>"></div>
							<?php } ?>
						</div>
						<p class="card__text"><?=$row['description'];?></p>
						
						<div class="comment-section">
							<div class="fb-like" data-href="<?=$url;?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
							
						</div>
					</div>
				</div>
			</div>
		</li>
		<?php } ?>
	</ul>
<?=$pagination;?>
</div>






