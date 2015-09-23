<?php
	session_start();
?>	
<html>
	<head>
		<title>Software Arredamento I nostri prezzi</title>
		<meta name="description" content="Pannello di controllo di Software Arredamento">
		<meta name="keywords" content="pannello di controllo software arredamento, pannello software arredamento, software arredamento, software arredamento interni">
		<meta name="language" content="it">
		<meta name="robots" content="index, follow">
		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/carrello.css">
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
				<div class="boxmadregalleria">
					<div class="desccarrello">
						<h1>Seleziona i prodotti da inserire nel carrello</h1>
					</div>
					<div class="box-container">
						<div class="boxacquista">
<?php						if(count($_SESSION['carrello'])>0){ 
								for($a=0; $a<count($_SESSION['carrello']); $a++){
									$numprod=$numprod+$_SESSION['carrello'][$a][4];
								}
?>								<div class="ripcarrello">
<?php						 		if($numprod=="1"){
?>										E' stato gi&agrave; inserito <strong>1</strong> prodotto nel carrello.
<?php								}else{	
?>										Sono stati gi&agrave; inseriti <strong><?php print $numprod; ?></strong> prodotti nel carrello. 
<?php								}
?>									<a href="http://www.softwarearredamento.com/carrello-passo-1.html" title="vai al carrello" >Vai al carrello</a>
								</div>
<?php							}		
?>							<div class="divboxlicenze">
								<div class="boxprodotto">
									<div class="boxdescrizione">
										<div class="imgprodotto">
											<img id="img1" src="/immagini/logo-s-admin.jpg">
										</div>
										<div class="descprodotto">
											<div class="titoloprod">Pannello <span>S-Admin</span></div>
											<p>S-Admin &egrave; il pannello di controllo del vostro portale di arredamento. 
											Potrete caricare voi stessi i prodotti, nonch&egrave; gestire le marche e le categorie, gestire gli utenti iscritti al sito e i relativi preventivi richiesti. 
											Inoltre incluso con S-Admin avrete il dominio gratuito per un anno e un tema su misura per voi.
											</p>
										</div>
										<div class="aggiungiprodotto">
											<div class="prezzoprod">&euro; 800,00</div>
											<div class="ivaprod">iva esclusa</div>
											<div class="disponibilitaprod">DISPONIBILE</div>
											<div class="bottoneaggcarrello">
												<a href="http://www.softwarearredamento.com/carrello-passo-1.html?prodottodb=1">
													<button type="button">
														AGGIUNGI AL CARRELLO
													</button>
												</a>
											</div>	
										</div>
									</div>
								</div>
								<div class="boxprodotto">
									<div class="boxdescrizione">
										<div class="imgprodotto">
											<img id="img1" src="/immagini/pacchetto-s-admin.jpg">
										</div>
										<div class="descprodotto">
											<div class="titoloprod">Pacchetto Completo <span>S-Admin</span></div>
											<p>Il pacchetto completo comprende il pannello di S-Admin, il tema esterno del sito, 
											installazione e configurazione del blog, iscrizione ai social network tra cui
											facebook, youtube, twitter e google+. La Grafica verr&agrave; realizzata utilizzando il design responsive, pertanto verr&agrave; certificata sui dispositivi mobili (smartphone e tablet).
											
											</p>
										</div>
										<div class="aggiungiprodotto">
											<div class="prezzoprod">&euro; 1.300,00</div>
											<div class="ivaprod">iva esclusa</div>
											<div class="disponibilitaprod">DISPONIBILE</div>
											<div class="bottoneaggcarrello">
												<a href="http://www.softwarearredamento.com/carrello-passo-1.html?prodottodb=5">
													<button type="button">
														AGGIUNGI AL CARRELLO
													</button>
												</a>
											</div>	
										</div>
									</div>
								</div>
								<div class="boxprodotto">
									<div class="boxdescrizione">
										<div class="imgprodotto">
											<img id="img1" src="/immagini/tema-responsive.jpg">
										</div>
										<div class="descprodotto">
											<div class="titoloprod">Tema <span>Responsive (Smartphone e Tablet)</span></div>
											<p> Un tema responsive si adatta automaticamente al dispositivo che lo visualizza, rimanendo sempre chiaro e facile da navigare. Ormai oggigiorno tutti gli utenti di internet si stanno spostando sui dispositivi mobili come tablet e smartphone.
											</p>
										</div>
										<div class="aggiungiprodotto">
											<div class="prezzoprod">&euro; 200,00</div>
											<div class="ivaprod">iva esclusa</div>
											<div class="disponibilitaprod">DISPONIBILE</div>
											<div class="bottoneaggcarrello">
												<a href="http://www.softwarearredamento.com/carrello-passo-1.html?prodottodb=2">
													<button type="button">
														AGGIUNGI AL CARRELLO
													</button>
												</a>	
											</div>	
										</div>
									</div>
								</div>
								<div class="boxprodotto">
									<div class="boxdescrizione">
										<div class="imgprodotto">
											<img id="img1" src="/immagini/blog-s-admin.jpg">
										</div>
										<div class="descprodotto">
											<div class="titoloprod">Blog <span>di arredamento</span></div>
											<p>Verr&agrave; realizzato un blog con la stessa grafica del vostro portale di arredamento. Il blog &egrave; la parte editoriale del vostro portale, serve principalmente a spingere e ad indicizzare meglio il vostro portale, sul quale potrete scrivere articoli a tema sull'arredamento. 
											</p>
										</div>
										<div class="aggiungiprodotto">
											<div class="prezzoprod">&euro; 200,00</div>
											<div class="ivaprod">iva esclusa</div>
											<div class="disponibilitaprod">DISPONIBILE</div>
											<div class="bottoneaggcarrello">
												<a href="http://www.softwarearredamento.com/carrello-passo-1.html?prodottodb=3">
													<button type="button">
														AGGIUNGI AL CARRELLO
													</button>
												</a>
											</div>	
										</div>
									</div>
								</div>
								<div class="boxprodotto">
									<div class="boxdescrizione">
										<div class="imgprodotto">
											<img id="img1" src="/immagini/social-s-admin.jpg">
										</div>
										<div class="descprodotto">
											<div class="titoloprod">Iscrizione ai <span>Social Network</span></div>
											<p> Il nostro staff realizzer&agrave; per voi la pagina di facebook, twitter, google+ e youtube della vostra azienda. I social network sono indispensabili per aumentare la visibilit&agrave; del vostro portale, estendendo il vostro showroom anche agli utenti sui social.
											</p>
										</div>
										<div class="aggiungiprodotto">
											<div class="prezzoprod">&euro; 200,00</div>
											<div class="ivaprod">iva esclusa</div>
											<div class="disponibilitaprod">DISPONIBILE</div>
											<div class="bottoneaggcarrello">
												<a href="http://www.softwarearredamento.com/carrello-passo-1.html?prodottodb=4">
													<button type="button">
														AGGIUNGI AL CARRELLO
													</button>
												</a>	
											</div>	
										</div>
									</div>
								</div>
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