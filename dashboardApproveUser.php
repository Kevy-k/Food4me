<?php
session_start();
if (!isset($_SESSION['pass']))
    header("Location: index.html");
?>
<?php
$con = new mysqli("localhost", "root", "", "food4me");
if (!$con) {
    die();
}
$sql = "SELECT * FROM approve";
$result = $con->query($sql);
$con->close();
?>
<html>

<head>
    <title>USER APPROVE</title>
    <style>
        table {
            padding: 20px;
            height: 200px;
            margin-top: 30px;
            border: none;

            box-shadow: 0 0 20px rgba(95, 93, 93, 1);
        }

        th {
            padding: 20px;
            border: 2px solid black;
            font-size: medium;
        }

        tr {
            text-align: center;
            height: 60px;
            font-size: small;
        }

        td {
            border: 2px solid black;
        }

        input {
            width: 100%;
            height: 100%;
            background-color: skyblue;
            color: black;
            font-size: larger;
        }

        h1 {
            text-align: center;
        }

        input:hover {
            background-color: lightgreen;
        }

        #reject {
            background-color: red;
        }
    </style>
    <link rel="stylesheet" href="ASSETS/CSS/registration.css" />
    <script>

    </script>
</head>

<body>
    <nav id="navbar">
        <a href="adminHome.php">GO BACK</a>

    </nav>
    <h1>Approve for user Registration</h1>
    <form name="myform" action="<?php echo ($_SERVER["PHP_SELF"]); ?>" method="post">
        <table>
            <tr>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone no</th>
                <th>House Name</th>
                <th>Place</th>
                <th>Landmark</th>
                <th>Pincode</th>
                <th>APPROVE USER</th>
                <th>REJECT USER</th>
            </tr>
            <?php
            while ($rows = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $rows['uid']; ?></td>
                    <td><?php echo $rows['fname']; ?></td>
                    <td><?php echo $rows['lname']; ?></td>
                    <td><?php echo $rows['Email']; ?></td>
                    <td><?php echo $rows['Phone']; ?></td>
                    <td><?php echo $rows['house_name']; ?></td>
                    <td><?php echo $rows['place']; ?></td>
                    <td><?php echo $rows['landmark']; ?></td>
                    <td><?php echo $rows['pincode']; ?></td>
                    <td><input type="submit" value="Approve" name="<?php echo $rows['uid']; ?>"></td>
                    <td><input type="submit" id="reject" value="Reject" name="<?php echo $rows['Phone']; ?>"></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </form>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = new mysqli("localhost", "root", "", "food4me");
    if ($con->connect_error) {
        die();
    }
    $sql1 = "SELECT * FROM approve";
    $result = $con->query($sql1);
    while ($rows = $result->fetch_assoc()) {
        if (isset($_POST[$rows['uid']])) {
            $id = $rows['uid'];
            $sql2 = "SELECT * FROM approve where uid=$id";
            $sql3 = "DELETE FROM approve WHERE uid=$id";

            $result2 = $con->query($sql2);
            $result_row = $result2->fetch_assoc();

            $uid = $fname = $lname = $email = $password = $phone = $house_name = $place = $landmark = $pincode = "";
            $uid = $result_row['uid'];
            $fname = $result_row['fname'];
            $lname = $result_row['fname'];
            $email = $result_row['Email'];
            $password = $result_row['Passwords'];
            $phone = $result_row['Phone'];
            $house_name = $result_row['house_name'];
            $place = $result_row['place'];
            $landmark = $result_row['landmark'];
            $pincode = $result_row['pincode'];

            $sql4 = "INSERT INTO users VALUES('$uid','$fname','lname','$email','$password','$phone','$house_name','$place','$landmark','$pincode')";
            $con->query($sql4);
            $con->query($sql3);
        } else {
            $phone = $rows['Phone'];
            $q1 = "DELETE  FROM approve WHERE Phone=$phone";
            $con->query($q1);
        }
    }
    $con->close();
}
?>