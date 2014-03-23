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
 * Implementations of slresetpasswords represent a ResetPassword
 * </summary>
 */
class Model_ResetPassword
{		   
	#region PRESERVE ExtraMethods For ResetPassword
	#endregion
    #region Contants	
    const ACT_ADD							= 10;
    const ACT_UPDATE						= 11;
    const ACT_DELETE						= 12;
    const ACT_CHANGE_PAGE					= 13;
    const ACT_SHOW_EDIT                     = 14;
    const ACT_GET                           = 15;
    const NUM_PER_PAGE                      = 15;
    
    const TBL_SL_RESET_PASSWORD			            = 'sl_reset_password';

	const SQL_INSERT_SL_RESET_PASSWORD		= 'INSERT INTO `{0}`
		(
			ID,
			UserID,
			CreatedDate,
			ExpireDate,
			ResetDate,
			IsDelete
        )
        VALUES (
			\'{1}\', \'{2}\', \'{3}\', \'{4}\', \'{5}\', \'{6}\'
        );';
        
	const SQL_UPDATE_SL_RESET_PASSWORD		= 'UPDATE `{0}`
		SET  
			`ID` = \'{1}\',
			`UserID` = \'{2}\',
			`CreatedDate` = \'{3}\',
			`ExpireDate` = \'{4}\',
			`ResetDate` = \'{5}\',
			`IsDelete` = \'{6}\'
		WHERE `ID` = \'{1}\'  ';
		   

    const SQL_CREATE_TABLE_SL_RESET_PASSWORD		= 'CREATE TABLE `{0}` (

			`ID` varchar(255),
			`UserID` ,
			`CreatedDate` ,
			`ExpireDate` ,
			`ResetDate` ,
			`IsDelete` ,
			PRIMARY KEY(ID)
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
	public function  Model_ResetPassword($objConnection)
	{
		$this->_objConnection = $objConnection;
		
	}
    #region
    
    #region Public Functions
    
    public function insert($userid,$createddate,$expiredate,$resetdate,$isdelete)
	{
		//echo global_common::EXPIRE_RESET_DAYS;
		//echo global_common::addDays(global_common::nowSQL(),global_common::EXPIRE_RESET_DAYS);
		$guid =  uniqid();
		
		$strTableName = self::TBL_SL_RESET_PASSWORD;
		$strSQL = global_common::prepareQuery(self::SQL_INSERT_SL_RESET_PASSWORD,
				array(self::TBL_SL_RESET_PASSWORD,$guid,
				global_common::escape_mysql_string($userid),
				global_common::nowSQL(),
					global_common::addDays(global_common::nowSQL(),global_common::RESET_EXPIRE_DAYS),
				null,
				0
				));
		
		if (!global_common::ExecutequeryWithCheckExistedTable($strSQL,self::SQL_CREATE_TABLE_SL_RESET_PASSWORD,$this->_objConnection,$strTableName))
		{
			//echo $strSQL;
			global_common::writeLog('Error add sl_reset_password:'.$strSQL,1);
			return false;
		}	
		return $guid;
		
	}
    
    public function update($id,$userid,$createddate,$expiredate,$resetdate,$isdelete)
	{
		$strTableName = self::TBL_SL_RESET_PASSWORD;
		$strSQL = global_common::prepareQuery(self::SQL_UPDATE_SL_RESET_PASSWORD,
				array($strTableName,global_common::escape_mysql_string($id),global_common::escape_mysql_string($userid),global_common::escape_mysql_string($createddate),global_common::escape_mysql_string($expiredate),global_common::escape_mysql_string($resetdate),global_common::escape_mysql_string($isdelete) ));
		
		if (!global_common::ExecutequeryWithCheckExistedTable($strSQL,self::SQL_CREATE_TABLE_SL_RESET_PASSWORD,$this->_objConnection,$strTableName))
		{
			//echo $strSQL;
			global_common::writeLog('Error add sl_reset_password:'.$strSQL,1);
			return false;
		}	
		return $intNewID;		
	}
    
    public function getResetPasswordByID($objID,$selectField='*') 
	{		
		$strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
				array($selectField, self::TBL_SL_RESET_PASSWORD ,							
					'WHERE ID = \''.$objID.'\' '));
		//echo '<br>SQL:'.$strSQL;
		$arrResult =$this->_objConnection->selectCommand($strSQL);		
		if(!$arrResult)
		{
			global_common::writeLog('get sl_reset_password ByID:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		//print_r($arrResult);
		return $arrResult[0];
	}
    
    public function getAllResetPassword($intPage = 0,$selectField='*',$whereClause='',$orderBy='') 
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
				array($selectField, Model_ResetPassword::TBL_SL_RESET_PASSWORD ,							
					$whereClause.$orderBy .' limit '.(($intPage-1)* self::NUM_PER_PAGE).','.self::NUM_PER_PAGE));
        }
        else
        {
            $strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
				array($selectField, Model_ResetPassword::TBL_SL_RESET_PASSWORD ,							
					$whereClause.$orderBy ));
        }
		//echo '<br>SQL:'.$strSQL;
		$arrResult =$this->_objConnection->selectCommand($strSQL);		
		if(!$arrResult)
		{
			global_common::writeLog('get All sl_reset_password:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		//print_r($arrResult);
		return $arrResult;
	}
    
    public function getListResetPassword($intPage,$orderBy='ID', $whereClause)
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
					self::TBL_SL_RESET_PASSWORD,$orderBy.' '.$whereClause.' limit '.(($intPage-1)* self::NUM_PER_PAGE).','.self::NUM_PER_PAGE));
		//echo 'sql:'.$strSQL;	
		$arrResult = $this->_objConnection->selectCommand($strSQL);
		//print_r($arrResult);
		$strHTML = '<table class="tbl-list">
                    <thead>
						<td>ID</td>
						<td>UserID</td>
						<td>CreatedDate</td>
						<td>ExpireDate</td>
						<td>ResetDate</td>
						<td>IsDelete</td>
                    </thead>
                    <tbody>';
		$icount = count($arrmenu);
		for($i=0;$i<$icount;$i++)
		{
			$strHTML.='<tr class="'.($i%2==0?'even':'odd').'">
						<td>'.$arrResult[$i]['ID'].'</td>
						<td>'.$arrResult[$i]['UserID'].'</td>
						<td>'.$arrResult[$i]['CreatedDate'].'</td>
						<td>'.$arrResult[$i]['ExpireDate'].'</td>
						<td>'.$arrResult[$i]['ResetDate'].'</td>
						<td class="lastCell"><input type="checkbox" onclick="_objResetPassword.showHide(\''.$arrResult[$i]['ID'].'\',\''.$arrResult[$i]['name'].'\',this)" '.($arrResult[$i]['IsDeleted']?'':'checked=checked').' /></td>
					  </tr>';
		}
		$strHTML.='</tbody></table>';
		
		$strHTML .= "<div>".global_common::getPagingHTMLByNum($intPage,self::NUM_PER_PAGE,global_common::getTotalRecord(self::TBL_SL_RESET_PASSWORD,$this->_objConnection),
				"_objMenu.changePage")."</div>";
		return $strHTML;
	}
    
    #endregion   
}
?>