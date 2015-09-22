//CONTROLLO CAMPI RICHIESTA
function controllocampi(){
	//Controllo se il nome risulta vuoto
	if(document.richiedipreventivo.nome.value==''){
		alert('Inserisci il Nome e Cognome!');
		document.richiedipreventivo.nome.focus();
		document.richiedipreventivo.nome.style.border='2px solid #ff0000';
		document.richiedipreventivo.nome.style.color='#ff0000';
		return false;
	}
	//Controllo se il cap risulta vuoto
	if(document.richiedipreventivo.cap.value=='' || document.richiedipreventivo.cap.value.length!=5 || isNaN(document.richiedipreventivo.cap.value)==true){
		alert('Inserisci il Cap correttamente!');
		document.richiedipreventivo.cap.focus();
		document.richiedipreventivo.cap.style.border='2px solid #ff0000';
		document.richiedipreventivo.cap.style.color='#ff0000';
		return false;
	}
	//Controllo se la città risulta vuota
	if(document.richiedipreventivo.citta.value==''){
		alert("Inserisci la citta'!");
		document.richiedipreventivo.citta.focus();
		document.richiedipreventivo.citta.style.border='2px solid #ff0000';
		document.richiedipreventivo.citta.style.color='#ff0000';
		return false;
	}
	//Controllo se la provincia risulta vuota
	if(document.richiedipreventivo.prov.value==''){
		alert('Inserisci la provincia!');
		document.richiedipreventivo.prov.focus();
		document.richiedipreventivo.prov.style.border='2px solid #ff0000';
		document.richiedipreventivo.prov.style.color='#ff0000';
		return false;
	}
	//Controllo se il telefono risulta vuoto
	if(document.richiedipreventivo.telefono.value==''|| isNaN(document.richiedipreventivo.telefono.value)==true){
		alert('Inserisci un numero di telefono!');
		document.richiedipreventivo.telefono.focus();
		document.richiedipreventivo.telefono.style.border='2px solid #ff0000';
		document.richiedipreventivo.telefono.style.color='#ff0000';
		return false;
	}
	//Controllo se l'email risulta vuota
	if(document.richiedipreventivo.email.value==''|| document.richiedipreventivo.email.value.indexOf("@")==-1){
		alert("L\'email non e' inserita correttamente!");
		document.richiedipreventivo.email.focus();
		document.richiedipreventivo.email.style.border='2px solid #ff0000';
		document.richiedipreventivo.email.style.color='#ff0000';
		return false;
	}
	//Controllo se la richiesta risulta vuota
	if(document.richiedipreventivo.richiesta.value==''){
		alert('Inserisci la tua richiesta!');
		document.richiedipreventivo.richiesta.focus();
		document.richiedipreventivo.richiesta.style.border='2px solid #ff0000';
		document.richiedipreventivo.richiesta.style.color='#ff0000';
		return false;
	}
	//Controllo se la legge privacy
	if(document.richiedipreventivo.acconsento.checked==false){
		alert('Devi accettare la legge sulla privacy!');
		return false;
	}
}	
//FINE CONTROLLO	