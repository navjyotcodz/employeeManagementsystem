<?php
include 'nav_config.php';
 include 'auth_session.php'; 
   $mode = $_REQUEST['mode'];
   $id = $_REQUEST['id'];
   $state=$_REQUEST['state'];
   
  $acts = $_REQUEST['acts'];
   $acts_string = implode(",", $acts);
   
   $date=$_REQUEST['date'];
   

  if($mode==''){
	echo $mode="add";
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
body{
  justify-content: center;
  align-items: center;
  min-height: 10vh;
  background: url("nav/bg22.jpeg ") no-repeat;
  background-size: cover;
  background-position: center;
}

	
.wrapper{
  width: 450px;
  background: transparent;
  border: 2px solid black;
  backdrop-filter: blur(15px);
  color: black;
  font-size:22px;
  border-radius: 12px;
  padding: 15px 20px;
  margin-left:480px;
    margin-top:0;


}
.wrapper h1{
  font-size: 36px;
  text-align: center;
}
.wrapper .input-box{
  position: relative;
  width: 100%;
  border:1px solid black;
  height: 50px;
  margin: 25px 0;
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
  color: black;
  padding: 20px 45px 20px 20px;
}
.input-box input::placeholder{
  color: black;
padding:5px;
  font-size:20px;
  border-radius:5px;
}
label{
margin-left:10px;	
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
	color:black;
	font-size:19px;
}

.input-box select{
	color:black;
	background-color:transparent;
}
.input-box option{
	color:black;
}
.input-box input{
	color:black;
	padding:10px 5px ;
}
	</style>

</head>
<body>
<?php
include 'navbar.php';
?>
 <div class="wrapper">
	<form  name="frm_studs" method="POST">
	<input type="hidden" name="mode" value="<?=$mode;?>">
	<input type="hidden" name="id" value="<?=$id;?>">
	 <div class="input-box">
    <label>State</label><br>
	<select name="state" class="input-box b1" value= "<?php echo $state; ?>">
	<option  value="">select states</option>
	<?php
	include 'nav_config.php';
	$sql="SELECT * from states ";
	$result=mysqli_query($conn,$sql);
	while($res=mysqli_fetch_array($result)){
		$id=$res['id'];
		?>
		echo " <option  value="<?php echo $id?>" <?if($state == $id){?>selected<?} ?>><?php echo $res["states_name"];?></option>";
		
		<?php
	}
	?>
	
	</select></div><br><br>
	
	<label> Acts </label><br>
	
    <?php
	include 'nav_config.php';
	
    $sql="SELECT * FROM acts";
	$result=mysqli_query($conn,$sql);
	while($res = mysqli_fetch_array($result)){
		echo '<input type="checkbox" name="acts[]" value="'.$res["act_id"].'">'.$res["act_name"].'<br>';
	}
	?>
	<br>
   <div class="input-box">
	<input type="date" name="date" max="<?php  echo date('Y-m-d');?>"></div>
	<button type="submit" class="btn" name="submit" onclick="return sa()">save</button>
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