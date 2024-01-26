<?php
include "koneksi.php";
$id_problem = $_GET['kdpenyakit'];
if ($id_problem!="") {
	$sql = "DELETE FROM tb_rules WHERE id_problem='$id_problem'";
	$result=mysqli_query($koneksi,$sql)	or die ("SQL Error". mysqli_error($koneksi));
	if($result){
		echo "<script>alert('Data berhasil dihapus!');window.location='basisp.php'</script>";
		}else{
			echo"<script>alert('Data gagal dihapus!');window.location='basisp.php'</script>";
			}
}
?>