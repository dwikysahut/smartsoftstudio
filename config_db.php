<?php
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "store_db");
define("DB_HOST", "localhost");
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if(mysqli_connect_error()){
    echo "Koneksi database gagal".mysqli_connect_error();
   }
?>