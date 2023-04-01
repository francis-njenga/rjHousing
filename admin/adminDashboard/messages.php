  
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
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
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
      
      <div>
              <div class="title" style="font-size:30px;"> Messages </div>
            <table>
                    <thead>
                   
                        <tr>
                            <th style="white-space: nowrap;">First Name</th>
                            <th style="white-space: nowrap;">Last Name</th>
                            <th style="white-space: nowrap;">Email</th>
                            <th style="white-space: nowrap;">Message</th>                            
                            <th style="white-space: nowrap;">Upload date</th>
                            <th>Action</th>
                        </tr>
                       
                    </thead>
                    <tbody>
                

                    <?php $query=mysqli_query($con,"SELECT contact_admin.* FROM `contact_admin`ORDER BY date DESC ");
						while($row=mysqli_fetch_array($query))
										{
									?> 
                       
                        <tr>
                            <td><?php echo $row['first_name'];?></td>
                            <td><?php echo $row['last_name'];?></td>
                            <td style="white-space: nowrap;"><?php echo $row['email'];?></td>
                            <td ><?php echo $row['Message'];?></td>
                            <td style="white-space: nowrap;"><?php echo $row['date'];?></td>

                            
                            <td><button type="button" onclick="deleteDetails(<?php echo $row['contact_admin_id']; ?>)"> Delete</button> </td>                            
                        </tr>
                        <?php } ?>
            </tbody>
            </table>
            </div>
        </div>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
   
    <script src="js/scripts.js"></script>
        </body>
        </html>