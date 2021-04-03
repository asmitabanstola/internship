<!DOCTYPE html>
<html>
<head>
	<title>IHS</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<script src="js/jquery-3.3.1.slim.min.js"></script>
	<script src="js/bootstrap.min.js" ></script>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome.css">
</head>
<body>
	<!--Header-->
	 
	<div class="navbar">
		<div class="navbar-header">
      <span class="navbar-brand" style="color:#fff;font-family:papyrus;">Internship Hiring System</span>
    </div>
    <ul class="nav">
  <li><a class="" href="index.php"><i class="fa fa-fw fa-home"></i> Home</a></li>
  <li><a class="" href="company.php"><i class="fa fa-fw "></i>Company</a></li>
  <li><a class="" href="about.php"><i class="fa fa-fw"></i>About Us</a></li>
 <li> <a href="contact.php"><i class="fa fa-fw fa-envelope"></i> Contact</a></li>
  <div class="dropdown">
    <button class="dropbtn">Login
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a class="dropdown-item" href="login.php">Admin</a>
      <a class="dropdown-item" href="applicant_login.php">Applicant</a>
      <a class="dropdown-item" href="company_login.php">Company</a>
    </div>
  </div>
   <div class="dropdown">
    <button class="dropbtn">Sign up
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a class="dropdown-item"  href="applicant_signup.php">Applicant</a>
      <a class="dropdown-item" href="company_signup.php">Company</a>
    </div>
  </div>
  
</div>
<!--end of header-->
</body>
</html>