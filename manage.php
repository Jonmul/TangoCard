<!--
Jonathan Muller

Tango Card Web Manager
Card Manager page
-->
<!DOCTYPE html>
<?php
session_start();
$username=$_SESSION["username"];
$date=$_COOKIE["tclogindate"];
$password=$_SESSION["password"];
include("lib/TangoCardSdkAutoloader.php");
include("common.php");

?>
<html>
	<?php makeheader() ?>

	<body>
		<?php maketop("User Management") ?>

		<div id="main">
			<p>
				Welcome to the Tango Card system <br />
				
			</p>

			<p>
				Greetings <?=$username ?>! <br />
				<?php getBal($username, $password) ?>
			</p>
			<p id="results">
				<?php  
					if(isset($_SESSION["err"])){
						if(isset($_SESSION["errtxt"])){
							echo $_SESSION["errtxt"];
							unset($_SESSION["errtxt"]);
						}else{
							echo "Some error occured";
						}
					} elseif(isset($_SESSION["transaction"])){
						echo $_SESSION["transaction"];
						unset($_SESSION["transaction"]);
						purchaseCard($username,$password, $_SESSION["amount"]);
						unset($_SESSION["amount"]);
						
					}
					unset($_SESSION["err"]);
					
				?>
			</p>
			<form id="loginform" action="submit.php" method="post">
				<div><input name="amount" type="text" size="8" autofocus="autofocus" /> <strong>Amount to send</strong></div>
				<div><input name="receiver" type="text" size="8" /> <strong>Employee to receive</strong></div>
				<div><input type="submit" value="Send" /></div>
			</form>

			<div>
				<a href="logout.php"><strong><br />Log Out <br /></strong></a>
				<em>(logged in since <?=$date ?>)</em>
			</div>
		</div>

		<?php makefooter() ?>
	</body>
</html>