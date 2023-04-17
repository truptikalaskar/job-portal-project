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
            <h1>Employer Register</h1>

                 <form action="register.php" method="post">

                     <div class="form-group">
                     <input type="text" placeholder="enter a name" name="name" class="form-control"> 
                     </div>
                     <div class="form-group">
                    <input type="text" placeholder="enter a email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                    <input type="text" placeholder="enter a password" name="password" class="form-control">
                    </div>
                    <input type="submit"  name="empregister" value="Register Employer" class="btn btn-primary">

                 </form>
              

            </div>

      </div>
      
 

       <?php 

           if(isset($_POST['empregister']))
           {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

           
           

            if ($name!=null && $email!=null && $password!=null){
                $sql = "INSERT INTO `employer`( `name`, `email`, `password`, `type`) VALUES ('$name','$email','$password','1')";
                mysqli_query($con,$sql);
            
                echo "<script>alert('Employer registered successfully')</script>";
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