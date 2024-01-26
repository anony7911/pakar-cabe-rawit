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
  <title>Sistem Pakar Diagnosa Hama dan Penyakit Tanaman Cabai Rawit</title>
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
    background-color: #555;
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
      <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#" style="color:white;" target="_blank" rel="noopener">Sistem Pakar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item px-lg-4">
            <a class="text-uppercase text-expanded" href="index.php">Beranda</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="text-uppercase text-expanded" href="petani.php">Diagnosis</a>
          </li>
          <li class="nav-item active px-lg-4">
            <a class="beranda text-uppercase text-expanded" href="panduan.php">Panduan</a>
          </li>
          <li class="nav-item px-lg-4">
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
          <div class="col-xl-9 col-lg-10 mx-auto">
            <div class="bg-faded rounded p-5 allcontainer">
              <h1 align="center" class="section-heading mb-4">
                <!-- <span class="section-heading-upper">Strong Coffee, Strong Roots</span> -->
                Panduan Tata Cara Diagnosa Hama dan Penyakit
              </h1>
              <p style="text-align: justify;">Sistem Pakar diagnosa hama dan penyakit tanaman cabai rawit merupakan sebuah sistem yang mampu melakukan diagnosa hama atau penyakit cabai rawit berdasarkan gejala yang ditimbulkan. untuk melakukan diagnosa hama dan penyakit, terdapat beberapa tatacara dan aturan yang harus dilakukan, adalah sebagai berikut:</p>

              <h3><span class="section-heading-upper">ISI BIODATA DIRI</span></h3>
              <p class="mb-0">Diwajibkan untuk mengisi biodata diri anda  terlebi dahulu sebelum melakukan diagnosis. </p>

              <br>
              <h3><span class="section-heading-upper">BAGAIMANA CARA MELAKUKAN DIAGNOSA HAMA DAN PENYAKIT?</span></h3>
              <p class="mb-0">Diagnosa penyakit dapat dilakukan apabila telah menginput 2 gejala atau lebih, dikarenakan untuk mendiagnosa sebuah penyakit dibutuhkan minimal 2 buah gejala agar penyakit dapat didiagnosa.</p>

              <br>
              <h3><span class="section-heading-upper">BAGAIMANA JIKA GEJALA YANG TIMBUL TIDAK TERDAPAT DI SISTEM?</span></h3>
              <p class="mb-0">Pada saat ini hanya beberapa gejala dan tingkatan hama atau penyakit yang dapat didiagnosa oleh sistem, maka dari itu proses diagnosa hama dan penyakit hanya bisa dilakukan jika gejala dan hama atau penyakit sudah terdaftar pada sistem.</p>

              <br>
              <h3><span class="section-heading-upper">APAKAH DIAGNOSA HAMA DAN PENYAKIT PADA SISTEM SUDAH 100% BENAR?</span></h3>
              <p class="mb-0">Diagnosa hama dan penyakit pada sistem dilakukan dengan perhitungan yang menggunakan metode <i>Dempster-Shafer</i> dengan nilai kepercayaan bersumber dari pakar/dokter ahli tanaman cabai, guna melakukan upaya penanganan dini terhadap hama dan penyakit tersebut.</p>
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
