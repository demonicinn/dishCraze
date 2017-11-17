<div style="clear:both;"></div>
<div class="container">
	<div class="row">
		<h5 class="signature"><?=$this->settings->footer_text;?></h5>
	</div>
</div>


<div id="fb-root"></div>
<script>
	$(document).ready(function(){
		$(".filter-button").click(function(){
			var value = $(this).attr('data-filter');
			if(value == "all") {
				$('.filter').show('1000');
			} else {
				$(".filter").not('.'+value).hide('3000');
				$('.filter').filter('.'+value).show('3000');
			}
		});
		if ($(".filter-button").removeClass("active")) {
			$(this).removeClass("active");
		}
		$(this).addClass("active");
	});
		

jQuery(".rating_stars").rateYo({
	fullStar: true,
	starWidth: "20px",
	ratedFill: "#f14444",
	onSet: function (rating, rateYoInstance) {
		jQuery(this).addClass('in');
		var id = jQuery(this).attr('data-id');
		jQuery.ajax({
			data: {action: "rating", rating:rating, id:id},
			type: "post",
			url: "<?=base_url();?>home/rating",
			success: function(data) {
				var obj = jQuery.parseJSON(data);
				if(obj.rating){
					jQuery('.rating .badge.un-'+id).html('');
					jQuery('.rating .badge.un-'+id).html(obj.rating);
				}
				alert(obj.status);
			}
		});
	}
});

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=1312688522155380';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

</script>

</body>
</html>