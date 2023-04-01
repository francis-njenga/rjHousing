<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['uid']))
{
	header("location:login.php");
}

if(isset($_POST['contact_agent']))
{
	
	$firstName=$_POST['firstName'];
	$userEmail=$_POST['email'];	
	$userPhone=$_POST['phone'];	
	$propertyName=$_POST['propertyName'];
	$location=$_POST['propertyLocation'];
	$bookingDate=$_POST['bookingDate'];
	$image=$_POST['image'];
  $message=$_POST['message'];
  $agentID=$_POST['aid'];
 
	
	
	
	
	$sql="INSERT INTO contact_agent (userName,userEmail,userPhone,propertyName, propertyLocation,visitDate,userImage,message,agentID)
	values('$firstName','$userEmail','$userPhone','$propertyName','$location','$bookingDate','$image','$message','$agentID')";
	$result=mysqli_query($con,$sql);
	if($result)
		{
			$msg="<p class='alert alert-success'>Booking successful</p>";
			
			
		}
		else
		{
			$error="<p class='alert alert-warning'>booking not successful</p>";
		}
}							
?>

								
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>rj Housing</title>
<link rel="stylesheet" href="./assets/css/Style.css">
 <link rel="stylesheet" href="./account/css/properties.css">
 <link rel="stylesheet" href="assets/css/update.css"> 
 
</head> 
<body>

<?php include("include/header.php");?>
        
<section class="about" id="about" style="display:flex; padding:20px;">
       <?php
       $id=$_POST['pid']; 
	    $query=mysqli_query($con,"SELECT property.*, agent.* FROM `property`,`agent` WHERE property.aid=agent.aid and pid='$id'");
		  while($row=mysqli_fetch_array($query))
						{
					  ?>

        <div class="container" style="width:100%; padding:0;">

        <div style="width:40rem;">
          
            <img class="image" style="display:block;"src="admin/property/<?php echo $row['image'];?>" alt="property image">

            <img class="image" style="display:block;" src="admin/property/<?php echo $row['image1'];?>" alt="property image" >
           
            </div>  
        </div>

        <div class="about-content">


            <p class="agent-subtitle">Property Details</p>

            <h2 class="h2 section-title"><?php echo $row['title'];?></h2>

            <p class="about-text">
            <?php echo $row['description'];?>
            </p>

            <ul class="about-list">

              <li class="about-item">
                <div class="about-item-icon">
                  <ion-icon name="square-outline"></ion-icon>
                </div>

                <p class="about-item-text"><?php echo $row['areaSize'];?> SqureFt</p>
              </li>

              <li class="about-item">
                <div class="about-item-icon">
                  <ion-icon name="bed-outline"></ion-icon>
                </div>

                <p class="about-item-text"><?php echo $row['bedroom'];?> Bedroom</p>
              </li>

              <li class="about-item">
                <div class="about-item-icon">
                  <ion-icon name="man-outline"></ion-icon>
                </div>

                <p class="about-item-text"><?php echo $row['bathroom'];?> Bathroom</p>
              </li>

              <li class="about-item">
                <div class="about-item-icon">
                  <ion-icon name="home-outline"></ion-icon>
                </div>

                <p class="about-item-text"><?php echo $row['kitchen'];?> Kitchen</p>
              </li>
              <li class="about-item">
                <div class="about-item-icon">
                  <ion-icon name="location"></ion-icon>
                </div>

                <p class="about-item-text">&nbsp;<?php echo $row['constituency'];?>,<?php echo $row['county'];?></p>
              </li>
              <li class="about-item">
                <div class="about-item-icon">
                  <ion-icon name="currency"></ion-icon>
                </div>

                <p class="about-item-text">Price KSh.<?php echo $row['price'];?></p>
              </li>
              

            </ul>

            <p class="callout">
              The <b><?php echo $row['propertyType'];?> </b>is for <b><?php echo $row['submitType'];?></b> The property will cost you total of<b> KSh <?php echo $row['price'];?></b> Which is payable in instalments contact <b><?php echo $row['aname'];?></b> Property Agent.
            </p>

            <a href="#service" class="btn">Interested In Property</a>

          </div>

        </div>
        
      </section>
     
     <section class="agent-info">
     <p class="agent-subtitle"> Agent Information</p>
       <div class="container-agent">
        
          <div class="agent-contact">
           <div class="agent-subtitle">Name:</div>
           <div class="callout"><?php echo $row['aname'];?></div>
           <div class="agent-subtitle">Phone:</div>
           <div class="callout"><?php echo $row['aphone'];?></div>
           <div class="agent-subtitle">Email:</div>
           <div class="callout"><?php echo $row['aemail'];?></div>
          </div>
          <div class="profile-image-container">
            <img class="profile-image" src="admin/agent/<?php echo $row['aimage'];?>">       
                  
       </div>
       </div>
       <?php } ?>
     <section>
      <section>
      
        <?php       
           $user_id= ($_SESSION['uid']);
	   $query=mysqli_query($con,"SELECT  user.* FROM `user`WHERE user.uid=$user_id");
		while($row=mysqli_fetch_array($query))
						{  
        
						  ?>
      <form method="post" action="propertydetail.php" id="form-update" enctype="multipart/form-data">
          <div style="text-align:center;"><p>BOOK A VISIT</p></div>
          <div style="display:flex;">       

            <div class=left>

                    <p>Confirm Your Details</p>
                      <label class="neme">First Name:</label>
                   <div>
                    
                    <input type="text" name="firstName"value="<?php echo $row['uname'];?>">
                  </div>
                    <label>Email Address</label>
                    <div >
                    <input type="text"  name="email"  value="<?php echo $row['uemail'];?>">
                    </div>
                    <label>Phone Number</label>
                    <div >
                    <input type="text"  name="phone"  value="<?php echo $row['uphone'];?>">
                    <input type="hidden"  name="image" value="<?php echo $row['uimage']; ?>" >

                    </div>

               </div>                  
                         <?php } ?>
                      <div class="right">
                        
                      <?php 
      
                      //  $id=$_REQUEST['pid']; 
                          
                        $query=mysqli_query($con,"SELECT property.*, agent.* FROM `property`,`agent` WHERE property.aid=agent.aid and pid='$id'");
                        while($row=mysqli_fetch_array($query))
                                {  
                            
                                
                                ?>
                    <p>Contact Agent</p> <br>
                    <label >Message</label>
                    <div >
                      <textarea  style="height:100px;" name="message" rows="20" cols="30" placeholder="message <?php echo $row['aname'];?>, the agent of the property <?php echo $row['title']; ?> "></textarea>
                    </div>   
                      
                    <label>Visit Date.</label>
                    <div >
                    <input type="hidden" name="propertyName" value="<?php echo $row['title']; ?>">
                    <input type="hidden" name="propertyLocation" value="<?php echo $row['county']; ?>,<?php echo $row['constituency']; ?> ">
                    <input type="date"  name="bookingDate" value="<?php echo date('Y-m-d'); ?>" >
                    <input type="hidden" name="pid" value="<?php echo $row['pid']; ?>">
                    <input type="hidden" name="aid" value="<?php echo $row['aid']; ?>">


                    </div>
                    <?php } ?>
                    
                    
            </div>
                   </div>
                   
                   <input style="text-transform:capitalize;" type="submit" value="Book A visit" class="updatebutton" name="contact_agent" onclick="location.reload(true); window.location.href='propertydetail.php?pid=<?php echo $id; ?>';">
                    
                                </div>
                </form> 
               
             
     </section>

     <script type="text/javascript">
    
    const images = document.querySelectorAll(".image");
const leftArrow = document.querySelector(".arrow-left");
const rightArrow = document.querySelector(".arrow-right");

let currentImageIndex = 0;
images[currentImageIndex].classList.add("active");

leftArrow.addEventListener("click", () => {
  images[currentImageIndex].classList.remove("active");
  currentImageIndex--;
  if (currentImageIndex < 0) {
    currentImageIndex = images.length - 1;
  }
  images[currentImageIndex].classList.add("active");
});

rightArrow.addEventListener("click", () => {
  images[currentImageIndex].classList.remove("active");
  currentImageIndex++;
  if (currentImageIndex >= images.length) {
    currentImageIndex = 0;
  }
  images[currentImageIndex].classList.add("active");
});



      </script>
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
      <script scr="assets\javaScript\propertiesdetails.js"></script>
</body>
</html>