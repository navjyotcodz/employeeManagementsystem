<?php
include 'nav_config.php';
include 'auth_session.php';

session_start();

if (isset($_POST['cpass'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
	
	if(empty($username)){
	 echo '<script>alert(" please enter username ");</script>';
	} 
	elseif(empty($cpassword))
	{
	 echo '<script>alert(" please enter password ");</script>';
	}
	else
	{
    $check_query = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($conn, $check_query);
	
    if(mysqli_num_rows($result) != 0 ){
     $sql = "UPDATE user SET password='$cpassword' WHERE username ='$username'";
     $query = mysqli_query($conn, $sql);
     echo '<script>alert("password changed sucessfully. Now you can login.");</script>';
   }
   else
   {
       echo '<script>alert(" username doesnot exist in database");</script>';
   }
}
}

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title> change password form </title>
    <style>
        .login-header {
            width: 400px;
            height: 200px;
            margin-left: 40px;
            margin-top: 70px;
            padding: 10px;
            font-family: sen-serif;
        }

        input,
        button {
            font-family: "Roboto", sans-serif;
            width: 100%;
            padding: 15px;
            border: 1;
            box-sizing: border-box;
            font-size: 14px;
        }

        h3 {
            padding: 10px;
            font-size: 22px;

        }

       .main {
            background-color: #CCCCFF;
            width: 500px;
            height: 350px;
            margin: auto;
            padding: auto;
        
        .c1 {
            text-align: center;
        }
		button{
			font-size:20px;
		}
		button:hover{
		background-color:yellow;
		}
		.btn{
			height:22px;
			padding:10px;
			width:45px;
			border:1px solid black;
			background-color:#CCCCFF;
			margin-top:60px;
			margin-left:220px;
		}
		.btn p a{
			text-align:center;
		}
		.btn:hover{
			background-color:yellow;
		}
		a{
		text-decoration:none;
		}
    </style>
</head>

<body>
    <div class="main">
	
        <div class="login-header">
            <h3 class="c1"> Change Password Form</h3>
            <form class="login-form" action="#" method="POST">
                <input type="text" name="username" placeholder="Enter username" /><br>
                <input type="password" name="cpassword" placeholder="Enter New password" /><br>
                <button type="submit" class="text" name="cpass">submit</button> 
            </form>
        </div>
		<p class="btn">  <a href="login.php">Login</a></p>
    </div>
</body>
</html>