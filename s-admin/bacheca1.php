<?	session_start();
	$_SESSION['wadmin']="1";
	$_SESSION['utente']=$_GET['ac'];
	if(isset($_SESSION['entrap']) and $_SESSION['entrap']=="1"){
		unset($_SESSION['lista']);
		$_SESSION['prof']=$_GET['att'];
		$_SESSION['id']=$_GET['ac'];
		
		//config
		include "../config.php";
		//funzioni
		include "functions.php";
		//connessione al database
		$db = mysql_connect($host, $user, $psw) or die ("Errore nella connessione. Verificare i parametri nel file config.inc.php");
		//selezione del database
		mysql_select_db($database) or die ("Non riesco a selezionare il database");	

	$lista=$_SERVER['HTTP_USER_AGENT'];
	$browser=explode(';',$lista);
	$browser=$browser[1]; 		
?>
<html>
<head>
	<title>S-admin -- Bacheca</title>
	<!--STILE BACHECA-->
	<? 
		if(strstr($browser, 'MSIE')==true){
	?>
			<link rel="stylesheet" type="text/css" href="css/bacheca.css" media="screen" />
	<?	}else{?>
			<link rel="stylesheet" type="text/css" href="css/bacheca_moz.css" media="screen" />
	<?	}?>	
	<title>S-admin -- Bacheca</title>
	<!--STILE BACHECA-->
	<link rel="stylesheet" type="text/css" href="css/stylemenu.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/sddm.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/style1.css" />
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="js/menu.js"></script>
	<script type="text/javascript" src="js/prototype.js"></script>
	<script type="text/javascript" src="js/scriptaculous.js"></script>
	<script type="text/javascript" src="js/unittest.js"></script>
	<!--FINE BACHECA-->
</head>
<body>
	<div class="box1">
<?	include "inclusi/header1.php"?>
		<table width="990px;" border="0">
			<tr>
				<td width="215px;" valign="top">
			<div class="menusinistra">
				<? include "inclusi/menuleft1.php"; ?>
			</div>
				</td>
				<td width="770px">
			<div class="menucentro">
				<img src="immagini/icona_casa.gif">Bacheca
				<hr />
				<div class="prodottiultimi">
					<b>Le ultime Novit&agrave;</b>
<?					$query="SELECT * FROM prodotti WHERE id NOT IN (SELECT DISTINCT idprodotto FROM offerte) order by prodotti.id desc LIMIT 4 ";
					$ris=mysql_query($query) or die ("Query: ".$query." non eseguita!");
				while($data=mysql_fetch_array($ris)){
				//controllo se il prodotto � bloccato
				$querybloc="select * from bloccati where idprodotto='".$data[0]."'";
				$bloc=mysql_query($querybloc) or die ("Query: ".$querybloc." non eseguita!");
				$bloccato=@mysql_result($bloc,0,0);
				//ricavo marca
				$querymarc=mysql_query("select * from marche where id='".$data[3]."'") or die ("Query marche non eseguita!");
				$ricavomarca=@mysql_result($querymarc,0,1);
				
				//ricavo le img del prodotto
				$queryimg=mysql_query("select imgmin,imgmax from immagini where idprodotto='".$data[0]."'")or die ("Query non eseguita!");
				$imgmin=@mysql_result($queryimg,0,0);
				$imgmax=@mysql_result($queryimg,0,1);
				//Visualizza i prodotti se non � bloccato
				if(strlen($bloccato)==0){
					//Visualizza i prodotti se non � un'offerta
						//ricavo nome immagine
						$nomeimg=explode(chr(47),$data[10]);
						$nomeimg=array_pop($nomeimg);
?>						<div class="ultimic">
							<div class="ultimit">
								<a href="<? print "/".puliscistring($ricavomarca)."/".puliscistring($data[1])."-".$data[0]."/index.html"; ?>">
									<img src="<? print "../upload/".$imgmin; ?>" border="0">
								</a>
							</div>
							<div class="ultimid">
								<a href="<? print "/".puliscistring($ricavomarca)."/".puliscistring($data[1])."-".$data[0]."/index.html"; ?>">
									<? print "<b>".$data[1]."</b><br /><br />".$data[2]; ?>
								</a>	
							</div>
						</div>
						<br />
<?	
				}
				}
?>				</div>
			</div>
	</div>
		</td>
	</tr>
</table>
</body>
</html>
<?}else{
?>	<meta http-equiv="refresh" content="0 url=http://<? print $_SERVER['HTTP_HOST'];?>">
<?	
}?>