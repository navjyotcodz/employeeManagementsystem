<?php
include'nav_config.php';
include 'auth_session.php'; 

 if(isset($_POST['submit'])){
	 $industry =$_POST['industry'];
	 if(empty($industry)){
	 echo '<script>alert("please enter industry")</script>'; 
	}
    else
    {
	 $sql= "INSERT into act_industry (industry_name) values('$industry')";
	 $result=mysqli_query($conn,$sql);
	 if($result){
		echo '<script>alert("Data inserted");</script>';
	 }else{
		 echo '<script>alert("not inserted")</script>';
     }
   }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<style>
	*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

body{
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: url("nav/bg7.jpeg") no-repeat;
  background-size: cover;
  background-position: center;
}

	
.wrapper{
  width: 450px;
  background: transparent;
  border: 2px solid rgba(255, 255, 255, .2);
  backdrop-filter: blur(9px);
  color: #fff;
  border-radius: 12px;
  padding: 30px 40px;
  margin-left:480px;
    margin-top:150px;

}

.wrapper h1{
  font-size: 36px;
  text-align: center;
}
.wrapper .input-box{
  position: relative;
  width: 100%;
  height: 50px;
  
  margin: 30px 0;
}
.input-box input{
  width: 100%;
  height: 100%;
  background: transparent;
  border: none;
  outline: none;
  border: 2px solid rgba(255, 255, 255, .2);
  border-radius: 40px;
  font-size: 16px;
  color: #fff;
  padding: 20px 45px 20px 20px;
}
.input-box input::placeholder{
  color: #fff;
}

.wrapper .btn{
  width: 100%;
  height: 45px;
  background: #fff;
  border: none;
  outline: none;
  border-radius: 40px;
  box-shadow: 0 0 10px rgba(0, 0, 0, .1);
  cursor: pointer;
  font-size: 16px;
  color: #333;
  font-weight: 600;
}

	</style>
</head>
<body>
<?php include 'navbar.php';
?>
<div class="wrapper">
        <form action="" method="POST">
        <h1>Industry Form</h1>

        <form action="" method="POST">
		 <div class="input-box">
        <input type="text" name="industry" placeholder="Enter Industry">
        <i class='bx bxs-user'></i>
      </div>
	   <button type="submit" name="submit" class="btn">submit</button>	
</form>
</div>
<script>
    function confirmLogout() {
        var confirmLogout = confirm('are you want to logout');
        if (confirmLogout) {
            window.location.href = "logout.php";
            header('location: login.php');


        }
    }
</script>
</body>
</html>