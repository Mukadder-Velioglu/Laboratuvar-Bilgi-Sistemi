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
$TC_No="";
$Ad_Soyad="";
$Dogum_Yeri="";
$Dogum_Tarih="";
$Kan_grubu="";
$Medeni_Hal="";
$Cinsiyet="";
$il="";
$ilce="";
$Telefon_No="";
$E_posta="";


if(isset($_POST['TC_No']) && isset($_POST['Ad_Soyad']) && isset($_POST['Dogum_Yeri']) && isset($_POST['Dogum_Tarih']) && isset($_POST['Kan_grubu']) && isset($_POST['Medeni_Hal']) && isset($_POST['Cinsiyet']) && isset($_POST['il']) && isset($_POST['ilce']) && isset($_POST['Telefon_No']) && isset($_POST['E_posta'])){
	$TC_No=$_POST['TC_No'];
	$Ad_Soyad=$_POST['Ad_Soyad'];
	$Dogum_Yeri=$_POST['Dogum_Yeri'];
	$Dogum_Tarih=$_POST['Dogum_Tarih'];
	$Kan_grubu=$_POST['Kan_grubu'];
	$Medeni_Hal=$_POST['Medeni_Hal'];
	$Cinsiyet=$_POST['Cinsiyet'];
	$il=$_POST['il'];
	$ilce=$_POST['ilce'];
	$Telefon_No=$_POST['Telefon_No'];
	$E_posta=$_POST['E_posta'];
	
	
}else{
	header("Location:index.php");
}


$database->update("kullanici_kaydi", ["TC_No" => $TC_No,"Ad_Soyad" => $Ad_Soyad,"E_posta"=>$E_posta,"Dogum_Yeri"=>$Dogum_Yeri,"Dogum_Tarih"=>$Dogum_Tarih,"Kan_grubu"=>$Kan_grubu,"Medeni_Hal"=>$Medeni_Hal,"Cinsiyet"=>$Cinsiyet,"il" =>$il,"ilce" =>$ilce,"Telefon_No" =>$Telefon_No,"E_posta" =>$E_posta],["Protokol_No" => $_SESSION["Protokol_No"]]);
header("Location:hastalar.php");

?>









