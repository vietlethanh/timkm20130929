<?php 
include_once('class/model_city.php');
include_once('class/model_district.php');

$objCity = new Model_City($objConnection);
$objDistrict = new Model_District($objConnection);

$allCities = $objCity->getAllCity();
//echo 'get city:';
//echo($allCities);
$allDistricts = $objDistrict->getAllDistrict();

//Just get from "article_list.php"
//$city = $_pgR['ct'];
//$district = $_pgR['ds'];
//$keyword =  $_pgR['kw'];
$selectCityID = "";

?>
<div id="search-box">
	<form method="post" id="formSearch">
		<label>
			<select id="optCity" name="ct" onchange="article.bindDistrict(this);">
				<option value="">Tỉnh/Thành Phố</option>
<?php
foreach($allCities as $item)
{
	if($item[global_mapping::CityName] == $city)
	{
		$selectCityID = $item[global_mapping::CityID];
		echo '			<option value="'.$item[global_mapping::CityName].'" selected="selected" CityID="'.$item[global_mapping::CityID].'">'.$item[global_mapping::CityName].'</option>';
	}
	else
		echo '			<option value="'.$item[global_mapping::CityName].'" CityID="'.$item[global_mapping::CityID].'">'.$item[global_mapping::CityName].'</option>';
}
?>
			</select>
		</label>
		<label>
			<select id="optDistrict" name="ds">
				<option CityID="0" value="">Quận/Huyện</option>
<?php
$display='style="display:none"';
foreach($allDistricts as $item)
{
	if($selectCityID)
	{
		if($item[global_mapping::DistrictName] == $district)
		{
			echo '<option value="'.$item[global_mapping::DistrictName].'" selected=selected  CityID="'.$item[global_mapping::CityID].'">'.$item[global_mapping::DistrictName].'</option>';
		}
		else
		{
			echo '<option value="'.$item[global_mapping::DistrictName].'"  CityID="'.$item[global_mapping::CityID].'">'.$item[global_mapping::DistrictName].'</option>';
		}
	}
	else
		echo ' <option value="'.$item[global_mapping::DistrictName].'" '.$display.'  CityID="'.$item[global_mapping::CityID].'">'.$item[global_mapping::DistrictName].'</option>';
}
?>
			</select>
		</label>
		<input type="text" id="txtkeyword" name="kw" value="<?php echo $keyword ?>" placeholder="Tìm kiếm..."> 
		<input type="button" class="btnSearch"  onclick="article.validateKeyword();"/>	
		<a href="post_article.php" class="btn btn-large btn-post">Đăng Tim Mới</a>
	</form>
</div>