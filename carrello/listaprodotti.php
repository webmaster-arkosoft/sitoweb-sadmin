<?php
	
	// include config
	include "config.php";
	//connessione al database
	$db = mysql_connect($host, $user, $psw) or die ("Errore nella connessione.");
	//selezione del database
	mysql_select_db($database) or die ("Non riesco a selezionare il database");
	
	//Lista prodotti
	$query=mysql_query("SELECT * FROM prodotticarrello") or die ("Query prodotti non eseguita!");
	while($data=mysql_fetch_array($query)){
		//Array(ID,IMMAGINE PRODOTTO,NOME PRODOTTO,SISTEMA OPERATIVO,QUANTITA' INIZIALE,DURATA PRODOTTO,PREZZO SENZA IVA,KG DEL PRODOTTO
		$listaprodotti[]=Array($data[0],$data[1],$data[2],$data[3],"1",$data[4]." anno",$data[5],$data[6]);
		 
	}
	
	//Seleziono un prodotto che è stato scelto in base all'id GET
	$prodottoscelto=$_GET['prodottodb']-1;
	//Se quello scelto è minore dell'array totale lo inserisco
	if($prodottoscelto<count($listaprodotti)){
		$software=$listaprodotti[$prodottoscelto];
	}
	
	mysql_close($db);
?>	