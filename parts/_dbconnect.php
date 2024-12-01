<?php

$server = "localhost";
$host = "root";
$password = "";
$database = "wishlister";

$connect = mysqli_connect($server, $host, $password, $database);

if(!$connect) {
    echo "Could not connect".mysqli_connect_error();
}

session_start();
// else {
//     echo "Successfully connected";
// }
