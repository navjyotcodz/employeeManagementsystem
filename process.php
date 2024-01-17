<?php
include "config.php";
$m_mode = $_REQUEST['m_mode'];
$id = $_REQUEST['id'];
echo $m_mode;

 if($m_mode=="add")
{   
    if (isset($_REQUEST['btn_submit']))
	{
    $f_name = $_REQUEST['f_name'];
    $m_name = $_REQUEST['m_name'];
    $l_name = $_REQUEST['l_name'];
    $gender = $_REQUEST['gender'];
    $countries = $_REQUEST['sel_countries'];
	$state = $_REQUEST['sel_state'];
	$city = $_REQUEST['sel_city'];
	$interest1 = $_REQUEST['interest'];
    $interest="";  
    foreach($interest1 as $chk1)  
       {  
          $interest.= $chk1.",";  
       }      
	$sql_duplicate = "select * from form where f_name='$f_name' and m_name='$m_name' and l_name='$l_name'";
    $m_duplicate = mysqli_query($conn,$sql_duplicate);
    $res = mysqli_num_rows($m_duplicate);
		
	if($res == '0')	
	{	
	
   $sql = "INSERT INTO form ( `f_name`, `m_name`, `l_name`, `state`, `city`, `gender`, `countries`, `interest`) VALUES ('$f_name','$m_name','$l_name','$state','$city','$gender','$countries','$interest')";
	
    $result = $conn->query($sql);
    if ($result == TRUE) {
     ?>
	 <script>
	 alert("Record add successfully");
	 window.location.href="display.php";
	 </script>
	 <?
    //echo "Record add successfully.";

    }else{
      echo "Error:". $sql . "<br>". $conn->error;
    } 
 
	}
	else
	{
		// echo "Record Already Exists";
		   ?>
	 <script>
	 alert("Record Already Exists");
	 window.location.href="display.php";
	 </script>
	 <?
	}
    $conn->close();
   }
  }


  if($m_mode=="edit")
  {
	    if (isset($_REQUEST['btn_submit'])) 
		{	
        $f_name = $_REQUEST['f_name'];
        $id = $_REQUEST['id'];
        $m_name = $_REQUEST['m_name'];
		$l_name = $_REQUEST['l_name'];
        $gender = $_REQUEST['gender'];
		$countries = $_REQUEST['sel_countries'];
	    $state = $_REQUEST['sel_state'];
	    $city = $_REQUEST['sel_city'];
        $interest1 = $_REQUEST['interest'];
       
        $interest=""; 
		
    foreach($interest1 as $chk1)  
       {  
          $interest.= $chk1.",";  
       }  
        $sql = "UPDATE `form` SET `f_name`='$f_name',`m_name`='$m_name',`l_name`='$l_name',`gender`='$gender',`interest`='$interest',`countries`='$countries',`state`='$state',`city`='$city' WHERE `id`='$id'";
	   
        $result = $conn->query($sql); 
        if ($result == TRUE) {		
	?>
	 <script>
	 alert("Record updated successfully.");
	 window.location.href="display.php";
	 </script>
	 <?
           // echo "Record updated successfully.";
        }else{
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
    }
  }

  if($m_mode=="delete")
  {  
	 $sql = "DELETE FROM `form` WHERE `id`='$id'";
     $result = $conn->query($sql);
     if ($result == TRUE){
		 ?>
	 <script>
	 alert("Record delete successfully.");
	 window.location.href="display.php";
	 </script>
	 <?
		//echo "Record delete successfully.";
    }else{      
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
  }
//////////////////////////////////////////////////////////////

?>    





