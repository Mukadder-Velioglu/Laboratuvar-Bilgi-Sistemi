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
			
					$foto= ("yuklenenler/".$dosya.".".$fileType);
					$database->update("kullanici_kaydi", ["fotograf" =>$foto],["Protokol_No" => $_SESSION["Protokol_No"]]);
					header("Location:hastalar.php");
					exit();
				





			}else{
				header("Location:hastalar.php");
				exit();
			}



        }



    

?>
