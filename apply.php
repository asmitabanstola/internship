<?php 
session_start();
include 'connection/db.php';
$email = '';
$vac_id = 0;
if(isset($_SESSION['email']) && isset($_GET['id'])) {
	$email = $_SESSION['email'];
	$vac_id = $_GET['id'];

} else {
	// echo "Errorr";
	header("location: applicant_login.php");
}
$sql = "SELECT applicant_id from applicant where applicant_email = '$email'";
$res = mysqli_query($conn,$sql);
$user = mysqli_fetch_array($res);
$app_id = $user['applicant_id'];

$sql = "INSERT INTO applicant_vacancy(applicant_id, vacancy_id) VALUES($app_id, $vac_id)";
$res = mysqli_query($conn,$sql);
if($res == 1) {
	header("location: appliedjob_fetch.php");
}



