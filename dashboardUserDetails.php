<?php
$con = new mysqli("localhost", "root", "", "food4me");
if (!$con) {
    die();
}
$sql = "SELECT * FROM users";
$result = $con->query($sql);
$con->close();
?>
<html>

<head>
    <title>USER DETAILS</title>
    <style>
        table {
            padding: 20px;
            height: 200px;
            margin-top: 30px;
            border: none;
            margin-left: 50px;
            box-shadow: 0 0 20px rgba(95, 93, 93, 1);
        }

        th {
            padding: 30px;
            border: 2px solid black;
            font-size: larger;
        }

        tr {
            text-align: center;
            height: 60px;
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
    </style>
    <link rel="stylesheet" href="ASSETS/CSS/registration.css" />


</head>

<body>
    <nav id="navbar">
        <a href="adminHome.php">GO BACK</a>
       
    </nav>
     <h1>USER DETAILS</h1>
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
             
            </tr>
            <?php
            while ($rows = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $rows['uid']; ?></td>
                    <td><?php echo $rows['fname']; ?></td>
                    <td><?php echo $rows['lname']; ?></td>
                    <td><?php echo $rows['Email']; ?></td>
                    <td><?php echo $rows['phone']; ?></td>
                    <td><?php echo $rows['house_name']; ?></td>
                    <td><?php echo $rows['place']; ?></td>
                    <td><?php echo $rows['landmark']; ?></td>
                    <td><?php echo $rows['pincode']; ?></td>
                    
                </tr>
            <?php
            }
            ?>
        </table>
</body>

</html>