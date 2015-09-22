var contatore=-200;
var contatore1=-200;
var larghezza=0;


function oscura() {    
	if (navigator.appVersion.indexOf("MSIE")!=-1){         
		document.getElementById("oscura").style.width = document.documentElement.clientWidth;         
		document.getElementById("oscura").style.height = "1210px";       
	}    
	document.getElementById("oscura").style.display = "block";
}

function caricapagina(){
	document.body.innerHTML+="<div id='scrivipagina1' class='divsplash1'><div class='divlink1'><a href='#' Onclick='javascript: aggiorna();'>VISUALIZZA</a></div></div>";		
	document.body.innerHTML+="<div id='scrivipagina2' class='divsplash2'><div class='divlink'><a href='#' Onclick='javascript: aggiorna1();'>ENTRA</a></div></div>";		
	document.body.innerHTML+="<div id='scrivipagina' class='divsplash'><img src='immagini/splash.jpg' /></div>";		
	setTimeout( 'toglisplash()', 2500 );
	return false;
}

function aggiorna(){
	window.location="http://www.softwarearredamento.com/intermedia.php";
}

function aggiorna1(){
	window.location="http://www.softwarearredamento.com/graficasaracino.html";
}
	
function spostadiv(){
	contatore=contatore+5;
	contatore1=contatore1-5;
	if(contatore<30){
		document.getElementById("scrivipagina1").style.marginLeft=contatore+"px";
		document.getElementById("scrivipagina2").style.marginLeft=contatore1+"px";
		setTimeout( 'spostadiv()', 50 );
	}
}	

function toglisplash(){
	larghezza=larghezza-5;
	if(larghezza>-600){
		document.getElementById("scrivipagina").style.top=larghezza+"px";
		setTimeout( 'toglisplash()', 50 );
	}else{
		document.getElementById("scrivipagina").style.display='none';
		setTimeout( 'spostadiv()', 800);
	}	
}

function chiudi(){
	window.location="http://www.softwarearredamento.com";
}	