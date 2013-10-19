<?php
session_start();
require("DB.php");
require("salt.php");
//include("login.php");

/**
 * Delete cookies - the time must be in the past,
 * so just negate what you added when creating the
 * cookie.
 */
if (isset($_COOKIE['cookname']) && isset($_COOKIE['cookpass'])) {
    setcookie("cookname", "", time() - 60 * 60 * 24 * 100, "/");
    setcookie("cookpass", "", time() - 60 * 60 * 24 * 100, "/");
    setcookie("username", "", time() - 60 * 60 * 24 * 100, "/asLog/");
    unset($_COOKIE['username']); 
}
?>

<?php



$queryDzieci = "Select * from Rodzice where RodzicPesel=".$_SESSION['username'];
$wynikDzieci = mysql_query($queryDzieci);
while($row = mysql_fetch_array($wynikDzieci)){
$oceny = "tmp/oceny/".md5($salt.$row['UczenPesel']).".pdf";
$oceny2 = "tmp/oceny2/".md5($salt.$row['UczenPesel']).".pdf";
$frekwencja = "tmp/frekwencja/".md5($salt.$row['UczenPesel']).".pdf";
unlink($oceny);
unlink($oceny2);
unlink($frekwencja);

}

/* Kill session variables */
//usuwanie z serwera tymczasowych plikow frekwencji i ocen
$oceny = "tmp/oceny/".md5($salt.$_SESSION['username']).".pdf";
$oceny2 = "tmp/oceny2/".md5($salt.$_SESSION['username']).".pdf";
$frekwencja = "tmp/frekwencja/".md5($salt.$_SESSION['username']).".pdf";
unlink($oceny);
unlink($oceny2);
unlink($frekwencja);
unset($_SESSION['username']);
unset($_SESSION['password']);
setcookie("username", "", time() - 60 * 60 * 24 * 100, "/asLog/");
    unset($_COOKIE['username']); 
$_SESSION = array(); // reset session array
session_destroy();   // destroy session.
?>
<meta http-equiv="Refresh" content="0; URL=http://przyszlosc.edu.pl">
