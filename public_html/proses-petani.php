<?php 
include "koneksi.php";
# Baca variabel Form (If Register Global ON)
$TxtNama 	= $_REQUEST['TxtNama'];
$RbKelamin 	= $_POST['cbojk'];
$TxtUmur	= $_REQUEST['TxtUmur'];
$TxtAlamat 	= $_REQUEST['TxtAlamat'];
$NOIP = $_SERVER['REMOTE_ADDR'];
# Validasi Form
if (trim($TxtNama)=="") {
	include "petani.php";
	echo "Nama belum diisi, ulangi kembali";
}
elseif (trim($TxtUmur)=="") {
	include "petani.php";
	echo "Umur masih kosong, ulangi kembali";
}
elseif (trim($TxtAlamat)=="") {
	include "petani.php";
	echo "Alamat masih kosong, ulangi kembali";
}
else {
    $NOIP = $_SERVER['REMOTE_ADDR'];
	
	$sql  = " INSERT INTO tbpetani (nama,kelamin,umur,alamat,noip,tanggal) 
		 	  VALUES ('$TxtNama','$RbKelamin','$TxtUmur','$TxtAlamat','$NOIP',NOW())";
	mysqli_query($koneksi,$sql) 
		  or die ("SQL Error 2".mysqli_error($koneksi));
	echo "<meta http-equiv='refresh' content='0; url=diagnosa.php'>";
}
?>