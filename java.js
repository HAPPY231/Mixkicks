var mybutton = document.getElementById("myBtn");

function topFunction(){
   $("html, body").animate({ scrollTop: "0" });
 };
function onasfun(){
  $("html, body").animate({ scrollTop: "350" });
}function ofefun(){
  $("html, body").animate({ scrollTop: "590" });
}
function kontaktfun(){
  $("html, body").animate({ scrollTop: "2800" });
}

var numer = Math.floor(Math.random()*4)+1;
var timer1 = 0;
var timer2 = 0;
var timer3 = 0;
var timer4 = 0;
var nrslajdu = numer;
function ustawslajd(nrslajdu)
{
clearTimeout(timer1);
clearTimeout(timer2);
numer = nrslajdu - 1;

schowaj();
timer3 = setTimeout("zmienslajd()",500)
}


function schowaj()
{
$("#slider").stop();
$("#slider").fadeOut(500);

}
function zmienslajd()
{
clearTimeout(timer3);
numer++; if(numer>4) numer=1;

var plik = "url('slajdy/slajd" + numer + ".jpg')"; 

document.getElementById("slider").style.backgroundImage = plik;
$("#slider").fadeIn(500);


timer1 = setTimeout("zmienslajd()",5000);
timer2 = setTimeout("schowaj()",4500);

}

function myFunction(x) {
  if (x.matches) { // If media query matches
    document.getElementById("nawa").style.width = "100%";
  } else {  
  }
}

var x = window.matchMedia("(max-width: 816px)")
myFunction(x) 
x.addListener(myFunction) 