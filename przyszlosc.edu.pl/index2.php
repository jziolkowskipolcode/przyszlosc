
        <script type="text/javascript" src="javascripts/jquery-latest.js"></script>
        <link rel="stylesheet" type="text/css" href="style/widok.css" media="screen,projection" >

        <!--        naglowek strony-->
        
        		<script type="text/javascript" src="swfobject.js"></script>
		<script type="text/javascript">
			swfobject.registerObject("banerek", "9.0.0", "expressInstall.swf");
		</script>
		<script type="text/javascript">
			swfobject.registerObject("logos", "9.0.0", "expressInstall.swf");
		</script>
		<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-24069038-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
		
		
		
        <script type="text/javascript">

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

/***Combo Menu Load Ajax snippet**/
function combo(selectobjID, loadarea){
var selectobj=document.getElementById? document.getElementById(selectobjID) : ""
if (selectobj!="" && selectobj.options[selectobj.selectedIndex].value!="")
page(selectobj.options[selectobj.selectedIndex].value, loadarea)
}
function flash(id, kolor, czas, kolor2, czas2)
{
	document.getElementById(id).style.color = kolor;
	setTimeout('flash("' + id + '","' + kolor2 + '",' + czas2 + ',"' + kolor + '",' + czas + ')', czas);
}
        </script>
      


     <script type="text/javascript">
            var miasta = [];
        </script>
        <!--        naglowek strony-->
        <!--[if IE]>
<style>
        #container {
	width:960px;
padding: 0;
	margin:0 auto -13px auto;
	position: relative;
height: 25px;
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
                <div id="topnav3" class="topnav3"><a href="javascript:page('main.php?kontakt=1', 'contentarea');" class="signin2"><span>Kontakt</span></a></div>

            </div>
            
        </div>
        <!--czesc glowna strony-->
        <div id="pojemnik">
            <div id="logo">
				<div id="log" style="float:left; clear:none; width:350px; height:100px; padding-left:6px; padding-top:6px; 	padding-bottom:6px;">
				<!--<img src="style/logo.ai" height="88px"></div>-->
			 
			 <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100%" height="90" id="logos">
				<param name="movie" value="style/logo.swf">
				 <param name="wmode" value="transparent"> 
				<!--[if !IE]>-->
				<object type="application/x-shockwave-flash" data="style/logo.swf" width="100%" height="90">
				<param name="wmode" value="transparent"> 
				<!--<![endif]-->
					<a href="http://www.adobe.com/go/getflashplayer">
						<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player">
					</a>
				<!--[if !IE]>-->
				</object>
				<!--<![endif]-->
			</object>
		
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
           
            </div>

        </div>
        <a href="http://jigsaw.w3.org/css-validator/check/referer">
        <img style="border:0;height:25px; float:left;"
        src="style/images/vcss-blue.gif"
        alt="Poprawny CSS!" align="middle" >
		</a> 
		  
    <a href="http://validator.w3.org/check?uri=https%3A%2F%2Fprzyszlosc.edu.pl%2F"><img
        src="style/images/valid-html401.png"
        alt="Valid HTML 4.01 Transitional" style="border:0;height:25px; float:left;"></a>
 
        </div>
       		



