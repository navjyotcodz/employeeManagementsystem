<?php
include'nav_config.php';
include 'auth_session.php'; 

$mode = $_REQUEST['mode'];
echo $id = $_REQUEST['id'];
$states = $_REQUEST['states'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<style>
	button a{
		text-decoration:none;
	}
	.btn:hover{
		background-color:red;
	}
	
	</style>
</head>
<body>
<?php 
include 'navbar.php';
?>
   <form action="" method="POST">
    <div class="container">  
 <div class="col-lg-12">
 <br><br>
 <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 <tr class="bg-light text-dark text-center">
 <th> Sno</th>
  <th> States</th>
 <th> Delete</th>
  </tr>
   <?php
 include 'nav_config.php';
         $sql = "SELECT id, states_name from states";
         $result = mysqli_query($conn, $sql);
		$p=1;
           while ($res = mysqli_fetch_array($result))
            {
				$id=$res['id'];
             ?>
          <tr class="text-center">
          <td> <?php echo $p; ?> </td>
          <td> <?php echo $res['states_name']; ?> </td>
          
		  <td> <button class="btn-warning btn"> <a href="state_process.php?mode=delete&id=<?php echo $res['id']; ?>" class="text-dark"> Delete </a> </button> </td>
          </tr>

        <?php
		$p++;
        }
				
        ?>

 </table>
 </div>
 </div>
 </form>
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