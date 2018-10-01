<?php
include "connection.php";
session_start();
$sAction ;
if(isset($_POST['action_id']))
{
	$sAction=$_POST['action_id'];
}
switch ($sAction) 
{
	case 'new_arrangement':
			$sQuery = "INSERT INTO dom (jmbag, room_number) VALUES (:jmbag, :room_number)"; 				
				$oData = array(	
					'jmbag'=>$_POST['jmbag'],
					'room_number'=>$_POST['room_number'],
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
			$sQuery = "UPDATE soba SET free_bed=free_bed-1 WHERE room_number=:room_number";
			$oData = array(	
					'room_number'=>$_POST['room_number'],
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
			$sQuery = "DELETE FROM zahtjevi WHERE jmbag =:jmbag";	
			$oData = array(	
					'jmbag'=>$_POST['jmbag']
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
	case 'delete_arrangement':

			$sQuery = "UPDATE soba SET free_bed=free_bed+1 WHERE room_number=:room_number"; 						
				$oData = array(	
					'room_number'=>$_POST['room_number'],
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
			$sQuery = "DELETE FROM dom WHERE dom.jmbag = :jmbag AND dom.room_number =:room_number";							
				$oData = array(	
					'jmbag'=>$_POST['jmbag'],
					'room_number'=>$_POST['room_number'],
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
					'jmbag'=>$_POST['jmbag']
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
	case 'new_request':	
			$sQuery = "INSERT INTO zahtjevi (jmbag)  VALUES (:jmbag)";	
			$oData = array(	
					'jmbag'=>$_POST['jmbag']
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
	case 'update_room': 
			$sQuery = "UPDATE soba SET free_bed=free_bed+1 WHERE room_number=:room_number";
			$oData = array(	
					'room_number'=>$_POST['room_number'],
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
			$sQuery = "DELETE FROM zahtjevi WHERE jmbag =:jmbag";	
			$oData = array(	
					'jmbag'=>$_POST['jmbag']
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
	case 'update_room_up': 
			$sQuery = "UPDATE dom SET room_number=:room_number WHERE jmbag=:jmbag"; 				
				$oData = array(	
					'jmbag'=>$_POST['jmbag'],
					'room_number'=>$_POST['room_number'],
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
			$sQuery = "UPDATE soba SET free_bed=free_bed-1 WHERE room_number=:room_number";
			$oData = array(	
					'room_number'=>$_POST['room_number'],
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