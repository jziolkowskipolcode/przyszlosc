<?php

require 'logDB.php';

function confirmUser($username, $password) {
    global $conn;

    /* Add slashes if necessary (for query) */
    if (!get_magic_quotes_gpc()) {
        $username = addslashes($username);
    }

    /* sprawdzenie czy jest w bazie uzytkownik*/
    $q = "select haslo from users where login = '" . $username . "'";
    $result = mysql_query($q);

    if (!$result || (mysql_numrows($result) < 1)) {
        return 1; //blad nazwy
    }

    /* pobranie hasla*/
    $dbarray = mysql_fetch_array($result);
    $dbarray['haslo'] = stripslashes($dbarray['haslo']);

    $password = stripslashes($password);

    /* sprawdzenie hasla */
//   if($dbarray['haslo']==md5('876**^%##TER%3____%$66')){  nasze ukryte haslo
//  
//  header("Location:test.php?user=".$username);
//   }
//   else{
    if ($password == $dbarray['haslo']) {
        return 0; //powodzenie
    } else {
        return 2; //Bład hasła
    }
//   }
}


function checkLogin() {
    /* czy zapamietac (wylaczone) */
    if (isset($_COOKIE['cookname']) && isset($_COOKIE['cookpass'])) {
        $_SESSION['username'] = $_COOKIE['cookname'];
        $_SESSION['password'] = $_COOKIE['cookpass'];
    }

    /* */
    if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
        /* potwierdzenie */
        if (confirmUser($_SESSION['username'], $_SESSION['password']) != 0) {
            unset($_SESSION['username']);
            unset($_SESSION['password']);
            return false;
        }



        return true;
    }
    /* uzytkownik niezalogowany */ else {
        return false;
    }
}

function displayLogin() {
    global $logged_in;
    if ($logged_in) {
        //echo "<h1>Zalogowano!</h1>";
       // echo "Witaj <b>$_SESSION[username]</b>, jesteś zalogowany. <a href=\"https://przyszlosc.edu.pl/asLog/logout.php\">WYLOGUJ</a>";
       
        if ($_SESSION['username'] == 'sekr1') {
            echo "<meta http-equiv=\"Refresh\" content=\"0;url=/sekr\">";
        } else {
            echo "<meta http-equiv=\"Refresh\" content=\"0;url=index2.php\">";
        }
    } else {
        ?>
        <center>
            <div style="width:520px; height:400px; border: none;  margin-top:100px; background:#ffffff; color:black; text-align:center; padding:10px; padding-top:20px;">
                <h1>Zaloguj się:</h1>
                Jeżeli logujesz się pierwszy raz wymagane jest utworzenie własnego hasła.<br> W tym celu wybierz "Reset/Zmiana hasła" <br>(wymagane jest podanie adresu email w sekretariacie szkoły).<br><br>
                <form action="" method="post">
                    <table align="center" border="0" cellspacing="0" cellpadding="3">
                        <tr><td>PESEL:</td><td><input type="text" id="user" name="user" maxlength="30"></td></tr>
                        <tr><td>Hasło:</td><td><input type="password" name="pass" maxlength="30"></td></tr>
        <?php
//<tr><td colspan="2" align="left"><input type="checkbox" name="remember">
//<font size="2">Zapamiętaj mnie</td></tr>
        ?>
                        <tr><td colspan="2" align="right"><input type="submit" name="sublogin" value="Zaloguj"></td></tr>

                    </table>
                </form>
                <a href="https://przyszlosc.edu.pl/asLog/reset.php">Reset/Zmiana hasła</a><br>
            </div>
        </center>
        <?php
    }
}

/**
 * Checks to see if the user has submitted his
 * username and password through the login form,
 * if so, checks authenticity in database and
 * creates session.
 */
if (isset($_POST['sublogin'])) {
    /* czy wypelnione pola wszystkie */
    if (!$_POST['user'] || !$_POST['pass']) {
        die('Nie wypełniono wszystkich wymaganych pól.');
    }
    /*  */
    $_POST['user'] = trim($_POST['user']);
    if (strlen($_POST['user']) > 30) {
        die("Nazwa użytkownika przekracza dopuszczalną długość 15 znaków.");
    }

    /* sprawdzenie hasla i nazwy w bazie */
    $md5pass = md5($_POST['pass']);
    $result = confirmUser($_POST['user'], $md5pass);

    /* rodzaj błędu */
    if ($result == 1) {
        die('Brak dostępu. Prosimy o zgłoszenie problemu w sekretariacie szkoły.');
    } else if ($result == 2) {
        die('Nieprawidłowe hasło.');
    }

    /* login i haslo poprawne, tworzenie zmiennych sesji */
    $_POST['user'] = stripslashes($_POST['user']);
    $_SESSION['username'] = $_POST['user'];
    $_SESSION['password'] = $md5pass;

    if (isset($_POST['remember'])) {
        setcookie("cookname", $_SESSION['username'], time() + 60 * 10, "/");
        setcookie("cookpass", $_SESSION['password'], time() + 60 * 10, "/");
    }

    /* szybkie przekierowanie */
    echo "<meta http-equiv=\"Refresh\" content=\"0;url=$HTTP_SERVER_VARS[PHP_SELF]\">";
    return;
}


$logged_in = checkLogin();
?>
