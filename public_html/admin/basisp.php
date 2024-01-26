<?php include '_header.php'; 

?>

<div class="page-wrapper latar">
<br>
<div class="penyakit pembungkus bg-light">
    <!-- Basis Pengetahuan -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="mdi mdi-information"></i> Data Rule</h1>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambahrule"><i class="fa fa-plus"></i> Tambah Data</button>
    </div>

    <div class="card shadow mb-4">
        <!-- /.card-header -->
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark"><i class="fa fa-table"></i> Daftar Basis Pengetahuan</h6>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="tambahrule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-plus"></i> Tambah Data Rule</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="simpanrull.php" enctype="multipart/form-data">
                        <div class="modal-body">
                            
                            <table class="table table-borderless" width="100%" cellspacing="0">
                                <tr>
                                    <th colspan="3">IF</th>
                                </tr>
                                <?php
                                    include "koneksi.php";
                                    $arrPenyakit=array(); $arrGejala=array();
                                    $query=mysqli_query($koneksi,"SELECT * FROM tb_gejala ORDER BY id ASC") or die("Query Error..!" .mysqli_error);
                                    while ($row=mysqli_fetch_array($query)){
                                        $arrGejala["$row[id]"]=$row['kdgejala'].",".$row['gejala'];
                                ?>
                                <tr>
                                <td width='5%'>
                                <input type="checkbox" name="gejala[]" id="gejala" value="<?php echo $row['id'];?>"></td><td width='5%'>
                                <?php echo $row['kdgejala'] ."</td><td>".$row['gejala'];?> <strong>AND</strong>
                                </td></tr>
                                <?php } ?>
                                <tr>
                                <th colspan="3">THEN</th>
                                </tr>
                                <tr>
                                <td colspan="3">
                                
                                <div class="form-row">
                                    <select class="form-control col-6" required name="TxtKdPenyakit" id="TxtKdPenyakit">
                                        <option value="NULL">--Pilih Penyakit--</option>
                                        <?php 
                                            $sqlp = "SELECT * FROM tb_penyakit ORDER BY id";
                                            $qryp = mysqli_query($koneksi,$sqlp) 
                                                    or die ("SQL Error: ".mysqli_error($koneksi));
                                            while ($datap=mysqli_fetch_array($qryp)) {
                                                if ($datap['id']==$kdsakit) {
                                                    $cek ="selected";
                                                }
                                                else {
                                                    $cek ="";
                                                }
                                                $arrPenyakit["$datap[id]"]=$datap['nama_penyakit'];
                                                echo "<option value='$datap[id]' $cek>$datap[id]&nbsp;|&nbsp;$datap[nama_penyakit]</option>";
                                            }
                                        ?>
                                    </select>
                                
                                    <div class="input-group col-6">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold" id="basic-addon1">Nilai DS</span>
                                        </div>
                                        <input autocomplete="off" required type="text" name="cf" class="form-control">
                                    </div>
                                
                                </div>
                                </td></tr>
                            
                            </table>
                        </div>
                        cf=
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                            <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
                            <button name="Submit" type="submit" class="btn btn-success"><i class="fa fa-save"></i> Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


<style>
    th{
        font-size:12px;
    }
</style>
        <div class="card-body">
            <table class="table table-bordered" id="example3" width="100%" cellspacing="0">
                <thead class="text-white theadtable">
                    <tr align="center">
                        <th width="5%">No</th>
                        <th>Kode Gejala - Nama Gejala</th>
                        <?php $query_p=mysqli_query($koneksi,"SELECT id_problem FROM tb_rules GROUP BY id_problem");
                        while($data_p=mysqli_fetch_array($query_p)){
                        ?>
                        <th width="10%"><?php $idp=$data_p['id_problem']; print_r($arrPenyakit["$idp"]); ?><br />
                            <a class="badge badge-warning" href="edrule.php?&kdpenyakit=<?php echo $data_p['id_problem'];?>"><i class="fa fa-edit"></i> Edit Rule</a>
                            <a class="badge badge-danger" href="hprule.php?kdpenyakit=<?php echo $data_p['id_problem'];?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')"><i class="fa fa-trash"></i> Hapus Rule</a>
                        </th>
                        <?php }?>
                    </tr>
                </thead>
                        <?php
                        $query=mysqli_query($koneksi,"SELECT * FROM tb_rules GROUP BY id_evidence ORDER BY id_evidence ASC ")or die(mysqli_error());
                        $no=1;
                        while($row=mysqli_fetch_array($query)){
                        $idpenyakit=$row['id_problem'];
                        
                        ?>
                    <tr>
                        <td class="text-center"><?php echo $no;?></td>
                        <td><?php $idG=$row['id_evidence']; print_r($arrGejala["$idG"]);// echo $row['gejala'];?></td>
                        
                        <?php $query_pb=mysqli_query($koneksi,"SELECT id_problem FROM tb_rules GROUP BY id_problem ");
                        while($data_pb=mysqli_fetch_array($query_pb)){
                        ?>
                        <td class="text-center"><?php $kdpenyakit_B=$data_pb['id_problem'];
                        $kdgejala_B=$row['id_evidence'];
                        $query_CG=mysqli_query($koneksi,"SELECT * FROM tb_rules WHERE id_problem='$kdpenyakit_B' AND id_evidence='$kdgejala_B' ");
                        while($data_GB=mysqli_fetch_array($query_CG)){ echo "<i class='text-success fa fa-check'></i><br />";
                        echo "<a class='badge badge-info' href='edit_cf.php?&id_problem=$kdpenyakit_B&id_evidence=$kdgejala_B&cf=$data_GB[cf]'>DS=$data_GB[cf]</a>"; }
                        ?>
                        </td>
                        <?php }?>
                    </tr>
                        <?php $no++; ?>
                        <?php } ?>
            </table>   
        </div>
    </div>
</div>
<!-- Akhir Basis Pengetahuan -->
    
<?php include '_footer.php'; ?>