<!--
Jonathan Muller

Tango Card Web Manager
Index and login page
-->
<?php

if(!isset($_POST)){
	header("Location: index.php");
	
	die();
	
}
$username = $_POST["username"];
$password=$_POST["password"];
$filecontents=file("users.txt");
$newaccount=true;
$fileline=$username.":".$password."\n";
#check if user exists
include("common.php");
include("lib/TangoCardSdkAutoloader.php");
session_start();
try {
	getBal($username, $password);
} catch(Exception $e){
	header("Location: index.php");
	die();
}

$_SESSION["username"]=$_POST["username"];
$_SESSION["password"]=$_POST["password"];	
header("Location: manage.php"); 
die();

?>