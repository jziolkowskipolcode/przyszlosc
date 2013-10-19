<div id="naglowek2">
    <!--[if IE]>
    <style>
#naglowek2 {
    background: none repeat scroll 0 0 #3335FF;
    border: medium none;
    color: #FFFFFF;
    display: inline-block;
    font-size: larger;
    height: auto;
    margin-bottom: 0;
    padding-bottom: 10px;
    padding-top: 10px;
    text-align: center;
    text-decoration: none;
    width: 100%;    
    }
    
    #naglowek2 form{
            
	display: inline;
        clear: none;
	height:25px;
    }
    #naglowek2 a{
	text-decoration:none;
	font-weight:bold;
        margin-bottom:0px;
        margin-top:0px;
        height: 45px;
	padding:10px;
	padding-top:5px;
	padding-bottom:5px;
        color:#fff;
    }
    
    
    #naglowek2 a:hover{
	text-decoration:none;
        color:#000;
        height:45px;
        background: #ffffff;
		padding:10px;
	padding-top:5px;
	padding-bottom:5px;
        
       
    }
    #naglowek2 a:active {
    color : #000;
    
    background : url("../images/signin-nav-bg-hover-ie2.png") repeat-x bottom;
    text-decoration:none;
    }
    
    </style>
    
    <![endif]-->
    <?php
//sprawdzenie czy typ loginu jak pesel
    if (isset($_SESSION['username']) && strlen($_SESSION['username']) == '11' && is_numeric($_SESSION['username'])) {
        $que = "Select * from authority.users where login = $_SESSION[username]";

        $duyt = mysql_query($que);
        $wiadomo = mysql_query("select * from WIADOMOSCI_POZ where ODBIORCA = $_SESSION[username] AND DATA_ODEBRANIA < 1 ");
        $wiadAll = mysql_query("select * from WIADOMOSCI_POZ where ODBIORCA = $_SESSION[username]");
        while ($wier = mysql_fetch_array($duyt)) {

            $szkola = $wier['SZKOLAID'];
            $miasto = $wier['MIASTOID'];
            $poziom = $wier['poziom'];
            $semestr = $wier['SemestrID'];
            $_SESSION['poziom'] = $poziom;
        }



        if ($poziom == '100') {


            $query1 = "select * from " . $db_name . ".zakladki where (szkola = 0 and miasto= " . $miasto . ") or (szkola = " . $szkola . " and miasto= " . $miasto . ") order by nazwa";
            $rezultat1 = mysql_query($query1);
            echo "<span class=\"hide\">|</span>";
            echo "<a href = http://przyszlosc.edu.pl><img src=\"home.png\" align=\"middle\" height=\"30px\" alt=\"Home\" style=\"margin-top:-10px;\"> Strona główna</a>";
            echo "<span class=\"hide\">|</span>";
            while ($rekord1 = mysql_fetch_array($rezultat1)) {

                echo "<span class=\"hide\">|</span>";
                echo "<a href = index2.php?art=$rekord1[ID]&user=$_SESSION[username]> $rekord1[4]</a>";
            }


            echo "<span class=\"hide\">|</span>";
            echo "<a href = index2.php?plan=1>Plan zajęć</a>";
            echo "<span class=\"hide\">|</span>";
            echo "<a href = index2.php?oceny=1>eDziennik</a>";
            echo "<span class=\"hide\">|</span>";
            echo "<a href = index2.php?pm=1>Wiadomości [" . mysql_num_rows($wiadomo) . "/" . mysql_num_rows($wiadAll) . "]</a>";
        }
        if ($poziom == '102') {
        
            ?>
            <form action="adito.php?username=<?php echo $_SESSION['username'];?>" method="POST" name="logonForm">
            <input type="hidden" value="<?php echo $_SESSION['username'];?>" name="username">

            </form>



        <?php
        echo "<span class=\"hide\">|</span>";
        echo "<a href = http://przyszlosc.edu.pl><img src=\"home.png\" align=\"middle\" height=\"30px\" alt=\"Home\" style=\"margin-top:-10px;\"> Strona główna</a>";
        echo "<span class=\"hide\">|</span>";
        echo "<a href = index2.php?plan=1>Plan zajęć</a>";
        echo "<span class=\"hide\">|</span>";
        echo "<a href=\"javascript:document.logonForm.submit();\">e-Dziennik</a>";
        echo "<span class=\"hide\">|</span>";
        echo "<a href = index2.php?pm=1>Wiadomości [" . mysql_num_rows($wiadomo) . "/" . mysql_num_rows($wiadAll) . "]</a>";
        echo "<span class=\"hide\">|</span>";
        echo "<a href = index2.php align=\"middle\" height=\"30px\" alt=\"RCP\" style=\"margin-top:-10px;\"> Rozliczenie RCP </a>";
        echo "<span class=\"hide\">|</span>";
    }
            if ($poziom == '128') {

        echo "<span class=\"hide\">|</span>";
        echo "<a href = http://przyszlosc.edu.pl><img src=\"home.png\" align=\"middle\" height=\"30px\" alt=\"Home\" style=\"margin-top:-10px;\"> Strona główna</a>";
        echo "<span class=\"hide\">|</span>";
        echo "<a href = index2.php?pm=1>Wiadomości [" . mysql_num_rows($wiadomo) . "/" . mysql_num_rows($wiadAll) . "]</a>";
        echo "<span class=\"hide\">|</span>";
    }
} else {
    echo "B��d!!";
}
?>

</div>