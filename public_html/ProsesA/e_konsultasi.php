<?php 
include '../controller/c_konsultasi.php';

$id_konsultasi = $_POST['id_konsultasi'];
$nama = $_POST['nama'];
$tgl_lahir = $_POST['tgl_lahir'];

$update = new Konsultasi;
$update->Edit($id_konsultasi, $nama,$tgl_lahir);

header('location: ../dokter/konsultasi.php');
?>