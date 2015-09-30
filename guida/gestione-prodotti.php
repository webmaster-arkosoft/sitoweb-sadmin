<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>Gestione prodotti</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="http://www.softwarearredamento.com/css/style.css" media="screen">
		<link rel="stylesheet" type="text/css" href="http://www.softwarearredamento.com/css/menu_responsive.css" media="screen">
		<script src="http://www.softwarearredamento.com/js/funzioni.js" type="text/javascript"></script> <!-- z-index per menu laterale mobile -->
		<script src="http://www.softwarearredamento.com/js/media-queries-ie.js" type="text/javascript"></script> <!-- script per abilitare media queries su ie -->
	</head>
	<body onload="myFunction()">
		<?php include "../analitycs.php"; ?>
		<div class="generale">
			<div class="header" id="header">
				<div class="textlogo">
					<a id="cd-logo" href="http://www.softwarearredamento.com"><img src="http://www.softwarearredamento.com/guida//immagini/textlogo.jpg" alt="Homepage" width="263" height="50"></a>
				</div>
				<div class="menu" id="cd-top-nav">
					<div class="bottone"><div class="bottone"><a href="http://www.softwarearredamento.com">Home</a></div></div>
					<div class="bottone"><div class="bottone"><a href="http://www.softwarearredamento.com/acquista.html">Acquista</a></div></div>
					<div class="bottone"><div class="bottone"><a href="http://www.softwarearredamento.com/galleria.html">Galleria</a></div></div>
					<div class="bottone"><div class="bottone"><a href="http://www.softwarearredamento.com/blog/">Blog</a></div></div>
					<div class="bottoneattivo"><div class="bottoneattivo"><a href="http://www.softwarearredamento.com/guida/index.html">Guida</a></div></div>
					<div class="bottone"><div class="bottone"><a href="http://ticket.arkosoft.it">Supporto</a></div></div>
				</div>
				<div class="logo"><a href="http://www.softwarearredamento.com"><img src="http://www.softwarearredamento.com/immagini/sfondologo.jpg" alt="" width="225" height="50"></a></div>
				<div class="generale-corrente">
					<div class="pag-corrente">
						<span>Guida</span>
					</div>
				</div>
				<a id="cd-menu-trigger" href="#0">
					<span class="cd-menu-icon"></span>
				</a>
			</div>
			<div class="cd-main-content" id="cd-main-content">
				<div class="contenutoguida">
					Guida al completo uso di <b>S-Admin</b> l'applicativo ideale per la gestione del Vostro <b>portale di Arredamento</b>. Con questa <b>guida</b> vengono illustrate dettagliatamente tutte le funzionalit&agrave; dell'applicativo.<br><br>
					<div class="guida">
						<div class="indiceguida" id="indice">Indice</div>
						<div class="vociguida"><a href="index.html#contenutoprefazione" title="Prefazione"> Prefazione</a></div>
						<div class="vociguida"><a href="bacheca.html#desc1" title="Accesso come amministratore">1. Accesso come amministratore</a></div>
						<div class="vociguida1"><a href="bacheca.html#desc1.1" title="Bacheca dell' amministratore">1.1 Bacheca dell' amministratore</a></div>
						<div class="vociguida1"><a href="bacheca.html#desc1.2" title="Modificare il profilo dell'amministratore">1.2 Modificare il profilo dell'amministratore</a></div>
						<div class="vociguida"><a href="gestione-prodotti.html#desc2" title="Gestione Prodotti">2. Gestione dei Prodotti</a></div>
						<div class="vociguida1"><a href="gestione-prodotti.html#desc2.1" title="Aggiungi un nuovo Prodotto">2.1 Aggiungi un nuovo Prodotto</a></div>
						<div class="vociguida1"><a href="gestione-prodotti.html#desc2.2" title="Modifica un Prodotto">2.2 Modifica un Prodotto</a></div>
						<div class="vociguida1"><a href="gestione-prodotti.html#desc2.3" title="Elimina un Prodotto">2.3 Elimina un Prodotto</a></div>
						<div class="vociguida1"><a href="gestione-prodotti.html#desc2.4" title="Blocca un Prodotto">2.4 Blocca un Prodotto</a></div>
						<div class="vociguida1"><a href="gestione-prodotti.html#desc2.5" title="Sblocca un Prodotto">2.5 Sblocca un Prodotto</a></div>
						<div class="vociguida"><a href="gestione-categorie.html#desc3" title="Gestione Categorie">3. Gestione delle Categorie</a></div>
						<div class="vociguida1"><a href="gestione-categorie.html#desc3.1" title="Aggiungi una nuova Categoria">3.1 Aggiungi una nuova Categoria</a></div>
						<div class="vociguida1"><a href="gestione-categorie.html#desc3.2" title="Modifica una Categoria">3.2 Modifica una Categoria</a></div>
						<div class="vociguida1"><a href="gestione-categorie.html#desc3.3" title="Elimina una Categoria">3.3 Elimina una Categoria</a></div>
						<div class="vociguida"><a href="gestione-marche.html#desc4" title="Gestione Marche">4. Gestione delle Marche</a></div>
						<div class="vociguida1"><a href="gestione-marche.html#desc4.1" title="Aggiungi una nuova Marca">4.1 Aggiungi una nuova Marca</a></div>
						<div class="vociguida1"><a href="gestione-marche.html#desc4.2" title="Modifica una Marca">4.2 Modifica una Marca</a></div>
						<div class="vociguida1"><a href="gestione-marche.html#desc4.3" title="Elimina una Marca">4.3 Elimina una Marca</a></div>
						<div class="vociguida"><a href="gestione-utenti.html#desc5" title="Gestione Utenti">5. Gestione degli Utenti</a></div>
						<div class="vociguida1"><a href="gestione-utenti.html#desc5.1" title="Aggiungi un nuovo Utente">5.1 Aggiungi un nuovo Utente</a></div>
						<div class="vociguida1"><a href="gestione-utenti.html#desc5.2" title="Blocca un Utente">5.2 Blocca un Utente</a></div>
						<div class="vociguida1"><a href="gestione-utenti.html#desc5.3" title="Sblocca un Utente">5.3 Sblocca un Utente</a></div>
						<div class="vociguida1"><a href="gestione-utenti.html#desc5.4" title="Modifica un Utente">5.4 Modifica un Utente</a></div>
						<div class="vociguida1"><a href="gestione-utenti.html#desc5.5" title="Elimina un Utente">5.5 Elimina un Utente</a></div>
						<div class="vociguida"><a href="gestione-newsletter.html#desc6" title="Gestione Newsletter">6. Gestione delle Newsletter</a></div>
						<div class="vociguida1"><a href="gestione-newsletter.html#desc6.1" title="Crea una newsletter">6.1 Crea una newsletter</a></div>
						<div class="vociguida1"><a href="gestione-newsletter.html#desc6.2" title="Modifica una Newsletter">6.2 Modifica una Newsletter</a></div>
						<div class="vociguida1"><a href="gestione-newsletter.html#desc6.3" title="Elimina una Newsletter">6.3 Elimina una Newsletter</a></div>
						<div class="vociguida1"><a href="gestione-newsletter.html#desc6.4" title="Invia una Newsletter">6.4 Invia una Newsletter</a></div>
						<div class="vociguida"><a href="gestione-preventivi.html#desc7" title="Gestione Preventivi">7. Gestione dei Preventivi</a></div>
						<div class="vociguida1"><a href="gestione-preventivi.html#desc7.1" title="Visualizza un preventivo">7.1 Visualizza un preventivo</a></div>
						<div class="vociguida1"><a href="gestione-preventivi.html#desc7.2" title="Aggiungi un prodotto a un preventivo">7.2 Aggiungi un prodotto a un preventivo</a></div>
						<div class="vociguida1"><a href="gestione-preventivi.html#desc7.3" title="Anteprima del preventivo">7.3 Anteprima del preventivo</a></div>
						<div class="vociguida1"><a href="gestione-preventivi.html#desc7.4" title="Invia un preventivo">7.4 Invia un preventivo</a></div>
						<div class="vociguida1"><a href="gestione-preventivi.html#desc7.5" title="Stampa un preventivo">7.5 Stampa un preventivo</a></div>
						<div class="vociguida1"><a href="gestione-preventivi.html#desc7.6" title="Ricercare un preventivo">7.6 Ricercare un preventivo</a></div>
						<div class="vociguida1"><a href="gestione-preventivi.html#desc7.7" title="Eliminazione di un preventivo">7.7 Eliminazione di un preventivo</a></div>
						<div class="vociguida"><a href="opzioni.html#desc8" title="Opzioni">8. Le Opzioni</a></div>
						<div class="vociguida"><a href="bachecautente.html#desc9" title="Accesso come utente">9. Accesso come utente</a></div>
						<div class="vociguida1"><a href="bachecautente.html#desc9.1" title="Bacheca dell'Utente">9.1 Bacheca dell'Utente</a></div>
						<div class="vociguida1"><a href="bachecautente.html#desc9.2" title="Modifica il profilo dell'Utente">9.2 Modifica il profilo dell'Utente</a></div>
					</div>	

					
					<h2 id="desc2">2. Gestione dei Prodotti</h2><hr>
					<div class="boxguida">
						Con S-Admin potete gestire facilmente i prodotti da mostrare sul vostro sito di arredamento.<br>
						Dal men&ugrave; laterale, sotto la voce <b>"PRODOTTI"</b> vi baster&agrave; cliccare su <b>"Aggiungi nuovo"</b> per inserire un nuovo prodotto, mentre con <b>"Visualizza prodotti"</b> potete modificare i dati di uno gi&agrave; esistente.<p>&nbsp;</p>
						<div class="center"><img src="http://www.softwarearredamento.com/guida/img/visualizza_prodotti.jpg" alt="" width="900" height="765"></div><br><br>
						
						1. <b>Totale Prodotti ( ) - (Visualizza tutti)</b>: qui viene indicato il numero totale di prodotti.<br>
						Normalmente visualizza il totale di TUTTI i prodotti inseriti con la quantit&agrave; indicata in
						parentesi, mentre in caso di ricerca visualizza solo quelli trovati, e in aggiunta appare il
						comando di testo <b>"Visualizza tutti"</b>;<br>
						2. <b>Visualizza per Marca</b>: menu a discesa che permette di filtrare i prodotti in base alla marca;<br>
						3. <b>Cerca Prodotto</b>: effettua una ricerca in base al nome del prodotto o ad una o pi&ugrave; parole contenute nella descrizione; <br>
						4. <b>ID</b>: un numero in codice che identifica il prodotto;<br>
						5. <b>Nome</b>: nome del prodotto;<br>
						6. <b>Modifica</b>: icona per accedere alla scheda del prodotto, quando lo si vuole modificare;<br>
						7. <b>Elimina</b>;<br>
						8. <b>Blocca</b>: per bloccare il prodotto, quando non &egrave; pi&ugrave; disponibile: in quel caso, davanti all'anteprima del prodotto appare l'apposita dicitura;<br>
						9. <b>Pagina (1)</b>: indica il numero di pagina dei risultati della ricerca, o dell'elenco completo. <br>
						In caso di pagine troppo numerose, vengono visualizzati due comandi (<b>"Prima"</b> e
						<b>"Ultima"</b>) che portano rispettivamente alla PRIMA e all'ULTIMA delle pagine dei risultati della ricerca o dell'elenco.<br><br>
						<div class="torna"><a href="#indice">[Torna su]</a></div>
						<p>&nbsp;</p><p>&nbsp;</p>
						
						<h2 id="desc2.1">2.1 Aggiungere un nuovo Prodotto</h2><hr>
						Per inserire un nuovo prodotto, la procedura &egrave; semplice:<br><br>
						<div class="center"><img src="http://www.softwarearredamento.com/guida/img/aggiungi_prodotto.jpg" alt="" width="903" height="874"></div><br><br>
						1. in <b>"Nome Prodotto"</b>, inserite un nome per il prodotto;<br>
						2. inserite una <b>"Descrizione"</b> del prodotto, avendo la possibilit&agrave; di formattare il testo, ovvero di assegnare un colore e una dimensione a parte o a tutto il testo, utilizzando la barra degli strumenti posta in alto, che accompagna il riquadro;<br>
						3. una volta inserito titolo e descrizione, si pu&ograve; inserire una o pi&ugrave; immagini del prodotto, cliccando sul pulsante <b>"Gestione Immagini"</b>, quindi nella schermata successiva cliccare su <b>"Sfoglia ..."</b> e selezionare le immagini che accompagneranno il prodotto. <br>
						A questo punto, premendo su <b>"Carica"</b> l'immagine verr&agrave; visualizzata in <b>"Immagini del prodotto"</b> e premendo infine sul pulsante <b>"Torna al Carico"</b>, tutte le immagini caricate saranno inserite nella <b>"Lista Immagini"</b>, che elenca tutte le foto che accompagnano il prodotto in inserimento;<br><br>
						<div class="center"><img src="http://www.softwarearredamento.com/guida/img/carica_img.jpg" alt="" width="903" height="561"></div><br><br>
						4. dopo avere inserito l'immagine, il titolo e la descrizione, si pu&ograve; scegliere la <b>"Marca"</b> e la <b>"Categoria"</b> del mobile, dai due men&ugrave; a discesa posti sotto il riquadro della descrizione;<br>
						5. inserire le <b>"Misure"</b>, da impostare tramite le tre caselle che rappresentano la Larghezza (L), la Profondit&agrave; (P) e l'Altezza (H). In pi&ugrave;, si possono inserire delle misure alternative	con <b>"Altre Misure"</b> semplicemente spuntando la casella <b>"Attiva"</b>, e inserendo le misure nelle caselle che verranno visualizzate;<br><br>
						<div class="center"><img src="http://www.softwarearredamento.com/guida/img/altremisure.jpg" alt="" width="903" height="161"></div><br><br>
						6. scegliere se inserire il prodotto cos&igrave; com'&egrave;, o come <b>"Offerta"</b>, della quale si potr&agrave; stabilire il <b>"Prezzo"</b>;<br><br>
						<div class="center"><img src="http://www.softwarearredamento.com/guida/img/offerta.jpg" alt="" width="903" height="88"></div><br><br>
						7. la sezione <b>"Avanzate"</b> contiene infine eventuali informazioni aggiuntive che possono essere date ai clienti, come il <b>"Legno"</b> di cui &egrave; composto il mobile, il numero di <b>"Cassetti"</b> che contiene, o lo <b>"Stile"</b> con cui &egrave; stato realizzato;<br><br>
						<div class="center"><img src="http://www.softwarearredamento.com/guida/img/avanzate.jpg" alt="" width="903" height="260"></div><br><br>
						8. infine, si confermano le informazioni inserite, cliccando su <b>"Inserisci Prodotto"</b>.<br><br>
						<div class="torna"><a href="#indice">[Torna su]</a></div>
						<p>&nbsp;</p><p>&nbsp;</p>
						
						<h2 id="desc2.2">2.2 Modificare un prodotto</h2><hr>
						Per modificare un prodotto, bisogna innanzitutto aprire la finestra <b>"Visualizza Prodotti"</b> nella quale si trovano il <b>"Totale Prodotti"</b>, ovvero il numero dei prodotti gi&agrave; caricati, mentre sotto <b>"Visualizza per Marca"</b>, troviamo un menu a discesa che elenca le varie marche di prodotti. E' altres&igrave; possibile effettuare una ricerca dei prodotti dalla casella <b>"Cerca Prodotto"</b>. Sotto di essi &egrave; presente poi l'elenco dei prodotti, o il risultato della ricerca.<br><br>
						
						Ora vediamo la procedura per modificare un prodotto:<br><br>
						
						1. cliccare l'icona <b>"Modifica"</b> corrispondente alla riga del prodotto, rappresentata dal block notes, per aprire la finestra di <b>"Modifica Prodotto"</b> vera e propria;<br><br>
						<img src="http://www.softwarearredamento.com/guida/img/modifica.jpg" alt="" width="81" height="44"><br><br>
						2. la finestra si presenta come quella di <b>"Aggiungi Prodotto"</b>, basta infatti andare nella casella o nel men&ugrave; che si vuole modificare ed effettuare i cambiamenti voluti.<br><br>
						<div class="torna"><a href="#indice">[Torna su]</a></div>
						<p>&nbsp;</p><p>&nbsp;</p>
						
				
						<h2 id="desc2.3">2.3 Eliminare un prodotto</h2><hr>
						La procedura di eliminazione di un prodotto &egrave; simile a quella utilizzata per modificarlo, bisogna innanzitutto aprire la finestra <b>"Visualizza Prodotti"</b>.<br><br>
						
						1. per eliminare un prodotto, cliccare sull'icona <b>"Elimina"</b> corrispondente alla riga del prodotto, rappresentata da un esagono rosso con una X bianca.<br><br>
						<img src="http://www.softwarearredamento.com/guida/img/elimina.jpg" alt="" width="81" height="44"><br><br>
						<div class="torna"><a href="#indice">[Torna su]</a></div>
						<p>&nbsp;</p><p>&nbsp;</p>
						
						<h2 id="desc2.4">2.4 Bloccare un prodotto</h2><hr>
						Anche per bloccare un prodotto, bisogna innanzitutto aprire la finestra <b>"Visualizza Prodotti"</b>.			
						
						1. per bloccare un prodotto, cliccare sull'icona <b>"Blocca"</b> corrispondente alla riga del prodotto, rappresentata da un lucchetto chiuso.<br><br>
						<img src="http://www.softwarearredamento.com/guida/img/blocca.jpg" alt="" width="81" height="44"><br><br>
						<div class="torna"><a href="#indice">[Torna su]</a></div>
						<p>&nbsp;</p><p>&nbsp;</p>
						
						<h2 id="desc2.5">2.5 Sbloccare un prodotto</h2><hr>
						Anche per sbloccare un prodotto, bisogna aprire la finestra <b>"Visualizza Prodotti"</b>.			
						
						1. per sbloccare un prodotto, cliccare sull'icona <b>"Sblocca"</b> corrispondente alla riga del prodotto, rappresentata da un lucchetto aperto, a quel punto il prodotto ritorner&agrave; disponibile.	<br><br>		
						<img src="http://www.softwarearredamento.com/guida/img/sblocca.jpg" alt="" width="81" height="44"><br><br>
						<div class="torna"><a href="#indice">[Torna su]</a></div>
						<p>&nbsp;</p><p>&nbsp;</p>
					</div>
				</div>
				<?php include "footer.php"; ?>
			</div>
			<div id="cd-lateral-nav">
				<ul class="cd-navigation cd-single-item-wrapper">
					<li><a href="http://www.softwarearredamento.com">Home</a></li>
					<li><a href="http://www.softwarearredamento.com/acquista.html">Acquista</a></li>
					<li><a href="http://www.softwarearredamento.com/galleria.html">Galleria</a></li>
					<li><a href="http://www.softwarearredamento.com/blog/">Blog</a></li>
					<li><a class="current" href="http://www.softwarearredamento.com/guida/index.html">Guida</a></li>
					<li><a href="http://ticket.arkosoft.it">Supporto</a></li>
				</ul> <!-- cd-single-item-wrapper -->
			</div>
		</div>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
		<script src="http://www.softwarearredamento.com/js/main.js" type="text/javascript"></script> <!-- Resource jQuery -->
	</body>
</html>