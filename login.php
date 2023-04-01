<?php
session_start();
include("config.php");

if(isset($_REQUEST['login']))
{  
    $email=$_REQUEST['email'];
    $pass=$_REQUEST['pass'];
    $pass= sha1($pass);

    if(!empty($email) && !empty($pass))
    {
       
		$sql = "(SELECT 'user' as utype, uid, uemail, null as aid, null as aemail FROM user where uemail='$email' AND upass='$pass' AND utype='user')
                UNION
                (SELECT 'agent' as utype, null as uid, null as uemail, aid, aemail FROM agent where aemail='$email' AND apass='$pass' AND utype='agent')
                 UNION
                 (SELECT 'admin' as utype, null as uid, null as uemail, null as aid, null as aemail FROM admin where admin_email='$email' AND admin_pass='$pass' AND utype='admin')
                 ";

		

        $result=mysqli_query($con, $sql);

        if(mysqli_num_rows($result) > 0) {
            while($row=mysqli_fetch_array($result)) {
                if($row['utype'] == 'user') {
                    $_SESSION['utype'] = $row['utype'];
                    $_SESSION['uid'] = $row['uid'];
                    $_SESSION['uemail'] = $row['uemail'];
                    header("location:index.php");
                    exit;
                } else if($row['utype']=='agent') {

                    $_SESSION['utype'] = $row['utype'];
                    $_SESSION['aid'] = $row['aid'];
                    $_SESSION['aemail'] = $row['aemail'];
                    header("location:agent.php");
                    exit;
                } else {
                    $_SESSION['utype'] = $row['utype'];
                    $_SESSION['admin_id'] = $row['admin_id'];
                    $_SESSION['admin_email'] = $row['admin_email'];
                    header("location:admin/adminDashboard/index.php");
                    exit;
                }

            }
        } else {
            $_SESSION['error'] = "Email or Password does not match!";
            header("location:index.php");
            exit;
        }
    } else {
        $_SESSION['error'] = "Please fill all the fields";
        header("location:index.php");
        exit;
    }
}
?>