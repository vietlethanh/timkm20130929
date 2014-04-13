<?php
include_once('class/model_advertising.php');
$objAdvertising = new Model_Advertising($objConnection);
$condition = global_mapping::AdTypeID.'=\'1\'';
$allAds = $objAdvertising->getAllAdvertising(0,'',$condition,'');

?>	

<div id="right-slider" >
	<section class="slider">
		<div class="flexslider">
		  <ul class="slides">	
<?php

foreach($allAds as $item)
{
	echo '<li>';
	echo '	<a href="'.$item[global_mapping::PreferLink].'" target="_blank"><img src="images/data/kitchen_adventurer_cheesecake_brownie.jpg" /></a>';
	echo '</li>';
	//echo '<div class="advertise">';
	//echo '<a href="'.$item[global_mapping::PreferLink].'" target="_blank"><img class="partner" src="'.$item[global_mapping::ImageLink].'" /></a>';
	//echo '</div>';
}
?>		
			
		  </ul>
		</div>
	</section>
</div>
<script type="text/javascript">
$(window).load(function(){
	$('.flexslider').flexslider({
		animation: "slide",
		prevText: "",
		nextText: "",
		start: function(slider){
		  $('body').removeClass('loading');
		}
	});
});
</script>
