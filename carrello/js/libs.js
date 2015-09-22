var lista=new Array();
var prodotti=new Array();
var prodotticarrello=new Array();
var trovato=new Array();
var numeroelementi=0;
var errorecoupon=0;
var erroreprod=false;

function ripristino(){
	//Tolgo l'icona di coupon giusto
	document.getElementById("success").className="successoff";
	
	document.getElementById("scaduto").innerHTML="";
	document.getElementById("scaduto").className="couponscadutoff";
		
	//Resetto tutti i prezzi
	for(var a=0;a<trovato;a++){
			
		//Prezzo unitario scontato
		document.getElementById(trovato[a]+"prea").className="prezzonormale";
		document.getElementById(trovato[a]+"offa").className="prezzooff";
			
		//Prezzo unitario per le quantità scontato
		document.getElementById(trovato[a]+"preb").className="prezzonormale";
		document.getElementById(trovato[a]+"offb").className="prezzooff";
			
	}
	//Aggiorno il totale parziale
	document.getElementById("totaleparzialediv").innerHTML="&euro; "+calcolatotaleparziale();
	document.getElementById("totaleparziale").value=calcolatotaleparziale();
	
	//Aggiorno l'iva
	document.getElementById("ivacarrellodiv").innerHTML="&euro; "+calcolaiva();
	document.getElementById("ivacarrello").value=calcolaiva();

	//Aggiorno il totale finale
	document.getElementById("totalefinalediv").innerHTML="Totale (iva inclusa) &euro; "+calcolatotale();
	document.getElementById("totalefinale").value=calcolatotale();	

}

//Funzione per controllare se l'ID-COUPON è valido
function controllocoupon(idcoupon,listaprodotti,input){
	var conn = new XMLHttpRequest();
	conn.open("post","/carrello/verificacoupon.php",true);
	conn.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	conn.onreadystatechange = function(){
		if(conn.readyState == 4){
			if(conn.responseText != "" && conn.responseText.length>2){
				if(conn.responseText.trim()=="erroreprod"){
					ripristino();
					erroreprod=true;
				}else{
					document.getElementById("scaduto").className="couponscaduton";
					document.getElementById("scaduto").innerHTML=conn.responseText;
					errorecoupon=0;
					visualizzaoffertascaduta(input);
				}
			}else{
				visualizzaofferta(input,idcoupon);
			}	
		}	
	}
	
	var parametri = "idcoupon="+idcoupon+"&listaprod="+listaprodotti;
	conn.send(parametri);
}

//Toglie il punto se è quello delle migliaia Es. 1.000
function toglipunto(read){
	
	var testomod;
	testomod=read.toString().split(".");
	
	if((testomod.length-1)>1){
		var res="";
		var str=read.toString().split(".");
		
		for(var a=0;a<str.length-1;a++){
			res=res+str[a];
		}
		
		return res+"."+str[str.length-1];
	}else{
		return read;
	}	
}

//Funzione per i numeri in euro
function formatMoney(number){
	var numberStr = parseFloat(number).toFixed(2).toString();
	var numFormatDec = numberStr.slice(-2); /*decimal 00*/
	numberStr = numberStr.substring(0, numberStr.length-3); /*cut last 3 strings*/
	var numFormat = new Array;
	while (numberStr.length > 3) {
		numFormat.unshift(numberStr.slice(-3));
		numberStr = numberStr.substring(0, numberStr.length-3);
	}
	numFormat.unshift(numberStr);
	return toglipunto(numFormat.join('.')+'.'+numFormatDec); /*format 000.000.000,00 */
}

//Converti da ascii a hex
function asc2hex(pStr) {
	tempstr = '';
	for (a = 0; a < pStr.length; a = a + 1) {
		tempstr = tempstr + pStr.charCodeAt(a).toString(16);
	}
	return tempstr;
}

//Converti da hex a ascii
function hex2asc(pStr) {
	tempstr = '';
	for (b = 0; b < pStr.length; b = b + 2) {
		tempstr = tempstr + String.fromCharCode(parseInt(pStr.substr(b, 2), 16));
	}
	return tempstr;
}

//Funzione che calcola il totale parziale
function calcolatotaleparzialescont(){
	var totale=0;
	
	for(var c=0;c<prodotticarrello.length;c++){
		if(document.getElementById("totalescont"+(prodotticarrello[c]))!=null){
			var prezzocor = parseFloat(document.getElementById("totalescont"+(prodotticarrello[c])).value);
		
			totale=totale+prezzocor;
		}	

	}

	return toglipunto(formatMoney(totale));
}

//Funzione che calcola le spese di spedizione
function calcolaspesespedizione(){
	var peso=0;
	for(var c=0;c<prodotticarrello.length;c++){
		peso = peso+parseFloat(document.getElementById("peso"+prodotticarrello[c]).value);
	}

	if(peso==0){
		return "0.00";
	}

	if(peso>0 && peso<3){
		return "10.00";
	}
	
	if(peso>=3){
		return "10.00";
	}

}

//Funzione che calcola il totale parziale
function calcolatotaleparziale(){
	
	var totale=0;
	var c=0;
	var a=0;
			
	while(c<numeroelementi){
		if(document.getElementById("totale"+(a+1))!=null){
			var prezzocor = parseFloat(toglipunto(document.getElementById("totale"+(a+1)).value));
		
			totale=totale+prezzocor;
			
			c++;
		}

		a++;
	}

	return formatMoney(totale);
}

//Funzione che calcola l'iva sul totale parziale
function calcolaiva(){
	var iva=0;
	var totaleparz = 0;
	
	totaleparz = parseFloat(toglipunto(document.getElementById("totaleparziale").value));
	
	iva=(totaleparz*22)/100
	
	return formatMoney(iva);
}

//Funzione che calcola l'iva sul totale parziale
function calcolatotale(){
	var totaleparz=0;
	var iva=0;
	var spesespedizioni=0;
	
	totaleparz=parseFloat(toglipunto(document.getElementById("totaleparziale").value));
	iva = parseFloat(toglipunto(document.getElementById("ivacarrello").value));
	spesespedizioni=parseFloat(calcolaspesespedizione());
		
	return formatMoney(totaleparz+iva+spesespedizioni);
}

//Funzione per scrivere gli id-coupon in ogni input
function inseriscicoupon(coupon){
	for(var c=0;c<numeroelementi;c++){
		document.getElementById("idcouponq"+(c)).value=coupon;
		document.getElementById("idcoupone"+(c)).value=coupon;
	}

}

function visualizzaofferta(input,couponhex){

	document.getElementById("scaduto").innerHTML="";
	document.getElementById("scaduto").className="couponscadutoff";

	//trascrivo l'id-coupon nelle text
	inseriscicoupon(input.value);
	
	//Cerco quello scritto dall'utente nell'array dei coupon
	elem=lista.indexOf(couponhex);
	
	//Array dei prodotti trovati con l'id-coupon
	trovato=new Array();
	
	//Faccio uscire una v per far capire che l'id coupon è giusto
	document.getElementById("success").className="successon";
				
	//Sconto tutti i prezzi
	for(var b=0;b<prodotti[elem].length;b++){
		if(document.getElementById(prodotti[elem][b][0]+"prea")!=null){
			//Quantità esistenti nel carrello
			var qntesistenti = parseFloat(document.getElementById("quantita"+prodotti[elem][b][0]).value);
			
			//Prezzo unitario scontato
			document.getElementById(prodotti[elem][b][0]+"prea").className="prezzoscontato";
			document.getElementById(prodotti[elem][b][0]+"offa").className="prezzooff1";
			document.getElementById(prodotti[elem][b][0]+"offa").innerHTML="&euro; "+formatMoney(prodotti[elem][b][1]);
		
			//Prezzo unitario per le quantità scontato
			document.getElementById(prodotti[elem][b][0]+"preb").className="prezzoscontato";
			document.getElementById(prodotti[elem][b][0]+"offb").className="prezzooff1";
			document.getElementById(prodotti[elem][b][0]+"offb").innerHTML="&euro; "+formatMoney(toglipunto(prodotti[elem][b][1])*qntesistenti);
			document.getElementById("totalescont"+prodotti[elem][b][0]).value=formatMoney(prodotti[elem][b][1]*qntesistenti);
					
			//salvo in un array gli id trovati così successivamente li posso cancellare
			trovato.push(prodotti[elem][b][0]);
		}	
	}
	
	//Aggiorno il totale parziale
	document.getElementById("totaleparzialediv").innerHTML="&euro; "+calcolatotaleparzialescont();
	document.getElementById("totaleparziale").value=calcolatotaleparzialescont();
	
	//Aggiorno l'iva
	document.getElementById("ivacarrellodiv").innerHTML="&euro; "+calcolaiva();
	document.getElementById("ivacarrello").value=calcolaiva();

	//Aggiorno il totale finale
	document.getElementById("totalefinalediv").innerHTML="Totale (iva inclusa) &euro; "+calcolatotale();
	document.getElementById("totalefinale").value=calcolatotale();
}

function visualizzaoffertascaduta(input){
	//trascrivo l'id-coupon nelle text
	inseriscicoupon(input.value);
					
	//Se sono stati trovati dei prodotti e si continua a inserire caratteri faccio ritornare le div come prima
	if(trovato.length>0){
									
		//Resetto tutti i prezzi
		for(var a=0;a<trovato.length;a++){
			//Quantità esistenti nel carrello
			var qntesistenti = document.getElementById("quantita"+trovato[a]).value;
			var prezzoorig = document.getElementById("totale"+trovato[a]).value;
			
			//Prezzo unitario scontato
			document.getElementById(trovato[a]+"prea").className="prezzonormale";
			document.getElementById(trovato[a]+"offa").className="prezzooff";
			document.getElementById(trovato[a]+"offa").innerHTML="&euro; "+formatMoney(prodotti[a]);
			
			//Prezzo unitario per le quantità scontato
			document.getElementById(trovato[a]+"preb").className="prezzonormale";
			document.getElementById(trovato[a]+"offb").className="prezzooff";
			document.getElementById(trovato[a]+"offb").innerHTML="&euro; "+formatMoney(trovato[a]*qntesistenti);
			document.getElementById("totale"+trovato[a]).value=formatMoney(prezzoorig*qntesistenti);
			document.getElementById("totalescont"+trovato[a]).value=formatMoney(prezzoorig*qntesistenti);
			
		}
		
		//Aggiorno il totale parziale
		document.getElementById("totaleparzialediv").innerHTML="&euro; "+calcolatotaleparziale();
		document.getElementById("totaleparziale").value=calcolatotaleparziale();
		
		//Aggiorno l'iva
		document.getElementById("ivacarrellodiv").innerHTML="&euro; "+calcolaiva();
		document.getElementById("ivacarrello").value=calcolaiva();

		//Aggiorno il totale finale
		document.getElementById("totalefinalediv").innerHTML="Totale (iva inclusa) &euro; "+calcolatotale();
		document.getElementById("totalefinale").value=calcolatotale();		
	}

}

function coupon(input){

	var couponhex;
			
	//Controllo l'id-coupon quando arriva a 6 quantità
	if(input.value.length==6){
			
		//Trasformo quello inserito dall'utente in hex
		couponhex= asc2hex(input.value.toLowerCase());
		
		//Controllo se è scaduto o valido l'id-coupon
		controllocoupon(couponhex,prodotticarrello,input);
					
	}else{
		//Se sono stati trovati dei prodotti e si continua a inserire caratteri faccio ritornare le div come prima
		if(trovato.length>0){
			
			//Tolgo l'icona di coupon giusto
			document.getElementById("success").className="successoff";
			
			document.getElementById("scaduto").innerHTML="";
			document.getElementById("scaduto").className="couponscadutoff";
				
			//Resetto tutti i prezzi
			for(var a=0;a<trovato.length;a++){
				//Quantità esistenti nel carrello
				var qntesistenti = document.getElementById("quantita"+trovato[a]).value;
				var prezzoorig = document.getElementById("totale"+trovato[a]).value;
					
				//Prezzo unitario scontato
				document.getElementById(trovato[a]+"prea").className="prezzonormale";
				document.getElementById(trovato[a]+"offa").className="prezzooff";
				document.getElementById(trovato[a]+"offa").innerHTML="&euro; "+formatMoney(prodotti[a]);
					
				//Prezzo unitario per le quantità scontato
				document.getElementById(trovato[a]+"preb").className="prezzonormale";
				document.getElementById(trovato[a]+"offb").className="prezzooff";
				document.getElementById(trovato[a]+"offb").innerHTML="&euro; "+formatMoney(trovato[a]*qntesistenti);
				document.getElementById("totale"+trovato[a]).value=formatMoney(prezzoorig*qntesistenti);
				document.getElementById("totalescont"+trovato[a]).value=formatMoney(prezzoorig*qntesistenti);
					
			}
				
			//Aggiorno il totale parziale
			document.getElementById("totaleparzialediv").innerHTML="&euro; "+calcolatotaleparziale();
			document.getElementById("totaleparziale").value=calcolatotaleparziale();
				
			//Aggiorno l'iva
			document.getElementById("ivacarrellodiv").innerHTML="&euro; "+calcolaiva();
			document.getElementById("ivacarrello").value=calcolaiva();

			//Aggiorno il totale finale
			document.getElementById("totalefinalediv").innerHTML="Totale (iva inclusa) &euro; "+calcolatotale();
			document.getElementById("totalefinale").value=calcolatotale();		
		}
	}
}
