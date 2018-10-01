<?php
include 'classes.php';
$oConfig=new Configuration();


try
{
	$oConnection = new PDO("mysql:host=$oConfig->host;dbname=$oConfig->dbName", $oConfig->username, $oConfig->password);
}
catch (PDOException $pe)
{
	die("Could not connect to the database $oConfig->dbName :" . $pe->getMessage());
}

?>