<?php include "koneksi.php";?>
<script type="text/javascript">
$(document).ready(function() {
	$('div.TxtKdPenyakit option[value="<?php echo $_GET['kdpenyakit'];?>').prop("selected", true);
	$('TxtKdPenyakit').val("<?php echo $_GET['kdpenyakit'];?>");
	
	var gejala2="1";
	if(gejala2=="0"){ $("#gejala2").prop('checked', false);}else{ $("#gejala2").prop('checked', true);}
	//jns_tanaman_sbl
	 <?php
		$kd_penyakit=$_GET['kdpenyakit'];
        $query_G=mysqli_query($koneksi,"SELECT * FROM tbrule WHERE kd_penyakit='$kd_penyakit' ");
		while($data_G=mysqli_fetch_array($query_G)){
			//echo $data_G['kd_gejala'] ."<br>";
		?>
		var gejala<?php echo $data_G['kd_gejala'];?>;
		gejala<?php echo $data_G['kd_gejala'];?>="<?php echo $data_G['kd_gejala'];?>";
		//alert(gejala<?php echo $data_G['kd_gejala'];?>);
		if(gejala<?php echo $data_G['kd_gejala'];?>=="0"){ $("#gejala[<?php echo $data_G['kd_gejala'];?>]").prop('checked', false);}else{ $("#gejala[<?php echo $data_G['kd_gejala'];?>]").prop('checked', true);}
		<?php } ?>
});

</script>
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
<div class="page-wrapper latar">
<br>
<div class="container penyakit pembungkus bg-light">

	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-sitemap"></i> Data Rule</h1>

		<a href="basisp.php" class="btn btn-secondary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
	</div>

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-edit"></i> Edit Data Rule</h6>
		</div>


		<form id="form1" name="form1" method="post" action="sp_edrule.php" enctype="multipart/form-data">
		
			<div class="card-body">
				<table class="table table-borderless" width="100%" cellspacing="0">
					<tr>
						<th colspan="3">IF</th>
					</tr>
					<?php
					$query=mysqli_query($koneksi,"SELECT * FROM tb_gejala ORDER BY id ASC") or die("Query Error..!" .mysqli_error);
					while ($row=mysqli_fetch_array($query)){
					//mencari data gejala yang di edit
					$kd_penyakit=$_GET['kdpenyakit'];
					$kd_gejala=$row['id'];
						$kueri = mysqli_query ($koneksi,"SELECT * FROM tb_rules WHERE id_problem='$kd_penyakit' AND id_evidence='$kd_gejala' ORDER BY id_evidence desc ");
						$edit = mysqli_fetch_array($kueri);
						$checked = explode(', ', $edit['id_evidence']);
					//#end data gejala
					?>
					<tr><td><input type="checkbox" name="gejala[]" id="gejala" value="<?php echo $row['id'];?>" <?php in_array ($row['id'], $checked) ? print "checked" : "";  ?>></td><td>
					<?php echo $row['kdgejala'] ."</td><td>".$row['gejala'];?> <b>AND</b></td></tr>
					<?php } ?>
					<tr>
						<th colspan="3">THEN</th>
					</tr>
					<tr>
						<th colspan="3">
							<?php 
								$sqlp = "SELECT * FROM tb_penyakit WHERE id='$kd_penyakit' ";
								$qryp = mysqli_query($koneksi,$sqlp)or die ("SQL Error: ".mysqli_error());
								while ($datap=mysqli_fetch_array($qryp)) {
									echo "$datap[id] - $datap[nama_penyakit]";
								}
							?><input type="hidden" name="TxtKdPenyakit" value="<?php echo $_GET['kdpenyakit'];?>" />
						</th>
					</tr>
				</table>
			</div>
		
			<div class="card-footer text-right">
				<button name="Submit" type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
				<button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
			</div>
		</form>
	</div>
</div>
<br><br>
</div>
</div>