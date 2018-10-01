<?php
include "connection.php";
session_start();
$sPostData = file_get_contents("php://input");
$oPostData = json_decode($sPostData);
$Log = $oPostData->log_id;
switch ($Log) 
{
	case 'login':

		$sUserName = $oPostData->user_name;
		$sPassword = $oPostData->password;
		$sQuery="SELECT * FROM voditelj WHERE username_manager= '$sUserName' AND password_manager='$sPassword'";
		$oRecord=$oConnection->query($sQuery);		
		$oRow=$oRecord->fetch();
		$count = $oRecord->rowCount();
		$oExportData = array();
		if($count > 0)
		{
			$_SESSION['user']= $sUserName ;
			$oExportData['login_status']=1;
			$oExportData['id'] = $oRow['id'];
			$oExportData['first_name'] = $oRow['first_name'];
			$oExportData['last_name'] =	$oRow['last_name'];
			$oExportData['username_manager'] =	$oRow['username_manager'];
			$oExportData['password_manager'] =	$oRow['password_manager'];
		}
		else
		{
			$oExportData['login_status']=0;
		}
		echo json_encode($oExportData);
	break;
	case 'logout':
		session_destroy();
	break;
	case 'check_logged_in':
		if( isset($_SESSION['user']) )
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	break;
	case 'registration_student':
   				$jmbag = $oPostData->jmbag;			
				$first_name = $oPostData->first_name;
				$last_name = $oPostData->last_name;
				$email = $oPostData->email;
				$contact_number = $oPostData->contact_number;
				$college = $oPostData->college;
				$gender = $oPostData->gender;
				$sQuery = "INSERT INTO student (jmbag, first_name, last_name, email, contact_number, college, gender) VALUES (:jmbag, :first_name, :last_name, :email, :contact_number, :college, :gender)"; 	
				$oData = array(	
					'jmbag'=>$jmbag,
					'first_name'=>$first_name,
					'last_name'=> $last_name,
					'email'=> $email,
					'contact_number'=> $contact_number,
					'college'=> $college,
					'gender'=> $gender
				);		
				try
				{
					$oStatement = $oConnection->prepare($sQuery);	
					$oStatement->execute($oData);
				}
				catch(PDOException $error)
				{
					echo $error;
				}		
			$sQuery = "INSERT INTO zahtjevi (jmbag) VALUES (:jmbag)"; 		
			$oData = array(	
					'jmbag'=>$jmbag
				);			
				try
				{
					$oStatement = $oConnection->prepare($sQuery);
					$oStatement->execute($oData);
				}
				catch(PDOException $error)
				{
					echo $error;
				}			
	break;
	case 'delete_request': 	
	$jmbag = $oPostData->jmbag;		
			$sQuery = "DELETE FROM zahtjevi WHERE jmbag =:jmbag";	
			$oData = array(	
					'jmbag'=>$jmbag
				);					
				try
				{
					$oStatement = $oConnection->prepare($sQuery);
					$oStatement->execute($oData);
				}
				catch(PDOException $error)
				{
					echo $error;
				}		
	break;
}	
?>	