<?php  
include "../controller/c_Rekam.php";
$id_konsultasi = $_GET['id_konsultasi'];
$hapus = new Rekam;

$id_riwayat = $_GET['id_riwayat'];
if (!empty($id_riwayat)) {
	$hapus->Hapus($id_riwayat);
	header('location: ../dokter/riwayatrm.php?id_konsultasi='.$id_konsultasi);
} else {
	header('location: ../dokter/riwayatrm.php');
}
?>