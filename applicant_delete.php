<?php
 include('connection/db.php');
 if(isset($_GET['delete'])){
$id=$_GET['delete'];
$query=mysqli_query($conn,"DELETE FROM applicant WHERE applicant_id=$id")or die(mysqli_error());
}
header('location:admin_dashboard.php');
?>