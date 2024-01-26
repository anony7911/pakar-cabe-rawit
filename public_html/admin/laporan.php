<?php include '_header.php'; 
include "koneksi.php";
?>

<div class="page-wrapper latar">
<br>
<div class="penyakit pembungkus bg-light">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="mdi mdi-book-open-page-variant"></i> Laporan Data Gejala</h1>
        <div class="btn-group">
        
          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pilih Penyakit</button>

        <div class="dropdown-menu">
          <a class="dropdown-item" href="index.php?page=laporangejala">Semua Penyakit</a>
          <?php     $sqlp = "SELECT * FROM tb_penyakit ORDER BY kdpenyakit";
            $qryp = mysqli_query($koneksi,$sqlp) or die ("SQL Error: ".mysqli_error());
            while ($datap=mysqli_fetch_array($qryp)) {
              ?>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="laporan.php?&data=<?php echo $datap['id'];?>"><?php echo $datap['kdpenyakit']." - ".$datap['nama_penyakit'];?></a>
          <?php } ?>
        </div>
      </div>
    </div>

    <div class="card shadow mb-4">
      <!-- /.card-header -->
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-dark"><i class="fa fa-table"></i> Daftar Laporan Data Gejala</h6>
      </div>

      <div class="card-body">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="text-white theadtable">
              <tr align="center">
                <th width="5%">No</th>
                <th>Kode Gejala</th>
                <th>Gejala</th>
              </tr>
            </thead>
            <tbody>
              <?php
                include "koneksi.php";
                if(isset($_GET['data'])){
                $kdsakit=$_GET['data'];
                $sql = "SELECT * FROM tb_rules,tb_gejala WHERE tb_rules.id_problem='$kdsakit' AND tb_gejala.id=tb_rules.id_evidence ";
                }else { $sql = "SELECT * FROM tb_rules,tb_gejala WHERE tb_gejala.id=tb_rules.id_evidence ";}
                $qry = mysqli_query($koneksi,$sql) or die ("SQL Error".mysqli_error());
                $no=0;
                while ($data = mysqli_fetch_array ($qry)) {
                $no++;
              ?>
              <tr>
                <td class="text-center"><?php echo $no;?></td>
                <td class="text-center"><?php echo $data['kdgejala'];?></td>
                <td><?php echo $data['gejala'];?></td>
              </tr><?php }?>                    
            </tbody>
        </table>
      </div>
    </div>
</div>
    <!-- Akhir Laporan -->
                
<?php include '_footer.php'; ?>
