<header class="header" data-header>
    
    <div class="header-bottom ">
      

 

        <nav class="navbar" data-navbar>
          <div class="navbar-bottom">
            <ul class="navbar-list">
          <li>  <a href="index.php" class="logo">
          
          <img src="assets\images\png\logo-no-background.png" style="height: 4.3rem; width: 7.5rem;" alt="logo image here">   </a> </li>

              <li>
               <a href="agent.php" class="navbar-link" data-nav-link> HOME </a>
                
              </li>

              <li>
              <a href="contact.php" class="navbar-link" data-nav-link>CONTACT</a>
              </li>
              <li>
              <a href="agentMessage.php" class="navbar-link" data-nav-link style="white-space: nowrap;"> MY MESSAGES </a>
              </li>
              <li>
                <a href="addListing.php" class="navbar-link header-button" style="color:black; white-space:nowrap;" data-nav-link>Add Listing</a>
              </li>
              
            </ul>
          </div>

    
      </nav>

      <div class="header-bottom-actions">


  
     <div class="navbar-bottom-login" style="padding-right:5rem;" >
      <ul class="navbar-list">
        <?php  if(isset($_SESSION['aemail']))
        
        { ?>
      
       <li class="navbar-link-login header-button" >	<a style="color:black ;"  href="logout.php">Logout
              </a> </li> 
       &nbsp;&nbsp;<?php  } else { ?>
      <li class="navbar-link-login header-button"><a href="login.php">Login</a></li>&nbsp;&nbsp;
      <li class="navbar-link-login header-button"><a href="register.php">Register</a></li><?php } ?>

       
        <?php
            if(isset($_SESSION['aid'])) {
            $query=mysqli_query($con,"SELECT agent.aname,agent.aimage FROM `agent` WHERE agent.aid = '{$_SESSION['aid']}' ");
            while($row=mysqli_fetch_array($query)) {
        ?>
        <div class="my-details">
            <div class="dropdown-menu">
                        <a href="agentAccount.php"  style="whitespace:nowrap;">Edit Profile</a>
             </div>
            </div>
         <a href="agentAccount.php"> <p style="text-decoration:none; font-size:16px; margin:0; padding:0; cursor:pointer; padding-top:10px; color:black; font-weight:600;"><?php echo $row['aname'];?></p> </a>
          <a href="agentAccount.php" > <figure class="author-avatar" style="margin:0; width:3rem; height:3rem;"  >
          
            <img  style="width:100%; height:100%;" src="admin/agent/<?php echo $row['aimage'];?>">
            </figure> </a>
        <?php 
          }
          }
         ?>
    </div>         
    </div>



      </div>
    

  </header>