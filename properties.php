
<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
$whereClause = "";
if(isset($_REQUEST['search'])){


if (!empty($_POST['county'])) {
    $whereClause .= " AND county='{$_POST['county']}'";
}
if (!empty($_POST['submitType'])) {
  $whereClause .= " AND submitType='{$_POST['submitType']}'";
}


if (!empty($_POST['bedroom'])) {
    $whereClause .= " AND bedroom='{$_POST['bedroom']}'";
}
if (!empty($_POST['areaSize'])) {
    $whereClause .= " AND areaSize>='{$_POST['areaSize']}'";
}
if (!empty($_POST['bathroom'])) {
    $whereClause .= " AND bathroom='{$_POST['bathroom']}'";
}
if (!empty($_POST['kitchen'])) {
    $whereClause .= " AND kitchen='{$_POST['kitchen']}'";
}
if (!empty($_POST['propertyType'])) {
    $whereClause .= " AND propertyType='{$_POST['propertyType']}'";
}
if (!empty($_POST['price'])) {
    $whereClause .= " AND price<='{$_POST['price']}'";
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

  <link rel="stylesheet" href="./assets/css/properties.css">
  <link rel="stylesheet" href="./assets/css/style.css">
  
 
</head>

<?php include("include/header.php");?>

<body style="background-color: var(--cultured-2);">
  
 

	<div class="container" style="display:flex; padding:0; ">
		
		<div class="filter sticky"  style=" width:25%; height:100%;">
    <form method="post" action="properties.php" id="myForm">
    <div class="filter-content">
			<h2>Advanced Search</h2>
      <select class="submit-type" name="submitType">
        <option value="">purchase option</option>
        <option value="rent">Rent</option>
        <option value="sale"> Sale</option>
        
  </select>
      
      <input type="text" name="county" placeholder="County">
			
			<input id="bedrooms" name="bedroom" type="number" placeholder="Bedrooms">
      <input id="areaSize" name="areaSize" type="number" placeholder="Min size (in sqft)">
        <input id="bathroom" name="bathroom" type="number" placeholder="Bathrooms">   

        <input id="kitchen" name="kitchen" type="number" placeholder="Kitchen">   

		
		<select id="type" name="propertyType">
			<option value="">Type of House</option>
      <option value="">Any</option>
			<option value="apartment">Apartment</option>
			<option value="house">House</option>
			<option value="building">Building</option>
			<option value="office">Office</option>
		</select>
		
		
		<label for="price">Price KSH:<b id="price-output" Style="color:darkblue;"> 0 - 100,000,000</b></label>
		<input type="range" id="price" name="price" min="0" max="100000000" step="10000">
		
    <div class="search-btn">    
      
      <input id="sub-filter" type="submit" value="Search Properties" name="search" style=" all:unset; background-color:dark-blue;"> 

    </div>
</div>
</form>
	</div>


  <div class="property" id="property" style="padding:0; width:70%;  background-color:var(--cultured-2)">
        <div>

        <div style=" text-align:center;">
        <p class="filter-title">properties listing</p>
        
         </div>
         <div class="sort" style="display:flex; width:100%;">
         <div style="width:50%; " class="filter-subtitle">
          Sort by
         </div>
         <form id="sort-form" method="GET" action="properties.php">
          <div class="sort-items"style="display:flex;">
          <div>
           <select id="sortBy-price" name="price" style="padding:10px; margin:10px;">
			     <option value="">Price</option>      
			     <option value="highToLow">High to Low</option>
			     <option value="lowToHigh">Low to High</option>
           
		      </select>
         </div>
              <div>
              <select id="sortBy-date" name="date" style="padding:10px; margin:10px;">>
			          <option value="">Upload Date</option>
                 <option value="fromLatest">From Latest</option>
			          <option value="fromOld">From old</option>		          	
		         </select>
              </div>
        </div>
       </form>
           </div>
           
         
        
  
           <?php 
          $query = "SELECT property.*, agent.aname, agent.utype, agent.aimage, agent.aphone, agent.aemail 
          FROM `property`,`agent` 
          WHERE property.aid=agent.aid";

          if (!empty($whereClause)) {
          $query .=" ".$whereClause;
          }
          if (!empty($_GET['price']) && !empty($_GET['date'])) {
            if ($_GET['price'] == 'highToLow') {
              $query .= " ORDER BY price DESC";
            } else {
              $query .= " ORDER BY price ASC";
            }
          
            if ($_GET['date'] == 'fromLatest') {
              $query .= ", date DESC";
            } else {
              $query .= ", date ASC";
            }
          } elseif (!empty($_GET['price'])) {
            if ($_GET['price'] == 'highToLow') {
              $query .= " ORDER BY price DESC";
            } else {
              $query .= " ORDER BY price ASC";
            }
          } elseif (!empty($_GET['date'])) {
            if ($_GET['date'] == 'fromLatest') {
              $query .= " ORDER BY date DESC";
            } else {
              $query .= " ORDER BY date ASC";
            }
          }
          
       $result = mysqli_query($con, $query);
      

       if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)) {
         ?>
          <ul class="property-list" style=" padding:20px;  all: unset;">

            <li>
              <div class="property-card" style="display:flex; width:100%; background-color:white;">
                <div>
                <figure class="card-banner" style="width:350px; height:100%;">

                 <a href="#">
                 <img  class="w-100" src="admin/property/<?php echo $row['image'];?>">
                 
                
                   
                  </a>
                  <div class="card-badge green" > <?php echo $row['submitType'];?>
                  </div> 
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
                  </div>
                  <div>
                 
                 

                </figure>

                <div class="card-content">

                  <div class="card-price">
                    
                  </div>

                  <h3 class="h3 card-title">
                  <form method="post" action="propertydetail.php">
                  <input type="hidden" name="pid" value="<?php echo $row['pid']; ?>">
                  <strong>  <?php echo $row['title'];?></strong>
                 
                  </form>
                  </h3>
                  <button type="submit" style=" all:unset; height:auto; font-weight:bold; text-decoration:underline; ">KSh.<?php echo $row['price']; ?></button>
                  <p class="card-text" style=" all:unset; height:150x;">
                  <?php echo $row['description'];?>
                  </p>

                  <ul class="card-list">

                    <li class="card-item">
                      <strong><?php echo $row['bedroom'];?></strong>

                      <ion-icon name="bed-outline"></ion-icon>

                      <span>Bedrooms</span>
                    </li>
                    <li class="card-item">
                      <strong><?php echo $row['kitchen'];?></strong>

                      <ion-icon name="home-outline"></ion-icon>

                      <span>kitchen</span>
                    </li>

                    <li class="card-item">
                      <strong><?php echo $row['bathroom'];?></strong>

                      <ion-icon name="man-outline"></ion-icon>

                      <span>Bathrooms</span>
                    </li>

                    <li class="card-item">
                      <strong><?php echo $row['areaSize'];?></strong>

                      <ion-icon name="square-outline"></ion-icon>

                      <span>Square Ft</span>
                    </li>

                  </ul>

                </div>

                <div class="card-footer">

                  <div class="card-author">

                    <figure class="author-avatar">
                    <img src="admin/agent/<?php echo $row['aimage'];?>">
                     
                    </figure>

                    <div>
                      <p class="author-name">
                        <a href="#"><?php echo $row['aname'];?></a>
                      </p>

                      <p class="author-title"><?php echo $row['utype'];?></p>
                    </div>

                  </div>

                  <div class="card-footer-actions">

                    <button class="card-footer-actions-btn">
                      <ion-icon name="heart-outline"></ion-icon>
                    </button>
                    <button class="card-footer-actions-btn">
                      <ion-icon name="call-outline"></ion-icon>
                    </button>
                    <button class="card-footer-actions-btn">
                      <ion-icon name="share-social-outline"></ion-icon>
                    </button>


                    <a href="https://wa.me/254<?php echo $row['aphone']; ?>/?text=Hi%20<?php echo $row['aname']; ?>%2C%20%20Am%20interested%20in%20your%20property">
                    <button class="card-footer-actions-btn">
                      <ion-icon name="logo-whatsapp"></ion-icon>
                    </button>
                    </a>
                    <a href="mailto:<?php echo $row['aemail']; ?>?text=Hi%20<?php echo $row['aname']; ?>%2C%20%20Am%20interested%20in%20your%20property">
                    <button class="card-footer-actions-btn">
                      <ion-icon name="mail-outline"></ion-icon>
                    </button>
                  </a>
                  </div>

                </div>
                    </div>
              </div>
              
            </li>


          </ul>
          <?php }} ?>

        </div>
    </div>
	

</div>
                    </div>
       <script src="./assets/js/script.js"></script>
			<script src="./assets/javaScript/properties.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
    </html>