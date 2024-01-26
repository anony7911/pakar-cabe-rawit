<?php
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM tb_penyakit WHERE id='$id'");
echo "<script>alert('Data berhasil dihapus!');window.location='penyakit.php'</script>";
?>