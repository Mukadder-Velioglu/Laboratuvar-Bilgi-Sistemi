<?php
require 'Medoo.php';
/////////////

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);


 
///////
use Medoo\Medoo;
 
$database = new Medoo([
	'database_type' => 'mysql',
	'database_name' => 'laboratuvar',
	'server' => 'localhost',
	'username' => 'root',
	'password' => '',
	'charset' => 'utf8mb4',
	'collation' => 'utf8mb4_general_ci',
	'port' => 3306
]);
$ad_soyad="";
$mai12="";
$sifre1="";
$sifre2="";
$gorev="";

/////////////////////////////////////////////////////////////
if ("" != trim($_POST["ad_soyad"]) && "" != trim($_POST["mail"]) && "" != trim($_POST["sifre1"]) && "" != trim($_POST["sifre2"]) && "" != trim($_POST["gorev"])){
	$ad_soyad=$_POST["ad_soyad"];
	$mai12=$_POST["mail"];
	$sifre1=$_POST["sifre1"];
	$sifre2=$_POST["sifre2"];
	$gorev=$_POST["gorev"];
	if($sifre1!=$sifre2){
		header("location:kullanici.php?uyari=hata2");
		
	}else{
		function kod_uret($eposta){
			$metin=date("Ymd h:i:sa").'Bugün yaşayan çiçek yarın ölüyor olabilir.'.$eposta;
			return hash('ripemd160',$metin);
}
		$key=kod_uret($_POST["mail"]);
		$posta=$database->insert("kullanicilar", [
			"ad_soyad" => $ad_soyad,
			"eposta" => $mai12,
			"sifre" => $sifre1,
			"gorev" => $gorev,
			"aktivasyon"=>$key]);
	}
	
$sonuc=$database->id();
if($sonuc>0){
			try {
    
    $mail->SMTPDebug = false;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'mail.mukadderyilmaz.name.tr';                    
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'iletisim@mukadderyilmaz.name.tr';                     
    $mail->Password   = '$I5OFn+H96';                               
    $mail->SMTPSecure = 'ssl';         
    $mail->Port       = 465;                                    

   
    $mail->setFrom('iletisim@mukadderyilmaz.name.tr', 'Aktif');
    $mail->addAddress($mai12);     
   
    $mail->isHTML(true);                                  
    $mail->Subject = 'Aktif';
    $mail->Body    = '<a href="http://localhost/deneme/aktif.php?eposta='.$_POST["mail"].'&key='.$key.'">AKTİF ET</a>';
    $mail->AltBody = '';

    $mail->send();
    echo 'Mesaj gönderildi';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}			
		
		
}
else{
	header("location:kullanici.php?uyari=hata1");
	exit();
}

/////////////////////////////////////////////////////////////





?>