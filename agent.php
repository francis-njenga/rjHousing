
<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['aemail']))
{
	header("location:login.php");
}

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
if (isset($_GET['deleteMessage'])) {
  $delete_id = $_GET['deleteMessage'];
  $delete_query = mysqli_query($con, "DELETE FROM `contact_agent` WHERE bookingID=$delete_id") or die('query failed');
  if ($delete_query) {
    $message[]='Message deleted sucessfully';
  } else {
    $message[]='Message was not deleted sucessfully';
  }
  echo implode(', ', $message);
}
		
							
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>rJ Housing - Find your dream Home</title>

  <link rel="stylesheet" href="./assets/css/Style.css">
  <link rel="stylesheet" href="./assets/css/update.css">
  <link rel="stylesheet" href="http://localhost/rjhousing/assets/css/Style.css">
  
  <script src="./assets/js/update_property.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

<?php include("agentHeader.php") ?>
<div id="message" style="display: none; background-color: #f8d7da; border: 1px solid #f5c6cb; border-radius: 5px; padding: 10px;"></div>
<div id="modal-overlay"></div>
<div id="confirm-modal" style="display: none;">
  <div id="confirm-dialog">
  <ion-icon style="color: hsl(327, 90%, 28%); font-size:100px;" src="icons/warning.svg"></ion-icon>
  <div class="confirm-text">
  <p class="subtitle">Are you sure you want to delete this ?</p>
  <div class="confirm-buttons">
    <button id="confirm-yes">Yes</button>
    <button id="confirm-no">No</button>
</div>
</div>

  </div>
</div>

   <section class="service" id="service" style="padding-top:50px;">
        <div class="container">

          <p class="section-subtitle">properties</p>

          <h2 class="h2 section-title">My Properties</h2>

          <ul class="service-list">

            <li>
              <div class="service-card">

               <div class="card-icon">
                 
                </div> 

                <h3 class="card-title">
                 
                  <?php

                $aid = $_SESSION['aid'];
                 $query = mysqli_query($con, "SELECT COUNT(*) FROM property WHERE aid=$aid AND submitType='sale'");
                 $row = mysqli_fetch_array($query);
                 $total = $row[0];
                ?>
               <div class="numeral"><?php echo $total; ?></div>

                </h3>

                <p class="card-text">
                  Total Properties for Sale.
                </p>

                <a href="#" class="card-link">
                  <span>More details</span>

                  <ion-icon name="arrow-forward-outline"></ion-icon>
                </a>

              </div>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon">
                 
                </div>
              

                <h3 class="card-title">
                  
                  <?php

                 $aid = $_SESSION['aid'];
                 $query = mysqli_query($con, "SELECT COUNT(*) FROM property WHERE aid=$aid AND submitType='rent'");
                 $row = mysqli_fetch_array($query);
                 $total = $row[0];
                ?> 
                <div class="numeral"><?php echo $total; ?></div>
                </h3>

                <p class="card-text">
                  Total Properties for Rent.
                </p>

                <a href="#" class="card-link">
                  <span>More details</span>

                  <ion-icon name="arrow-forward-outline"></ion-icon>
                </a>

              </div>
            </li>

            <li>
              <div class="service-card">

               <div class="card-icon">
                  
                </div>
              

                <h3 class="card-title">
                  
                  <?php

                  $aid = $_SESSION['aid'];
                  $query = mysqli_query($con, "SELECT COUNT(*) FROM property WHERE aid=$aid AND currentStatus='sold'");
                  $row = mysqli_fetch_array($query);
                  $total = $row[0];
                    ?>
                  <div class="numeral" ><?php echo $total; ?></div> 
                </h3>

                <p class="card-text">
                  Total Properties Sold Out
                </p>

                <a href="submitproperty.php" class="card-link">
                  <span>More details</span>

                 <ion-icon name="arrow-forward-outline"></ion-icon>
                </a>

              </div>
            </li>

          </ul>

        </div>
    
   </section> 

  <section class="property">
    <div id="overlay"></div>
  <p class="section-subtitle">My Properties Listing</p>
   <?php $query=mysqli_query($con,"SELECT property.*, agent.aname,agent.utype,agent.aimage,agent.aphone,agent.aemail FROM `property`,`agent`  WHERE property.aid= '{$_SESSION['aid']}'  GROUP BY property.pid ORDER BY date DESC ");
						while($row=mysqli_fetch_array($query))
										{
									?>        
         <ul class="property-list">
            <li>
              <div class="property-card">

              
                <figure class="card-banner">
                 <a href="#">
                 <img class="w-100" src="admin/property/<?php echo $row['image'];?>">         
                   </a>
                  <div class="card-badge green"><?php echo $row['submitType'];?></div>
                  <div class="banner-actions">
                    <button class="banner-actions-btn">
                      <ion-icon name="location"></ion-icon>
                      <address> <?php echo $row['constituency'];?>,<?php echo $row['county'];?> </address>
                    </button>
                    <button class="banner-actions-btn">
                      <ion-icon name="camera"></ion-icon>
                      <span>2</span>
                    </button>
                    <button class="banner-actions-btn">
                      <ion-icon name="film"></ion-icon>
                      <span>2</span>
                    </button>
                  </div>
                </figure>
                <div class="card-content">
                  <div class="card-price">
                    <strong> KSh. <?php echo $row['price'];?></strong>
                  </div>
                  <h3 class="h3 card-title">
                  <form method="post" action="propertydetail.php">
                  
                  <input type="hidden" name="pid" value="<?php echo $row['pid']; ?>">
                  <button type="submit"><?php echo $row['title']; ?></button>
                  </form>                                 
                  </h3>
                  <p class="card-text">
                  <?php echo $row['description'];?>
                  </p>
                  <ul class="card-list">
                    <li class="card-item">
                      <strong><?php echo $row['bedroom'];?></strong>
                      <ion-icon src="./icons/man-outline.svg"></ion-icon>
                      <span>Bedrooms</span>
                    </li>
                    <li class="card-item">
                      <strong><?php echo $row['bathroom'];?></strong>
                      <ion-icon src="./icons/man-outline.svg"></ion-icon>
                      <span>Bathrooms</span>
                    </li>
                    <li class="card-item" >
                      <strong><?php echo $row['areaSize'];?></strong>
                      <ion-icon src="./icons/square-outline.svg"></ion-icon>
                      
                      <span>Square Ft</span>
                    </li>
                  </ul>
                </div>
                <div class="card-footer">
                  <ul class="card-list" style="white-space:nowrap;">   
                 <li class="card-item" style="display:flex; justify-content: space-between; margin-right:0;">
                <ion-icon style="font-size:32px;"src="./icons/pencil-outline.svg"></ion-icon>
                  <form method="post" action="update.php">
                  <input type="hidden" name="pid" value="<?php echo $row['pid']; ?>">
                 
                  <button style="padding-top:8px;" type="submit">Edit Property</button>
                  </form> </li>

                    <li class="card-item" style="display:flex; justify-content: space-between;">
                     <ion-icon style="font-size:32px;" src="./icons/trash-outline.svg"></ion-icon>
                      <button type="button" onclick="deleteDetails(<?php echo $row['pid']; ?>)"> Delete</button> </li>
                                     </ul>
                 </div>               
              </div>
            
              </li>
          </ul>
         
            <?php } 
            ?>     
          
        

            
        </section>
        <section style="padding:30px;">
          <style>
            
table {
  border-collapse: collapse;
  margin:auto;
}

td, th {
  border: 1px solid black;
}
tr:nth-child(even) {
  background-color: #f2f2f2;
}
th {
  text-align: left;
  color:black;
  font-size:1rem;
  font-weight:700;

}

td {
  text-align: right;
}
td, th {
  padding: 10px;
}
td {
  font-weight:600;
  font-family: Arial, sans-serif;
  color: black;
  font-size: 1rem;
}
table {
  box-shadow: 2px 2px 5px white;
  margin:20px;
}

tr:hover {
  box-shadow: 1px 1px 2px #888888;
}
table {
  border-collapse: collapse;
}

th {
  border-bottom: 3px solid var(--orange-soda);
  border-right: none;
  border-top:3px solid var(--orange-soda);
}

 th {
  border-left: none;

}
td{
border-bottom: 1.5px solid var(--orange-soda);
}
table {
  table-layout: fixed;
}


td img {
  height: 100px;
  width: 100px;
  object-fit: cover;
}

tr {
  height: 100px;
}

.agent-message button {
  display: block;
  width: 100%;
  height: 50px;
  margin-top: 30px;
  padding: 10px;
  font-size: 18px;
  font-weight: bold;
  text-transform: uppercase;
  border: none;
  border-radius: 5px;
  background-color: var(--orange-soda);
  color: #fff;
  cursor: pointer;
  transition: all 0.3s ease;
}

.agent-message button:hover {
  background-color: black;
}

            </style>
        <div class="agent-message">
    <div class="title" style="font-size:30px;"> My Message</div>
                <table>
                    <thead>
                   
                        <tr>
                            <th>Customer Image</th>
                            <th>Customer Name</th>
                            <th>Customer Email</th>
                            <th>Customer Phone</th>
                            <th>Property Iterested In</th>
                            <th>Property Location</th>
                            <th>Tour Date</th>
                            <th style="white-space: nowrap;">Book date</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                       
                    </thead>
                    <tbody>
                

                    <?php $query=mysqli_query($con,"SELECT contact_agent.* FROM `contact_agent`  WHERE contact_agent.agentID= {$_SESSION['aid']} ORDER BY bookingDate DESC ");
					       	while($row=mysqli_fetch_array($query))
										{
									?> 
                       
                        <tr>
                            <td><img class="w-100" src="http://localhost/rjHousing/admin/user/<?php echo $row['userImage'];?>">  </td>
                            <td><?php echo $row['userName'];?></td>
                            <td><?php echo $row['userEmail'];?></td>
                            <td><?php echo $row['userPhone'];?></td>
                            <td ><?php echo $row['propertyName'];?></td>
                            <td><?php echo $row['propertyLocation'];?></td>
                            <td style="white-space: nowrap;"><?php echo $row['visitDate'];?></td>
                            <td style="white-space: nowrap;"><?php echo $row['bookingDate'];?></td>
                            <td><?php echo $row['message'];?></td>
                            <td><button type="button" onclick="deleteMessage(<?php echo $row['bookingID']; ?>)"> Delete</button> </td>  
                          
                        </tr>
                        <?php } ?>
            </tbody>
            </table>
            </div>
        </section>
       <script type="text/javascript">
        </script>


         <script src="./assets/js/update_property.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

 </body>
</html>

