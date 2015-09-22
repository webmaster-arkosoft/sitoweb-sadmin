<?php
	include "../estensionepagine.php"; 

	session_start();
	$errore=false;
	
	if(isset($_POST['user']) and strlen($_POST['user'])>0){
		if($_POST['user']!="admin"){ $errore=true; }
	}
	
	if(isset($_POST['psw']) and strlen($_POST['psw'])>0){
		if($_POST['psw']!="danilo&stefano"){ $errore=true; }
	}
	
	if($errore==false){
		$_SESSION['login']="ok";
	}else{
		$sito="http://".$_SERVER['HTTP_HOST'];
		header('Location: '.$sito.'/login.php?msg=0');
	}	
?>
<html>
<head>
	<title>Pannello</title>
 	<link rel="stylesheet" type="text/css" href="/pannello/css/bacheca.css" media="screen" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="container">

		<div class="centropan">
			<div class="menupan">
				<div class="menupantit">Men&ugrave;</div>
				<div class="menupancont">
					<div class="elenco"><a href="coupon.php">Gestione Coupon</a></div>
				</div>
			</div>
			<div class="pannello">
				<div class="menupantit1">Bacheca</div>
				<div class="menupancont1">Benvenuto Arkosoft</div>
			</div>
		</div>
	

	</div>
</body>
</html>