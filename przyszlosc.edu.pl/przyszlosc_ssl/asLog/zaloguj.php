<!DOCTYPE html><html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <script type="text/javascript" src="https://przyszlosc.edu.pl/javascripts/jquery-latest.js"></script>
 <script type="text/javascript">
$(document).ready(function(){
  $("#user").focus();
});
</script>
    <meta name="robots" content="nofollow" \>
        <title>Logowanie</title>
</head>

<?php
/* Include Files ******************** */
session_start();
require("logDB.php");
include("login.php");
/* * ********************************** */
?>


    <body style="background:#00aeff;" >

        <?php
        if (isset($_REQUEST['check'])) {

            echo "<h1>Has³o zosta³o zmienione!</h1>";
        }

        displayLogin();
        ?>

    </body>
</html>