<?php
require 'Medoo.php';
 
// Using Medoo namespace
use Medoo\Medoo;
 
$database = new Medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => 'laboratuvar',
	'server' => 'localhost',
	'username' => 'root',
	'password' => '',
 
	// [optional]
	'charset' => 'utf8',
	'collation' => 'utf8_turkish_ci',
	'port' => 3306
]);

session_start();
?>


<!doctype html>
<html lang="tr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Kayıt Ekle</title>
  </head>
<style>

@import url('https://fonts.googleapis.com/css?family=Oswald&display=swap' rel='stylesheet');

html,body{
background-image:url('892.jpg');
background-size: cover;
background-repeat: no-repeat;
background-attachment: fixed;
background-position: center; 
height: 100%;
font-family: 'Oswald', sans-serif;
}

.container{
height: 100%;
align-content: center;
}

.card{
height: 680px;
margin-top: auto;
margin-bottom: auto;
width: 400px;
background-color: rgba(245,245,245) !important;
}

.card-header h4{
color: #708090;
margin-top:10px;
font-weight: bold;
}


.formm{
  margin: auto;
  width: 60%;
  padding: 4px;
}

.btn{
	margin-top:10px;
}

#nav{
	background-color:white;
	height:60px;
}


#logo1{
	margin-top:0px;
	float:rigth;
}

#lab{
	
	height:35px;
	background-color:white;
	color:black;
	margin-top:5px;

}


	


</style>
<body>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
<nav class="navbar navbar-expand-lg navbar-white bg-white" id="nav">
<a class="nav-link active" href="sekreterekran.php"><img id="logo" src="logo4.png" alt="Smiley face" height="57" width="57"><img id="logo" src="logoo.png" alt="Smiley face" height="30" width="65"></a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item active">
        <a class="nav-link" id="lab" href="kayitekle.php">KAYIT EKLE <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" id="lab" href="hastalar.php">HASTALAR <span class="sr-only">(current)</span></a>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a href="sekretercikis_yap.php"><button class="btn btn-danger my-2 my-sm-0" type="button">Çıkış Yap</button></a>
    </form>
  </div>
</nav>

<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<center><h4>HASTA KAYDI</h4></center>
			</div>
			<div class="card-body">
				<form class="formm" action="hasta_kaydet.php" method="post" enctype='multipart/form-data'>
				

				<input type="file" class="btn" name ="fotograf" style="width:60%;">

				
				  <div class="form-row">
					<div class="col-md-12 mb-1">
					  <input type="text" name="Ad_Soyad" class="form-control" id="inputEmail4" placeholder="Ad Soyad" required>
					</div>
				  </div>
				  
				  <div class="form-row">
					<div class="col-md-12 mb-1">
					  <input type="text" name="TC_No" class="form-control" id="inputEmail4" placeholder="TC" >
					</div>
				  </div>
				  
				  <div class="form-row">
					<div class="col-md-12 mb-1">
					  <input type="text" name="Dogum_Yeri" class="form-control" id="inputEmail4" placeholder="Doğum Yeri">
					</div>
				  </div>

				  <div class="form-row">
					<div class="col-md-12 mb-1">
					  <input type="date" name="Dogum_Tarih" class="form-control" id="inputEmail4" placeholder="Doğum Tarihi">
					</div>
				  </div>
				  
				  <div class="form-row">
					  <div class="col-md-12 mb-1">
						<select id="inputState" name="Kan_grubu" class="form-control">
							<option value="">Kan Grubu</option>
							<option>0 Rh (+)</option>
							<option>0 Rh (-)</option>
							<option>AB Rh (+)</option>
							<option>AB Rh (-)</option>
							<option>A Rh (+)</option>
							<option>A Rh (-)</option>
							<option>B Rh (+)</option>
							<option>B Rh (-)</option>
						</select>
					  </div>	
				  </div>
				  
				  <div class="form-row">
					  <div class="col-md-12 mb-1">
						<select id="inputState" name="Medeni_Hal" class="form-control" >
							<option value="">Medeni Hal</option>
							<option>Evli</option>
							<option>Bekar</option>
							<option>Boşanmış</option>
						</select>
					  </div>	
				  </div>
				  
				  <div class="form-row">
					  <div class="col-md-12 mb-1">
						<select id="inputState" name="Cinsiyet" class="form-control" >
							<option value="">Cinsiyet</option>
							<option>Kadın</option>
							<option>Erkek</option>
						</select>
					  </div>	
				  </div>
				 
				  <div class="form-row">
					<div class="col-md-12 mb-1">
					  <input type="text" class="form-control" name="il" id="inputEmail4" placeholder="İl" >
					</div>
				  </div>
				  
				  <div class="form-row">
					<div class="col-md-12 mb-1">
					  <input type="text" class="form-control" name="ilce" id="inputEmail4" placeholder="İlçe" >
					</div>
				  </div>
				  
				  <div class="form-row">
					<div class="col-md-12 mb-1">
					  <input type="text" class="form-control" name="Telefon_No" id="inputEmail4" placeholder="Telefon" >
					</div>
				  </div>

				  <div class="form-row">
					<div class="col-md-12 mb-1">
					  <input type="text" class="form-control" name="E_posta" id="inputEmail4" placeholder="E-Posta">
					</div>
				  </div>
				  
				  

					  <center><input type="submit" value="Kaydet" class="btn btn-info"></input></center>


				</form>

			</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
