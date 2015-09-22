//PARAMETRI
var aperturadiv=30;
var chiusuradiv=30;
var apparizionediv=100;
var dissolvenzadiv=100;
//FINE PARAMENTRI



//VARIABILI GLOABLI
var i=0;
var a=0;
var a1=0;
var c=1;
var c1=100;
var b=470;
var e=991;
var f=0;
var g=50;
var divaperta=false;
var t=null;
var t1=null;
var t2=null;
var t3=null;
var t4=null;
var t6=null;
//FINE DICHIARAZIONE



//APERTURA DIV
function apripreventivo(){
	//Se la div è già aperta esegui la chiusura
	if(divaperta==false){
		var t=setTimeout("apridiv()", aperturadiv);
	}else{
		sfuma1();
	}	
}
function apridiv(){
	divaperta=false;
	i=i+10;
	if(i<510){
		document.getElementById('divpreventivo').style.height = i+"px";
		document.getElementById('divpreventivo').style.display='block';
		apripreventivo();
	}else{
		document.getElementById('richiedipreventivo').style.display='block';
		document.getElementById('titlepreventivo').style.display='block';
		document.getElementById('caratteristichepreventivo').style.display='block';
		document.getElementById('divcampipreventivo').style.display='block';
		clearTimeout(t);
		i=0;
		dissolvenza();
	}
}
//FINE APERTURA


//APPARIZIONE CAMPI INTERNI DELLA DIV
function dissolvenza(){
	var t1=setTimeout("sfuma()", apparizionediv);
}
function sfuma(){
	a=a+0.1;
	a1=a1+10;
	if(a<=1){
		document.getElementById('richiedipreventivo').style.opacity=a;
		document.getElementById('richiedipreventivo').style.filter="alpha(opacity="+a1+")"; 
		document.getElementById('titlepreventivo').style.display='block';
		document.getElementById('divcampipreventivo').style.display='block';
		document.getElementById('caratteristichepreventivo').style.display='block';
		dissolvenza();
	}else{
		document.getElementById('richiedipreventivo').style.opacity='1';
		document.getElementById('richiedipreventivo').style.filter="alpha(opacity=100)"; 
		divaperta=true;
		clearTimeout(t1);
		a1=0;
		a=0;
	}
}
//FINE APPARIZIONE CAMPI

//CHIUSURA DELLA DIV
function chiusura(){
	var t2=setTimeout("chiudidiv()", chiusuradiv);
}
function chiudidiv(){
	b=b-10;
	e=e-20;
	if(b>-10){
		document.getElementById('divpreventivo').style.height = b+"px";
		document.getElementById('titlepreventivo').style.display='none';
		document.getElementById('divcampipreventivo').style.display='none';
		document.getElementById('caratteristichepreventivo').style.display='none';
		chiusura();
	}else{
		e=991;
		b=470;
		divaperta=false;
		document.getElementById('titlepreventivo').style.display='none';
		document.getElementById('caratteristichepreventivo').style.display='none';
		document.getElementById('divcampipreventivo').style.display='none';
		document.getElementById('divpreventivo').style.display='none';
		document.getElementById('divpreventivo').style.height = '0px';
		document.getElementById('divpreventivo').style.width = '991px';
		clearTimeout(t2);
	}
}
//FINE CHIUSURA

//SCOMPARSA DEI CAMPI DELLA DIV	
function dissolvenza1(){
	var t3=setTimeout("sfuma1()", dissolvenzadiv);
}
function sfuma1(){
	c=c-0.1;
	c1=c1-10;
	if(c>0){
		document.getElementById('richiedipreventivo').style.opacity=c;
		document.getElementById('richiedipreventivo').style.filter="alpha(opacity="+c1+")"; 
		document.getElementById('titlepreventivo').style.display='block';
		document.getElementById('divcampipreventivo').style.display='block';
		document.getElementById('caratteristichepreventivo').style.display='block';
		dissolvenza1();
	}else{
		a=0;
		a1=0;
		c=1;
		c1=100;
		document.getElementById('richiedipreventivo').style.opacity='0';
		document.getElementById('richiedipreventivo').style.filter="alpha(opacity=10)";
		chiudidiv();
		clearTimeout(t3);
	}
}
//FINE SCOMPARSA
	
	
	
//MESSAGGIO INVIO EMAIL
function aprinvio(){
	var t4=setTimeout("inviocorretto()", 100);
}
function iniziochiudi(){
	var t5=setTimeout("chiudinviocorretto()", 3000);
}
function chiudinvio(){
	var t6=setTimeout("chiudinviocorretto()", 100);
}
function inviocorretto(){
	f=f+5;
	if(f<50){
		document.getElementById('divpreventivo').style.height = f;
		document.getElementById('divpreventivo').style.display='block';
		aprinvio();
	}else{
		document.getElementById("inviocorretto").style.display='block';
		document.getElementById('divpreventivo').style.display='block';
		document.getElementById('divpreventivo').className ="divpreventivo1";
		f=0;
		clearTimeout(t4);
		iniziochiudi();
	}
}
function chiudinviocorretto(){
	g=g-5;
	if(g>-5){
		document.getElementById("inviocorretto").style.display='none';
		document.getElementById('divpreventivo').style.height = g;
		chiudinvio();
	}else{
		document.getElementById('richiedipreventivo').style.display='none';
		document.getElementById('titlepreventivo').style.display='none';
		document.getElementById('divpreventivo').style.display='none';
		document.getElementById('caratteristichepreventivo').style.display='none';
		document.getElementById('divcampipreventivo').style.display='none';
		g=50;
		clearTimeout(t6);
	}
}
//FINE MESSAGGIO	

/*BOTTONE CLICCATO*/
function sfondobottone(){
	document.getElementById('cssprev').className ="bottoneattivo"; 
	document.getElementById('cssprev1').className ="bottoneattivo"; 
	document.getElementById('csshome').className ="bottone"; 
	document.getElementById('csshome1').className ="bottone"; 
}	
/*FINE BOTTONE CLICCATO*/