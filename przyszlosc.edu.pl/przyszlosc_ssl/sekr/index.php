<?php
session_start();
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="robots" content="nofollow" \>
              <link rel="stylesheet" type="text/css" href="admin.css" media="screen,projection" />
        <title>Panel administracji</title>

    </head>
    <style type="text/css">
        IMG a {
            text-decoration: none; color:#000; border:none;
        }
        A:link {text-decoration: none; color:#000;}
        A:visited {text-decoration: none; color:#000;}
        A:active {text-decoration: none}
        A:hover {text-decoration: underline; color: red;}
    </style>
    <body>
        <?php
        if ($_SESSION['username'] == 'sekr1') {
            $nazwa = $_SESSION['username'];
            ?>
            <div id="pojemnik">
                <?php
                include 'admDB.php';
                if (isset($_REQUEST['delmiast']) && isset($_REQUEST['miasto'])) {
                    $miast = $_REQUEST['miasto'];
                    $query = "DELETE FROM " . $db_name . ".`miasto` where id = " . $miast;
                    mysql_query($query);
                    include 'miasta.php';
                }
                if (isset($_REQUEST['delszk']) && isset($_REQUEST['szkola'])) {
                    $szkola = $_REQUEST['szkola'];
                    $zapytanie = "delete from " . $db_name . ".szkola where id = $szkola";
                    mysql_query($zapytanie);
                    include 'szkoly.php';
                }
                if (isset($_REQUEST['deltryb'])) {
                    $zapytanie = "delete from " . $db_name . ".tryb where id =" . $_REQUEST['trybAdd'];
                    mysql_query($zapytanie);
                }
                $tryb = 0;
                if (isset($_REQUEST['miasto'])) {
                    $tryb = 1;
                }
                if (isset($_REQUEST['szkola']) && isset($_REQUEST['miasto'])) {
                    $tryb = 2;
                }
                if (isset($_REQUEST['system']) && isset($_REQUEST['szkola']) && isset($_REQUEST['miasto'])) {
                    $tryb = 3;
                }

                switch ($tryb) {
                    case 1:
                        include "szkoly.php";
                        break;
                    case 2:
                        include "syst.php";
                        break;
                    default:
                        include "miasta.php";
                        break;
                }
                ?>
            </div>
            <?php
        } else {
            header("Location:../asLog/logout.php");
        }
        ?>
    </body>
</html>
