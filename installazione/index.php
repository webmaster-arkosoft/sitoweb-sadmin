<?
//INSTALLAZIONE DATABASE
include "../config.php";
//connessione al database
$db = mysql_connect($host, $user, $psw) or die ("Errore nella connessione. Verificare i parametri nel file config.inc.php");
//selezione del database
mysql_select_db($database) or die ("Non riesco a selezionare il database");
//database
$filename = "database.php";
//apre il file
$handle=fopen($filename,"r");
//lettura del file
$contents = fread($handle, filesize($filename));
?>
<html>
<head>
	<title>Installazione Database</title>
</head>
<body>
<div style="border: 2px dashed #BBBBBB;width: 100%; height:50px; font-size: 20px; padding: 15px; background-color: #F0F0F0;">
<?	//divido le query
	$sql=explode(";",$contents);
	$fine=count($sql)-1;
	for($i=0; $i<$fine; $i++){
		//query di creazione
		mysql_query($sql[$i].";") or die ("Creazione tabelle del DB fallita");
	}
	//chiusura db
	mysql_close($db);
	//chiusura file
	fclose($handle);
	//FINE
?>	
	Database creato correttamente!<br /><br />
	<a href="http://<? print $_SERVER['HTTP_HOST']; ?>">Vai alla Home</a>
</div>
</body>
</html>