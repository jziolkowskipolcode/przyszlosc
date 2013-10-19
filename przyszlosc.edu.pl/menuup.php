<style type="text/css">

    .containerx {
        background: url('style/tlo.png') top repeat;
        border:1px solid #fff;
        -moz-border-radius: 8px;
        border-radius:8px 8px 8px 8px;
        -webkit-border-radius: 8px;
        behavior: url(../style/border-radius.htc);
        padding-bottom: 2px;
        width: 100%;
        margin: 0 0;
        margin-bottom: 1px;
        min-height: 37px;
        position: relative;
    }


    ul.topnav {

        height: 20px;
        list-style: none;
        padding: 0;
        margin: 0;
        float: left;
        /*        width: 100%;*/

        font-size: 1.2em;
        /*        background: url(topnav_bg.gif) repeat-x;*/
    }
    ul.topnav li {
        text-shadow: #000 1px -1px;
        float: left;
        margin: 0;
        margin-left: 20px;
        padding: 0 15px 0 0;
        position: relative; /*--Declare X and Y axis base--*/
    }
    ul.topnav li a{
        padding: 10px 5px;
        color: #fff;
        display: block;
        text-decoration: none;
        border: none;
        float: left;
    }
    ul.topnav li a:hover{
        color:white;
    }
    ul.topnav li span { /*--Drop down trigger styles--*/
        width: 17px;
        height: 35px;
        float: left;
        background: url(subnav_btn.gif) no-repeat center top;
    }
    ul.topnav li span.subhover {background-position: center bottom; cursor: pointer;} /*--Hover effect for trigger--*/
    ul.topnav li ul.subnav {
        list-style: none;
        position: absolute; /*--Important - Keeps subnav from affecting main navigation flow--*/
        left: 0; top: 35px;
        background: #333;
        margin: 0; padding: 0;
        display: none;
        float: left;
        width: 325px;
        -moz-border-radius-bottomleft: 5px;
        -moz-border-radius-bottomright: 5px;
        -webkit-border-bottom-left-radius: 5px;
        -webkit-border-bottom-right-radius: 5px;
        border: 1px solid #111;
    }
    ul.topnav li ul.subnav li{
        margin: 0; padding: 0;
        border-top: 1px solid #252525; /*--Create bevel effect--*/
        border-bottom: 1px solid #444; /*--Create bevel effect--*/
        clear: both;
        width: 300px;
    }
    html ul.topnav li ul.subnav li a {
        float: left;
        width: 300px;
        color: white;
        background: #333 url(dropdown_linkbg.gif) no-repeat 10px center;
        padding-left: 20px;
    }
    html ul.topnav li ul.subnav li a:hover { /*--Hover effect for subnav links--*/
        background: #222 url(dropdown_linkbg.gif) no-repeat 10px center;
        width: 300px;
    }
    #header img {
        margin: 20px 0 10px;
    }
</style>
<!--[if IE]>
<style type="text/css">

    html ul.topnav li ul.subnav li a {
        float: left;
        width: 325px;
        color: white;
        background: #333 url(dropdown_linkbg.gif) no-repeat 10px center;
        padding-left: 20px;
    }
    html ul.topnav li ul.subnav li a:hover { /*--Hover effect for subnav links--*/
                                             background: #222 url(dropdown_linkbg.gif) no-repeat 10px center;
                                             width: 325px;
    }
</style>

<![endif]-->
<script type="text/javascript">
    $(document).ready(function(){

        $("ul.subnav").parent().append("<span></span>"); //Only shows drop down trigger when js is enabled - Adds empty span tag after ul.subnav

        $("ul.topnav li span").click(function() { //When trigger is clicked...

            //Following events are applied to the subnav itself (moving subnav up and down)
            $(this).parent().find("ul.subnav").slideDown('slow').show(); //Drop down the subnav on click

            $(this).parent().hover(function() {
            }, function(){
                $(this).parent().find("ul.subnav").slideUp('slow'); //When the mouse hovers out of the subnav, move it back up
            });

            //Following events are applied to the trigger (Hover events for the trigger)
        }).hover(function() {
            $(this).addClass("subhover"); //On hover over, add class "subhover"
        }, function(){	//On Hover Out
            $(this).removeClass("subhover"); //On hover out, remove class "subhover"
        });

    });
</script>

<!--                blok wyboru trybu nauczania-->
<div id="naglowek2">

    <p>System nauczania:
        <?php
        if (!isset($_GET['tryb'])) {
            $_GET['tryb'] = 1;
        }
        if (isset($_GET['tryb']) && checkSign2($_GET['tryb']) && is_numeric($_GET['tryb']) || !isset($_GET['tryb'])) {

            $query = "Select * from " . $db_name . ".tryb";
            $result = mysql_query($query);
            while ($tryb = mysql_fetch_array($result)) {
                $trybGet;
                if (isset($_GET['tryb'])) {

                    $trybGet = $_GET['tryb'];
                    $trybGet = mysql_real_escape_string($trybGet);
                }
                if (isset($trybGet) && strlen($trybGet) < 4 && checkSign($trybGet)) {

                    if ($trybGet == $tryb['ID']) {
                        echo "<a class = \"nag2akt\" href =index.php?tryb=" . $tryb['ID'] . ">" . $tryb['NAZWA'] . "</a>  ";
                    } else {
                        echo "<a href =" . $tryb['ID'] . ".html>" . $tryb['NAZWA'] . "</a>  ";
                    }
                }
            }
        }
        ?>
</div>
<!--menu rozwijane wyboru szkoly i miasta-->
<div class="containerx">



    <?php
    echo "<ul class=\"topnav\">";
    $query1 = "select * from " . $db_name . ".miasto  order by id";
    $rezultat1 = mysql_query($query1);
    while ($rekord1 = mysql_fetch_array($rezultat1)) {
        if (!isset($_GET['tryb'])) {
            $query2 = "select * from " . $db_name . ".szkola where miasto = " . $rekord1[0];
        } else {
            $query2 = "select * from " . $db_name . ".szkola where miasto = " . $rekord1[0] . " and tryb=" . $trybGet;
        }
        echo "<li><a>$rekord1[1]</a>";
        echo "<ul class=\"subnav\">";
        $rezultat2 = mysql_query($query2);
        if (mysql_num_rows($rezultat2) != 0) {
            while ($rekord2 = mysql_fetch_array($rezultat2)) {
                echo "<li><a href =index.php?miasto=" . $rekord1[0] . "&szkola=" . $rekord2[0] . "&tryb=$trybGet>" . $rekord2[1] . "</a></li>";
            }
        }
        echo "</ul>";
        echo "</li>";
        echo "</li>";
    }
    echo "</ul>";

    function checkSign($tekst) {
        if (preg_match('/[^A-Za-z0-9]/', $tekst)) {
            return 0;
        } else {
            return 1;
        }
    }
    ?>
</div>