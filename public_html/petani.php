<!DOCTYPE html>
<html>
<head>
	<title>Petani</title>
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
<body class="pembungkus">

	<!-- Nav -->
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
	            <a class="beranda text-uppercase text-expanded" href="petani.php">Diagnosis</a>
	          </li>
	          <li class="nav-item px-lg-4">
	            <a class="text-uppercase text-expanded" href="panduan.php">Panduan</a>
	          </li>
	          <li class="nav-item px-lg-4">
	            <a class="text-uppercase text-expanded" href="login.php">Login</a>
	          </li>
	        </ul>
	      </div>
	    </div>
	  </nav>
	  <!-- Akhir Nav -->

	<div class="container">
	<div class="col-12">

	    <div class="card o-hidden border-0 shadow-lg my-5">
	      
		  	<div class="card-header">
			  	<h6 class="m-0 font-weight-bold text-black">
			  		<i class="fas fa-fw fa-bolt mr-1"></i> Konsultasi
			  	</h6>
		  	</div>
		  
		  	<div class="card-body">

				<form onSubmit="return validasi(this)" method="post" name="form1" target="_self" action="proses-petani.php">
					<div class="form-row">
			            <div class="form-group col-md-6">
			                <label class="font-weight-bold">Nama</label>
			                <input required autocomplete="off" class="form-control" type="text" placeholder="Nama" name="TxtNama" />
			            </div>
						
			            <div class="form-group col-md-6">
			                <label class="font-weight-bold">Jenis Kelamin</label>
						  	<select name="cbojk" class="form-control" required>
						      	<option value="0" selected="selected">--Jenis Kelamin--</option>
						      	<option value="Laki-laki">Laki-laki</option>
						      	<option value="Perempuan">Perempuan</option>
					      	</select>
			            </div>
						
						<div class="form-group col-md-6">
			                <label class="font-weight-bold">Umur</label>
			                <input required autocomplete="off" class="form-control" type="text" placeholder="Umur" name="TxtUmur" />
			            </div>

						<div class="form-group col-md-6">
			                <label class="font-weight-bold">Alamat</label>
			                <input required autocomplete="off" class="form-control" type="text" placeholder="Alamat" name="TxtAlamat" />
			            </div>
			        </div>
					<div class="text-center">
						<button name="Submit" type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
						<button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
					</div>

				</form>
				  
			</div>
		</div>
	</div>
	</div>

</body>
</html>