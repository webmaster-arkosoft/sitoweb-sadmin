<?php
	include "../estensionepagine.php"; 

	session_start();
	
	if(!isset($_SESSION['login']) and $_SESSION['login']!="ok"){
		$sito="http://".$_SERVER['HTTP_HOST'];
		header('Location: '.$sito.'/login.php?msg=0');
	}

	//Funzioni
	include "../carrello/functions.php";
	
	//include config
	include "../configcar.php";	
	//connessione al database
	$db = mysql_connect($host, $user, $psw) or die ("Errore nella connessione.");
	//selezione del database
	mysql_select_db($database) or die ("Non riesco a selezionare il database");	
	
	//Inserimento di un coupon
	if(isset($_POST['inserimento']) and strlen($_POST['inserimento'])>0){ include "inclusi/inscoupon.php"; }
			
?>
<html>
<head>
	<title>Inserisci Coupon</title>
 	<link rel="stylesheet" type="text/css" href="/pannello/css/inseriscicoupon.css" media="screen" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<script src="js/controlli.js" type="text/javascript"></script>
	<script src="/carrello/js/libs.js" type="text/javascript"></script>
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
<?php			
				if(isset($_POST['inserimento']) and strlen($_POST['inserimento'])>0){
?>					<div class="<?php if($errore==false){ print "successo"; }else{ print "errore"; } ?>"><?php print substr($msg, 0,-2); ?></div>
<?php			}				
?>				
				<form action="#" method="POST" Onsubmit="javascript: return controlloform();">
				<div class="menupancont1">
					<div class="riga">
						<div class="colonna1">ID-Coupon:</div>
						<div class="colonna2"><input class="inputcodice" type="text" name="codice" id="codice" value="<?php print $_POST['codice']; ?>" /></div>
					</div>
					<div class="riga">
						<div class="colonna1">Data inizio/Data fine:</div>
						<div class="colonna2">
<?php						if(isset($_POST['datainizio']) and strlen($_POST['datainizio'])>0){
								$datacorrente=$_POST['datainizio'];
							}else{
								$datacorrente=date("d-m-Y");
							}	
?>							<input class="inputdata" type="text" name="datainizio" id="datainizio" value="<?php print $datacorrente; ?>" />
							/
							<input class="inputdata" type="text" name="datafine" id="datafine" value="<?php print $_POST['datafine']; ?>" />
							dd-mm-aaaa / dd-mm-aaaa
						</div>
					</div>	
					<div class="riga">
						<div class="colonna1">Quantit&agrave;:</div>
						<div class="colonna2"><input class="inputqnt" type="text" name="quantita" id="quantita" value="<?php print $_POST['quantita']; ?>" /></div>
					</div>	
					<div class="riga1">
						<div class="colonna3">Prodotti da scontare:</div>
						<div class="listaprod1">
							<div class="checkprod">SEL</div>
							<div class="nomeprod">PRODOTTO</div>
							<div class="prezzoprod">PREZZO</div>
							<div class="prezzoprod">PREZZO IVA</div>
							<div class="prezzoscontprod">PROMOZIONE</div>
						</div>
<?php					//Stampo tutti i prodotti
						$query=mysql_query("SELECT * FROM prodotticarrello") or die ("Query prodotti non eseguita!");
						$cont=0;

						while($data=mysql_fetch_array($query)){
							if(isset($_POST['scelto']) and count($_POST['scelto'])>0){
								$checkato="";
								$prezzoscontato="";
								if (in_array($data[0], $_POST['scelto'])){
									$checkato=" checked='checked' ";
									$prezzoscontato=$_POST['prodscontato'][$cont];
								}	
							}
?>							<div class="listaprod">
								<div class="checkprod"><input type="checkbox" <?php print $checkato; ?> name="scelto[<?php print $cont; ?>]" id="scelto[<?php print $cont; ?>]" value="<?php print $data[0]; ?>" /></div>
								<div class="nomeprod"><?php print $data[2]; ?></div>
								<div class="prezzoprod"><?php print decimali($data[5]); ?></div>
								<div class="prezzoprod" id="prezzoivato<?php print $cont; ?>"><?php print decimali($data[5]+(($data[5]*22)/100)); ?></div>
								<div class="prezzoscontprod"><input type="text" name="prodscontato[<?php print $cont; ?>]" id="prodscontato[<?php print $cont; ?>]" Onkeyup="javascript: aggiornaprezzo(this,'<?php print $cont; ?>');" value="<?php print $prezzoscontato; ?>" /></div>
							</div>
<?php						$cont=$cont+1;
						}	
?>					</div>	
				</div>
				<div class="bottoni">
					<input type="hidden" name="inserimento" id="inserimento" value="1" />
					<input type="Submit" name="inserisci" id="inserisci" value="Inserisci">
				</div>	
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<?php
	mysql_close($db);
?>	