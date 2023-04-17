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
  width: 100%;
  margin-left: auto; 
  margin-right: auto;
  margin-top: 25px;

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
      
     $userid = $_SESSION['userid'];

    ?>
    <div class="container">
    
      <div class="single">
     

            <div class="col-md-12">
                 <div class="form-group">
                 <input type="text" id="myinput" placeholder="search ......" class="form-control">
                 </div>
               
                 <table class="w-100 table-elements table-three-tr"cellpadding="2">
                    <tr class="pt-5 table-three text-white" style="height: 32px;">
                                 <th style="text-align:center">ID</th>
                                 <th style="text-align:center">Job</th>
                                 <th style="text-align:center">User</th>
                                 <th style="text-align:center">CV</th>
                                 <th style="text-align:center">Date</th>
                                 <th style="text-align:center">Expected Salary</th>
                                 <th style="text-align:center">User Phone</th>
                                 <th style="text-align:center">Experience</th>

                            </tr>

                      <tbody id="mytable">
                           <?php
                              
                              $sql = "select application.appid, application.userid, user.name , jobs.title, employer.empid, application.cv, application.date,
                              application.expected_salary,application.experience,application.user_phone
                              from application
                              INNER join jobs on jobs.jobid = application.jobid
                              INNER join employer on employer.empid = jobs.empid
                              INNER join user on user.userid = application.userid
                              where application.userid = '$userid'
                              ";
                              $rs = mysqli_query($con,$sql);
                              while($data = mysqli_fetch_array($rs)){
                           ?>

                                <tr>
                                      <td><?=$data['appid']?></td>
                                      <td><?=$data['title']?></td>
                                      <td><?=$data['name']?></td>
                                      <td><?=$data['cv']?></td>
                                      <td><?=$data['date']?></td>
                                      <td><?=$data['expected_salary']?></td>
                                      <td><?=$data['user_phone']?></td>
                                      <td><?=$data['experience']?></td>
                                     
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