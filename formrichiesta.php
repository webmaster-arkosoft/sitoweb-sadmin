		<script type="text/javascript" src="js/controllocampipreventivo.js"></script>
		<form action="index.html" name="richiedipreventivo" id="richiedipreventivo" method="POST" class="form" Onsubmit="javascript: return controllocampi();">
		<div class="titlepreventivo" id="titlepreventivo">Richiedi un preventivo</div>
		<div class="divcampipreventivo" id="divcampipreventivo">
			<div class="campipreventivo">Nome e Cognome*: <input type="text" id="nome" name="nome" class="inputcampo" value=""></div> 
			<div class="campipreventivo">Ragione sociale: <input type="text" name="ragione" class="inputcampo" id="ragione" value=""></div> 
			<div class="campipreventivo">Cap*: <input type="text" name="cap" id="cap" value="" class="cap"> Citt&agrave;*<input type="text" name="citta" id="citta" class="inputcitta" value=""> Prov*<input type="text" name="prov" id="prov" class="inputprov" value=""></div>
			<div class="campipreventivo">Telefono* : <input type="text" name="telefono" class="inputcampo" id="telefono" value=""></div> 
			<div class="campipreventivo">E-mail* : <input type="text" name="email" class="inputcampo" id="email" value=""></div> 
			
			<div class="imgpreventivo"><img src="immagini/telefona.jpg"></div>
		</div>
		<div class="caratteristichepreventivo" id="caratteristichepreventivo">
			<div class="title2preventivo">Richiesta*:</div>
			<textarea id="richiesta" name="richiesta" cols="50" rows="7" class="textareapreventivo"></textarea>
			
			<div class="title2preventivo">Legge sulla privacy</div>
			<textarea cols="50" rows="3" READONLY>Ai sensi dell'art. 13 del D.Lgs 196/2003, i dati personali forniti ad Arkosoft saranno trattati in modo lecito, secondo correttezza e nell'assoluto rispetto della normativa vigente in materia di privacy, anche con l'ausilio di mezzi elettronici o comunque automatizzati che consentano la conservazione protetta degli stessi. Sempre per le medesime finalità, i dati personali possono venire a conoscenza dei dipendenti addetti all'Unità  di Arkosoft e/o di terzi che abbiano rapporti di servizio con la stessa, preposti al trattamento medesimo, in qualità  d'Incaricati del trattamento.<BR>I medesimi dati personali, previo suo specifico consenso, potranno anche essere utilizzati per finalità  di marketing (esempio invio di materiale pubblicitario omaggi e buoni sconti, indagini di mercato) da parte di Arkosoft. Tale consenso è facoltativo. Lei, quale soggetto interessato, ha la facoltà  di esercitare i diritti previsti dall'art. 7 del D.Lgs. 196/2003 ed, in particolare, ha il diritto di conoscere in ogni momento quali sono i suoi dati e come vengono utilizzati; ha anche il diritto di farli aggiornare, integrare, rettificare o cancellare, chiederne il blocco ed opporsi al loro trattamento.<BR>La informiamo, inoltre, che il titolare del trattamento dei dati è Arkosoft, nella persona del Presidente del Consiglio di Amministrazione, domiciliato presso la sede della società  in via Casterllo 54 a San Pancrazio Salentino (Br) ,mentre il responsabile del trattamento dei dati è il Responsabile vendite clienti della divisione mercato di Arkosoft, domiciliato presso la sede della società  in via Castello,54 a San Pancrazio Salentino (Br).</textarea>
			<input type="checkbox" name="acconsento" id="acconsento" checked="checked"> Dichiaro di aver letto la Legge sulla Privacy
			
			<div class="img1preventivo"><input type="image" src="immagini/richiestapreventivo.jpg" name="cmd" id="cmd" value="Invia"></div>
		</div>
		<input type="hidden" name="inviopre" id="inviopre" value="1"/>
		</form>