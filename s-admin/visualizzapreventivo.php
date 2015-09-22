<?	//Inizializzo sessione
	session_start();
	$_SESSION['invioprev']=0;
	
	$errore=false;
	//Se è stato effettuato il login accedi a questa pagina
	if(isset($_SESSION['wadmin']) and $_SESSION['wadmin']=="1"){
		unset($_SESSION['lista']);
	//Dati database, connessione e selezione del database
	include "../config.php";
	//Funzioni
	include "functions.php";
	//Salva prezzi
	include "inclusi/salvaprezzi.php";
	//Elimina preventivo
	include "inclusi/eliminazione_prodotti.php";
	//Elimina prodotti
	include "inclusi/eliminazione_preventivi.php";
	//Controllo se devo inserire la ? o la & nell'eliminazione
	include	"inclusi/percorso_eliminazione_categoria.php";
	
	//Ricavo il browser osato
	$lista=$_SERVER['HTTP_USER_AGENT'];
	$browser=explode(';',$lista);
	$browser=$browser[1];
		
	//inserisci un nuovo prodotto
	if(isset($_SESSION['prodotti']) and strlen($_SESSION['prodotti'])>0){
		//connessione al database
		$db = mysql_connect($host, $user, $psw) or die ("Errore nella connessione.");
		//selezione del database
		mysql_select_db($database) or die ("Non riesco a selezionare il database");
		$queryins=mysql_query("select * from preventivi where idpreventivo='".$_SESSION['idpreventivo']."'") or die ("Query: inserisci nuovo articolo non eseguita!");
		$idutenteins=@mysql_result($queryins,0,2);
		$datains=@mysql_result($queryins,0,4);
		//Inserimento prodotto nel preventivo
		mysql_query("insert into preventivi values('default','".$_SESSION['prodotti']."','".$idutenteins."','".$_SESSION['idpreventivo']."','".$datains."')"); 
		unset($_SESSION['prodotti']); 
	}else{
		if(!isset($_SESSION['prodotti']) and strlen($_SESSION['prodotti'])==0){
			//settaggio variabili
			$_SESSION['idpreventivo']=$_GET['visualizza'];
		}	
	} 
?>
<html>
<head>
	<title>S-admin -- Gestione Preventivo</title>
	<!--STILE e JAVASCRIPT BACHECA-->
	<? 
		if(strstr($browser, 'MSIE')==true){
	?>
			<link rel="stylesheet" type="text/css" href="css/bacheca.css" media="screen" />
	<?	}else{?>
			<link rel="stylesheet" type="text/css" href="css/bacheca_moz.css" media="screen" />
	<?	}?>	
	<link rel="stylesheet" type="text/css" href="css/stylemenu.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/sddm.css" media="screen" />
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/effetto.js"></script>
	<script type="text/javascript" src="js/controllo.js"></script>
	<script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
	<script language="JavaScript" type="text/javascript" src="js/menu.js"></script>
	<script language="JavaScript" type="text/javascript" src="js/salvaprezzi.js"></script>
	<script language="JavaScript" type="text/javascript" src="js/inseriscipreventivo.js"></script>
	<script language="JavaScript" type="text/javascript" src="js/aggiunginota.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<!--FINE BACHECA-->
</head>
<body>
	<div class="box1">
<?		include "inclusi/header.php"?>
		<div class="box3">
		<table width="990px;" border="0">
			<tr>
				<td width="215px;" valign="top">
					<div class="menusinistra">
						<? include "inclusi/menuleft.php"; ?>
					</div>
				</td>
				<td width="770px">	
				<div class="menucentro">
				<img src="immagini/icona_preventivi.gif">Visualizza Preventivo
				<hr />
<?					//connessione al database
					$db = mysql_connect($host, $user, $psw) or die ("Errore nella connessione. Verificare i parametri nel file config.inc.php");
					//selezione del database
					mysql_select_db($database) or die ("Non riesco a selezionare il database");
					if(isset($_SESSION['idpreventivo']) and strlen($_SESSION['idpreventivo'])>0){
						$idvisualizza=$_SESSION['idpreventivo'];
					}else{
						$idvisualizza=$_GET['visualizza'];
					}
					$query="select * from preventivi where idpreventivo='".$idvisualizza."'";
					$ris=mysql_query($query) or die ("Query: ".$query." non eseguita!");
					$query2="select * from preventivi where idpreventivo='".$idvisualizza."'";
					$ris2=mysql_query($query2) or die ("Query: ".$query2." non eseguita!");
					$idutentedb=@mysql_result($ris2,0,2);
					//conto i record
					$righepi=mysql_num_rows($ris);
					if($righepi>0){
						$query1="select * from utenti where id='".$idutentedb."'";
						$ris1=mysql_query($query1) or die ("Query: ".$query1." non eseguita!");
						$nomeutentedb=@mysql_result($ris1,0,1);
						$cognomeutentedb=@mysql_result($ris1,0,2);
						$usernamedb=@mysql_result($ris1,0,10);
						$provdb=@mysql_result($ris1,0,7);
						$paesedb=@mysql_result($ris1,0,6)." (".$provdb.")";
						$capdb=@mysql_result($ris1,0,8);
						$sessodb=@mysql_result($ris1,0,16);
						$viadb=@mysql_result($ris1,0,9);
						$teldb=@mysql_result($ris1,0,5);
						$emaildb=@mysql_result($ris1,0,12);
						$querymsg="select * from messaggi where idutente='".$idutentedb."' and idpreventivo='".$idvisualizza."'";
						$risquery=mysql_query($querymsg) or die ("Query: ".$querymsg." non eseguita!");
						$messaggio=utf8_encode(@mysql_result($risquery,0,1));
?>						<table border="0" style="width: 720px; margin-bottom: 50px;" cellpadding="0">
							<tr>
								<td style="width: 450px; height: 35px; margin-bottom: 15px; font-family: Arial; font-size: 18px;"><?php print "<b>".ucfirst($nomeutentedb)." ".ucfirst($cognomeutentedb)."</b> ha richiesto il seguente preventivo:"; ?></td>
								<td style="border: 1px solid #000;  background-color: #333; color: #fff; width: 270px; text-align: center; font-family: Arial; font-size: 16px; font-weight: bold;">Uteriori Informazioni</td>
							</tr>
							<tr>
								<td style="width: 450px; font-family: Arial;">
<?php								if(strlen($messaggio)){
?>									Richiesta<br /><textarea name="messaggio" cols="47" rows="5" id="messaggio"><?php print $messaggio; ?></textarea>
<?php								}else{print"&nbsp;";}
?>								</td>
								<td style="width: 270px;">
									<table width="270" cellpadding="0" border="0" cellspacing="0">
										<tr>
											<td style="padding-left: 5px; border: 1px solid #7F9DB9; width: 100px; font-family: Arial; font-weight: bold;">Username:</td>
											<td style="padding-left: 5px; border: 1px solid #7F9DB9; width: 170px; font-family: Arial; font-size: 14px;"><? print $usernamedb; ?></td>
										</tr>
										<tr>
											<td style="padding-left: 5px; border: 1px solid #7F9DB9; width: 100px; font-family: Arial; font-weight: bold;">Paese:</td>
											<td style="padding-left: 5px; border: 1px solid #7F9DB9; width: 170px; font-family: Arial; font-size: 14px;"><? print $paesedb; ?></td>
										</tr>
										<tr>
											<td style="padding-left: 5px; border: 1px solid #7F9DB9; width: 100px; font-family: Arial; font-weight: bold;">Telefono:</td>
											<td style="padding-left: 5px; border: 1px solid #7F9DB9; width: 170px; font-family: Arial; font-size: 14px;"><? print $teldb; ?></td>
										</tr>
										<tr>
											<td style="padding-left: 5px; border: 1px solid #7F9DB9; width: 100px; font-family: Arial; font-weight: bold;">E-mail:</td>
											<td style="padding-left: 5px; border: 1px solid #7F9DB9; width: 170px; font-family: Arial; font-size: 14px;"><? print "<a href=\"mailto:".$emaildb."\">".$emaildb."</a>"; ?></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>		
						<form action="visualizzapreventivo.php?visualizza=<? print $idvisualizza; ?>" name="salvaprezzi" id="salvaprezzi" method="POST">
<?						$queryspe=mysql_query("select * from specifichepreventivo where idpreventivo='".$idvisualizza."'") or die ("Query: specifiche non eseguita!");
						$idprevv=@mysql_result($queryspe,0,1);
						$numprev=@mysql_result($queryspe,0,2);
						$dataa=@mysql_result($queryspe,0,3);
						$dataprev=explode("-",$dataa);
						$dataprev=$dataprev[2]."/".$dataprev[1]."/".$dataprev[0];
						if(strlen($dataa)==0){$dataprev=date("d/m/Y");}
						$consegnaprev=@mysql_result($queryspe,0,4);
						$validitaprev=@mysql_result($queryspe,0,5);
						$trasportoprev=@mysql_result($queryspe,0,6);
						//conto i record
						$record=mysql_num_rows($queryspe);
						if($record>0){
?>							<table style="background-color: #ccc; width: 720px; border: 1px solid #000; font-family: Arial; font-weight: bold; text-align: center;">
								<tr>
									<td>Preventivo n. <input type="text" id="numpreventivo" name="numpreventivo" value="<? print $numprev; ?>" style="width: 50px;"> del <input type="text" name="datapreventivo" id="datapreventivo" value="<? print $dataprev;?>" style="width: 100px;"></td>
								</tr>
							</table>
							<table style="background-color: #ccc; width: 720px; border: 1px solid #000; font-family: Arial; font-weight: bold;">
								<tr>
									<td>Prevista Consegna: <input type="text" id="consegna" name="consegna" value="<? print $consegnaprev; ?>" style="width: 130px;"> Validit&agrave; Offerta: <input type="text" id="validita" name="validita" value="<? print $validitaprev; ?>" style="width: 70px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="iva" name="iva" value="<? print $trasportoprev; ?>" style="width: 200px;"></td>
								</tr>
							</table>
<?						}else{
?>							<table style="background-color: #ccc; width: 720px; border: 1px solid #000; font-family: Arial; font-weight: bold; text-align: center;">
								<tr>
									<td>Preventivo n. <input type="text" id="numpreventivo" name="numpreventivo" value="<? print $idvisualizza; ?>" style="width: 50px;"> del <input type="text" name="datapreventivo" id="datapreventivo" value="<? print date("d/m/Y");?>" style="width: 100px;"></td>
								</tr>
							</table>
							<table style="background-color: #ccc; width: 720px; border: 1px solid #000; font-family: Arial; font-weight: bold;">
								<tr>
									<td>Prevista Consegna: <input type="text" id="consegna" name="consegna" value="0 settimane circa" style="width: 130px;"> Validit&agrave; Offerta: <input type="text" id="validita" name="validita" value="0 gg." style="width: 70px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="iva" name="iva" value="I.V.A. e Trasporto Compresi" style="width: 200px;"></td>
								</tr>
							</table>
<?						}
							while($data=mysql_fetch_array($ris)){
							//prezzo del prodotto
							$queryprezzo=mysql_query("select * from prezzi where idprodotto='".$data[1]."'") or die ("Query: prezzo non eseguita!");
							$prezzodb=@mysql_result($queryprezzo,0,2);
							if(strlen($prezzodb)==0){
								$errore=true;
							}
							
							//note del prodotto
							$querynota=mysql_query("select * from note where idprodotto='".$data[1]."' and idpreventivo='".$idvisualizza."'") or die ("Query: note non eseguita!");
							$notadb=@mysql_result($querynota,0,3);
							
							
							//id marca del prodotto
							$queryimg="select * from prodotti,immagini where prodotti.id=idprodotto and idprodotto='".$data[1]."'";
							$risult=mysql_query($queryimg) or die ("Query: ".$queryimg." non eseguita!");
							$idmarca=@mysql_result($risult,0,3);
							
							//marca
							$querymarca="select * from marche where id='".$idmarca."'";
							$rismarca=mysql_query($querymarca) or die ("Query: ".$querymarca." non eseguita!");
							$nomemarca=@mysql_result($rismarca,0,1);
							$prodottoprev=@mysql_result($risult,0,10);
							$nomeprodotto=puliscitesto(utf8_encode(@mysql_result($risult,0,1)));
							$descprodotto=puliscitesto(utf8_encode(@mysql_result($risult,0,2)));
							
							//Contatore
							$fine=$fine+1;
?>							<table style="padding-left: 10px; color: #fff; background-color: #333; font-size: 16px; font-weight: bold; height: 30px; width: 720px; border: 1px solid #000; font-family: Arial;" cellpadding="0" cellspacing="0">
								<tr>
									<td width="620px"><? print puliscitesto(strtoupper($nomemarca)." - ".$nomeprodotto); ?></td>
									<td><a href="visualizzapreventivo.php?elimprod=<? print $data[1];?>&visualizza=<? print $idvisualizza;?>" style="color: #fff;">X Elimina</a></td>
								</tr>
							</table>
							<table style="height: 50px; width: 720px; border: 1px solid #000; font-family: Arial;" cellpadding="0" cellspacing="0">
								<tr>
									<td style="border: 1px solid #000; width: 100px;"><img src="<? print "../upload/".$prodottoprev; ?>" width="100px" height="100px"></td>
									<td style="border: 1px solid #000; width: 400px;"><? print "<div style=\"font-family: Arial; font-size: 12px; padding-left: 10px;\">".puliscitesto($descprodotto)."</div>"; ?></td>
									<td style="border: 1px solid #000; width: 220px;">
										<center>
											<span style="font-family: Arial; font-size: 14px; font-weight: bold;">Prezzo dell'articolo:<br />
											<input type="text" name="prezzo<? print $fine; ?>" id="prezzo<? print $fine; ?>" value="<? print $prezzodb; ?>" onkeypress="javascript: sistemaprezzo(this.value,this);">
											<input type="hidden" name="idprodotto<? print $fine; ?>" id="idprodotto<? print $fine; ?>" value="<? print $data[1]; ?>">
											<input type="hidden" name="salvaprezzi" id="salvaprezzi" value="1">
											<input type="hidden" name="fine" id="fine" value="<? print $fine; ?>">
										</center>
									</td>
								</tr>
							</table>
<?							if(strlen($notadb)>0){
?>								<div id="imgnota<? print $fine;?>" name="<? print $fine;?>" style="display: none; height: 30px; width: 720px; margin-bottom: 10px;">
									<img src="immagini/nota.jpg" border="0" name="<? print $fine;?>" Onclick='javascript: aprinota(this.name);'>
								</div>
								<div id="contenutonota<? print $fine;?>" name="<? print $fine;?>" style="margin-bottom: 10px; font-weight: bold; background-color: #ccc; height: 30px; width: 720px; font-size: 16px; border: 1px solid #000; font-family: Arial;">
									<div style="float: left;">Nota: <input type="text" name="nota<? print $fine;?>" id="nota<? print $fine;?>" value="<? print $notadb; ?>" style="width: 649px;"></div>
									<div style="float: left; width: 15px; padding-left: 6px;"><img src="immagini/x.jpg" id="<? print $fine;?>" Onclick='javascript: chiudinota(this.id);'></div>
								</div>
<?							}else{
?>								<div id="imgnota<? print $fine;?>" name="<? print $fine;?>" style="height: 30px; width: 720px; margin-bottom: 10px;">
									<img src="immagini/nota.jpg" name="<? print $fine;?>" border="0" Onclick='javascript: aprinota(this.name);'>
								</div>
								<div id="contenutonota<? print $fine;?>" name="<? print $fine;?>" style="display: none; margin-bottom: 10px; font-weight: bold; background-color: #ccc; height: 30px; width: 720px; font-size: 16px; border: 1px solid #000; font-family: Arial;">
									<div style="float: left;">Nota: <input type="text" name="nota<? print $fine;?>" id="nota<? print $fine;?>" value="<? print $notadb; ?>" style="width: 649px;"></div>
									<div id="<? print $fine;?>" style="float: left; width: 15px; padding-left: 6px;"><img src="immagini/x.jpg"  id="<? print $fine;?>" Onclick='javascript: chiudinota(this.id);'></div>
								</div>
<?							}
						}
?>				 
								<table>
								<td style="vertical-align: middle">
										<input type="Submit" name="aggiungi" id="aggiungi" value="Salva preventivo">
										<input type="hidden" name="idpreventivo" id="idpreventivo" value="<? print $idvisualizza; ?>">			
								</td>
								<td style="vertical-align: middle">		
									 </form>
						 
										 
											<input type="button" name="aggiungi" id="aggiungi" value="Aggiungi prodotto" onclick="javascript: caricapagina();">
								</td>
								<!--[if IE]><link rel="stylesheet" type="text/css" href="all-ie.css" media="all"/>	<![endif]-->

 
								<style type="text/css">
								.allinbotton
								{
									vertical-align: middle;
								}
								</style>
								
								<!--[if IE]>
								<style type="text/css">
								.allinbotton
								{
								 	 
									padding-top: 17px;
									vertical-align: middle;
								}
								</style>
								<![endif]-->
								<td class="allinbotton">		
									
						 
									
											<form  style="height:8px;" action="anteprimapreventivo.php" method="POST">
												<input type="hidden" name="nome" id="nome" value="<? print ucfirst($nomeutentedb)." ".ucfirst($cognomeutentedb);?>">
												<input type="hidden" name="via" id="via" value="<? print $viadb; ?>">
												<input type="hidden" name="sesso" id="sesso" value="<? print $sessodb; ?>">
												<input type="hidden" name="tel" id="tel" value="<? print $teldb; ?>">
												<input type="hidden" name="email" id="email" value="<? print $emaildb; ?>">
												<input type="hidden" name="cap" id="cap" value="<? print $capdb; ?>">
												<input type="hidden" name="paese" id="paese" value="<? print $paesedb; ?>">
												<input type="hidden" name="idvisualizza" id="idvisualizza" value="<? print $idvisualizza; ?>" >
												<input type="submit" name="cmd" id="cmd" value="Anteprima preventivo" <? if($errore==true or strlen($idprevv)==0){ print "disabled=\"disabled\"";}?>>			
											</form>
								
									
									
								</td>
								<td class="allinbotton">	
									<form  style="height:8px;" action="provainvio.php" method="GET">
										<input type="Submit" name="aggiungi" id="aggiungi" value="Invia preventivo" <? if($errore==true or strlen($idprevv)==0){ print "disabled=\"disabled\"";}?> >
										<input type="hidden" name="idpreventivo" id="idpreventivo" value="<? print $idvisualizza; ?>" >
										<input type="hidden" name="idutente" id="idutente" value="<? print $idutentedb; ?>" >
										<input type="hidden" name="email" id="email" value="<? print $emaildb; ?>" >
									</form> 
								</td>
							</tr>
							<tr>
								<td>
									<form action="stampapreventivo.php" method="POST">
										<input type="Submit" name="aggiungi" id="aggiungi" value="Stampa preventivo" <? if($errore==true or strlen($idprevv)==0){ print "disabled=\"disabled\"";}?>>
										<input type="hidden" name="idpreventivo" id="idpreventivo" value="<? print $idvisualizza; ?>">
									</form>
								</td>
							</tr>
						</table>			
<?					}else{
						print "Nessun prodotto inserito";
					}
?>			</div>
		</div>
					</td>
				</tr>
			</table>
</body>
<div id="oscura"></div>
</html>
<?}else{
?>	<meta http-equiv="refresh" content="0 url=http://<? print $_SERVER['HTTP_HOST'];?>">
<?	
}?>