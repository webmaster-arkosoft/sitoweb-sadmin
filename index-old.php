<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<title>S-Admin - il Software per arredamento</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="title" content="Software arredamento è la soluzione per realizzare il tuo sito di arredamento" />
	<meta name="description" content="Software arredamento è la soluzione ideale per realizzare con stile il tuo sito di arredamento" />
	<meta name="keywords" content="software arredamento, software arredamento interni, software per arredare casa, software per arredare, software arredare casa, software arredo casa" />
	<meta name="language" content="it" />
	<meta name="robots" content="index, follow" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
	<script type="text/javascript" src="js/preventivo.js"></script>
	<script type="text/javascript" src="js/demo.js"></script>
	<?php include "analitycs.php"; ?>
</head>
<body <?php if($_GET['prev']=="1"){ ?>Onload="javascript: apripreventivo();"<?php } ?>>
<noscript><div class="nojs">Attenzione: non siete abilitati a visionare questo sito.<br /> Per una corretta visualizzazione abilitare i javascript!!!<br /><a href="attivarejs.html" rel="nofollow">Clicca qui</a> per ulteriori informazioni consultare la nostra guida.</div></noscript>
<div class="generale">
	<? include "preventivo.php"; ?>
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
	<div class="divpreventivo" id="divpreventivo">
<?php	if($inviato==true){
?>			<div class="inviocorretto" id="inviocorretto">La tua Richiesta &egrave; stata inviata correttamente!</div>				
<?php	}
		include "formrichiesta.php"; 
?>	</div>
	<div class="splash">
		<div class="testo">
			<div class="motto">
				<a href="http://www.softwarearredamento.com" class="titlesadmin">S-Admin - <h1>Software Arredamento</h1></a>
				<h2><a href="http://www.softwarearredamento.com">Realizza con Stile il tuo sito<br /> di Arredamento</a></h2>
				<p class="introduzione">Una finestra su internet per i tuoi prodotti.</p>
				<div class="download"><a href="http://www.softwarearredamento.com/intermedia.php" onClick="javascript:_paq.push(['trackGoal','1']);" class="download">&nbsp;</a></div>
			</div>	
		</div>	
		<div class="mobile">
			<img src="immagini/logo.jpg">
		</div>
	</div>
	<div class="boxmadre">
		<div class="boxs">
			<div class="contenutoagg">
				<div class="aggiornamenti">
					<div class="aggiorna">Aggiornamenti</div>
					<div class="testoaggiorna">Le Ultime Novita su S-Admin!</div>
				</div>
				<div class="divaggiornamenti">
					<div class="titoloaggiorna"><a href="http://www.softwarearredamento.com/guida/gestione-prodotti.html#2" title="Carico Prodotti">Carico Prodotti</a></div>
					<div class="descrizioneaggiorna">
						L'inserimento di un Prodotto non &egrave; mai stato cos&igrave; semplice e flessibile. Avrete la possibilit&agrave; di inserire pi&ugrave; foto per lo stesso prodotto, inserire seconde misure e aggiungere le caratteristiche.
					</div>
				</div>
				<div class="divaggiornamenti">
					<div class="titoloaggiorna"><a href="http://www.softwarearredamento.com/guida/gestione-preventivi.html#7" title="Gestione Preventivi">Gestione Preventivi</a></div>
					<div class="descrizioneaggiorna">
						Gli Utenti registrati al sito potranno richiedere un preventivo di uno o pi&ugrave; prodotti. L'amministratore potr&agrave; compilare i preventivi richiesti avendone la gestione completa!
					</div>
				</div>
			</div>		
			<div class="contenutoagg">
				<div class="divaggiornamenti">
					<div class="titoloaggiorna"><a href="http://www.softwarearredamento.com/guida/gestione-newsletter.html#6.4" title="Invio Newsletter">Invio Newsletter</a></div>
					<div class="descrizioneaggiorna">
						Grazie al modulo Newsletter il venditore potr&agrave; inviare i nuovi prodotti, le offerte o un qualsiasi messaggio, tramite email, a tutti gli utenti registrati al suo sito.
					</div>
				</div>
				<div class="divaggiornamenti">
					<div class="titoloaggiorna">Esportazione Utenti in excel</div>
					<div class="descrizioneaggiorna">
						Gli Utenti ora potranno essere esportati su un foglio elettronico, Excel, in cui avrete tutte le informazioni di ogni Cliente.
					</div>
				</div>
			</div>
		</div>
		<div class="boxd">
			<div class="puntiforza">
				<div class="iconapuntiforza"><img src="immagini/icona_puntof.jpg" /></div>
				<div class="domandapuntiforza">Che differenza c'&egrave; tra un <u>Sito Normale</u> e S-Admin ?</div>
			</div>
			<div class="rispostapuntiforza">
				I classici siti di Arredamento sono realizzati con tecniche caratteristiche di animazione, realizzando una sorta di vetrina virtuale, nella quale si d&agrave; una maggiore importanza all'aspetto grafico del Sito, pi&ugrave; che alla sua funzionalit&agrave;.		<br /><br />		
				S-Admin &egrave; una piattaforma sviluppata per la gestione completa del tuo sito di Arredamento. Rispetto a un Sito Normale ti consentir&agrave; di gestire infiniti prodotti, di identificarne le marche, e di associare delle propriet&agrave; a ogni singolo prodotto. <br /><br />
				Il modulo per l'inserimento &egrave; stato ideato su misura per i negozi di arredamento e i mobilifici, quindi consente di inserire oltre al nome del mobile e alla sua descrizione le sue caratteristiche quali l'altezza, la lunghezza, la profondit&agrave;, la tipologia di legno utilizzata per fabbricare il mobile, il suo colore, l'anno di creazione, la laccatura, ecc.<br /><br />
				Per apprezzare al meglio le caratteristiche di S-Admin prova subito a caricare un prodotto.<br />
				<div class="linkpuntiforza">
					<div class="linkpuntiforza1"><img src="immagini/inserisci.gif"></div>
					<div class="linkpuntiforza2"><a href="#" Onclick="javascript: oscura(); caricapagina();">Inserisci un prodotto</a></div>	
				</div>
			</div>
		</div>
	</div>	
	<div class="footer">
		<div class="box">
			<div class="descrizionecliente">
				<div class="immaginecliente"><img src="immagini/saracino.png"></div>
				<div class="storiacliente">
					La <b>Saracino Arreda</b> &egrave; un'azienda residente ad Avetrana (TA) che opera nel settore dell'Arredamento. Nasce nel 1955, un'azienda professionale e ricca di tradizioni.<br /><br />
					<img src="immagini/continua.jpg"><a href="schedasaracino.html">Continua a leggere</a>
				</div>
			</div>
		</div>		
		<div class="box1">
			I Nostri Clienti<br />che usano <br /><b>S-Admin</b>
		</div>	
		<div class="box">
			<div class="descrizionecliente">
				<div class="immaginecliente"><img src="immagini/poti.png"></div>
				<div class="storiacliente">
					<b>Pot&igrave; Arredamenti</b> viene fondata nel 1955 un'azienda residente a Novoli (Le) fondata da Giuseppe Pot&igrave; diventata un importante punto di riferimento del settore nel Salento.<br /><br />
					<img src="immagini/continua.jpg"><a href="schedapoti.html">Continua a leggere</a>
				</div>
			</div>
		</div>
	</div>
<?php include "footer.php"; ?>
</div>	
<div id="oscura" Onclick="javascript:chiudi();"></div>
</body>
</html>