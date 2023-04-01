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
	$sql="insert into property (title,description,propertyType,submitType,bedroom,bathroom,kitchen,price,areaSize,location,county,constituency,image,image1,aid, isFeatured)
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





<link rel="stylesheet" href="assets\css\submit.css"> 
<link rel="stylesheet" href="assets\css\style.css">


<title>rj Housing: Submit property.</title>
</head>
<body class="section-body">


<div class="submit-title">
<p> SUBMIT YOUR PROPERTY</p>
<div class="error"><?php echo $error; ?>
<?php echo $msg; ?>
</div>	
</div>
        
        <div class="container"  >
				<form method="post" action="submitproperty.php" enctype="multipart/form-data">
              	  
					
				<div class=left>
					<p>General Details</p>
						<label class="neme">Title:</label>
					<i class="fa fa-label   icon"></i>
					<input type="text" name="title"placeholder="Title"  required /><br/><br/>
					<label >Description</label>
					<div>
				    <textarea  name="description" rows="10" cols="30" placeholder="Enter description here"></textarea>
					</div>
					
					

                   <label> Property Type </label>
				   <div> 
					<select required name="propertyType">
						<option value="">Select Type</option>
						<option value="apartment">Apartment</option>
						<option value="building">Building</option>
						<option value="office">Office</option>
						<option value="house">House</option>
                     </select>
				   </div>
				   
				   
					
				   
				   <label>Submit Type</label>
				   <div>
				   <select required name="submitType">
				   <option value="rent">Rent</option>
				   <option value="sale">Sale</option>
                   </select>
                  </div>
					
					<label>Bathroom</label>
					<div >
					<input type="text"  name="bathroom" required placeholder="Enter Bathroom (only no 1 to 10)">
					</div>
					<label >Kitchen</label>
													
					<div >
					<input type="text"  name="kitchen" required placeholder="Enter Kitchen (only no 1 to 10)">
					</div>
					<label >Bedroom</label>
					<div >
					<input type="text"  name="bedroom" required placeholder="Enter Bedroom  (only no 1 to 10)">
					</div>
              </div>
               
                 <div class="right">
					<p>Price and Location</p> <br>
					<label >Price</label>
				    <div>
					<input type="text"  name="price" required placeholder="Enter Price">
                    </div>
												
					
					<label >County</label>
					<div >
					<input type="text"  name="county" required placeholder="Enter your County">
					</div>
					
					
					<label >Constituency</label>
					<div >
					<input type="text"  name="constituency" required placeholder="Enter your Constituency">
					</div>
					<label >Area Size</label>
						<div >
					<input type="text"  name="areaSize" required placeholder="Enter Area Size (in sqrt)">
					</div>
					<label >Address</label>
					<div >
					<input type="text"  name="location" required placeholder="Enter Address">
					</div>
					<p>Image & Status</p>
					<div class="image">
					<label >Image</label>
                    <div >
					<input  name="image" type="file" required="">
                    </div>
					<label >Image</label>
					<div >
					<input  name="image1" type="file" required="">
					</div>
                      </div>
					<div class="featured"><label ><b>Is Featured?</b></label> </div>
					<div >
					<select  required name="isFeatured">
					<option value="">Select...</option>
					<option value="0">No</option>
					<option value="1">Yes</option>
                    </select>
					 
                   </div>
               </div>

					
			   <input type="submit" value="Submit Property" class="registerbtn"name="add" >

                </form>     
</div>
										
										
</body>
</html>