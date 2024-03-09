<?php
session_start();
if (!isset($_SESSION['userpass']))
    header("Location: index.html");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER HOME</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="user.css">
    <script type="text/javascript">
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
                document.getElementById("navbar").style.padding = "10px 10px";
                document.getElementById("logo").style.fontSize = "25px";
                document.getElementById("logo").style.color = "white";
            } else {
                document.getElementById("navbar").style.padding = "40px 5px 5px";
                document.getElementById("logo").style.fontSize = "50px";
                document.getElementById("logo").style.color = "black";
            }
        }

        function livesearch() {
            let names = document.querySelectorAll('.name')
            let search_query = document.getElementById("searchbox").value
            for (var i = 0; i < names.length; i++) {
                if (names[i].textContent.toLowerCase().includes(search_query.toLowerCase())) {
                    names[i].classList.remove("hide");
                } else {
                    names[i].classList.add("hide");

                }
            }
        }
    </script>
</head>
<style>
    .hide {
        display: none;
    }
</style>

<body>
    <div id="navbar">
        <h1 id="logo">FOOD4ME</h1>
        <div><input type="search" id="searchbox" placeholder="Search Food" oninput="livesearch()">

        </div><br>

        <div id="navbar-right">

            <a class="active" href="#home">Home <i class="fa fa-home"></i></a>
            <a href="contact.html">Contact <i class="fa fa-user"></i></a>
            <a href="about.html">About <i class="fa fa-info"></i></a>
            <a href="myCart.php">Cart <i class="fa fa-shopping-cart"></i></a>
            <a href="userSessionLogout.php">
                <i class="fa fa-sign-out"></i>LogOut
            </a>
        </div>
    </div>

    <div class="content">


        <?php
        include 'connection.php';
        $q1 = "SELECT * FROM products";
        $result = $con->query($q1);
        while ($rows = $result->fetch_assoc()) {
        ?>

            <section class="name">
                <div class="products">
                    <div class="product-items">
                        <?php
                        $i = 1;
                        $image[$i] = $rows['dish_image'];
                        ?>
                        <img src="ASSETS/IMAGES/<?php echo $image[$i]; ?>" />
                        <h3><?php echo $rows['dish_name']; ?></h3>
                        <h5>Rs:<?php echo $rows['dish_price']; ?></h5>
                        <h5>Cusine:<?php echo $rows['cusine_type']; ?></h5>
                        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" id="myform">
                            <button onsubmit="noRefresh();" id="addToCartButton" type="submit" class="btn" name="<?php echo $rows['dish_id']; ?>">Add to cart <i class="fa fa-shopping-cart"></i></button>
                        </form>
                    </div>
            </section>

        <?php
            $i++;
        }
        ?>

    </div>
</body>

</html>

<?php
include 'connection.php';
$q2 = "SELECT * FROM products";
$result = $con->query($q2);
while ($row = $result->fetch_assoc()) {
    if (isset($_POST[$row['dish_id']])) {

        $userId = $_SESSION['userId'];
        $dishId = $row['dish_id'];
        $dish_name = $row['dish_name'];
        $dish_price = $row['dish_price'];
        $dish_image = $row['dish_name'];
        $q3 = "INSERT INTO mycart(uid,dish_id,items,price,images) VALUES('$userId','$dishId','$dish_name','$dish_price','$dish_image')";
        $con->query($q3);
    }
}
?>