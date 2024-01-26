<?php 
include "koneksi.php";
// mengambil variabel dari halaman rule_kaidah_produksi.php
$gejala 	= '';
$events 	= '';
if (isset($_POST['gejala']))
{
	$selectors 	= htmlentities(implode(',', $_POST['gejala']));
	//$events 	= htmlentities(implode('', $_POST['bobot']));
}
$data=$selectors;
$input = $data;
	  //memecahkan string input berdasarkan karakter '\r\n\r\n'
	  $pecah = explode("\r\n\r\n", $input);
	  // string kosong inisialisasi
	  $text = "";
	  for ($i=0; $i<=count($pecah)-1; $i++)
	  {
	  	$part = str_replace($pecah[$i], "<p>".$pecah[$i]."</p>", $pecah[$i]);
		$text .=$part;
	  }
	  //menampilkan outputnya
//echo $text;
$kd_penyakit=$_POST['TxtKdPenyakit']; 
$cf=$_POST['cf'];
//menyimpan data kedalam tabel relasi
$text_line=$data;
$text_line =$data; //"Poll number 1, 1500, 250, 150, 100, 1000";
$text_line = explode(",",$text_line);
$posisi=0;
for ($start=0; $start < count($text_line); $start++) {
	$baris=$text_line[$start];
	$sql="INSERT INTO  tb_rules (id_problem,id_evidence,cf) VALUES ('$kd_penyakit','$baris','$cf' )";
	$query=mysqli_query($koneksi,$sql) or die(mysql_error($koneksi));
	$posisi++;
//print $text_line[$start] . "<BR>";
}
echo "<script>alert('Data berhasil disimpan!');window.location='basisp.php'</script>";
?>