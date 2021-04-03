<?php
  session_start();
  $email = "";
  if(!isset($_SESSION['email'])){
header('location:company_login.php');
  } else {
    $email = $_SESSION['email'];
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome.css">
    <title>Dashboard For Applicant</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css" >
  <script src="js/jquery-3.3.1.slim.min.js"></script>
  <script src="js/bootstrap.min.js" ></script>
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
                  Vacancies
                </a>
              </li>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span class="fa fa-users"></span>
                  Applied job
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
    <li class="breadcrumb-item"><a href="#">Applicant</a></li> 
      </ol>
        </nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Applied Job </h1>
           <!--  <button class="btn btn-primary">Add Applicant</button> -->
          </div>
             <table border="1px" class="table">
            <thead>
              <tr>
                <th>SN</th>
                <th>Job Title</th>
                <th>Company Name</th>
                <th>Salary</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $count = 0;
            include('connection/db.php');
            $sql = "SELECT applicant_id from applicant where applicant_email = '$email'";
            $res = mysqli_query($conn,$sql);
            $user = mysqli_fetch_array($res);
              $id=$user['applicant_id'];
            $query=mysqli_query($conn,"select v.title, c.company_name, salary from vacancy v left join applicant_vacancy av on v.vacancy_id = av.vacancy_id left join company c on v.company_id = c.company_id Where av.applicant_id=$id");
            if($query) {
            while($row=mysqli_fetch_assoc($query)){
              ?>
            <tr>
              <td><?php echo ++$count; ?></td>
              <td><?php echo $row['title']?></td>
              <td><?php echo $row['company_name']?></td>
              <td><?php echo $row['salary']?></td>
            </tr>
            <?php }
            } else {
              echo "<h2> No any applied Jobs </h2>";
            }  
                      ?>
            </tbody>
            </table>
        </main>
      </div>
    </div>
    </script>
    </script>
  </body>
</html>