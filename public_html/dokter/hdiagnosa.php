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
                        <li class="breadcrumb-item">Pasien</li>
                        <li class="breadcrumb-item" aria-current="page">Diagnosa</li>
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
                            <?php
                                if(isset($_POST['gejala'])){
                                    if(count($_POST['gejala'])<2){
                                        ?>
                                        <script language="JavaScript">
                                            alert('Pilih minimal 2 gejala');
                                        document.location='diagnosa.php?id_konsultasi=<?php print $_POST['id_konsultasi'] ?>'</script>
                                        <?php
                                        /*echo "Pilih minimal 2 gejala";*/
                                    }else{
                                        $sql = "SELECT GROUP_CONCAT(b.id), a.ds
                                        FROM ds_aturan a
                                        JOIN ds_penyakit b ON a.id_penyakit=b.id
                                        WHERE a.id_gejala IN(".implode(',',$_POST['gejala']).") 
                                        GROUP BY a.id_gejala";
                                        $result= mysqli_query($con, $sql);
                                        $gejala= array();
                                        while($row=$result->fetch_row()){
                                            $gejala[]=$row;
                                        }

                                        //--- menentukan environement
                                        $sql="SELECT GROUP_CONCAT(id) FROM ds_penyakit";
                                        $result= mysqli_query($con,$sql);
                                        $row=$result->fetch_row();
                                        $fod=$row[0];

                                        //--- menentukan nilai densitas
                                        $densitas_baru=array();
                                        while(!empty($gejala)){
                                            $densitas1[0]=array_shift($gejala);
                                            $densitas1[1]=array($fod,1-$densitas1[0][1]);
                                            $densitas2=array();
                                            if(empty($densitas_baru)){
                                                $densitas2[0]=array_shift($gejala);
                                            }else{
                                                foreach($densitas_baru as $k=>$r){
                                                    if($k!="&theta;"){
                                                        $densitas2[]=array($k,$r);
                                                    }
                                                }
                                            }
                                            $theta=1;
                                            foreach($densitas2 as $d) $theta-=$d[1];
                                            $densitas2[]=array($fod,$theta);
                                            $m=count($densitas2);
                                            $densitas_baru=array();
                                            for($y=0;$y<$m;$y++){
                                                for($x=0;$x<2;$x++){
                                                    if(!($y==$m-1 && $x==1)){
                                                        $v=explode(',',$densitas1[$x][0]);
                                                        $w=explode(',',$densitas2[$y][0]);
                                                        sort($v);
                                                        sort($w);
                                                        $vw=array_intersect($v,$w);
                                                        if(empty($vw)){
                                                            $k="&theta;";
                                                        }else{
                                                            $k=implode(',',$vw);
                                                        }
                                                        if(!isset($densitas_baru[$k])){
                                                            $densitas_baru[$k]=$densitas1[$x][1]*$densitas2[$y][1];
                                                        }else{
                                                            $densitas_baru[$k]+=$densitas1[$x][1]*$densitas2[$y][1];
                                                        }
                                                    }
                                                }
                                            }
                                            foreach($densitas_baru as $k=>$d){
                                                if($k!="&theta;"){
                                                    $densitas_baru[$k]=$d/(1-(isset($densitas_baru["&theta;"])?$densitas_baru["&theta;"]:0));
                                                }
                                            }
                                            //menampilkan array perhitungan
                                            /*print_r($densitas_baru);*/
                                        }

                                        //--- perangkingan
                                        unset($densitas_baru["&theta;"]);
                                        arsort($densitas_baru);
                                        //menampilkan array perhitungan
                                        /*print_r($densitas_baru);*/

                                        //--- menampilkan hasil akhir
                                        $codes=array_keys($densitas_baru);
                                        $sql="SELECT GROUP_CONCAT(nama) 
                                        FROM ds_penyakit 
                                        WHERE id IN('{$codes[0]}')";
                                        $result=mysqli_query($con,$sql);
                                        $row=$result->fetch_row();
                                        echo "Terdeteksi penyakit <b>{$row[0]}</b> dengan derajat kepercayaan ".round($densitas_baru[$codes[0]]*100,2)."% <br><br>";

                                        //--- menampilkan keterangan dari penyakit
                                        $queries = "SELECT kett FROM ds_penyakit WHERE nama = '$row[0]'";
                                        $result = mysqli_query($con,$queries);
                                        $value = mysqli_fetch_object($result);
                                        echo "Keterangan :<br>".$value->kett."<br><br>";

                                        $gejala = "";

                                        //--- menampilkan gejala yang dipilih
                                        echo "Gejala yang dipilih :<br>";
                                        foreach ($_POST['gejala'] as $item) {
                                            $query = "SELECT nama FROM ds_gejala WHERE id = '$item'";
                                            $result = mysqli_query($con,$query);
                                            $value = mysqli_fetch_object($result);
                                            $i++;
                                            echo $i.". ".$value->nama."<br>";
                                            //-- insert gejala
                                            $gejala .= $i.". ".$value->nama."<br>";
                                        }
                                        //-- insert penyakit
                                        $penyakit = $row[0];
                                        //--insert nilai
                                        $nilai = $densitas_baru[$codes[0]];
                                        //-- insert persentase
                                        $persentase = round($densitas_baru[$codes[0]]*100,2)."%";
                                        //-- insert tanggal sekarang
                                        $tanggal = date("d-m-Y")."<br>".date("h:i:s A");
                                        //-- id pasien
                                        $id_konsultasi = $_POST['id_konsultasi'];

                                        //--- memasukkan hasil diagnosa ke database
                                        $input = mysqli_query($con,"INSERT INTO riwayat (id_konsultasi, tanggal, gejala, penyakit, nilai, persentase) values('$id_konsultasi', '$tanggal', '$gejala', '$penyakit', '$nilai', '$persentase')");
                                    }
                                } else {
                                    ?>
                                        <script language="JavaScript">
                                            alert('Silahkan Pilih gejala yang dirasakan');
                                        document.location='diagnosa.php?id_konsultasi=<?php print $_POST['id_konsultasi'] ?>'</script>
                                        <?php
                                } 
                                ?>
                                <br>
                                <hr>
                                <br>
                                <a href="riwayatrm.php?id_konsultasi=<?php print $_POST['id_konsultasi']; ?>" class="btn btn-info text-white">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '_footer.php'; ?>