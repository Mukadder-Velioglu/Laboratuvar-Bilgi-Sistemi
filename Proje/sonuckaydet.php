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


$Barkod_No="";
$Lab_uzman="";
$Alan="";
$Sonuc_tarih="";
$Sonuc1="";
$Sonuc2="";
$Sonuc3="";
$Sonuc4="";
$Sonuc5="";
$Sonuc6="";
$Sonuc7="";
$Sonuc8="";
$Sonuc9="";
$Sonuc10="";
$Sonuc11="";
$Sonuc12="";
$Sonuc13="";
$Sonuc14="";
$Sonuc15="";
$Birim1="";
$Birim2="";
$Birim3="";
$Birim4="";
$Birim5="";
$Birim6="";
$Birim7="";
$Birim8="";
$Birim9="";
$Birim10="";
$Birim11="";
$Birim12="";
$Birim13="";
$Birim14="";
$Birim15="";
$H_L1="";
$H_L2="";
$H_L3="";
$H_L4="";
$H_L5="";
$H_L6="";
$H_L7="";
$H_L8="";
$H_L9="";
$H_L10="";
$H_L11="";
$H_L12="";
$H_L13="";
$H_L14="";
$H_L15="";

if(isset($_POST['Lab_uzman'])&& isset($_POST['Sonuc_tarih']) && isset($_POST['Alan']) && isset($_POST['Barkod_No']) && isset($_POST['Sonuc1']) && isset($_POST['Sonuc2']) && isset($_POST['Sonuc3']) && isset($_POST['Sonuc4']) && isset($_POST['Sonuc5']) && isset($_POST['Sonuc6']) && isset($_POST['Sonuc7']) && isset($_POST['Sonuc8']) && isset($_POST['Sonuc9']) && isset($_POST['Sonuc10']) && isset($_POST['Sonuc11']) && isset($_POST['Sonuc12']) && isset($_POST['Sonuc13']) && isset($_POST['Sonuc14']) && isset($_POST['Sonuc15']) && isset($_POST['Birim1']) && isset($_POST['Birim2'])&& isset($_POST['Birim3'])&& isset($_POST['Birim4'])&& isset($_POST['Birim5'])&& isset($_POST['Birim6'])&& isset($_POST['Birim7'])&& isset($_POST['Birim8'])&& isset($_POST['Birim9'])&& isset($_POST['Birim10'])&& isset($_POST['Birim11'])&& isset($_POST['Birim12'])&& isset($_POST['Birim13'])&& isset($_POST['Birim14'])&& isset($_POST['Birim15']) && isset($_POST['H_L1'])&& isset($_POST['H_L2'])&& isset($_POST['H_L3'])&& isset($_POST['H_L4'])&& isset($_POST['H_L5'])&& isset($_POST['H_L6'])&& isset($_POST['H_L7'])&& isset($_POST['H_L8'])&& isset($_POST['H_L9'])&& isset($_POST['H_L10'])&& isset($_POST['H_L11'])&& isset($_POST['H_L12'])&& isset($_POST['H_L13'])&& isset($_POST['H_L14'])&& isset($_POST['H_L15'])){


	$Barkod_No=$_POST['Barkod_No'];
	$Lab_uzman=$_POST['Lab_uzman'];
	$Alan=$_POST['Alan'];
	$Sonuc_tarih=$_POST['Sonuc_tarih'];
	$Sonuc1=$_POST['Sonuc1'];
	$Sonuc2=$_POST['Sonuc2'];
	$Sonuc3=$_POST['Sonuc3'];
	$Sonuc4=$_POST['Sonuc4'];
	$Sonuc5=$_POST['Sonuc5'];
	$Sonuc6=$_POST['Sonuc6'];
	$Sonuc7=$_POST['Sonuc7'];
	$Sonuc8=$_POST['Sonuc8'];
	$Sonuc9=$_POST['Sonuc9'];
	$Sonuc10=$_POST['Sonuc10'];
	$Sonuc11=$_POST['Sonuc11'];
	$Sonuc12=$_POST['Sonuc12'];
	$Sonuc13=$_POST['Sonuc13'];
	$Sonuc14=$_POST['Sonuc14'];
	$Sonuc15=$_POST['Sonuc15'];
	$Birim1=$_POST['Birim1'];
	$Birim2=$_POST['Birim2'];
	$Birim3=$_POST['Birim3'];
	$Birim4=$_POST['Birim4'];
	$Birim5=$_POST['Birim5'];
	$Birim6=$_POST['Birim6'];
	$Birim7=$_POST['Birim7'];
	$Birim8=$_POST['Birim8'];
	$Birim9=$_POST['Birim9'];
	$Birim10=$_POST['Birim10'];
	$Birim11=$_POST['Birim11'];
	$Birim12=$_POST['Birim12'];
	$Birim13=$_POST['Birim13'];
	$Birim14=$_POST['Birim14'];
	$Birim15=$_POST['Birim15'];
	$H_L1=$_POST['H_L1'];
	$H_L2=$_POST['H_L2'];
	$H_L3=$_POST['H_L3'];
	$H_L4=$_POST['H_L4'];
	$H_L5=$_POST['H_L5'];
	$H_L6=$_POST['H_L6'];
	$H_L7=$_POST['H_L7'];
	$H_L8=$_POST['H_L8'];
	$H_L9=$_POST['H_L9'];
	$H_L10=$_POST['H_L10'];
	$H_L11=$_POST['H_L11'];
	$H_L12=$_POST['H_L12'];
	$H_L13=$_POST['H_L13'];
	$H_L14=$_POST['H_L14'];
	$H_L15=$_POST['H_L15'];

	
}else{
	header("Location:index.php");
}


$database->insert("test_sonuc", ["Lab_uzman" => $Lab_uzman,"Alan" => $Alan,"Barkod_No" => $Barkod_No,"Sonuc_tarih" => $Sonuc_tarih,"Sonuc1" => $Sonuc1,"Sonuc2"=>$Sonuc2,"Sonuc3"=>$Sonuc3,"Sonuc4"=>$Sonuc4,"Sonuc5"=>$Sonuc5,"Sonuc6"=>$Sonuc6,"Sonuc7"=>$Sonuc7,"Sonuc8" =>$Sonuc8,"Sonuc9" =>$Sonuc9,"Sonuc10" =>$Sonuc10,"Sonuc11"=>$Sonuc11,"Sonuc12" =>$Sonuc12,"Sonuc13" =>$Sonuc13,"Sonuc14" =>$Sonuc14,"Sonuc15" =>$Sonuc15,"Birim1" =>$Birim1,"Birim2" =>$Birim2,"Birim3" =>$Birim3,"Birim4" =>$Birim4,"Birim5" =>$Birim5,"Birim6" =>$Birim6,"Birim7" =>$Birim7,"Birim8" =>$Birim8,"Birim9" =>$Birim9,"Birim10" =>$Birim10,"Birim11" =>$Birim11,"Birim12" =>$Birim12,"Birim13" =>$Birim13,"Birim14" =>$Birim14,"Birim15" =>$Birim15,"H_L1" =>$H_L1,"H_L2" =>$H_L2,"H_L3" =>$H_L3,"H_L4" =>$H_L4,"H_L5" =>$H_L5,"H_L6" =>$H_L6,"H_L7" =>$H_L7,"H_L8" =>$H_L8,"H_L9" =>$H_L9,"H_L10" =>$H_L10,"H_L11" =>$H_L11,"H_L12" =>$H_L12,"H_L13" =>$H_L13,"H_L14" =>$H_L14,"H_L15" =>$H_L15]);

$sonuc_id = $database->id();
if($sonuc_id>0){
	header("Location:sonuc_girme.php");
}else{
	header("Location:index.php");
}

?>