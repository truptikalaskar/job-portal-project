<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Jobs Portal</title>
    <?php 
    
    include('header_link.php'); 
    include('dbconnect.php');

    
    
    ?>
</head>
<body>
<?php 
    
    include('header.php'); 

    ?>
<div class="container">


      <div class="single">
      <div class="col-md-6">
            <h1>User Register</h1>
                 <form action="register.php" method="post">

                     <div class="form-group">
                     <input type="text" placeholder="enter a name" name="name" class="form-control"> 
                     </div>
                     <div class="form-group">
                    <input type="text" placeholder="enter a email" name="email" class="form-control ">
                    </div>
                    <div class="form-group">
                    <input type="text" placeholder="enter a password" name="password" class="form-control">
                    </div>

                    <a href="http://localhost/JobPortalproject/login.php">  
                        <input type="submit" name="userregister" value="Register User" class="btn btn-primary">
                        </a>

                 </form>
              

            </div>
      </div>
      
 

       <?php 

        if(isset($_POST['userregister']))
        {

         $name = $_POST['name'];
         $email = $_POST['email'];
         $password = $_POST['password'];

  
        
            if ($name!=null && $email!=null && $password!=null){
                $sql2 = "INSERT INTO `user`(`name`, `email`, `password`, `type`) VALUES ('$name','$email','$password','2')";
                mysqli_query($con,$sql2);    
                
                echo "<script>alert('User registered successfully')</script>";
            }
            else{
                echo "<script>alert('Please enter all details')</script>";
            }
        }

?>

 </div>
 <br><br>
 <?php include('footer.php'); ?>

</body>
</html>