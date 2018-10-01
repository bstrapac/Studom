<?php
ini_set('memory_limit', '2048M');
header('Content-type: text/json');
header('Content-type: application/json; charset=utf-8');
include "connection.php";
session_start();
$sJsonID="";

if(isset($_GET['json_id']))
{
	$sJsonID=$_GET['json_id'];
}
$nRoom =" ";
if(isset($_GET['room_number']))
{
	$nRoom = $_GET['room_number'];
}
$nStudentJmbag =" ";
if(isset($_GET['student_jmbag']))
{
	$nStudentJmbag = $_GET['student_jmbag'];
}
$oJson=array();
switch($sJsonID)
{
	case 'get_all_students':
		$sQuery="SELECT * FROM student";
		$oRecord=$oConnection->query($sQuery);
		
		while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
		{
			$oStudent=new Student(
					$oRow['jmbag'],
					$oRow['first_name'],
					$oRow['last_name'],
					$oRow['gender'],
					$oRow['email'],
					$oRow['contact_number'],
					$oRow['college']
				);
			array_push($oJson,$oStudent);
		}
		break;
		case 'get_all_rooms':
		$sQuery="SELECT * FROM soba ORDER BY room_number ASC";
		$oRecord=$oConnection->query($sQuery);
		
		while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
		{
			$oSoba=new Soba(
					$oRow['room_number'],
					$oRow['room_floor'],
					$oRow['room_category'],
					$oRow['free_bed']
				);
			array_push($oJson,$oSoba);
		}
		break;
		case 'get_arrangement':
		$sQuery="	SELECT dom.id,
					dom.jmbag,
					dom.room_number, 
					student.first_name, 
					student.last_name, 
					soba.room_floor, 
					soba.room_category 
					FROM dom 
					LEFT JOIN student ON student.jmbag = dom.jmbag 
					LEFT JOIN soba ON soba.room_number = dom.room_number";
		$oRecord=$oConnection->query($sQuery);		
		while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
		{
			$oStudentSoba=new Dom(
					$oRow['id'],										
					$oRow['jmbag'],
					$oRow['first_name'],
					$oRow['last_name'],
					$oRow['room_number'],
					$oRow['room_floor'],
					$oRow['room_category']
				);
			array_push($oJson,$oStudentSoba);
		}
		break;
		case 'get_all_requests':
		$sQuery="SELECT zahtjevi.*, student.last_name FROM zahtjevi LEFT JOIN student ON student.jmbag WHERE student.jmbag = zahtjevi.jmbag";
		$oRecord=$oConnection->query($sQuery);		
		while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
		{
			$oZahtjev=new Zahtjev(
					$oRow['id'],										
					$oRow['jmbag'],
					$oRow['last_name'],
					$oRow['status_up']
				);
			array_push($oJson,$oZahtjev);
		}
		break;
}
echo json_encode($oJson)
?>