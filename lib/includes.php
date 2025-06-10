<?php
    include("/appinc/connect.php");
    $con = AppConnect('bk_manaus');

    $md5 = md5(date("YmdHis").$_SERVER['PHP_SELF']);

