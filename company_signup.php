<?php
  session_start();
 if(isset($_POST['submit'])){
include('connection/db.php');
$name=$_POST['name'];
$email=$_POST['email'];
$p1=$_POST['psw'];
$p2=$_POST['psw-repeat'];
if($p1!=$p2){
  echo "Password doesn't match!!!";
}else{
  $password=md5($p1);
$sql="INSERT INTO company (company_name,company_email,company_password) VALUES ('$name','$email','$password')";
 $query=mysqli_query($conn,$sql);
 if($query){
      $_SESSION['email'] = $email;
      header('location:company_dashboard.php');
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
    <h1>Company Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="username"><b>Name</b></label>
    <input type="text" placeholder="Enter Company name" name="name" required>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
  
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
