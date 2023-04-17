<!DOCTYPE html>
<html lang="en">
  <style>
h1 { 
  display: block;
  font-size: 2em;
  margin-top: 0.67em;
  margin-bottom: 0.67em;
  margin-left: 5.00em;
  margin-right: 50;
  font-weight: bold;
}
h2 { 
  font-size: 2em;
  margin-top: 0.67em;
  margin-bottom: 0.67em;
  margin-left: 0.70em;
  margin-right: 50;
}
h4 { 
  font-size: 2em;
  margin-top: 0.67em;
  margin-bottom: 0.67em;
  margin-left: 2.25em;
  margin-right: 50;
}

</style>	
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Jobs Portal</title>
    <?php 
    
    include('header_link.php'); 
    include('dbconnect.php'); 
    
    ?>
</head>
<body>

<?php   
    include('header.php'); 
    if(!isset( $_SESSION['userid'] ) ){
        header('Location: login.php');
      } 
    ?>
    
<h1>Dashboard Employer</h1>




<?php


 $userid = $_SESSION['userid'];

  include('dbconnect.php');
  $sql = "select * from jobs";
  $rs = mysqli_query($con,$sql);
  while($data = mysqli_fetch_array($rs)){


    $_SESSION['jobid'] = $data['jobid'];
    $userid = $_SESSION['userid'];
?>
	   

       <div class="col-md-12" height="400px;" > 
              
       <ul>
                <h2><?= $data['title'] ?></h2>
                <h4><?= $data['categories'] ?></h5>
                <h4>Desc :   <?= $data['description'] ?></h4>
                <h4>Salary :   <?= $data['salary'] ?></h4>
                <h4>Timing :   <?= $data['timing'] ?></h4>
                <h4>Location :   <?= $data['location'] ?></h4>

        </ul>        

        <?php

					$type = $_SESSION['type'];

					

				 ?>
                 

        </div>



       <?php
  }
  ?>
  
<br><br>
 <?php include('footer.php'); ?>

</body>
</html>