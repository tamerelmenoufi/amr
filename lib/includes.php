<?php
    include("mohinc.php");
    $con = AppConnect('amr');

    echo $md5 = md5(date("YmdHis").$_SERVER['PHP_SELF']);

