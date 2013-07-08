<!--
Jonathan Muller

Tango Card Web Manager
Submit transaction page
Processes the transaction
-->
<?php
session_start();
$username = $_SESSION["username"];
$password=$_SESSION["password"];
$amount = $_POST["amount"];
$receiver=$_POST["receiver"];
$balance = $_SESSION["balance"];
if(!preg_match("/^\d+([.]{1}\d{2})?/",$amount)){
	$_SESSION["err"] = true;
	$_SESSION["errtxt"] = "Error: Please enter a numerical value";
	header("Location: manage.php"); 
	die();
}

$_SESSION["amount"]=intval($amount);
$_SESSION["transaction"] = "Processing Transaction...";
header("Location: manage.php"); 
die();
?>