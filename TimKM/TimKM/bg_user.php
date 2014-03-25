<?php

/* TODO: Add code here */
require('config/globalconfig.php');
include_once('class/model_user.php');
include_once('class/model_resetpassword.php');

$objUser = new Model_User($objConnection);
$objReset = new Model_ResetPassword($objConnection);


if ($_pgR["act"] == Model_User::ACT_REGISTER)
{
	$userName = $_pgR['username'];
	$userName = html_entity_decode($userName,ENT_COMPAT ,'UTF-8' );
	$password = $_pgR['password'];
	$password = html_entity_decode($password,ENT_COMPAT ,'UTF-8' );
	
	$fullname = $_pgR['fullname'];
	$fullname = html_entity_decode($fullname,ENT_COMPAT ,'UTF-8' );
	$birthDate = $_pgR['birthdate'];
	$birthDate = html_entity_decode($birthDate,ENT_COMPAT ,'UTF-8' );
	$email = $_pgR['email'];
	$email = html_entity_decode($email,ENT_COMPAT ,'UTF-8' );
	$sex = $_pgR['sex'];
	$sex = html_entity_decode($sex,ENT_COMPAT ,'UTF-8' );
	
	if($objUser->checkExistUserName($userName)){
		$arrHeader = global_common::getMessageHeaderArr($banCode);//$banCode
		echo global_common::convertToXML(
				$arrHeader, array('rs', 'inf'), 
				array(2, 'Tên đăng nhập đã tồn tại'), 
				array( 0, 1 )
				);
		return;
	}
	if($objUser->checkExistEmail($email)){
		$arrHeader = global_common::getMessageHeaderArr($banCode);//$banCode
		echo global_common::convertToXML(
				$arrHeader, array('rs', 'inf'), 
				array(3, 'Email đã tồn tại'), 
				array( 0, 1 )
				);
		return;
	}
	$resultID = $objUser->register($userName,$password,$fullname,$birthDate,$email,$sex);
	if ($resultID)
	{
		//login after register
		$result = $objUser->login($userName,$password);
		if ($result)
		{
			$_SESSION[global_common::SES_C_USERINFO] = $result;		
		}
		$arrHeader = global_common::getMessageHeaderArr($banCode);//$banCode
		echo global_common::convertToXML(
				$arrHeader, array('rs', 'inf','rurl'), 
				array(1, 'Đăng ký thành công',$_SESSION[global_common::SES_C_CUR_PAGE]), 
				array( 0, 1,1 )
				);
		return;
	}
	else
	{
		echo global_common::convertToXML($arrHeader, array('rs','inf'), array(0,'Đăng ký thất bại'), array(0,1));
		return;
	}
}
else if ($_pgR["act"] == Model_User::ACT_UPDATE_PROFILE)
	{
		$fullname = $_pgR['fullname'];
		$fullname = html_entity_decode($fullname,ENT_COMPAT ,'UTF-8' );
		$birthDate = $_pgR['birthdate'];
		$birthDate = html_entity_decode($birthDate,ENT_COMPAT ,'UTF-8' );
		$email = $_pgR['email'];
		$email = html_entity_decode($email,ENT_COMPAT ,'UTF-8' );
		$sex = $_pgR['sex'];
		$sex = html_entity_decode($sex,ENT_COMPAT ,'UTF-8' );
		$phone = $_pgR['phone'];
		$phone = html_entity_decode($phone,ENT_COMPAT ,'UTF-8' );
		$address = $_pgR['address'];
		$address = html_entity_decode($address,ENT_COMPAT ,'UTF-8' );
		$currentUser = $_SESSION[global_common::SES_C_USERINFO];
		if($objUser->checkExistEmail($email,$currentUser[global_mapping::UserID])){
			$arrHeader = global_common::getMessageHeaderArr($banCode);//$banCode
			echo global_common::convertToXML(
					$arrHeader, array('rs', 'inf'), 
					array(3, 'Email đã tồn tại'), 
					array( 0, 1 )
					);
			return;
		}
		$userUpdate = $objUser->getUserByID($currentUser[global_mapping::UserID]);
		$userUpdate[global_mapping::FullName] = $fullname;
		$userUpdate[global_mapping::BirthDate] = $birthDate;
		$userUpdate[global_mapping::Address] = $address;
		$userUpdate[global_mapping::Phone] = $phone;
		$userUpdate[global_mapping::Email] = $email;
		$userUpdate[global_mapping::Sex] = $sex;
		$result = $objUser->update($userUpdate[global_mapping::UserID],$userUpdate[global_mapping::UserName],$userUpdate[global_mapping::Password],
				$userUpdate[global_mapping::FullName],$userUpdate[global_mapping::BirthDate],$userUpdate[global_mapping::Address],
				$userUpdate[global_mapping::Phone],$userUpdate[global_mapping::Email],$userUpdate[global_mapping::Sex],
				$userUpdate[global_mapping::Identity],$userUpdate[global_mapping::RoleID],$userUpdate[global_mapping::UserRankID],
				$userUpdate[global_mapping::Avatar],$userUpdate[global_mapping::AccountID],$userUpdate[global_mapping::IsActive]);
		if ($result)
		{
			$_SESSION[global_common::SES_C_USERINFO] = $objUser->getUserByID($currentUser[global_mapping::UserID]);
			$arrHeader = global_common::getMessageHeaderArr($banCode);//$banCode
			echo global_common::convertToXML(
					$arrHeader, array('rs', 'inf'), 
					array(1, 'Cập nhật thành công'), 
					array( 0, 1 )
					);
			return;
		}
		else
		{
			echo global_common::convertToXML($arrHeader, array('rs','inf'), array(0,'Cập nhật thất bại'), array(0,1));
			return;
		}
	}
	else if ($_pgR["act"] == Model_User::ACT_CHANGE_PASS)
		{
			$currentpass = $_pgR['currentpass'];
			$currentpass = html_entity_decode($currentpass,ENT_COMPAT ,'UTF-8' );
			$password = $_pgR['password'];
			$password = html_entity_decode($password,ENT_COMPAT ,'UTF-8' );
			$confirmpass = $_pgR['confirmpass'];
			$confirmpass = html_entity_decode($confirmpass,ENT_COMPAT ,'UTF-8' );
			if($password == $confirmpass)
			{
				$currentUser = $_SESSION[global_common::SES_C_USERINFO];
				$result = $objUser->changePassword($currentUser[global_mapping::UserID],$currentpass,$password);
				//echo $result;
				if ($result > 0)
				{
					$arrHeader = global_common::getMessageHeaderArr($banCode);//$banCode
					echo global_common::convertToXML(
							$arrHeader, array('rs', 'inf'), 
							array(1, 'Cập nhật thành công'), 
							array( 0, 1 )
							);
					return;
				}
				else if($result == 0 )
					{
						echo global_common::convertToXML($arrHeader, array('rs','inf'), array(0,'Mật khẩu không đúng'), array(0,1));
						return;
					}
					else
					{
						echo global_common::convertToXML($arrHeader, array('rs','inf'), array(0,'Cập nhật thất bại. Xin vui lòng thử lại sau!'), array(0,1));
						return;
					}
			}
			else
			{
				echo global_common::convertToXML($arrHeader, array('rs','inf'), array(2,'Mật khẩu mới không trùng nhau'), array(0,1));
				return;
			}
		}
		else if ($_pgR["act"] == Model_User::ACT_UPDATE_RESET_PASS)
			{
				$password = $_pgR['password'];
				$password = html_entity_decode($password,ENT_COMPAT ,'UTF-8' );
				
				$confirmpass = $_pgR['confirmpass'];
				$confirmpass = html_entity_decode($confirmpass,ENT_COMPAT ,'UTF-8' );
				
				$resetid = $_pgR['resetid'];
				$resetid = html_entity_decode($resetid,ENT_COMPAT ,'UTF-8' );
				
				if($password == $confirmpass)
				{
					$currentUser = $_SESSION[global_common::SES_C_USERINFO];
					$result = $objUser->changeResetPassword($currentUser[global_mapping::UserID],$password);
					
					//echo $result;
					if ($result > 0)
					{
						$resetPw = $objReset->getResetPasswordByID($resetid);
						$resetPw[global_mapping::ResetDate] = global_common::nowSQL();
						$resetPw[global_mapping::IsDeleted] = 1;
						$objReset->update($resetid,$resetPw[global_mapping::UserID],$resetPw[global_mapping::CreatedDate],
									$resetPw[global_mapping::ExpireDate],$resetPw[global_mapping::ResetDate],   
									$resetPw[global_mapping::IsDeleted]);
									
						$arrHeader = global_common::getMessageHeaderArr($banCode);//$banCode
						echo global_common::convertToXML(
								$arrHeader, array('rs', 'inf'), 
								array(1, 'Cập nhật thành công'), 
								array( 0, 1 )
								);
						return;
					}
					else
					{
						echo global_common::convertToXML($arrHeader, array('rs','inf'), array(0,'Cập nhật thất bại. Xin vui lòng thử lại sau!'), array(0,1));
						return;
					}
				}
				else
				{
					echo global_common::convertToXML($arrHeader, array('rs','inf'), array(2,'Mật khẩu mới không trùng nhau'), array(0,1));
					return;
				}
			}
			else if ($_pgR["act"] == Model_User::ACT_RESET_PASS)
				{
					$userName = $_pgR['username'];
					$userName = html_entity_decode($userName,ENT_COMPAT ,'UTF-8' );
					$email = $_pgR['email'];
					$email = html_entity_decode($email,ENT_COMPAT ,'UTF-8' );
					
					if($userName)
					{
						$fieldName = global_mapping::UserName;
						$fieldValue = $userName;
					}
					else
					{
						$fieldName = global_mapping::Email;
						$fieldValue = $email;
					}
					
					$result = $objUser->getUserByField($fieldName,$fieldValue);
					//echo $result;
					if ($result)
					{
						$guid = $objReset->insert($result[0][global_mapping::UserID]);
						if($guid)
						{
							$userEmail = $result[0][global_mapping::Email];
							$fullName = $result[0][global_mapping::FullName];
							$linkReset = '/change_pass?id='.$guid;
							$arrMailContent = global_common::formatMailContent(global_common::TEAMPLATE_RESET_PASSWORD,
									null,
									array(global_common::formatOutputText($result[0][global_mapping::FullName]),
										$linkReset, global_common::RESET_EXPIRE_DAYS));
							$emailSubject = $arrMailContent[0];
							$emailContent = $arrMailContent[1];
							$isSent = global_mail::send($userEmail,$fullName,$emailSubject,$emailContent,null,
									global_common::SUPPORT_MAIL_USERNAME,global_common::SUPPORT_MAIL_PASSWORD,
									global_common::SUPPORT_MAIL_DISPLAY_NAME);
							if($isSent)
							{
								$arrHeader = global_common::getMessageHeaderArr($banCode);//$banCode
								echo global_common::convertToXML(
										$arrHeader, array('rs', 'inf'), 
										array(1, 'Vui lòng kiểm tra email để cập nhật lại mật khẩu'), 
										array( 0, 1 )
										);
								return;
							}
						}
						echo global_common::convertToXML($arrHeader, array('rs','inf'), array(0,'Xử lý thất bại. Xin vui lòng thử lại sau!'), array(0,1));
						return;
					}				
					else
					{
						echo global_common::convertToXML($arrHeader, array('rs','inf'), array(0,'Tên đăng nhập hoặc email không tồn tại.'), array(0,1));
						return;
					}
				}
				else if ($_pgR["act"] == Model_User::ACT_LOGOUT)
					{
						// or this would remove all the variables in the session, but not the session itself 
						session_unset(); 		
						// this would destroy the session variables 
						session_destroy(); 
						echo global_common::convertToXML(
								$arrHeader, array('rs', 'inf'), 
								array(1, ''), 
								array( 0, 1 )
								);
						return;
					}
?>