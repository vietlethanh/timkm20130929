<?php
/*
 * This file was automatically generated By Code Smith 
 * Modifications will be overwritten when code smith is run
 *
 * PLEASE DO NOT MAKE MODIFICATIONS TO THIS FILE
 * Date Created 5/6/2012
 *
 */

/// <summary>
/// Implementations of slarticles represent a Article
///
/// </summary>
chdir("..");
/* TODO: Add code here */
require('config/globalconfig.php');
require('include/_permission_admin.inc');
include_once('class/model_articletype.php');
include_once('class/model_article.php');
include_once('class/model_user.php');


$objArticleType = new model_ArticleType($objConnection);
$objArticle = new model_Article($objConnection);

$catID = $_pgR["cid"];

$allCats = $objArticleType->getAllArticleType(0,null,'ParentID='.$catID,null);
if(count($allCats)<=0)
{
	$allCatIDs = $catID;
}
else
{
	$allCatIDs = global_common::getArrayColumn($allCats,global_mapping::ArticleTypeID);
}


//$condidtion =global_mapping::StartDate.' <= \''.global_common::nowSQL().'\''.' And '.global_mapping::EndDate.' >= \''.global_common::nowSQL().'\'';
$articles = $objArticle->searchArticle(1,'','','',$condidtion);

?>
<?php
$_SESSION[global_common::SES_C_CUR_PAGE] = "admin/admin_article.php";
include_once('include/_admin_header.inc');
?>
<script type="text/javascript" src="<?php echo $_objSystem->locateJs('user_article.js');?>"></script>
<script type="text/javascript" src="<?php echo $_objSystem->locateJs('user_articletype.js');?>"></script>
<div id="admin-article">
	<div class="row-fluid">
		<div class="span12">
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
			<h3 class="page-title">
				Quản lý khuyến mãi
			</h3>
		</div>
	</div>
	 <div class="row-fluid">	
            <div class="span12">
	<div class="portlet box">
		<div class="portlet-title hide">
			<div class="caption">
				<!--i class="icon-reorder"></i-->
			</div>
			
			<div class="tools">                                
				<!--a href="#config-form" data-toggle="modal" class="config"></a-->
				<!--a href="javascript:;" class="reload" title="Reload"></a-->
			</div>
			<div class="actions">									
				
			</div>
		</div>
		<!---->
		<div class="portlet-body">
		
									
<?php
//print_r($articles);
if($articles)
{
	echo '<table class="table table-striped">';
	echo '<thead>';
	echo '<th>';
	echo 'Tên khuyến mãi';		
	echo '</th>';
	echo '<th>';
	echo 'Đơn vị kinh doanh';		
	echo '</th>';
	echo '<th>';
	echo 'Ngày bắt đầu';		
	echo '</th>';
	echo '<th>';
	echo 'Ngày kết thúc';		
	echo '</th>';
	echo '<th>';
	echo 'Action';		
	echo '</th>';
	echo '</thead>';
	foreach($articles as $item)
	{
		echo '<tr>';
		echo '<td>';
		echo $item[global_mapping::Title];		
		echo '</td>';
		echo '<td style="padding:0;width:200px">';
		echo $item[global_mapping::CompanyName];		
		echo '</td>';
		echo '<td>';
		echo global_common::formatDateVN($item[global_mapping::StartDate]);		
		echo '</td>';
		echo '<td>';
		echo global_common::formatDateVN($item[global_mapping::EndDate]);		
		echo '</td>';
		echo '<td style="padding:0;width:180px">';
		echo '<a href="../article_detail.php?aid='.$item[global_mapping::ArticleID].'" target="_blank" class="btn btn-mini"> View</a> ';	
		if(	!$item[global_mapping::Status])
		{
			echo '<a href="javascript:article.activeArticle(\''.$item[global_mapping::ArticleID].'\',1)" class="btn btn-mini">Active</a> ';	
		}
		else
		{
			echo '<a href="javascript:article.activeArticle(\''.$item[global_mapping::ArticleID].'\',0)" class="btn btn-mini">Deactive</a>';	
		}	
		echo '</td>';
		echo '</tr>';
	}
	echo '</table>';
}
?>
				</div>
					</div>
		</div>
	</div>
</div>
<?php
include_once('include/_admin_footer.inc');
?>
