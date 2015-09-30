/* Z-INDEX PER HEADER, BODY E LISTA LATERALE SUL MOBILE */
function myFunction(){
	document.getElementById("header").style.zIndex="2";
	document.getElementById("cd-lateral-nav").style.zIndex="3";
	document.getElementById("cd-main-content").style.zIndex="1";
}

/* scroll animato della pagina */
$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 3000);
        return false;
      }
    }
  });
});

/* APERTURA E CHIUSURA DEL FOOTER */
stuHover = function() {
	var cssRule;
	var newSelector;
	for (var i = 0; i < document.styleSheets.length; i++)
		for (var x = 0; x < document.styleSheets[i].rules.length ; x++)
			{
			cssRule = document.styleSheets[i].rules[x];
			if (cssRule.selectorText.indexOf("LI:hover") != -1)
			{
				 newSelector = cssRule.selectorText.replace(/LI:hover/gi, "LI.iehover");
				document.styleSheets[i].addRule(newSelector , cssRule.style.cssText);
			}
		}
	var getElm = document.getElementById("nav").getElementsByTagName("LI");
	for (var i=0; i<getElm.length; i++) {
		getElm[i].onmouseover=function() {
			this.className+=" iehover";
		}
		getElm[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" iehover\\b"), "");
		}
	}
}
if (window.attachEvent) window.attachEvent("onload", stuHover);

/* ANIMAZIOENE MENU HEADER */

$(document).ready(function () {
      $('#nav li').hover(
        function () {
            //mostra sottomenu
            $('#menu', this).stop(true, true).delay(50).slideDown(500);
        }, 
        function () {
            //nascondi sottomenu
            $('#menu', this).stop(true, true).slideUp(500);
        }
    );
});