<?php
include "nav_config.php";

$mode = $_REQUEST['mode'];
$id = $_REQUEST['id'];

if ($mode == "add" && isset($_REQUEST['submit_assign'])) {
    $user_id = $_REQUEST['user_id'];
    $menu_ids = isset($_REQUEST['menu_id']) ? $_REQUEST['menu_id'] : [];

    if (empty($user_id) || empty($menu_ids)) {
        echo "Invalid data provided.";
        exit;
    }
    
    $sql = "INSERT INTO `user_menu` (`user_id`, `menu_id`) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    foreach ($menu_ids as $menu_id) {
        mysqli_stmt_bind_param($stmt, "ss", $user_id, $menu_id);
        mysqli_stmt_execute($stmt);
    }
    
    $affected_rows = mysqli_stmt_affected_rows($stmt);

    mysqli_stmt_close($stmt);

    if ($affected_rows > 0) {
        // Update session variable with selected menu items
        session_start();
        $_SESSION['selected_menu_ids'][$user_id] = $menu_ids;

        echo '<script>alert("Data inserted"); window.location.href = "assign_display.php";</script>';
    } else {
        echo "Data not inserted";
    }
}

mysqli_close($conn);
?>
