<?php
include'nav_config.php';
include 'auth_session.php'; 

 if(isset($_POST['submit1'])){
	 $parent_id =$_POST['parent_id'];
	 $menuname =$_POST['menuname'];
	 $menuaction =$_POST['menuaction'];
	 if(empty($menuname)){
	 echo '<script>alert("please enter menuname")</script>'; 
	}
    else
    {
 $sql= "INSERT into menu (parent_id,menu_name,menu_action) values('$parent_id','$menuname','$menuaction')";
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
  background: url("nav/bg22.jpeg") no-repeat;
  background-size: cover;
  background-position: center;
}

	
.wrapper{
  width: 420px;
  background: transparent;
  border: 2px solid black;
  backdrop-filter: blur(13px);
  color: black;
  border-radius: 12px;
  padding: 30px 40px;
  margin-left:450px;
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
  border: 3px solid black;
  border-radius: 40px;
  font-size: 23px;
  color: black;
  padding: 20px 45px 20px 20px;
}
.input-box input::placeholder{
  color: black;
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
.input-box::placeholder{
	color:black;
}

</style>
</head>
<body>
<?php include 'navbar.php';
?>
<div class="wrapper">
        <form action="" method="POST">
        <h1>Menu Add form</h1>

        <form action="" method="POST">
		 <div class="input-box">
		 <select name="parent_id">
		 <option value ="">select</option>
		 <option value ="1">Master child</option>
		 <option value ="2">Transaction child</option>
		 <option value ="3">Report child</option>
		 </select>
      </div>
	  <div class="input-box">
        <input type="text" placeholder="Enter Menuname" name="menuname">
        <i class='bx bxs-user'></i>
      </div>
	  <div class="input-box">
        <input type="text" placeholder="Enter Menuaction" name="menuaction">
        <i class='bx bxs-user'></i>
      </div>
	   <button type="submit" name="submit1" class="btn">submit</button>	
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