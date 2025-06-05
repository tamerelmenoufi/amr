<?php
    //include("mohinc.php");
    //$con = AppConnect('amr');

    $con = mysqli_connect("yobom.com.br","root","SenhaDoBanco", "bk_manaus");

    $md5 = md5(date("YmdHis").$_SERVER['PHP_SELF']);

