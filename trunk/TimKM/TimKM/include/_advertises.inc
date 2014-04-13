<?php
include_once('class/model_advertising.php');
$objAdvertising = new Model_Advertising($objConnection);
$condition = global_mapping::AdTypeID.'=\'2\'';
$allAds = $objAdvertising->getAllAdvertising(0,'',$condition,'');
foreach($allAds as $item)
{
	
	echo '<div class="advertise">';
	echo '	<img class="partner" src="'.$item[global_mapping::ImageLink].'" />';
	echo '</div>';
	
}
		?>	
