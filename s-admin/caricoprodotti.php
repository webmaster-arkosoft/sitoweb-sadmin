<?php	
//Inizializzo sessione
session_start();
//Se è stato effettuato il login accedi a questa pagina
if(isset($_SESSION['wadmin']) and $_SESSION['wadmin']=="1"){
	unset($_SESSION['query']);
	//Inclusione dati database, connessione e selezione
	include "../config.php";
	//Ricavo il browser osato
	$lista1=$_SERVER['HTTP_USER_AGENT'];
	$browser=explode(';',$lista1);
	$browser=$browser[1]; 	
	
	//session_destroy();  
	//SALVATAGGIO CAMPI
	$titolo=str_replace('\"','"',stripcslashes(htmlspecialchars($_POST['titolo'])));
	$descrizione=str_replace('\"','"',stripcslashes(htmlspecialchars($_POST['descrizione']))); 
	$marca=$_POST['marca']; 
	$categoria=$_POST['categoria']; 
	$l=$_POST['l']; 
	$p=$_POST['p']; 
	$h=$_POST['h']; 
	$l2=$_POST['l2']; 
	$p2=$_POST['p2']; 
	$h2=$_POST['h2']; 
	$h3=$_POST['h3']; 
	$diam=$_POST['diam']; 
	$prezzo=$_POST['prezzo']; 
	$legno=$_POST['legno']; 
	$colore=$_POST['colore']; 
	$anno=$_POST['anno']; 
	$ante=$_POST['ante']; 
	$cassetti=$_POST['cassetti']; 
	$posti=$_POST['posti']; 
	$finitura=$_POST['finitura']; 
	$laccatura=$_POST['laccatura']; 
	$forma=$_POST['forma']; 
	$tipo=$_POST['tipo']; 
	$stile=$_POST['stile']; 
	$particolari=$_POST['particolari'];
	//FINE SALVATAGGIO CAMPI	
?>
<html>
<head>
	<title>S-admin -- Carico prodotto</title>
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
<?php		include "inclusi/header.php"?>
		<div class="box3">
		<table width="990px;" border="0">
			<tr>
				<td width="215px;" valign="top">
					<div class="menusinistra">
						<?php include "inclusi/menuleft.php"; ?>
					</div>
				</td>
				<td width="770px">	
			<div class="menucentro">
				<img src="immagini/icona_prodotti.gif">Carico Prodotti
				<hr />
				<form action="intermedia.php" method="post" name="ins" id="ins" Onsubmit="return controlloprodotto();">
				<table style="width: 700px" border="0"  style="font-family: Arial;">
					<tr>
						<td width="500px"><input type="text" name="titolo" id="titolo" value="<?php print $titolo; ?>" size="42" style="font-size: 20px;"></td>
						<td width="200px">
							<input type="Submit" name="cmd" id="cmd" value="gestioneimg" Onclick="javascript: immagine=true;" class="bottonegestioneimg">
						</td>
					</tr>
				</table>
				<table style="width: 700px" height="370" border="0" style="font-family: Arial;">
					<tr>
						<td width="500px" valign="top">
							<textarea id="descrizione" name="descrizione"><?php print $descrizione; ?></textarea>
							<script language="JavaScript">
								generate_wysiwyg('descrizione');
							</script>
						</td>
						<td width="200px" valign="top">
							<b>Lista immagini</b><br>
							<select id="listbox1" name="listbox1" multiple size="3" class="listbox">
<?php 								if(isset($_POST['arrayimg']) and strlen($_POST['arrayimg'])>0){
										$listaimg=explode(",",$_POST['arrayimg']);
										for($a=0;$a<count($listaimg);$a++){ 
											if(strlen($listaimg[$a])>0){
?>												<option value="<?php print $listaimg[$a]; ?>" selected><?php print $listaimg[$a]; ?></option>
<?php 											$listanew=$listanew.",".$listaimg[$a];
											}
										} 
									}	
?>							</select>
							<input type="hidden" id="listbox" name="listbox" value="<?php print $listanew; ?>">
						</td>
					</tr>
				</table>
				<table style="width: 700px" border="0" style="font-family: Arial;">
					<tr>
						<td width="400px">
							Marca:&nbsp;
<?php							//Dati database, connessione e selezione del database
							include "../config.php";
							//connessione al database
							$db = mysql_connect($host, $user, $psw) or die ("Errore nella connessione. Verificare i parametri nel file config.inc.php");
							//selezione del database
							mysql_select_db($database) or die ("Non riesco a selezionare il database");
							//Seleziono la marche ke è stata scelta prima
							if(strlen($marca)>0 and $marca!=0){
								$marcadb=mysql_query("select * from marche where id='".$marca."'") or die ("Query: marca non eseguita!");
								$nomemarca=@mysql_result($marcadb,0,1);
								$idmarca=@mysql_result($marcadb,0,0);
								//Seleziono tutto le marche tranne quella selezionata
								$q="select * from marche where id!='".$marca."'";
							}else{	
								//Seleziono tutto le marche
								$q='select * from marche order by nome asc';
							}	
							$r=mysql_query($q) or die ("Query: ".$q." non eseguita!");
?>							<select name='marca'>
<?php							if(strlen($nomemarca)>0){ ?>
									<option value='<?php print $idmarca; ?>' selected="selected" /><?php print str_replace(chr(92)."'","'",$nomemarca); ?></option>
<?php							}
?>								<option value="0">--Marca--</option>
<?php							while($data=mysql_fetch_array($r)){
?>									<option value='<?php print $data[0]; ?>'><?php print str_replace(chr(92)."'","'",$data[1]); ?></option>
<?php 							}
?>							</select>
						</td>
						<td width="300px">
							Categoria:&nbsp;
<?php							//Se siamo ritornati indietro rimette la password ke ho inserito prima
							if(strlen($categoria)>0 and $categoria!=0){
								$categoriadb=mysql_query("select * from categorie where id='".$categoria."'") or die ("Query: categorie non eseguita!");
								$nomecategoria=@mysql_result($categoriadb,0,1);
								$idcategoria=@mysql_result($categoriadb,0,0);
								//ricavo tutte le categorie inseriti tranne quella selezionata
								$q="select * from categorie where id!='".$idcategoria."' order by nome asc";
							}else{
								//ricavo tutte le categorie inseriti
								$q='select * from categorie order by nome asc';
							}	
							$r=mysql_query($q) or die ("Query: ".$q." non eseguita!");
?>							<select name='categoria'>
<?php								if(strlen($nomecategoria)>0){ ?>
									<option value='<?php print $idcategoria; ?>'><?php print $nomecategoria; ?>
<?php								}
?>								<option value="0">--Categoria--</option>
<?php								while($data=mysql_fetch_array($r)){
?>									<option value='<?php print $data[0]; ?>'><?php print $data[1] ?></option>
<?php 								}
?>							</select>							
						</td>
					</tr>
				</table>
				<table style="width: 700px; font-family: Arial; margin-top: 30px; margin-bottom: 30px; background-color: #D5E2EB;">
					<tr>
						<td height="50">
							Misure: <br />
							L: <input type="text" name="l" id="l" value="<?php print $l; ?>" size="2"> P: <input type="text" name="p" id="p" value="<?php print $p; ?>"  size="2"> H: <input type="text" name="h" id="h" value="<?php print $h; ?>"  size="2">
						</td>
					</tr>
					<tr>					
						<td height="50">
							<b>Altre Misure:</b> 
							<?php if(strlen($l2)>0 or strlen($p2)>0 or strlen($h2)>0 or strlen($h3)>0 or strlen($diam)>0){ ?>
								<input type="radio" checked="checked" name="misureex" id="misureex" Onclick="javascript: document.getElementById('divanimatom').style.display = 'block';" value="1"> Attiva 
								<input type="radio" name="misureex" id="misureex" Onclick="javascript: document.getElementById('divanimatom').style.display = 'none';"  value="0"> Disattiva
								<br />
								<div id="divanimatom" style="display:block" class="offerte">	
									L2: <input type="text" name="l2" id="l2" value="<?php print $l2; ?>" size="2"> P2: <input type="text" name="p2" id="p2" value="<?php print $p2; ?>"  size="2"> H2: <input type="text" name="h2" id="h2" value="<?php print $h2; ?>"  size="2"><br /><br />
									D2: <input type="text" name="diam" id="diam" value="<?php print $diam; ?>"  size="2"> H2: <input type="text" name="h3" id="h3" value="<?php print $h3; ?>"  size="2">
								</div>
							<?php }else{ ?>	
								<input type="radio" name="misureex" id="misureex" Onclick="javascript: document.getElementById('divanimatom').style.display = 'block';" value="1"> Attiva 
								<input type="radio" checked="checked" name="misureex" id="misureex" Onclick="javascript: document.getElementById('divanimatom').style.display = 'none';"  value="0"> Disattiva
								<br />
								<div id="divanimatom" style="display:none" class="offerte">
									L2: <input type="text" name="l2" id="l2" value="<?php print $l2; ?>" size="2"> P2: <input type="text" name="p2" id="p2" value="<?php print $p2; ?>"  size="2"> H2: <input type="text" name="h2" id="h2" value="<?php print $h2; ?>"  size="2"><br /><br />
									D2: <input type="text" name="diam" id="diam" value="<?php print $diam; ?>"  size="2"> H2: <input type="text" name="h3" id="h3" value="<?php print $h3; ?>"  size="2">
								</div>
							<? 	}?>
						</td>
					</tr>
				</table>
				<div class="offerte">
					<?php if(strlen($prezzo)>0){?>
						<input type="radio" name="offerte" id="offerte" Onclick="javascript: document.getElementById('divanimato').style.display = 'none';" value="0"> Prodotto 
						<input type="radio" name="offerte" checked="checked" id="offerte" Onclick="javascript: document.getElementById('divanimato').style.display = 'block';"  value="1"> Offerta
						<div id="divanimato" style="display:block" class="offerte">
							Prezzo: <input type="text" name="prezzo" id="prezzo" value="<?php print $prezzo; ?>">
						</div>
					<?php }else{?>
						<input type="radio" checked="checked" name="offerte" id="offerte" Onclick="javascript: document.getElementById('divanimato').style.display = 'none';" value="0"> Prodotto 
						<input type="radio" name="offerte" id="offerte" Onclick="javascript: document.getElementById('divanimato').style.display = 'block';"  value="1"> Offerta
						<div id="divanimato" style="display:none" class="offerte">
							Prezzo: <input type="text" name="prezzo" id="prezzo" value="<?php print $prezzo; ?>">
						</div>
					<?php }?>
				</div><br />
<?php					if(strlen($_POST['ritorno'])>0 and strlen($legno)>0 or strlen($colore)>0 or strlen($anno)>0 or strlen($ante)>0 or strlen($cassetti)>0 or strlen($posti)>0 or strlen($finitura)>0 or strlen($laccatura)>0 or strlen($forma)>0 or strlen($tipo)>0 or strlen($stile)>0 or strlen($particolari)>0){?>
						<div class="offerte" onmousedown="if(document.getElementById('divanimato1').style.display == 'none'){ document.getElementById('divanimato1').style.display = 'block'; }else{ document.getElementById('divanimato1').style.display = 'none'; }"> <img src="immagini/avanzate.jpg" border="0"> <u>Avanzate</u> </div>
						<div id="divanimato1" style="display:block" class="offerte1">
<?php					}else{
?>						<div class="offerte" onmousedown="if(document.getElementById('divanimato1').style.display == 'none'){ document.getElementById('divanimato1').style.display = 'block'; }else{ document.getElementById('divanimato1').style.display = 'none'; }"> <img src="immagini/avanzate.jpg" border="0"> <u>Avanzate</u> </div>
						<div id="divanimato1" style="display:none" class="offerte1">
<?php					}
?>					Legno: &nbsp;&nbsp;<input type="text" name="legno" id="legno" value="<?php print $legno; ?>"> &nbsp;&nbsp;&nbsp;&nbsp;Colore: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="colore" id="colore" value="<?php print $colore; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Anno: &nbsp;&nbsp;<input type="text" name="anno" id="anno" value="<?php print $anno; ?>" size="5"><br /><br />
					Ante: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="ante" id="ante" value="<?php print $ante; ?>"> &nbsp;&nbsp;&nbsp;&nbsp;Cassetti: &nbsp;&nbsp;&nbsp;<input type="text" name="cassetti" id="cassetti" value="<?php print $cassetti; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Posti: &nbsp;&nbsp;<input type="text" name="posti" id="posti" value="<?php print $posti; ?>" size="5"><br /><br />
					Finitura: <input type="text" name="finitura" id="finitura" value="<?php print $finitura; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Laccatura: <input type="text" name="laccatura" id="laccatura" value="<?php print $laccatura; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Forma: <input type="text" name="forma" id="forma" value="<?php print $forma; ?>"><br /><br />
					Tipo(composto, ecc):  &nbsp;&nbsp;<input type="text" name="tipo" id="tipo" value="<?php print $tipo; ?>"> &nbsp;&nbsp;&nbsp;&nbsp;Stile(moderno, classico, ecc): <input type="text" name="stile" id="stile" value="<?php print $stile; ?>"><br /><br />
					Particolari:  &nbsp;&nbsp;<input type="text" name="particolari" id="particolari" value="<?php print $particolari; ?>" size="16"><br /><br />
				</div>				
				<div style="text-align:right; padding-right: 70px;">
					<input type="hidden" name="caricoprod" id="caricoprod" value="esegui" />
					<input type="Submit" name="cmd" id="cmd" value="Inserisci prodotto">
				</div>	
			</div>
		</div>
	</div>
		</td>
	</tr>
</table>
</body>
</html>
<?php
	}else{
?>	<meta http-equiv="refresh" content="0 url=http://<?php print $_SERVER['HTTP_HOST'];?>">
<?php	
}?>