<?php
session_start();

include "nav_config.php";
       echo$mode = $_REQUEST['mode'];

        $id = $_REQUEST['id'];
        $firstname = $_REQUEST['firstname'];
        $lastname = $_REQUEST['lastname'];
		$dob = $_REQUEST['dob'];
		$gender = $_REQUEST['gender'];
        $qualification = $_REQUEST['qualification'];	
		$city = $_REQUEST['city'];
	$check_query ="SELECT * FROM stud_table WHERE firstname='$firstname'";
		 $result =mysqli_query($conn,$check_query);
		 if($result->num_rows > 0){
			 echo "duplicate entry ";
		 }else{
if($mode=='add'){
	
	
$target_dir = "nav/";
$target_file = $target_dir . basename($_FILES["file_name"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit_ug"])) {
  $check = getimagesize($_FILES["file_name"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["file_name"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["file_name"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["file_name"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

	
	
	
	  $sql="INSERT into stud_table(firstname,lastname,dob,gender,qualification,file_name,city) values('$firstname','$lastname','$dob','$gender','$qualification','$target_file','$city')";

 $result =mysqli_query($conn,$sql);
 if($result){
	 ?>
	 <script>
	 alert("data inserted");
	 window.location.href="nav_display.php";
	 </script>
	 <?php

 }
 else{
	 echo "data not inserted";
 }

}
}

$check_query ="SELECT * FROM stud_table WHERE firstname='$firstname'";
		 $result =mysqli_query($conn,$check_query);
		 if($result->num_rows > 0){
			 echo "duplicate entry ";
		 }else{
if($mode=="edit")
  {
	  
	  
	  
   //$id = $_REQUEST['id'];
        $sql = "UPDATE `stud_table` SET `firstname`='$firstname',`lastname`='$lastname',`gender`='$gender',`qualification`='$qualification' ,`file_name`='$target_file',`city` ='$city' WHERE `id`='$id'";
	   
        $result = $conn->query($sql); 
        if ($result == TRUE) {		
	?>
	 <script>
	 alert("Record updated successfully.");
	 window.location.href="nav_display.php";
	 </script>
	 <?
           // echo "Record updated successfully.";
        }else{
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
    
  }
  
		 }
?>