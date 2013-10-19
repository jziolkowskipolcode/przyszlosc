
<?php
//ramka do adito (e-Dziennik)

if (isset($_REQUEST['username'])) {
    if (strlen($_REQUEST['username']) == '11' && is_numeric($_REQUEST['username'])) {
?>
        <head>
            <title>
        		Dziennik elektroniczny
            </title>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        </head>

<center><a href="../asLog/Instrukcja_Dziennik.pdf" style="text-decoration:underline dotted; color:#ff0000;" target="_blank"><h2 style="font-weight: normal;"><img src="images/help.png" align="middle" style="border:0; padding:5px; margin-left:-40px;"><b>Pomoc</b></a> &nbsp; <a href="../asLog/" style="text-decoration:none; color:#000000;"><img src="images/strzalka.png" align="middle" style="border:0; padding:5px; margin-left:40px;"><b>Powrót</b></a><br>
e-Dziennik wymaga do działania przeglądarki <strong><u>Internet Explorer</u></strong> w wersji 7.0 lub nowszej, albo <b><u>Mozilla Firefox</u></b>. <br>W pozostałych przeglądarkach e-Dziennik może działać <b><u>nieprawidłowo</u></b>!</h2><br>
</center>
        <frameset cols="*" rows="*">
            <iframe src="https://dzkrm11.przyszlosc.edu.pl/showLogon.do?username=<?php echo $_REQUEST['username'];?>" name="Okno" width="100%" height="100%" noresize scrolling="no">Twoja przeglądarka nie obsługuje ramek.</iframe>
        </frameset>
        <?php
    }
  } else {
    header("Location:zaloguj.php");
}
?>

