<style type="text/css">
#naga:hover{
background:#d9fdff;
}
</style>
	



   <div style="float:left;clear:none; border:solid 1px; width:400px; text-align:center; background:#ffffff;">
    <?php
    
    
    require 'DB.php';
    $dniowka;
    $raport;
    if(empty($uzytkownik)){
    $uzytkownik = $_COOKIE['username'];}
    $zaliczoneAll =0;
    $niezaliczoneAll=0;
    $zapytanie = mysql_query("Select * from `przyszlosc`.RCP_Rozliczenie where `RCP_Rozliczenie`.UserID = (Select `id` from `authority`.users where login = '".$uzytkownik."');");
    while($rezult = mysql_fetch_array($zapytanie)){
    $wydarzenia1 = explode(';',$rezult['Rozliczenie']);
    $wydarzenia=array_merge((array)$wydarzenia, (array)$wydarzenia1);
    }

    $zaliczone;
    $niezaliczone;
    
    $dzisiaj=getdate();
    $dziennum=$dzisiaj['mday'];
    $rok=$dzisiaj['year'];
    $miesiac=$dzisiaj['mon'];  
    if(isset($_GET['miesiac'])){
    $miesiac=$_GET['miesiac'];
    }
    if(isset($_GET['rok'])){
    $rok=$_GET['rok'];
    }
    
    if($miesiac>12){
    $miesiac-=12;
    $rok+=1;}
    if($miesiac<1){
    $miesiac+=12;
    $rok-=1;}
    $dzientygodnia=$dzisiaj['wday'];
    
    if ( ($exists = checkdate($miesiac,28,$rok)) == true ) {
    $liczbadni=28;
    if ( ($exists = checkdate($miesiac,29,$rok)) == true ) {
    $liczbadni=29;
    if ( ($exists = checkdate($miesiac,30,$rok)) == true ) {
    $liczbadni=30;
    if ( ($exists = checkdate($miesiac,31,$rok)) == true ) {
    $liczbadni=31;
    } } } }
     
     
    //for ($i=1;$i<=$liczbadni;$i++)
    //$interfejs[$i]=$i;
    $znacznik = mktime(12,0,0,$miesiac,1,$rok,-1);
     
     
    $pierwszy = date("D",$znacznik);
     
     
    if ($pierwszy=="Mon") $pierwszy=1;
    if ($pierwszy=="Tue") $pierwszy=2;
    if ($pierwszy=="Wed") $pierwszy=3;
    if ($pierwszy=="Thu") $pierwszy=4;
    if ($pierwszy=="Fri") $pierwszy=5;
    if ($pierwszy=="Sat") $pierwszy=6;
    if ($pierwszy=="Sun") $pierwszy=7;
    //echo $pierwszy;
    $dzien=1;
    if($miesiac<10){$miesiac="0".$miesiac;}
    echo "<div style=\"float:left;\">"; 
    echo "<TABLE cellspacing=3 cellpadding=5>
    <TR><TD id=naga><a href=  \"javascript:page('Kalendarz/calendar.php?miesiac=".($miesiac-1)."&rok=".$rok."','main3');\"><b><FONT color=#000000>&lt;&lt;&lt;</font></b></a></TD><TD colspan=5 ><center><b>".$miesiac."/".$rok."</b></center></TD>
    <TD id=naga><a href=  \"javascript:page('Kalendarz/calendar.php?miesiac=".($miesiac+1)."&rok=".$rok."','main3');\"><b><FONT color=#000000>&gt;&gt;&gt;</font></b></a></TD></TR>";
    echo "<TR><TD width=45px  style=\"border-bottom:solid 1px;\"><center><b>Pn</b></center></TD>
			  <TD width=45px  style=\"border-bottom:solid 1px;\"><center><b>Wt</b></center></TD>
			  <TD width=45px  style=\"border-bottom:solid 1px;\"><center><b>Śr</b></center></TD>
			  <TD width=45px  style=\"border-bottom:solid 1px;\"><center><b>Czw</b></center></TD>
			  <TD width=45px  style=\"border-bottom:solid 1px;\"><center><b>Pt</b></center></TD>
			  <TD width=45px  style=\"border-bottom:solid 1px;\"><center><FONT color=\"blue\"><b>Sb</b></FONT></center></TD>
			  <TD width=45px  style=\"border-bottom:solid 1px;\"><center><FONT color=\"blue\"><b>Nd</b></font></center></TD></center></TR>";
     
	$zapytanie2 = mysql_query("Select ID from RCP_Rozliczenie where UserID =(Select `id` from `authority`.users where login = '".$uzytkownik."') and Rok=".$rok." and Miesiac=".$miesiac.";");
    $rezult2 = mysql_fetch_array($zapytanie2);
    $raport = $rezult2['ID']; 
    for ($i=1; $i <= ($liczbadni + $pierwszy - 1); $i++ ){
     
     
    if ($i<$pierwszy) echo "<TD width=45px> </TD>";
    if ($i>=$pierwszy ) {
    foreach($wydarzenia as $dniowka){
    $datejszyn=explode(':',$dniowka);
    $datka=explode('-',$datejszyn['0']);
    if($datka['1']==$miesiac && $datka['0']==$rok){
    $zaliczoneAll+=$datejszyn['1'];
    $niezaliczoneAll+=$datejszyn['2'];
    }
    
    }
    if ($dzien==$dziennum &&$miesiac==$dzisiaj['mon']){
    if($dzien<10){$dzien="0".$dzien;}
    

    
    
    foreach($wydarzenia as $dniowka){
    $datejszyn=explode(':',$dniowka);
    if(trim($datejszyn['0'])==$rok."-".$miesiac."-".$dzien){
    $zaliczone=$datejszyn['1'];
    //$zaliczoneAll +=$zaliczone;
    $zaliczone=trim($zaliczone)."/";
    $niezaliczone=$datejszyn['2'];
    //$niezaliczoneAll +=$niezaliczone;
    $niezaliczone=trim($niezaliczone);}
    }
  
    
    echo "<TD bgcolor=\"beige\" width=45px id=naga><center><FONT color=#000000 size=3><b>$dzien</b></font><br> <B><FONT COLOR=#2c9f32 size=4>$zaliczone</font></b>  <FONT COLOR=#FF0000 size=1>$niezaliczone</font></center></TD>"; $dzien++;
    $zaliczone="";
    $niezaliczone="";
    }
    else
    {
    if($dzien<10){$dzien="0".$dzien;}
     foreach($wydarzenia as $dniowka){
    $datejszyn=explode(':',$dniowka);
    if(trim($datejszyn['0'])==$rok."-".$miesiac."-".$dzien){
    $zaliczone=$datejszyn['1'];
    //$zaliczoneAll +=$zaliczone;
    $zaliczone=trim($zaliczone)."/";
    $niezaliczone=$datejszyn['2'];
    //$niezaliczoneAll +=$niezaliczone;
    $niezaliczone=trim($niezaliczone);}
    }
    echo "<TD width=45px id=naga><center> <B><FONT color=#000000 size=2>$dzien</font><br> <B><FONT COLOR=#2c9f32 size=4>$zaliczone</font></b>  <FONT COLOR=#FF0000 size=1>$niezaliczone</font></center></TD>"; 
    $dzien++;
    $zaliczone="";
    $niezaliczone="";
    $a=$zaliczoneAll;
    $b=$niezaliczoneAll;
        $zaliczoneAll=0;
    $niezaliczoneAll=0;     

   }
    
    }
   if ( ($i%7) == "0") echo "</TR><tr>";
    }
      echo "</tr></table>";
 
     //}
echo "</div>";
  
?>
    
    
</div>
<div style="float:right; text-align:left;"><h3><b>Raport szczegółowy</b></h3>
<a href ="Kalendarz/download.php?rap=<?php echo $raport;?>"><img src ="pobierz.png" width="40px" align="middle" style="padding:5px;">Pobierz </a><br><br>
<a href ="Kalendarz/download2.php?rap=<?php echo $raport;?>" target="_blank"><img src ="otworz.png" width="40px" align="middle" style="padding:5px;">Otwórz</a><br>
</div>   
<div id="godzinki" style="float:left;clear:both; border:none; width:400px; text-align:center;">
<br>
<?php
echo "Zaliczone godziny: ".$a."<br>";
echo "Niezaliczone godziny:".$b."<br>";

require 'DB.php';
$queryPubli = mysql_query("Select * from RCP_Rozliczenie where ID=".$raport);
$publikacja = mysql_fetch_array($queryPubli);
echo "<font size=2>Ilość pobrań: ".$publikacja['Pobrania']."</font>";
echo "<br><font size=1>Opublikowano dnia: ".$publikacja['DataPublikacji']."</font><br>";
$a=0;
$b=0;
?>
</div>
    
