<?php include '_header.php'; 

?>

<div class="page-wrapper latar">
<br>
<div class="penyakit pembungkus bg-light">    
    <!-- Riwayat -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-sync-alt"></i> Data Riwayat Diagnosa</h1>
      </div>

      <div class="card shadow mb-4">
        <!-- /.card-header -->
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark"><i class="fa fa-table"></i> Daftar Data Riwayat Diagnosa</h6>
        </div>

        <div class="card-body">
          <table class="table table-bordered" id="example3" width="100%" cellspacing="0">
            <thead class="text-white theadtable">
              <tr align="center">
                <th width="5%">No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Umur</th>
                <th>Alamat</th>
                <th>Nama Penyakit</th>
                <th>Tanggal Diagnosa</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                include "koneksi.php";
                $arrPenyakit=array();
                $queryP=mysqli_query($koneksi,"SELECT * FROM tb_penyakit"); while($dataP=mysqli_fetch_array($queryP)){ $arrPenyakit["$dataP[kdpenyakit]"]=$dataP['nama_penyakit']; }    
                $sql = "SELECT * FROM tbpetani,tb_hasil WHERE tb_hasil.idpetani=tbpetani.idpetani group by tb_hasil.tanggal  ORDER BY tb_hasil.idhasil DESC";
                $qry = mysqli_query($koneksi,$sql)  or die ("SQL Error".mysqli_error());
                $no=0;
                while ($data=mysqli_fetch_array($qry)) {
                $no++;
              ?>
              <tr>
                <td class="text-center"><?php echo $no;?></td>
                <td><?php echo $data['nama'];?></td>
                <td class="text-center"><?php echo $data['kelamin'];?></td>
                <td class="text-center"><?php echo $data['umur'];?></td>
                <td><?php echo $data['alamat'];?></td>
                <td> 
                  <?php $idp=$data['tanggal'];
                    $strP=mysqli_query($koneksi,"SELECT * FROM tb_hasil WHERE tanggal='$idp' ");
                    while($dataP=mysqli_fetch_array($strP)){
                    echo $dataP['kdpenyakit']." - "; print_r($arrPenyakit["$dataP[kdpenyakit]"]); echo " = ".$dataP['persentase']."%<br>";
                  }?>
                </td>
                <td class="text-center"><?php echo $data['tanggal'];?></td>                    
                <td class="text-center">
                  <a class="btn btn-danger btn-sm" href="hpkonsultasi.php?id=<?php echo $data['idpetani'];?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')"><i class="fa fa-trash"></i></a>
                </td>
              </tr><?php }?>                    
            </tbody>
          </table>
        </div>
      </div>
</div>
    <!-- Akhir Riwayat -->

<?php include '_footer.php'; ?>