<?php 
include '../controller/c_konsultasi.php';

$hapus = new Konsultasi;

$id_konsultasi = $_GET['id_konsultasi'];
if (!empty($id_konsultasi)) {
	$hapus->Hapus($id_konsultasi);
	header('location: ../dokter/konsultasi.php');
} else {
	header('location: ../dokter/konsultasi.php');
}
?>