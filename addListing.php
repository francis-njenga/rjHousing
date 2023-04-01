<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['aemail']))
{
	header("location:index.php");
}


$error="";
$msg="";
if(isset($_POST['add']))
{
	
	$title=$_POST['title'];
	$description=$_POST['description'];	
	$bedroom=$_POST['bedroom'];	
	$propertyType=$_POST['propertyType'];
	$submitType=$_POST['submitType'];
	$bathroom=$_POST['bathroom'];
	$kitchen=$_POST['kitchen'];
	$areaSize=$_POST['areaSize'];	
	$price=$_POST['price'];
	$county=$_POST['county'];	
	$location=$_POST['location'];
	$constituency=$_POST['constituency'];	
	$aid=$_SESSION['aid'];
	
	
	$isFeatured=$_POST['isFeatured'];
	
	if(isset($_FILES['image']['name'])) {
		$image = $_FILES['image']['name'];
	} else {
		$image = "";
	}
	
	if(isset($_FILES['image1']['name'])) {
		$image1 = $_FILES['image1']['name'];
	} else {
		$image1 = "";
	}
	ini_set('post_max_size', '10M'); 
     ini_set('upload_max_filesize', '8M');
	$temp_name  =$_FILES['image']['tmp_name'];
	$temp_name1 =$_FILES['image1']['tmp_name'];	
	
	move_uploaded_file($temp_name,"admin/property/$image");
	move_uploaded_file($temp_name1,"admin/property/$image1");	
	$sql="INSERT INTO property (title,description,propertyType,submitType,bedroom,bathroom,kitchen,price,areaSize,location,county,constituency,image,image1,aid, isFeatured)
	values('$title','$description','$propertyType','$submitType','$bedroom','$bathroom','$kitchen','$price','$areaSize',
	'$location','$county','$constituency','$image','$image1','$aid','$isFeatured')";
	$result=mysqli_query($con,$sql);
	if($result)
		{
			$msg="<p class='alert alert-success'>Property Inserted Successfully</p>";
			
			header("location:agent.php");	
		}
		else
		{
			$error="<p class='alert alert-warning'>Property Not Inserted Some Error</p>";
		}
}							
?>
<!DOCTYPE html>
<html lang="en">

<head>





<link rel="stylesheet" href="assets\css\update.css"> 
<link rel="stylesheet" href="assets\css\style.css">


<title>rj Housing: Submit property.</title>
</head>
<body class="section-body" style="background-color:hsl(192, 24%, 96%);">
<?php include("agentHeader.php")
?>

<div class="submit-title">
<p> SUBMIT YOUR PROPERTY</p>
<div class="error"><?php echo $error; ?>
<?php echo $msg; ?>
</div>	
</div>
        
        <div class="container"  >
        <form method="post" action="addListing.php" id="form-update" enctype="multipart/form-data">
          <div style="text-align:center;"><p>Enter Your Property Details</p></div>
          <div style="display:flex;">       

            <div class=left>

                    <p>General Details</p>
                      <label class="neme">Title:</label>
                    <i class="fa fa-label   icon"></i>
                    <input type="text" name="title"placeholder="Title"  /><br/><br/>
                    <label >Description</label>
                    <div >
                      <textarea  name="description" rows="10" cols="30" placeholder="Enter description here"></textarea>
                    </div>                   
                     <label> Property Type </label>
                     <div> 
                    <select  name="propertyType">
                      <option value="">Select Type</option>
                      <option value="apartment">Apartment</option>
                      <option value="building">Building</option>
                      <option value="office">Office</option>
                      <option value="house">House</option>
                      </select>
                     </div>
                      <label>Submit Type</label>
                     <div>
                     <select name="submitType">
                      <option value="">Select Buy Option</option>
                     <option value="rent">Rent</option>
                     <option value="sale">Sale</option>
                             </select>
                            </div>
                     <label>Bathroom</label>
                    <div >
                    <input type="text"  name="bathroom"  placeholder="Enter Bathroom (only no 1 to 10)">
                    </div>
                    <label >Kitchen</label>
                                    
                    <div >
                    <input type="text"  name="kitchen"  placeholder="Enter Kitchen (only no 1 to 10)">
                    </div>
                    <label >Bedroom</label>
                    <div >
                    <input type="text"  name="bedroom"  placeholder="Enter Bedroom  (only no 1 to 10)">
                    </div>
                    <div class="featured"><label ><b>Is Featured?</b></label> </div>
                    <div >
                    <select name="isFeatured">
                    <option value="">Select...</option>
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                     </select>
                     
                      </div>
                      <label >Price</label>
                      <div>
                    <input type="text"  name="price"  placeholder="Enter Price">
                      </div>
                      <label >Area Size</label>
                      <div >
                    <input type="text"  name="areaSize"  placeholder="Enter Area Size (in sqrt)">
                    </div>
                  </div>
                         
                      <div class="right">
                    <p>Location</p> <br>
                    
                      <label >County</label>
                    <div >
                    <input type="text"  name="county"  placeholder="Enter your County">
                    </div>
                   <label >Constituency</label>
                    <div >
                    <input type="text"  name="constituency"  placeholder="Enter your Constituency">
                    </div>
                    
                    <label >Address</label>
                    <div >
                    <input type="text"  name="location"  placeholder="Enter Address">
                    </div>
                    <p>Images</p>
                    <div class="image-box">
                     <img src="./assets/images/default.png" alt="Default Image" >

                      <input id="image-upload" name="image" type="file" style="display:none;" >
                       <div class="edit-icon">                      
                      <ion-icon name="pencil-outline" onclick="document.getElementById('image-upload').click();"></ion-icon> 
                      </div>
                     </div> 
                    <div class="image-box " >
                    <img src="./assets/images/default.png" alt="Default Image" > 

                      <input id="image-upload1" name="image1" type="file" style="display:none;" >

                      <div class="edit-icon">
                      <ion-icon name="pencil-outline" onclick="document.getElementById('image-upload1').click();"></ion-icon> 
                      </div>
                    </div>
                    
                    
                    
                    
                   </div>
                   </div>
                   <input type="submit" value="ADD LISTING" class="updatebutton" name="add" >
                    
                </form>     
</div>
										
 <script src="./assets/js/update_property.js"></script> 
     <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>						
</body>
</html>