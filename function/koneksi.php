<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "techxpo";

$koneksi = mysqli_connect($server, $username, $password, $dbname) or die("Koneksi Database gagal");