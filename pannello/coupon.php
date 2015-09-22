<?php
	include "../estensionepagine.php"; 

	session_start();
	
	if(!isset($_SESSION['login']) and $_SESSION['login']!="ok"){
		$sito="http://".$_SERVER['HTTP_HOST'];
		header('Location: '.$sito.'/login.php?msg=0');
	}

	include "../carrello/functions.php";
	
	//include config
	include "../configcar.php";
	//connessione al database
	$db = mysql_connect($host, $user, $psw) or die ("Errore nella connessione.");
	//selezione del database
	mysql_select_db($database) or die ("Non riesco a selezionare il database");
	
	//Eliminazione coupon
	if(isset($_POST['selezionato1']) and strlen($_POST['selezionato1'])>0){
		include "inclusi/elimcoupon.php";
	}
	
?>
<html>
<head>
	<title>Gestione Coupon</title>
 	<link rel="stylesheet" type="text/css" href="/pannello/css/coupon.css" media="screen" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<script src="/pannello/js/selezionacoupon.js" type="text/javascript"></script>
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
				<div class="menupantit1">Gestione Coupon</div>

<?php			if(isset($_POST['selezionato1']) and strlen($_POST['selezionato1'])>0){				
?>					<div class="messaggi"><?php print $msg; ?></div>
<?php			}				
?>
				<div class="menupancont1">
					<div class="riga">
						<div class="colelim">SEL</div>
						<div class="colid">ID</div>
						<div class="colcodice">CODICE COUPON</div>
						<div class="colqnt">QUANTITA'</div>
						<div class="colattivati">ATTIVATI</div>
						<div class="coldatainizio">DATA INIZIO</div>
						<div class="coldatafine">DATA FINE</div>
					</div>
<?php				//Controllo se ci sono id-coupon in questo periodo e creo un array js con tutti gli id coupon in hex
					$query=mysql_query("SELECT * FROM coupon order by datafine desc") or die ("Query coupon non eseguita!");
					while($data=mysql_fetch_array($query)){
?>						<div class="riga1">
							<div class="colelim1"><input type="radio" name="sel" id="sel" value="<?php print $data[0]; ?>" Onclick="javascript: seleziona(this);"></div>
							<div class="colid1"><?php print $data[0]; ?></div>
							<div class="colcodice1"><?php print hex2ascii($data[1]); ?></div>
							<div class="colqnt1"><?php print $data[4]; ?></div>
							<div class="colattivati1"><?php print $data[5]; ?></div>
							<div class="coldatainizio1">
<?php 							$datadb=explode("-",$data[2]);
								print $datadb[2]."-".$datadb[1]."-".$datadb[0]; 
?>							</div>
							<div class="coldatafine1">
<?php 							$datadb1=explode("-",$data[3]);
								print $datadb1[2]."-".$datadb1[1]."-".$datadb1[0]; 
?>							</div>
						</div>
<?php				}
?>				</div>
				<div class="bottoni">
					<form action="inseriscicoupon.php" method="POST">
						<input type="Submit" name="inserisci" id="inserisci" value="Nuovo">
					</form>	
					<form action="modificacoupon.php" method="POST">
						<input type="Submit" name="modifica" id="modifica" value="Modifica">
						<input type="hidden" name="selezionato" id="selezionato" value="">
					</form>
					<form action="coupon.php" method="POST">
						<input type="Submit" name="elimina" id="elimina" value="Elimina">
						<input type="hidden" name="selezionato1" id="selezionato1" value="">
					</form>	
				</div>	
			</div>
		</div>
	</div>
</body>
</html>
<?php
	mysql_close($db);
?>	