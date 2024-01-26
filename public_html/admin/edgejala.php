<?php
include '_header.php';
include "koneksi.php";
$kdubah = $_GET['id'];
if($kdubah !="") {
	#menampilkan data
	$sql = "SELECT * FROM tb_gejala WHERE id='$kdubah'";
	$qry = mysqli_query ($koneksi,$sql)
			or die ("SQL ERROR".mysqli_error($koneksi));
	$data = mysqli_fetch_array($qry);
	
	#samakan dengan variabel form
	$kdgejala = $data['kdgejala'];
	$gejala = $data['gejala'];
}
?>

<div class="page-wrapper latar">

<br>
<div class="penyakit pembungkus bg-light layar">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-database"></i> Data Gejala</h1>

        <a href="gejala.php" class="btn btn-secondary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark"><i class="fas fa-fw fa-edit"></i> Edit Data Gejala</h6>
        </div>
    	
    	<form id="form" name="form" method="post" action="edsimgejala.php">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Kode Gejala</label>

                        <input autocomplete="off" type="text" class="form-control" name="kdgejala" id="kdgejala" value="<?php echo $kdgejala; ?>" disabled="disabled" required />
    					<input name="kdgejala2" type="hidden" id="kdgejala2" value="<?php echo "$kdgejala"; ?>">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Gejala</label>
    					
    					<input autocomplete="off" type="text" class="form-control" name="gejala" id="gejala" value="<?php echo "$gejala"; ?>" required />
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