<?php
$captchaFolder  = 'tmp/frekwencja/';
$fileTypes      = '*.pdf';
$expire_time    = 2;    //czas wa¿noœci w minutach
foreach (glob($captchaFolder . $fileTypes) as $Filename) {
    $FileCreationTime = filectime($Filename);
    $FileAge = time() - $FileCreationTime; 
    if ($FileAge > ($expire_time * 60)){
        unlink($Filename);
    }
 }
$captchaFolder  = 'tmp/oceny/';
$fileTypes      = '*.pdf';
$expire_time    = 2;    //czas wa¿noœci w minutach
foreach (glob($captchaFolder . $fileTypes) as $Filename) {
    $FileCreationTime = filectime($Filename);
    $FileAge = time() - $FileCreationTime; 
    if ($FileAge > ($expire_time * 60)){
        unlink($Filename);
    }
 }
$captchaFolder  = 'tmp/oceny2/';
$fileTypes      = '*.pdf';
$expire_time    = 2;    //czas wa¿noœci w minutach
foreach (glob($captchaFolder . $fileTypes) as $Filename) {
    $FileCreationTime = filectime($Filename);
    $FileAge = time() - $FileCreationTime; 
    if ($FileAge > ($expire_time * 60)){
        unlink($Filename);
    }
 }
 
 ?>