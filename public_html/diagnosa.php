<?php include "admin/koneksi.php"; ?>
<?php include "admin/koneksi2.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sistem Pakar Cabai Rawit">

  <title>Sistem Pakar Diagnosa Hama dan Penyakit Tanaman Cabai Rawit</title>

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assetsL/css/index.css">

  <link href="assets/css/business-casual.min.css" rel="stylesheet">
  <style>

</style>

<script type="text/javascript">        
    function tampilkanwaktu(){
    var waktu = new Date(); 
    var sh = waktu.getHours() + "";
    var sm = waktu.getMinutes() + "";
    var ss = waktu.getSeconds() + "";
    document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
}

</script>
<style>
.densitas1 {text-align:center; display:block; float:left; width:100%;}
.densitas {border-bottom:1px solid #e3e6f0;text-align:center; display:block; float:left; width:50%;}

</style>

</head>

<body class="pembungkus">

<div class="pembungkus">
  <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav" style="background-color:rgb(6, 170, 69);">
    <div class="container">
      <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" style="color:white;" href="#" target="_blank" rel="noopener">Sistem Pakar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto">
          <li class="px-lg-4">
            <a class="text-uppercase text-expanded" href="index.php">Beranda</a>
          </li>
          <li class="active px-lg-4">
            <a class="beranda text-uppercase text-expanded" href="petani.php">Diagnosis</a>
          </li>
          <li class="px-lg-4">
            <a class="text-uppercase text-expanded" href="panduan.php">Panduan</a>
          </li>
          <li class="px-lg-4">
            <a class="text-uppercase text-expanded" href="login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>












<!-- diagnosis -->

  <div class="container">
  <div class="col-12">
  <div class="card o-hidden border-0 shadow-lg my-5">
      
    <div class="card-header">
      <h6 class="m-0 font-weight-bold text-black">
         <div class="text-center mb-4">
      <i class="fas fa-fw fa-bolt mr-1"></i> Diagnosis
      </h6>
    </div>
    
    <div class="card-body">
      <div class="text-center mb-4">
        <b>Pilihlah Gejala Yang Terjadi</b>
      </div>

      <form method="post">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <?php
          $sqli="SELECT * FROM tb_gejala ORDER BY id ASC ";
          $result=$db->query($sqli);
          while($row=$result->fetch_object()){
            echo "<tr><td class='align-middle'><input type='checkbox' name='evidence[]' value='{$row->id}'"
              .(isset($_POST['evidence'])?(in_array($row->id,$_POST['evidence'])?" checked":""):"")
              ."></td><td class='align-middle'>{$row->kdgejala} {$row->gejala}</td></tr>";
          }
          ?>
        </table>

        <div class="text-center">
          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Proses Konsultasi</button>
          &nbsp; <a href="diagnosa.php" class="btn btn-primary">Reset</a>
        </div>
      </form>


      <?php
      //mengambil nilai gejala yang dipilih
      if(isset($_POST['evidence'])){
        if(count($_POST['evidence'])<2){
          echo "<div class='text-center alert alert-danger mt-4'>Pilih minimal 2 gejala untuk dilakukan proses konsultasi.</a>";
        }else{
          echo "
          <div class='mt-4 mb-4 font-weight-bold'>Gejala yang dipilih</div>
          <table class='table table-bordered' width='100%' cellspacing='0'>
          <tr class='text-white' align='center' style='background-color: rgb(142, 48, 48);'>
          <th width='15%'>Kode Gejala</th>
          <th>
          Nama Gejala
          </th>
          </tr>"; 
          $arrKDGejalaSelect=$_POST['evidence'];
          foreach($arrKDGejalaSelect as $kdGSelect){
            $queryG=mysqli_query($koneksi,"SELECT * FROM tb_gejala WHERE id='$kdGSelect' "); 
            while($dataG=mysqli_fetch_array($queryG)){ echo "<td class='text-center align-middle'>".$dataG['kdgejala']."</td><td>".$dataG['gejala']."</td></tr>";}
            }
          echo "</table>";
          $sql = "SELECT GROUP_CONCAT(b.kdpenyakit), a.cf, a.id_evidence
            FROM tb_rules a
            JOIN tb_penyakit b ON a.id_problem=b.id
            WHERE a.id_evidence IN(".implode(',',$_POST['evidence']).") 
            GROUP BY a.id_evidence ORDER BY a.id_evidence ASC ";
          $result=$db->query($sql);


          // $evidence pertama
          $evidence=array();
          //$gejalaSelect=array();
          while($row=$result->fetch_row()){
            //print_r($row[2]);
            $evidence[]=$row;
            //$gejalaSelect[]=$row[0];
            //masukkan kode perhitungannya dibawah ini
          
          } $no=0;
          echo "<div class='mt-4 mb-4 font-weight-bold'>Densitas (m) Awal</div>";;
          echo "<table class='table table-bordered' width='100%' cellspacing='0'>";
          echo "<tr class='text-white' align='center' style='background-color: rgb(142, 48, 48);'>";
          echo "<th>No</th>";
          echo "<th>Kode Gejala</th>";
          echo "<th>Nama Gejala</th>";
          echo "<th>Penyakit</th>";
          echo "<th>Densitas</th>";
          echo "<th>Plausability</th>";
          echo "</tr>";
          foreach($evidence as $kdgejala){
            echo "<tr>"; $no=$no+1;
            echo "<td class='text-center align-middle'>$no</td>";
            echo "<td class='text-center align-middle' width='15%'>"; 
            $queryG=mysqli_query($koneksi,"SELECT * FROM tb_gejala WHERE id='$kdgejala[2]' "); 
            $dataG=mysqli_fetch_array($queryG); 
            echo $dataG['kdgejala']."</td><td>".$dataG['gejala']."<br>";
            echo"</td>";
            echo "<td class='text-center align-middle'>"; print_r($kdgejala[0]); echo "</td>";
            echo "<td class='text-center align-middle'>"; print_r($kdgejala[1]); echo"</td>";
            echo "<td class='text-center align-middle'>"; print_r(1-$kdgejala[1]); echo"</td>"; echo "</tr>";
            }unset($kdgejala);
          echo "</table>";    
      ?>
      <div class="mt-4 mb-4 font-weight-bold">Menentukan Nilai Densitas (m) Baru</div>
      <?php
          //--- menentukan environement
          $sql="SELECT GROUP_CONCAT(kdpenyakit) FROM tb_penyakit ";
          $result=$db->query($sql);
          $row=$result->fetch_row();
          $fod=$row[0];
          //$densitas_baru=array(); echo "<br>";
      echo "<table class='table table-borderless' width='100%' cellspacing='0'>";
      //menghitung nilai densitas (m) baru
      $aturan = 3;
      $aturanbaru = 2;
      while(!empty($evidence)){ 
      echo "<tr><td colspan='3' class='text-white text-center' style='background-color: rgb(142, 48, 48);'>Aturan kombinasi untuk m<sub>$aturan</sub></td></tr>";
      echo "<tr align='center'>";
          //nilai pada Y1 baris atas
          echo "<td width='33%' style='border-bottom:1px solid #e3e6f0;'></td>";
          echo "<td width='33%' style='border-bottom:1px solid #e3e6f0;'>";
            $densitas1[0]=array_shift($evidence); 
            // $densitas1[0][0]) menampilkan kode penyakit
            echo "<span class='Y1'>M<sub>2</sub>"; echo "{"; print_r($densitas1[0][0]); echo "}<br>";
            // $densitas1[0][1]) menampilkan nilai penyakit
            print_r($densitas1[0][1]); 
            echo "</span>";
          echo "</td>";
          echo "<td width='33%' style='border-bottom:1px solid #e3e6f0;'>";
          //nilai pada Y2 baris atas
            $densitas1[1]=array($fod,1-$densitas1[0][1]); 
            echo "<span class='Y2'>M<sub>2</sub>{&theta;}<br>"; $Y2=1-$densitas1[0][1]; echo " $Y2</span>";
            $densitas2=array();
          echo "</td></tr>";
          
          
            if(empty($densitas_baru)){
              //nilai pada X1 baris 1
              //echo "tidak ada densitas baru<br>";
              $densitas2[0]=array_shift($evidence);
              
            }else{
              foreach($densitas_baru as $k=>$r){
                //nilai pada X1 baris 2; jika ad densitas baru
                if($k!="&theta;"){
                  //print_r($densitas2);echo "<br>";
                  $densitas2[]=array($k,$r); 
                  
                }
              }
            }

            $theta=1;
            //nilai X1 baris 2 
            foreach($densitas2 as $d) $theta-=$d[1];
            $densitas2[]=array($fod,$theta); 
            //print_r($theta);
            //echo"<p>densitas2[0] = ".print_r($densitas2[0][0])." | densitas2[1] = ".print_r($densitas2[0][1])."</p>";
            $m=count($densitas2);
          echo "<tr>"; 
          echo "<td class='p-0'><span class='densitas1'>";
          if(empty($densitas_baru)){
              //nilai pada X1 baris 1
              //echo "tidak ada densitas baru<br>";
              // $densitas2[0]=array_shift($evidence);
              echo "<span class='densitas1' style='border-bottom:1px solid #e3e6f0;'>M<sub>1</sub>";
              echo "{"; print_r($densitas2[0][0]); echo "}<br>";
              echo ""; print_r($densitas2[0][1]); echo "<br>";
              echo "</span><br>"; 
            }else{
              foreach($densitas_baru as $k=>$r){
                //nilai pada X1 baris 2; jika ad densitas baru
                if($k!="&theta;"){
                  //print_r($densitas2);echo "<br>";
                  $densitas2[]=array($k,$r); 
                  //echo "<span class='X1'>[nilai X1 baris 2 ";
                  echo "<span class='densitas1' style='border-bottom:1px solid #e3e6f0;'>m<sub>$aturanbaru</sub>{";
                  //print_r($densitas2[0][0]); echo "<br>";
                  //print_r($densitas2[0][1]);
                  print_r($k); echo"}<br>"; print_r($r);
                  echo "</span><br>";
                }
              }
            }
          echo "</span><span class='densitas1' style='border-bottom:1px solid #e3e6f0;'>M<sub>1</sub>{&theta;}<br>".$theta."</span></td>"; 
          echo "<td colspan='2' class='p-0'><div class='kolom2X'>";
            $densitas_baru=array();
            for($y=0;$y<$m;$y++){
              for($x=0;$x<2;$x++){
                if(!($y==$m-1 && $x==1)){
                  $v=explode(',',$densitas1[$x][0]);
                  $w=explode(',',$densitas2[$y][0]);
                  sort($v); 
                  sort($w); 
                  $vw=array_intersect($v,$w); 
                  //mencari nilai irisan  
                  if(empty($vw)){
                    echo "<span class='densitas'>kosong";

                    // ini nilai teta yang akan dihapus
                    $k="&theta;"; echo " $k<br>";
                    // echo $nilaiX1Y1;
                    echo "</span>"; 
                  }else{
                    //echo "<td rowspan='2'>";
                    //echo "<br><span class='teta2'>jika data vw ADA maka tampilkan ";
                    $k=implode(',',$vw); //echo "{".print_r($k)."}= $nilaiX1Y1"; 
                    echo "<span class='densitas'>";
                          $nilaiX1Y1=$densitas1[$x][1]*$densitas2[$y][1]; 
                          foreach($vw as $vwHasil){ print_r($vwHasil);} echo "<br>"; print_r($nilaiX1Y1);
                          echo "</span>";
                  }
                  if(!isset($densitas_baru[$k])){
                    //echo "data Y1r2";
                    //echo "<td> y1 r3 ";
                    $densitas_baru[$k]=$densitas1[$x][1]*$densitas2[$y][1];
                    //echo "<span class='Y1r2'>Y1r2 = "; 
                    $k=implode(',',$vw); //echo $k. "<br>"; 
                  }else{
                    $densitas_baru[$k]+=$densitas1[$x][1]*$densitas2[$y][1];
                    //echo "<p>M <sub>3b</sub> : "; print_r($densitas_baru[$k]);echo"|"; print_r($densitas1[$x][1]);
                  }
                }
              } 
            } echo "<span class='densitas'>&theta;<br>"; $dataX2=$theta; $dataY2=$Y2; $Y3=$dataX2*$dataY2; echo $Y3."</span>";
      echo "</div></td></tr>";
      echo "<tr>";
      echo "<td colspan='3'>";
            echo "<p class='text-justify'>Merujuk pada rumus [DST-07] evidential conflict-nya belum ada, maka nilainya adalah k=0, sehingga dapat dihitung berdasarkan persamaan [DST-06]:</p>";
            echo "<div class='alert alert-info'>";
            //print_r($densitas_baru);echo"<br>";
            print_r($k); echo "<br>";
            print_r($nilaiX1Y1); echo "<br><br>";
            // print_r($k); echo "<br>"; //print_r($k);echo"<br>";
            foreach($densitas_baru as $k=>$d){
              echo $d."[".$k."]<br>";
              if($k!="&theta;"){
                $densitas_baru[$k]=$d/(1-(isset($densitas_baru["&theta;"])?$densitas_baru["&theta;"]:0));
                $sr=$Y3/(1-(isset($densitas_baru["&theta;"])?$densitas_baru["&theta;"]:0));
                $dr=isset($densitas_baru["&theta;"])?$densitas_baru["&theta;"]:0;
                //echo "<p>Densitas baru "; print_r($densitas_baru[$k]); echo"=$d /(1-";  echo "</p>";
                //print_r((1-(isset($densitas_baru["&theta;"])?$densitas_baru["&theta;"]:0))); echo "<br>";

                // menampilkan hasil teta untuk pembagi
                //print_r($densitas_baru["&theta;"]); echo "<br>";
                echo "m<sub>$m</sub>{"; print_r($k); echo "} = $d /(1-($dr))<br>";
                // hasilnya
                echo "m<sub>$aturan</sub>{"; print_r($k); echo "} = ";print_r($densitas_baru[$k]); echo "<br><br>";
              }
            }
            echo "m<sub>$m</sub>{&theta;} = $Y3 /(1-($dr))<br>";
            echo "m<sub>$aturan</sub>{&theta;} = $sr";
            echo "</div>";
            

            //hasil perhitungan densitas awal m ke n
            echo "<p>Sehingga dari perhitungan tersebut didapatkan: <p>";
            // print_r($densitas_baru); echo "<br><br><br>";
            foreach($densitas_baru as $kdPdensitas=>$nilaiPDensitas){
              echo "<b>m<sub>$aturan</sub>("; print_r($kdPdensitas); echo ") = "; print_r($nilaiPDensitas); echo "</b><br />";
              }

              // menampilkan nilai theta
              echo "<b>m<sub>$aturan</sub>(&theta;) = $sr";

              // echo "<b>m<sub>$aturan</sub>(&theta;) =  $Y3<br>";
      echo "</td></tr>";
      $aturan ++;
      $aturanbaru ++;
          } //## end --menghitung nilai densitas (m) baru
      echo "</table>";
          //--- perangkingan
          unset($densitas_baru["&theta;"]);
          arsort($densitas_baru);
          //print_r ($densitas_baru);
        ?>

      <hr/>
      <div class="text-center mt-4 mb-4 text-white p-2" style='background-color: rgb(142, 48, 48);'>
        <b>Hasil Perangkingan</b>
      </div>
      <?php 
      $arrPenyakit=array(); 
      $queryPetani=mysqli_query($koneksi,"SELECT * FROM tbpetani ORDER BY idpetani DESC"); $dataPetani=mysqli_fetch_array($queryPetani);
      $queryP=mysqli_query($koneksi,"SELECT * FROM tb_penyakit"); while($dataP=mysqli_fetch_array($queryP)){ $arrPenyakit["$dataP[kdpenyakit]"]=$dataP['nama_penyakit']; }  
          echo "<p class='text-justify'>Dari hasil perhitungan yang terakhir tersebut kemudian diurutkan nilainya dari yang terbesar ke yang terkecil sebagai berikut :</p>";
          //print_r($densitas_baru);echo "<hr>"; 
          $dataSama=array();
          $dataSama=array_intersect_key($arrPenyakit,$densitas_baru);
          //print_r($dataSama); echo "<hr>";
          foreach($dataSama as $k=>$a){ 
            foreach($densitas_baru as $kdpenyakit=>$ranking){
            //echo "m<sub>$m</sub>("; print_r($kdpenyakit); echo ") = "; print_r($ranking); echo "<br>";
            //echo "m<sub>$m</sub>( $kdpenyakit | "; print_r($arrPenyakit["$kdpenyakit"]); echo ") = "; 
            //echo " dengan nilai kepercayaan sebesar ".round($densitas_baru[$kdpenyakit]*100,2)."%<br>";
            if($k==$kdpenyakit){ 
            //mengambil solusi penyakit
            $strS=mysqli_query($koneksi,"SELECT * FROM tb_penyakit WHERE kdpenyakit='$k' ");
            $dataS=mysqli_fetch_array($strS);
            $hasil = $aturan - 1;
              echo "
              <div class='card shadow mb-4'>
              <div class='card-header py-3'>
              <h6 class='m-0 font-weight-bold'>
              m<sub>$hasil</sub>( $kdpenyakit - "; print_r($arrPenyakit["$kdpenyakit"]);
              echo ") <span class='badge badge-success'>".round($densitas_baru[$kdpenyakit]*100,2)."%</h6></div>";
              echo "<div class='card-body'><b>Solusi Penanganan:</b><p class='text-justify'>".$dataS['solusi']."</p></div>
            </div>";
              $persen=round($densitas_baru[$kdpenyakit]*100,2);
              //menyimpan data petani
              $idpetani=$dataPetani['idpetani'];
              $querySimpanP=mysqli_query($koneksi,"INSERT INTO tb_hasil (idpetani,kdpenyakit,persentase,tanggal) VALUES ('$idpetani','$k','$persen', NOW() ) ");
            }
            }
          }
          //--- perangkingan
          unset($densitas_baru["&theta;"]);
          arsort($densitas_baru);
          //print_r($densitas_baru);
          
          //--- menampilkan hasil akhir
          $codes=array_keys($densitas_baru); 
          $final_codes=explode(',',$codes[0]);
          $sql="SELECT GROUP_CONCAT(nama_penyakit)  
          FROM tb_penyakit  
          WHERE kdpenyakit IN('".implode("','",$final_codes)."')"; 
          $result=$db->query($sql); 
          $row=$result->fetch_row(); 
          echo "<div class='alert alert-danger text-center mt-4'>Terdeteksi penyakit <b>{$row[0]}</b> dengan derajat kepercayaan <b>".round($densitas_baru[$codes[0]]*100,2)."%</b></div>"; 
        }
      }
      ?>
    </div>
  </div>
  </div>
  </div>
  </div>
  <!-- Akhir Diagnosis -->

  <footer class="footer text-faded text-center py-5">
    <div class="container">
      <p style="color: white;">Ernia 191220755</p>
    </div>
  </footer>

</div>

<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">

    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
      } else {
        document.getElementById("myBtn").style.display = "none";
      }
    }

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

</body>

</html>