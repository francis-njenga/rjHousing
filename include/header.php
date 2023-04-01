<?php

$msg="";
$error="";
include("config.php");
?>
<link rel="stylesheet" href="./account/css/style.css">


<header class="header" >
    
    <div class="header-bottom">
   

      

        <nav class="navbar" data-navbar>
          <div class="navbar-bottom">
            <ul class="navbar-list">
              <li>   <a href="index.php" class="logo">
          
          <img src="assets\images\png\logo-no-background.png" style="height: 4.3rem; width:7.5rem;" alt="logo image here"> </a></li>

              <li>
                <a href="index.php" class="navbar-link" data-nav-link> HOME</a>
                
              </li>

              <li>
                <a href="contact.php" class="navbar-link" data-nav-link>CONTACT</a>
              </li>
              <li>
                <a href="#about" class="navbar-link" data-nav-link>ABOUT</a>
              </li>

              <li>
                <a href="properties.php" class="navbar-link" data-nav-link>BUY</a>
              </li>

              <li>
                <a href="properties.php" class="navbar-link" data-nav-link>RENT</a>
              </li>

              <li>
                <a href="properties.php" class="navbar-link" data-nav-link>LISTING</a>
              </li>
              
            </ul>
          </div>

    
      </nav>

        <div class="header-bottom-actions">

      
             <div class="navbar-bottom-login" id="user-profile-link" >
              <ul class="navbar-list" style="margin:0px;">
                <?php  if(isset($_SESSION['uemail']))
                
								{ ?>
							 <li class="navbar-link-login header-button" style="margin:0;" >	<a  style="color:black" href="logout.php">Logout
              </a> </li> 
             
               &nbsp;&nbsp;<?php  } else { ?>
							<li class="navbar-link-login header-button" > <button  onclick="showLoginForm()"> Login </button></li>&nbsp;&nbsp;
              
							<li class="navbar-link-login header-button"> <button  onclick="showRegisterForm()"> Register </button></li><?php } ?>

               
				         <?php
                 if(isset($_SESSION['uid'])) {
                 $query=mysqli_query($con,"SELECT user.* FROM `user` WHERE user.uid = '{$_SESSION['uid']}' ");
                 while($row=mysqli_fetch_array($query)) {
                 ?>
                 
                <div class="my-details">
              <a href="account.php">  <p style="font-size:16px; margin:0; padding:0; cursor:pointer;"><?php echo $row['uname'];?></p></a>
            <div class="dropdown-menu">
            
            <a href="account.php"  style="whitespace:nowrap;">Edit Profile</a>
             </div>
            </div>
                <a href="account.php" ><figure class="author-avatar" style="margin:0; width:3rem; height:3rem;">
          
              <img style="width:100%; height:100%;"src="admin/user/<?php echo $row['uimage'];?>">
               </figure>
                 </a>
              <?php 








           }
          }
         ?>
         

         </div>         
        </div>

      
    </div>
   
  </header>
  <div id="overlay"></div>
 
  <div class="popup">
				<form method="POST" action="login.php" id="loginForm" style="display:none;" >
        <div class="container-login"  >
				  <div>
                     
          <img src="http://localhost/rjhousing/assets/images/png/logo-no-background.png" alt="" style="width: 150px; height:50px; margin-left:100px;" />
          <span class="close">&times;</span>
					</div>
          <p>Sign In</p>
          <hr>
          <div id="popup-form">
          <?php if(isset($_GET['error'])): ?>
        <p style="color: red;"><?php echo $_GET['error']; ?></p>
    <?php endif; ?>
 
</div>
						
					<label>Email:</label> <br>
					<i class="fa fa-envelope  icon"></i>
					<input type="text" name="email"  placeholder="your email."required />
					
					<label>Password:</label> <br>
					<i class="fa fa-key  icon"></i>
					<input type="password" name="pass" placeholder="your password" required/><br/><br/>
					

					<input type="checkbox" name="keep" />
					<label>Remember Me</label></br></br>					

					<input type="submit" name="login" value="Sign IN" class="registerbtn" />
           </div>
			     <div class="container-login signin">
			         <span>Create New Account</span><button type="button" id="signupButton">Sign Up</button>
               
					
			      </div> 				

				</form>
        </div>
   <!-- register form -->
        <div id="formDiv">
				<form method="POST" action="register.php"  name="signupform"enctype="multipart/form-data" id="register" style="display:none;" >
                     <div class="container-login"  >

					 <div>
                     <img src="http://localhost/rjhousing/assets/images/png/logo-no-background.png" alt="" style="width: 150px; height:50px; margin-left:100px;" />
                     <span class="close">&times;</span>
                      </div>
						<p>Create Account </p>
            <?php
      if(isset($_GET['error'])) {
        $error_message = $_GET['error'];
        echo "<p class='error'>$error_message</p>";
      }
      ?>
						<hr>
					<div>
					<i class="fa fa-user icon"></i>
					<input type="text" name="name"placeholder="Enter First name*"  required/>					
          </div>
          <div>
					<i class="fa fa-envelope  icon"></i>
					<input type="text" name="email" placeholder="Enter Email Address" required/>
         </div>
         <div>
					<i class="fa fa-user icon"></i>
					<input type="text" name="phone" placeholder="Enter Phone Number*"  required/>
         </div>
         <div>
          <i class="fa fa-key  icon"></i>
					<input type="text" name="pass" placeholder="Create Password*"  required/>
         </div>
         <div>
					<i class="fa fa-user  icon"></i>
					<select required name="utype">					
						<option value="">Account Type</option>
						<option value="user">User</option>
						<option value="agent">Agent</option>					
					  </select>
          </div>
          <div>
          <label>Profile Picture:</label>
					<input class="image"type="file" name="uimage" /> 
          </div>	
          <div>			
					<input type="checkbox" name="conditions" />
					<label>I agree with terms and conditions</label>
          </div>
					 <input type="submit" name="reg" value="Sign UP" class="registerbtn"/>
					 </div>
					 <div class="container-login signin">
			      <span>Already have an account sign in</span><button type="button" id="loginButton">Sign In</button>
            </div>    
            </form>				  
			</div>
      

      
<script>
  const loginForm = document.getElementById("loginForm");
  const signupForm = document.getElementById("register");
  const loginButton = document.getElementById("loginButton");
  const signupButton = document.getElementById("signupButton");

  loginButton.addEventListener("click", function() {
    loginForm.style.display = "block";
    signupForm.style.display = "none";
  });

  signupButton.addEventListener("click", function() {
    signupForm.style.display = "block";
    loginForm.style.display = "none";
  });






</script>