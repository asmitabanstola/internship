<html>
<body>
	<div class="container-fluid"> 
<?php include_once('include/header.php'); ?>
<?php include_once('include/banner.php'); ?>
	<!----Recent Jobs----->
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
        <div class="button">
        <a href="applicant_login.php"><button class="btn btn-primary">Apply</button></a>
        </div>
         </div>
          </div>
          <hr/>
        <?php } ?>
      </div>    
        </section>
	<?php include_once('include/footer.php'); ?>
</div>
</body>
</html>


