
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

ul.a {
  list-style-type: circle;
}

ul.b {
  list-style-type: square;
}

ol.c {
  list-style-type: upper-roman;
}

ol.d {
  list-style-type: lower-alpha;
}

#bottom {
  position: absolute;
  bottom: 0;
  left: 0;
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

       <ul class="a">   
			 <li>

			 <h3><a href="#"><?= $data['categories']?><?= $data['location']?> </a></h3>
			 
			</li>
      </ul>


			 <?php
				}
				?>
		
	     </div>
		 <div id="bottom">Scroll for Jobs</div>

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
					}

				 ?>
                 

        </div>



       <?php
  }
  ?>
	  
     </div>
     
         
</div>