<?php
$con = mysqli_connect("localhost", "root", "", "food4me");
if (!$con)
    die();
if (isset($_POST["phoneno"])) {
    $phoneno = $_POST['phoneno'];
    $q1 = "SELECT count(*) as cnt FROM users WHERE phone='$phoneno'";
    $result = mysqli_query($con, $q1);
    $response = "true";
    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_array($result);
        $count = $row['cnt'];
        if ($count > 0) {
            $response = "false";
        }
    }
    echo $response;
    die;
}
