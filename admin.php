<!DOCTYPE html>
<html lang="en">
<style>
h1 { 
  display: block;
  font-size: 2em;
  margin-top: 10px;
  margin-bottom: 0.67em;
  margin-left: 5.00em;
  margin-right: 50;
  font-weight: bold;
  text-align:center;
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

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 80%;
  margin-left: auto; 
  margin-right: auto;
}

td, th, tr {
  border: 3px solid #dddddd;
  text-align: center;
  padding: 15px;
  margin-top:2.00em;
}

tr:nth-child(even) {
  text-align: center;
  background-color: #dddddd;
  padding: 15px;
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
    
<h1>Employer Dashboard</h1>

<div class="collapse show mt-2" id="collapsetwo">
<table class="w-100 table-elements table-three-tr"cellpadding="2">
  <tr class="pt-5 table-three text-white" style="height: 32px;">
    <th style="text-align:center">Title</th>
    <th style="text-align:center">Description</th>
    <th style="text-align:center">Package</th>
    <th style="text-align:center">Active Status</th>
    <th style="text-align:center">Location</th>

  </tr> 

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
      
              
          <tr>
              <td><?php echo $data['title'] ?></td>
              <td><?php echo $data['description'] ?></td>
              <td><?php echo $data['package'] ?></td>
              <td><?php echo $data['ActiveStatus'] ?></td>
              <td><?php echo $data['location'] ?></td>

            

        <?php
          $type = $_SESSION['type'];
         ?>        
        </div>
       <?php
  }
  ?>
  </div>
  
<br><br>
 <?php include('footer.php'); ?>

</body>
</html>