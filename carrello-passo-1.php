<?php 
	session_start();

	include "estensionepagine.php"; 
	$paginainiziale="http://www.softwarearredamento.com/acquista.html";
	$primapagina="carrello-passo-1.html";
	$secondapagina="carrello-passo-2.html";
	$terzapagina="carrello-passo-3.html";
	$confermaordine="carrello-passo-4.html";
?>
<html>
	<head>
		<title>Software Arredamento I nostri prezzi</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta name="description" content="Pannello di controllo di Software Arredamento">
		<meta name="keywords" content="pannello di controllo software arredamento, pannello software arredamento, software arredamento, software arredamento interni">
		<meta name="language" content="it">
		<meta name="robots" content="index, follow">
		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/carrello.css">
		<link rel="stylesheet" href="carrello/css/carrello.css">
		<link rel="stylesheet" type="text/css" href="css/menu_responsive.css" media="screen">
		<?php include "analitycs.php"; ?>
	</head>
	<body>
		<div class="generale">
			<div class="header" id="header">
				<div class="textlogo">
					<a id="cd-logo" href="#0"><img src="immagini/textlogo.jpg" alt="Homepage" width="263" height="50"></a>
				</div>
				<div class="menu" id="cd-top-nav">
					<div class="bottone"><a href="http://www.softwarearredamento.com" class="bottone"><div>Home</div></a></div>
					<div class="bottoneattivo"><a href="http://www.softwarearredamento.com/index.html?prev=1" class="bottoneattivo"><div>Acquista</div></a></div>
					<div class="bottone"><a href="http://www.softwarearredamento.com/galleria.html" class="bottone"><div>Galleria</div></a></div>
					<div class="bottone"><a href="http://www.softwarearredamento.com/blog/" class="bottone"><div>Blog</div></a></div>
					<div class="bottone"><a href="http://www.softwarearredamento.com/guida/index.html" class="bottone"><div>Guida</div></a></div>
					<div class="bottone"><a href="http://ticket.arkosoft.it" class="bottone"><div>Supporto</div></a></div>
				</div>
				<div class="logo">&nbsp;</div>
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
				<div class="boxmadrecar">
					<div class="desccarrello">
						<h1>Modulo di acquisto</h1>
					</div>
					<div class="box-container">
						<div class="boxacquista">
							
							<?php include "carrello/carrello.php"; ?>
							
						</div>
					</div>
					<div class="box-container">
						<div class="testo-ind">
							<p>HAI PROBLEMI DURANTE L'ACQUISTO O NON SAI COME FARE?</p>
							<p class="normal">Contattaci <span>telefonicamente</span> o apri un <span>ticket!</span></p>
							<p class="normal">al sito <a href="http://ticket.arkosoft.it/">http://ticket.arkosoft.it</a></p>
							<div class="ticket">
								<span>
									<img src="immagini/telverde.jpg" alt="icona telefono" class="tel">
									0831-1815236
								</span>
								<a href="http://ticket.arkosoft.it">
									<img src="immagini/ticket.jpg" alt="ticket" class="tick">
								</a>
							</div>
						</div>
					</div>
				</div>
				<?php include "footer.php"; ?>
			</div>
			<div id="cd-lateral-nav">
				<ul class="cd-navigation cd-single-item-wrapper">
					<li><a href="#0">Home</a></li>
					<li><a class="current" href="#0">Acquista</a></li>
					<li><a href="#0">Galleria</a></li>
					<li><a href="#0">Blog</a></li>
					<li><a href="#0">Guida</a></li>
					<li><a href="#0">Supporto</a></li>
				</ul> <!-- cd-single-item-wrapper -->
			</div>
		</div>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/main.js"></script> <!-- Resource jQuery -->
	</body>
</html>