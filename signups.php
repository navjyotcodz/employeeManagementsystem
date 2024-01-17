<?php
session_start();
include 'nav_config.php';

if (isset($_POST['done']))
{
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    if (empty($firstname))
    {
        echo '<script>alert("enter the firtsname");</script>';
    }
    else
    {
        $check_email = " SELECT * FROM user WHERE email='$email'";
        $data = mysqli_query($conn, $check_email);
        $result = mysqli_fetch_array($data);
        if ($result > 0)
        {
            echo '<script>alert("Email already exists,try different email");</script>';
        }
        else
        {
            if (empty($password))
            {
                echo '<script>alert("enter the password");</script>';
            }
            else
            {

                $q = "INSERT INTO user (`username`, `password`, `email`) VALUES ('$firstname', '$password', '$email')";

                $query = mysqli_query($conn, $q);
                echo '<script>alert("Registration successful. Now you can login.");</script>';
            }
        }
    }
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
            padding: 1px;
            font-size: 18px;

        }

        .main {
            background-color: #F0E68C;
            width: 500px;
            height: 330px;
            margin: auto;
            padding: auto;
        }

        .message {
            margin-top: 4px;
            text-align: center;
        }

        .message a {
            color: black;
            font-size: 20px;
            text-decoration: none;
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
            <h3 class="c1"> Registration</h3>
            <form class="login-form" action="#" method="POST">
                <input type="text" name="firstname" placeholder="Enter firstname" />
                <input type="password" name="password" placeholder="Enter password" pattern="(?=.*\d)(?=.*[a-zA-Z])(?=.*[^a-zA-Z0-9\s]).{2,}" title="Password must contain at least 1 digit, 1 letter, and 1 special symbol, and be at least 2 characters long" />
                <input type="email" name="email" placeholder="Enter email" />
                <button type="submit" name="done">register</button>
                <p class="message"> <a href="login.php">Login</a></p>
            </form>
        </div>
    </div>
</body> 

</html>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>