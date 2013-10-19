<?php
if(isset($_SESSION['username'])){
require 'DB.php';
$wlasciciel='';
if (isset($_GET['u'])) {
	$wlasciciel=$_GET['u'];
}else {
	$wlasciciel=$_SESSION['username'];
}

$idDziennik = mysql_query("Select ID from eDziennik where Pesel =".$wlasciciel.";");
$id = mysql_fetch_array($idDziennik);
$wynik = mysql_query("select * from eDziennik where ID=" . $id['ID']);

//Pobieranie danych uzytkownika z bazy i tymczasowy zapis plikow na serwrze jako pdf

$wiersz = mysql_fetch_array($wynik);
if ($wynik) {
$fname="tmp/oceny/".$wiersz['Pesel'].".pdf";
$fhandle = fopen($fname,'w');
$plik = $wiersz['Oceny_I'];
fwrite($fhandle,$plik);
fclose($fhandle);
$fname3="tmp/oceny2/".$wiersz['Pesel'].".pdf";
$fhandle3 = fopen($fname3,'w');
$plik3 = $wiersz['Oceny_II'];
fwrite($fhandle3,$plik3);
fclose($fhandle3);
$fname2="tmp/frekwencja/".$wiersz['Pesel'].".pdf";
$fhandle2 = fopen($fname2,'w');
$plik2 = $wiersz['Obecnosci'];
fwrite($fhandle2,$plik2);
fclose($fhandle2);

    
}
$oceny = "tmp/oceny/".$_SESSION['username'].".pdf";
$oceny2 = "tmp/oceny2/".$_SESSION['username'].".pdf";
$frekwencja = "tmp/frekwencja/".$_SESSION['username'].".pdf";
unlink($oceny);
unlink($oceny2);
unlink($frekwencja); 

?>
<style type="text/css">
    #main { padding:0; }
   
</style>
<div  style="text-align:center; margin: 0 auto; width:100%;" id="wrap" align="center">

	<div style="clear: none; width: 210px; float: left; padding-top:40px; padding-left:250px;">
		<a href="javascript:page('show.php?what=freq&u=<?php echo $wlasciciel; ?>','main');">
		<img src="images/frekwencja.png" style="width:200px; height:200px;"><br>
		<h2>Frekwencja</h2>
		</a>
	</div>
	<div style="clear: none; width: 210px; float: left; padding-top:40px;">
	<a href="javascript:page('show.php?what=note&u=<?php echo $wlasciciel; ?>','main');">
		<img src="images/oceny.png" style="width:200px; height:200px;"><br>
		<h2>Oceny</h2>
		</a>
	</div>

</div>
<?php
}else{
header("Location:index.php");
}
?>