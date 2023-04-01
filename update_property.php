<?php

session_start();
include("config.php");


if (!isset($_SESSION['aid'])) {

  header('Location: login.php');
  exit();
}



// Check if the request method is POST

if(isset($_REQUEST['update'])) {
  // Get the property ID from the form data
  $pid = $_POST['pid'];

  // Get the new property details from the form data
  $title = $_POST['title'];
  $description = $_POST['description'];
  $bedroom = $_POST['bedroom'];
  $bathroom = $_POST['bathroom'];
  $areaSize = $_POST['areaSize'];
  $price = $_POST['price'];

  // Update the property details in the database
  $update_query = "UPDATE property SET title='$title', description='$description', bedroom='$bedroom', bathroom='$bathroom', areaSize='$areaSize', price='$price' WHERE pid='$pid'";
  $result = mysqli_query($con, $update_query);

  // Check if the query was successful
  if ($result) {
    // Send a success response to the client
    echo 'success';
  } else {
    // Send an error response to the client
    echo 'error';
  }
}

// Close the database connection
mysqli_close($con);
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>rJ Housing - Find your dream Home</title>
  <script src="assets\js\update_property.js"><script>

  <style> 
 
    /* Update form styles */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgba(0,0,0,0.4); /* Black background with opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: 10% auto; /* 10% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Close button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

/* Form styles */
form {
  display: flex;
  flex-direction: column;
}

label {
  margin-top: 10px;
  font-weight: bold;
}

input[type="text"], input[type="number"], textarea {
  padding: 10px;
  margin-bottom: 20px;
  border: none;
  border-radius: 4px;
  background-color: #f2f2f2;
}

input[type="submit"], button {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover, button:hover {
  background-color: #45a049;
}

input[type="hidden"] {
  display: none;
}

  </style>
 
  <script src="assets\js\update_property.js"></script>
</head>

<body>


<div id="updateModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Update Property Details</h2>
    <form id="updateForm" action="udate_property.php">
      <label for="title">Title:</label>
      <input type="text" name="title" value="<?php echo $row['title']; ?>" placeholder="Enter new title">
      <label for="description">Description:</label>
      <textarea name="description" placeholder="Enter new description"><?php echo $row['description']; ?></textarea>
      <label for="bedroom">Bedrooms:</label>
      <input type="number" name="bedroom" value="<?php echo $row['bedroom']; ?>" placeholder="Enter new number of bedrooms">
      <label for="bathroom">Bathrooms:</label>
      <input type="number" name="bathroom" value="<?php echo $row['bathroom']; ?>" placeholder="Enter new number of bathrooms">
      <label for="areaSize">Area Size:</label>
      <input type="number" name="areaSize" value="<?php echo $row['areaSize']; ?>" placeholder="Enter new area size in sqft">
      <label for="price">Price:</label>
      <input type="number" name="price" value="<?php echo $row['price']; ?>" placeholder="Enter new price in KSh.">
      <input type="hidden" name="pid" value="<?php echo $row['pid']; ?>">
      <button type="submit">Update</button>
    </form>
  </div>
</div>
    
</body>
</html>