<?php include '_header.php'; 

include "../controller/c_Rekam.php";
$p = new Rekam;
$data = $p->TampilRPasien($_GET['id_konsultasi']);
?>

<div class="page-wrapper latar">
    <div class="page-breadcrumb namamenu">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Manajemen Rekam Konsultasi</h4>
                <div class="d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Beranda</li>
                        <li class="breadcrumb-item">Diagnosa</li>
                        <li class="breadcrumb-item" aria-current="page">Rekam Konsultasi</li>
                    </ol>
                </div>
            </div>
            <div class="col-7">
                <div class="text-right upgrade-btn">
                    <a href="diagnosa.php?id_konsultasi=<?php print $_GET['id_konsultasi'] ?>" class="btn btn-info text-white"><i class="mdi mdi-plus"></i> Diagnosa</a>
                    <a href="konsultasi.php" class="btn btn-info text-white">Kembali</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card pembungkus">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="bootstrap-data-table" class="table table-hover table-bordered">
                                <thead class="theadtable">
                                  <tr>
                                    <th style="color: white;" width="5%">ID</th>
                                    <th style="color: white;">Tanggal</th>
                                    <th style="color: white;">Gejala</th>
                                    <th style="color: white;">Penyakit</th>
                                    <th style="color: white;">Nilai</th>
                                    <th style="color: white;">Persentase</th>
                                    <th style="color: white;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if (!isset($data)) {
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php
                                } else {
                                    $i=0;
                                    foreach ($data as $r) {
                                        $i++;
                                        ?>
                                        <tr>
                                            <td><?php print $i; ?></td>
                                            <td><?php print $r['tanggal']; ?></td>
                                            <td><?php print $r['gejala']; ?></td>
                                            <td><?php print $r['penyakit']; ?></td>
                                            <td><?php print $r['nilai']; ?></td>
                                            <td><?php print $r['persentase']; ?></td>
                                            <td>
                                                
                                                <a onclick="if (! confirm('Apakah anda yakin akan menghapus riwayat rekam konsultasi dari daftar ?')) { return false; }" href="../ProsesA/d_rekam.php?id_riwayat=<?php print $r['id_riwayat']; ?>&id_konsultasi=<?php print $_GET['id_konsultasi']; ?>" class="btn btn-danger btn-simple btn-xs text-white" title="Hapus Rekam Medis"><i class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                    <?php }} ?>
                                </tbody>
                            </table>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php include '_footer.php'; ?>