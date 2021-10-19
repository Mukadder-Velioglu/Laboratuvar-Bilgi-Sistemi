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
?>

<!doctype html>
<html lang="tr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>HASTALAR</title>
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
width: 100%;
align-content: center;
}

.card{
height: 850px;
width:1500px;
margin-top: auto;
margin-bottom: auto;
background-color: rgba(245,245,245) !important;
}

.card-header h4{
color: #708090;
width:1500px;
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
	height: 750px;
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

<div class="container-fluid">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<center><h5>HASTALAR</h5></center>
			</div>
			<div class="card-body">
				<div class="table-wrapper-scroll-y my-custom-scrollbar">
					  <table class="table table-bordered table-striped mb-0">
						<thead>
						  <tr>
							<th>Fotoğraf</th>
							<th>Protokol No</th>
							<th>TC No</th>
							<th>Ad Soyad</th>
							<th>Dogum Yeri</th>
							<th>Dogum Tarihi</th>
							<th>Kan Grubu</th>
							<th>Medeni Hal</th>
							<th>Cinsiyet</th>
							<th>İl</th>
							<th>İlçe</th>
							<th>Telefon</th>
							<th>E-posta</th>
							<th>İşlem</th>
						  </tr>
						</thead>
						<tbody>
						
						<?php
						$hastalar=$database->select("kullanici_kaydi","*");
						foreach($hastalar as $kullanici_kaydi){	

						?>

						  <tr>
							<td><img style="width:100px ;height:100px ;" src="<?php echo $kullanici_kaydi['fotograf']; ?>"></td>
							<td><?php echo $kullanici_kaydi["Protokol_No"]; ?></td>
							<td><?php echo $kullanici_kaydi["TC_No"]; ?></td>
							<td><?php echo $kullanici_kaydi["Ad_Soyad"]; ?></td>
							<td><?php echo $kullanici_kaydi["Dogum_Yeri"]; ?></td>
							<td><?php echo $kullanici_kaydi["Dogum_Tarih"]; ?></td>
							<td><?php echo $kullanici_kaydi["Medeni_Hal"]; ?></td>
							<td><?php echo $kullanici_kaydi["Kan_grubu"]; ?></td>
							<td><?php echo $kullanici_kaydi["Cinsiyet"]; ?></td>
							<td><?php echo $kullanici_kaydi["il"]; ?></td>
							<td><?php echo $kullanici_kaydi["ilce"]; ?></td>
							<td><?php echo $kullanici_kaydi["Telefon_No"]; ?></td>
							<td><?php echo $kullanici_kaydi["E_posta"]; ?></td>
		
							<td>
							<center><a class="btn btn-primary" href="guncelle.php?Protokol_No=<?php echo $kullanici_kaydi["Protokol_No"];?>" role="button">Güncelle</a>
							<a class="btn btn-primary" href="fotografdegistir.php?Protokol_No=<?php echo $kullanici_kaydi["Protokol_No"];?>" role="button">Fotoğraf Değiştir</a>
							<a onclick="return confirm('Kayıt Silinecek. Emin misiniz?')" class="btn btn-danger" href="sil.php?Protokol_No=<?php echo $kullanici_kaydi["Protokol_No"];?>" role="button">Sil</a></center>
							</td>
						  </tr>
							<?php
							}
							?>
						</tbody>
					  </table>
					 </div>
			</div>
		</div>
	</div>
</div>
</body>

</html>
