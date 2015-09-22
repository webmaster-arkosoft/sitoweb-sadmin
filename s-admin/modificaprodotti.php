<?	//Inizializzo sessione
	session_start();
	//Se è stato effettuato il login accedi a questa pagina
	if(isset($_SESSION['wadmin']) and $_SESSION['wadmin']=="1"){

	//Dati database
	include "../config.php";
	//connessione al database
	$db = mysql_connect($host, $user, $psw) or die ("Errore nella connessione. Verificare i parametri nel file config.inc.php");
	//selezione del database
	mysql_select_db($database) or die ("Non riesco a selezionare il database");
	//query di ricavo informazione prodotto
	$query=mysql_query("select * from prodotti where id='".$_GET['mod']."'") or die ("Query: non eseguita!");
	//Settaggio variabili
	if(isset($_POST['back']) and $_POST['back']=="errore"){
		$titolo=$_POST['titolo'];
		$descrizione=$_POST['descrizione'];
		$idmarca=$_POST['marca'];
		$idcat=$_POST['categoria'];
		$lunghezza=$_POST['l'];
		$profondita=$_POST['p'];
		$altezza=$_POST['h'];
		$lunghezza2=$_POST['l2'];
		$profondita2=$_POST['p2'];
		$altezza2=$_POST['h2'];
		$altezza3=$_POST['h3'];
		$diametro=$_POST['d'];
		$listaimg=$_POST['arrayimg'];
	}else{
		$titolo=@mysql_result($query,0,1);
		$descrizione=@mysql_result($query,0,2);
		$idmarca=@mysql_result($query,0,3);
		$idcat=@mysql_result($query,0,4);
		$lunghezza=@mysql_result($query,0,5);
		$profondita=@mysql_result($query,0,6);
		$altezza=@mysql_result($query,0,7);
		//immagini del prodotto
		$queryimg="select imgmin from prodotti,immagini where prodotti.id=idprodotto and idprodotto='".$_GET['mod']."'";
		$risult=mysql_query($queryimg) or die ("Query: ".$queryimg." non eseguita!");
	}
	//query per vedere se il prodotto è un'offerta
	$querymis=mysql_query("select * from misure where idprodotto='".$_GET['mod']."'") or die ("Query:  non eseguita!");
	$misuredb=@mysql_result($querymis,0,0);
	$lunghezza2=@mysql_result($querymis,0,4);
	$profondita2=@mysql_result($querymis,0,6);
	$altezza2=@mysql_result($querymis,0,5);
	$altezza3=@mysql_result($querymis,0,3);
	$diametro=@mysql_result($querymis,0,2);
	//query per vedere se il prodotto ha doppie misure
	$queryoff="select * from offerte where idprodotto='".$_GET['mod']."'";
	$risoff=mysql_query($queryoff) or die ("Query: ".$queryoff." non eseguita!");
	$offerta=@mysql_result($risoff,0,0);
	$prezzo=@mysql_result($risoff,0,2);
	//query per vedere se il prodotto ha delle avanzate
	$queryof="select * from avanzate where idprodotto='".$_GET['mod']."'";
	$risof=mysql_query($queryof) or die ("Query: ".$queryof." non eseguita!");
	$idavanzate=@mysql_result($risof,0,0);
	$legno=@mysql_result($risof,0,2);
	$colore=@mysql_result($risof,0,3);
	$anno=@mysql_result($risof,0,4);
	$ante=@mysql_result($risof,0,5);
	$cassetti=@mysql_result($risof,0,6);
	$posti=@mysql_result($risof,0,7);
	$finitura=@mysql_result($risof,0,8);
	$laccatura=@mysql_result($risof,0,9);
	$forma=@mysql_result($risof,0,10);
	$composto=@mysql_result($risof,0,11);
	$stile=@mysql_result($risof,0,12);
	$particolari=@mysql_result($risof,0,13);
	
	//browser
	$lista=$_SERVER['HTTP_USER_AGENT'];
	$browser=explode(';',$lista);
	$browser=$browser[1]; 
?>	
<html>
<head>
	<title>S-admin -- Modifica prodotto</title>
	<!--STILE BACHECA-->
	<?php 
		if(strstr($browser, 'MSIE')==true){
	?>
			<link rel="stylesheet" type="text/css" href="css/bacheca.css" media="screen" />
	<?php	}else{?>
			<link rel="stylesheet" type="text/css" href="css/bacheca_moz.css" media="screen" />
	<?php	}?>	
	<link rel="stylesheet" type="text/css" href="css/stylemenu.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/sddm.css" media="screen" />
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/effetto.js"></script>
	<script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
	<script language="JavaScript" type="text/javascript" src="js/menu.js"></script>
	<script language="JavaScript" type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript" src="editor/wysiwyg1.js"></script> 
	<script type="text/javascript" src="js/animatedcollapse.js"></script> 
	<!--FINE BACHECA-->
</head>
<body>
	<div class="box1">
<?		include "inclusi/header.php"?>
		<table width="990px;" border="0">
			<tr>
				<td width="215px;" valign="top">
					<div class="menusinistra">
						<? include "inclusi/menuleft.php"; ?>
					</div>
				</td>
				<td width="770px">		
			<div class="menucentro">
				<img src="immagini/icona_prodotti.gif">Modifica Prodotto
				<hr />
				<form action="modificadbprodotto.php?mod=<? print $_GET['mod']; ?>" method="post" name="ins" id="ins" Onsubmit="return controlloprodotto();">
				<table style="width: 700px" border="0"  style="font-family: Arial;">
					<tr>
						<td width="500px">
							<input type="text" name="titolo" id="titolo" value="<? print html_entity_decode($titolo); ?>" size="42" style="font-size: 20px;">
						</td>
						<td width="200px">
							<a href="gestioneimgmod.php?idprod=<? print $_GET['mod']; ?>"><img src="immagini/gestioneimg.gif" border="0"></a>
						</td>
					</tr>
				</table>
				<table style="width: 700px" height="370" border="0" style="font-family: Arial;">
					<tr>
						<td width="500px" valign="top">
							<textarea id="descrizione" name="descrizione"><? print str_replace(chr(92)."'","'",$descrizione); ?></textarea>
							<script language="JavaScript">
								generate_wysiwyg('descrizione');
							</script>
						</td>
						<td width="200px" valign="top">
							<b>Lista immagini</b><br>
<? 							$listaimg=explode(",",$listaimg); ?>
							<select id="listbox" name="listbox" multiple size="3" class="listbox">
<? 								for($a=0;$a<count($listaimg);$a++){ 
									if(strlen($listaimg[$a])>0){
?>										<option value="<? print $listaimg[$a]; ?>" selected><? print $listaimg[$a]; ?></option>
<? 										$listanew=$listanew.",".$listaimg[$a];
									}
								}
								if(isset($_GET['mod']) and $_GET['mod']>0){ 
									while($db_img=mysql_fetch_array($risult)){
										if(strlen(substr($db_img[0],11))>0){
?>											<option value="<? print substr($db_img[0],11); ?>" selected><? print substr($db_img[0],11); ?></option>
<?											$listanew=$listanew.",".substr($db_img[0],11);
										}
									}
								}							
?>							</select>						
						</td>
					</tr>
				</table>
				<table style="width: 700px" border="0" style="font-family: Arial;">
					<tr>
						<td width="400px">
							Marca:&nbsp;
<?							//Seleziono la marche ke è stata scelta prima
							$marcadb="select * from marche where id='".$idmarca."'";
							$marcains=mysql_query($marcadb) or die ("Query: ".$marcadb." non eseguita!");
							$marcai=@mysql_result($marcains,0,1);
							//Seleziono tutto le marche tranne quella selezionata
							$q="select * from marche where id!='".$idmarca."' order by nome asc";
							$r=mysql_query($q) or die ("Query: ".$q." non eseguita!");
?>							<select name='marca'>
								<option value='<? print $idmarca; ?>' selected><? print str_replace(chr(92)."'","'",$marcai); ?></option>
								<option value="0">--Marca--</option>
<?								while($data=mysql_fetch_array($r)){
?>									<option value='<? print $data[0]; ?>'><? print str_replace(chr(92)."'","'",$data[1]); ?></option>
<? 								}
?>							</select>
						</td>
						<td width="300px">
							Categoria:&nbsp;
<?							//Seleziono la categoria scelta prima
							$categoriains=mysql_query("select * from categorie where id='".$idcat."' order by nome asc") or die ("Query non eseguita!");
							$categoriai=@mysql_result($categoriains,0,1);
							//ricavo tutte le categorie inseriti tranne quella selezionata
							$q=mysql_query("select * from categorie where id!='".$idcat."' order by nome asc") or die ("Query non eseguita!");	
							//conto i prodotti inseriti
							$controllo=mysql_num_rows($q);
?>							<select name='categoria'>
<?								if(strlen($controllo)>0){
									if(strlen($categoriai)>0){
?>										<option value='<? print $idcat; ?>' selected><? print $categoriai; ?></option>
<?									}else{
?>										<option value='0' selected>--Categoria--</option>
<?									}
									while($data=mysql_fetch_array($q)){
?>										<option value='<? print $data[0]; ?>'><? print str_replace(chr(92)."'","'",$data[1]); ?></option>
<? 									}
								}
?>							</select>						
						</td>
					</tr>
				</table>
				<table style="width: 700px; font-family: Arial; margin-top: 30px; margin-bottom: 30px; background-color: #D5E2EB;">
					<tr>
						<td height="50">
							Misure: <br />
							L: <input type="text" name="l" id="l" value="<? print $lunghezza; ?>" size="2"> P: <input type="text" name="p" id="p" value="<? print $profondita; ?>"  size="2"> H: <input type="text" name="h" id="h" value="<? print $altezza; ?>"  size="2">
						</td>
					</tr>
<?					if(strlen($misuredb)>0){					
?>						<tr>					
							<td height="50">
								<b>Altre Misure:</b> 
								<input type="radio" checked="checked" name="misureex" id="misureex" Onclick="javascript: document.getElementById('divanimatom').style.display = 'block';" value="1"> Attiva 
								<input type="radio" name="misureex" id="misureex" Onclick="javascript: document.getElementById('divanimatom').style.display = 'none';"  value="0"> Disattiva
								<br />
								<div id="divanimatom" style="display:block" class="offerte">
									L2: <input type="text" name="l2" id="l2" value="<? print $lunghezza2; ?>" size="2"> P2: <input type="text" name="p2" id="p2" value="<? print $profondita2; ?>"  size="2"> H2: <input type="text" name="h2" id="h2" value="<? print $altezza2; ?>"  size="2"><br /><br />
									D2: <input type="text" name="d" id="d" value="<? print $diametro; ?>"  size="2"> H2: <input type="text" name="h3" id="h3" value="<? print $altezza3; ?>"  size="2">
								</div>
							</td>
						</tr>
<?					}else{
?>						<tr>					
							<td height="50">
								<b>Seconde Misure:</b> 
								<input type="radio" name="misureex" id="misureex" Onclick="javascript: document.getElementById('divanimatom').style.display = 'block';" value="1"> Attiva 
								<input type="radio" checked="checked" name="misureex" id="misureex" Onclick="javascript: document.getElementById('divanimatom').style.display = 'none';"  value="0"> Disattiva
								<br />
								<div id="divanimatom" style="display:none" class="offerte">
									L2: <input type="text" name="l2" id="l2" value="<? print $lunghezza2; ?>" size="2"> P2: <input type="text" name="p2" id="p2" value="<? print $profondita2; ?>"  size="2"> H2: <input type="text" name="h2" id="h2" value="<? print $altezza2; ?>"  size="2"><br /><br />
									D2: <input type="text" name="d" id="d" value="<? print $diametro; ?>"  size="2"> H2: <input type="text" name="h3" id="h3" value="<? print $altezza3; ?>"  size="2">
								</div>
							</td>
						</tr>
<?					}
?>				</table>
				<div class="offerte">
<?					if(strlen($offerta)>0){
?>						<input type="radio" name="offerte" id="offerte" Onclick="javascript: document.getElementById('divanimato').style.display = 'none';" value="0"> Prodotto 
						<input type="radio" checked="checked" name="offerte" id="offerte" Onclick="javascript: document.getElementById('divanimato').style.display = 'block';"  value="1"> Offerta
						<div id="divanimato" style="display:block" class="offerte">
							Prezzo: <input type="text" name="prezzo" id="prezzo" value="<? print $prezzo; ?>">
						</div><br />	
<?					}else{
?>						<input type="radio" checked="checked" name="offerte" id="offerte" Onclick="javascript: document.getElementById('divanimato').style.display = 'none';" value="0"> Prodotto 
						<input type="radio" name="offerte" id="offerte" Onclick="javascript: document.getElementById('divanimato').style.display = 'block';"  value="1"> Offerta
						<div id="divanimato" style="display:none" class="offerte">
							Prezzo: <input type="text" name="prezzo" id="prezzo" value="<? print $_POST['prezzo']; ?>">
						</div>
<?					}
?>				</div><br />
<?				if(strlen($idavanzate)>0){?>
						<div class="offerte" onmousedown="if(document.getElementById('divanimato1').style.display == 'none'){ document.getElementById('divanimato1').style.display = 'block'; }else{ document.getElementById('divanimato1').style.display = 'none'; }"> <img src="immagini/avanzate.jpg" border="0"> <u>Avanzate</u> </div>
						<div id="divanimato1" style="display:block" class="offerte1">
<?					}else{
?>						<div class="offerte" onmousedown="if(document.getElementById('divanimato1').style.display == 'none'){ document.getElementById('divanimato1').style.display = 'block'; }else{ document.getElementById('divanimato1').style.display = 'none'; }"> <img src="immagini/avanzate.jpg" border="0"> <u>Avanzate</u> </div>
						<div id="divanimato1" style="display:none" class="offerte1">
<?					}
?>					Legno: &nbsp;&nbsp;<input type="text" name="legno" id="legno" value="<? print $legno; ?>"> &nbsp;&nbsp;&nbsp;&nbsp;Colore: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="colore" id="colore" value="<? print $colore; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Anno: &nbsp;&nbsp;<input type="text" name="anno" id="anno" value="<? print $anno; ?>" size="5"><br /><br />
					Ante: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="ante" id="ante" value="<? print $ante; ?>"> &nbsp;&nbsp;&nbsp;&nbsp;Cassetti: &nbsp;&nbsp;&nbsp;<input type="text" name="cassetti" id="cassetti" value="<? print $cassetti; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Posti: &nbsp;&nbsp;<input type="text" name="posti" id="posti" value="<? print $posti; ?>" size="5"><br /><br />
					Finitura: <input type="text" name="finitura" id="finitura" value="<? print $finitura; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Laccatura: <input type="text" name="laccatura" id="laccatura" value="<? print $laccatura; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Forma: <input type="text" name="forma" id="forma" value="<? print $forma; ?>"><br /><br />
					Tipo(composto, ecc):  &nbsp;&nbsp;<input type="text" name="tipo" id="tipo" value="<? print $composto; ?>"> &nbsp;&nbsp;&nbsp;&nbsp;Stile(moderno, classico, ecc): <input type="text" name="stile" id="stile" value="<? print $stile; ?>"><br /><br />
					Particolari:  &nbsp;&nbsp;<input type="text" name="particolari" id="particolari" value="<? print $particolari; ?>" size="16"><br /><br />
				</div>				
				<div style="text-align:right; padding-right: 70px;">
					<input type="hidden" name="caricoprod" id="caricoprod" value="esegui" />
					<input type="Submit" name="cmd" id="cmd" value="Modifica prodotto">
				</div>	
			</div>
		</div>
	</div>
		</td>
	</tr>
</table>
</body>
</html>
<?}else{
?>	<meta http-equiv="refresh" content="0 url=http://<? print $_SERVER['HTTP_HOST'];?>">
<?	
}?>