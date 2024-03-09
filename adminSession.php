<?php
session_start();
if (isset($_SESSION['pass'])) {
    echo '<script>location.href="adminHome.php"</script>';
} else
    echo '<script>location.href="admin_login.php"</script>';
