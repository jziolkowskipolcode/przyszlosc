<style type="text/css">
td:hover{
background:#d9fdff;
}
</style>




   <div style="float:left;clear:both; border:solid 1px; width:400px; text-align:center; background:#ffffff;">
    <?php
    require 'DB.php';
    $dniowka;
    $raport;
    $zapytanie = mysql_query("Select * from RCP_Rozliczenie where UserID =12;");
    while($rezult = mysql_fetch_array($zapytanie)){
    $wydarzenia1 = explode(';',$rezult['Rozliczenie']);
    $wydarzenia=array_merge((array)$wydarzenia, (array)$wydarzenia1);
    }

    $zaliczone=0;
    $niezaliczone=0;
    
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
     
    echo "<TABLE border=0 cellspacing=3 cellpadding=5><thead border=1><TR border=1><TD width=45px><center><b>Pn</b></center></TD><TD width=45px><center><b>Wt</b></center></TD><TD width=45px><center><b>Śr</b></center></TD><TD width=45px><center><b>Czw</b></center></TD><TD width=45px><center><b>Pt</b></center></TD><TD width=45px><center><b>Sb</b></center></TD><TD width=45px><center><b>Nd</b></center></TD></center></TR></thead><tbody>
    <TR><TD><a href=  \"javascript:page('calendar.php?miesiac=".($miesiac-1)."&rok=".$rok."','main');\"><b><FONT color=#000000>&lt;&lt;&lt;</font></b></a></TD><TD colspan=5><center><b>".$miesiac."/".$rok."</b></center></TD><TD><a href=  \"javascript:page('calendar.php?miesiac=".($miesiac+1)."&rok=".$rok."','main');\"><b><FONT color=#000000>&gt;&gt;&gt;</font></b></a></TD></TR>";
     
	$zapytanie2 = mysql_query("Select ID from RCP_Rozliczenie where UserID =12 and Rok=".$rok." and Miesiac=".$miesiac.";");
    $rezult2 = mysql_fetch_array($zapytanie2);
    $raport = $rezult2['ID']; 
    for ($i=1; $i <= ($liczbadni + $pierwszy - 1); $i++ ){
     
     
    if ($i<$pierwszy) echo "<TD> </TD>";
    if ($i>=$pierwszy ) {
    if ($dzien==$dziennum &&$miesiac==$dzisiaj['mon']){
    if($dzien<10){$dzien="0".$dzien;}
    foreach($wydarzenia as $dniowka){
    $datejszyn=explode(':',$dniowka);
    if(trim($datejszyn['0'])==$rok."-".$miesiac."-".$dzien){
    $zaliczone=$datejszyn['1'];
    $zaliczone=trim($zaliczone);
    $niezaliczone=$datejszyn['2'];
    $niezaliczone=trim($niezaliczone);}
    }
    echo "<TD bgcolor=\"beige\"><center><a href=\"javascript:page('godziny.php?day=".$rok."-".$miesiac."-".$dzien."&zal=".$zaliczone."&nzal=".$niezaliczone."&rap=".$raport."','godzinki');\"><FONT color=#000000 size=3><b>$dzien</b></font><br> <B><FONT COLOR=#2c9f32 size=4>$zaliczone</font>/<FONT COLOR=#FF0000 size=4>$niezaliczone</font></B></a> </FONT></center></TD>"; $dzien++;
        $zaliczone=0;
    $niezaliczone=0;
    }
    else
    {
    if($dzien<10){$dzien="0".$dzien;}
     foreach($wydarzenia as $dniowka){
    $datejszyn=explode(':',$dniowka);
    if(trim($datejszyn['0'])==$rok."-".$miesiac."-".$dzien){
    $zaliczone=$datejszyn['1'];
    $zaliczone=trim($zaliczone);
    $niezaliczone=$datejszyn['2'];
    $niezaliczone=trim($niezaliczone);}
    }
    echo "<TD><center> <B><a href=\"javascript:page('godziny.php?day=".$rok."-".$miesiac."-".$dzien."&zal=".$zaliczone."&nzal=".$niezaliczone."&rap=".$raport."','godzinki');\"><FONT color=#000000 size=2>$dzien</font><br> <B><FONT COLOR=#2c9f32 size=4>$zaliczone</font>/<FONT COLOR=#FF0000 size=4>$niezaliczone</font></B></a> </center></TD>"; 
    $dzien++;
    $zaliczone=0;
    $niezaliczone=0;
   }
    
    }
   if ( ($i%7) == "0") echo "</TR><tr>";
    }
      echo "</tr></tbody></table>";
 
     //}
?>
    
    
</div>
<div id="godzinki" style="float:left;clear:both; border:none; width:400px; text-align:center;">

</div>
    
