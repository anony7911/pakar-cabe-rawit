<?php include '_header.php'; 

include "../controller/c_Konsultasi.php";
$p = new Konsultasi;
?>

<div class="page-wrapper latar">
    <div class="page-breadcrumb namamenu">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Manajemen Konsultasi</h4>
                <div class="d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Beranda</li>
                        <li class="breadcrumb-item" aria-current="page">Diagnosa</li>
                    </ol>
                </div>
            </div>
            <div class="col-7">
                <div class="text-right upgrade-btn">
                    <a href="tkonsultasi.php" class="btn btn-info text-white"><i class="mdi mdi-plus"></i> Tambah konsultasi</a>
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
                                    <th style="color: white;">Nama Konsultasi</th>
                                    <th style="color: white;">Tanggal Lahir</th>
                                    <th style="color: white;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $data = $p->TampilSemua($id_admin);
                                if (!isset($data)) {
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php
                                } else {
                                    $i=0;
                                foreach($data as $d){ 
                                    $i++;
                                    ?>
                                    <tr>
                                        <td><?php print $i; ?></td>
                                        <td><?php print $d['nama']; ?></td>
                                        <td><?php print $d['tgl_lahir']; ?></td>
                                        <td>
                                            <a href="riwayatrm.php?id_konsultasi=<?php print $d['id_konsultasi']; ?>" class="btn btn-info btn-simple btn-xs text-white" title="Lihat Diagnosa konsultasi"><i class="mdi mdi-eye"></i></a>

                                            <a href="ekonsultasi.php?id_konsultasi=<?php print $d['id_konsultasi']; ?>" class="btn btn-info btn-simple btn-xs text-white" title="Edit Data konsultasi"><i class="mdi mdi-lead-pencil"></i></a>

                                            <a onclick="if (! confirm('Apakah anda yakin akan menghapus konsultasi dari daftar ?')) { return false; }" href="../ProsesA/d_konsultasi.php?id_konsultasi=<?php print $d['id_konsultasi']; ?>" class="btn btn-danger btn-simple btn-xs text-white" title="Hapus konsultasi"><i class="fa fa-times"></i></a>
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

