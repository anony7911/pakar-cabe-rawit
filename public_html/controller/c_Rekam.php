<?php 
/**
 * 
 */
class Rekam
{
	
	function TampilRPasien($id_konsultasi)
	{
		include '../koneksi/koneksi.php';
		$query = mysqli_query($con, "SELECT * FROM riwayat where id_konsultasi = '$id_konsultasi'");
		$i = 0;
		while($d = mysqli_fetch_array($query))
		{
			$data[$i]['id_konsultasi'] = $d['id_konsultasi'];
			$data[$i]['id_riwayat'] = $d['id_riwayat'];
			$data[$i]['tanggal'] = $d['tanggal'];
			$data[$i]['gejala'] = $d['gejala'];
			$data[$i]['penyakit'] = $d['penyakit'];
			$data[$i]['nilai'] = $d['nilai'];
			$data[$i]['persentase'] = $d['persentase'];
			$i++;
		}
		return $data;
	}

	function Hapus($id_riwayat)
	{
		include '../koneksi/koneksi.php';
		$query = mysqli_query($con,"DELETE FROM riwayat WHERE id_riwayat = '$id_riwayat'");
	}
}
error_reporting(0);
?>