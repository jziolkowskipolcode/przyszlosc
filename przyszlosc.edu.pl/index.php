<?php
session_destroy();

session_start();
header("Cache-Control: max-age=604800, must-revalidate");
require('expires.php');
/*
 * jeżeli było przekierowanie na strone po wylogowaniu
 */
if (isset($_SERVER['HTTP_REFERER'])) {
    $strSlowo = $_SERVER['HTTP_REFERER'];
    $strSzukane = 'logout.php';
    $strSzukane2 = 'dmin';
    if ((strpos($strSlowo, $strSzukane) != false) or (strpos($strSlowo, $strSzukane2) != false)) {
               echo "Zostałaś/eś wylogowana/y.";
    }
}

require 'DB.php';

function checkSign2($tekst) {
    if (preg_match('/[^0-9]/', $tekst) && strlen($tekst) > 3) {
        return 0;
    } else {
        return 1;
    }
}
//
//   Usuwanie plików z ocenami i frekwencja
//


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <HEAD>

    <TITLE>Prywatne Szkoły Przyszłość dla młodzieży i dorosłych w Bydgoszczy, Boguszycach i Mycielewie</TITLE>
        <meta name="Author" content="Prywatne Szkoły Przyszłość" >
        <meta name="Copyright" content="Firma informatyczna EnterSoft" >
        <meta name="Language" content="pl">
        <meta name="pagerank™" content="2"></meta>
		<meta http-equiv="Cache-Control" content="max-age=604800" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
        <meta name="Keywords" content="przyszlosc.edu.pl, przyszłość bydgoszcz, przyszłość boguszyce, przyszłość mycielewo, prywatne szkoły, szkoły policealne, szkoła, dla dorosłych, rekrutacja, liceum, przyszłość, zapisy, brak wpisowego, podręczniki, bydgoszcz, boguszyce, mycielewo, niskie koszty, wykwalifikowana kadra, oferta edukacyjna, strona główna, pomoce dydaktyczne, nasza przyszłość, twoja przyszłość, oferta, PRZYSZŁOŚĆ">
        <meta name="robots" content="index, follow" />
        <link href="favicon.ico" rel="icon" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="style/widok.css" media="screen,projection" >
        <style type="text/css"> 
		<!-- .selected { font: bold 30px Arial, Helvetica, sans-serif; color:#FF0000; } --> 
		<!-- .selected2 { font: bold 30px Arial, Helvetica, sans-serif; color:#FF0000; } --> 
		div.vertical_scroller{
        position:relative;
        display:block;
        overflow:hidden;
        border:#CCCCCC 1px solid;
		}
		div.scrollingtext{
        position:absolute;
        white-space:nowrap;
        font-family:'Trebuchet MS',Arial;
        font-size:18px;
        color:#000000;
		}

		</style> 
        <script type="text/javascript" src="javascripts/jquery-latest.js"></script>
        
		<script type="text/javascript">

        var Lst;
		var LstM;
			function CngClass(obj){
		
			if (Lst) Lst.className=''; 
			
			obj.className='selected';
			Lst=obj;
			}
	 
	 		function CngClassM(obj2){
		
			if (LstM) LstM.className=''; 
			
			obj2.className='aktywne';
			LstM=obj2;
			}
	 
    function showHideContent (content) {
     var contentx = document.getElementById(content);
     var jeden = document.getElementById('slidingDiv');
     var dwa = document.getElementById('slidingDiv2');
     var trzy = document.getElementById('slidingDiv3');
     var cztery = document.getElementById('slidingDiv4');
     if (contentx.style.visibility == "hidden"){ 
		if(jeden!='null')
		ukryj(jeden);
		if(dwa!='null')
		ukryj(dwa);
		if(trzy!='null')
		ukryj(trzy);

		
     contentx.style.visibility = "visible";
	 contentx.style.overflow = "visible";}
     else {contentx.style.visibility = "hidden";
			contentx.style.overflow = "hidden";
    }}
    function ukryj (content) {
     
     content.style.visibility = "hidden";
	 content.style.overflow = "hidden";
    }


    <!--
    $(document).ready(function() {
        $('.vertical_scroller').SetScroller({	velocity: 	 40,
            direction: 	 'vertical',
            startfrom: 	 'bottom',
            loop:		 'infinite',
            movetype: 	 'linear',
            onmouseover: 'play',
            onmouseout:  'play',
            onstartup: 	 'play',
            cursor: 	 'pointer'
        });
    });
    //-->

/***********************************************
* Dynamic Ajax Content- ? Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

var bustcachevar=1 //bust potential caching of external pages after initial request? (1=yes, 0=no)
var loadedobjects=""
var rootdomain="https://"+window.location.hostname
var bustcacheparameter=""

function page(url, containerid){
var page_request = false
if (window.XMLHttpRequest) // if Mozilla, Safari etc
page_request = new XMLHttpRequest()
else if (window.ActiveXObject){ // if IE
try {
page_request = new ActiveXObject("Msxml2.XMLHTTP")
} 
catch (e){
try{
page_request = new ActiveXObject("Microsoft.XMLHTTP")
}
catch (e){}
}
}
else
return false
page_request.onreadystatechange=function(){
loadpage(page_request, containerid)
}
if (bustcachevar) //if bust caching of external page
bustcacheparameter=(url.indexOf("?")!=-1)? "&"+new Date().getTime() : "?"+new Date().getTime()
page_request.open('GET', url+bustcacheparameter, true)
page_request.send(null)
}

function loadpage(page_request, containerid){
if (page_request.readyState == 4 && (page_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(containerid).innerHTML=page_request.responseText
}

function loadobjs(){
if (!document.getElementById)
return
for (i=0; i<arguments.length; i++){
var file=arguments[i]
var fileref=""
if (loadedobjects.indexOf(file)==-1){ //Check to see if this object has not already been added to page before proceeding
if (file.indexOf(".js")!=-1){ //If object is a js file
fileref=document.createElement('script')
fileref.setAttribute("type","text/javascript");
fileref.setAttribute("src", file);
}
else if (file.indexOf(".css")!=-1){ //If object is a css file
fileref=document.createElement("link")
fileref.setAttribute("rel", "stylesheet");
fileref.setAttribute("type", "text/css");
fileref.setAttribute("href", file);
}
}
if (fileref!=""){
document.getElementsByTagName("head").item(0).appendChild(fileref)
loadedobjects+=file+" " //Remember this object as being already added to page
}
}
}
        </script>

    </HEAD>
    <?php ob_flush(); ?>
    <body >

        <!--        naglowek strony-->
        <!--[if IE]>
<style>
        #container {
	width:960px;
padding: 0;
	margin:0 auto -13px auto;
	position: relative;
height: 27px;
clear: both;
}
        #main {
        margin-right:-20px;
        }
#pojemnik {
text-align : left;
margin-top : 0;
margin-left : auto;
margin-right : auto;
position : relative;
width : 960px;
padding : 0;
padding-top:21px;
border : none;
}
        </style>
<![endif]-->
        <div style="width:960px; text-align: center; margin-left: auto; margin-right: auto;">
        <div id="container" >
            <div id="opcje1">
                <div id="topnav" class="topnav"><a href="https://przyszlosc.edu.pl/asLog/zaloguj.php" class="signin"><span>Zaloguj się</span></a></div>


               
            </div>
            <div id="opcje2">
                <div id="topnav2" class="topnav2"><a href="https://przyszlosc.edu.pl/pop/" class="signin2" target="_blank"><span>Poczta</span></a></div>

            </div>
            <div id="opcje3">
                <div id="topnav3" class="topnav3"><a href="index.php?kontakt" class="signin2"><span>Kontakt</span></a></div>

            </div>
            
        </div>
        <!--czesc glowna strony-->
        <div id="pojemnik">
            <div id="logo">
				<div id="log" style="float:left; clear:none; width:350px; height:92px; padding-left:6px; padding-top:6px; 	padding-bottom:0; ">
				<img src="style/logo.png" height="90px"  align="right" style="padding-right:25%"></div>
			 
			 
		<div id="baner" style="float:right; height:90px; width:600px;  padding-top:4px; padding-right:4px; clear:none; ">   
		</div>
              
            </div>
            <div style="border:none; padding:0;margin:0;">
                <?php
//                include 'menuup.php';
                include 'menuStatic.php';
                ?>
            </div>

            <!--                tresci artykułow-->
                        <div id="contentarea" style="width:100%; overflow: hidden;border:0; padding:0; margin:0; 
                        padding-bottom:20px;  background: url('style/poj.png') repeat-y; border:none; ">
     <?php


     include 'main.php';
     
         
     ?>
            
               </div>
            
            
            
            
            <!--stopka-->
            <div id="footer">
      
                <center> <p>    Copyright &copy; <?php echo date('Y'); ?> <a href="index.php">Przyszłość</a><strong> &middot;</strong> <a href="index.php?kontakt=1">Kontakt</a> <strong> &middot;</strong> <?php
//****************************************************
//zapobiega przed dopisem maila do spamów przez roboty
//****************************************************
                    ?>
                        <script type="text/javascript">
                            // <![CDATA[
                            var uzytkownik = 'przyszlosc';
                            var domena = 'przyszlosc.edu.pl';
                            var dodatkowe = '?subject=Temat listu';
                            var opis = 'Mail';
                            document.write('<a hr' + 'ef="mai' + 'lto:' + uzytkownik + '\x40' + domena + dodatkowe + '">');
                            if (opis) document.write(opis + '<'+'/a>');
                            else document.write(uzytkownik + '\x40' + domena + '<'+'/a>');
                            // ]]>
                        </script> 



</p></center>
           <p style="text-align: center; color:#222; font-size:12px;">
               Ta strona korzysta z plików cookie. Od użytkowników nie są pobierane dane poza koniecznymi dla tworzenia danych statystycznych wg polityki prywatności Google http://www.google.com/intl/en_uk/analytics/privacyoverview.html . Jeśli nie akceptujesz korzystania z ciasteczek, możesz zmienić ustawienia swojej przeglądarki. Jednocześnie informujemy, że w przypadku nie akceptowania plików cookies, niektóre części strony mogą być niedsotępne.
           </p>
            </div>

        </div>
     
 
        </div>
    		
<script type="text/javascript" src="javascripts/swfobject.js"></script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-25875766-3']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
			swfobject.registerObject("banerek", "9.0.0", "grafika/swf/expressInstall.swf");

			swfobject.registerObject("logos", "9.0.0", "grafika/swf/expressInstall.swf");

</script>

    </body>
</html>

