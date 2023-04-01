<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
								
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>rj Housing</title>
<link rel="stylesheet" href="./assets/css/Style.css">
<link rel="stylesheet" href="account\css\properties.css">
</head> 
<body>

          
		<?php include("include/header.php");?>
        
             

		
        <div class="about" id="about">
            <div class="container">
                
				
					<?php
                       
                       $id=$_REQUEST['pid']; 
						$query=mysqli_query($con,"SELECT property.*, user.* FROM `property`,`user` WHERE property.uid=user.uid and pid='$id'");
						while($row=mysqli_fetch_array($query))
						{
					  ?>
				  
                    
                                                  
                                <div id="about-banner"  >
                                    
                                <img src="admin/property/<?php echo $row['image'];?>"  />                                    
                                 <img src="admin/property/<?php echo $row['image1'];?>"  /> 
                                    
                                    
                                  </div>
                           
                        
                        
                            <div class="about-content">
                             <p class="section-subtitle"> Description</p>
                              <p class="about-text"><?php echo $row['description'];?></p>
                            
                                <div class="about-item-text">For <?php echo $row['submitType'];?></div>
                                <h5 ><?php echo $row['title'];?></h5>
                                <span ><ion-icon name="location"></ion-icon> &nbsp; <?php echo $row['constituency'];?>,<?php echo $row['county'];?> </span>
							
                            <div class="detail-right" >
                                <div >$<?php echo $row['price'];?></div>
                                <div >Price</div>
                            </div>
                        
                            
                        
                       
                            <div class="extra-details">
                                <ul class="about-list">
                                    <li class="about-item"> <div class="about-item-icon">  <ion-icon name="square-outline"></ion-icon>   </div><?php echo $row['areaSize'];?></span> Sqft</li>
                                    <li class="about-item"><div class="about-item-icon">  <ion-icon name="bed-outline"></ion-icon> <?php echo $row['bedroom'];?></span> Bedroom</li>
                                    <li class="about-item"><div class="about-item-icon">  <ion-icon name="man-outline"></ion-icon> <?php echo $row['bathroom'];?></span> Bathroom</li>                                  
                                    <li class="about-item"><div class="about-item-icon">  <ion-icon name="home-outline"></ion-icon> <?php echo $row['kitchen'];?></span> Kitchen</li>
                                </ul>
                            </div>
                            </div>
                 </div>
            </div>

                            
                           
                            <h5>Contact Agent</h5>
                            <div class="agent-detail">
                                
                                    <div > <img src="admin/user/<?php echo $row['uimage']; ?>" alt="" height="200" width="170"> </div>
                                  
                                        <div class="agent-minor-detail">
                                            <h6 ><?php echo $row['uname'];?></h6>
                                            <ul >
                                                <li><?php echo $row['uphone'];?></li>
                                                <li><?php echo $row['uemail'];?></li>
                                            </ul>
                                            
                                            
                                        </div>
                                    
                                 
                                
                            </div>
                        </div>
                    </div>
                        
					<?php }
                     ?>
					
                    <div class="message-agent" >
                         <h4 >Send Message</h4>
                        <form method="post" action="#">
                            <div class="message-form">
                                <div >
                                    <div >
                                        <input type="text" class="form-control" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div >
                                    <div >
                                        <input type="text" class="form-control" placeholder="Enter Email">
                                    </div>
                                </div>
                                <div >
                                    <div >
                                        <input type="text" class="form-control" placeholder="Enter Phone">
                                    </div>
                                </div>
								<div >
                                    <div >
										<textarea class="form-control" placeholder="Enter Message"></textarea>
                                    </div>
                                </div>
								
                                <div >
                                    <div>
                                        <button type="submit" class="btn-check">Search Property</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form> 
                    <div class="display-recent-property">
							<h4> Featured Property</4>
                            <?php 
                            $query=mysqli_query($con,"SELECT * FROM `property` WHERE isFeatured = 1 ORDER BY date DESC LIMIT 2");
                                    while($row=mysqli_fetch_array($query))
                                    {
                            ?>
                         <ul>

                            <li> <img src="admin/property/<?php echo $row['image'];?>" alt="pimage">
                                <h6 ><a href="propertydetail.php?pid=<?php echo $row['0'];?>"><?php echo $row['title'];?></a></h6>
                                <span class="font-14"><i class="fas fa-map-marker-alt icon-success icon-small"></i> <?php echo $row['location'];?></span>
                                
                            </li>
                            <?php } ?>

                        </ul>

                        <div >
                            <h4 >Recently Added Property</h4>
                            <ul class="property_list_widget">
							
								<?php 
								$query=mysqli_query($con,"SELECT * FROM `property` ORDER BY date DESC LIMIT 2");
										while($row=mysqli_fetch_array($query))
										{
								?>
                                <li> <img src="admin/property/<?php echo $row['image'];?>" alt="pimage">
                                    <h6 ><a href="propertydetail.php?pid=<?php echo $row['0'];?>"><?php echo $row['title'];?></a></h6>
                                    <span ><i ></i> <?php echo $row['location'];?></span>
                                    
                                </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

     
		<?php include("include/footer.php");?>
		
      
    
</div>


</body>

</html>
<?php 
include("config.php");
$error="";
$msg="";
if(isset($_REQUEST['reg']))
{
	$name=$_REQUEST['name'];
	$email=$_REQUEST['email'];
	$phone=$_REQUEST['phone'];
	$pass=$_REQUEST['pass'];
	$utype=$_REQUEST['utype'];
	
	$uimage=$_FILES['uimage']['name'];
	$temp_name1 = $_FILES['uimage']['tmp_name'];
	$pass= sha1($pass);
	
	$query = "SELECT * FROM user where uemail='$email'";
	$res=mysqli_query($con, $query);
	$num=mysqli_num_rows($res);
	
	if($num == 1)
	{
		$error = "<p class='alert alert-warning'>Email Id already Exist</p> ";
	}
	else
	{
		
		if(!empty($name) && !empty($email) && !empty($phone) && !empty($pass) && !empty($uimage))
		{
			
			$sql="INSERT INTO user (uname,uemail,uphone,upass,utype,uimage) VALUES ('$name','$email','$phone','$pass','$utype','$uimage')";
			$result=mysqli_query($con, $sql);
			move_uploaded_file($temp_name1,"admin/user/$uimage");
			   if($result){
				   $msg = "<p>Register Successfully</p> ";
				   header("location:login.php");
			   }
			   else{
				   $error = "<p>Register Not Successfully</p> ";
			   }
		}else{
			$error = "<p>Please Fill all the fields</p>";
		}
	}
	
}
?>


<?php 
session_start();
include("config.php");
$error="";
$msg="";
if(isset($_REQUEST['login']))
{  
	$email=$_REQUEST['email'];
	$pass=$_REQUEST['pass'];
	$pass= sha1($pass);
	
	if(!empty($email) && !empty($pass))
	{
		$sql = "SELECT * FROM user where uemail='$email' && upass='$pass'";
		$result=mysqli_query($con, $sql);
		$row=mysqli_fetch_array($result);
		   if($row){
			   
				$_SESSION['uid']=$row['uid'];
				$_SESSION['uemail']=$email;

				

				
				header("location:index.php");
				
		   }
		   else{
			   $error = "<p class='alert alert-warning'>Email or Password doesnot match!</p> ";
		   }
	}else{
		$error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
	}
}
?>