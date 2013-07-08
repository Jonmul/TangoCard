<!--
Jonathan Muller

Tango Card Web Manager
logout page
-->
<?php
session_destroy();
session_regenerate_id(TRUE);
header("Location: index.php"); 
die();
?>