<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOOD4ME - Login or register</title>
    <link rel="stylesheet" href="ASSETS/CSS/login.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="topnav">
        <a href="adminSession.php"><button class="topnav-btn">Admin<i class="fa fa-cog"></i></button></a>
    </div>
    <div class="container">
        <div class="login">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="myform">
                <p class="heading">LOGIN</p>
                <input type="text" name="phone" placeholder="Phone number" class="input"><br>
                <input type="password" name="password" placeholder="Password" class="input"><br>
                <input type="submit" class="login-btn">
                <p class="no-account">Don't have an account ? <a href="registration.php" class="register-link">Register</a></p>
            </form>
        </div>
    </div>
</body>

</html>

<?php
include 'connection.php';
// if (isset($_SESSION['userpass']))
//     echo '<script>location.href="user_home.php"</script>';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    if (isset($_SESSION['userpass']))
        echo '<script>location.href="user_home.php"</script>';

    $pno = $userpass = "";
    $pno = $_POST['phone'];
    $userpass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE phone='$pno'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    if ($row['Passwords'] === $userpass) {
        $_SESSION["userId"] = $row['uid'];
        $_SESSION["userpass"] = $row['Passwords'];
        echo '<script>location.href="user_home.php"</script>';
    } else {
        echo '<script>alert("Incorrect Username Or Password");</script>';
    }
}
?>