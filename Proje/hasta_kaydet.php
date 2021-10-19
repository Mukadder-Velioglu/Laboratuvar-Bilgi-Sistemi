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
	// [optional]
	'charset' => 'utf8',
	'collation' => 'utf8_turkish_ci',
	'port' => 3306

]);
session_start();
$target_dir = "yuklenenler/";
$dosya=crc32(date('Y-m-d H:i:s'));
$fileType = strtolower(pathinfo(basename($_FILES["fotograf"]["name"]),PATHINFO_EXTENSION));
$target_file = $target_dir.$dosya.".".$fileType;
$uploadOk = 1;
// Aynı dosya var mı
if (file_exists($target_file)) {
    echo "Dosya zaten var!";
    $uploadOk = 0;
}
// dosya boyutunu öğrenme
if ($_FILES["fotograf"]["size"] > 50000000) {
    echo "Dosyanız çok büyük.";
    $uploadOk = 0;
}
// Allow certain file formats
if($fileType != "jpg"  && $fileType != "jpeg" && $fileType != "gif"  && $fileType !="png") {
    echo "Sadece JPG, JPEG, PNG & GIF dosyalarına izin verilmektedir.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Dosya yüklenemedi.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fotograf"]["tmp_name"], $target_file)) {
			if (isset($_POST["TC_No"]) and isset($_POST["Ad_Soyad"]) and isset($_POST["Dogum_Tarih"]) and isset($_POST["Dogum_Yeri"]) and isset($_POST["Cinsiyet"]) and isset($_POST["Medeni_Hal"]) and isset($_POST["il"]) and isset($_POST["ilce"]) and isset($_POST["Telefon_No"]) and isset($_POST["E_posta"]) and isset($_POST["Kan_grubu"])){

				$TC_No=$_POST["TC_No"];
				$Ad_Soyad=$_POST["Ad_Soyad"];
				$Dogum_Tarih=$_POST["Dogum_Tarih"];
				$Dogum_Yeri=$_POST["Dogum_Yeri"];
				$Cinsiyet=$_POST["Cinsiyet"];
				$Medeni_Hal=$_POST["Medeni_Hal"];
				$il=$_POST["il"];
				$ilce=$_POST["ilce"];
				$Telefon_No=$_POST["Telefon_No"];
				$E_posta=$_POST["E_posta"];
				$Kan_grubu=$_POST["Kan_grubu"];


				if (empty($Ad_Soyad) or empty($TC_No) or empty($Dogum_Tarih) or empty($Dogum_Yeri) or empty($Cinsiyet) or empty($Medeni_Hal) or empty($il) or empty($ilce) or empty($Telefon_No)or empty($E_posta)or empty($Kan_grubu)){
					header("Location:kayitekle.php");
					exit();
				}else{
					$foto= ("yuklenenler/".$dosya.".".$fileType);
					$database ->insert("kullanici_kaydi",[
						"TC_No"=> $TC_No,
						"Ad_Soyad"=>$Ad_Soyad,
						"Dogum_Tarih"=>$Dogum_Tarih,
						"Dogum_Yeri"=>$Dogum_Yeri,
						"Cinsiyet"=>$Cinsiyet,
						"Medeni_Hal"=>$Medeni_Hal,
						"il"=>$il,
						"ilce"=>$ilce,
						"Telefon_No"=>$Telefon_No,
						"E_posta"=>$E_posta,
						"Kan_grubu"=>$Kan_grubu,
						"fotograf"=>$foto


					]);
					header("Location:hastalar.php");
					exit();
				}





			}else{
				header("Location:hastalar.php");
				exit();
			}



        }



    }

?>
