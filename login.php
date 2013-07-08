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
foreach(file("users.txt") as $lines){
	$line=explode(":",$lines);
	if(trim($username) == trim($line[0])){
		#check if password is correct
		if(trim($password) == trim($line[1])){
			$newaccount=false;
			
		}else{
			header("Location: index.php"); 
			die();
		}
	}
}
#user doesnt exist
if($newaccount){
	if(preg_match("/^\w{1,}[@]{1}[a-zA-Z]{1,}[.]{1}[com|net|org|info|]{3}/",$username) &&
	preg_match("/^.{5,}/",$password)){
		
		$fileline=$username.":".$password."\n";
		file_put_contents("users.txt",$fileline,FILE_APPEND);
			
		
	}else {
		header("Location: index.php"); 
		die();
	}
}
session_start();
$_SESSION["username"]=$_POST["username"];

header("Location: manage.php"); 
die();

?>