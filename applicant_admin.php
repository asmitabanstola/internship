<?php
session_start();
if($_SESSION['email']==true){

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
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

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
                <a class="nav-link" href="admin_dashboard.php">
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
                <a class="nav-link" href="#">
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
    <li class="breadcrumb-item"><a href="#">Applicants</a></li> 
      </ol>
        </nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Applicants</h1>
           <!--  <button class="btn btn-primary">Add Applicant</button> -->
          </div>
          <table border="1px" class="table">
            <thead>
  <tr>
    <th>SN</th>
    <th>Email</th>
    <th>Username</th>
    <th>Name</th>
    <th>Address</th>
    <th>Phone</th>
    <th>CV</th>
     <th>Action</th>
  </tr>
</thead>
<tbody>
  <?php
include('connection/db.php');
$query=mysqli_query($conn,"select * from applicant");
while($row=mysqli_fetch_array($query)){
  ?>
<tr>
  <td><?php echo $row['applicant_id']?></td>
  <td><?php echo $row['applicant_email']?></td>
  <td><?php echo $row['applicant_username']?></td>
  <td><?php echo $row['applicant_name']?></td>
  <td><?php echo $row['applicant_address']?></td>
  <td><?php echo $row['applicant_phone']?></td>
  <td><?php echo $row['applicant_cv']?></td>
  <td><a href="#"><button class="btn btn-primary">ACCEPT</button></a>  <a href="applicant_delete.php?delete=<?php echo $row['applicant_id'];?>" onclick=" return confirm('Are you sure you want to delete this record?')"><button class="btn btn-primary">DELETE</button></a></td>
</tr>
<?php } ?>
</tbody>
</table>
          <canvas class="my-4" id="myChart" width="900" height="380"></canvas>
        </main>
      </div>
    </div>
  </body>
</html>