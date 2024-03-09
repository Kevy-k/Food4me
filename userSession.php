<?php
session_start();
if (isset($_SESSION['userpass'])) {
    echo '<script>location.href="user_home.php"</script>';
} else
    echo '<script>location.href="user_login.php"</script>';
