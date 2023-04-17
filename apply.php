


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Job | Jobs Portal</title>
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
      
    $jobid = $_GET['jobid'];
    $userid = $_SESSION['userid'];

    ?>

    <div class="container">


      <div class="single">
      <h1>Apply For Job</h1>
            <div class="col-md-6">
                 <form action="apply.php" method="post" enctype="multipart/form-data">


                 <div class="form-group">
                     <input type="text" placeholder="Expected Salary" name="expected_salary" class="form-control"> 
                     </div>
                     <div class="form-group">
                    <input type="text" placeholder="Experience" name="experience" class="form-control">
                    </div>
                    <div class="form-group">
                    <input type="text" placeholder="Enter Phone Number" name="user_phone" class="form-control">
                    </div>

                   <h3>Upload your Resume</h3>
                   <input type="hidden" value="<?=$jobid?>" name="jobid" >
                   <input type="hidden" value="<?=$userid?>" name="userid" >
     
                    <div class="form-group">
                    <input type="file"  name="file" class="form-control"> 
                    </div>
                    
                    <input type="submit"  name="applyjob" value="Apply" class="btn btn-primary">

                 </form>
              

            </div>

      </div>
 

       <?php 
 
           if(isset($_POST['applyjob']))
           {

            $userid = $_POST['userid'];
            $jobid = $_POST['jobid'];
            $date = date('y/m/d');
            
            $expected_salary=$_POST['expected_salary'];
            $experience=$_POST['experience'];
            $user_phone=$_POST['user_phone'];

        

             $file = $_FILES['file']['name'];
             $tmp = $_FILES['file']['tmp_name'];
             $validate = 0;

              move_uploaded_file($tmp, "cv/$file");


              
              if ($expected_salary!=null && $experience!=null && $user_phone!=null){
                  $sql = "INSERT INTO `application`(`userid`, `jobid`,`expected_salary`,`experience`,`user_phone`, `cv`, `date`) VALUES ('$userid','$jobid','$expected_salary','$experience','$user_phone','$file','$date')";
                  mysqli_query($con,$sql);
                  echo "<script>alert('Applied for job successfully')</script>";
                  $validate = 1;

              }
              else{
                  echo "<script>alert('Please enter all details')</script>";
                  $validate = 0;
              }


              if($validate == 1){
                header('Location: index.php');
              }
        }
?>

    
</div>

<br><br>
 <?php include('footer.php'); ?>

</body>
</html>