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
 * Implementations of slcommentbads represent a CommentBad
 * </summary>
 */
class Model_CommentBad
{		   
	#region PRESERVE ExtraMethods For CommentBad
	#endregion
    #region Contants	
    const ACT_ADD							= 10;
    const ACT_UPDATE						= 11;
    const ACT_DELETE						= 12;
    const ACT_CHANGE_PAGE					= 13;
    const ACT_SHOW_EDIT                     = 14;
    const ACT_GET                           = 15;
    const NUM_PER_PAGE                      = 15;
    
    const TBL_SL_COMMENT_BAD			            = 'sl_comment_bad';

	const SQL_INSERT_SL_COMMENT_BAD		= 'INSERT INTO `{0}`
		(
			CommnentID,
			Description,
			ReportedBy,
			ReportedDate,
			CreatedBy,
			CreatedDate,
			ModifiedBy,
			ModifiedDate,
			DeletedBy,
			DeletedDate,
			IsDeleted,
			Status
        )
        VALUES (
			\'{1}\', \'{2}\', \'{3}\', \'{4}\', \'{5}\', \'{6}\', \'{7}\', \'{8}\', \'{9}\', \'{10}\', \'{11}\', \'{12}\'
        );';
        
	const SQL_UPDATE_SL_COMMENT_BAD		= 'UPDATE `{0}`
		SET  
			`CommnentID` = \'{1}\',
			`Description` = \'{2}\',
			`ReportedBy` = \'{3}\',
			`ReportedDate` = \'{4}\',
			`CreatedBy` = \'{5}\',
			`CreatedDate` = \'{6}\',
			`ModifiedBy` = \'{7}\',
			`ModifiedDate` = \'{8}\',
			`DeletedBy` = \'{9}\',
			`DeletedDate` = \'{10}\',
			`IsDeleted` = \'{11}\',
			`Status` = \'{12}\'
		WHERE `CommnentID` = \'{1}\'  ';
		   

    const SQL_CREATE_TABLE_SL_COMMENT_BAD		= 'CREATE TABLE `{0}` (

			`CommnentID` varchar(20),
			`Description` ,
			`ReportedBy` varchar(20),
			`ReportedDate` ,
			`CreatedBy` varchar(20),
			`CreatedDate` ,
			`ModifiedBy` varchar(20),
			`ModifiedDate` ,
			`DeletedBy` varchar(20),
			`DeletedDate` ,
			`IsDeleted` ,
			`Status` varchar(20),
			PRIMARY KEY(CommnentID)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;';
	
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
	public function  Model_CommentBad($objConnection)
	{
		$this->_objConnection = $objConnection;
		
	}
    #region
    
    #region Public Functions
    
    public function insert( $description,$reportedby,$reporteddate,$createdby,$createddate,$modifiedby,$modifieddate,$deletedby,$deleteddate,$isdeleted,$status)
	{
		$intID = global_common::getMaxID(self::TBL_SL_COMMENT_BAD);
		
		$strTableName = self::TBL_SL_COMMENT_BAD;
		$strSQL = global_common::prepareQuery(self::SQL_INSERT_SL_COMMENT_BAD,
				array(self::TBL_SL_COMMENT_BAD,$intID,global_common::escape_mysql_string($description),global_common::escape_mysql_string($reportedby),global_common::escape_mysql_string($reporteddate),global_common::escape_mysql_string($createdby),global_common::escape_mysql_string($createddate),global_common::escape_mysql_string($modifiedby),global_common::escape_mysql_string($modifieddate),global_common::escape_mysql_string($deletedby),global_common::escape_mysql_string($deleteddate),global_common::escape_mysql_string($isdeleted),global_common::escape_mysql_string($status)));
		
		if (!global_common::ExecutequeryWithCheckExistedTable($strSQL,self::SQL_CREATE_TABLE_SL_COMMENT_BAD,$this->_objConnection,$strTableName))
		{
			//echo $strSQL;
			global_common::writeLog('Error add sl_comment_bad:'.$strSQL,1);
			return false;
		}	
		return $intID;
		
	}
    
    public function update($commnentid,$description,$reportedby,$reporteddate,$createdby,$createddate,$modifiedby,$modifieddate,$deletedby,$deleteddate,$isdeleted,$status)
	{
		$strTableName = self::TBL_SL_COMMENT_BAD;
		$strSQL = global_common::prepareQuery(self::SQL_UPDATE_SL_COMMENT_BAD,
				array($strTableName,global_common::escape_mysql_string($commnentid),global_common::escape_mysql_string($description),global_common::escape_mysql_string($reportedby),global_common::escape_mysql_string($reporteddate),global_common::escape_mysql_string($createdby),global_common::escape_mysql_string($createddate),global_common::escape_mysql_string($modifiedby),global_common::escape_mysql_string($modifieddate),global_common::escape_mysql_string($deletedby),global_common::escape_mysql_string($deleteddate),global_common::escape_mysql_string($isdeleted),global_common::escape_mysql_string($status) ));
		
		if (!global_common::ExecutequeryWithCheckExistedTable($strSQL,self::SQL_CREATE_TABLE_SL_COMMENT_BAD,$this->_objConnection,$strTableName))
		{
			//echo $strSQL;
			global_common::writeLog('Error add sl_comment_bad:'.$strSQL,1);
			return false;
		}	
		return $intNewID;		
	}
    
    public function getCommentBadByID($objID,$selectField='*') 
	{		
		$strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
				array($selectField, self::TBL_SL_COMMENT_BAD ,							
					'WHERE CommnentID = \''.$objID.'\' '));
		//echo '<br>SQL:'.$strSQL;
		$arrResult =$this->_objConnection->selectCommand($strSQL);		
		if(!$arrResult)
		{
			global_common::writeLog('get sl_comment_bad ByID:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		//print_r($arrResult);
		return $arrResult[0];
	}
    
    public function getAllCommentBad($intPage = 0,$selectField='*',$whereClause='',$orderBy='') 
	{		
        if($whereClause)
		{
			$whereClause = ' WHERE '.$whereClause;
		}
		
		if($orderBy)
		{
			$orderBy = ' ORDER BY '.$orderBy;
		}
        if($intPage>0)
        {
		    $strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
				array($selectField, Model_CommentBad::TBL_SL_COMMENT_BAD ,							
					$whereClause.$orderBy .' limit '.(($intPage-1)* self::NUM_PER_PAGE).','.self::NUM_PER_PAGE));
        }
        else
        {
            $strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
				array($selectField, Model_CommentBad::TBL_SL_COMMENT_BAD ,							
					$whereClause.$orderBy ));
        }
		//echo '<br>SQL:'.$strSQL;
		$arrResult =$this->_objConnection->selectCommand($strSQL);		
		if(!$arrResult)
		{
			global_common::writeLog('get All sl_comment_bad:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		//print_r($arrResult);
		return $arrResult;
	}
    
    public function getListCommentBad($intPage,$orderBy='CommnentID', $whereClause)
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
					self::TBL_SL_COMMENT_BAD,$orderBy.' '.$whereClause.' limit '.(($intPage-1)* self::NUM_PER_PAGE).','.self::NUM_PER_PAGE));
		//echo 'sql:'.$strSQL;	
		$arrResult = $this->_objConnection->selectCommand($strSQL);
		//print_r($arrResult);
		$strHTML = '<table class="tbl-list">
                    <thead>
						<td>CommnentID</td>
						<td>Description</td>
						<td>ReportedBy</td>
						<td>ReportedDate</td>
						<td>CreatedBy</td>
						<td>CreatedDate</td>
						<td>ModifiedBy</td>
						<td>ModifiedDate</td>
						<td>DeletedBy</td>
						<td>DeletedDate</td>
						<td>IsDeleted</td>
						<td>Status</td>
                    </thead>
                    <tbody>';
		$icount = count($arrmenu);
		for($i=0;$i<$icount;$i++)
		{
			$strHTML.='<tr class="'.($i%2==0?'even':'odd').'">
						<td>'.$arrResult[$i]['CommnentID'].'</td>
						<td>'.$arrResult[$i]['Description'].'</td>
						<td>'.$arrResult[$i]['ReportedBy'].'</td>
						<td>'.$arrResult[$i]['ReportedDate'].'</td>
						<td>'.$arrResult[$i]['CreatedBy'].'</td>
						<td>'.$arrResult[$i]['CreatedDate'].'</td>
						<td>'.$arrResult[$i]['ModifiedBy'].'</td>
						<td>'.$arrResult[$i]['ModifiedDate'].'</td>
						<td>'.$arrResult[$i]['DeletedBy'].'</td>
						<td>'.$arrResult[$i]['DeletedDate'].'</td>
						<td><input type="checkbox" onclick="_objCommentBad.showHide(\''.$arrResult[$i]['CommnentID'].'\',\''.$arrResult[$i]['name'].'\',this)" '.($arrResult[$i]['IsDeleted']?'':'checked=checked').' /></td>
						<td class="lastCell">'.$arrResult[$i]['Status'].'</td>
					  </tr>';
		}
		$strHTML.='</tbody></table>';
		
		$strHTML .= "<div>".global_common::getPagingHTMLByNum($intPage,self::NUM_PER_PAGE,global_common::getTotalRecord(self::TBL_SL_COMMENT_BAD,$this->_objConnection),
				"_objMenu.changePage")."</div>";
		return $strHTML;
	}
    
    #endregion   
}
?>
