<?php
include 'auth_session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Nabvar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<style>

.navbar-nav {
    display: flex;
    align-items: center;
    list-style: none;
    margin: 0;
    padding: 0;
   background: white;
    }
.nav-item a{
	color:black;
}
    .navbar-nav li {
    position: relative;
    }

    .navbar-nav li a {
	text-decoration: none;
    padding: 10px;
	color:black;
	font-size:20px;
    display: block;
   }

   .navbar-nav li:hover .dropdown-menu {
    display: block;
	
    }
	 .add {
			margin-right:40px;
            color: black;
            padding: 5px;
            border: 2px solid black;
        }
  .dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
	color:white;
    background-color:transparent ;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 7px;
    list-style: none;
    }

   .dropdown-menu a {
	color: black;
    text-decoration: none;
    display: block;
    padding: 10px;
    }
</style>
</head>
<body>
 
     <nav class="navbar navbar-expand-lg  bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
			
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php
					include 'nav_config.php';
                    function getMenuItems($parent_id = 0)
                    {
                        global $conn;
                        $menuItems = [];
                        $sql = "SELECT * FROM menu WHERE parent_id = $parent_id";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $row['children'] = getMenuItems($row['id']);
                            $menuItems[] = $row;
                        }
                        return $menuItems;
                    }

                    function generateMenu($items)
                    {
                        echo '<ul class="navbar-nav">';
                        foreach ($items as $item) {
                            echo '<li class="nav-item">';
                            echo '<a href="' . $item['menu_action'] . '">' . $item['menu_name'] . '</a>';
                            if (!empty($item['children'])) {
                                echo '<ul class="dropdown-menu">';
                                generateMenu($item['children']);
                                echo '</ul>';
                            }
                            echo '</li>';
                        }
                        echo '</ul>';
                    }

                    $menuItems = getMenuItems();
                    generateMenu($menuItems);

                    mysqli_close($conn);
                    ?>
                </ul>
            </div>
			<div class="welcome-msg"> <?php echo "welcome" . "  " . $_SESSION['username']; ?>

    <button class=" btn btn-light add" onclick="confirmLogout()"> Logout </button></div>
 
        </div>
    </nav>
</body>

</html>
