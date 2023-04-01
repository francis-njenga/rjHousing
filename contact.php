<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(isset($_POST['submit'])){

  $first_name =  $_POST["first_name"];
  $last_name =  $_POST["last_name"];
  $email =  $_POST["email"];
  $message =  $_POST["message"];

  $sql = "INSERT INTO contact_admin (first_name, last_name, email, message) VALUES ('$first_name', '$last_name', '$email', '$message')";
 $result=mysqli_query($con,$sql);
	if($result)
		{
			$msg="<p class='alert alert-success'>Property Inserted Successfully</p>";
			
			header("location:index.php");	
		}
		else
		{
			$error="<p class='alert alert-warning'>Property Not Inserted Some Error</p>";
		}

  
}


								
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       

        <link href="https://fonts.googleapis.com/css2?family=Overpass+Mono&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./static/css/main.css">
        
        <link rel="shortcut icon" href="assets/images/png/logo-color.png" type="image/x-icon" sizes="any">


        <title>rJ Housing- contact us.</title>
        
    </head>

    <body>
        

        <main class="contact-page"style="font-family:sans; ">
            <div class="title">Contact us</div>
            <div class="title-info">We'll get back to you soon!</div>

            <form action="contact.php" method="POST" class="form">
                <div class="input-group">
                    <input type="text" name="first_name" id="first-name" placeholder="First name">
                    <label for="first-name">First name</label>
                </div>
                
                <div class="input-group">
                    <input type="text" name="last_name" id="last-name" placeholder="Last Name">
                    <label for="last-name">Last name</label>
                </div>

                <div class="input-group">
                    <input type="email" name="email" id="e-mail" placeholder="e-mail">
                    <label for="e-mail">e-mail</label>
                </div>

                <div class="textarea-group">
                    <textarea name="message" id="message" rows="5" placeholder="Message"></textarea>
                    <label for="message">Message</label>
                </div>

                <div class="button-div">
                    <button type="submit" name="submit">Send</button>
                </div>
            </form>
        </main>

       
    </body>
</html>