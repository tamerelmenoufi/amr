<?php
    //include("mohinc.php");
    //$con = AppConnect('amr');

    $con = mysqli_connect("yobom.com.br","root","SenhaDoBanco", "bk_manaus");
    mysqli_set_charset($con,'utf8');

    $md5 = md5(date("YmdHis").$_SERVER['PHP_SELF']);

