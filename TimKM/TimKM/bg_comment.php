<?php
/* TODO: Add code here */
require('config/globalconfig.php');
include_once('class/model_comment.php');
include_once('class/model_article.php');
include_once('class/model_user.php');

$objComment = new Model_Comment($objConnection);
$objArticle = new Model_Article($objConnection);

if ($_pgR["act"] == model_Article::ACT_ADD || $_pgR["act"] == model_Article::ACT_UPDATE)
{
	
	if (global_common::isCLogin())
	{
		//get user info
		$c_userInfo = $_SESSION[global_common::SES_C_USERINFO];
		
		$articleid = $_pgR[global_mapping::ArticleID];
		$content = html_entity_decode($_pgR[global_mapping::Content],ENT_COMPAT ,'UTF-8' );
		$createdby = $c_userInfo[global_mapping::UserID];	
		$status = 1;
		
		if($_pgR["act"] == Model_Comment::ACT_ADD)
		{
			$createdBy = $c_userInfo[global_mapping::UserID];
			$resultID = $objComment->insert($articleid,$content,$createdby,$status);
			//echo global_common::convertToXML($arrHeader, array("rs","info"), array(0,$resultID), array(0,1));
			//return;
			if ($resultID)
			{
				$commentHTML = $objComment->getCommentHTMLByArticle($articleid);
				$arrHeader = global_common::getMessageHeaderArr($banCode);//$banCode
				echo global_common::convertToXML(
						$arrHeader, array("rs", "inf","form"), 
						array(1, 'Gửi bình luận thành công',$commentHTML), 
						array( 0, 1, 1)
						);
				return;
			}
			else
			{
				echo global_common::convertToXML($arrHeader, array("rs","info"), array(0,"Input data is invalid"), array(0,1));
				return;
			}
		}
		else
		{
			$modifiedBy = $c_userInfo[global_mapping::UserID];
			$articleID = html_entity_decode($_pgR[global_mapping::ArticleID],ENT_COMPAT ,'UTF-8' );
			$currentArticle = $objArticle->getArticleByID($articleID);
			$resultID = $objArticle->update($articleID,null,$title,$fileName,$catalogueID, $content,null,$tags,null,null,$currentArticle[global_mapping::CreatedBy],
					$currentArticle[global_mapping::CreatedDate],$modifiedBy,global_common::nowSQL(),null,null,1,null,null,null,null,$companyName,
					$companyAddress,$companyWebsite,$companyPhone,$adType,$startDate,$endDate,$happyDays,
					$startHappyHour,$endHappyHour, $addresses,$dictricts,$cities);
			if ($resultID)
			{
				$arrHeader = global_common::getMessageHeaderArr($banCode);//$banCode
				echo global_common::convertToXML(
						$arrHeader, array("rs", "inf"), 
						array(1, 'Cập nhật thành công'), 
						array( 0, 1 )
						);
				return;
			}
			else
			{
				echo global_common::convertToXML($arrHeader, array("rs","info"), array(0,"Input data is invalid"), array(0,1));
				return;
			}
		}
	}
	//else
	//{
	//	echo global_common::convertToXML($arrHeader, array("rs",'info'), array(0,global_common::STRING_REQUIRE_LOGIN), array(0,1));
	//}
	return;
}
elseif($_pgR['act'] == Model_ArticleType::ACT_GET_ALL)
{
	$types = $objArticleType->getAllArticleType(0);
	echo json_encode($types);
	return ;
}
elseif($_pgR['act'] == model_Article::ACT_CHANGE_PAGE)
{
	$intPage = $_pgR['p'];
	
	$outPutHTML =  $objArticle->getListArticle($intPage);
	echo global_common::convertToXML($strMessageHeader, array('rs','inf'), array(1,$outPutHTML),array(0,1));
	return ;
}
elseif($_pgR['act'] == model_Article::ACT_SHOW_EDIT)
{
	
	$strArticleID = $_pgR['id'];
	$arrArticle =  $objArticle->getArticleByID($strArticleID);
	
	echo global_common::convertToXML($strMessageHeader, array('rs','ArticleID','Prefix','Title','FileName','ArticleType','Content','NotificationType','Tags','CatalogueID','SectionID','NumView','NumComment','Status','comments','RenewedDate','RenewedNum'), array(1,'ArticleID','Prefix','Title','FileName','ArticleType','Content','NotificationType','Tags','CatalogueID','SectionID','NumView','NumComment','Status','comments','RenewedDate','RenewedNum'),array(0,1,1,1,1,1,1,1,1,1,1,0,0,1,1,1,0));
	return ;
}
elseif ($_pgR["act"] == model_Article::ACT_GET)
{		
	$sectionID = $_pgR["sect"];
	$arrSection= $objMenu->getAllMenuBySection($sectionID);
	if($arrSection)
	{
		$strHTML = $objMenu->outputHTMLMenu($arrSection);
		echo global_common::convertToXML($arrHeader, array("rs", "inf"), 
				array(1, $strHTML), array(0, 1));
		return;	
	}
	else
	{
		echo global_common::convertToXML($arrHeader, array("rs",'inf'),array(0,'Kh?ng c? nh?m h?ng'),array(0,0));
		return ;
	}
}
elseif($_pgR['act'] == model_Article::ACT_DELETE)
{
	
	$IDName = "menu_id";
	$contentID = $_pgR["aid"];
	$strTableName = user_menu::TBL_T_MENU;
	$result = global_common::updateDeleteFlag($contentID,$IDName,$strTableName ,$_pgR["status"],$objConnection);
	if($result)
	{
		$IDName = "content_id";
		$strTableName = user_faq::TBL_T_FAQ;
		$result = global_common::updateDeleteFlag($contentID,$IDName,$strTableName ,$_pgR["status"],$objConnection);
	}
	$arrHeader = global_common::getMessageHeaderArr($banCode=0,0);
	$arrKey = array("rs","id");
	$arrValue = array($result?1:0,$contentID);
	$arrIsMetaData = array(0, 1);
	echo global_common::convertToXML($arrHeader, $arrKey, $arrValue, $arrIsMetaData);
	
	return;
}
?>