<?php

if ($_SERVER['SERVER_NAME'] == 'localhost') {
    $base_url = "http://localhost/wishlister/";
    $server = 'localhost';
    $user = 'root';
    $password = "";
    $database = 'wishlister';
} else {
    $base_url = "http://206.189.129.236/";
    $server = "localhost";
    $user = "root";
    $password = "wP59IT`I9N1F";
    $database = "wishlister";
}

$connect = mysqli_connect($server, $user, $password, $database);



if (!$connect) {
    echo "Could not connect" . mysqli_connect_error();
}

session_start();
// else {
//     echo "Successfully connected";
// }
