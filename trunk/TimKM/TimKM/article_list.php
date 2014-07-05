<?php

/* TODO: Add code here */
require('config/globalconfig.php');

include_once('class/model_articletype.php');
include_once('class/model_article.php');
include_once('class/model_user.php');

if (!$_pgR["cid"])
{
	global_common::redirectByScript("index.php"); 
}
$city = $_pgR['ct'];
$district = $_pgR['ds'];
$keyword =  $_pgR['kw'];
?>

<?php
if($_pgR["cid"])
{
	$catID = $_pgR["cid"];
	$_SESSION[global_common::SES_C_CUR_PAGE] = "article_list.php?cid=".$catID;
}
include_once('include/_header.inc');
include_once('include/_menu.inc');

?>
<script type="text/javascript" src="<?php echo $_objSystem->locateJs('user_article.js');?>"></script>
	
<?php 
//left side
include_once('include/_slogan.inc');
?>
<?php 
//left side
include_once('include/_left_side.inc');
?>
<?php 
//right side
include_once('include/_right_side.inc');
?>
<?php 
//search box
include_once('include/_search_box.inc');
?>
<?php 

//article list
include_once('include/_article_list.inc');
?>
<?php 
//footer
include_once('include/_footer.inc');
?>
