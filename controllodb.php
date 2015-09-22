<?php
	if(isset($_GET['ctrldb']) and $_GET['ctrldb']=="1"){
		// include config
		include "config.php"; 
		//connessione al database
		$con = mysql_connect($host, $user, $psw);
		if (!$con){
			print 'errore';
		}else{
			print "ok";
		}	

		mysql_close($con);
	}	
?>	