<?php
	session_start();
	$sqli = mysqli_connect("localhost", "root", "", "training") 
	or die("Could not connect database...");
	$update = false;
	$id = $f_name = $f_name = $gender = $interest "";
	if (isset($_REQUEST['edit'])) {
		$id = $_REQUEST['edit'];
		$update = true;
		$record = mysqli_query($sqli, "SELECT * FROM form WHERE id=$id");

		if (count($record) == 1 ) {
			$num = mysqli_fetch_array($record);
			$id = $num['id'];
            $f_name = $num['f_name'];
            $l_name = $num['l_name'];
            $gender = $num['gender'];
	        $interest = $num['interest'];   
		}

	}
	if(isset($_REQUEST['save'])){
		$id = $_REQUEST['id'];
		$f_name = $_REQUEST['f_name'];
		$l_name = $_REQUEST['l_name'];
		$gender = $_REQUEST['gender'];
		$interest = $_REQUEST['interest'];
		mysqli_query($sqli, "INSERT INTO form(id,f_name,l_name,gender,interest)]
VALUES ('NULL','$f_name',' $l_name',' $gender', ' $interest')");
		$_SESSION['msg'] = "Employee Saved";
		header("location:index.php");

	}
	if(isset($_REQUEST['update'])){
		$id = $_REQUEST['id'];
		$f_name = $_REQUEST['f_name'];
		$l_name = $_REQUEST['l_name'];
		$gender = $_REQUEST['gender'];
		$interest = $_REQUEST['interest'];
		mysqli_query($sqli," UPDATE `form` SET `f_name`='$f_name',`l_name`='$l_name',`gender`='$gender',`interest`='$interest' WHERE `id`='$id'");
		$_SESSION['msg']= "Employee Data Updated.";
		header("location:index.php");
		
	}
	if(isset($_REQUEST['del'])){
		$id = $_REQUEST['del'];
		mysqli_query($sqli, "DELETE FROM form WHERE id = $id");
		$_SESSION['msg'] = "Employee Data is deleted";
		header("location:index.php");
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="style.css">
<script>
function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}
function validateForm() {
    var f_name = document.contactForm.f_name.value;
	var l_name = document.contactForm.l_name.value;
    var gender = document.contactForm.gender.value;
	
    var f_nameErr = l_nameErr = genderErr = true;
    
    // Validate  First Name
    if(f_name == "") {
        printError("f_nameErr", "Please enter your First Name");
    } else {
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(f_name) === false) {
            printError("f_nameErr", "Please enter a valid First Name");
        } else {
            printError("f_nameErr", "");
            f_nameErr = false;
        }
    }
    
	    
    // Validate Last Name
    if(l_name == "") {
        printError("l_nameErrr", "Please enter your Last Name");
    } else {
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(l_name) === false) {
            printError("l_nameErrr", "Please enter a valid  Last Name");
        } else {
            printError("l_nameErrr", "");
            l_nameErrr = false;
        }
    }
    

    // Validate gender
    if(gender == "") {
        printError("genderErr", "Please select your gender");
    } else {
        printError("genderErr", "");
        genderErr = false;
    }
    
   
   
    if((f_nameErr || l_nameErrr || genderErr) == true) {
       return false;
    } else {
      
        var dataPreview = "You've entered the following details: \n" +
                          "First Name: " +f_name + "\n" +
						  "Last Name: " + l_name + "\n" +
                          "Gender: " + gender + "\n";
        if(hobbies.length) {
            dataPreview += "Hobbies: " + hobbies.join(", ");
        }
      
        alert(dataPreview);
    }
};
</script>
</head>
<body>	
		<?php

			if(isset($_SESSION['msg'])){
				echo "<div class='msg'>";
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
				echo "</div>";
			}
			$query = mysqli_query($sqli, "SELECT * FROM form");
		?>
		<table>
				<tr>
			    <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Interest</th>
				<th>Action</th>
				</tr>
				<?php
					while($row = mysqli_fetch_array($query)){
						echo "<tr>";

						echo "<td>".$row['id']."</td>";
						echo "<td>".$row['f_name']."</td>";
						echo "<td>".$row['l_name']."</td>";
						echo "<td>".$row['gender']."</td>";
						echo "<td>".$row['interest']."</td>";
						echo "<td><a class="btn btn-warning" href=index.php?edit=".$row['id'].">Edit</a></td>";
						echo "<td><a class="btn btn-danger" href=index.php?del=".$row['id'].">Delete</a></td>";
						echo "</tr>";
					}
				?>
		</table>
		<form action="#" method="POST"  name="contactForm" onsubmit="return validateForm()">
		<input type="hidden" name="id" value="<?=$id;?>">
			<div class="input-group">
				<label>First Name</label>		
	<input type="text" name="f_name"  placeholder="enter the first name" 
	value="<?php echo $f_name; ?>" >
	<div class="f_error" id="f_nameerr"></div>
			</div>
			<div class="input-group">
				<label>Last Name</label>
				<input type="text" name="l_name" value="<?php echo $name; ?>">
			</div>
			<div class="input-group">
				<label>Gender</label>
				<input type="text" name="salary" value="<?php echo $sal; ?>">
			</div>
			<div class="input-group">
			<label>Interest</lable>
				<select name="interest">
	<?php
	
	$interest= mysqli_query($conn,"select * from interest");
	while($i= mysqli_fetch_array($interest)){	
	?>
	<option value="<?php echo $i['name']?>"><?php echo $i['name']?></option>
	<?php 
	}
	?>
			</div>
			<div class="input-group">
				<?php if($update == true) { ?>
				 <button class="btn" type="submit" name="update" style="background: red;" onclick="back()"> Update </button>
				 <?php } elseif ($update == false) { ?>
				 	<button class="btn" type="submit" name="save" onclick="clear()"> Save </button>
				 <?php } ?>
			</div>
		</form>
		
</body>
</html>
