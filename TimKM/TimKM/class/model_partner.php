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
 * Implementations of slpartners represent a Partner
 * </summary>
 */
class Model_Partner
{		   
	#region PRESERVE ExtraMethods For Partner
	#endregion
    #region Contants	
    const ACT_ADD							= 10;
    const ACT_UPDATE						= 11;
    const ACT_DELETE						= 12;
    const ACT_CHANGE_PAGE					= 13;
    const ACT_SHOW_EDIT                     = 14;
    const ACT_GET                           = 15;
    const NUM_PER_PAGE                      = 15;  
    
    const TBL_SL_PARTNER			            = 'sl_partner';

	const SQL_INSERT_SL_PARTNER		= 'INSERT INTO `{0}`
		(
			`PartnerID`,
			`UserID`,
			`PartnerName`,
			`Company`,
			`Address1`,
			`AddressName1`,
			`Address2`,
			`AddressName2`,
			`Address3`,
			`AddressName3`,
			`Address4`,
			`AddressName4`,
			`Address5`,
			`AddressName5`,
			`Email1`,
			`EmailName1`,
			`Email2`,
			`EmailName2`,
			`Email3`,
			`EmailName3`,
			`Email4`,
			`EmailName4`,
			`Email5`,
			`EmailName5`,
			`Phone1`,
			`PhoneName1`,
			`Phone2`,
			`PhoneName2`,
			`Phone3`,
			`PhoneName3`,
			`Phone4`,
			`PhoneName4`,
			`Phone5`,
			`PhoneName5`,
			`Fax1`,
			`FaxName1`,
			`Fax2`,
			`FaxName2`,
			`Fax3`,
			`FaxName3`,
			`Fax4`,
			`FaxName4`,
			`Fax5`,
			`FaxName5`,
			`Website1`,
			`WebsiteName1`,
			`Website2`,
			`WebsiteName2`,
			`Website3`,
			`WebsiteName3`,
			`Website4`,
			`WebsiteName4`,
			`Website5`,
			`WebsiteName5`,
			`TaxNumber`,
			`AccountNumber`,
			`CreatedBy`,
			`CreatedDate`,
			`ModifiedBy`,
			`ModifiedDate`,
			`DeletedBy`,
			`DeletedDate`,
			`Status`,
			`IsDeleted`
        )
        VALUES (
			\'{1}\', \'{2}\', \'{3}\', \'{4}\', \'{5}\', \'{6}\', \'{7}\', \'{8}\', \'{9}\', \'{10}\', \'{11}\', \'{12}\', \'{13}\', \'{14}\', \'{15}\', \'{16}\', \'{17}\', \'{18}\', \'{19}\', \'{20}\', \'{21}\', \'{22}\', \'{23}\', \'{24}\', \'{25}\', \'{26}\', \'{27}\', \'{28}\', \'{29}\', \'{30}\', \'{31}\', \'{32}\', \'{33}\', \'{34}\', \'{35}\', \'{36}\', \'{37}\', \'{38}\', \'{39}\', \'{40}\', \'{41}\', \'{42}\', \'{43}\', \'{44}\', \'{45}\', \'{46}\', \'{47}\', \'{48}\', \'{49}\', \'{50}\', \'{51}\', \'{52}\', \'{53}\', \'{54}\', \'{55}\', \'{56}\', \'{57}\', \'{58}\', \'{59}\', \'{60}\', \'{61}\', \'{62}\', \'{63}\', \'{64}\'
        );';
        
	const SQL_UPDATE_SL_PARTNER		= 'UPDATE `{0}`
		SET  
			`UserID` = \'{2}\',
			`PartnerName` = \'{3}\',
			`Company` = \'{4}\',
			`Address1` = \'{5}\',
			`AddressName1` = \'{6}\',
			`Address2` = \'{7}\',
			`AddressName2` = \'{8}\',
			`Address3` = \'{9}\',
			`AddressName3` = \'{10}\',
			`Address4` = \'{11}\',
			`AddressName4` = \'{12}\',
			`Address5` = \'{13}\',
			`AddressName5` = \'{14}\',
			`Email1` = \'{15}\',
			`EmailName1` = \'{16}\',
			`Email2` = \'{17}\',
			`EmailName2` = \'{18}\',
			`Email3` = \'{19}\',
			`EmailName3` = \'{20}\',
			`Email4` = \'{21}\',
			`EmailName4` = \'{22}\',
			`Email5` = \'{23}\',
			`EmailName5` = \'{24}\',
			`Phone1` = \'{25}\',
			`PhoneName1` = \'{26}\',
			`Phone2` = \'{27}\',
			`PhoneName2` = \'{28}\',
			`Phone3` = \'{29}\',
			`PhoneName3` = \'{30}\',
			`Phone4` = \'{31}\',
			`PhoneName4` = \'{32}\',
			`Phone5` = \'{33}\',
			`PhoneName5` = \'{34}\',
			`Fax1` = \'{35}\',
			`FaxName1` = \'{36}\',
			`Fax2` = \'{37}\',
			`FaxName2` = \'{38}\',
			`Fax3` = \'{39}\',
			`FaxName3` = \'{40}\',
			`Fax4` = \'{41}\',
			`FaxName4` = \'{42}\',
			`Fax5` = \'{43}\',
			`FaxName5` = \'{44}\',
			`Website1` = \'{45}\',
			`WebsiteName1` = \'{46}\',
			`Website2` = \'{47}\',
			`WebsiteName2` = \'{48}\',
			`Website3` = \'{49}\',
			`WebsiteName3` = \'{50}\',
			`Website4` = \'{51}\',
			`WebsiteName4` = \'{52}\',
			`Website5` = \'{53}\',
			`WebsiteName5` = \'{54}\',
			`TaxNumber` = \'{55}\',
			`AccountNumber` = \'{56}\',
			#`CreatedBy` = \'{57}\',
			#`CreatedDate` = \'{58}\',
			`ModifiedBy` = \'{59}\',
			`ModifiedDate` = \'{60}\'
			#`DeletedBy` = \'{61}\',
			#`DeletedDate` = \'{62}\',
			#`Status` = \'{63}\',
			#`IsDeleted` = \'{64}\'
		WHERE `PartnerID` = \'{1}\'  ';
		   

    const SQL_CREATE_TABLE_SL_PARTNER		= 'CREATE TABLE `{0}` (

			`PartnerID` ,
			`UserID` ,
			`PartnerName` varchar(255),
			`Company` varchar(255),
			`Address1` varchar(255),
			`AddressName1` varchar(255),
			`Address2` varchar(255),
			`AddressName2` varchar(255),
			`Address3` varchar(255),
			`AddressName3` varchar(255),
			`Address4` varchar(255),
			`AddressName4` varchar(255),
			`Address5` varchar(255),
			`AddressName5` varchar(255),
			`Email1` varchar(255),
			`EmailName1` varchar(255),
			`Email2` varchar(255),
			`EmailName2` varchar(255),
			`Email3` varchar(255),
			`EmailName3` varchar(255),
			`Email4` varchar(255),
			`EmailName4` varchar(255),
			`Email5` varchar(255),
			`EmailName5` varchar(255),
			`Phone1` varchar(20),
			`PhoneName1` varchar(255),
			`Phone2` varchar(20),
			`PhoneName2` varchar(255),
			`Phone3` varchar(20),
			`PhoneName3` varchar(255),
			`Phone4` varchar(20),
			`PhoneName4` varchar(255),
			`Phone5` varchar(20),
			`PhoneName5` varchar(255),
			`Fax1` varchar(20),
			`FaxName1` varchar(255),
			`Fax2` varchar(20),
			`FaxName2` varchar(255),
			`Fax3` varchar(20),
			`FaxName3` varchar(255),
			`Fax4` varchar(20),
			`FaxName4` varchar(255),
			`Fax5` varchar(20),
			`FaxName5` varchar(255),
			`Website1` varchar(255),
			`WebsiteName1` varchar(255),
			`Website2` varchar(255),
			`WebsiteName2` varchar(255),
			`Website3` varchar(255),
			`WebsiteName3` varchar(255),
			`Website4` varchar(255),
			`WebsiteName4` varchar(255),
			`Website5` varchar(255),
			`WebsiteName5` varchar(255),
			`TaxNumber` varchar(50),
			`AccountNumber` varchar(50),
			`CreatedBy` varchar(20),
			`CreatedDate` ,
			`ModifiedBy` varchar(20),
			`ModifiedDate` ,
			`DeletedBy` varchar(20),
			`DeletedDate` ,
			`Status` varchar(20),
			`IsDeleted` ,
			PRIMARY KEY(PartnerID)
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
	public function  Model_Partner($objConnection)
	{
		$this->_objConnection = $objConnection; 
		
	}
    #region
    
    #region Public Functions
    
    public function insert($userid,$partnername,$company,$address1,$email1,$phone1,$website1,$createdby)
	{
		$intID = global_common::getMaxID(self::TBL_SL_PARTNER);
		
		$strTableName = self::TBL_SL_PARTNER;
		$strSQL = global_common::prepareQuery(self::SQL_INSERT_SL_PARTNER,
				array(self::TBL_SL_PARTNER,$intID,
						global_common::escape_mysql_string($userid),
						global_common::escape_mysql_string($partnername),
						global_common::escape_mysql_string($company),
						global_common::escape_mysql_string($address1),
						global_common::escape_mysql_string($addressname1),
						global_common::escape_mysql_string($address2),
						global_common::escape_mysql_string($addressname2),
						global_common::escape_mysql_string($address3),
						global_common::escape_mysql_string($addressname3),
						global_common::escape_mysql_string($address4),
						global_common::escape_mysql_string($addressname4),
						global_common::escape_mysql_string($address5),
						global_common::escape_mysql_string($addressname5),
						global_common::escape_mysql_string($email1),
						global_common::escape_mysql_string($emailname1),
						global_common::escape_mysql_string($email2),
						global_common::escape_mysql_string($emailname2),
						global_common::escape_mysql_string($email3),
						global_common::escape_mysql_string($emailname3),
						global_common::escape_mysql_string($email4),
						global_common::escape_mysql_string($emailname4),
						global_common::escape_mysql_string($email5),
						global_common::escape_mysql_string($emailname5),
						global_common::escape_mysql_string($phone1),
						global_common::escape_mysql_string($phonename1),
						global_common::escape_mysql_string($phone2),
						global_common::escape_mysql_string($phonename2),
						global_common::escape_mysql_string($phone3),
						global_common::escape_mysql_string($phonename3),
						global_common::escape_mysql_string($phone4),
						global_common::escape_mysql_string($phonename4),
						global_common::escape_mysql_string($phone5),
						global_common::escape_mysql_string($phonename5),
						global_common::escape_mysql_string($fax1),
						global_common::escape_mysql_string($faxname1),
						global_common::escape_mysql_string($fax2),
						global_common::escape_mysql_string($faxname2),
						global_common::escape_mysql_string($fax3),
						global_common::escape_mysql_string($faxname3),
						global_common::escape_mysql_string($fax4),
						global_common::escape_mysql_string($faxname4),
						global_common::escape_mysql_string($fax5),
						global_common::escape_mysql_string($faxname5),
						global_common::escape_mysql_string($website1),
						global_common::escape_mysql_string($websitename1),
						global_common::escape_mysql_string($website2),
						global_common::escape_mysql_string($websitename2),
						global_common::escape_mysql_string($website3),
						global_common::escape_mysql_string($websitename3),
						global_common::escape_mysql_string($website4),
						global_common::escape_mysql_string($websitename4),
						global_common::escape_mysql_string($website5),
						global_common::escape_mysql_string($websitename5),
						global_common::escape_mysql_string($taxnumber),
						global_common::escape_mysql_string($accountnumber),
						global_common::escape_mysql_string($createdby),
						global_common::nowSQL(),
						global_common::escape_mysql_string($modifiedby),
						global_common::escape_mysql_string($modifieddate),
						global_common::escape_mysql_string($deletedby),
						global_common::escape_mysql_string($deleteddate),
						global_common::escape_mysql_string($status),
						global_common::escape_mysql_string($isdeleted)
                ));
		
		if (!global_common::ExecutequeryWithCheckExistedTable($strSQL,self::SQL_CREATE_TABLE_SL_PARTNER,$this->_objConnection,$strTableName))
		{
			//echo $strSQL;
			global_common::writeLog('Error add sl_partner:'.$strSQL,1);
			return false;
		}	
		return $intID;
		
	}
    
	public function update($PartnerID,$userid,$partnername,$company,$address1,$email1,$phone1,$website1,$modifiedby)
	{
		$strTableName = self::TBL_SL_PARTNER;
		$strSQL = global_common::prepareQuery(self::SQL_UPDATE_SL_PARTNER,
				array($strTableName,
						global_common::escape_mysql_string($PartnerID),
						global_common::escape_mysql_string($userid),
						global_common::escape_mysql_string($partnername),
						global_common::escape_mysql_string($company),
						global_common::escape_mysql_string($address1),
						global_common::escape_mysql_string($addressname1),
						global_common::escape_mysql_string($address2),
						global_common::escape_mysql_string($addressname2),
						global_common::escape_mysql_string($address3),
						global_common::escape_mysql_string($addressname3),
						global_common::escape_mysql_string($address4),
						global_common::escape_mysql_string($addressname4),
						global_common::escape_mysql_string($address5),
						global_common::escape_mysql_string($addressname5),
						global_common::escape_mysql_string($email1),
						global_common::escape_mysql_string($emailname1),
						global_common::escape_mysql_string($email2),
						global_common::escape_mysql_string($emailname2),
						global_common::escape_mysql_string($email3),
						global_common::escape_mysql_string($emailname3),
						global_common::escape_mysql_string($email4),
						global_common::escape_mysql_string($emailname4),
						global_common::escape_mysql_string($email5),
						global_common::escape_mysql_string($emailname5),
						global_common::escape_mysql_string($phone1),
						global_common::escape_mysql_string($phonename1),
						global_common::escape_mysql_string($phone2),
						global_common::escape_mysql_string($phonename2),
						global_common::escape_mysql_string($phone3),
						global_common::escape_mysql_string($phonename3),
						global_common::escape_mysql_string($phone4),
						global_common::escape_mysql_string($phonename4),
						global_common::escape_mysql_string($phone5),
						global_common::escape_mysql_string($phonename5),
						global_common::escape_mysql_string($fax1),
						global_common::escape_mysql_string($faxname1),
						global_common::escape_mysql_string($fax2),
						global_common::escape_mysql_string($faxname2),
						global_common::escape_mysql_string($fax3),
						global_common::escape_mysql_string($faxname3),
						global_common::escape_mysql_string($fax4),
						global_common::escape_mysql_string($faxname4),
						global_common::escape_mysql_string($fax5),
						global_common::escape_mysql_string($faxname5),
						global_common::escape_mysql_string($website1),
						global_common::escape_mysql_string($websitename1),
						global_common::escape_mysql_string($website2),
						global_common::escape_mysql_string($websitename2),
						global_common::escape_mysql_string($website3),
						global_common::escape_mysql_string($websitename3),
						global_common::escape_mysql_string($website4),
						global_common::escape_mysql_string($websitename4),
						global_common::escape_mysql_string($website5),
						global_common::escape_mysql_string($websitename5),
						global_common::escape_mysql_string($taxnumber),
						global_common::escape_mysql_string($accountnumber),
						global_common::escape_mysql_string($createdby),
						global_common::escape_mysql_string($createddate),
						global_common::escape_mysql_string($modifiedby),
						global_common::nowSQL(),
						global_common::escape_mysql_string($deletedby),
						global_common::escape_mysql_string($deleteddate),
						global_common::escape_mysql_string($status),
						global_common::escape_mysql_string($isdeleted)
                ));
		if (!global_common::ExecutequeryWithCheckExistedTable($strSQL,self::SQL_CREATE_TABLE_SL_PARTNER,$this->_objConnection,$strTableName))
		{
			//echo $strSQL;
			global_common::writeLog('Error add sl_partner:'.$strSQL,1);
			return false;
		}	
		return $intNewID;		
	}
    
    public function getPartnerByID($objID, $selectField='*') 
	{		
        $selectField = $selectField? $selectField : '*'; 
		$strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
				array($selectField, self::TBL_SL_PARTNER ,							
					'WHERE PartnerID = \''.$objID.'\' '));
		//echo '<br>SQL:'.$strSQL;
		$arrResult =$this->_objConnection->selectCommand($strSQL);		
		if(!$arrResult)
		{
			global_common::writeLog('get sl_partner ByID:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		//print_r($arrResult);
		return $arrResult[0];
	}
    
	public function getPartnerByUserID($objID, $selectField='*') 
	{		
		$selectField = $selectField? $selectField : '*'; 
		$strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
				array($selectField, self::TBL_SL_PARTNER ,							
					'WHERE '.global_mapping::UserID.' = \''.$objID.'\' '));
		//echo '<br>SQL:'.$strSQL;
		$arrResult =$this->_objConnection->selectCommand($strSQL);		
		if(!$arrResult)
		{
			global_common::writeLog('get sl_partner ByID:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		//print_r($arrResult);
		return $arrResult[0];
	}
	
	
    public function getAllPartner($intPage = 0,$selectField='*',$whereClause='',$orderBy='') 
	{		    
        $selectField = $selectField? $selectField : '*'; 
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
				array($selectField, Model_Partner::TBL_SL_PARTNER ,							
					$whereClause.$orderBy .' limit '.(($intPage-1)* self::NUM_PER_PAGE).','.self::NUM_PER_PAGE));
        }
        else
        {
            $strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
				array($selectField, Model_Partner::TBL_SL_PARTNER ,							
					$whereClause.$orderBy ));
        }
		//echo '<br>SQL:'.$strSQL;
		$arrResult =$this->_objConnection->selectCommand($strSQL);		
		if(!$arrResult)
		{
			global_common::writeLog('get All sl_partner:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		//print_r($arrResult);
		return $arrResult;
	}
    
    public function getListPartner($intPage,$orderBy='PartnerID', $whereClause)
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
					self::TBL_SL_PARTNER,$orderBy.' '.$whereClause.' limit '.(($intPage-1)* self::NUM_PER_PAGE).','.self::NUM_PER_PAGE));
		//echo 'sql:'.$strSQL;	
		$arrResult = $this->_objConnection->selectCommand($strSQL);
		//print_r($arrResult);
		$strHTML = '<table class="tbl-list">
                    <thead>
						<td>PartnerID</td>
						<td>UserID</td>
						<td>PartnerName</td>
						<td>Company</td>
						<td>Address1</td>
						<td>AddressName1</td>
						<td>Address2</td>
						<td>AddressName2</td>
						<td>Address3</td>
						<td>AddressName3</td>
						<td>Address4</td>
						<td>AddressName4</td>
						<td>Address5</td>
						<td>AddressName5</td>
						<td>Email1</td>
						<td>EmailName1</td>
						<td>Email2</td>
						<td>EmailName2</td>
						<td>Email3</td>
						<td>EmailName3</td>
						<td>Email4</td>
						<td>EmailName4</td>
						<td>Email5</td>
						<td>EmailName5</td>
						<td>Phone1</td>
						<td>PhoneName1</td>
						<td>Phone2</td>
						<td>PhoneName2</td>
						<td>Phone3</td>
						<td>PhoneName3</td>
						<td>Phone4</td>
						<td>PhoneName4</td>
						<td>Phone5</td>
						<td>PhoneName5</td>
						<td>Fax1</td>
						<td>FaxName1</td>
						<td>Fax2</td>
						<td>FaxName2</td>
						<td>Fax3</td>
						<td>FaxName3</td>
						<td>Fax4</td>
						<td>FaxName4</td>
						<td>Fax5</td>
						<td>FaxName5</td>
						<td>Website1</td>
						<td>WebsiteName1</td>
						<td>Website2</td>
						<td>WebsiteName2</td>
						<td>Website3</td>
						<td>WebsiteName3</td>
						<td>Website4</td>
						<td>WebsiteName4</td>
						<td>Website5</td>
						<td>WebsiteName5</td>
						<td>TaxNumber</td>
						<td>AccountNumber</td>
						<td>CreatedBy</td>
						<td>CreatedDate</td>
						<td>ModifiedBy</td>
						<td>ModifiedDate</td>
						<td>DeletedBy</td>
						<td>DeletedDate</td>
						<td>Status</td>
						<td>IsDeleted</td>
                    </thead>
                    <tbody>';
		$icount = count($arrmenu);
		for($i=0;$i<$icount;$i++)
		{
			$strHTML.='<tr class="'.($i%2==0?'even':'odd').'">
						<td>'.$arrResult[$i]['PartnerID'].'</td>
						<td>'.$arrResult[$i]['UserID'].'</td>
						<td>'.$arrResult[$i]['PartnerName'].'</td>
						<td>'.$arrResult[$i]['Company'].'</td>
						<td>'.$arrResult[$i]['Address1'].'</td>
						<td>'.$arrResult[$i]['AddressName1'].'</td>
						<td>'.$arrResult[$i]['Address2'].'</td>
						<td>'.$arrResult[$i]['AddressName2'].'</td>
						<td>'.$arrResult[$i]['Address3'].'</td>
						<td>'.$arrResult[$i]['AddressName3'].'</td>
						<td>'.$arrResult[$i]['Address4'].'</td>
						<td>'.$arrResult[$i]['AddressName4'].'</td>
						<td>'.$arrResult[$i]['Address5'].'</td>
						<td>'.$arrResult[$i]['AddressName5'].'</td>
						<td>'.$arrResult[$i]['Email1'].'</td>
						<td>'.$arrResult[$i]['EmailName1'].'</td>
						<td>'.$arrResult[$i]['Email2'].'</td>
						<td>'.$arrResult[$i]['EmailName2'].'</td>
						<td>'.$arrResult[$i]['Email3'].'</td>
						<td>'.$arrResult[$i]['EmailName3'].'</td>
						<td>'.$arrResult[$i]['Email4'].'</td>
						<td>'.$arrResult[$i]['EmailName4'].'</td>
						<td>'.$arrResult[$i]['Email5'].'</td>
						<td>'.$arrResult[$i]['EmailName5'].'</td>
						<td>'.$arrResult[$i]['Phone1'].'</td>
						<td>'.$arrResult[$i]['PhoneName1'].'</td>
						<td>'.$arrResult[$i]['Phone2'].'</td>
						<td>'.$arrResult[$i]['PhoneName2'].'</td>
						<td>'.$arrResult[$i]['Phone3'].'</td>
						<td>'.$arrResult[$i]['PhoneName3'].'</td>
						<td>'.$arrResult[$i]['Phone4'].'</td>
						<td>'.$arrResult[$i]['PhoneName4'].'</td>
						<td>'.$arrResult[$i]['Phone5'].'</td>
						<td>'.$arrResult[$i]['PhoneName5'].'</td>
						<td>'.$arrResult[$i]['Fax1'].'</td>
						<td>'.$arrResult[$i]['FaxName1'].'</td>
						<td>'.$arrResult[$i]['Fax2'].'</td>
						<td>'.$arrResult[$i]['FaxName2'].'</td>
						<td>'.$arrResult[$i]['Fax3'].'</td>
						<td>'.$arrResult[$i]['FaxName3'].'</td>
						<td>'.$arrResult[$i]['Fax4'].'</td>
						<td>'.$arrResult[$i]['FaxName4'].'</td>
						<td>'.$arrResult[$i]['Fax5'].'</td>
						<td>'.$arrResult[$i]['FaxName5'].'</td>
						<td>'.$arrResult[$i]['Website1'].'</td>
						<td>'.$arrResult[$i]['WebsiteName1'].'</td>
						<td>'.$arrResult[$i]['Website2'].'</td>
						<td>'.$arrResult[$i]['WebsiteName2'].'</td>
						<td>'.$arrResult[$i]['Website3'].'</td>
						<td>'.$arrResult[$i]['WebsiteName3'].'</td>
						<td>'.$arrResult[$i]['Website4'].'</td>
						<td>'.$arrResult[$i]['WebsiteName4'].'</td>
						<td>'.$arrResult[$i]['Website5'].'</td>
						<td>'.$arrResult[$i]['WebsiteName5'].'</td>
						<td>'.$arrResult[$i]['TaxNumber'].'</td>
						<td>'.$arrResult[$i]['AccountNumber'].'</td>
						<td>'.$arrResult[$i]['CreatedBy'].'</td>
						<td>'.$arrResult[$i]['CreatedDate'].'</td>
						<td>'.$arrResult[$i]['ModifiedBy'].'</td>
						<td>'.$arrResult[$i]['ModifiedDate'].'</td>
						<td>'.$arrResult[$i]['DeletedBy'].'</td>
						<td>'.$arrResult[$i]['DeletedDate'].'</td>
						<td>'.$arrResult[$i]['Status'].'</td>
						<td class="lastCell"><input type="checkbox" onclick="_objPartner.showHide(\''.$arrResult[$i]['PartnerID'].'\',\''.$arrResult[$i]['name'].'\',this)" '.($arrResult[$i]['IsDeleted']?'':'checked=checked').' /></td>
					  </tr>';
		}
		$strHTML.='</tbody></table>';
		
		$strHTML .= "<div>".global_common::getPagingHTMLByNum($intPage,self::NUM_PER_PAGE,global_common::getTotalRecord(self::TBL_SL_PARTNER,$this->_objConnection),
				"_objMenu.changePage")."</div>";
		return $strHTML;
	}
    
    #endregion   
}
?>