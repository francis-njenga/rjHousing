<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");


if (isset($_GET['delete'])) {
  $delete_id = $_GET['delete'];
  $delete_query = mysqli_query($con, "DELETE FROM `property` WHERE pid=$delete_id") or die('query failed');
  if ($delete_query) {
    $message[]='product deleted sucessfully';
  } else {
    $message[]='product was not deleted sucessfully';
  }
  echo implode(', ', $message);
}
		


?> 
   
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <link rel="stylesheet" href="css/styles.css">
    
  </head>
  <body>
  <div id="message" style="display: none; background-color: #f8d7da; border: 1px solid #f5c6cb; border-radius: 5px; padding: 10px;"></div>
<div id="modal-overlay"></div>
<div id="confirm-modal" style="display: none;">
  <div id="confirm-dialog">
  <ion-icon style="color: hsl(327, 90%, 28%); font-size:100px;" name="warning"></ion-icon>
  <div class="confirm-text">
  <p class="subtitle">Are you sure you want to delete this Property?</p>
  <div class="confirm-buttons">
    <button id="confirm-yes">Yes</button>
    <button id="confirm-no">No</button>
</div>
</div>
</div>
</div>
  <div class="grid-container">
  <header class="header">
  <div class="menu-icon" onclick="openSidebar()">
    <span class="material-icons-outlined">menu</span>
  </div>
  <div class="header-left">
          <span class="material-icons-outlined">search</span>
          <input type="search" name="search" placeholder="search">
        </div>
  <div class="header-right">
     <span class="header-button">	<a  style="color:white; font-size:18px; font-weight:600;" href="http://localhost/rjhousing/logout.php">Logout
              </a>  </span>
    <span class="material-icons-outlined">notifications</span>
    <span class="material-icons-outlined">email</span>
    <span class="material-icons-outlined">account_circle</span>
  </div>
</header>
  <aside id="sidebar">
        <div class="sidebar-title">
          <div class="sidebar-brand">

            <span class="material-icons-outlined">admin_panel_settings</span> ADMINISTRATOR
          </div>
          <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
        </div>

        <ul class="sidebar-list">
          <li class="sidebar-list-item">
            <a href="index.php" >
              <span class="material-icons-outlined">dashboard</span> Dashboard
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="property.php" >
              <span class="material-icons-outlined">home</span> Properties
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="agent.php" >
              <span class="material-icons-outlined">person_outline</span> Agents
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="messages.php" >
              <span class="material-icons-outlined">message</span> Messages
            </a>
          </li>
          
          <li class="sidebar-list-item">
            <a href="users.php" >
              <span class="material-icons-outlined">person_outline</span> Users
            </a>
          </li>
          
        </ul>
      </aside>
      
      
           <div >
           <div class="title" style="font-size:30px;"> Properties</div>
                <table>
                    <thead>
                   
                        <tr>
                            <th>Property Image</th>
                            <th>Property Name</th>
                            <th>Agent Name</th>
                            <th>sale type</th>
                            <th>Property Type</th>
                            <th>Location</th>
                            <th>Property Price</th>
                            <th style="white-space: nowrap;">Upload date</th>
                            <th>Action</th>
                        </tr>
                       
                    </thead>
                    <tbody>
                

                    <?php $query=mysqli_query($con,"SELECT property.*, agent.aname,agent.utype,agent.aimage,agent.aphone,agent.aemail FROM `property`,`agent`  WHERE property.aid= agent.aid ORDER BY date DESC ");
						while($row=mysqli_fetch_array($query))
										{
									?> 
                       
                        <tr>
                            <td><img class="w-100" src="http://localhost/rjHousing/admin/property/<?php echo $row['image'];?>">  </td>
                            <td><?php echo $row['title'];?></td>
                            <td><?php echo $row['aname'];?></td>
                            <td><?php echo $row['submitType'];?></td>
                            <td ><?php echo $row['propertyType'];?></td>
                            <td><?php echo $row['county'];?>,<?php echo $row['constituency'];?></td>
                            <td><?php echo $row['price'];?></td>
                            <td style="white-space: nowrap;"><?php echo $row['date'];?></td>
                            <td><button type="button" onclick="deleteDetails(<?php echo $row['pid']; ?>)"> Delete</button> </td>                            
                        </tr>
                        <?php } ?>
            </tbody>
            </table>
            </div>
        </div>
        <script type="text/javascript" href="js/scripts.js" >
          function deleteDetails(pid) {
  var confirmModal = document.getElementById("confirm-modal");
  var overlay=document.getElementById("modal-overlay")
  confirmModal.style.display = "block";
  overlay.style.display="block";
  var confirmYes = document.getElementById("confirm-yes");
  var confirmNo = document.getElementById("confirm-no");
  confirmYes.onclick = function() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var messageDiv = document.getElementById("modal-overlay");
        messageDiv.innerHTML = this.responseText;
        messageDiv.style.display = "block";
        setTimeout(function() {
          messageDiv.style.display = "none";
        }, 3000);
        location.reload();
      }
    };
    xmlhttp.open("GET", "property.php?delete=" + pid, true);
    xmlhttp.send();
    confirmModal.style.display = "none";
  };
  confirmNo.onclick = function() {
    confirmModal.style.display = "none";
    overlay.style.display="none";
  };
}
        </script>
          <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
   
    <script src="js/scripts.js"></script>
        </body>
        </html>