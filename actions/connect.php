<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $db_name = "kayit_formu";

    $connect = mysqli_connect($host, $username, $password, $db_name);
    mysqli_set_charset($connect, "UTF8");
?>