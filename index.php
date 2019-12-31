<?php
include "controller/controller.php";
$main = new controller();
if(isset($_POST['id'])){
	$id = $_POST['id'];
	$promottoken = $_SESSION['promottoken'];
	$main->buy($id,$promottoken);
	unset($id);
	include("view/beli_paket.php");
}


else if (isset($_POST['otp'])) {
	$otp = $_POST['otp'];
	$login = $main->login($_SESSION['nomor'],$otp);
	$_SESSION['promottoken'] = $login;
	include("view/beli_paket.php");
}


else if (isset($_POST['nomor'])){
	$_SESSION['nomor'] = $_POST['nomor'];
	$main->otp($_POST['nomor']);
	include("view/login.php");
}


else{
	include("view/ambil_otp.php");
}
?>