<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>Software Arredamento Pagina non trovata!</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta name="title" content="Software Arredamento pagina non trovata">
		<meta name="description" content="La pagina che stai cercando non esiste su Software Arredamento.">
		<meta name="keywords" content="pagina non trovata software arredamento, pagina 404 software arredamento, non trovata software arredamento">
		<meta name="language" content="it">
		<meta name="robots" content="index, follow">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
		<link rel="stylesheet" type="text/css" href="css/menu_responsive.css" media="screen">
		<script src="js/media-queries-ie.js" type="text/javascript"></script> <!-- script per abilitare media queries su ie -->
		<?php include "analitycs.php"; ?>
	</head>
	<body>
		<div class="generale">
			<div class="header" id="header">
				<div class="textlogo">
					<a id="cd-logo" href="http://www.softwarearredamento.com"><img src="immagini/textlogo.jpg" alt="Homepage" width="263" height="50"></a>
				</div>
				<div class="menu" id="cd-top-nav">
					<?php if($_GET['prev']=="1"){ ?>
						<div class="bottone"><a href="http://www.softwarearredamento.com" class="bottone"><div>Home</div></a></div>
						<div class="bottoneattivo" Onclick="javascript: apripreventivo();"><a href="#" class="bottoneattivo"><div>Preventivo</div></a></div>
					<?php }else{ ?>
						<div id="csshome" class="bottoneattivo"><a id="csshome1" href="http://www.softwarearredamento.com" class="bottoneattivo"><div>Home</div></a></div>
						<div id="cssprev" class="bottone" Onclick="javascript: sfondobottone(); apripreventivo();"><a href="#" id="cssprev1" class="bottone"><div>Preventivo</div></a></div>
					<?php } ?>
					<div class="bottone"><a href="http://www.softwarearredamento.com/galleria.html" class="bottone"><div>Galleria</div></a></div>
					<div class="bottone"><a href="http://www.softwarearredamento.com/blog/" class="bottone"><div>Blog</div></a></div>
					<div class="bottone"><a href="http://www.softwarearredamento.com/guida/index.html" class="bottone"><div>Guida</div></a></div>
					<div class="bottone"><a href="http://ticket.arkosoft.it" class="bottone"><div>Supporto</div></a></div>
				</div>
				<div class="logo">&nbsp;</div>
				<div class="generale-corrente">
					<div class="pag-corrente">
						<span>Error 404</span>
					</div>
				</div>
				<a id="cd-menu-trigger" href="#0">
					<span class="cd-menu-icon"></span>
				</a>
			</div>
			<div class="cd-main-content">
				<div class="splash">
					<div class="testo">
						<div class="motto">
							<a href="http://www.softwarearredamento.com" class="titlesadmin">S-Admin - <h1>Software Arredamento</h1></a>
							<h2><a href="http://www.softwarearredamento.com">Realizza con Stile il tuo sito<br /> di Arredamento</a></h2>
							<p class="introduzione">Una finestra su internet per i tuoi prodotti.</p>
							<div class="download"><a href="http://www.softwarearredamento.com/intermedia.php" onClick="javascript:_paq.push(['trackGoal','1']);" class="download">&nbsp;</a></div>
						</div>	
					</div>
				</div>
				<div class="contenuto404">
					<div class="contenutonostriclienti">
						<h1>HTTP Status 404 - Pagina non Trovata</h1>
						<hr>	
						<div class="storiasaracino">
						La pagina da te richiesta su S-Admin non pu&ograve; essere trovata, probabilmente hai seguito un link corrotto. 
						<br /><br />
							Possibili Cause:<br /><br />
							<a href="index.html" title="Pagina Inesistente">- Pagina Inesistente</a><br />
							<a href="index.html" title="Pagina Spostata">- Pagina Spostata</a><br />
						</div>
					</div>
				</div>	
				<?php include "footer.php"; ?>
			</div> <!-- cd-main-content -->
			<div id="cd-lateral-nav">
				<ul class="cd-navigation cd-single-item-wrapper">
					<li><a class="current" href="http://www.softwarearredamento.com">Home</a></li>
					<li><a href="http://www.softwarearredamento.com/acquista.html">Acquista</a></li>
					<li><a href="http://www.softwarearredamento.com/galleria.html">Galleria</a></li>
					<li><a href="http://www.softwarearredamento.com/blog/">Blog</a></li>
					<li><a href="http://www.softwarearredamento.com/guida/index.html">Guida</a></li>
					<li><a href="http://ticket.arkosoft.it">Supporto</a></li>
				</ul> <!-- cd-single-item-wrapper -->
			</div>
		</div>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/main.js"></script> <!-- Resource jQuery -->
	</body>
</html>