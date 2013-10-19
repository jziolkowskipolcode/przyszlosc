
<div id="main">

<?php
if (isset($_GET['aktualnosci'])) {
    include 'aktual.php';
} 


else {
    require 'DB.php';
 
 if (isset($_GET['miasto']) ) {
        ?>
        <div id="stronalewa">
        <div id="sidebar" >
            <!--                        ukrycie rozwinietego menu po kliknieciu na pole paska bocznego-->

        <?php
        echo " <br>";
        include 'szkolyMiasto.php';
        ?>

        </div>
         <div id="stopasidebar">
   
        </div>
        </div>
            <?php
        } else if (isset($_GET['dzienne']) || isset($_GET['zaoczne']) ) {
        ?>
        <div  id="stronalewa">
        <div id="sidebar" >
            <!--                        ukrycie rozwinietego menu po kliknieciu na pole paska bocznego-->

        <?php
        echo " <br>";
        include 'szkolyAll.php';
        ?>

        </div>
          <div id="stopasidebar">
        
        </div>
        </div>
            <?php
        }
        
        
        else if (isset($_GET['kontakt'])) {
            ?>
            <div id="stronalewa">
        <div id="sidebar" >
            <!--                        ukrycie rozwinietego menu po kliknieciu na pole paska bocznego-->

        <?php
        echo " <br>";
        include 'sekretariaty.php';
        ?>


        </div>
             <div id="stopasidebar">
          
        </div>
        </div>
            <?php
        }
        ?>

    <?php
     if(isset($_GET['zajeciait'])){
            include 'zajeciait.php';
        }
    if (!isset($_GET['miasto']) && !isset($_GET['kontakt']) && !isset($_GET['oferta']) && !isset($_GET['dzienne'])&& !isset($_GET['zaoczne'])&&!isset($_GET['zajeciait'])) {
        include 'glowna.php';
    } else if (isset($_GET['kontakt'])) {
        include 'daneKontaktowe.php';
    } 
    else if (isset($_GET['dzienne'])){
		include 'dzienne.php';
    }
        else if (isset($_GET['zaoczne'])){
		include 'zaoczne.php';
    }
    
    else if (isset($_GET['oferta'])) {
        include 'ofertaMain.php';
    } else if (isset($_GET['miasto']) && !isset($_GET['kontakt']) && !isset($_GET['oferta']) && !isset($_GET['aktualnosci'])) {
        if ($_GET['miasto'] == 0) {
            include 'ofertaMain.php';
        } 
        
    else {
            include 'miasto.php';
        }
    }
    
    

    echo "</div>";
}
?>
                
