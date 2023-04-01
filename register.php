<?php include("config.php");
$error="";
$msg="";
if(isset($_REQUEST['reg']))
{
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $phone=$_REQUEST['phone'];
    $pass=$_REQUEST['pass'];
    $utype=$_REQUEST['utype'];
    
    $uimage=$_FILES['uimage']['name'];
    $temp_name1 = $_FILES['uimage']['tmp_name'];
    $pass= sha1($pass);
    
    $query = "SELECT * FROM user where uemail='$email' union Select * From agent where aemail='$email'";
    $res=mysqli_query($con, $query);
    $num=mysqli_num_rows($res);
    
    if($num == 1)
    {
        $error = "<p class='alert alert-warning'>Email Id already Exist</p> ";
    }
    else
    {
        
        if(!empty($name) && !empty($email) && !empty($phone) && !empty($pass) && !empty($uimage))
        {
            if($utype == 'user'){
                $sql="INSERT INTO user (uname,uemail,uphone,upass,utype,uimage) VALUES ('$name','$email','$phone','$pass','$utype','$uimage')";
            }else if($utype == 'agent'){
                $sql="INSERT INTO agent (aname,aemail,aphone,apass,utype,aimage) VALUES ('$name','$email','$phone','$pass','$utype','$uimage')";
            }
            
            $result=mysqli_query($con, $sql);
            move_uploaded_file($temp_name1,"admin/$utype/$uimage");
            if($result){
                $msg = "<p>Register Successfully</p> ";
                header("location:login.php");
            }
            else{
                $error = "<p>Register Not Successfully</p> ";
            }
        }else{
            $error = "<p>Please Fill all the fields</p>";
        }
    }
    
}

?>

<!doctype html>

<html>
	<head>
		<title>Registration Page</title>
		
		<link rel="stylesheet" href="http://localhost/rjhousing/account/css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
   
	</head>	

	<body>
		
		<div>
			
			
			
			</div>
			
			
			
			<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
				
	</body>	
</html>