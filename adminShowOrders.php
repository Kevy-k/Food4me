<?php
session_start();
if (!isset($_SESSION['pass']))
    header("Location: index.html");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="ASSETS/CSS/registration.css" />
</head>
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
<style>
    @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@200&family=Play:wght@700&display=swap');

    * {
        font-family: 'Kanit', sans-serif;
        font-family: 'Play', sans-serif;
    }

    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        background-color: floralwhite;
    }

    .topnav {
        overflow: hidden;
        background-color: black;
    }

    .topnav a {
        float: left;
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }

    .topnav a:hover {
        background-color: lightgrey;
        color: black;
    }

    .topnav a.active {
        background-color: lightseagreen;
        color: black;
    }

    .topnav .icon {
        display: none;
    }

    @media screen and (max-width: 700px) {
        .topnav a:not(:first-child) {
            display: none;
        }

        .topnav a.icon {
            float: right;
            display: block;
        }
    }

    @media screen and (max-width: 700px) {
        .topnav.responsive {
            position: relative;
        }

        .topnav.responsive .icon {
            position: absolute;
            right: 0;
            top: 0;
        }

        .topnav.responsive a {
            float: none;
            display: block;
            text-align: left;
        }
    }

    .showOrders {
        padding: 50px;
    }

    th {
        padding: 20px;
        width: 200px;
        border: 2px solid black;
    }


    tr td {
        text-align: center;
        padding: 20px;
        width: 300px;
        border: 2px solid black;
    }

    #dispatch {
        font-size: larger;
        border: none;
        background-color: lightgreen;
        padding: 20px;
    }

    #dispatch:hover {
        padding: 17px;
    }
</style>

<body>
    <nav id="navbar">
        <a href="adminHome.php">GO BACK</a>

    </nav>


    <div class="showOrders">
        <table>
            <th>USER</th>
            <th>ORDER ID</th>
            <th>DISH ID</th>
            <th>QUANTITY</th>
            <th>DISPATCH</th>
            <?php
            include 'connection.php';
            $q1 = "SELECT * FROM orders";
            $result1 = $con->query($q1);
            while ($row = $result1->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row['uid']; ?></td>
                    <td><?php echo $row['order_id']; ?></td>
                    <td><?php echo $row['dish_id']; ?></td>
                    <td><?php echo $row['order_quantity']; ?></td>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <td><button id="dispatch" name="<?php echo $row['uid']; ?>">Dispatch</button></td>
                    </form>

                </tr>
            <?php
            } ?>
        </table>

    </div>
</body>

</html>
<?php
include 'connection.php';
$q3 = "SELECT * FROM orders";
$result2 = $con->query($q3);
while ($rows = $result2->fetch_assoc()) {


    if (isset($_POST[$rows['uid']])) {
        $UID = $rows['uid'];
        $q4 = "DELETE FROM orders WHERE uid='$UID'";
        $con->query($q4);
    }
}
?>