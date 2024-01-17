<?php
include "nav_config.php";
include 'auth_session.php';

$mode = $_REQUEST['mode'];
$id = $_REQUEST['id'];
$user_id = $_REQUEST['user_id'];
$menu_id = $_REQUEST['menu_id'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Assigned Menu Display</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div><br>
        <div class="container">
            <div class="col-lg-12">
                <br><br>
                <table id="tabledata" class="table table-striped table-hover table-bordered">
                    <thead class="bg-light text-dark text-center">
                        <th>ID</th>
                        <th>User</th>
                        <th>Menu</th>
                    </thead>
                    <tbody>
                        <?php
                        include "nav_config.php";
                        $sql = "SELECT a.id, b.username, c.menu_name FROM user_menu a
                                JOIN user b ON a.user_id = b.id
                                JOIN menu c ON a.menu_id = c.id";
                        $result = mysqli_query($conn, $sql);
                        while ($res = mysqli_fetch_array($result)) {
                        ?>
                            <tr class="text-center">
                                <td><?php echo $res['id']; ?></td>
                                <td><?php echo $res['username']; ?></td>
                                <td><?php echo $res['menu_name']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function confirmLogout() {
            var confirmLogout = confirm('Are you sure you want to logout?');
            if (confirmLogout) {
                window.location.href = "logout.php";
                // header('location: login.php'); // Note: This won't work here, use JavaScript for redirection
            }
        }
    </script>
</body>

</html>
