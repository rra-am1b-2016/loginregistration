<?php
    $servername = "localhost";
    $username = "rra_am1b";
    $password = "geheim!";
    $dbname = "am1b_2016_loginregistration_v2";
    $conn = mysqli_connect($servername, $username, $password, $dbname) 
                or die("Connectie mislukt met databaseserver");
?>