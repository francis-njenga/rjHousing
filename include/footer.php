<footer class="footer">

<div class="footer-top">
  <div class="container">

    <div class="footer-brand">

      <a href="#" class="logo">
        <img src="assets\images\png\logo-no-background.png" style="height:70px; width: 100px;" alt="dark logo">
      </a>

      <p class="section-text" style="color:white;">
        rjHousing, we have our offices in Nairobi, Kenya. If you have any problems in accessing our service feel free to tell our customer care anytime.
      </p>

     

    </div>

    <div class="footer-link-box">

      <ul class="footer-list">

        <li>
          <p class="footer-list-title">Company</p>
        </li>

        <li>
          <a href="#" class="footer-link">About US</a>
        </li>

        

        <li>
          <a href="#" class="footer-link">All Products</a>
        </li>

        <li>
          <a href="#" class="footer-link">HOME</a>
        </li>

        
        <li>
          <a href="#" class="footer-link">Contact us</a>
        </li>

      </ul>

      <ul class="footer-list">
        <li>
          <p class="footer-list-title">Services</p>
        </li>
        <?php  if(isset($_SESSION['uemail']))
                
								{ ?>
							 <li class="footer-link"  >	<a  style="color:white; font-weight:600;"  href="logout.php">Logout
              </a> </li> 
              <li class="footer-link" >
              <button style="color:white; font-weight:600;"  onclick="showLoginForm()"> Login As Agent </button></li>&nbsp;&nbsp;
            </li>

             <li class="footer-link" >
             <button style="color:white; font-weight:600;"  onclick="showLoginForm()"> Login As Admin </button></li>&nbsp;&nbsp; 
              </li>
             
               &nbsp;&nbsp;<?php  } else { ?>
							<li class="footer-link" > <button style="color:white; font-weight:600;"  onclick="showLoginForm()"> Login As User </button></li>&nbsp;&nbsp;
              
							<li class="footer-link" > <button style="color:white; font-weight:600;"  onclick="showRegisterForm()"> Register </button></li>
              <li class="footer-link" >
                <button style="color:white; font-weight:600;"  onclick="showLoginForm()"> Login As Agent </button></li>&nbsp;&nbsp;
              </li>

              <li class="footer-link" >
                <button style="color:white; font-weight:600;"  onclick="showLoginForm()"> Login As Admin </button></li>&nbsp;&nbsp; 
              </li>
              <?php } ?>
              
      </ul>
      <div class="footer-brand">
      <ul class="contact-list">
      <li>
          <p class="footer-list-title">Contact Details</p>
        </li>
        <li>
          <a href="#" class="contact-link">
            <ion-icon name="location-outline"></ion-icon>

            <address>Parklands, Nairobi, Kenya</address>
          </a>
        </li>

        <li>
          <a href="tel:+254794349788" class="contact-link">
            <ion-icon name="call-outline"></ion-icon>

            <span>+254794349788</span>
          </a>
        </li>

        <li>
          <a href="mailto:rajeynjenga@gmail.com" class="contact-link">
            <ion-icon name="mail-outline"></ion-icon>

            <span>rajeynj@gmail.com</span>
          </a>
        </li>

      </ul>

      <ul class="social-list">

        <li>
          <a href="#" class="social-link">
            <ion-icon name="logo-facebook"></ion-icon>
          </a>
        </li>

        <li>
          <a href="#" class="social-link">
            <ion-icon name="logo-twitter"></ion-icon>
          </a>
        </li>

        <li>
          <a href="#" class="social-link">
            <ion-icon name="logo-linkedin"></ion-icon>
          </a>
        </li>

        <li>
          <a href="#" class="social-link">
            <ion-icon name="logo-youtube"></ion-icon>
          </a>
        </li>

      </ul>
      
</div>
    </div>

  </div>
</div>

<div class="footer-bottom">
  <div class="container">

    <p class="copyright">
      &copy; 2022 <a href="#">rJHousing</a>. All Rights Reserved
    </p>

  </div>
</div>

</footer>