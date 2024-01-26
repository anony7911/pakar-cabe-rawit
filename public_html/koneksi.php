<?php
$host="localhost";
$user="u939198444_ernia";
$pass="Kolaka123";
$dbName="u939198444_ernia";
$koneksi=mysqli_connect($host,$user,$pass);
$db=mysqli_select_db($koneksi,$dbName)or die(mysqli_error($koneksi));
?>