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
if (!isset($_SESSION['id'])) {
	header("Location:doktor.php?mesaj=hata1");
}

?>

<!doctype html>
<html lang="tr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Sonuç Listele</title>
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
height: 850px;
margin-top: auto;
margin-bottom: auto;
width: 1349px;
background-color: rgba(245,245,245) !important;
}

.card-header h4{
color: #708090;
margin-top:10px;
font-weight: bold;
}



.btn{
	margin-top:10px;
}

.baslik{
	color:white;
	text-align:center;

}

.div{
	background-color:grey;
	margin:auto;
	margin-top:-20px;
}

.div1{
	background-color:grey;
	margin:auto;
	margin-top:5px;
}


#btn1{
	margin-top:0px;
	margin-left:-15px;
	height:32px;
}

.div2{
	background-color:grey;

}

.my-custom-scrollbar {
	position: relative;
	height: 610px;
	overflow: auto;
}
.table-wrapper-scroll-y {
	display: block;
}

#kriter{
	margin:auto;
	margin-top:10px;
}


#input{
	height:32px;
}


#sekme{
	float:right;
	margin-top:-20px;
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
<a class="nav-link active" href="doktorekran.php"><img id="logo" src="logo4.png" alt="Smiley face" height="57" width="57"><img id="logo1" src="logoo.png" alt="Smiley face" height="30" width="65"></a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item active">
        <a class="nav-link" id="lab" href="testisteme1.php">TEST İSTEME <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" id="lab" href="sonuc_listeleme.php">TEST SONUCU LİSTELE <span class="sr-only">(current)</span></a>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a href="doktorcikis_yap.php"><button class="btn btn-danger my-2 my-sm-0" type="button">Çıkış Yap</button></a>
    </form>
  </div>
</nav>

<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<center><h5>TEST SONUÇLARI LİSTELEME</h5></center>
			</div>
			<div class="card-body">
				<div class="div">
				  <h6 class="baslik">LABORATUVAR GÖREVLİ BİLGİLERİ</h6>
				</div>
			<form action="sonuc_listeleme.php" method="POST">	

				<?php
					$Barkod_No=0;


					if(isset($_POST['Barkod_No'])){
						$Barkod_No=$_POST['Barkod_No'];

				
					}
					
					
					$sonuc_cek=$database->get("test_sonuc","*",["Barkod_No"=>$Barkod_No]);	


					
				?>
				
				  <div class="form-row">
					<div class="col-sm-4 ">
					  <div id="input"  type="text" class="form-control"><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Lab_uzman"];}?></div>
					</div>
					
					
					<div class="col-sm-4 ">
					  <div  id="input"  type="text" class="form-control"><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Alan"];}?></div>
					</div>
					
					
					<div class="col-sm-4 ">
					  <div  id="input"  type="text" class="form-control"><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Sonuc_tarih"];}?></div>
					</div>
					
				  </div>

				<div class="div1">
				  <h6 class="baslik">HASTA BİLGİLERİ</h6>
				</div>
				
				
				<div class="form-row" id="yer">
					<div class="input-group col-sm-3">
					  <input id="input"  type="text" name="Barkod_No" class="form-control" placeholder="Barkod No">
					  <div id="input"  class="input-group col-sm-3">
						<button id="btn1" class="btn btn-info" type="submit">Ara</button> 
					  </div>
					</div>
					
					
				<?php
					$Barkod_No=0;


					if(isset($_POST['Barkod_No'])){
						$Barkod_No=$_POST['Barkod_No'];

				
					}
					
					
					$sonuc_cek=$database->get("test_sonuc","*",["Barkod_No"=>$Barkod_No]);	
					$sonuc_cek1=$database->get("tetkik","*",["Barkod_No"=>$Barkod_No]);	


					
				?>
				

				</div>
				
					<div class="div1">
					  <h6 class="baslik">TEST BİLGİLERİ</h6>
					</div>
				
					<div class="table-wrapper-scroll-y my-custom-scrollbar">

					  <table class="table table-bordered table-striped mb-0">
						<thead>
						  <tr>
							<th>Test Adı</th>
							<th>Birim</th>
							<th>H/L</th>
							<th>Sonuç</th>
						  </tr>
						</thead>
						<tbody>
						  <tr>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek1["Test_Adi1"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Birim1"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["H_L1"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Sonuc1"];}?></td>
						  </tr>
						  <tr>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek1["Test_Adi2"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Birim2"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["H_L2"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Sonuc2"];}?></td>
						  </tr>
						  <tr>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek1["Test_Adi3"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Birim3"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["H_L3"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Sonuc3"];}?></td>
						  </tr>
						  <tr>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek1["Test_Adi4"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Birim4"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["H_L4"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Sonuc4"];}?></td>
						  </tr>
						  <tr>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek1["Test_Adi5"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Birim5"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["H_L5"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Sonuc5"];}?></td>
						  </tr>
						  <tr>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek1["Test_Adi1"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Birim1"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["H_L1"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Sonuc1"];}?></td>
						  </tr>
						  <tr>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek1["Test_Adi6"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Birim6"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["H_L6"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Sonuc6"];}?></td>
						  </tr>
						  <tr>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek1["Test_Adi7"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Birim7"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["H_L7"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Sonuc7"];}?></td>
						  </tr>
						  <tr>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek1["Test_Adi8"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Birim8"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["H_L8"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Sonuc8"];}?></td>
						  </tr>
						  <tr>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek1["Test_Adi9"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Birim9"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["H_L9"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Sonuc9"];}?></td>
						  </tr>
						  <tr>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek1["Test_Adi10"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Birim10"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["H_L10"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Sonuc10"];}?></td>
						  </tr>	

						  <tr>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek1["Test_Adi11"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Birim11"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["H_L11"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Sonuc11"];}?></td>
						  </tr>

						  <tr>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek1["Test_Adi12"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Birim12"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["H_L12"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Sonuc12"];}?></td>
						  </tr>

						  <tr>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek1["Test_Adi13"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Birim13"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["H_L13"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Sonuc13"];}?></td>
						  </tr>

						  <tr>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek1["Test_Adi14"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Birim14"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["H_L14"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Sonuc14"];}?></td>
						  </tr>

						  <tr>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek1["Test_Adi15"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Birim15"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["H_L15"];}?></td>
							<td><?php if(isset($_POST['Barkod_No'])){echo $sonuc_cek["Sonuc15"];}?></td>
						  </tr>

						  
						</tbody>
					  </table>
					</div>
												
				</form>

			</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
