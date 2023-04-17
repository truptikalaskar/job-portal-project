
<div class="banner">
<style>
h1{
	margin-top:0.67em;
}	
h2 { 
  display: block;
  font-size: 2em;
  margin-bottom: 0.67em;
  margin-left: 2.00em;
  margin-right: 50;
  font-weight: bold;
}
</style>	
<h2>Jobs available at Locations</h2>

	<div class="container">
		

			 <?php
				include('dbconnect.php');
				$sql = "select * from jobs";
				$rs = mysqli_query($con,$sql);
				while($data = mysqli_fetch_array($rs)){

					
			 ?>

			 <li>

			 <h3><a href="#"><?= $data['categories']?>- <?= $data['location']?> </a></h3>
			 
			</li>

			 <?php
				}
				?>
		
			 </ul>
	     </div>
		 <h3 style="marging-top:3.00em">Scroll for jobs</h3>

       </div>

   </div> 
</div>
 
<div class="container">

<div class="single">  
     
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
              
                <h1><?= $data['title'] ?></h1>
                <h5><?= $data['categories'] ?></h5>
                <p>Desc :   <?= $data['description'] ?></p>
                <h3>Salary :   <?= $data['salary'] ?></h3>
                <h3>Timing :   <?= $data['timing'] ?></h3>
                <h3>Location :   <?= $data['location'] ?></h3>

                 <?php

					$type = $_SESSION['type'];

					if($type == 2){

						echo "<a href='apply.php?jobid=".$data["jobid"]."' class='btn btn-primary'>Apply Now</a>";
                
						
					}else{
						echo '<a href="login.php" class="btn btn-primary"> Login </a> ';
						echo '<a href="register.php" class="btn btn-primary"> Register </a>';
					}

				 ?>
                 

        </div>



       <?php
  }
  ?>
	  
     </div>
     
         
</div>