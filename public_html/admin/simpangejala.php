<?php
include "koneksi.php";
$kdgejala=$_POST['kdgejala'];
$gejala=$_POST['gejala'];
$sqlrs=mysqli_query($koneksi,"SELECT kdgejala FROM tb_gejala WHERE kdgejala='$kdgejala'");
$rs=mysqli_num_rows($sqlrs);
if($rs==0){
	// jika data nol maka simpan data
	$perintah="INSERT INTO tb_gejala (kdgejala,gejala) VALUES ('$kdgejala','$gejala')";
	$berhasil=mysqli_query($koneksi,$perintah) or die (mysqli_error($koneksi));
	if ($berhasil){
		echo "<script>alert('Data berhasil disimpan!');window.location='gejala.php'</script>";
		}else{
		echo "<script>alert('Data gagal disimpan!');window.location='gejala.php'</script>";
		}
	}else{
	// cek jika data sudah ada
	echo"<script>alert('Data sudah ada!');window.location='gejala.php'</script>";
	}
?>
	  
