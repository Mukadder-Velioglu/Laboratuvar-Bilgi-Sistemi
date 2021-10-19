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
	header("Location:laboratuvar.php?mesaj=hata1");
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

    <title>Sonuç Gir</title>
  </head>
<style>

@import url('https://fonts.googleapis.com/css?family=Numans');

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
height:780px;
margin-top: auto;
margin-bottom: auto;
width: 1200px;
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

.baslik1{
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


.div3{
	background-color:grey;
	margin:auto;
	margin-top:5px;
	margin-left:15px;
	
}


.btn{
	margin-top:0px;
	margin-left:-15px;
}

.div2{
	background-color:grey;

}

.my-custom-scrollbar {
	position: relative;
	height: 510px;
	overflow: auto;
}
.table-wrapper-scroll-y {
	display: block;
}


#input{
	height:35px;
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

#giris{
	width:150px;
}

#baslik{
margin-top:250px;


}


#onayla{
	margin-top:10px;
}

#tableboyut{
	width:520px;
	margin-left:28px;


	}




</style>
<body>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
<nav class="navbar navbar-expand-lg navbar-white bg-white" id="nav">
<a class="nav-link active" href="laboratuvarekran.php"><img id="logo" src="logo4.png" alt="Smiley face" height="57" width="57"><img id="logo" src="logoo.png" alt="Smiley face" height="30" width="65"></a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item active">
        <a class="nav-link" id="lab" href="sonuc_girme.php">TEST SONUCU GİR<span class="sr-only">(current)</span></a>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a href="laboratuvarcikis_yap.php"><button class="btn btn-danger my-2 my-sm-0" type="button">Çıkış Yap</button></a>
    </form>
  </div>
</nav>

<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<center><h5>TEST SONUÇ GİRME</h5></center>
			</div>
			
		<form action="sonuc_girme.php" method="POST">	
			<div class="card-body">
				<?php
					$Barkod_No=0;
					if(isset($_POST['Barkod_No'])){
						$Barkod_No=$_POST['Barkod_No'];
	
				
					}
					$sonuc_gir=$database->get("tetkik","*",["Barkod_No"=>$Barkod_No]);	
	

					
				?>
				
				<div class="div">
				  <h6 class="baslik">DOKTOR BİLGİLERİ</h6>
				</div>
				
				
				  <div class="form-row">
					<div class="col-sm-4 ">
					  <div  id="input" type="text" class="form-control"><?php if(isset($_POST['Barkod_No'])){echo $sonuc_gir["Doktor"];}?></div>
					</div>

					<div class="col-sm-4 ">
					  <div id="input" type="text" class="form-control"><?php if(isset($_POST['Barkod_No'])){echo $sonuc_gir["Poliklinik"];}?></div>
					</div>
					
				  <div class="col-sm-4 ">
					  <div  id="input" type="text" class="form-control"><?php if(isset($_POST['Barkod_No'])){echo $sonuc_gir["istenen_tarih"];}?></div>
				  </div>

				  </div>
				<div class="div1">
				  <h6 class="baslik">HASTA BİLGİLERİ</h6>
				</div>
				
					
				<div class="form row" >
					<div class="input-group col-sm-3">
					  <input id="input" name="Barkod_No" type="text" class="form-control" placeholder="Barkod No">
					  <div class="input-group col-sm-3">
						<button id="input" class="btn btn-info" type="submit">Ara</button> 
					  </div>
					</div>
				
				
				<?php
					$Barkod_No=0;


					if(isset($_POST['Barkod_No'])){
						$Barkod_No=$_POST['Barkod_No'];

				
					}
					
					
					$sonuc_gir=$database->get("tetkik","*",["Barkod_No"=>$Barkod_No]);	


					
				?>
				
				
				

				
					<div class="col-sm-3 ">
						<div id="input" type="text" class="form-control" placeholder="TC"><?php if(isset($_POST['Barkod_No'])){echo $sonuc_gir["TC_No"];}?></div>
					</div>
						
				</div>


				
					<div class="div1">
					  <h6 class="baslik">TEST SONUÇ GİRME</h6>
					</div>
					
			<div class="form row">
				<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<div class="form row">
					<table id="tableboyut" class="table table-bordered table-striped mb-0">
						<thead>
						  <tr>
							<th>Test</th>
						  </tr>
						</thead>
						<tbody>
						  <tr>
							<td><div  id="input"><?php if(isset($_POST['Barkod_No'])){echo $sonuc_gir["Test_Adi1"];}?></div></td>
						  </tr>
						  <tr>
							<td><div  id="input"><?php if(isset($_POST['Barkod_No'])){echo $sonuc_gir["Test_Adi2"];} ?></div></td>
						  </tr>
						  <tr>
							<td><div  id="input"><?php if(isset($_POST['Barkod_No'])){echo $sonuc_gir["Test_Adi3"];} ?></div></td>
						  </tr>
						  <tr> 
							<td><div  id="input"><?php if(isset($_POST['Barkod_No'])){echo $sonuc_gir["Test_Adi4"];} ?></div></td>
						  </tr>
						  <tr>
							<td><div  id="input"><?php if(isset($_POST['Barkod_No'])){echo $sonuc_gir["Test_Adi5"];} ?></div></td>
						  </tr>
						  <tr>
							<td><div  id="input"><?php if(isset($_POST['Barkod_No'])){echo $sonuc_gir["Test_Adi6"];} ?></div></td>
						  </tr>
						  <tr>
							<td><div  id="input"><?php if(isset($_POST['Barkod_No'])){echo $sonuc_gir["Test_Adi7"];} ?></div></td>
						  </tr>
						  <tr>
							<td><div  id="input"><?php if(isset($_POST['Barkod_No'])){echo $sonuc_gir["Test_Adi8"];} ?></div></td>
						  </tr>
						  <tr>
							<td><div  id="input"><?php if(isset($_POST['Barkod_No'])){echo $sonuc_gir["Test_Adi9"];} ?></div></td>
						  </tr>
						  <tr>
							<td><div  id="input"><?php if(isset($_POST['Barkod_No'])){echo $sonuc_gir["Test_Adi10"];} ?></div></td>
						  </tr>	
						  <tr>
							<td><div  id="input"><?php if(isset($_POST['Barkod_No'])){echo $sonuc_gir["Test_Adi11"];} ?></div></td>
						  </tr>
						  <tr>
							<td><div  id="input"><?php if(isset($_POST['Barkod_No'])){echo $sonuc_gir["Test_Adi12"];} ?></div></td>
						  </tr>
						  <tr>
							<td><div  id="input"><?php if(isset($_POST['Barkod_No'])){echo $sonuc_gir["Test_Adi13"];} ?></div></td>
						  </tr>
						  <tr>
							<td><div  id="input"><?php if(isset($_POST['Barkod_No'])){echo $sonuc_gir["Test_Adi14"];} ?></div></td>
						  </tr>
						  <tr>
							<td><div  id="input"><?php if(isset($_POST['Barkod_No'])){echo $sonuc_gir["Test_Adi15"];} ?></div></td>
						  </tr>
					
						</tbody>
					  </table>
				
					</form>	
	
					<form action="sonuckaydet.php" method="POST">	
			
					
					<table id="tableboyut" class="table table-bordered table-striped mb-0">
						<thead>
						  <tr>
							<th>Birim</th>
							<th>H/L</th>
							<th>Sonuç</th>
						  </tr>
						</thead>
						<tbody>
						<tr>
						<td><select  name="Birim1"  class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option selected></option>
						<option>U/L</option>
						<option>g/dL</option>
						<option>mg/dL</option>
						<option>sn</option>
						<option>mm/saat</option>
						<option>mL</option>
						<option>ng/mL</option>
						<option>kU/L</option>
						<option>mg/L</option>
						<option>mU/mL</option>
						<option>U/mL</option>
					  </select></td>
						<td><select  name="H_L1"   class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option  selected></option>
						<option>H</option>
						<option>L</option>
					  </select></td>
						<td>
						<input id="input" type="text" name="Sonuc1" class="form-control" placeholder="Sonuc"></input>
						</td>
						</tr>

						<tr >
						<td><select  id="input" name="Birim2" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option   selected></option>
						<option>U/L</option>
						<option>g/dL</option>
						<option>mg/dL</option>
						<option>sn</option>
						<option>mm/saat</option>
						<option>mL</option>
						<option>ng/mL</option>
						<option>kU/L</option>
						<option>mg/L</option>
						<option>mU/mL</option>
						<option>U/mL</option>
					  </select></td>
						<td><select  id="input" name="H_L2" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option  selected></option>
						<option>H</option>
						<option>L</option>
					  </select</td>
						<td><input id="input" name="Sonuc2" type="text" class="form-control" placeholder="Sonuc"></input></td>
						 </tr>
						 
						<tr >
						<td><select  id="input" name="Birim3" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option selected></option>
						<option>U/L</option>
						<option>g/dL</option>
						<option>mg/dL</option>
						<option>sn</option>
						<option>mm/saat</option>
						<option>mL</option>
						<option>ng/mL</option>
						<option>kU/L</option>
						<option>mg/L</option>
						<option>mU/mL</option>
						<option>U/mL</option>
					  </select></td>
						<td><select  id="input" name="H_L3"  class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option  selected></option>
						<option>H</option>
						<option>L</option>
					  </select</td>
						<td><input id="input" name="Sonuc3" type="text" class="form-control" placeholder="Sonuc"></input></td>
						 </tr>
						 
						<tr >
						<td><select  id="input" name="Birim4" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option    selected></option>
						<option>U/L</option>
						<option>g/dL</option>
						<option>mg/dL</option>
						<option>sn</option>
						<option>mm/saat</option>
						<option>mL</option>
						<option>ng/mL</option>
						<option>kU/L</option>
						<option>mg/L</option>
						<option>mU/mL</option>
						<option>U/mL</option>
					  </select></td>
						<td><select  id="input" name="H_L4" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option  selected></option>
						<option>H</option>
						<option>L</option>
					  </select</td>
						<td><input id="input" name="Sonuc4" type="text" class="form-control" placeholder="Sonuc"></input></td>
						 </tr>
						 
						<tr >
						<td><select  id="input" name="Birim5"  class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option   selected></option>
						<option>U/L</option>
						<option>g/dL</option>
						<option>mg/dL</option>
						<option>sn</option>
						<option>mm/saat</option>
						<option>mL</option>
						<option>ng/mL</option>
						<option>kU/L</option>
						<option>mg/L</option>
						<option>mU/mL</option>
						<option>U/mL</option>
					  </select></td>
						<td><select  id="input" name="H_L5"  class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option   selected></option>
						<option>H</option>
						<option>L</option>
					  </select</td>
						<td><input id="input" name="Sonuc5" type="text" class="form-control" placeholder="Sonuc"></input></td>
						</tr>
				  
						<tr >
						<td><select  id="input" name="Birim6" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option  selected></option>
						<option>U/L</option>
						<option>g/dL</option>
						<option>mg/dL</option>
						<option>sn</option>
						<option>mm/saat</option>
						<option>mL</option>
						<option>ng/mL</option>
						<option>kU/L</option>
						<option>mg/L</option>
						<option>mU/mL</option>
						<option>U/mL</option>
					  </select></td>
						<td><select  id="input" name="H_L6" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option  selected></option>
						<option>H</option>
						<option>L</option>
					  </select</td>
						<td><input id="input" name="Sonuc6" type="text" class="form-control" placeholder="Sonuc"></input></td>
						</tr>
						
						<tr >
						<td><select  id="input" name="Birim7" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option  selected></option>
						<option>U/L</option>
						<option>g/dL</option>
						<option>mg/dL</option>
						<option>sn</option>
						<option>mm/saat</option>
						<option>mL</option>
						<option>ng/mL</option>
						<option>kU/L</option>
						<option>mg/L</option>
						<option>mU/mL</option>
						<option>U/mL</option>
					  </select></td>
						<td><select  id="input" name="H_L7" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option  selected></option>
						<option>H</option>
						<option>L</option>
					  </select</td>
						<td><input id="input" name="Sonuc7" type="text" class="form-control" placeholder="Sonuc"></input></td>
						</tr>

						<tr >
						<td><select  id="input" name="Birim8" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option  selected></option>
						<option>U/L</option>
						<option>g/dL</option>
						<option>mg/dL</option>
						<option>sn</option>
						<option>mm/saat</option>
						<option>mL</option>
						<option>ng/mL</option>
						<option>kU/L</option>
						<option>mg/L</option>
						<option>mU/mL</option>
						<option>U/mL</option>
					  </select></td>
						<td><select  id="input" name="H_L8" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option  selected></option>
						<option>H</option>
						<option>L</option>
					  </select</td>
						<td><input id="input" name="Sonuc8" type="text" class="form-control" placeholder="Sonuc"></input></td>
						</tr>
						
						<tr >
						<td><select  id="input" name="Birim9" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option  selected></option>
						<option>U/L</option>
						<option>g/dL</option>
						<option>mg/dL</option>
						<option>sn</option>
						<option>mm/saat</option>
						<option>mL</option>
						<option>ng/mL</option>
						<option>kU/L</option>
						<option>mg/L</option>
						<option>mU/mL</option>
						<option>U/mL</option>
					  </select></td>
						<td><select  id="input" name="H_L9" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option   selected></option>
						<option>H</option>
						<option>L</option>
					  </select</td>
						<td><input id="input" name="Sonuc9" type="text" class="form-control" placeholder="Sonuc"></input></td>
						</tr>
						
						<tr >
						<td><select  id="input" name="Birim10" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option  selected></option>
						<option>U/L</option>
						<option>g/dL</option>
						<option>mg/dL</option>
						<option>sn</option>
						<option>mm/saat</option>
						<option>mL</option>
						<option>ng/mL</option>
						<option>kU/L</option>
						<option>mg/L</option>
						<option>mU/mL</option>
						<option>U/mL</option>
					  </select></td>
						<td><select  id="input" name="H_L10"  class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option  selected></option>
						<option>H</option>
						<option>L</option>
					  </select</td>
						<td><input id="input" name="Sonuc10" type="text" class="form-control" placeholder="Sonuc"></input></td>
						</tr>
					
						<tr >
						<td><select  id="input" name="Birim11" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option  selected></option>
						<option>U/L</option>
						<option>g/dL</option>
						<option>mg/dL</option>
						<option>sn</option>
						<option>mm/saat</option>
						<option>mL</option>
						<option>ng/mL</option>
						<option>kU/L</option>
						<option>mg/L</option>
						<option>mU/mL</option>
						<option>U/mL</option>
					  </select></td>
						<td><select  id="input" name="H_L11"   class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option selected></option>
						<option>H</option>
						<option>L</option>
					  </select</td>
						<td><input id="input" name="Sonuc11" type="text" class="form-control" placeholder="Sonuc"></input></td>
						</tr>
						
						
						<tr>
						<td><select  id="input" name="Birim12"  class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option  selected></option>
						<option>U/L</option>
						<option>g/dL</option>
						<option>mg/dL</option>
						<option>sn</option>
						<option>mm/saat</option>
						<option>mL</option>
						<option>ng/mL</option>
						<option>kU/L</option>
						<option>mg/L</option>
						<option>mU/mL</option>
						<option>U/mL</option>
					  </select></td>
						<td><select  id="input" name="H_L12" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option selected></option>
						<option>H</option>
						<option>L</option>
					  </select</td>
						<td><input id="input" name="Sonuc12" type="text" class="form-control" placeholder="Sonuc"></input></td>
						</tr>
						
						
						<tr >
						<td><select  id="input" name="Birim13" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option  selected></option>
						<option>U/L</option>
						<option>g/dL</option>
						<option>mg/dL</option>
						<option>sn</option>
						<option>mm/saat</option>
						<option>mL</option>
						<option>ng/mL</option>
						<option>kU/L</option>
						<option>mg/L</option>
						<option>mU/mL</option>
						<option>U/mL</option>
					  </select></td>
						<td><select  id="input" name="H_L13"  class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option  selected></option>
						<option>H</option>
						<option>L</option>
					  </select</td>
						<td><input id="input" name="Sonuc13" type="text" class="form-control" placeholder="Sonuc"></input></td>
						</tr>
						
						<tr >
						<td><select  id="input" name="Birim14" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option  selected></option>
						<option>U/L</option>
						<option>g/dL</option>
						<option>mg/dL</option>
						<option>sn</option>
						<option>mm/saat</option>
						<option>mL</option>
						<option>ng/mL</option>
						<option>kU/L</option>
						<option>mg/L</option>
						<option>mU/mL</option>
						<option>U/mL</option>
					  </select></td>
						<td><select  id="input" name="H_L14" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option  selected></option>
						<option>H</option>
						<option>L</option>
					  </select</td>
						<td><input id="input" name="Sonuc14" type="text" class="form-control" placeholder="Sonuc"></input></td>
						</tr>
						
						<tr >
						<td><select  id="input" name="Birim15"  class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option  selected></option>
						<option>U/L</option>
						<option>g/dL</option>
						<option>mg/dL</option>
						<option>sn</option>
						<option>mm/saat</option>
						<option>mL</option>
						<option>ng/mL</option>
						<option>kU/L</option>
						<option>mg/L</option>
						<option>mU/mL</option>
						<option>U/mL</option>
					  </select></td>
						<td><select id="input" name="H_L15" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option  selected></option>
						<option>H</option>
						<option>L</option>
					  </select</td>
						<td><input id="input" name="Sonuc15" type="text" class="form-control" placeholder="Sonuc"></input></td>
						</tr>
				</tbody>
				</table>
				</div>
		
					<div class="div3">
					  <h6 class="baslik1">LABORATUVAR GÖREVLİSİ</h6>
					</div>			
					<div class="form-row">
						<div class="col-sm-3 ">
						  <input id="input" type="text" name="Lab_uzman" class="form-control" placeholder="Ad Soyad">
						</div>
						
					  
					  <div class="col-sm-3">
						  <input id="input" name="Alan" type="text" class="form-control" placeholder="Laboratuvar Alanı">
					  </div>
					  
					  <div class="col-sm-3">
						  <input id="input" name="Barkod_No" type="text" class="form-control" placeholder="Hasta Barkod No">
					  </div>
					  
					  
					  
					  <div class="col-sm-3">
						  <input id="input" name="Sonuc_tarih" type="date" class="form-control">
					  </div>
					  
					  
					</div>
		

				<br>
				  <div class="form-group row">
					<div class="col-md-12">
					  <center><button type="submit"  class="btn btn-info">Onayla</button></center>
					</div>
					</div>
				</form>
	
				
			</div>

			</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
