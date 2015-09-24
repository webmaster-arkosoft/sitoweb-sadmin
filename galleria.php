<html>
	<head>
		<title>Software Arredamento Galleria Pannello</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Pannello di controllo di Software Arredamento">
		<meta name="keywords" content="pannello di controllo software arredamento, pannello software arredamento, software arredamento, software arredamento interni">
		<meta name="language" content="it">
		<meta name="robots" content="index, follow">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/menu_responsive.css">
		<link rel="stylesheet" href="css/gallery.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script type="text/javascript" src="js/prototype.js"></script>
		<script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
		<script type="text/javascript" src="js/frog.js"></script>
		<script src="js/media-queries-ie.js" type="text/javascript"></script> <!-- script per abilitare media queries su ie -->
		<?php include "analitycs.php"; ?>
	</head>
	<body <? if(strstr($browser, 'MSIE')==true){ ?>Onload="javascript: initFrog();"<?}?>>
		<div class="generale">
			<div class="header" id="header">
				<div class="textlogo">
					<a id="cd-logo" href="http://www.softwarearredamento.com"><img src="immagini/textlogo.jpg" alt="Homepage" width="263" height="50"></a>
				</div>
				<div class="menu" id="cd-top-nav">
					<div class="bottone"><a href="http://www.softwarearredamento.com" class="bottone"><div>Home</div></a></div>
					<div class="bottone"><a href="http://www.softwarearredamento.com/acquista.html" class="bottone"><div>Acquista</div></a></div>
					<div class="bottoneattivo"><a href="http://www.softwarearredamento.com/galleria.html" class="bottoneattivo"><div>Galleria</div></a></div>
					<div class="bottone"><a href="http://www.softwarearredamento.com/blog/" class="bottone"><div>Blog</div></a></div>
					<div class="bottone"><a href="http://www.softwarearredamento.com/guida/index.html" class="bottone"><div>Guida</div></a></div>
					<div class="bottone"><a href="http://ticket.arkosoft.it" class="bottone"><div>Supporto</div></a></div>
				</div>
				<div class="logo"><a href="http://www.softwarearredamento.com"><img src="immagini/sfondologo.jpg" alt=""></a></div>
				<div class="generale-corrente">
					<div class="pag-corrente">
						<span>Acquista</span>
					</div>
				</div>
				<a id="cd-menu-trigger" href="#0">
					<span class="cd-menu-icon"></span>
				</a>
			</div>
			<div class="cd-main-content">
				<div class="boxmadregalleria">
					<div class="descgalleria">
						<h1>Software Arredamento</h1> - <h2>Il pannello di controllo</h2>
						<p>Di seguito vi mostriamo una carrellata di immagini del pannello di controllo con cui gestirete i prodotti, le marche, le categorie, gli utenti, i preventivi.
						Inoltre potrete mandare offerte sui vostri prodotti ai clienti iscritti al sito grazie al modulo newsletter.</p>
					</div>
					<div id="FrogJS" class="frog">
						<a href="galleria/bacheca.jpg" title="Bacheca Amministratore">
							<img src="miniature/bacheca.jpg" alt="Bacheca Amministratore">
						</a>
						<a href="galleria/bacheca_utente.jpg" title="Bacheca Utente">
							<img src="miniature/bacheca_utente.jpg" alt="Bacheca Utente">
						</a>
						<a href="galleria/gestione_categorie.jpg" title="Gestione Categorie">
							<img src="miniature/gestione_categorie.jpg" alt="Gestione Categorie">
						</a>
						<a href="galleria/gestione_marca.jpg" title="Gestione Marca">
							<img src="miniature/gestione_marca.jpg" alt="Gestione Marca">
						</a>
						<a href="galleria/gestione_prodotti.jpg" title="Gestione Prodotti">
							<img src="miniature/gestione_prodotti.jpg" alt="Gestione Prodotti">
						</a>
						<a href="galleria/gestione_utente.jpg" title="Gestione Utente">
							<img src="miniature/gestione_utente.jpg" alt="Gestione Utente">
						</a>
						<a href="galleria/gestione_newsletter.jpg" title="Gestione Newsletter">
							<img src="miniature/gestione_newsletter.jpg" alt="Gestione Newsletter">
						</a>
						<a href="galleria/gestione_preventivo.jpg" title="Gestione Preventivo">
							<img src="miniature/gestione_preventivo.jpg" alt="Gestione Preventivo">
						</a>
						<a href="galleria/visualizza_preventivo.jpg" title="Gestione Preventivo">
							<img src="miniature/visualizza_preventivo.jpg" alt="Gestione Preventivo">
						</a>
					</div>
				</div>
				<?php include "footer.php"; ?>
			</div>
			<div id="cd-lateral-nav">
				<ul class="cd-navigation cd-single-item-wrapper">
					<li><a href="http://www.softwarearredamento.com">Home</a></li>
					<li><a href="http://www.softwarearredamento.com/acquista.html">Acquista</a></li>
					<li><a class="current" href="http://www.softwarearredamento.com/galleria.html">Galleria</a></li>
					<li><a href="http://www.softwarearredamento.com/blog/">Blog</a></li>
					<li><a href="http://www.softwarearredamento.com/guida/index.html">Guida</a></li>
					<li><a href="http://ticket.arkosoft.it">Supporto</a></li>
				</ul> <!-- cd-single-item-wrapper -->
			</div>
		</div>
		<script src="js/main.js"></script> <!-- Resource jQuery -->
	</body>
</html>