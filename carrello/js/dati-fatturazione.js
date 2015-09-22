function controlloacquista(){
	if(document.acquista.tipoattivita[0].checked==true || document.acquista.tipoattivita[1].checked==true){
		if(document.acquista.ragione.value==''||document.acquista.ragione.value=='Inserisci la Ragione Sociale!'){
			alert('La ragione sociale risulta vuota!');
			document.acquista.ragione.focus();
			document.acquista.ragione.style.border='2px solid #ff0000';
			document.acquista.ragione.style.color='#ff0000';
			document.acquista.ragione.value='Inserisci la Ragione Sociale!';
			return false;
		}
	}	
	
	if(document.acquista.nome.value==''||document.acquista.nome.value=='Inserisci il tuo nome!'){
		alert('Il nome risulta vuoto!');
		document.acquista.nome.focus();
		document.acquista.nome.style.border='2px solid #ff0000';
		document.acquista.nome.style.color='#ff0000';
		document.acquista.nome.value='Inserisci il tuo nome!';
		return false;
	}
	
	if(document.acquista.cognome.value==''||document.acquista.cognome.value=='Inserisci il tuo cognome!'){
		alert('Il cognome risulta vuoto!');
		document.acquista.cognome.focus();
		document.acquista.cognome.style.border='2px solid #ff0000';
		document.acquista.cognome.style.color='#ff0000';
		document.acquista.cognome.value='Inserisci il tuo cognome!';
		return false;
	}
	
	if(document.acquista.indirizzo.value==''||document.acquista.indirizzo.value=='Inserisci il tuo indirizzo!'){
		alert('Inserisci il tuo indirizzo!');
		document.acquista.indirizzo.focus();
		document.acquista.indirizzo.style.border='2px solid #ff0000';
		document.acquista.indirizzo.style.color='#ff0000';
		document.acquista.indirizzo.value='Inserisci il tuo indirizzo!';
		return false;
	}
	
	if(document.acquista.cap.value==''||document.acquista.cap.value=='Inserisci il cap!'){
		alert('Inserisci il cap!');
		document.acquista.cap.focus();
		document.acquista.cap.style.border='2px solid #ff0000';
		document.acquista.cap.style.color='#ff0000';
		document.acquista.cap.value='Inserisci il cap!';
		return false;
	}
	
	if(document.acquista.citta.value==''||document.acquista.citta.value=='Inserisci la tua citta!'){
		alert('Inserisci la tua citta!');
		document.acquista.citta.focus();
		document.acquista.citta.style.border='2px solid #ff0000';
		document.acquista.citta.style.color='#ff0000';
		document.acquista.citta.value='Inserisci la tua citta!';
		return false;
	}
	
	if(document.acquista.prov.value==''||document.acquista.prov.value=='Inserisci la tua provincia!'){
		alert('Inserisci la tua provincia!');
		document.acquista.prov.focus();
		document.acquista.prov.style.border='2px solid #ff0000';
		document.acquista.prov.style.color='#ff0000';
		document.acquista.prov.value='Inserisci la tua provincia!';
		return false;
	}
	
	if(document.acquista.tipoattivita[0].checked==true || document.acquista.tipoattivita[1].checked==true){
		if(document.acquista.piva.value==''||document.acquista.piva.value=='Inserisci la tua partita iva!'){
			alert('Inserisci la tua partita iva!');
			document.acquista.piva.focus();
			document.acquista.piva.style.border='2px solid #ff0000';
			document.acquista.piva.style.color='#ff0000';
			document.acquista.piva.value='Inserisci la tua partita iva!';
			return false;
		}
	}
	
	if(document.acquista.tipoattivita[1].checked==true || document.acquista.tipoattivita[2].checked==true){
		if(document.acquista.codfiscale.value==''||document.acquista.codfiscale.value=='Inserisci il tuo codice fiscale!'){
			alert('Inserisci il tuo codice fiscale!');
			document.acquista.codfiscale.focus();
			document.acquista.codfiscale.style.border='2px solid #ff0000';
			document.acquista.codfiscale.style.color='#ff0000';
			document.acquista.codfiscale.value='Inserisci il tuo codice fiscale!';
			return false;
		}
	}
		
	if(document.acquista.tel.value==''||document.acquista.tel.value=='Inserisci il tuo numero di telefono!'){
		alert('Il numero di telefono risulta vuoto!');
		document.acquista.tel.focus();
		document.acquista.tel.style.border='2px solid #ff0000';
		document.acquista.tel.style.color='#ff0000';
		document.acquista.tel.value='Inserisci il tuo numero di telefono!';
		return false;
	}
	if(document.acquista.email.value==''||document.acquista.email.value=='Inserisci la tua e-mail!'){
		alert('l\'e-mail risulta vuota!');
		document.acquista.email.focus();
		document.acquista.email.style.border='2px solid #ff0000';
		document.acquista.email.style.color='#ff0000';
		document.acquista.email.value='Inserisci la tua e-mail!';
		return false;
	}
	if(document.acquista.email.value.indexOf("@")==-1||document.acquista.email.value=='Inserisci la tua e-mail correttamente!'){
		alert('l\'e-mail risulta non corretta!');
		document.acquista.email.focus();
		document.acquista.email.style.border='2px solid #ff0000';
		document.acquista.email.style.color='#ff0000';
		document.acquista.email.value='Inserisci la tua e-mail correttamente!';
		return false;
	}
	
	if(document.acquista.acconsento.checked==false){
		alert('Prima di proseguire accettare la Legge sulla Privacy');
	}
}
function svuota(read){
	switch(read){
	
	case'Inserisci la Ragione Sociale!':
		document.acquista.ragione.value='';
		document.acquista.ragione.style.border='1px solid #000';
		document.acquista.ragione.style.color='#000';
		break;
	
	case'Inserisci il tuo nome!':
		document.acquista.nome.value='';
		document.acquista.nome.style.border='1px solid #000';
		document.acquista.nome.style.color='#000';
		break;
		
	case'Inserisci il tuo cognome!':
		document.acquista.cognome.value='';
		document.acquista.cognome.style.border='1px solid #000';
		document.acquista.cognome.style.color='#000';
		break;	
	
	case'Inserisci il tuo indirizzo!':
		document.acquista.indirizzo.value='';
		document.acquista.indirizzo.style.border='1px solid #000';
		document.acquista.indirizzo.style.color='#000';
		break;
		
	case'Inserisci il cap!':
		document.acquista.cap.value='';
		document.acquista.cap.style.border='1px solid #000';
		document.acquista.cap.style.color='#000';
		break;
		
	case'Inserisci la tua citta!':
		document.acquista.citta.value='';
		document.acquista.citta.style.border='1px solid #000';
		document.acquista.citta.style.color='#000';
		break;
	
	case'Inserisci la tua provincia!':
		document.acquista.prov.value='';
		document.acquista.prov.style.border='1px solid #000';
		document.acquista.prov.style.color='#000';
		break;
	
	case'Inserisci la tua partita iva!':
		document.acquista.piva.value='';
		document.acquista.piva.style.border='1px solid #000';
		document.acquista.piva.style.color='#000';
		break;
	
	case'Inserisci il tuo codice fiscale!':
		document.acquista.codfiscale.value='';
		document.acquista.codfiscale.style.border='1px solid #000';
		document.acquista.codfiscale.style.color='#000';
		break;		
		
	case'Inserisci il tuo numero di telefono!':
		document.acquista.tel.value='';
		document.acquista.tel.style.border='1px solid #000';
		document.acquista.tel.style.color='#000';
		break;
	
	case'Inserisci la tua e-mail!':
		document.acquista.email.value='';
		document.acquista.email.style.border='1px solid #000';
		document.acquista.email.style.color='#000';
		break;
	
	case'Inserisci la tua e-mail correttamente!':
		document.acquista.email.value='';
		document.acquista.email.style.border='1px solid #000';
		document.acquista.email.style.color='#000';
		break;
	
	}
}

//Cambia bottone torna ai prodotti
function cambiabottoneavanti(){
	document.getElementById('avanti').src="/carrello/immagini/bottone-avanti1.jpg"
}

//Cambia bottone torna ai prodotti come inizio
function cambiabottoneavanti1(){
	document.getElementById('avanti').src="/carrello/immagini/bottone-avanti.jpg"
}

//Configurazione form
function configuraform(tipo){
	if(tipo=="1"){
		document.getElementById('codfiscale').className="campoacquistanascosto";
		document.getElementById('codfiscale1').className="inputacquistanascosto";
		document.getElementById('ragionesociale').className="campoacquista";
		document.getElementById('ragionesociale1').className="inputacquista";		
		document.getElementById('piva').className="campoacquista";
		document.getElementById('piva1').className="inputacquista";
	}	
	if(tipo=="2"){
		document.getElementById('codfiscale').className="campoacquista";
		document.getElementById('codfiscale1').className="inputacquista";
		document.getElementById('ragionesociale').className="campoacquista";
		document.getElementById('ragionesociale1').className="inputacquista";		
		document.getElementById('piva').className="campoacquista";
		document.getElementById('piva1').className="inputacquista";
	}	
	if(tipo=="3"){
		document.getElementById('codfiscale').className="campoacquista";
		document.getElementById('codfiscale1').className="inputacquista";
		document.getElementById('ragionesociale').className="campoacquistanascosto";
		document.getElementById('ragionesociale1').className="inputacquistanascosto";		
		document.getElementById('piva').className="campoacquistanascosto";
		document.getElementById('piva1').className="inputacquistanascosto";
	}	
}