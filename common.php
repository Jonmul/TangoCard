<!--
Jonathan Muller

Tango Card Web Manager
-->

<?php
function makeheader(){?>
<head>
	<meta charset="utf-8" />
	<title>TangoCard Rewards</title>
	<link href="tc.css" type="text/css" rel="stylesheet" />

</head>
<?php } ?>

<?php

function maketop($txt){ ?>
	<div class="head">
		<h1>
			<!-- <img src="https://cms-uploads.s3.amazonaws.com/public/img/TangoCard-logo.png" alt="logo" /> -->
			Tango Card<br /><?php if(isset($txt)){echo $txt;} else{ echo "default";} ?>
		</h1>
	</div>

<?php } ?>

<?php
function makefooter(){ ?>
	<div class="foot">
		<div id="w3c">
			
		</div>
	</div>

<?php } ?>