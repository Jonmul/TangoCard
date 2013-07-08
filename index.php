<!--
Jonathan Muller

Tango Card Web Manager
Index and login page
-->
<!DOCTYPE html>
<?php

if(!isset($_COOKIE["tclogindate"])){
	$expireTime = time() + 60*60*24*7;
	$time=time();
	$currentdate=date("D y M d, g:i:s a");
	setcookie("tclogindate",$currentdate, $expireTime);
	$lastdate = $currentdate;
}else{
	$lastdate=$_COOKIE["tclogindate"];
}

include("common.php");

?>

<html>
	<div id="page">
		<?php makeheader() ?>

		<body>
			<?php maketop("Login") ?>

			<div id="main">
				<p>
					Welcome to the Tango Card system <br />
					
				</p>

				<p>
					Log in now to manage your account! <br />
				</p>

				<form id="loginform" action="login.php" method="post">
					<div><input name="username" type="text" size="8" autofocus="autofocus" /> <strong>User Name</strong></div>
					<div><input name="password" type="password" size="8" /> <strong>Password</strong></div>
					<div><input type="submit" value="Log in" /></div>
				</form>

				<p>
					<em>(last login from this computer was <?=$lastdate ?>)</em>
				</p>
			</div>

			<?php makefooter() ?>
		</body>
	</div>
</html>
