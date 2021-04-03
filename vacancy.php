<?php
  session_start();
  $id = 0;
  if($_SESSION['email']==true){
     if (isset($_POST['submit'])){
        include('connection/db.php');
        $email = $_SESSION['email'];
    $query=mysqli_query($conn,"select company_id from company where company_email='$email'");
    $row=mysqli_fetch_array($query);
    if($row) {
      $id = $row['company_id'];
    }
        $title=$_POST['job_title'];
        $description=$_POST['job_desc'];
        $company_id=$_POST['company_id'];
        $salary=$_POST['salary'];
        $edate=$_POST['edate'];
         $location=$_POST['location'];
        $sql="INSERT INTO vacancy (title,job_description,salary,due_date,location, company_id) VALUES ('$title','$description','$salary','$edate','$location', $id)";
         $query=mysqli_query($conn,$sql);
         if($query){
        header('location:company_dashboard.php');
        } else {
        echo "Errorrrrrr";
   }
}
  }else{
  header('location:company_login.php');
  }
  
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard For Company</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
  <script src="js/bootstrap.min.js" ></script>
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome.css">
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Internship Hiring System</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="index.php">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="company_dashboard.php">
                  <span class="fa fa-file"></span>
                  Dashboard
                </a>
              </li>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="applicant_fetch.php">
                  <span class="fa fa-users"></span>
                  Applicants
                </a>
              </li>
             <li class="nav-item">
                <a class="nav-link" href="#">
                  <span class="fa fa-file"></span>
                  Add Vacancy
                </a>
              </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
           <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="#">Company</a></li> 
      </ol>
        </nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
           <!--  <button class="btn btn-primary">Add Applicant</button> -->
          </div>
          <div class="container">
            <div class="wrapper">
    <div class="section_add">
      <h3 class="post-job-title">POST JOB</h3>
      <hr>
    <form method="post" onsubmit="return validate()" name="form">
    Job title<br>
    <input type="text" name="job_title" id="post_txt" placeholder="e.g php developer"><br><br>
    Description<br>
    <textarea rows="7" cols="55" name="job_desc" > 
    </textarea><br><br>
    Salary<br>
    <input type="number" name="salary" placeholder="&dollar;">
    <span id="salary_error" style="font-weight: bold;color:red;"></span><br><br>
    Expired Date<br>
    <input type="date" name="edate" >
    <span id="date_error"style="font-weight: bold;color:red;"></span><br><br>
     Location<br>
    <input type="text" name="location" ><br><br>
    <button id="post_job" name="submit" class="btn btn-primary">Post Job</button>
    </div>
    </div>
    </form>
    </div>
         <canvas class="my-4" id="myChart" width="900" height="380"></canvas>
        </main>
      </div>
    </div>
    <script type="text/javascript" src="js/validate.js"></script>
  </body>
</html>
