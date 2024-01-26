<?php 
/**
 * 
 */
class Konsultasi
{
	
	function TampilSemua($id_admin)
	{
		include "../koneksi/koneksi.php";
		$query = mysqli_query($con, "SELECT * FROM konsultasi WHERE id_admin='$id_admin'");
		$i = 0;
		while($d = mysqli_fetch_array($query))
		{
			$data[$i]['id_konsultasi'] = $d['id_konsultasi'];
			$data[$i]['nama'] = $d['nama'];
			$data[$i]['tgl_lahir'] = $d['tgl_lahir'];
			$i++;
		}
		return $data;
	}

	function Tambah($nama, $tgl_lahir, $id_admin)
	{
		include "../koneksi/koneksi.php";
		$query = mysqli_query($con, "INSERT INTO konsultasi (nama, tgl_lahir, id_admin)
			values('$nama', '$tgl_lahir', '$id_admin')");
	}

	function Hapus($id_konsultasi)
	{
		include "../koneksi/koneksi.php";
		$query - mysqli_query($con,"DELETE FROM konsultasi WHERE id_konsultasi = '$id_konsultasi'");
	}

	function Edit($id_konsultasi, $nama, $tgl_lahir)
	{
		include "../koneksi/koneksi.php";
		$query = mysqli_query($con,"UPDATE konsultasi set nama = '$nama', tgl_lahir = '$tgl_lahir' WHERE id_konsultasi = '$id_konsultasi'");
	}

	function TampilSatuData($id_konsultasi)
	{
		include "../koneksi/koneksi.php";
		$query = mysqli_query($con, "SELECT * FROM konsultasi WHERE id_konsultasi = '$id_konsultasi'");
		$g = mysqli_fetch_object($query);
		$this->nama = $g->nama;
		$this->tgl_lahir = $g->tgl_lahir;
	}
}
error_reporting(0);
?>