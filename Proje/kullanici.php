<!doctype html>
<html lang="tr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Kaydol</title>
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
height:460px;
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
	margin-top:20px;

}

#kaydet{
	width:150px;
}
</style>
<body>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
<nav class="navbar navbar-expand-lg navbar-white bg-white" id="nav">
<a class="nav-link active" href="index.php"><img id="logo" src="logo4.png" alt="Smiley face" height="57" width="57"><img id="logo" src="logoo.png" alt="Smiley face" height="30" width="65"></a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
	  <li class="nav-item active">
        <a class="nav-link" href="#"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;
		<span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" id="lab" href="laboratuvar.php">LABORATUVAR <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" id="lab" href="sekreter.php">SEKRETER <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" id="lab" href="doktor.php">DOKTOR <span class="sr-only">(current)</span></a>
      </li>
    </ul>

  </div>
</nav>

<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<center><h4>KAYDOL</h4></center>
			</div>
			<div class="card-body">
				<form class="formm" action="kullanici_isle.php" method="post">
				  <div class="form-row">
					<div class="col-md-12 mb-1">
					  <input type="text" name="ad_soyad" class="form-control" id="inputEmail4" placeholder="Ad Soyad" required>
					</div>
				  </div>
				  
				  <div class="form-row">
					<div class="col-md-12 mb-1">
					  <input type="text" name="mail" class="form-control" id="inputEmail4" placeholder="Eposta" >
					</div>
				  </div>
				  
				  <div class="form-row">
					  <div class="col-md-12 mb-1">
						<select id="inputState" name="gorev" class="form-control">
							<option value="">Görev</option>
							<option>Doktor</option>
							<option>Laboratuvar</option>
							<option>Sekreter</option>
						</select>
					  </div>	
				  </div>

				  
				  <div class="form-row">
					<div class="col-md-12 mb-1">
					  <input type="password" name="sifre1" class="form-control" id="inputEmail4" placeholder="Şifre">
					</div>
				  </div>

				  <div class="form-row">
					<div class="col-md-12 mb-1">
					  <input type="password" name="sifre2" class="form-control" id="inputEmail4" placeholder="Şifre Tekrar">
					</div>
				  </div>
				  

				<?php
					if(isset($_GET["uyari"])){
					switch($_GET["uyari"]){
						case "hata2":
							echo '<div class="alert alert-warning" role="alert">';
							echo "Şifreler aynı değil.</div>";
							
							break;
						case "hata1":
							echo '<div class="alert alert-warning" role="alert">';
							echo "Lütfen eksiksiz doldurunuz!</div>";
							break;
						default: echo "";
						}
					}
				?>
				  <br>
				  <div class="form-group row">
					<div class="col-md-12">
					  <center><button type="submit" class="btn btn-info" id="kaydet">Kaydet</button></center>
					</div>
				  </div>
				  <br>
				<center><a id="uye" href="3giris.php" >Giriş Yap</a><center>
				</form>
			</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
