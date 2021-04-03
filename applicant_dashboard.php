<?php
include('connection/db.php');
session_start();
$email = "";
$id = 0;
if(!isset($_SESSION['email'])){
  header('location:applicant_login.php');
} else {
$email = $_SESSION['email'];
$sql = "SELECT applicant_id from applicant where applicant_email = '$email'";
$res = mysqli_query($conn,$sql);
$user = mysqli_fetch_array($res);
              $id=$user['applicant_id'];
}


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Dashboard For Applicant</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

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
                <a class="nav-link" href="applicant_dashboard.php">
                  <span class="fa fa-file"></span>
                  Vacancy
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="appliedjob_fetch.php">
                  <span class="fa fa-file"></span>
                  Applied Job
                </a>
              </li>
            </ul>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
           <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="#">Applicants</a></li> 
      </ol>
        </nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Job Vacancies</h1>
           <!--  <button class="btn btn-primary">Add Applicant</button> -->
          </div>
          <section id="jobs">
            <div class="container">
        <?php
        
        $query=mysqli_query($conn,"select v.vacancy_id, v.title, v.job_description, v.salary, location, created_date, due_date, c.company_name, av.vacancy_id as vac_id, av.applicant_id as app_id from vacancy v left join company c on v.company_id = c.company_id left join applicant_vacancy av on v.vacancy_id = av.vacancy_id");
        if($query)
        while($row=mysqli_fetch_array($query)){
          if($row['vac_id'] == $row['vacancy_id']) {
            if($row['app_id'] == $id) {
              continue;
            }
          }
          ?>
           <div class="job-update">
            <div class="comapany-details">
        <h3><b><?php echo $row['title']?></b></h3> 
         <h5><?php echo $row['company_name']?></h5>
         <span><?php echo $row['job_description']?></span><br/>
        <i class="fa fa-inr"></i><span><?php echo $row['salary']?></span><br/>
        <i class="fa fa-calendar"></i><span>Created-date:<?php echo $row['created_date']?></span><br/>
        <i class="fa fa-calendar"></i><span>Expire-date:<?php echo $row['due_date']?></span><br/>
        <i class="fa fa-map-marker"></i><span><?php echo $row['location']?></span><br/><br/>
        <div class="button">
           <a href="apply.php?id=<?php echo $row['vacancy_id'];?>" name="apply" type="apply" id="apply"><button class="btn btn-primary">Apply</button></a>
        </div>
         </div>
          </div>
          <hr/>
        <?php } ?>
      </div>    
        </section>
        </main>
      </div>
    </div>
  </body>
</html>