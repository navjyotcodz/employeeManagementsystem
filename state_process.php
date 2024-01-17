<?php
include "nav_config.php";
echo $mode = $_REQUEST['mode'];
$id = $_REQUEST['id'];
$states = $_REQUEST['states'];
           
if ($mode == 'add')
    {
       $sql = "INSERT into states (states_name) values('$states')";
        $result = mysqli_query($conn, $sql);
        if ($result)
        {
?>
            <script>
                alert("data inserted");
                window.location.href = "state_master.php";
            </script>
        <?php

        }
        else
        {
           echo "data not inserted";
        }
	}
	

   if($mode=="delete") { 
     $checkSql=" SELECT state FROM actform WHERE FIND_IN_SET('$id', actform.state)";
	 $checkResult =$conn->query($checkSql);
	 if($checkResult->num_rows >0){
		echo '<script>alert("State  used in actform table,so cannot be deleted");
	 window.location.href = "state_master.php";
     </script>';
	 }
	 else{
		 $deleteSql="DELETE FROM states WHERE id='$id'";
     $deleteResult = $conn->query($deleteSql);
	 
	 if ($deleteResult == TRUE){
	echo '<script>alert("Record delete successfully.");
		   window.location.href = "state_master.php";
          </script>';
	 }else{
		echo "Error:" . $deleteSql . "<br>" . $conn->error;
	 }	
	 }	 
	exit;
   }	
	?>