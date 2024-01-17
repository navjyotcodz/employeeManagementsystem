<?php
include "nav_config.php";
include 'auth_session.php';

       echo$mode = $_REQUEST['mode'];
         $id = $_REQUEST['id'];
        $firstname = $_REQUEST['firstname'];
        $lastname = $_REQUEST['lastname'];
		$dob = $REQUEST['dob'];
        $qualification = $_REQUEST['qualification'];
		$city = $_REQUEST['city'];

if($mode=='add'){
	
	echo $sql="INSERT into stud_table(firstname,lastname,dob,qualification,city) values('$firstname','$lastname','$dob','$qualification','$city')";
  die();
 $result =mysqli_query($conn,$sql);
 if($result){
	 ?>
	 <script>
	 alert("data inserted");
	 window.location.href="nav_display.php";
	 </script>
	 <?php

 }else{
	 echo "data not inserted.$sql";
 }

}


if($mode=="edit")
  {
   //$id = $_REQUEST['id'];
        echo$sql = "UPDATE `stud_table` SET `firstname`='$firstname',`lastname`='$lastname',`dob`='$dob',`qualification`='$qualification' ,`city` ='$city' WHERE `id`='$id'";
	   
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
  
 
  if($mode=="delete")
  {  
	 $sql = "DELETE FROM `stud_table` WHERE `id`='$id'";
     $result = $conn->query($sql);
     if ($result == TRUE){
	 echo '<script>alert("Record delete successfully.");
	 window.location.href="nav_display.php"
	 </script>';
	 exit;
    }else{      
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
  }
 
  ?>