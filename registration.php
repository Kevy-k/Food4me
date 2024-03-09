<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>


  <script src="jquery-3.7.1.js"></script>
  <script>
    $(document).ready(function() {
      $('#phonenum').keyup(function() {
        var phoneno = $(this).val();
        if (phoneno != "") {
          $.ajax({
            url: 'ajaxfile.php',
            type: 'post',
            data: {
              phoneno: phoneno
            },
            success: function(response) {
              if (response == "true") {
                $("#uname_response").html(
                  "<span style='color:green'>*Available</span>"
                );
                $("#submit-btn").show();
              } else {
                $("#uname_response").html(
                  "<span style='color:red'>*Phone number already exists</span>"
                );
                $("#submit-btn").hide();
              }
            },
          });
        } else {
          $('#uname_response').html("");
          $("#submit-btn").show();
        }
      });


    });
  </script>
</head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@200&family=Play:wght@700&display=swap');

  * {
    margin: 0;
    padding: 0;
    font-family: 'Kanit', sans-serif;
    font-family: 'Play', sans-serif;
  }

  body {
    background-color: rgb(235, 233, 233);
  }

  #navbar {
    background-color: black;
    height: 70px;
  }

  #navbar a {
    text-decoration: none;
    color: white;
    display: inline-flex;
    margin: 20px;
    height: 30px;
    text-align: center;
  }

  #navbar a:hover {
    color: red;
  }

  .register {
    align-items: center;
    margin-top: 50px;
    margin: 0 auto;
    border: 2px solid black;
    border-radius: 50px 0 50px;
    width: max-content;
    height: max-content;
    background: rgb(37, 60, 95);
    border: none;
    box-shadow: 0 0 20px rgb(95, 93, 93);
  }

  .register h1 {
    text-align: center;
    color: white;
    padding: 12px;
  }

  .register .input-box {
    display: flex;
  }

  .input-box input {
    width: 100%;
    padding: 10px;
    margin: 10px 10px 10px 10px;
    border-radius: 8px;
  }

  .btns {
    margin-left: 20px;
  }

  .register #submit-btn {
    font-size: medium;
    margin: 20px;
    background-color: white;
    color: black;
    width: 150px;
    height: 30px;
    border-color: white;
    border-radius: 32px;
  }

  .register #reset-btn {
    font-size: medium;
    margin: 20px;
    background-color: red;
    color: white;
    width: 150px;
    height: 30px;
    border-color: white;
    border-radius: 32px;
  }

  .register #submit-btn:hover {
    font-size: large;
    box-shadow: 0 0 10px rgb(16, 133, 196);
    background: rgb(0, 0, 0);
    color: white;
  }

  .register #reset-btn:hover {
    font-size: large;
    box-shadow: 0 0 10px rgb(195, 20, 20);
  }
</style>

<body>
  <nav id="navbar">
    <a href="user_login.php">GO BACK</a>
  </nav>


  <form action="<?php echo ($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return registerValidate();" name="myform">
    <div class="register">
      <h1>Registration</h1>

      <div class="input-box">

        <input type="text" name="fname" required placeholder="First Name" />
        <input type="text" name="lname" required placeholder="Last Name" />
      </div><br>

      <div class="input-box">

        <input type="email" name="email" placeholder="E-mail" required />
      </div><br>

      <div class="input-box">

        <input type="password" name="createpass" required placeholder="Create Password" />
        <input type="password" name="confirmpass" required placeholder="Confirm Password" />
      </div><br>



      <div class="input-box">

        <input type="text" name="phno" required placeholder="Phone No." id="phonenum" /><br>
        <p id="uname_response" style="font-size: small;"></p>
      </div><br>


      <div class="input-box">
        <input type="text" name="house_name" required placeholder="House Name" />
        <input type="text" name="place" required placeholder="Place" />
      </div><br>



      <div class="input-box">
        <input type="text" name="landmark" placeholder="Landmark" />
        <input type="text" name="pincode" required placeholder="Pincode" />
      </div>





      <div class="btns">
        <button id="reset-btn" type="reset">Reset</button>
        <button id="submit-btn" type="submit">Submit</button>
      </div>
    </div>
  </form>

</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $con = new mysqli("localhost", "root", "", "food4me");
  if ($con->connect_error) {
    die();
  }


  $fname = $lname = $email = $password = $phone = $house_name = $place = $landmark = $pincode = "";

  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $email = $_POST["email"];
  $password = $_POST["confirmpass"];
  $phone = $_POST["phno"];
  $house_name = $_POST["house_name"];
  $place = $_POST["place"];
  $landmark = $_POST["landmark"];
  $pincode = $_POST["pincode"];




  $sql = "INSERT INTO approve (fname,lname,Email,Passwords,Phone,house_name,place,landmark,pincode)VALUES('$fname','$lname','$email','$password','$phone','$house_name','$place','$landmark','$pincode')";
  $con->query($sql);

  $con->close();
}
?>