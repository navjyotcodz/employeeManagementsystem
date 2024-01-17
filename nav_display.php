<?php
 include 'auth_session.php'; 
include 'nav_config.php';
$valueToSearch = $_REQUEST['sel_city'];
$mode = $_REQUEST['mode'];
$id = $_REQUEST['id'];
$city = $_REQUEST['city'];

?>
<!DOCTYPE html>
<html>

<head>
    <title></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
    <style>
        .add {
            margin-left:40px;
            color: black;
            padding: 5px;
            border: 2px solid black;
        }

        .add:hover {
            background-color: red;
        }

        .welcome-msg {
            margin-left: 999px;
            font-size: 19px;

        }
	
    </style>
</head>

<body>
<?php
include 'navbar.php';
?>
 
    <form action="" method="POST">
        &nbsp &nbsp <label>city</label>
        &nbsp <select name="sel_city" onchange="form.submit()">
            <option value="">select city</option>
            <?php
			include'nav_config.php';
            echo $sql = "SELECT  distinct a.city,b.city_name from stud_table a,city b where a.city=b.id ORDER BY B.CITY_NAME asc";
            $result = mysqli_query($conn, $sql);
			//mysqli_fetch_array function k zariye result set s data fetch kia jarha h aur res variable m store krrha h
            while ($res = mysqli_fetch_array($result))
            {
                $city = $res['city'];
                $id = $res['id'];
                $city_nm = $res['city_name'];

            ?>
            echo " <option value="<?php echo $city ?>" <? if ($city == $valueToSearch){ ?>selected<? } ?>><?php echo $city_nm; ?></option>";

            <?php
            }
            ?>
        </select>

        <div class="col-lg-12">
            <table id="tabledata" class=" table table-striped table-hover table-bordered">

                <tr class="bg-light text-dark text-center">


                    <th> Id </th>
                    <th> Firstname </th>
                    <th> Lastname </th>
                    <th> Dob </th>
                    <th>Age </th>
                    <th> Gender </th>
                    <th> Qualification </th>
                    <th> Certificate</th>
                    <th> Uploads </th>

                    <th> City </th>

                    <th> Edit </th>
                    <th> Delete </th>
                </tr>

                <?php

                include 'nav_config.php';

                if (!empty($valueToSearch))
                {
                    $stmtt = " AND  b.id='$valueToSearch'";
                }
                //select a.firstname from stud_table a,qualification c where a.qualification=c.id
                //$sql = "select a.*,c.quali_name, b.city_name FROM stud_table a JOIN city b ON a.city = b.id JOIN qualification c ON  a.qualification = c.id $stmtt";

                $sql = "select a.*,c.quali_name,b.city_name,year(NOW()) - year(dob)-(DATE_FORMAT(NOW(),'%m%d')<DATE_FORMAT(dob,'%m%d')) as age from stud_table a,city b,qualification c where a.city=b.id and a.qualification=c.id $stmtt ";
                $result = mysqli_query($conn, $sql);
            //mysqli_fetch_array function k zariye result set s data fetch kia jarha h aur res variable m store krrha h
                while ($res = mysqli_fetch_array($result))
                {
                    $cer = $res['certificate'];
                ?>
                    <tr class="text-center">
                        <td> <?php echo $res['id']; ?> </td>
                        <td> <?php echo $res['firstname']; ?> </td>
                        <td> <?php echo $res['lastname']; ?> </td>
                        <td> <?php echo $res['dob']; ?> </td>
                        <td> <?php echo $res['age']; ?> </td>
                        <td> <?php echo $res['gender']; ?> </td>
                        <td><a href="certificate.php?id=<?php echo $res['id']; ?>"> <?php echo $res['quali_name'];  ?></a> </td>
                        <?
                        if ($cer == '')
                        {
                        ?>
                            <td> <img src="nav/no_images.jpg" width="100px" height="50px" </td>
                            <?
                        }
                        else
                        {
                            ?>
                            <td> <img src="<?php echo $cer  ?>" width="100px" height="50px" </td>
                            <? } ?>
                            <td>
                                <a href="<?php echo $res['file_name']; ?>" target="_blank">
                                    <img src="<?php echo $res['file_name']; ?>" width="100px" height="50px" alt="certificate"></a>
                            </td>

                            <td> <?php echo $res['city_name'];  ?> </td>


                            <td> <button class="btn-success btn"> <a href="nav_first.php?mode=edit&id=<?php echo $res['id']; ?>" class="text-white"> Edit </a> </button> </td>
                            <td> <button class="btn-warning btn"> <a href="nav_process.php?mode=delete&id=<?php echo $res['id']; ?>" class="text-dark"> Delete </a> </button> </td>
                    </tr>

                <?php
                }
                ?>

            </table>

        </div>



    </form>
</body>
<script src="nav_script.js"></script>
<script>
    function confirmLogout() {
        var confirmLogout = confirm('are you want to logout');
        if (confirmLogout) {
            window.location.href = "logout.php";
            header('location: login.php');


        }
    }
</script>

</html>