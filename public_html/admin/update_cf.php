<?php
include "koneksi.php";
$kd_gejala=$_GET['id_evidence'];
$kd_penyakit=$_GET['id_problem'];
$cf=$_POST['txtCF'];
	$perintah="UPDATE tb_rules SET cf='$cf' WHERE id_evidence='$kd_gejala' AND id_problem='$kd_penyakit' ";
	$berhasil=mysqli_query($koneksi,$perintah) or die (" Data tidak masuk database / data telah ada ".mysqli_error($koneksi));
	if ($berhasil){
		echo "<script>alert('Data berhasil disimpan!');window.location='basisp.php'</script>";
		}else{
		echo "<script>alert('Data gagal disimpan!');window.location='basisp.php'</script>";
		}

?>