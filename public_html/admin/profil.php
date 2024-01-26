<?php 
include '_header.php';
?>

<div class="page-wrapper latar">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5 namamenu">
                <h4 class="page-title">Pengaturan Profil</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Beranda</li>
                            <li class="breadcrumb-item" aria-current="page">Profil</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-7">
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card pembungkus">
                    <div class="card-body">
                        <center class="m-t-30"> <img src="../img/d.png" class="rounded-circle" width="150" /><br>
                            <br>
                            <h4 class="card-title m-t-10"><?php echo $row["nama"]; ?></h4>
                            <h6 class="card-subtitle">Admin Sistem Pakar</h6>
                        </center>
                    </div>
                    <div>
                        <hr> </div>
                        <div class="card-body"> 
                            <small class="text-muted">Email address </small>
                            <h6><?php echo $row["email"]; ?></h6>
                            <small class="text-muted">Phone Number </small>
                            <h6><?php echo $row["nohp"]; ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <?php  
                    if (isset($_SESSION["sukses"])) {
                        $sukses = $_SESSION["sukses"];
                        echo $sukses;
                    } else if (isset($_SESSION["gagal"])) {
                        $gagal = $_SESSION["gagal"];
                        echo $gagal;
                    }
                    ?>
                    <div class="card pembungkus">
                        <div class="card-body">
                            <form id="myform" method="post" action="../ProsesA/e_profil.php" class="form-horizontal form-material">
                                <div class="form-group">
                                    <label class="col-md-12">Username</label>
                                    <div class="col-md-12">
                                        <input type="text" value="<?php echo $row["username"]; ?>" class="form-control form-control-line" readonly="true" name="username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Nama</label>
                                    <div class="col-md-12">
                                        <input type="text" value="<?php echo $row["nama"]; ?>" class="form-control form-control-line" name="nama">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" value="<?php echo $row["email"]; ?>" class="form-control form-control-line" name="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">No Hp</label>
                                    <div class="col-md-12">
                                        <input type="number" value="<?php echo $row["nohp"]; ?>" class="form-control form-control-line" name="nohp">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" value="<?php echo $row["password"]; ?>" class="form-control form-control-line form-password" name="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="checkbox" class="form-checkbox"> Tampilkan password
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="button" onclick="myFunction()" class="btn btn-info">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include '_footer.php'; ?>

        <script type="text/javascript">
            $(document).ready(function(){       
                $('.form-checkbox').click(function(){
                    if($(this).is(':checked')){
                        $('.form-password').attr('type','text');
                    }else{
                        $('.form-password').attr('type','password');
                    }
                });
            });
        </script>

        <script type="text/javascript">
            function myFunction(){
                var r = confirm("Apakah anda yakin akan mengubah data profil?");
                if (r == true) {
                    document.forms["myform"].submit();
                } else {
                    document.location('profil.php');
                }
            }
        </script>
        <script>
            var close = document.getElementsByClassName("closebtn");
            var i;

            for (i = 0; i < close.length; i++) {
              close[i].onclick = function(){
                var div = this.parentElement;
                div.style.opacity = "0";
                setTimeout(function(){ div.style.display = "none"; }, 600);
            }
        }
    </script>
    <?php unset($_SESSION["sukses"]); ?>
    <?php unset($_SESSION["gagal"]); ?>