<?
	//Controlo se i campi sono corretti
		//Controllo del titolo
		if(isset($_POST['titolo']) and strlen($_POST['titolo'])>0){
			$titolo=$_POST['titolo'];
		}else{
			$errore="Il titolo del prodotto risulta vuoto!!!<br />";
		}
		//Controllo della descrizione
		if(isset($_POST['descrizione']) and strlen($_POST['descrizione'])>0){
			$descrizione=$_POST['descrizione'];
		}else{
			$errore.="La descrizione del prodotto risulta vuota!!!<br />";
		}
		//Controllo immagine
		if(isset($_POST['listbox']) and strlen($_POST['listbox'])>0){
			$img=$_POST['listbox'];
		}else{
			$errore.="Nessuna immagine caricata!!!<br />";
		}
		//Controllo categoria
		if(isset($_POST['categoria']) and strlen($_POST['categoria'])>0){
			$categoria=$_POST['categoria'];
		}else{
			$errore.="Nessuna categoria scelta!!!<br />";
		}
		//Controllo marca
		if(isset($_POST['marca']) and strlen($_POST['marca'])>0){
			$marca=$_POST['marca'];
		}else{
			$errore.="Nessuna marca scelta!!!<br />";
		}
		//Misure
		$lunghezza=$_POST['l'];
		$altezza=$_POST['h'];
		$profondita=$_POST['p'];
		$lunghezza2=$_POST['l2'];
		$altezza2=$_POST['h2'];
		$altezza3=$_POST['h3'];
		$diametro=$_POST['d'];
		$profondita2=$_POST['p2'];
		//prezzo offerta
		$prezzo=$_POST['prezzo'];
	//fine controllo
	
	
	//CARICO PRODOTTI
	//Controllo se esistono errori li stampa altrimenti puoi inserire un nuovo prodotto
if(isset($errore)){
?>
	<div style='border: 2px dashed #BBBBBB;width: 100%; height:50px; font-size: 20px; padding: 15px; background-color: #F0F0F0;'>
		<p>
			<strong><? print $errore;?></strong>
		</p>
 		<form name='indietro' id='indietro' method='POST' action='caricoprodotti.php'>
			<input type="hidden" name="arrayimg" id="arrayimg" value="<? print $img; ?>">
			<input type="hidden" name="titolo" id="titolo" value="<? print $titolo; ?>">
			<input type="hidden" name="descrizione" id="descrizione" value="<? print $descrizione; ?>">
			<input type="hidden" name="marca" id="marca" value="<? print $marca; ?>">
			<input type="hidden" name="categoria" id="categoria" value="<? print $categoria; ?>">
			<input type="hidden" name="l" id="l" value="<? print $lunghezza; ?>">
			<input type="hidden" name="h" id="h" value="<? print $altezza; ?>">
			<input type="hidden" name="p" id="p" value="<? print $profondita; ?>">
			<input type="hidden" name="ritorno" id="ritorno" value="ritorno">
<?			if($_POST['offerte']=="1"){
?>				<input type="hidden" name="prezzo" id="prezzo" value="<? print $prezzo; ?>">
<?			}
			if(strlen($_POST['legno'])>0 or strlen($_POST['colore'])>0 or strlen($_POST['anno'])>0 or strlen($_POST['ante'])>0 or strlen($_POST['cassetti'])>0 or strlen($_POST['posti'])>0 or strlen($_POST['finitura'])>0 or strlen($_POST['laccatura'])>0 or strlen($_POST['forma'])>0 or strlen($_POST['tipo'])>0 or strlen($_POST['stile'])>0 or strlen($_POST['particolari'])>0){
?>				<input type="hidden" name="legno" id="legno" value="<? print $_POST['legno']; ?>">
				<input type="hidden" name="colore" id="colore" value="<? print $_POST['colore']; ?>">
				<input type="hidden" name="anno" id="anno" value="<? print $_POST['anno']; ?>">
				<input type="hidden" name="ante" id="ante" value="<? print $_POST['ante']; ?>">
				<input type="hidden" name="cassetti" id="cassetti" value="<? print $_POST['cassetti']; ?>">
				<input type="hidden" name="posti" id="posti" value="<? print $_POST['posti']; ?>">
				<input type="hidden" name="finitura" id="finitura" value="<? print $_POST['finitura']; ?>">
				<input type="hidden" name="laccatura" id="laccatura" value="<? print $_POST['laccatura']; ?>">
				<input type="hidden" name="forma" id="forma" value="<? print $_POST['forma']; ?>">
				<input type="hidden" name="tipo" id="tipo" value="<? print $_POST['tipo']; ?>">
				<input type="hidden" name="stile" id="stile" value="<? print $_POST['stile']; ?>">
				<input type="hidden" name="particolari" id="particolari" value="<? print $_POST['particolari']; ?>">
<?			}
?>			<input type="Submit" id="submit" name="submit" value="<< Indietro">
		</form>
	</div>	
<?	
}else{
	//Inserimento nel database
	//Dati database, connessione e selezione del database
	include "../config.php";
	//connessione al database
	$db = mysql_connect($host, $user, $psw) or die ("Errore nella connessione. Verificare i parametri nel file config.inc.php");
	//selezione del database
	mysql_select_db($database) or die ("Non riesco a selezionare il database");
	//query di inserimento prodotti
	$query = mysql_query("Update prodotti set titolo='".mysql_real_escape_string($titolo)."', descrizione='".mysql_real_escape_string($descrizione)."', idmarca='$marca', idcategoria='$categoria', l='$lunghezza', p='$profondita', h='$altezza' where id='".$_GET['mod']."'") or die("Errore.La queryprod non è stata eseguita");
	//ricavo l'id del prodotto
	$idultimo=mysql_insert_id();
	if($_POST['misureex']=="1"){
		$querymis=mysql_query("select * from misure where idprodotto='".$_GET['mod']."'") or die ("Query:  non eseguita!");
		//conto i prodotti inseriti
		$righe=mysql_num_rows($querymis);
		if($righe>0){
			//query di modifica misure
			$query1 = mysql_query("Update misure set d='".$diametro."', h3='".$altezza3."', l2='".$lunghezza2."',h2='".$altezza2."',p2='".$profondita2."' where idprodotto='".$_GET['mod']."'") or die("Errore.La query misure non è stata eseguita");
		}else{
			//query di inserimento misure
			$query1 = mysql_query("insert into misure values(default,'".$_GET['mod']."','$diametro', '$altezza3', '$lunghezza2','$altezza2','$profondita2')") or die("Errore.La query non è stata eseguita");
		}
	}
	if($_POST['misureex']=="0"){
		//query per eliminare le misure del prodotto
		mysql_query("DELETE FROM misure where idprodotto='".$_GET['mod']."'");	
	}
	//query di inserimento offeta
	if($_POST['offerte']=="1"){
		//query di ricavo informazione prodotto
		$query="select * from offerte where idprodotto='".$_GET['mod']."'";
		$ris=mysql_query($query) or die ("Query: ".$query." non eseguita!");
		$idof=@mysql_result($ris,0,0);
		//se l'offerta esiste la modifica altrimenti la inserisce come nuova
		if(strlen($idof)>0){
			$queryofferte = mysql_query("Update offerte set prezzo='$prezzo' where idprodotto='".$_GET['mod']."'") or die("Errore.La query non è stata eseguita");
		}else{
			$queryofferte = mysql_query("insert into offerte values(default,'".$_GET['mod']."', '$prezzo')") or die("Errore.La query non è stata eseguita");
		}
	}else{
		//eliminazione nella tabella offerte
		mysql_query("DELETE FROM offerte where idprodotto='".$_GET['mod']."'");
	}
	//inserimento avanzate del prodotto
	if(strlen($_POST['legno'])>0 or strlen($_POST['colore'])>0 or strlen($_POST['anno'])>0 or strlen($_POST['ante'])>0 or strlen($_POST['cassetti'])>0 or strlen($_POST['posti'])>0 or strlen($_POST['finitura'])>0 or strlen($_POST['laccatura'])>0 or strlen($_POST['forma'])>0 or strlen($_POST['tipo'])>0 or strlen($_POST['stile'])>0 or strlen($_POST['particolari'])>0){
		//query di ricavo informazione prodotto
		$query="select * from avanzate where idprodotto='".$_GET['mod']."'";
		$ris=mysql_query($query) or die ("Query: ".$query." non eseguita!");
		$idav=@mysql_result($ris,0,0);
		//Se è le avanzate di questo prodotto esistono le modifica altrimenti le inserisce come nuovo
		if(strlen($idav)>0){
			$queryavanzate = mysql_query("Update avanzate set legno='".htmlentities($_POST['legno'])."', colore='".htmlentities($_POST['colore'])."', anno='".htmlentities($_POST['anno'])."', ante='".$_POST['ante']."', cassetti='".$_POST['cassetti']."', posti='".$_POST['posti']."', finitura='".$_POST['finitura']."', laccatura='".$_POST['laccatura']."', forma='".$_POST['forma']."', tipo='".$_POST['tipo']."', stile='".$_POST['stile']."', particolari='".$_POST['particolari']."' where idprodotto='".$_GET['mod']."'") or die("Errore.La queryavanzate non è stata eseguita");
		}else{
			$queryavanzate = mysql_query("insert into avanzate values(default,'".$_GET['mod']."','".htmlentities($_POST['legno'])."', '".htmlentities($_POST['colore'])."', '".htmlentities($_POST['anno'])."', '".$_POST['ante']."', '".$_POST['cassetti']."','".$_POST['posti']."', '".$_POST['finitura']."','".$_POST['laccatura']."','".$_POST['forma']."','".$_POST['tipo']."','".$_POST['stile']."','".$_POST['particolari']."')") or die("Errore.La query non è stata eseguita");
		}
	}else{
		//eliminazione nella tabella avanzate
		mysql_query("DELETE FROM avanzate where idprodotto='".$_GET['mod']."'");
	}
	//Distruggo la sessione delle img
	$_SESSION['lista']="";
	unset($_SESSION['lista']);	
?>
		<div style='border: 2px dashed #BBBBBB;width: 100%; height:50px; font-size: 20px; padding: 15px; background-color: #F0F0F0;'>
			<p>
				<strong>Il prodotto &egrave; stato modificato correttamente.</strong>
			</p>
			<p style="padding-top: 50px;">
				<a href="<? print "modificaprodotti.php?mod=".$_GET['mod'].""; ?>" title="Indietro"> 
					Torna indietro.
			</p>
		</div>
	<script language="javascript">
	//vieni rindirizzato alla pagina della gestione delle categorie
	function doLoad()  { setTimeout( 'refresh()', 0 ); }
	function refresh() { window.location.href = "modificaprodotti.php?mod="+<? print $_GET['mod']; ?>+"";}
	</script>
	<body onload='doLoad()'>
<?}?>	