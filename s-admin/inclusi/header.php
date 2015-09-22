<?
	//connessione al database
	$db = mysql_connect($host, $user, $psw) or die ("Errore nella connessione. Verificare i parametri nel file config.iiinc.php");
	//selezione del database
	mysql_select_db($database) or die ("Non riesco a selezionare il database");
	//Trovo i dati dal database
	$ris = mysql_query("select * from utenti where id='".$_SESSION['utente']."'") or die ("Query non eseguita!");
	$nomebac=@mysql_result($ris,0,1);
?>
<div class="box2">
	<div class="header">
		<a href="http://www.softwarearredamento.com" title="Torna alla home">
			<img src="immagini/s-admin.jpg" border="0">
		</a>	
	</div>
	<div class="header1">
		<div class="testoheader1">
			Benvenuto Visitatore 
		</div>	
		<div class="profilo">
			<a href="#" Onclick="javascript: alert('In questa sezione potrete modificare tutte le informazioni del profilo con il quale state visualizzando il pannello');">
				<img src="immagini/freccia.jpg" border="0"> Profilo
			</a>
		</div>
	</div>
</div>