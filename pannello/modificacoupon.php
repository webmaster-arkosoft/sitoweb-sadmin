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
	
	//Ricavo informazioni
	if(isset($_POST['selezionato']) and strlen($_POST['selezionato'])>0){
		//ricavo le informazioni del codice coupon
		$idselezionato=mysql_real_escape_string($_POST['selezionato']);
		$querymod=mysql_query("SELECT * FROM coupon WHERE id='".$idselezionato."'") or die ("Query id coupon non eseguita!");
		if(strlen(@mysql_result($querymod,0,0))>0){
			$idcoupondb=mysql_result($querymod,0,0);
			$codicedb=hex2ascii(mysql_result($querymod,0,1));
			$datainiziomod=explode("-",mysql_result($querymod,0,2));
			$datainiziodb=$datainiziomod[2]."-".$datainiziomod[1]."-".$datainiziomod[0];
			$datafinemod=explode("-",mysql_result($querymod,0,3));
			$datafinedb=$datafinemod[2]."-".$datafinemod[1]."-".$datafinemod[0];
			$quantitadb=mysql_result($querymod,0,4);
			
			//prodotti dell'id-coupon
			$listaiddb=Array();
			$listaprezzidb=Array();
			$queryp=mysql_query("SELECT * FROM prodotticoupon WHERE idcoupon='".$idselezionato."'") or die ("Query id coupon non eseguita!");
			while($datap=mysql_fetch_array($queryp)){
				$listaiddb[]=$datap[1];
				$listaprezzidb[]=$datap[3];
			}
		}
	}	
	
	
	//Inserimento di un coupon
	if(isset($_POST['formmodifica']) and strlen($_POST['formmodifica'])>0){ include "inclusi/modcoupon.php"; }
	
	
?>
<html>
<head>
	<title>Modifica Coupon</title>
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
				if(isset($_POST['formmodifica']) and strlen($_POST['formmodifica'])>0){
?>					<div class="<?php if($errore==false){ print "successo"; }else{ print "errore"; } ?>"><?php print substr($msg, 0,-2); ?></div>
<?php			}				
?>				
				<form action="#" method="POST" Onsubmit="javascript: return controlloform();">
				<div class="menupancont1">
					<div class="riga">
						<div class="colonna1">ID-Coupon:</div>
						<div class="colonna2"><input class="inputcodice" type="text" name="codice" id="codice" value="<?php print $codicedb; ?>" /></div>
					</div>
					<div class="riga">
						<div class="colonna1">Data inizio/Data fine:</div>
						<div class="colonna2">
<?php						if(isset($datainiziodb) and strlen($datainiziodb)>0){
								$datacorrente=$datainiziodb;
							}else{
								$datacorrente=date("d-m-Y");
							}	
?>							<input class="inputdata" type="text" name="datainizio" id="datainizio" value="<?php print $datacorrente; ?>" />
							/
							<input class="inputdata" type="text" name="datafine" id="datafine" value="<?php print $datafinedb; ?>" />
							dd-mm-aaaa / dd-mm-aaaa
						</div>
					</div>	
					<div class="riga">
						<div class="colonna1">Quantit&agrave;:</div>
						<div class="colonna2"><input class="inputqnt" type="text" name="quantita" id="quantita" value="<?php print $quantitadb; ?>" /></div>
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
							$checkato="";
							$prezzoscontato="";
							$prezzoivato=$data[5]+(($data[5]*22)/100);
							if(in_array($data[0], $listaiddb)){
								$checkato=" checked='checked' ";
								$key=array_search($data[0], $listaiddb);
								$prezzoscontato=$listaprezzidb[$key];
								$prezzoivato=$listaprezzidb[$key]+(($listaprezzidb[$key]*22)/100);
							}	
?>							<div class="listaprod">
								<div class="checkprod"><input type="checkbox" <?php print $checkato; ?> name="scelto[<?php print $cont; ?>]" id="scelto[<?php print $cont; ?>]" value="<?php print $data[0]; ?>" /></div>
								<div class="nomeprod"><?php print $data[2]; ?></div>
								<div class="prezzoprod"><?php print decimali($data[5]); ?></div>
								<div class="prezzoprod" id="prezzoivato<?php print $cont; ?>"><?php print decimali($prezzoivato); ?></div>
								<div class="prezzoscontprod"><input type="text" name="prodscontato[<?php print $cont; ?>]" id="prodscontato[<?php print $cont; ?>]" Onkeyup="javascript: aggiornaprezzo(this,'<?php print $cont; ?>');" value="<?php print $prezzoscontato; ?>" /></div>
							</div>
<?php						$cont=$cont+1;
						}	
?>					</div>	
				</div>
				<div class="bottoni">
					<input type="hidden" name="formmodifica" id="formmodifica" value="1" />
					<input type="hidden" name="formselezionato" id="formselezionato" value="<?php print $idcoupondb; ?>" />
					<input type="Submit" name="modifica" id="modifica" value="Modifica">
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