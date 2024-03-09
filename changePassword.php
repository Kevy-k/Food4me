<?php
session_start();
if (!isset($_SESSION['pass']))
  header("Location: index.html");
?>

<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="admin_home.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <script>
    function myFunction() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }
  </script>
</head>

<body>
  <div class="topnav" id="myTopnav">
    <a href="adminHome.php">Home<i class="fa fa-home"></i></a>
    <a href="dashboard.php">Dashboard<i class="fa fa-dashboard"></i></a>
    <a href="addDishes.php">Add Dishes<i class="fa fa-plus"></i></a>
    <a href="removeDishes.php">Remove Dishes<i class="fa fa-minus"></i></a>
    <a href="changeUsername.php">Change Username<i class="fa fa-user"></i></a>
    <a href="" class="active">Change Password<i class="fa fa-lock"></i></a>
    <a href="adminSessionLogout.php">Log Out<i class="fa fa-sign-out"></i></a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>

  <div class="wraper">
    <div class="container2">
      <header>Change Password</header>
      <footer>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?> " method="post">
          <input class="input-box" type="text" placeholder="Current Password" name="currentpass" />
          <input class="input-box" type="text" placeholder="New Password" name="newpass" /><br />
          <input id="btn" type="submit" value="Change" name="submit" />
        </form>
      </footer>
    </div>
  </div>
</body>

</html>


<?php
include 'connection.php';
if (isset($_POST["submit"])) {
  $currentpass = $newpass = "";
  $currentpass = $_POST["currentpass"];
  $newpass = $_POST["newpass"];

  $q1 = "SELECT * FROM admin";
  $result1 = $con->query($q1);
  $row1 = $result1->fetch_assoc();
  if ($row1['admin_password'] == $currentpass) {
    $q2 = "UPDATE admin SET admin_password='$newpass'";
    $con->query($q2);
    echo '<script>alert("Password Changed.Please Login again.");</script>';
    echo '<script>location.href="adminSessionLogout.php";</script>';
  } else
    echo '<script>alert("Password not Changed");</script>';
}


?>