<?php
include "koneksi.php";
$kdpenyakit		=$_POST['kdpenyakit'];
$nama_penyakit	=$_POST['nama_penyakit'];
$definisi		=$_POST['definisi'];
$solusi			=$_POST['solusi'];
$sqlrs=mysqli_query($koneksi,"SELECT kdpenyakit FROM tb_penyakit WHERE kdpenyakit='$kdpenyakit'");
$rs=mysqli_num_rows($sqlrs);
if($rs==0){
	$perintah="INSERT INTO tb_penyakit(kdpenyakit,nama_penyakit,definisi,solusi)VALUES('$kdpenyakit','$nama_penyakit','$definisi','$solusi')";
	$berhasil=mysqli_query($koneksi,$perintah);
	if($berhasil){
		echo "<script>alert('Data berhasil disimpan!');window.location='penyakit.php'</script>";
		}else{
		echo "<script>alert('Data gagal disimpan!');window.location='penyakit.php'</script>";
		}	
	}else{
	echo "<script>alert('Data sudah ada!');window.location='penyakit.php'</script>";
	}
?>