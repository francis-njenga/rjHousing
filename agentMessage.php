<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['aid']))
{
	header("location:index.php");
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
							
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>rJ Housing - Find your dream Home</title>

  
  <link rel="stylesheet" href="./assets/css/style.css">

  
  <script src="./assets/js/update_property.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

<?php include("agentHeader.php") ?>
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
                                        <td><button type="button" onclick="deleteDetails(<?php echo $row['bookingID']; ?>)"> Delete</button> </td>                            
                                    </tr>
                                    <?php } ?>
                        </tbody>
                        </table>
                        </div>
                    </section>
       
</body>
</html>