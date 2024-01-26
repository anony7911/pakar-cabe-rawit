<?php
include "koneksi.php" ;
$kdpenyakit=$_POST['kdpenyakit'];
$penyakit=$_POST['in_penyakit'];
$definisi=$_POST['in_definisi'];
$solusi =$_POST['in_solusi'];
$sql = "UPDATE tb_penyakit SET nama_penyakit='$penyakit',definisi='$definisi', solusi='$solusi' WHERE id='$kdpenyakit'";
$result=mysqli_query($koneksi,$sql)or die ("SQL Error".mysqli_error($koneksi));
if($result){
		echo "<script>alert('Data berhasil diubah!');window.location='penyakit.php'</script>";
	}else{
		echo "<script>alert('Data gagal dihapus!');window.location='penyakit.php'</script>";
		}
?>