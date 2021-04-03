<?php
	session_start();
 	include('connection/db.php');
 	if(isset($_GET['delete'])){
	$id=$_GET['delete'];
	$query=mysqli_query($conn,"DELETE FROM vacancy WHERE vacancy_id=$id")or die(mysqli_error());
	}
	header('location:company_dashboard.php');
?>