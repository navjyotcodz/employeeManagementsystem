<?php 
include'nav_config.php';
 $mode = $_REQUEST['mode'];
   $id = $_REQUEST['id'];
  echo $state=$_REQUEST['state'];
   echo $city=$_REQUEST['city'];


  
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
	.main{
      width:19%;
      background-color:#d9c5f2;
	  margin:auto;
	  padding:30px;
	  margin-top:24px;
	  margin-down:5px;
	  font-size:20px;
}
	</style>
	
</head>
<body>
<div class="main">
<form  name="frm_studd" method="POST" action="">
<input type="hidden" name="mode" value="<?=$mode;?>">
	<input type="hidden" name="id" value="<?=$id;?>"> 
    <label>State</label><br>
	<select name="state" onchange="form.submit()">
	<option  value="">select states</option>
	<?php
	echo $sql="SELECT * from states ";
	$result=mysqli_query($conn,$sql);
	while($res=mysqli_fetch_array($result)){
		$id=$res['id'];
		?>
		echo " <option  value="<?php echo $id?>" <?if($state == $id){?>selected<?} ?>><?php echo $res["states_name"];?></option>";
		
		<?php
	}
	?>
	</select>
	
<br>
<label>City</label>
    <select name="city">
	<option value="">Select City</option>
	<?php
	if(!empty($state))
	{
		$stmt = " where states_id ='$state'";
	}
	echo $sql="SELECT * FROM city $stmt";
	$result=mysqli_query($conn,$sql);
	while($res=mysqli_fetch_array($result)){
		$id=$res['id'];
		$state_id=$res['state'];
		
 ?>
   echo " <option  value="<?php echo $id?>" <?if($state_id == $id){?>selected<?} ?>><?php echo $res["city_name"];?></option>";
	
    <?php
   }
   ?>
    </select>
<br>
	<button type="submit" name="submit1" onclick="return cty()">save</button>
</form>
</div>
</body>
</html>