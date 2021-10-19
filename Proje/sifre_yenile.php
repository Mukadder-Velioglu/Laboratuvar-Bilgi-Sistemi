<?php
require 'Medoo.php';

// Using Medoo namespace
use Medoo\Medoo;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

$database = new Medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => 'laboratuvar',
	'server' => 'localhost',
	'username' => 'root',
	'password' => '',

	// [optional]
	'charset' => 'utf8mb4',
	'collation' => 'utf8mb4_general_ci',
	'port' => 3306
]);
session_start();

$eposta="";
if(isset($_POST['eposta'])){
	$eposta=$_POST['eposta'];

if (!empty($eposta)){
	$kullanicilar=$database->get("kullanicilar","*",["AND"=>["eposta"=>$eposta,"aktif_mi" =>1]]);
	if($kullanicilar["id"]>0){

			try {
		    //Server settings
		    $mail->SMTPDebug = false;                      // Enable verbose debug output
		    $mail->isSMTP();                                            // Send using SMTP
		    $mail->Host       = 'mail.mukadderyilmaz.name.tr';                    // Set the SMTP server to send through
		    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		    $mail->Username   = 'iletisim@mukadderyilmaz.name.tr';                     // SMTP username
		    $mail->Password   = '$I5OFn+H96';                               // SMTP password
		    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
		    $mail->Port       = 465;                                    // TCP port to connect to

		    //Recipients
		    $mail->setFrom('iletisim@mukadderyilmaz.name.tr', 'Mukadder');
		    $mail->addAddress($eposta, 'YBS');     // Add a recipient
		    //$mail->addAddress('ellen@example.com');               // Name is optional
		    //$mail->addReplyTo('info@example.com', 'Information');
		    //$mail->addCC('cc@example.com');
		    //$mail->addBCC('bcc@example.com');

		    // Attachments
		    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		    // Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'Aktivasyon';
		    $mail->Body ="Şifreniz :".$kullanicilar["sifre"];

		    $mail->send();
		} catch (Exception $e) {
		    echo "Mesaj gönderilirken hata oluştu.";
		}
		header("Location:sifreyenile.php");

		}else{
				echo "Böyle Bir kayıt bulunamadı";
			}




	}else{
		header("Location:sifremi_unuttum.php");
}
}else{
	header("Location:sifremi_unuttum.php");
}



 ?>
