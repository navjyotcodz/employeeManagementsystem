<?php

include "nav_config.php";


if(isset($_REQUEST['submit'])){

    $id = $_REQUEST['id'];
	$mode = $_REQUEST['mode'];
    $state=$_REQUEST['state'];
   $acts = $_REQUEST['acts'];
   $acts_string = implode(",", $acts);
   $date=$_REQUEST['date'];
    

 $sql= "INSERT INTO mapacts(`states`, `acts`, `mapdate`) VALUES ('$state', '$acts_string', '$date')";
	$result = mysqli_query($conn, $sql);
        if ($result){
       if ($mode == 'add'){
?>
            <script>
                alert("data inserted");
                window.location.href = "mapact_display.php";
            </script>
        
<?php
        }
        else
        {
            echo "data not inserted";
        }
    }
}

?>