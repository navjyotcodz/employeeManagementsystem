<?php
session_start();

include 'nav_config.php';

$errorMessage = '';

if (isset($_POST['username']))
{
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * from user where username='$username'  AND  password ='$password'";
    $result = mysqli_query($conn, $sql);
    $total = mysqli_num_rows($result);
    if ($total == 1)
    {
        $_SESSION['username'] = $username;
        header('location:nav_display.php');
        exit();
    }
    else
    {
        echo '<script>alert("login failed");</script>';
    }
    // if($result && mysqli_num_rows($result) > 0){
    // $errorMessage ='login success';
    // header('Location: nav_display.php');
    // }else{
    // $errorMessage ='login failed';
    // echo '<script>alert("login failed");</script>';
    // }	
}


?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title> login page </title>
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
            background-color: #C0C0C0;
            width: 500px;
            height: 350px;
            margin: auto;
            padding: auto;
        }

        .message {
            text-align: center;
        }

.message1 {
            text-align: center;
			font-size:20px;
			text-decoration:none;
        }

        .c1 {
            text-align: center;
        }
		a{
			text-decoration:none;
		}
    </style>
</head>

<body>
    <div class="main">
        <div class="login-header">
            <h3 class="c1"> LOGIN PAGE</h3>
            <form class="login-form" action="#" method="POST">
                <input type="text" name="username" placeholder="Enter username" /><br>
                <input type="password" name="password" placeholder="Enter password" /><br>
                <button type="submit" class="text" name="login">Login</button> 
				<p class="message1"> <a href="cpassword.php">changepassword</a></p>
                <p class="message"> <a href="signups.php">Register</a></p>
            </form>
        </div>
    </div>
</body>

</html>