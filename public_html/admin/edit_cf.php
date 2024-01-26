
<?php
include "koneksi.php";
$kd_gejala=$_GET['id_evidence'];
$kdpenyakit=$_GET['id_problem'];
$queryP=mysqli_query($koneksi,"SELECT * FROM tb_penyakit WHERE id='$kdpenyakit' ");
$dataP=mysqli_fetch_array($queryP);
?>
<link href="../assetsA/dist/css/style.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assetsA/assets/libs/datatable/dataTables.bootstrap.min.css">
<style>
	.latar{
    background-image: url(../img/cabai.jpg);
	}
	.pembungkus{
    overflow: hidden;
    padding: 20px 15px 30px;
    border-radius: 10px;
	margin-top: 30px;
    border-top: 10px solid rgb(255, 179, 14);
    border-bottom: 10px solid rgb(255, 179, 14);
  	}
</style>
<body class="latar">
<div class="container penyakit pembungkus bg-light">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-sitemap"></i> Data Rule</h1>

        <a href="basisp.php" class="btn btn-secondary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-edit"></i> Edit Data Nilai DS <?php echo $dataP['kdpenyakit']." - ".$dataP['nama_penyakit']; ?></h6>
        </div>



    <form id="form1" name="form1" method="post" action="update_cf.php?id_problem=<?php echo $_GET['id_problem'];?>&id_evidence=<?php echo $_GET['id_evidence'];?>" enctype="multipart/form-data">

    <div class="card-body">

    <table class="table table-borderless" width="100%" cellspacing="0">
    <tr>
        <th>Kode Gejala</th>
        <th>Nama Gejala</th>
        <th>Nilai DS</th>
        </tr>
        <?php
        $query=mysqli_query($koneksi," SELECT * FROM tb_gejala WHERE id='$_GET[id_evidence]' ")or die(mysqli_error());
        while($row=mysqli_fetch_array($query)){
        ?>
    <tr>
        <td><?php echo $row['kdgejala'];?></td>
        <td><?php echo $row['gejala'];?>
        <td><input autocomplete="off" required class="form-control" name="txtCF" type="text" value="<?php echo $_GET['cf'];?>"></td>
        </tr>
    <?php } ?>
    </table>
    </div>

    <div class="card-footer text-right">
                <button name="Submit" type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
                <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
            </div>



    </form>
    </div>

    </div>
</div>
</body>
