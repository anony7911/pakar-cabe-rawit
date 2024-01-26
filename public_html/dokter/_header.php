<?php
session_start();
include "../koneksi/koneksi.php";

if(!isset($_SESSION['username'])){
    header('location:../login.php');
} else {
    $username = $_SESSION["username"];
}
require_once('../koneksi/koneksi.php');
$hasil = mysqli_query($con, "select * from admin where username='$username'");

$row = mysqli_fetch_array($hasil);

$id_admin = $row['id_admin'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin | Sistem Pakar</title>
    <link href="../assetsA/dist/css/style.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../assetsA/assets/libs/datatable/dataTables.bootstrap.min.css">


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
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
  opacity: 1;
  transition: opacity 0.6s;
  margin-bottom: 15px;
}

.alert.success {background-color: #36bea6;}
.alert.warning {background-color: #336699;}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}


.latar{
    background-image: url(../img/cabai.jpg);
}
.namamenu{
    color: black;
    font-weight: bold;
}

.pembungkus{
    overflow: hidden;
    padding: 20px 15px 30px;
    border-radius: 10px;
    margin-bottom: 20px;
    border-top: 10px solid rgb(255, 179, 14);
    border-bottom: 10px solid rgb(255, 179, 14);
  }
  .theadtable{
    background-color: rgb(142, 48, 48); color: #ffffff;
  }


</style>
</head>

<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5" style="background-color: rgb(6, 170, 69); box-shadow: 1px 1px 1px black;">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header" data-logobg="skin5">
                 <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
             </div>
             <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5" style="background-color: rgb(6, 170, 69);">
                <ul class="navbar-nav float-left mr-auto">
                </ul>
                <ul class="navbar-nav float-right">
                    <h3 style="padding-top:20px; color:white; margin-right:50px; text-shadow: 1.2px 1.2px 1.2px black;">DIAGNOSIS HAMA DAN PENYAKIT TANAMAN CABAI RAWIT</h3>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assetsA/assets/images/users/a.jpg" alt="user" class="rounded-circle" width="31"></a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated">
                            <a class="dropdown-item" href="../index.php"><i class="mdi mdi-view-dashboard"></i> Beranda</a>
                            <a class="dropdown-item" href="../logout.php"><i class="mdi mdi-logout-variant"></i> Keluar</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="left-sidebar" data-sidebarbg="skin6">
        <div class="scroll-sidebar">
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li>
                        <div class="user-profile d-flex no-block dropdown m-t-20">
                            <div class="user-content hide-menu m-l-10">
                                <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <h5 class="m-b-0 user-name font-medium">Akses <?php echo $row['nama']; ?></h5>
                                </a>
                            </div>
                        </div>
                    </li>

                    <!-- Data Pasien -->
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="konsultasi.php" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Diagnosa</span></a></li>
                    <!-- Profil -->
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="profil.php" aria-expanded="false"><i class="mdi mdi-account-settings-variant"></i><span class="hide-menu">Pengaturan</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../logout.php" aria-expanded="false"><i class="mdi mdi-logout-variant"></i><span class="hide-menu">Keluar</span></a></li>
                </ul>
                
            </nav>
        </div>
    </aside>
