<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@200&family=Play:wght@700&display=swap');

    * {
        font-family: 'Kanit', sans-serif;
        font-family: 'Play', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: rgb(235, 233, 233);
        justify-content: center;
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

    .cart {
        display: inline-flex;
        margin-top: 50px;
        background-color: white;
        padding: 10px;
        width: 1000px;
        height: 600px;
        margin-left: 250px;
        font-size: 20px;
    }

    .display-items {
        overflow-y: scroll;
        width: 700px;
    }

    .display-items::-webkit-scrollbar {
        display: none;
    }

    table {
        margin-top: 5px;
        border: none;
        display: block;
        padding: 20px;
    }

    tr {
        box-shadow: 10px 0px 40px 1px lightgrey;
    }

    th {

        width: 100px;
        font-size: larger;
    }

    td {

        padding: 30px;
        width: 100px;
        font-weight: lighter;
    }

    .input-field {
        width: 50px;
    }

    #btn {
        font-size: large;
        border: none;
        color: red;
        background-color: white;
    }

    #btn:hover {
        font-size: larger;
    }

    @media screen and (max-width:768px) {
        .cart {
            margin-left: 0px;
        }
    }

    .container {
        text-align: center;
    }

    #total {


        height: 500px;
        text-align: left;
        padding: 20px;
    }

    #total table {
        box-shadow: 20px 10px 20px 1px lightgrey;

    }

    #total tr {
        box-shadow: none;
    }

    #total td {
        width: 250px;
        padding: 10px;
    }

    #check-out {
        font-size: 20px;
        width: 80%;
        height: 40px;
        border: none;
        background-color: lightgreen;
        box-shadow: 0px 0px 20px 1px green;
    }

    #check-out:hover {
        font-size: 25px;
    }
</style>

<body>
    <nav id="navbar">
        <a href="user_home.php"><i class="fa fa-arrow-circle-left"></i>Home</a>
    </nav>

    <div class="cart">
        <div class="display-items">
            <?php
            include 'connection.php';
            session_start();
            $userId = $_SESSION['userId'];
            $q1 = "SELECT DISTINCT * FROM mycart WHERE uid='$userId'";
            $q2 = "SELECT COUNT(DISTINCT dish_id) FROM mycart WHERE uid='$userId'";
            $num = $con->query($q2);
            $result1 = $num->fetch_array();
            $result2 = $con->query($q1);
            $total = 0;
            ?>
            <table>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th></th>
                <?php
                $i = 0;
                while ($row = $result2->fetch_assoc()) {

                    $Items = $row['items'];
                    $q3 = "SELECT  COUNT(*) FROM mycart WHERE items='$Items' and uid='$userId' GROUP BY items";
                    $result3 = $con->query($q3);
                    $quantity = $result3->fetch_array();

                ?>
                    <tr>
                        <td><?php echo $row['items']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                            <td><?php echo $quantity[0]; ?></td>
                            <td><button id="btn" name="<?php echo $row['dish_id'] ?>"><i class="fa fa-trash"></i></button></td>
                        </form>
                    </tr>
                <?php

                    $i++;
                }
                ?>
            </table>
            <?php
            $q4 = "SELECT * FROM mycart WHERE uid='$userId'";
            $result4 = $con->query($q4);
            while ($row = $result4->fetch_assoc()) {

                $total = $total + $row['price'];
            }
            ?>
        </div>

        <div class="container">
            <h2>Your Cart[<?php echo $result1[0]; ?>items]</h2>
            <div id="total">
                <table>
                    <tr>
                        <td>Sub total</td>
                        <td>:<?php echo $total; ?></td>
                    </tr>
                    <tr>
                        <td>GST </td>
                        <td>: 23.56</td>
                    </tr>
                    <tr>
                        <td>Grand Total </td>
                        <td style="color: green;">:<?php if ($total != 0) {
                                                        $total = $total + 23.56;
                                                    }
                                                    echo $total; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>Select Payment Method :</p>
                        </td>
                    </tr>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <tr>
                            <td colspan="2">
                                <input type="radio" name="payment" required>
                                Paypal
                                <i class="fa fa-cc-paypal"></i>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="radio" name="payment">
                                Credit Card
                                <i class="fa fa-credit-card"></i>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="radio" name="payment">
                                VISA
                                <i class="fa fa-cc-visa"></i>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="radio" name="payment">
                                Cash On Delivery
                                <i class="fa fa-truck"></i>
                            </td>
                        </tr>
                </table>

            </div>

            <input type="submit" id="check-out" name="submit" value="Check Out">
            </form>
        </div>
    </div>

</body>

</html>

<?php

if (!isset($_POST["submit"])) {

    $q6 = "SELECT * FROM mycart WHERE uid='$userId'";
    $result5 = $con->query($q4);
    while ($row = $result5->fetch_assoc()) {

        if (isset($_POST[$row['dish_id']])) {
            $dishid = $row['dish_id'];
            $q6 = "DELETE FROM mycart WHERE dish_id='$dishid'";
            $con->query($q6);
        }
    }
} else {
    if ($total == 0) {
        echo '<script>alert("You Have Nothing In Your Cart!..")</script>';
    } else
        echo '<script>location.href="finalPage.php"</script>';
}
?>