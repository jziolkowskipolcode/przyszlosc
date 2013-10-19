<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" ></head>
<?php
if(isset($_COOKIE['username'])){
require 'admDB.php';
require 'salt.php';
require 'expires.php';
$idDziennik = mysql_query("Select ID from eDziennik where Pesel =".$_GET['u'].";");
$id = mysql_fetch_array($idDziennik);
$wynik = mysql_query("select * from eDziennik where ID=" . $id['ID']);

//Pobieranie danych uzytkownika z bazy i tymczasowy zapis plikow na serwrze jako pdf

$wiersz = mysql_fetch_array($wynik);
if ($wynik) {
	$fname="tmp/oceny/".md5($salt.$wiersz['Pesel']).".pdf";
	$fhandle = fopen($fname,'w');
	$plik = $wiersz['Oceny_I'];
	fwrite($fhandle,$plik);
	fclose($fhandle);
	$fname3="tmp/oceny2/".md5($salt.$wiersz['Pesel']).".pdf";
	$fhandle3 = fopen($fname3,'w');
	$plik3 = $wiersz['Oceny_II'];
	fwrite($fhandle3,$plik3);
	fclose($fhandle3);
	$fname2="tmp/frekwencja/".md5($salt.$wiersz['Pesel']).".pdf";
	$fhandle2 = fopen($fname2,'w');
	$plik2 = $wiersz['Obecnosci'];
	fwrite($fhandle2,$plik2);
	fclose($fhandle2);


}



$wynik = mysql_query("select * from eDziennik where Pesel=" . $_GET['u']);
$wiersz = mysql_fetch_array($wynik);
echo "<br><br><br>";
//jezeli wybrane oceny
if(isset($_REQUEST['what']) && $_REQUEST['what']=='note'){
//jezeli dwa semestry sa w bazie
if(file_exists("tmp/oceny/".md5($salt.$_REQUEST['u']).".pdf") && file_exists("tmp/oceny2/".md5($salt.$_REQUEST['u']).".pdf") && filesize("tmp/oceny2/".md5($salt.$_REQUEST['u']).".pdf")>0){?>

<?php
?><a onclick="CngClass(this);" href="javascript:page('show2.php?sem=1&u=<?php echo md5($salt.$_REQUEST['u']);?>','oceny');" > Semestr I </a><a href="saveAs.php?file=<?php echo md5($salt.$_REQUEST['u']);?>&dir=1"><img src="pobierz.png" width="20px" align="top"></a> &nbsp; 
<a onclick="CngClass(this);" href="javascript:page('show2.php?sem=2&u=<?php echo md5($salt.$_REQUEST['u']);?>','oceny');" >
Semestr II </a><a href="saveAs.php?file=<?php echo md5($salt.$_REQUEST['u']);?>&dir=2"><img src="pobierz.png" width="20px" align="top"></a>

<div id="oceny">


<object data="tmp/oceny2/<?php echo md5($salt.$_REQUEST['u']);?>.pdf" type="application/pdf" width="945" height="780"><a href="
tmp/oceny2/<?php echo md5($salt.$_REQUEST['u']);?>.pdf">Pobierz</a> </object>
</div>
<?php
}
//jeżeli jeden semestr
else{if(file_exists("tmp/oceny/".md5($salt.$_REQUEST['u']).".pdf") && filesize("tmp/oceny/".md5($salt.$_REQUEST['u']).".pdf")>0){
?>
<a href="saveAs.php?file=<?php echo md5($salt.$_REQUEST['u']);?>&dir=1"><img src="pobierz.png" width="20px" align="top">Pobierz</a>



<object data="tmp/oceny/<?php echo md5($salt.$_REQUEST['u']);?>.pdf" type="application/pdf" width="945" height="780"><a href="
tmp/oceny/<?php echo md5($salt.$_REQUEST['u']);?>.pdf">Pobierz</a> </object>

<?php
}else echo "Dane nie zostały zaktualizowane. Sprawdź później.";
}
}
//jezeli wybrana frekwencja
if(isset($_REQUEST['what']) && $_REQUEST['what']=='freq'){
if(file_exists("tmp/frekwencja/".md5($salt.$_REQUEST['u']).".pdf") && filesize("tmp/frekwencja/".md5($salt.$_REQUEST['u']).".pdf")>0){
?>
<a href="saveAs.php?file=<?php echo md5($salt.$_REQUEST['u']);?>&dir=3"><img src="pobierz.png" width="20px" align="top">Pobierz</a><br>



<object data="tmp/frekwencja/<?php echo md5($salt.$_REQUEST['u']);?>.pdf" type="application/pdf" width="945" height="780"> <a href="
tmp/frekwencja/<?php echo md5($salt.$_REQUEST['u']);?>.pdf">Pobierz</a> </object>


<?php

}else echo "Dane nie zostały zaktualizowane. Sprawdź później.";
}

}else{
header('Location:index.php');
}

?>