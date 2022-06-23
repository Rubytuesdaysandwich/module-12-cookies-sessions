
<?php
$expires_time = time()+60*60*24*2;//* note to self number of seconds since 1970
    setcookie($investment,'investment',$expires_time,"../public/index.php",null,1,1,);
    setcookie($interest_rate,'interest_rate',$expires_time,"../public/index.php",null,1,1,);
    setcookie($years,'years',$expires_time,"../public/index.php",null,1,1,);
    ?>
    <?Php
    
   $investment = isset($_COOKIE['investment']) ? $_COOKIE['investment']:'';
   $interest_rate = isset($_COOKIE['interest_rate']) ? $_COOKIE['interest_rate']:'';
   $years = isset($_COOKIE['years']) ? $_COOKIE['years']:'';
    
    ?>