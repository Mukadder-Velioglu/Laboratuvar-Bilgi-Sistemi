<?php  
require 'medoo.php';

use Medoo\Medoo;

$database = new Medoo([

	'database_type' => 'mysql',
	'database_name' => 'web',
	'server' => 'localhost',
	'username' => 'root',
	'password' => '',
	
]);

session_start();

$eposta="";
$sifre="";

if(isset($_POST['eposta']) and isset($_POST['sifre'])){
	$eposta=$_POST['eposta'];
	$sifre=$_POST['sifre'];

	$kullanici=$database->get("kullanicilar","*",["AND"=>["eposta"=>$eposta,"sifre"=>$sifre]]);

	if($kullanici["id"]>0){
		$_SESSION['id']=$kullanici["id"];
		header("Location:admin.php");
	}else{
		header("Location:login.php?mesaj=hata2");
	}
}else{
	header("Location:login.php?mesaj=hata1");
}