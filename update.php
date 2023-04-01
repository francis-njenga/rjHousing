
<?php

ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");


$id = $_POST['pid'];
$updates = array();
if (!empty($_POST['title'])) {
  $title = $_POST['title'];
  $updates[] = "title = '$title'";
}

if (!empty($_POST['description'])) {
  $description = $_POST['description'];
  $updates[] = "description = '$description'";
}

if (!empty($_POST['propertyType'])) {
  $propertyType = $_POST['propertyType'];
  $updates[] = "propertyType = '$propertyType'";
}

if (!empty($_POST['submitType'])) {
  $submitType = $_POST['submitType'];
  $updates[] = "submitType = '$submitType'";
}

if (!empty($_POST['bathroom'])) {
  $bathroom = $_POST['bathroom'];
  $updates[] = "bathroom = '$bathroom'";
}

if (!empty($_POST['kitchen'])) {
  $kitchen = $_POST['kitchen'];
  $updates[] = "kitchen = '$kitchen'";
}

if (!empty($_POST['bedroom'])) {
  $bedroom = $_POST['bedroom'];
  $updates[] = "bedroom = '$bedroom'";
}

if (!empty($_POST['price'])) {
  $price = $_POST['price'];
  $updates[] = "price = '$price'";
}

if (!empty($_POST['county'])) {
  $county = $_POST['county'];
  $updates[] = "county = '$county'";
}

if (!empty($_POST['constituency'])) {
  $constituency = $_POST['constituency'];
  $updates[] = "constituency = '$constituency'";
}

if (!empty($_POST['areaSize'])) {
  $areaSize = $_POST['areaSize'];
  
  $updates[] = "areaSize = '$areaSize'";
}


if (!empty($_POST['location'])) {
    $location = $_POST['location'];
$updates[] = "location = '$location'";
}


if (!empty($_FILES['image']['name'])) {
 
  $image_tmp = $_FILES['image']['tmp_name'];
  $image_name = $_FILES['image']['name'];
  move_uploaded_file($image_tmp, "admin/property/".$image_name);
  $image = $image_name;
  $updates[] = "image = '$image'";
}

if (!empty($_FILES['image1']['name'])) {
   $image1_tmp = $_FILES['image1']['tmp_name'];
  $image1_name = $_FILES['image1']['name'];
  move_uploaded_file($image1_tmp, "admin/property/".$image1_name);
 $image1 = $image1_name;
  $updates[] = "image1 = '$image1'";
}




if (!empty($_POST['isFeatured'])) {
$isFeatured = $_POST['isFeatured'];
$updates[] = "isFeatured = '$isFeatured'";
}

if (!empty($updates)) {
    $updates_str = implode(", ", $updates);
    $sql = "UPDATE property SET $updates_str WHERE pid = '$id'";
    if (mysqli_query($con, $sql)) {
        header("location:agent.php");
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
} 





?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>rJ Housing - Find your dream Home</title>

 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href="./assets/css/update.css">
  <link rel="stylesheet" href="./assets/css/Style.css">

   
</head>

<body style="background-color:hsl(192, 24%, 96%);">
<?php include("agentHeader.php");?>
  <?php 
  
   $id=$_REQUEST['pid']; 
   $query=mysqli_query($con,"SELECT property.* FROM `property` WHERE pid='$id'");
   while($row=mysqli_fetch_array($query))
        {
       
    ?>
   <form method="post" action="update.php" id="form-update" enctype="multipart/form-data">
          <div style="text-align:center;"><p>Update Property Details.</p></div>
          <div style="display:flex;">       

            <div class=left>

                    <p>General Details</p>
                      <label class="neme">Title:</label>
                    <i class="fa fa-label   icon"></i>
                    <input type="hidden" name="pid" value="<?php echo $row['pid']; ?>">
                    <input type="text" name="title"value="<?php echo $row['title'];?>"  /><br/><br/>
                    <label >Description</label>
                    <div >
                      <textarea  name="description" rows="10" cols="30" placeholder="<?php echo $row['description'];?>"></textarea>
                    </div>                   
                     <label> Property Type </label>
                     <div> 
                    <select  name="propertyType">
                      <option value=""><?php echo $row['propertyType'];?></option>
                      <option value="apartment">Apartment</option>
                      <option value="building">Building</option>
                      <option value="office">Office</option>
                      <option value="house">House</option>
                      </select>
                     </div>
                      <label>Submit Type</label>
                     <div>
                     <select name="submitType">
                      <option value=""><?php echo $row['submitType'];?></option>
                     <option value="rent">Rent</option>
                     <option value="sale">Sale</option>
                             </select>
                            </div>
                     <label>Bathroom</label>
                    <div >
                    <input type="text"  name="bathroom"  value="<?php echo $row['bathroom'];?>">
                    </div>
                    <label >Kitchen</label>
                                    
                    <div >
                    <input type="text"  name="kitchen"  value="<?php echo $row['kitchen'];?>">
                    </div>
                    <label >Bedroom</label>
                    <div >
                    <input type="text"  name="bedroom"  value="<?php echo $row['bedroom'];?>">
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
                    <input type="text"  name="price"  value="KSh. <?php echo $row['price'];?>">
                      </div>
                      <label >Area Size</label>
                      <div >
                    <input type="text"  name="areaSize"  value="<?php echo $row['areaSize'];?>">
                    </div>
                  </div>
                         
                      <div class="right">
                    <p>Location</p> <br>
                    
                      <label >County</label>
                    <div >
                    <input type="text"  name="county"  value="<?php echo $row['county'];?>">
                    </div>
                   <label >Constituency</label>
                    <div >
                    <input type="text"  name="constituency"  value="<?php echo $row['constituency'];?>">
                    </div>
                    
                    <label >Address</label>
                    <div >
                    <input type="text"  name="location"  value="<?php echo $row['location'];?>">
                    </div>
                    <p>Images</p>
                    <div class="image-box">
                      <img src="admin/property/<?php echo $row['image']; ?>" alt="Image">
                      <input id="image-upload" name="image" type="file" style="display:none;">
                      <div class="edit-icon">
                     
                      <ion-icon name="pencil-outline" onclick="document.getElementById('image-upload').click();"></ion-icon>
                      </div>
                    </div>
                    <div class="image-box">
                      <img src="admin/property/<?php echo $row['image1']; ?>" alt="Image">
                      <input id="image-upload1" name="image1" type="file" style="display:none;">

                      <div class="edit-icon">
                      <ion-icon name="pencil-outline" onclick="document.getElementById('image-upload1').click();"></ion-icon>
                      </div>
                    </div>
                    
                    
                    
                    
                   </div>
                   </div>
                   <input type="submit" value="Update Information" class="updatebutton" name="add"  onclick="location.reload(true);window.location.href='agent.php';">
                    
                </form> 
                <?php } ?>
                <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
               <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
                <script src="./assets/js/update_property.js"></script>
</body>
</html>

