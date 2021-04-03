<?php
	include('connection/db.php');
	$vacancy_id=$_GET['id'];
	$sql="SELECT * FROM vacancy WHERE vacancy_id= $vacancy_id";
	$query=mysqli_query($conn,$sql);
  if (!$query) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
	$data=mysqli_fetch_assoc($query);
  if(isset($_POST['submit'])){
  $title=$_POST['job_title'];
  $description=$_POST['job_desc'];
  $salary=$_POST['salary'];
  $due_date=$_POST['edate'];
  $vacancy_id=$_GET['id'];
  $stat="UPDATE vacancy SET title='$title',job_description='$description',salary='$salary',due_date='$due_date' WHERE vacancy_id=$vacancy_id ";
  $result=mysqli_query($conn,$stat);
  if($result){
  header('location:company_dashboard.php');
}
}
?>
<!DOCTYPE html>
<html>
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
      <h3 class="post-job-title">Edit JOB</h3>
      <hr>
    <form method="post" name="form" onsubmit="return validate()">
    Job title<br>
    <input type="text" name="job_title" id="post_txt" value="<?php echo $data['title'];?>"><br><br>
    Description<br>
    <textarea rows="7" cols="55" name="job_desc">
    <?php echo $data['job_description'];?> 
    </textarea><br><br>
    Salary<br>
    <input type="number" name="salary" placeholder="&dollar;" value="<?php echo $data['salary'];?>">
    <span id="salary_error" style="font-weight: bold;color:red;"></span>
    <br><br>
    Expired Date<br>
    <input type="date" name="edate" value="<?php echo $data['due_date'];?>">
    <span id="date_error"style="font-weight: bold;color:red;"></span>
    <br><br>
     Location<br>
    <input type="text" name="location" value="<?php echo $data['location'];?>"><br><br>
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