<?php include '_header.php';

include "../controller/c_konsultasi.php";
$p = new Konsultasi;
$p->TampilSatuData($_GET['id_konsultasi']);
?>

		<div class="page-wrapper latar">
			<div class="page-breadcrumb namamenu">
				<div class="row align-items-center">
					<div class="col-5">
						<h4 class="page-title">Manajemen Ubah Data Konsultasi</h4>
						<div class="d-flex align-items-center">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">Beranda</li>
								<li class="breadcrumb-item" aria-current="page">Diagnosa</a></li>
								<li class="breadcrumb-item" aria-current="page">Ubah Data Konsultasi</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-8 col-xlg-9 col-md-7">
						<div class="card pembungkus">
							<div class="card-body">
								<form method="post" class="form-horizontal form-material" action="../ProsesA/e_konsultasi.php">
									<div class="form-group">
										<input type="hidden" value="<?php print $_GET['id_konsultasi'] ?>" name="id_konsultasi" />
										<label class="col-md-12">Nama Konsultasi</label>
										<div class="col-md-12">
											<input type="text" value="<?php print $p->nama; ?>" class="form-control form-control-line" name="nama" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-12">Tanggal Lahir</label>
										<div class="col-md-12">
											<input type="date" class="form-control form-control-line" value="<?php print $p->tgl_lahir; ?>" name="tgl_lahir" required>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-12">
											<button class="btn btn-info" type="submit">Ubah Data</button>
											<a href="konsultasi.php" class="btn btn-info text-white">Kembali</a>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include '_footer.php'; ?>