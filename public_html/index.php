<?php
include 'controller/c_Riwayat.php';
$cl = new Riwayat;
$cl->Count();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sistem Pakar Cabai Rawit">
  <title>Sistem Pakar Diagnosis Hama dan Penyakit Tanaman Cabai Rawit</title>
  <meta name="keywords" content="Sistem Pakar, Diagnosa Penyakit, Metode Dempster Shafer">

  <!-- Bootstrap core CSS -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assetsL/css/index.css">

  <!-- Custom styles for this template -->
  <link href="assets/css/business-casual.min.css" rel="stylesheet">
  <style type="text/css">
  #myBtn {
    display: none;
    position: fixed;
    bottom: 20px;
    right: 30px;
    z-index: 99;
    font-size: 18px;
    border: none;
    outline: none;
    background-color: red;
    color: white;
    cursor: pointer;
    padding: 15px;
    border-radius: 4px;
  }

  #myBtn:hover {
    background-color: grey;
  }
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

</head>
<body>

<div class="pembungkus">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav" style="background-color:rgb(6, 170, 69);">
    <div class="container">
      <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" style="color:white;" href="#" target="_blank" rel="noopener">Sistem Pakar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto">
          <li class="active px-lg-4">
            <a class="beranda text-uppercase text-expanded" href="index.php">Beranda</a>
          </li>
          <li class="px-lg-4">
            <a class="text-uppercase text-expanded" href="petani.php">Diagnosis</a>
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

  <section class="page-section about-heading">
    <div class="container">
      <div class="about-heading-content">
      <br><br>
        <div class="row">
          <div class="col-xl-9 col-lg-10 mx-auto allcontainer bg-faded">
              <h3 class="judul">
                Sistem Pakar Diagnosis Hama dan Penyakit Tanaman Cabai Rawit Menggunakan Metode Dempster Shafer
              </h3>
            <div class="col-xl-9 mx-auto">
              <br><br>
            <div class="cta-inner text-center rounded">
              <h2 class="section-heading mb-4">
                <span class="section-heading-upper">Tentang</span>
                <span class="section-heading-lower">Cabai Rawit</span>
              </h2>
              <p class="mb-0" style="text-align: justify;">
                Tanaman cabai rawit (capsicum frutescens L) adalah salah satu jenis 
                sayuran penting yang ada di Indonesia yang tergolong komoditi hortikulturan
                yang buahnya memiliki nilai gizi cukup tinggi termasuk vitamin A dan C .
                Pengguna cabai yang cukup baik dalam bentuk segar maupun olahan 
                menyebabkan komoditi ini memiliki nilai ekonomi tinggi. Nilai ekonomi yang 
                tinggi menjadikan alasan petani untuk terus membudidayakan tanaman cabai 
                sebagai mata pencaharian dalam memenuhi kebutuhan hidup.
              </p>
            </div>
        </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer class="footer text-faded text-center py-5">
    <div class="container">
      <p style="color: white;">Ernia 191220755</p>
    </div>
  </footer>
</div>
  <!-- Bootstrap core JavaScript -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  <script type="text/javascript">
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
      } else {
        document.getElementById("myBtn").style.display = "none";
      }
    }

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

</body>

</html>