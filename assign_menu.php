<?php
include "nav_config.php";
include 'auth_session.php';

include 'navbar.php ';
$mode = $_REQUEST['mode'];
$id = $_REQUEST['id'];
$user_id = $_REQUEST['user_id'];
$menu_id = $_REQUEST['menu_id'];

if ($mode == '') {
    echo $mode = "add";
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Menu Assign</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
	<style> 
	.btn{
    margin-left:900px;
    background-color:white;
    border:1px solid black;
    color:black;
	}
	</style>
</head>

<body>

    <div><br>
        <form name="frm_studdd" action="" method="POST">


            <input type="hidden" name="mode" value="<?= $mode; ?>">
            <input type="hidden" name="id" value="<?= $id; ?>">
            &nbsp &nbsp <label>User Assign</label>
            <select name="user_id" class="input-box b1"  value= "<?php echo $user_id; ?>">
                <option value="">select user</option>
                <?php
				include 'nav_config.php';
                $sql = "SELECT * FROM user";
                $result = mysqli_query($conn, $sql);
                while ($res = mysqli_fetch_array($result)) {
                    $id = $res['id'];
                ?>
                   
				<option value="<?php echo $id; ?>" <?php if ($user_id == $id) { ?>selected<?php } ?>>
            <?php echo $res["username"]; ?>
        </option>
                <?php
                }
                ?>
            </select>
             <button type="submit"  class="btn" name="submit_assign" onclick="return as()">submit assign</button>
                <div class="col-lg-12">
                    <br><br>
                    <table id="tabledata" class="table table-striped table-hover table-bordered">
                        <tr class="bg-light text-dark text-center">
                            <th>S No</th>
                            <th>Menu</th>
                            <th>Menu Name</th>
                        </tr>

                        <?php
						include 'nav_config.php';
						
                        $sno = 1;

                        $sql = "SELECT * FROM menu WHERE parent_id = 1";
                        $result = mysqli_query($conn, $sql);
                        $isMasterPrinted = false;

                        while ($res = mysqli_fetch_array($result)) {
                            $id = $res['id'];
                            $name = $res['menu_name'];
                        ?>
                            <tr class="text-center">
                                <?php if (!$isMasterPrinted) { ?>
                                    <td rowspan="7"><?php echo $sno; ?></td>
                                    <td rowspan="7">Master</td>
                                    <?php $isMasterPrinted = true; ?>
                                <?php } ?>
                                <td>
                                    <input type="checkbox" name="menu_id[]" value="<?php echo $id; ?>">
                                    <?php echo $name; ?>
                                </td>
                            </tr>
                        <?php
                            $sno++;
                        }
                        $sno = 2;

                        $sql = "SELECT * FROM menu WHERE parent_id = 2";
                        $result = mysqli_query($conn, $sql);
                        $isMasterPrinted = false;

                        while ($res = mysqli_fetch_array($result)) {
                            $id = $res['id'];
                            $name = $res['menu_name'];
                        ?>
                            <tr class="text-center">
                                <?php if (!$isMasterPrinted) { ?>
                                    <td rowspan="4"><?php echo $sno; ?></td>
                                    <td rowspan="4">Transaction</td>
                                    <?php $isMasterPrinted = true; ?>
                                <?php } ?>
                                <td>
                                    <input type="checkbox" name="menu_id[]" value="<?php echo $id; ?>">
                                    <?php echo $name; ?>
                                </td>
                            </tr>
                        <?php
                            $sno++;
                        }
                        $sno = 3;

                        $sql = "SELECT * FROM menu WHERE parent_id = 3";
                        $result = mysqli_query($conn, $sql);
                        $isMasterPrinted = false;

                        while ($res = mysqli_fetch_array($result)) {
                            $id = $res['id'];
                            $name = $res['menu_name'];
                        ?>
                            <tr class="text-center">
                                <?php if (!$isMasterPrinted) { ?>
                                    <td rowspan="5"><?php echo $sno; ?></td>
                                    <td rowspan="5">Reports</td>
                                    <?php $isMasterPrinted = true; ?>
                                <?php } ?>
                                <td>
                                    <input type="checkbox" name="menu_id[]" value="<?php echo $id; ?>">
                                    <?php echo $name; ?>
                                </td>
                            </tr>
                        <?php
                            $sno++;
                        }
                        ?>

                    </table>
                </div>
            

        </form>
    </div>
	<script src="nav_script.js"></script>
<script>
    function confirmLogout() {
        var confirmLogout = confirm('are you want to logout');
        if (confirmLogout) {
            window.location.href = "logout.php";
            header('location: login.php');


        }
    }
</script></body>

</html>


