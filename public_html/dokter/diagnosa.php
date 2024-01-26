<?php include '_header.php'; 

include "../controller/c_Gejala.php";
$pt = new Gejala;

include "../controller/c_Rekam.php";
$p = new Rekam;
$data = $p->TampilRPasien($_GET['id_konsultasi']);
?>
<style>
.container {
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

.container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
}

.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
}

.container:hover input ~ .checkmark {
    background-color: #ccc;
}

.container input:checked ~ .checkmark {
    background-color: #2196F3;
}

.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

.container input:checked ~ .checkmark:after {
    display: block;
}

.container .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
</style>
<div class="page-wrapper latar">
    <div class="page-breadcrumb namamenu">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Diagnosa</h4>
                <div class="d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Beranda</li>
                        <li class="breadcrumb-item">Diagnosa</li>
                        <li class="breadcrumb-item" aria-current="page">Diagnosa Konsultasi</li>
                    </ol>
                </div>
            </div>
            <div class="col-7">
                <div class="text-right upgrade-btn">

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
                            <form method="post" action="hdiagnosa.php">
                                <input type="hidden" name="id_konsultasi" value="<?php print $_GET['id_konsultasi'] ?>">
                                
                                <h2>Silahkan pilih gejala yang muncul</h2><hr>
                                <?php
                                $data = $pt->TampilSemua();
                                foreach($data as $d){ ?>

                                    <label class="container"><?php print $d['nama'] ?>
                                    <input type="checkbox" name='gejala[]' value='<?php print $d['id'] ?>' >
                                    <span class="checkmark"></span>
                                </label>

                            <?php } ?>
                            <br><hr>
                            <input type="submit" value="Diagnosa Penyakit" name="ok" class="btn btn-info text-white">
                            <a href="riwayatrm.php?id_konsultasi=<?php print $_GET['id_konsultasi'] ?>" class="btn btn-info text-white">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '_footer.php'; ?>