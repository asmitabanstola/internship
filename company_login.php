<?php
session_start();
   include('connection/db.php');
  if(isset($_POST['submit'])){
   $email=  $_POST['email'];
   $pass = $_POST['password'];
   $pass=md5($pass);
   $sql = "select * from company where company_email='$email' and company_password='$pass'";
   //echo "$sql";
    $query=mysqli_query($conn,$sql);
    if($query){
    if(mysqli_num_rows($query)>0){
      $_SESSION['email'] = $email;
      header('location:company_dashboard.php');
    }else{
      echo "<script>alert('Email or Password is Incorrect,Please try again');</script>";
    }
   } else {
    echo "Errorrrrrr";
   }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Company login</title>
  <!--   <link href="css/login.css" rel="stylesheet"> -->
  </head>
  <body class="text-center">
    <div class="container-fluid">
      <?php include_once('include/header.php'); ?>
    <h1>Company Login</h1>
    <form method="post" id = "company_login" name = "company_login">
    <img src="img/logo.png" alt="logo" class="logo"><br><br>
    <label for="email"><b>Email</b></label><br>
    <input type="text" id = "email" placeholder="Enter Email" name="email" required>
    <br>
    <label for="password"><b>Password</b></label><br>
    <input type="password" id = "password" placeholder="Enter Password" name="password" required>
    <br>
    <input name = "submit" style=" background-color: #4CAF50;color: white;
     padding: 10px;margin: 8px 0;border: none;cursor: pointer;
  width: 5%;" id = "submit" type="submit" class = "btn"/><br>
</form>
<?php include_once('include/footer.php'); ?>
</div>
  </body>
  </html>
 