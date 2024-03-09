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
    <a href="" class="active">Home <i class="fa fa-home"></i></a>
    <a href="dashboard.php">Dashboard<i class="fa fa-dashboard"></i></a>
    <a href="addDishes.php">Add Dishes <i class="fa fa-plus"></i></a>
    <a href="removeDishes.php">Remove Dishes<i class="fa fa-minus"></i></a>
    <a href="changeUsername.php">Change Username <i class="fa fa-user"></i></a>
    <a href="changePassword.php">Change Password <i class="fa fa-lock"></i></a>
    <a href="adminSessionLogout.php">Log Out <i class="fa fa-sign-out"></i></a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
  <div class="Home">
    <h1>WELCOME TO ADMIN PANEL</h1>
  </div>
</body>

</html>
<?php
session_start();
if (!isset($_SESSION['pass']))
  header("Location: index.html");
?>