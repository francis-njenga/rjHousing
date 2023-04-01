
<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
$error="";
$msg="";

								
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>rJ Housing - Find your dream Home</title>

  <link rel="stylesheet" href="./assets/css/Style.css">
  <link rel="stylesheet" href="./account/css/style.css">
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <script src="./assets/js/script.js"></script>
 
</head>

<body>
<?php include("include/header.php");?>
<main>

 
   
   

      <section class="hero" id="home">
      <div class="container">
          <div class="hero-content">

            <p class="hero-subtitle">
              <ion-icon name="home"></ion-icon>

              <span>Kenya Housing Agency</span>
            </p>

            <h2 class="h1 hero-title">Find Your Dream Home with Us</h2>

            <p class="hero-text">
            The best housing agency in Kenya, with excellent customer service everywhere. Having a five star rating from past clients, give us a try and you won't be disappointed.
            </p>

            <button class="btn">Make An Enquiry</button>

          </div>

          <figure class="hero-banner">
            <img src="assets\images\property-4.png" alt="Modern house model" class="w-100">
          </figure>
        
          
      </section>

      
      
      <section class="property" id="property">
        <div >

          <p class="section-subtitle">Properties</p>

          <h2 class="h2 section-title">Featured Listings</h2>
        <?php $query=mysqli_query($con,"SELECT property.*, agent.aname,agent.utype,agent.aimage,agent.aphone,agent.aemail FROM `property`,`agent` WHERE property.aid=agent.aid ORDER BY date DESC");
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

                      <ion-icon name="bed-outline"></ion-icon>

                      <span>Bedrooms</span>
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
              
            </li>


          </ul>
          <?php } ?>

        </div>
      </section>
     <section class="about" id="about">
        <div class="container">
       

          <figure class="about-banner">
            <img src="./assets/images/about-banner-1.png" alt="House interior">

            <img src="./assets/images/about-banner-2.jpg" alt="House interior" class="abs-img">
          </figure>

          <div class="about-content">

            <p class="section-subtitle">About Us</p>

            <h2 class="h2 section-title">The Leading Home Marketplace In Kenya.</h2>

            <p class="about-text">
             We provide specialized services, and more than 20,000 individuals from 47 counties around the nation have already enrolled with us.
            </p>

            <ul class="about-list">

              <li class="about-item">
                <div class="about-item-icon">
                  <ion-icon name="home-outline"></ion-icon>
                </div>

                <p class="about-item-text">Smart Home Design</p>
              </li>

              <li class="about-item">
                <div class="about-item-icon">
                  <ion-icon name="leaf-outline"></ion-icon>
                </div>

                <p class="about-item-text">Beautiful Scene Around</p>
              </li>

              <li class="about-item">
                <div class="about-item-icon">
                  <ion-icon name="wine-outline"></ion-icon>
                </div>

                <p class="about-item-text">Exceptional Lifestyle</p>
              </li>

              <li class="about-item">
                <div class="about-item-icon">
                  <ion-icon name="shield-checkmark-outline"></ion-icon>
                </div>

                <p class="about-item-text">Complete 24/7 Security</p>
              </li>

            </ul>

            <p class="callout">
              "Don't miss the chance to work with us to sell,rent or purchase a home right away."
            </p>

            <a href="#service" class="btn">Our Services</a>

          </div>

        </div>
      </section>




      <section class="service" id="service">
        <div class="container">

          <p class="section-subtitle">Our Services</p>

          <h2 class="h2 section-title">Our Main Focus</h2>

          <ul class="service-list">

            <li>
              <div class="service-card">

               <div class="card-icon">
                  <img src="./assets/images/service-1.png" alt="Service icon">
                </div> 

                <h3 class="h3 card-title">
                  <a href="#">Buy a home</a>
                </h3>

                <p class="card-text">
                  Over 10,000 homes for sale availabel on the website, we can match you with a house you will want
                  to call home.
                </p>

                <a href="#" class="card-link">
                  <span>Buy A Home</span>

                  <ion-icon name="arrow-forward-outline"></ion-icon>
                </a>

              </div>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <img src="./assets/images/service-2.png" alt="Service icon">
                </div>
              

                <h3 class="h3 card-title">
                  <a href="#">Rent a home</a>
                </h3>

                <p class="card-text">
                  over 50,000 homes availabel for rent on the website, we can match you with a house you will want
                  to call home.
                </p>

                <a href="#" class="card-link">
                  <span>Rent A Home</span>

                  <ion-icon name="arrow-forward-outline"></ion-icon>
                </a>

              </div>
            </li>

            <li>
              <div class="service-card">

               <div class="card-icon">
                  <img src="./assets/images/service-3.png" alt="Service icon">
                </div>
              

                <h3 class="h3 card-title">
                  <a href="submitproperty.php">Sell a home</a>
                </h3>

                <p class="card-text">
                  over 1 million+ Clients have signed with us. post your house for sale, website will match best customer for you.
                  to call home.
                </p>

                <a href="submitproperty.php" class="card-link">
                  <span>Sell A Home</span>

                 <ion-icon name="arrow-forward-outline"></ion-icon>
                </a>

              </div>
            </li>

          </ul>

        </div>
      </section>






     
      <section class="features">
        <div class="container">

          <p class="section-subtitle">House Features.</p>

          <h2 class="h2 section-title">Building Aminities</h2>

          <ul class="features-list">

            <li>
              <a href="#" class="features-card">

                <div class="card-icon">
                  <ion-icon name="car-sport-outline"></ion-icon>
                </div>

                <h3 class="card-title">Parking Space</h3>

                <div class="card-btn">
                  <ion-icon name="arrow-forward-outline"></ion-icon>
                </div>

              </a>
            </li>

            <li>
              <a href="#" class="features-card">

                <div class="card-icon">
                  <ion-icon name="water-outline"></ion-icon>
                </div>

                <h3 class="card-title">Swimming Pool</h3>

                <div class="card-btn">
                  <ion-icon name="arrow-forward-outline"></ion-icon>
                </div>

              </a>
            </li>

            <li>
              <a href="#" class="features-card">

                <div class="card-icon">
                  <ion-icon name="shield-checkmark-outline"></ion-icon>
                </div>

                <h3 class="card-title">Private Security</h3>

                <div class="card-btn">
                  <ion-icon name="arrow-forward-outline"></ion-icon>
                </div>

              </a>
            </li>

            <li>
              <a href="#" class="features-card">

                <div class="card-icon">
                  <ion-icon name="fitness-outline"></ion-icon>
                </div>

                <h3 class="card-title">Medical Center</h3>

                <div class="card-btn">
                  <ion-icon name="arrow-forward-outline"></ion-icon>
                </div>

              </a>
            </li>

            <li>
              <a href="#" class="features-card">

                <div class="card-icon">
                  <ion-icon name="library-outline"></ion-icon>
                </div>

                <h3 class="card-title">Library Area</h3>

                <div class="card-btn">
                  <ion-icon name="arrow-forward-outline"></ion-icon>
                </div>

              </a>
            </li>

            <li>
              <a href="#" class="features-card">

                <div class="card-icon">
                  <ion-icon name="bed-outline"></ion-icon>
                </div>

                <h3 class="card-title">King Size Beds</h3>

                <div class="card-btn">
                  <ion-icon name="arrow-forward-outline"></ion-icon>
                </div>

              </a>
            </li>

            <li>
              <a href="#" class="features-card">

                <div class="card-icon">
                  <ion-icon name="home-outline"></ion-icon>
                </div>

                <h3 class="card-title">Smart Homes</h3>

                <div class="card-btn">
                  <ion-icon name="arrow-forward-outline"></ion-icon>
                </div>

              </a>
            </li>

            <li>
              <a href="#" class="features-card">

                <div class="card-icon">
                  <ion-icon name="football-outline"></ion-icon>
                </div>

                <h3 class="card-title">Kid’s Playland</h3>

                <div class="card-btn">
                  <ion-icon name="arrow-forward-outline"></ion-icon>
                </div>

              </a>
            </li>

          </ul>

        </div>
      </section>

      <section class="cta">
        <div class="container">

          <div class="cta-card">
            <div class="card-content">
              <h2 class="h2 card-title">Looking for a dream home?</h2>

              <p class="card-text">We can help you realize your dream of a new home</p>
            </div>

            <button class="btn cta-btn">
              <span>Explore Properties</span>

              <ion-icon name="arrow-forward-outline"></ion-icon>
            </button>
          </div>

        </div>
      </section>

    </article>
  </main>


  <?php include("include/footer.php"); ?>

  <script type="text/javascript">
        function forgotp(){
          alert("Please keep trying until you remember it");
        }
        function login(a){
          x=a.innerText;
          if(x=="Sign up"){
            login_form.style.display="none";
            signup_form.style.display="block";
            a.innerText="Log in";
          }else {
            signup_form.style.display="none";
            login_form.style.display="block";
            a.innerText="Sign up";
          }
        }
        function logincheck(){
          return true;
        }
        function signupcheck(){
          x=document.signupform.loginname.value;
          y=document.signupform.username.value;
          if(y=="")document.signupform.username.value=x;
          return true;
        }

      </script>



  
  <script src="C:\xampp\htdocs\rjHousing\assets\javaScript\sign.js"></script>
  <script src="assets\js\script.js"></script>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

 
  
</body>

</html>