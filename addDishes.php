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

    function validateAddDish() {
      var x = document.myform.dishname.value;
      var y = document.myform.price.value;
      var z = document.myform.cusinetype.value;
      if (x == "" || y == "" || z == "") {
        alert("Enter all fields");
        return false;
      }

    }
  </script>
</head>

<body>
  <div class="topnav" id="myTopnav">
    <a href="adminHome.php">Home <i class="fa fa-home"></i></a>
    <a href="dashboard.php">Dashboard<i class="fa fa-dashboard"></i></a>
    <a href="" class="active">Add Dishes<i class="fa fa-plus"></i></a>
    <a href="removeDishes.php">Remove Dishes<i class="fa fa-minus"></i></a>
    <a href="changeUsername.php">Change Username<i class="fa fa-user"></i></a>
    <a href="changePassword.php">Change Password<i class="fa fa-lock"></i></a>
    <a href="adminSessionLogout.php">Log Out<i class="fa fa-sign-out"></i></a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>

  <div class="wraper">
    <div class="container2">
      <header>Add Dishes</header>
      <footer>
        <form name="myform" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" onsubmit="return validateAddDish()">
          <input class="input-box" type="text" name="dishname" placeholder="Dish Name" />
          <input class="input-box" type="text" name="price" placeholder="Price" /><br />
          <input class="input-box" type="text" name="cusinetype" placeholder="Cusine Type" /><br />
          IMAGE:
          <input class="input-box" type="file" value="Image" accept="image/*" name="image" />
          <br />
          <input id="btn" type="submit" value="ADD" name="submit" />
          <input id="btn" type="reset" value="Reset" />
        </form>
      </footer>
    </div>
  </div>
</body>

</html>
<?php
session_start();
if (!isset($_SESSION['pass']))
  header("Location: index.html");
?>
<?php

if (isset($_POST["submit"])) {

  include 'connection.php';

  $dish_name = $price = $cusine_type = "";
  $dish_name = $_POST["dishname"];
  $price = $_POST["price"];
  $cusine_type = $_POST["cusinetype"];
  $dish_image = $_POST["image"];

  $q1 = "INSERT INTO products (dish_name,dish_price,cusine_type,dish_image)VALUES('$dish_name','$price','$cusine_type','$dish_image')";
  $con->query($q1);
  unset($dish_name, $dish_image, $price, $cusine_type);
  $con->close();
}

?>