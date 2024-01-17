<?php
include 'nav_config.php';
$successMessage = '';


if(isset($_POST['done'])){
    $firstname=mysqli_real_escape_string($conn,$_POST['firstname']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
        $q = "INSERT INTO user (`username`, `password`, `email`) VALUES ('$firstname', '$password', '$email')";
                    
        $query = mysqli_query($conn, $q);
        if ($query) {
            $successMessage = 'Registration successful. Now you can login.';
        }
          
      }

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>insert crud operation</title>
  <link rel="stylesheet" href="insert-style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 

    
</head>

<body>

  <header>
    <nav>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item">
              <h6><a class="nav-link" href="login.php">Login</a></h6>
            </li>

          </ul>

        </div>
      </nav>
    </nav>
  </header>
  <?php if ($successMessage): ?>
    <div class="alert alert-primary text-center" style="height:39px" role="alert">
        <?php echo $successMessage; ?>
    </div>
    <?php endif; ?>
  

  <div class="col-lg-7 m-auto mt-2 ">
    
    <form method="POST" >
      <div class="login-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>LOGIN PAGE</h3>
            <p>Please enter your details to login.</p>
          </div>
        </div>
		 <input type="text" name="firstname" placeholder="Enter firstname"/>
          <input type="password" name="password" placeholder="Enter password" pattern="(?=.*\d)(?=.*[a-zA-Z])(?=.*[^a-zA-Z0-9\s]).{4,}" title="Password must contain at least 1 digit, 1 letter, and 1 special symbol, and be at least 4 characters long"/>
		  <input type="email" name="email" placeholder="Enter email"/>

          <button type="submit" name="done">register</button>
		 
		 
		 
          </div>
		  </div>

        </div>

    </form>

  </div>

  

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>
</body>

</html>