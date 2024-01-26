<?php
include "koneksi.php";
$id = $_GET['id'];
if ($id!="") {
	$sql = "DELETE FROM tb_gejala WHERE id='$id'";
	$result=mysqli_query($koneksi,$sql)	or die ("SQL Error". mysqli_error($koneksi));
	if($result){
		echo "<script>alert('Data berhasil dihapus!');window.location='gejala.php'</script>";
		}else{
			echo"<script>alert('Data gagal dihapus!');window.location='gejala.php'</script>";
			}
}
?>