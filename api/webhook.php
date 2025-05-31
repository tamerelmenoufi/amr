<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/amr/lib/includes.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST))
    $json = file_get_contents('php://input');
    $_POST = json_decode($json, true);

    if($_POST){
        $query = "INSERT INTO logs_wapp set dados = '{$json}'";
        mysqli_query($con, $query);

        file_put_contents('wh.txt', print_r($_POST, true)."\n\n\n".$json);
    }
?>
