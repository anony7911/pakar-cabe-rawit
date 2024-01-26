<?php include '_header.php'; 

?>    

<div class="page-wrapper latar">

<br>
<div class="penyakit pembungkus bg-light">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="mdi mdi-needle"></i> Data Gejala Penyakit</h1>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambahgejala"><i class="fa fa-plus"></i> Tambah Data</button>
    </div>

    <div class="card shadow mb-4">
        <!-- /.card-header -->
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark"><i class="fa fa-table"></i> Daftar Data Gejala</h6>
        </div>

        <div class="card-body">
            <table id="example3" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-white theadtable">
                    <tr align="center">
                        <th width="5%">No</th>
                        <th>Kode Gejala</th>
                        <th>Gejala</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "koneksi.php";
                        $sql = "SELECT * FROM tb_gejala  ORDER BY id";
                        $qry = mysqli_query($koneksi,$sql) or die ("SQL Error".mysqli_error());
                        $no=0;
                        while ($data = mysqli_fetch_array ($qry)) {
                        $no++;
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $no;?></td>
                        <td class="text-center"><?php echo $data['kdgejala'];?></td>
                        <td><?php echo $data['gejala'];?></td>
                        <td class="text-center">
                        <div class="btn-group" role="group">
                            <a class="btn btn-warning btn-sm" href="edgejala.php?id=<?php echo $data['id'];?>"><i class="fa fa-edit"></i></a>

                            <a class="btn btn-danger btn-sm" href="hpgejala.php?id=<?php echo $data['id'];?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')"><i class="fa fa-trash"></i></a>
                        </div>
                    </td>
                    </tr>
                    <?php }?>                    
                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="tambahgejala" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-plus"></i> Tambah Data Gejala</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="simpangejala.php">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="kdgejala" class="font-weight-bold">Kode Gejala</label>
                            <input autocomplete="off" required type="text" class="form-control" id="kdgejala" name="kdgejala" />
                        </div>
                        <div class="form-group">
                            <label for="gejala" class="font-weight-bold">Gejala</label>
                            <input autocomplete="off" required type="text" class="form-control" id="gejala" name="gejala" />
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '_footer.php'; ?>