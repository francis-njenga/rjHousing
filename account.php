
<?php

ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");

if(isset($_POST['uid'])) {
$id=$_POST['uid'];
$updates = array();
if (!empty($_POST['firstName'])) {
  $firstname = $_POST['firstName'];
  $updates[] = "uname = '$firstname'";
}

if (!empty($_POST['email'])) {
  $email = $_POST['email'];
  $updates[] = "uemail = '$email'";
}

if (!empty($_POST['phoneNumber'])) {
  $userPhone = $_POST['phoneNumber'];
  $updates[] = "uphone = '$userPhone'";
}

// if (!empty($_POST['userPassword'])) {
//   $userPassword = $_POST['userPassword'];
//   $updates[] = "upass = '$userPassword'";
// }

if (!empty($_FILES['image']['name'])) {
 
  $image_tmp = $_FILES['image']['tmp_name'];
  $image_name = $_FILES['image']['name'];
  move_uploaded_file($image_tmp, "admin/user/".$image_name);
  $image = $image_name;
  $updates[] = "uimage = '$image'";
}


if (!empty($updates)) {
    $updates_str = implode(", ", $updates);
    $sql = "UPDATE user SET $updates_str WHERE uid = '$id'";
    if (mysqli_query($con, $sql)) {
        header("location:account.php");
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
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
<style type="text/css">
    input[type=text]{
        width:70%;
        
    }
    </style>
   
</head>

<body style="background-color:hsl(192, 24%, 96%);">
<?php include("include/header.php");?>
  <?php 
 
   $query=mysqli_query($con,"SELECT user.* FROM `user` WHERE uid='{$_SESSION['uid']}'");
   while($row=mysqli_fetch_array($query))
        {
       
    ?>
   <form method="post" action="account.php" id="form-update"  style="display:block; padding:3rem 10rem; margin-top:10px; border:none;"enctype="multipart/form-data" >
          <div style="text-align:center;"><p>Update Your Profile.</p></div>
             <div class="image-box" style="margin-left:11.9rem; margin-bottom:3rem; ">
                      <img style="height:200px; width:200px; border-radius:50%; "src="admin/user/<?php echo $row['uimage']; ?>" alt="Image">
                      <input id="image-upload1" name="image" type="file" style="display:none;">

                      <div class="edit-icon">
                      <ion-icon name="pencil-outline" onclick="document.getElementById('image-upload1').click();"></ion-icon>
                      </div>
              </div>
              <input type="hidden" name="uid" value="<?php echo $row['uid']; ?>">

               <div style="padding-left:8rem;">  
                <label class="neme">First Name:</label>
                <div>
                <input type="text" name="firstName"placeholder="<?php echo $row['uname'];?>"  /><br/><br/>
                </div>  
                 <label>Email</label>
                    <div >
                    <input type="text"  name="email"  placeholder="<?php echo $row['uemail'];?>">
                    </div>
                    <label >Phone Number</label>                                    
                    <div >
                    <input type="text"  name="phoneNumber"  placeholder="<?php echo $row['uphone'];?>">
                    </div>
                   </div>
                   <div style="padding-left:10rem;" >
                   <input  type="submit" value="Update Profile" class="updatebutton" >
                  </div>
                </form> 
                <?php } ?>
                <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
               <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
                <script src="./assets/js/update_property.js"></script>
</body>
</html>

