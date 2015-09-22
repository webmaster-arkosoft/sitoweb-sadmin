<?	//Inizializzo sessione
	session_start();
	//Se è stato effettuato il login accedi a questa pagina
	if(isset($_SESSION['wadmin']) and $_SESSION['wadmin']=="1"){
	unset($_SESSION['query']);
	//settaggio variabili
	$filename = "inclusi/setting.php";
	//Dati database, connessione e selezione del database
	include "../config.php";
	
	//opzioni
	if(isset($_POST['modifica']) and strlen($_POST['modifica'])>0){
		if($_POST['notifica']==true){
			$notifica='si';
		}else{
			$notifica='no';
		}
		$contenuto1 = "<? ".chr(36)."messaggio='".$_POST['descrizione']."'; ".chr(36)."notifica='".$notifica."';  ".chr(36)."num='".$_POST['numprod']."'; ".chr(36)."legge='".str_replace("'","\'",$_POST['legge'])."';?>";
		$handle1=fopen($filename,"w"); //apre il file
		fwrite($handle1, $contenuto1);
		fclose($handle1);
	}

	//ricavo i dati inseriti
	include "inclusi/setting.php";
	
	//Ricavo il browser osato
	$lista=$_SERVER['HTTP_USER_AGENT'];
	$browser=explode(';',$lista);
	$browser=$browser[1];
?>	
<html>
<head>
	<title>S-admin -- Impostazioni</title>
	<!--STILE BACHECA-->
	<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8"/>
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
	<script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
	<script language="JavaScript" type="text/javascript" src="js/menu.js"></script>
	<script language="JavaScript" type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript" src="js/animatedcollapse.js"></script> 
	<script type="text/javascript" src="editor/wysiwyg1.js"></script> 
	<script type="text/javascript" src="js/animatedcollapse.js"></script> 
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
<?					if(isset($_POST['modifica']) and strlen($_POST['modifica'])>0){	
?>					<div class='messaggio'>
<?						//messaggio di avvenuta modifica
						echo '<div id="message" class="updated fade"><p><strong>Modifiche apportate correttamente!</strong></p></div>';
?>					</div>
<?					}
?>			
			<form action="#" method="post" name="ins" id="ins">
				<img src="immagini/icona_opzioni.gif">Impostazioni
				<hr />
				<div class="contentitolo1">
						In questa sezione potrete impostare il numero di prodotti per pagina che verranno visualizzati nella Home.<br /><br /><br /> 
						Prodotti per pagina:
						<input type="text" name="numprod" id="numprod" value="<? print $num; ?>" size="4" style="font-size: 20px;">
				</div>
				<div class="contentitolo">&nbsp;</div>	
				<hr />
				<div class="contentitolo1">
					In questa sezione potrete impostare il messaggio che andr&agrave; a visualizzare un nuovo utente quando attiver&agrave; il suo account.<br /><br /><br /> 
				</div>
				<textarea id="descrizione" name="descrizione"><? print $messaggio; ?></textarea>
					<script language="JavaScript">
						generate_wysiwyg('descrizione');
					</script>
					<div class="contentitolo1">
						<input type="checkbox" name="notifica" id="notifica" <? if($notifica=="si"){print "checked='checked'"; } ?>> Avvisami tramite email quando un nuovo utente si registra al sito
					</div>
				<br />	
				<hr />
				<div class="contentitolo1">
					In questa sezione potrete inserire o modificare la legge sulla privacy visualizzata al momento della registrazione di un nuovo utente.<br /><br /><br /> 
				</div>
				<textarea id="legge" name="legge" cols="55" rows="10"><? print $legge; ?></textarea>
					<script language="JavaScript">
						generate_wysiwyg('legge');
					</script>
				<br />	
				<hr />				
					<div style="text-align:right; padding-right: 70px;">
						<input type="Submit" name="cmd" id="cmd" value="Aggiorna Modifiche">
					</div>	
					<input type="hidden" name="modifica" id="modifica" value="1">
			</form>	
			</div>
		</div>
										</td>
				</tr>
			</table>
	</div>
</body>
</html>
<?}else{
?>	<meta http-equiv="refresh" content="0 url=http://<? print $_SERVER['HTTP_HOST'];?>">
<?	
}?>