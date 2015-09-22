<?
	//inizializzo le sessioni
	session_start();
if($_SESSION['invioprev']==0){	
	
	//set_include_path(get_include_path().":./pear");
	require "PEAR.php";
	require "HTTP/Request.php";
	$res =& new HTTP_Request("http://".$_SERVER['HTTP_HOST']."/s-admin/contenutoemailpreventivo.php?idpreventivo=".$_GET['idpreventivo']."");

	$res->sendRequest();
	$body = $res->getResponseBody();
	$total = $body; //contenuto html

	//settaggio variabili
	$percorsosave = "../preventiviinviati/";
	
	//Creo la cartella se nn è presente
	if(is_dir($percorsosave)==false){
		$old = umask(0); 
		mkdir($percorsosave, 0777); 
		umask($old);		
	}
	
	//nome file
	$nomefile=$_GET['idutente']."-".$_GET['idpreventivo'].date("dmYHis").".html";
	
	//settaggio variabili
	$filename=$percorsosave.$nomefile;
	$contenuto1 = $total;
	$handle1=fopen($filename,"x+"); //apre il file
	fwrite($handle1, $contenuto1);
	fclose($handle1);
	
	
	//link
	$percorsolink = "http://www.softwarearredamento.com/preventiviinviati/";
	$link=$percorsolink.$nomefile;
	$link2="http://www.softwarearredamento.com/tema/guidastampa.php";
	$link3="http://www.softwarearredamento.com/tema/guidastampa.php#moz";
	//Invio preventivo via email
	$oggetto="Preventivo n.".$_GET['idpreventivo'];
	$mail="Come da Vostra gentile richiesta Vi inviamo il preventivo relativo ai prodotti da Voi scelti.<br /> Per Visualizzare il preventivo clicca sul seguente link: <br /><br /><a href='$link'><b>visualizza preventivo</b></a><br /><br />Se non riesci a stampare il preventivo correttamente ed utilizzi Internet Explorer <a href=\"$link2\"><b>clicca qui</b></a>.<br/>Se invece utilizzi Mozilla Firefox <a href=\"$link3\"><b>clicca qui</b></a>.<br /><br />Cordiali Saluti<br />Arkosoft";
	//header dell'e-mail
	$header="From: info@softwarearredamento.com\r\n";
	$header.= "MIME-Version: 1.0\n";
	$header.= "Content-type: text/html; charset=\"iso-8859-1\"\n";
	$header.="Content-Transfer-Encoding: 7bit\n";
	//destinatario
	$email=$_GET['email'];
	//invio dell'email al venditore e acquirente
	mail($email,$oggetto,$mail,$header);
	
	$_SESSION['invioprev']=1;
	$spedita=true;
	
	//config
	include $_SERVER['DOCUMENT_ROOT']."/config.php";
	//connessione al database
	$db = mysql_connect($host, $user, $psw) or die ("Errore nella connessione. Verificare i parametri nel file config.inc.php");
	//selezione del database
	mysql_select_db($database) or die ("Non riesco a selezionare il database");
	$idprevins=$_GET['idpreventivo'];
	//controllo se è stato mandato il preventivo
	$queryvis=mysql_query("select * from statopreventivi where idpreventivo='".$idprevins."'") or die ("Query: non eseguita!");
	$risultato=@mysql_num_rows($queryvis);
	if($risultato==0){
		//query per settare che il preventivo è stato inviato
		$query1 = mysql_query("insert into statopreventivi values(default,'".$idprevins."','1')") or die("Errore.La query non è stata eseguita");
	}
}
include "gestionepreventivo.php";
?>	




	