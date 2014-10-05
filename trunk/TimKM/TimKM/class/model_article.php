<?php
/*
 * This file was automatically generated By Code Smith 
 * Modifications will be overwritten when code smith is run
 *
 * PLEASE DO NOT MAKE MODIFICATIONS TO THIS FILE
 * Date Created 5/6/2012
 *
 */

/* <summary>
 * Implementations of slarticles represent a Article
 * </summary>
 */
class Model_Article
{		   
	#region PRESERVE ExtraMethods For Article
	#endregion
	#region Contants	
	const ACT_ADD							= 10;
	const ACT_UPDATE						= 11;
	const ACT_DELETE						= 12;
	const ACT_CHANGE_PAGE					= 13;
	const ACT_SHOW_EDIT                     = 14;
	const ACT_GET                           = 15;
	const ACT_ACTIVE                        = 16;
	const ACT_REFRESH                       = 17;
	
	
	const NUM_PER_PAGE                      = 15;
	const NUM_REFRESH                       = 5;
	
	const TBL_SL_ARTICLE			        = 'sl_article';
	const TBL_SL_ARTICLE_TYPE_ID			= 'sl_article_type_id';
	
	const SQL_INSERT_SL_ARTICLE		= 'INSERT INTO `{0}`
		(
		ArticleID,
		Prefix,
		Title,
		FileName,
		Content,
		NotificationType,
		Tags,
		NumView,
		NumComment,
		CreatedBy,
		CreatedDate,
		ModifiedBy,
		ModifiedDate,
		DeletedBy,
		DeletedDate,
		IsDeleted,
		Status,
		comments,
		RenewedDate,
		RenewedNum,
		CompanyName,
		CompanyAddress,
		CompanyWebsite,
		CompanyPhone,
		AdType,
		StartDate,
		EndDate,
		HappyDays,
		StartHappyHour,
		EndHappyHour,
		Addresses,
		Dictricts,
		Cities
		)
		VALUES (
		\'{1}\', \'{2}\', \'{3}\', \'{4}\', \'{5}\', \'{6}\', \'{7}\', \'{8}\', \'{9}\', \'{10}\', \'{11}\', \'{12}\', 
		\'{13}\', \'{14}\', \'{15}\', \'{16}\', \'{17}\', \'{18}\', \'{19}\', \'{20}\', \'{21}\', \'{22}\', \'{23}\',
		\'{24}\', \'{25}\', \'{26}\', \'{27}\', \'{28}\', {29}, {30}, \'{31}\', \'{32}\', \'{33}\');';
	
	const SQL_INSERT_SL_ARTICLE_TYPE_ID		= 'INSERT INTO `{0}` (ArticleTypeID,ArticleID) VALUES {1};';    
	
	const SQL_UPDATE_SL_ARTICLE		= 'UPDATE `{0}`
		SET  
		`ArticleID` = \'{1}\',
		#`Prefix` = \'{2}\',
		`Title` = \'{3}\',
		`FileName` = \'{4}\',
		`Content` = \'{5}\',
		#`NotificationType` = \'{6}\',
		#`Tags` = \'{7}\',
		#`NumView` = \'{8}\',
		#`NumComment` = \'{9}\',
		#`CreatedBy` = \'{10}\',
		#`CreatedDate` = \'{11}\',
		`ModifiedBy` = \'{12}\',
		`ModifiedDate` = \'{13}\',
		#`DeletedBy` = \'{14}\',
		#`DeletedDate` = \'{15}\',
		#`IsDeleted` = \'{16}\',
		#`Status` = \'{17}\',
		#`comments` = \'{18}\',
		`RenewedDate` = \'{19}\',
		`RenewedNum` = \'{20}\',
		`CompanyName` = \'{21}\',
		`CompanyAddress`= \'{22}\',
		`CompanyWebsite`= \'{23}\',
		`CompanyPhone`= \'{24}\',
		`AdType`= \'{25}\',
		`StartDate`= \'{26}\',
		`EndDate`= \'{27}\',
		`HappyDays`= \'{28}\',
		`StartHappyHour`= {29},
		`EndHappyHour`= {30},
		`Addresses`= \'{31}\',
		`Dictricts`= \'{32}\',
		`Cities`= \'{33}\'
		WHERE `ArticleID` = \'{1}\'  ';
	
	//status : 0 -> Deactivate;  1 ->Active; 2-> bad content
	const SQL_ACTIVE_SL_ARTICLE		= 'UPDATE `{0}`
		SET  		
		`Status` = \'{2}\'		
		WHERE `ArticleID` = \'{1}\'  ';
	
	const SQL_CREATE_TABLE_SL_ARTICLE		= 'CREATE TABLE `{0}` (
		
		`ArticleID` varchar(20),
		`Prefix` varchar(255),
		`Title` varchar(255),
		`FileName` varchar(255),
		`Content` ,
		`NotificationType` varchar(20),
		`Tags` ,
		`NumView` ,
		`NumComment` ,
		`CreatedBy` varchar(20),
		`CreatedDate` ,
		`ModifiedBy` varchar(20),
		`ModifiedDate` ,
		`DeletedBy` varchar(20),
		`DeletedDate` ,
		`IsDeleted` ,
		`Status` varchar(20),
		`comments` ,
		`RenewedDate` ,
		`RenewedNum` ,
		`CompanyName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
		`CompanyAddress` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
		`CompanyWebsite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
		`CompanyPhone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
		`AdType` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT,
		`StartDate` date DEFAULT NULL,
		`EndDate` date DEFAULT NULL,
		`HappyDays` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
		`StartHappyHour` time DEFAULT NULL,
		`EndHappyHour` time DEFAULT NULL,
		`Addresses` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
		`Dictricts` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
		`Cities` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
		PRIMARY KEY(ArticleID)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;';
	const SQL_CREATE_TABLE_SL_ARTICLE_TYPE_ID = 'CREATE TABLE `sl_article_type_id` (
		`ArticleTypeID` int(11) NOT NULL,
		`ArticleID` int(11) NOT NULL,
		PRIMARY KEY (`ArticleTypeID`,`ArticleID`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
		';
	#endregion   
	
	#region Variables
	var $_objConnection;
	#end region
	
	#region Contructors
	/**
	*  Phuong th?c kh?i t?o d?i tu?ng faq d?ng th?i t?o connection d?n db
	*
	* @param object $objConnection ??i tu?ng k?t n?i d?n db
			
	* @return void 
	*
	*/
	public function  Model_Article($objConnection)
	{
		$this->_objConnection = $objConnection;
		
	}
	#region
	
	#region Public Functions
	
	public function insert($title,$filename,$content,$notificationtype,$tags,$articletype,
		$createdby,$renewednum,$companyname,$companyAddress,$companyWebsite,$companyPhone,
		$adType,$startDate,$endDate,$happyDays,$startHappyHour,$endHappyHour,$addresses,
		$dictricts,$cities,$status)
	{
		$status = 1;
		$strTableName = self::TBL_SL_ARTICLE;
		$strSQL = global_common::prepareQuery(self::SQL_INSERT_SL_ARTICLE,
				array(self::TBL_SL_ARTICLE,
					null,global_common::escape_mysql_string($prefix),
					global_common::escape_mysql_string($title),global_common::escape_mysql_string($filename),
					global_common::escape_mysql_string($content),global_common::escape_mysql_string($notificationtype),
					global_common::escape_mysql_string($tags),					
					global_common::escape_mysql_string($numview),
					global_common::escape_mysql_string($numcomment),
					global_common::escape_mysql_string($createdby),global_common::nowSQL(),
					global_common::escape_mysql_string($createdby),global_common::nowSQL(),
					global_common::escape_mysql_string($deletedby),global_common::escape_mysql_string($deleteddate),
					global_common::escape_mysql_string($isdeleted),global_common::escape_mysql_string($status),
					global_common::escape_mysql_string($comments),global_common::nowSQL(),
					global_common::escape_mysql_string($renewednum),global_common::escape_mysql_string($companyname),
					global_common::escape_mysql_string($companyAddress),global_common::escape_mysql_string($companyWebsite),
					global_common::escape_mysql_string($companyPhone),global_common::escape_mysql_string($adType),
					global_common::formatDateTimeSQL($startDate),global_common::formatDateTimeSQL($endDate),
					global_common::escape_mysql_string($happyDays),
					$startHappyHour?'\''.$startHappyHour.'\'':'null',$endHappyHour?'\''.$endHappyHour.'\'':'null',
					global_common::escape_mysql_string($addresses),
					global_common::escape_mysql_string($dictricts),	global_common::escape_mysql_string($cities)
					));
		//global_common::writeLog('Error add sl_article:'.$strSQL,1);
		if (!global_common::ExecutequeryWithCheckExistedTable($strSQL,self::SQL_CREATE_TABLE_SL_ARTICLE,$this->_objConnection,$strTableName))
		{
			
			global_common::writeLog('Error add sl_article:'.$strSQL,1);
			return false;
		}	
		
		
		$articleID = global_common::getMaxValueofField(global_mapping::ArticleID,self::TBL_SL_ARTICLE);
		$strSQLValueType = '';
		
		foreach($articletype as $item){
			$strSQLValueType .= '(\''.$item.'\', \''.$articleID.'\'),';
			
		}
		$strSQLValueType = global_common::cutLast($strSQLValueType);
		
		$strSQL = global_common::prepareQuery(self::SQL_INSERT_SL_ARTICLE_TYPE_ID,
				array(self::TBL_SL_ARTICLE_TYPE_ID,$strSQLValueType));
		if (!global_common::ExecuteMultiqueryWithCheckExistedTable($strSQL,self::SQL_CREATE_TABLE_SL_ARTICLE_TYPE_ID,$this->_objConnection,self::TBL_SL_ARTICLE_TYPE_ID));
		{
			global_common::writeLog('Error add sl_article_type_id:'.$strSQL,1);
		}	
		return $articleID;
	}
	
	public function update($articleid,$prefix,$title,$filename,$articletype,$content,$notificationtype,$tags,
		$numview,$numcomment,$createdby,$createddate,$modifiedby,$modifieddate,$deletedby,$deleteddate,$isdeleted,
		$status,$comments,$reneweddate,$renewednum,$companyname,$companyAddress,$companyWebsite,$companyPhone,
		$adType,$startDate,$endDate,$happyDays,$startHappyHour,$endHappyHour,$addresses,$dictricts,$cities)
	{
		$strTableName = self::TBL_SL_ARTICLE;
		$strSQL = global_common::prepareQuery(self::SQL_UPDATE_SL_ARTICLE,
				array($strTableName,global_common::escape_mysql_string($articleid),global_common::escape_mysql_string($prefix),
					global_common::escape_mysql_string($title),global_common::escape_mysql_string($filename),
					global_common::escape_mysql_string($content),
					global_common::escape_mysql_string($notificationtype),global_common::escape_mysql_string($tags),
					global_common::escape_mysql_string($numview),global_common::escape_mysql_string($numcomment),
					global_common::escape_mysql_string($createdby),global_common::escape_mysql_string($createddate),
					global_common::escape_mysql_string($modifiedby),global_common::escape_mysql_string($modifieddate),
					global_common::escape_mysql_string($deletedby),global_common::escape_mysql_string($deleteddate),
					global_common::escape_mysql_string($isdeleted),global_common::escape_mysql_string($status),
					global_common::escape_mysql_string($comments),global_common::escape_mysql_string($reneweddate),
					global_common::escape_mysql_string($renewednum),global_common::escape_mysql_string($companyname),
					global_common::escape_mysql_string($companyAddress),global_common::escape_mysql_string($companyWebsite),
					global_common::escape_mysql_string($companyPhone),global_common::escape_mysql_string($adType),
					global_common::formatDateTimeSQL($startDate),global_common::formatDateTimeSQL($endDate),
					global_common::escape_mysql_string($happyDays),
					$startHappyHour?'\''.$startHappyHour.'\'':'null',$endHappyHour?'\''.$endHappyHour.'\'':'null',
					global_common::escape_mysql_string($addresses),
					global_common::escape_mysql_string($dictricts),
					global_common::escape_mysql_string($cities)
					));
		if (!global_common::ExecutequeryWithCheckExistedTable($strSQL,self::SQL_CREATE_TABLE_SL_ARTICLE,$this->_objConnection,$strTableName))
		{
			//echo $strSQL;
			global_common::writeLog('Error add sl_article:'.$strSQL,1);
			return false;
		}	
		
		
		$strSQL = global_common::prepareQuery(global_common::SQL_DELETE_BY_CONDITION,
				array(self::TBL_SL_ARTICLE_TYPE_ID,global_mapping::ArticleID,$articleid));
		
		if(global_common::ExecutequeryWithCheckExistedTable($strSQL,self::SQL_CREATE_TABLE_SL_ARTICLE_TYPE_ID,$this->_objConnection,self::TBL_SL_ARTICLE_TYPE_ID))
		{
			$strSQLValueType = '';
			
			foreach($articletype as $item){
				$strSQLValueType .= '(\''.$item.'\', \''.$articleid.'\'),';
				
			}
			$strSQLValueType = global_common::cutLast($strSQLValueType);
			
			$strSQL = global_common::prepareQuery(self::SQL_INSERT_SL_ARTICLE_TYPE_ID,
					array(self::TBL_SL_ARTICLE_TYPE_ID,$strSQLValueType));
			if (!global_common::ExecuteMultiqueryWithCheckExistedTable($strSQL,self::SQL_CREATE_TABLE_SL_ARTICLE_TYPE_ID,$this->_objConnection,self::TBL_SL_ARTICLE_TYPE_ID));
			{
				global_common::writeLog('Error add sl_article_type_id:'.$strSQL,1);
			}	
		}
		return $articleid;		
	}
	
	public function activeArticle($articleID, $isActivate)
	{
		$strTableName = self::TBL_SL_ARTICLE;
		$strSQL = global_common::prepareQuery(self::SQL_ACTIVE_SL_ARTICLE,array($strTableName,global_common::escape_mysql_string($articleID),$isActivate));
		//echo $strSQL;
		if (!global_common::ExecutequeryWithCheckExistedTable($strSQL,self::SQL_CREATE_TABLE_SL_ARTICLE,$this->_objConnection,$strTableName))
		{
			//echo $strSQL;
			global_common::writeLog('Error add sl_article:'.$strSQL,1);
			return false;
		}	
		return $articleID;	
	}
	
	public function refreshArticle($articleID,$currentUser)
	{
		$currentArticle = $this->getArticleByID($articleID);
		
		$renewNum = $currentArticle[global_mapping::RenewedNum];	
		$renewedDate = $currentArticle[global_mapping::RenewedDate];	
		$diffDay = global_common::datediff(global_common::getDate(),date('d-m-Y', strtotime($renewedDate)),d);
		if($diffDay > 0)
		{
			$renewNum = 0;
		}
		if($renewNum < self::NUM_REFRESH )
		{		
			$renewNum += 1;
			$title = $currentArticle[global_mapping::Title];
			$fileName = $currentArticle[global_mapping::FileName];
			$catalogueID = $currentArticle[global_mapping::CatalogueID];
			$content = $currentArticle[global_mapping::Content];
			$tags = $currentArticle[global_mapping::Tags];
			$createdBy = $currentArticle[global_mapping::CreatedBy];
			$createdDate = global_common::formatDateTimeVN($currentArticle[global_mapping::CreatedDate]);
			$modifiedBy = $currentUser[global_mapping::UserID];
			
			$renewedDate = global_common::nowSQL();
			
			$companyName = $currentArticle[global_mapping::CompanyName];
			$companyAddress = $currentArticle[global_mapping::CompanyAddress];
			$companyWebsite = $currentArticle[global_mapping::CompanyWebsite];
			$companyPhone = $currentArticle[global_mapping::CompanyPhone];
			
			$adType = $currentArticle[global_mapping::AdType];
			$startDate = global_common::formatDateTimeVN($currentArticle[global_mapping::StartDate]);
			$endDate = global_common::formatDateTimeVN($currentArticle[global_mapping::EndDate]);
			
			$happyDays = $currentArticle[global_mapping::HappyDays];
			$startHappyHour = $currentArticle[global_mapping::StartHappyHour];		
			$endHappyHour = $currentArticle[global_mapping::EndHappyHour];
			$addresses = $currentArticle[global_mapping::Addresses];
			$dictricts = $currentArticle[global_mapping::Dictricts];
			$cities = $currentArticle[global_mapping::Cities];
			
			$resultID = $this->update($articleID,null,$title,$fileName,$catalogueID, $content,null,$tags,$numView,$numComment,$createdBy,
					$createdDate,$modifiedBy,global_common::nowSQL(),null,null,0,null,null,$renewedDate,$renewNum,$companyName,
					$companyAddress,$companyWebsite,$companyPhone,$adType,$startDate,$endDate,$happyDays,
					$startHappyHour,$endHappyHour, $addresses,$dictricts,$cities);
			if (!$resultID)
			{
				//echo $strSQL;
				global_common::writeLog('Error refreshArticle sl_article:'.$articleID,1);
				return -1;
			}	
			return (self::NUM_REFRESH - $renewNum);
		}
		return -1;	
	}
	
	
	public function getArticleByID($objID,$selectField='*', $whereClause='') 
	{		
		$selectField = $selectField? $selectField : '*';
		
		if($whereClause)
		{
			$condition ='WHERE '.global_mapping::ArticleID.' = \''.$objID.'\' and '.$whereClause;	
		}
		else
		{
			$condition = 'WHERE '.global_mapping::ArticleID.' = \''.$objID.'\' ';	
		}
		
		
		$strSQL = global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
				array($selectField, self::TBL_SL_ARTICLE , $condition));
		//return $strSQL;
		$arrResult =$this->_objConnection->selectCommand($strSQL);		
		if(!$arrResult)
		{
			global_common::writeLog('get sl_article ByID:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		$arrResult[0][global_mapping::Content] = stripslashes($arrResult[0][global_mapping::Content]);
		//print_r($arrResult);
		return $arrResult[0];
	}
	
	public function getAllArticle($intPage = 0,$selectField='*',$whereClause='',$orderBy='') 
	{		
		$selectField = $selectField? $selectField : '*';
		if($whereClause)
		{
			$whereClause = ' WHERE '.$whereClause;
		}
		
		if($orderBy)
		{
			$orderBy .= ',';
		}
		$orderBy = ' ORDER BY '.$orderBy. 'ModifiedDate DESC';
		
		if($intPage>0)
		{
			$strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
					array($selectField, Model_Article::TBL_SL_ARTICLE ,							
						$whereClause.$orderBy .' limit '.(($intPage-1)* self::NUM_PER_PAGE).','.self::NUM_PER_PAGE));
		}
		else
		{
			$strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
					array($selectField, Model_Article::TBL_SL_ARTICLE ,							
						$whereClause.$orderBy ));
		}
		//echo '<br>SQL:'.$strSQL;
		$arrResult =$this->_objConnection->selectCommand($strSQL);		
		if(!$arrResult)
		{
			global_common::writeLog('get All sl_article:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		//print_r($arrResult);
		return $arrResult;
	}
	
	public function getListArticle($intPage,$orderBy='ArticleID', $whereClause)
	{		
		if($whereClause)
		{
			$whereClause='WHERE'+ $whereClause;						
		}
		if($orderBy)
		{
			$orderBy='ORDER BY'+ $orderBy;						
		}
		$strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE,array('*',
					self::TBL_SL_ARTICLE,$orderBy.' '.$whereClause.' limit '.(($intPage-1)* self::NUM_PER_PAGE).','.self::NUM_PER_PAGE));
		//echo 'sql:'.$strSQL;	
		$arrResult = $this->_objConnection->selectCommand($strSQL);
		//print_r($arrResult);
		$strHTML = '<table class="tbl-list">
				<thead>
				<td>ArticleID</td>
				<td>Prefix</td>
				<td>Title</td>
				<td>FileName</td>
				<td>ArticleType</td>
				<td>Content</td>
				<td>NotificationType</td>
				<td>Tags</td>
				<td>CatalogueID</td>
				<td>SectionID</td>
				<td>NumView</td>
				<td>NumComment</td>
				<td>CreatedBy</td>
				<td>CreatedDate</td>
				<td>ModifiedBy</td>
				<td>ModifiedDate</td>
				<td>DeletedBy</td>
				<td>DeletedDate</td>
				<td>IsDeleted</td>
				<td>Status</td>
				<td>comments</td>
				<td>RenewedDate</td>
				<td>RenewedNum</td>
				</thead>
				<tbody>';
		$icount = count($arrmenu);
		for($i=0;$i<$icount;$i++)
		{
			$strHTML.='<tr class="'.($i%2==0?'even':'odd').'">
					<td>'.$arrResult[$i]['ArticleID'].'</td>
					<td>'.$arrResult[$i]['Prefix'].'</td>
					<td>'.$arrResult[$i]['Title'].'</td>
					<td>'.$arrResult[$i]['FileName'].'</td>
					<td>'.$arrResult[$i]['ArticleType'].'</td>
					<td>'.$arrResult[$i]['Content'].'</td>
					<td>'.$arrResult[$i]['NotificationType'].'</td>
					<td>'.$arrResult[$i]['Tags'].'</td>
					<td>'.$arrResult[$i]['CatalogueID'].'</td>
					<td>'.$arrResult[$i]['SectionID'].'</td>
					<td>'.$arrResult[$i]['NumView'].'</td>
					<td>'.$arrResult[$i]['NumComment'].'</td>
					<td>'.$arrResult[$i]['CreatedBy'].'</td>
					<td>'.$arrResult[$i]['CreatedDate'].'</td>
					<td>'.$arrResult[$i]['ModifiedBy'].'</td>
					<td>'.$arrResult[$i]['ModifiedDate'].'</td>
					<td>'.$arrResult[$i]['DeletedBy'].'</td>
					<td>'.$arrResult[$i]['DeletedDate'].'</td>
					<td><input type="checkbox" onclick="_objArticle.showHide(\''.$arrResult[$i]['ArticleID'].'\',\''.$arrResult[$i]['name'].'\',this)" '.($arrResult[$i]['IsDeleted']?'':'checked=checked').' /></td>
					<td>'.$arrResult[$i]['Status'].'</td>
					<td>'.$arrResult[$i]['comments'].'</td>
					<td>'.$arrResult[$i]['RenewedDate'].'</td>
					<td class="lastCell">'.$arrResult[$i]['RenewedNum'].'</td>
					</tr>';
		}
		$strHTML.='</tbody></table>';
		
		$strHTML .= "<div>".global_common::getPagingHTMLByNum($intPage,self::NUM_PER_PAGE,global_common::getTotalRecord(self::TBL_SL_ARTICLE,$this->_objConnection),
				"_objMenu.changePage")."</div>";
		return $strHTML;
	}
	
	/**
	 * This is method getTopArticleByType. For show article type list page
	 * Usage: Load default articles on font end
	 *
	 * @param mixed $listTypeID This is a description
	 * @param mixed $limitRow This is a description
	 * @param mixed $selectField This is a description
	 * @return mixed This is the return value description
	 *
	 */
	public function getTopArticleByType($listTypeID,$topRow, $selectField='*',$whereClause='',$orderBy='') 
	{		
		$arrTypeID = global_common::splitString($listTypeID);
		$strQueryIN = global_common::convertToQueryIN($arrTypeID);
		
		$arrArticleID = self::getArticleIDsByTypes($listTypeID);
		
		$strQueryArticleIN = global_common::convertToQueryIN($arrArticleID);
		
		$selectField = $selectField? $selectField : '*';
		
		if($orderBy)
		{
			$orderBy = ' ORDER BY '.$orderBy. ', '.global_mapping::RenewedDate.' DESC';
		}
		else
		{
			$orderBy = ' ORDER BY  '.global_mapping::RenewedDate.' DESC';
		}
		
		if($whereClause)
		{
			$condition = 'WHERE ('.global_mapping::IsDeleted.' IS NULL or '.global_mapping::IsDeleted.' = \'0\') and `'.
				global_mapping::ArticleID.'` IN ('.$strQueryArticleIN.') and '.$whereClause;	
		}
		else
		{
			$condition = 'WHERE ('.global_mapping::IsDeleted.' IS NULL or '.global_mapping::IsDeleted.' = \'0\') and `'.
				global_mapping::ArticleID.'` IN ('.$strQueryArticleIN.')';	
		}
		
		if(!$topRow)
		{
			
			$topRow = global_common::DEFAULT_TOP_ITEMS;
		}
		$strSQL = global_common::prepareQuery(global_common::SQL_SELECT_FREE_LIMIT, 
				array($selectField, self::TBL_SL_ARTICLE, $condition.$orderBy,0,$topRow ));					
		//echo $strSQL;
		$arrResult = self::getArticlesFromDB($strSQL);
		//print_r($arrResult);
		return $arrResult;
	}
	
	
	public function searchArticle($intPage, $listTypeID, $keyword, $selectField='*',$whereClause='',$orderBy='') 
	{		
		if($listTypeID)
		{
			$arrTypeID = global_common::splitString($listTypeID);
			$strQueryIN = global_common::convertToQueryIN($arrTypeID);			
			$arrArticleID = self::getArticleIDsByTypes($listTypeID);			
			$strQueryArticleIN = global_common::convertToQueryIN($arrArticleID);
		}
		$selectField = $selectField? $selectField : '*';
		
		if($orderBy)
		{
			$orderBy = ' ORDER BY '.$orderBy. ', ModifiedDate DESC';
		}
		else
		{
			$orderBy = ' ORDER BY  ModifiedDate DESC';
		}
		if($whereClause)
		{
			$condition = 'WHERE ('.global_mapping::IsDeleted.' IS NULL or '.global_mapping::IsDeleted.' = \'0\') '.
				($keyword?(' and `'.global_mapping::Title .'` LIKE \'%'.$keyword.'%\' '):'').
				($strQueryArticleIN? ('and `'.global_mapping::ArticleID.'` IN ('.$strQueryArticleIN.') '):''). $whereClause;	
		}
		else
		{
			$condition = 'WHERE ('.global_mapping::IsDeleted.' IS NULL or '.global_mapping::IsDeleted.' = \'0\') '.
				($keyword?(' and `'.global_mapping::Title .'` LIKE \'%'.$keyword.'%\''):'').
				($strQueryArticleIN? ('and `'.global_mapping::ArticleID.'` IN ('.$strQueryArticleIN.') '):'');	
		}
		
		if($intPage>0)
		{
			$strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
					array($selectField, Model_Article::TBL_SL_ARTICLE ,							
						$condition.$orderBy .' limit '.(($intPage-1)* self::NUM_PER_PAGE).','.self::NUM_PER_PAGE));
		}
		else
		{
			$strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
					array($selectField, Model_Article::TBL_SL_ARTICLE ,							
						$condition.$orderBy ));
		}
		
		//echo $condition;
		//echo $strSQL;
		//return $strSQL;
		$arrResult = self::getArticlesFromDB($strSQL);
		//print_r($arrResult);
		return $arrResult;
	}
	
	/**
	 * Get Article with UserID and Status Article. Using on Profile Page
	 *
	 * @param mixed $userID This is a description
	 * @param mixed $status This is a description
	 * @param mixed $topRow This is a description
	 * @param mixed $selectField This is a description
	 * @param mixed $whereClause This is a description
	 * @param mixed $orderBy This is a description
	 * @return mixed This is the return value description
	 *
	 */
	public function getArticleByUser($userID,$status, $topRow, $selectField='*',$whereClause='',$orderBy='') 
	{		
		$selectField = $selectField? $selectField : '*';
		if($orderBy)
		{
			$orderBy = ',';
		}
		$orderBy = ' ORDER BY '.$orderBy. 'ModifiedDate DESC';
		
		if($whereClause)
		{
			$condition = 'WHERE ('.global_mapping::IsDeleted.' IS NULL or '.global_mapping::IsDeleted.' = \'0\') and `'.
				global_mapping::CreatedBy.'` = \''.$userID.'\' and `'.
				global_mapping::Status.'` = \''.$status.'\' and '.$whereClause;	
		}
		else
		{
			$condition = 'WHERE ('.global_mapping::IsDeleted.' IS NULL or '.global_mapping::IsDeleted.' = \'0\') and `'.
				global_mapping::CreatedBy.'` = \''.$userID.'\' and `'.
				global_mapping::Status.'` = \''.$status.'\' ';	
		}
		//return $topRow;
		if(!$topRow)
		{
			
			$topRow = global_common::DEFAULT_PAGE_SIZE;
		}
		$strSQL = global_common::prepareQuery(global_common::SQL_SELECT_FREE_LIMIT, 
				array($selectField, self::TBL_SL_ARTICLE, $condition.$orderBy,0,$topRow ));					
		//return $strSQL;
		$arrResult = self::getArticlesFromDB($strSQL);
		//print_r($arrResult);
		return $arrResult;
	}
	
	/**
	 * Get Aticles By Type (Categories)
	 *
	 * @param mixed $articleTypeIDs This is a description
	 * @return mixed This is the return value description
	 *
	 */
	private function getArticleIDsByTypes($articleTypeIDs)
	{
		$arrTypeID = global_common::splitString($articleTypeIDs);
		$strQueryIN = global_common::convertToQueryIN($arrTypeID);
		$whereClause = 'WHERE '.global_mapping::ArticleTypeID.' IN ('.$strQueryIN.')';
		$strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE,array('*',
					self::TBL_SL_ARTICLE_TYPE_ID,$whereClause));
		//echo $strSQL;
		$articleTypes =  $this->_objConnection->selectCommand($strSQL);	
		return global_common::getArrayColumn($articleTypes,global_mapping::ArticleID);
	}
	
	/**
	 * Get Aticles By Type (Categories)
	 *
	 * @param mixed $articleTypeIDs This is a description
	 * @return mixed This is the return value description
	 *
	 */
	public function getArticleTypesByID($articleID)
	{
		$whereClause = 'WHERE '.global_mapping::ArticleID.' = \''.$articleID.'\'';
		$strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE,array('*',
					self::TBL_SL_ARTICLE_TYPE_ID,$whereClause));
		//return $strSQL;
		$articleTypes =  $this->_objConnection->selectCommand($strSQL);	
		return global_common::getArrayColumn($articleTypes,global_mapping::ArticleTypeID);
	}
	
	/**
	 * Get Article with input is sql script
	 *
	 * @param mixed $strSQL This is a description
	 * @return mixed This is the return value description
	 *
	 */
	private function getArticlesFromDB($strSQL)
	{
		$arrResult = $this->_objConnection->selectCommand($strSQL);
		if(!$arrResult)
		{
			global_common::writeLog('get sl_article from DB:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		$count = count($arrResult);
		for($i=0; $i < $count; $i++)
		{
			//print_r($arrResult[$i]);
			$arrResult[$i][global_mapping::Content] = stripslashes($arrResult[$i][global_mapping::Content]);
		}
		return global_common::mergeUserInfo($arrResult);	
	}
	
	#endregion   
}
?>
