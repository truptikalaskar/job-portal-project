<!DOCTYPE html>
<html lang="en">

<style>

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
  color:black;
}


</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Applied Jobs | Jobs Portal</title>
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

     $empid = $_SESSION['userid'];

    ?>
    <div class="container">
    


      <div class="single">
     

            <div class="col-md-12">
                 <div class="form-group">
                 <input type="text" id="myinput" placeholder="search ......" class="form-control">
                 </div>
               
                 <table class="table">
                      <thead>
                            <tr>
                                 <th style="text-align:center" >ID</th>
                                 <th style="text-align:center">Job</th>
                                 <th style="text-align:center">User</th>
                                 <th style="text-align:center">Expected salary</th>
                                 <th style="text-align:center">Experience</th>
                                 <th style="text-align:center">Phone number</th>
                                 <th style="text-align:center">CV</th>
                                 <th style="text-align:center">Date</th>
                            </tr>
                      </thead>

                      <tbody id="mytable">
                           <?php
                              
                              $sql = "select application.appid, user.name , jobs.title, employer.empid,application.expected_salary,application.experience,application.user_phone,application.cv, application.date
                              from application
                              INNER join jobs on jobs.jobid = application.jobid
                              INNER join employer on employer.empid = jobs.empid
                              INNER join user on user.userid = application.userid
                              ";
                              $rs = mysqli_query($con,$sql);
                              while($data = mysqli_fetch_array($rs)){
                           ?>

                                <tr>
                                      <td><?=$data['appid']?></td>
                                      <td><?=$data['title']?></td>
                                      <td><?=$data['name']?></td>                      
                                      <td><?=$data['expected_salary']?></td>
                                      <td><?=$data['experience']?></td>
                                      <td><?=$data['user_phone']?></td>
                                      <td><?=$data['cv']?></td>
                                      <td><?=$data['date']?></td>
                                     
                                </tr>

                           <?php
                              }
                              ?>
                      </tbody>
                 </table>

            </div>

      </div>
 


</div>

<script>
$(document).ready(function(){
  $("#myinput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#mytable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

</script>

<br><br>
 <?php include('footer.php'); ?>


</body>
</html>