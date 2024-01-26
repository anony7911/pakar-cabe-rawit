<?php
include "koneksi.php";
	$kdgejala = $_REQUEST['kdgejala2'];
	$gejala = $_REQUEST['gejala'];
	$sql = "UPDATE tb_gejala SET gejala='$gejala' WHERE kdgejala='$kdgejala'";
	$result=mysqli_query($koneksi,$sql)	or die ("SQL Error".mysqli_error($koneksi));
	if($result){
		echo "<script>alert('Data berhasil diubah!');window.location='gejala.php'</script>";
		}else{
		echo"<script>alert('Data gagal diubah!');window.location='gejala.php'</script>";
		}
?>