function controlloform(){
	if(document.getElementById('codice').value==''){
		alert('Il codice risulta vuoto!');
		document.getElementById('codice').focus();
		return false;
	}
	
	if(document.getElementById('codice').value.length!=6){
		alert('Il codice deve essere di 6 caratteri!');
		document.getElementById('codice').focus();
		return false;
	}
	
	if(document.getElementById('datainizio').value==''){
		alert('La data di inizio risulta vuota!');
		document.getElementById('datainizio').focus();
		return false;
	}
	
	if(document.getElementById('datafine').value==''){
		alert('La data di fine risulta vuota!');
		document.getElementById('datafine').focus();
		return false;
	}
	
	if(document.getElementById('quantita').value==''){
		alert('Le quantita risultano vuote!');
		document.getElementById('quantita').focus();
		return false;
	}
}

function aggiornaprezzo(read,num){
	var prezzo=0;
	if(isNaN(read.value)==false){
		prezzo=read.value;
	
		document.getElementById("prezzoivato"+num).innerHTML=formatMoney(parseFloat(prezzo)+((parseFloat(prezzo)*22)/100));
	}else{
		document.getElementById("prezzoivato"+num).innerHTML=prezzo;
	}
}