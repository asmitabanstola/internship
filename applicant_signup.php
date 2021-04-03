<?php
  session_start();
 if(isset($_POST['submit'])){
include('connection/db.php');
$username=$_POST['username'];
$email=$_POST['email'];
$p1=$_POST['psw'];
$p2=$_POST['psw-repeat'];
$name=$_POST['name'];
  $address=$_POST['address'];
  $phone=$_POST['phone'];
  $cv=$_POST['file'];
if($p1!=$p2){
  echo "Password doesn't match!!!";
}else{
  $password=md5($p1);
$sql="INSERT INTO applicant (applicant_username,applicant_email,applicant_password,applicant_name,applicant_address,applicant_phone,applicant_cv) VALUES ('$username','$email','$password','$name','$address','$phone','$cv')";
 $query=mysqli_query($conn,$sql);
 if($query){
      $_SESSION['email'] = $email;
      header('location:applicant_dashboard.php');
    } else {
    echo "Errorrrrrr";
   }
}
}
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/signup.css">
<body>
  <div class="container-fluid">
<?php include_once('include/header.php'); ?>
<form method="post" style="border:1px solid #ccc">
  <div class="container">
    <h1>Applicant Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter username" name="username" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

    <label for="name"><b>Full Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required>

    <label for="address"><b>Address</b></label>
    <input type="text" placeholder="Enter Address" name="address" required>

    <label for="phone"><b>Phone</b></label>
    <input type="number" placeholder="Enter Phone" name="phone" required>
    <label for="cv"><b>Upload CV</b></label>
    <input type="file" placeholder="Upload CV" class="input-file" id ="filebutton" name="file" required>
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" onclick="window.location.href='index.php'" class="cancelbtn">Cancel</button>
      <button type="submit" name="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>
<?php include_once('include/footer.php'); ?>
</div>
</body>
</html>
