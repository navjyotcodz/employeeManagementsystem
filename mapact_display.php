<?php
 include "nav_config.php";
 include 'auth_session.php'; 

 $valueTooSearch =$_REQUEST['sel_states'];
   $mode = $_REQUEST['mode'];
   $id = $_REQUEST['id'];
   $state = $_REQUEST['state'];
   
?>
<!DOCTYPE html> 
<html>
<head>
 <title></title>

 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  
   <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
   <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
   
</head>
<body>
<?php 
 include'navbar.php';
?>
	<div><br>
  <form action="" method="POST">
&nbsp &nbsp <label>states</label>
	&nbsp <select name="sel_states" onchange="form.submit()">
	<option  value="">select states</option>
	<?php
	include 'nav_config.php';
	$sql="SELECT distinct a.states,b.states_name,b.id from mapacts a,states b where a.states =b.id ORDER BY b.states_name ASC ";
	$result=mysqli_query($conn,$sql);
		//mysqli_fetch_array function k zariye result set s data fetch kia jarha h aur res variable m store krrha h
	while($res=mysqli_fetch_array($result)){
    $state = $res['state'];
		$id=$res['id'];
		$state_nm=$res['states_name'];
		?>
		echo " <option  value="<?php echo $id?>" <?if($id == $valueTooSearch){?>selected<?} ?>><?php echo $res["states_name"];?></option>";
		<?php
	}
	?>
	</select><br>
<div class="container">  
 <div class="col-lg-12">
 <br><br>
 <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 <tr class="bg-light text-dark text-center">
 <th> sno</th>
  <th> State</th>
 <th> Mapped Acts</th>
	<?php
	include 'nav_config.php';
	 if(!empty($valueTooSearch)){
	 		$stmt = " AND  b.id='$valueTooSearch'";
	 }
	$sql ="SELECT a.id,a.acts ,b.states_name FROM mapacts a,states b WHERE a.states =b.id $stmt";

	 $result=mysqli_query($conn,$sql);
	 while($res=mysqli_fetch_array($result)){
	?>
   <tr class="text-center">
   <td> <?php echo $res['id'];?> </td>
   <td> <?php echo $res['states_name'];?> </td>
  <td> <?php 
     $actIds = explode(",",$res['acts']);
     $actIds = array_map('intval',$actIds);
     $actIdString =implode(',' ,$actIds);
     $actQuery ="SELECT act_name FROM acts WHERE act_id IN ($actIdString)";
     $actResult =mysqli_query($conn,$actQuery);
     if(!$actResult){
	 die('Error: '.mysqli_error($conn));
     }
     $actNames =mysqli_fetch_all($actResult,MYSQLI_ASSOC)	;
     $actNames =array_column($actNames,'act_name');
     echo implode(",",$actNames);
   ?> </td>


	<?php
	}
	?>
  </table> 
 </div>
 </div>

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
<?php
     // $actIds = explode(",",$res['acts']);
     // $actIds = array_map('intval',$actIds);

     // $inClause =implode(',' ,$actIds);
     // $actQuery ="SELECT act_name FROM acts WHERE act_id IN ($inClause)";
     // $actResult =mysqli_query($conn,$actQuery);
     // if(!$actResult){
	 // die('Error: '.mysqli_error($conn));
     // }
     // $actNames =mysqli_fetch_all($actResult,MYSQLI_ASSOC)	;
     // $actNames =array_column($actNames,'act_name');
     // echo implode(",",$actNames);
   ?>