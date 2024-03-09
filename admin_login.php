<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FOOD4ME - Login or register</title>
  <link rel="stylesheet" href="ASSETS/CSS/login.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <div class="topnav">
    <a href="user_login.php"><button class="topnav-btn">User <i class="fa fa-user"></i></button></a>
  </div>
  <div class="container">
    <div class="login">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" name="myform" method="post">
        <p class="heading">ADMIN</p>
        <input type="text" name="username" placeholder="Enter your username" class="input" /><br />
        <input type="password" name="password" placeholder="Enter your password" class="input" /><br />
        <input type="submit" class="login-btn" />
      </form>
    </div>
  </div>
</body>

</html>

<?php
include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $uname = $pass = "";
  $uname = $_POST['username'];
  $pass = $_POST['password'];

  $sql = "SELECT * FROM admin WHERE admin_username='$uname'";
  $result = $con->query($sql);
  $row = $result->fetch_assoc();
  if ($row['admin_password'] === $pass) {
    session_start();
    $_SESSION["uname"] = $row['admin_username'];
    $_SESSION["pass"] = $row['admin_password'];
    echo '<script>location.href="adminHome.php"</script>';
  } else {
    echo '<script>alert("Incorrect Username Or Password");</script>';
  }
}
?>