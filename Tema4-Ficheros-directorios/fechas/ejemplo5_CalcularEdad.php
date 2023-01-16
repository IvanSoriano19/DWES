<?php     
include ('bGeneral.php');
//La función cabecera es una función propia que introduce la cabecera html
cabecera($_SERVER['PHP_SELF']);
    $month = 28;
    $day = 8;
    $year = 1985;
    
    $creation_utime = mktime(0,0,0, $month, $day, $year);
    $now_utime = time();
    
    $age_utime = $now_utime - $creation_utime;
    $product_age = floor($age_utime / (365 * 24 * 60 * 60));
    
    echo 'El producto fue hecho hace '. $product_age .' año(s) atrás';
?>


