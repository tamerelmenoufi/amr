<?php
    include("mohinc.php");
    AppConnect('amr');

    $md5 = md5(date("YmdHis").$_SERVER['PHP_SELF']);

