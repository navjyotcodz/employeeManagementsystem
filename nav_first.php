<?php
session_start();
include 'auth_session.php';
include "nav_config.php";
 echo $mode;
 
   $mode = $_REQUEST['mode'];
   $id = $_REQUEST['id'];
   $firstname = $_REQUEST['firstname'];
   $lastname = $_REQUEST['lastname'];
   $dob = $_REQUEST['dob'];
   $gender = $_REQUEST['gender']; 
   $qualification = $_REQUEST['qualification'];
   $city = $_REQUEST['city'];


  if($mode==''){
	echo $mode="add";
  }


  if($mode=="edit")	    
  {
    $sql = "SELECT * FROM `stud_table` WHERE `id`='$id'";
    $result = $conn->query($sql); 
    $res = mysqli_fetch_array($result);
    if($result)
	{		
            echo $firstname = $res['firstname'];
            $lastname = $res['lastname'];
			$dob = $res['dob'];
			$gender = $res['gender'];
		    $qualification = $res['qualification'];
			$city = $res['city'];
			$target_file = $res['file_name'];

       
	}            	
 }
      
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
	<style>
	
body{
  justify-content: center;
  align-items: center;
  min-height: 10vh;
  background: url("nav/bg2.jpeg") no-repeat;
  background-size: cover;
  background-position: center;
}

	
.wrapper{
  width: 450px;
  background: transparent;
  border: 3px solid rgba(255, 255, 255, .2);
  backdrop-filter: blur(13px);
  color: white;
  font-size:19px;
  border-radius: 12px;
  padding: 15px 20px;
  margin-left:480px;
    margin-top:auto;


}
.wrapper h1{
  font-size: 36px;
  text-align: center;
}
.wrapper .input-box{
  position: relative;
  width: 100%;
  height: 50px;
  margin: 13px 0;
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
  color: white;
  padding: 20px 45px 20px 20px;
}
.input-box input::placeholder{
  color: white;
padding:5px;
  font-size:20px;
  border-radius:5px;
}

.wrapper .btn{
  width: 100%;
  height: 45px;
background-color:#fff;
  border: none;
  outline: none;
  border-radius: 40px;
  box-shadow: 0 0 10px rgba(0, 0, 0, .1);
  cursor: pointer;
  font-size: 16px;
  color: #333;
  font-weight: 600;
}
.b1{
	background-color:transparent;
	color:white;
	font-size:19px;
}

.input-box select{
	color:white;
	background-color:transparent;
}
.input-box option{
	color:black;
}
.input-box input{
	color:white;
	padding:10px 5px ;
}

	</style>
</head>
<body>    

<?php 
include 'navbar.php';
?>
        <div class="wrapper">
        <form id="studentForm" name="frm_stud" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="mode" value="<?=$mode;?>">
            <input type="hidden" name="id" value="<?=$id;?>">
            <div class="input-box">
                <input type="text" name="firstname" pattern="[A-Za-z]+$" value="<?php echo $firstname; ?>"
                    placeholder="enter firstname">
            </div>
            <div class="input-box">
                <input type="text" name="lastname" value="<?php echo $lastname; ?>" placeholder="enter lastname">
            </div>
	            <div class="input-box">
	<input type="date"  max="<?php  echo date('Y-m-d');?>"  value="<?php echo $res['dob']?>"  name="dob" ></div>
	<label>Gender</label> &nbsp &nbsp
	<input type="radio" name="gender" value="male" <?php  if($gender=='male'){?>checked<?}?>>Male &nbsp &nbsp
	<input type="radio" name="gender" value="female" <?php if($gender=='female'){?>checked<?}?>>Female
	 <div class="input-box">
	 <input type="file" class="input-box" name="file_name"  value="<?= $target_file ?>"><?= $target_file ?></div>
 

     <div class="input-box">
	 <select class="input-box b1" name="qualification" value= "<?php echo $qualification; ?>">
	 <option  value="">select Qualification</option><br><br><br>

	<?php
	include'nav_config.php';

	$sql="SELECT * from qualification ";
	$result=mysqli_query($conn,$sql);
	//sql query s ana wala result set m har ek record mysqli_ftech array function k duara fetch hoke res variable m store hoirha hai.
	while($res=mysqli_fetch_array($result)){
		$id=$res['id'];
		$quali_nm=$res['quali_name'];
		?>
		echo " <option  value="<?php echo $id?>" <?if($qualification == $id){?>selected<?} ?>><?php echo$res["quali_name"];?></option>";
		
		<?php
	}
	?>
	</select></div> 
	<div class="input-box">
	<select class="input-box b1" name="city" value= "<?php echo $city; ?>">
	<option  value="">select city</option>
	<?php
	echo $sql="SELECT * from city ";
	$result=mysqli_query($conn,$sql);
	//mysqli_fetch_array function k zariye result set s data fetch kia jarha h aur res variable m store krrha h
	while($res=mysqli_fetch_array($result)){
		$id=$res['id'];
		?>
		echo " <option   value="<?php echo $id?>" <?if($city == $id){?>selected<?} ?>><?php echo $res["city_name"];?></option>";
		
		<?php
	}
	?>
	</select></div><br>
		<button type="submit" class="btn" name="submit_ug" onclick="return goUg()" >submit for ug</button>
		</form>
</div>


<script src="nav_script.js"></script>
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