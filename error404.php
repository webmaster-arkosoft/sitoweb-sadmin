<html>
<head>
	<title>Software Arredamento Pagina non trovata!</title>
	<meta name="title" content="Software Arredamento pagina non trovata" />
	<meta name="description" content="La pagina che stai cercando non esiste su Software Arredamento." />
	<meta name="keywords" content="pagina non trovata software arredamento, pagina 404 software arredamento, non trovata software arredamento" />
	<meta name="language" content="it" />
	<meta name="robots" content="index, follow" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
	<?php include "analitycs.php"; ?>
</head>
<body>
<div class="generale">
	<div class="header">
		<div class="menu">
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
	</div>
	<div class="splash">
		<div class="testo">
			<div class="motto">
				<a href="http://www.softwarearredamento.com" class="titlesadmin">S-Admin - <h1>Software Arredamento</h1></a>
				<h2><a href="http://www.softwarearredamento.com">Realizza con Stile il tuo sito<br /> di Arredamento</a></h2>
				<p class="introduzione">Una finestra su internet per i tuoi prodotti.</p>
				<div class="download"><a href="http://www.softwarearredamento.com/intermedia.php" class="download">&nbsp;</a></div>
			</div>	
		</div>	
		<div class="mobile">
			<img src="immagini/logo.jpg">
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
</div>	
</body>
</html>