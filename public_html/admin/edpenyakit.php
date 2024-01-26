<?php
include '_header.php';
include "koneksi.php";
$id = $_GET['id'];
if($id !=""){
	#menampilkan data
	$sql = "SELECT * FROM tb_penyakit WHERE id='$id'";
	$qry = mysqli_query ($koneksi,$sql)
			or die ("SQL ERROR".mysqli_error());
	$data = mysqli_fetch_array($qry);
	#samakan dengan variabel form
	$id=$data['id'];
	$in_id_penyakit = $data['kdpenyakit'];
	$in_penyakit = $data['nama_penyakit'];
	$in_definisi = $data['definisi'];
	$in_solusi = $data['solusi'];
}
?>
<div class="page-wrapper latar">
    
<br>
<div class="penyakit pembungkus bg-light layar">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-tasks"></i> Data Penyakit & Solusi</h1>

        <a href="penyakit.php" class="btn btn-secondary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark"><i class="fas fa-fw fa-edit"></i> Edit Data Penyakit & Solusi</h6>
        </div>

        <form id="form" name="form" method="post" action="edsimpenyakit.php">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Kode Penyakit</label>

                        <input autocomplete="off" type="text" class="form-control" name="kdpenyakit" id="kdpenyakit" value="<?php echo $in_id_penyakit;?>" disabled="disabled" required />
                        <input name="kdpenyakit" type="hidden" id="kdpenyakit" value="<?php echo $id;?>" />
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Nama Penyakit</label>

                        <input autocomplete="off" type="text" class="form-control" name="in_penyakit" id="in_penyakit" value="<?php echo $in_penyakit;?>" required />
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Definisi Penyakit</label>

                        <textarea autocomplete="off" class="form-control" name="in_definisi" required id="in_definisi"><?php echo $in_definisi;?></textarea>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Solusi Penyakit</label>

                        <textarea autocomplete="off" class="form-control" name="in_solusi" id="in_solusi" required><?php echo $in_solusi;?></textarea>
                    </div>
                </div>
            </div>

            <div class="card-footer text-right">
                <button name="simpan" type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
            </div>
        </form>
    </div>
</div>

<?php include '_footer.php'; ?>