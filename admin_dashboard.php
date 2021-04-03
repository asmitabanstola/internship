<?php
session_start();
if(isset($_SESSION['email'])){

}else{
  header('location:admin_login.php');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard For Admin</title>

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
                <a class="nav-link" href="#">
                  <span class="fa fa-file"></span>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="company_fetch.php">
                  <span class="fa fa-users"></span>
                  Company
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="applicant_admin.php">
                  <span class="fa fa-users"></span>
                  Applicants
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
    <li class="breadcrumb-item">Admin<a href="#"></a></li> 
      </ol>
        </nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
           <!--  <button class="btn btn-primary">Add Applicant</button> -->
          </div>
          <section id="jobs">
            <div class="container">
          <h5>RECENT UPDATES</h5>
        <?php
        include('connection/db.php');
        $query=mysqli_query($conn,"select v.vacancy_id, v.title, v.job_description, v.salary, location, created_date, due_date, c.company_name  from vacancy v left join company c on v.company_id = c.company_id");
        while($row=mysqli_fetch_array($query)){
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
        <div class="button1">
        <a href="delete.php?delete=<?php echo $row['vacancy_id'];?>" onclick=" return confirm('Are you sure you want to delete this record?')"><button class="btn btn-primary">DELETE</button></a>
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