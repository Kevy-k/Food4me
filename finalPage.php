<?php
include 'connection.php';
session_start();
$userId = $_SESSION['userId'];
$q1 = "SELECT DISTINCT * FROM mycart WHERE uid='$userId'";
$result = $con->query($q1);
while ($row = $result->fetch_assoc()) {
    $Items = $row['items'];
    $q2 = "SELECT  COUNT(*) FROM mycart WHERE items='$Items' and uid='$userId' GROUP BY items";
    $result3 = $con->query($q2);
    $quantity = $result3->fetch_array();
    $uid = $row['uid'];
    $dishid = $row['dish_id'];
    $q3 = "INSERT INTO orders(uid,dish_id,order_quantity)VALUES('$uid','$dishid','$quantity[0]')";
    $con->query($q3);
}

$q4 = "DELETE FROM mycart WHERE uid='$userId'";
$con->query($q4);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Thank You For Purchasing</title>
    <script type="text/javascript">
        const myTimeout = setTimeout(myGreeting, 3000);

        function myGreeting() {
            document.getElementById("Message").innerHTML = "Order Placed";
            document.getElementById("btn").style.display = "block";

        }
    </script>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@200&family=Play:wght@700&display=swap');

    * {
        font-family: 'Kanit', sans-serif;
        font-family: 'Play', sans-serif;
    }

    body {
        text-align: center;
    }

    a {
        text-decoration: none;
        color: black;
    }

    .paid {
        margin-top: 300px;
        text-align: center;
    }

    h1 {
        font-size: 40px;
        color: green;
    }

    #btn {
        background-color: lightgreen;
        width: 100px;
        margin-left: 700px;
        font-size: larger;
        border-radius: 10px 0px 10px 0px;
        display: none;
    }

    @media screen and (max-width:768px) {

        #btn {
            margin-left: 200px;
        }
    }
</style>

<body>
    <div class="paid">
        <h1 id="Message"><i class="fa fa-spinner fa-spin" style="font-size:50px"></i>Processing...</h1>
        <h2>
            <div id="btn">
                <a href="user_home.php">Done</a></ </div>
                <h2>
            </div>
</body>

</html>