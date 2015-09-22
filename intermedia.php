<?php
	session_start();
	$_SESSION['wadmin']="1";
	header('Location: http://www.softwarearredamento.com/s-admin/bacheca.php?benvenuto=1');
?>