<!DOCTYPE html>
<html>

<head>
	<title>AdminHome</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="Dashboard.css">
	<link rel="stylesheet" href="admin_home.css" />
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
<style>
	body {
		text-align: center;
	}

	a {
		text-decoration: none;
		color: black;
	}

	.container {
		padding: 30px;
		height: 1000px;
		text-align: center;
	}

	.dashboard {
		display: block;
		margin: 0 auto;
		width: max-content;
		background-color: lightgrey;
		box-shadow: 0px 0px 20px 2px black;

	}

	header {
		float: left;
		font-size: 25px;
	}

	.dashboard footer {
		padding: 20px;
		display: inline-flex;

	}

	.dashboard .inner-box {
		padding: 20px;
		margin: 20px;
		box-shadow: 0px 0px 20px black;
		width: 120px;
		background-color: white;
	}

	.dashboard .inner-box:hover {
		transition: 0.7s;
		background-color: grey;
		color: white;
	}

	h3 {
		font-size: 30px;
	}

	p {
		font-size: 32px;
		font-weight: bolder;
		color: white;
		background-color: black;
	}

	@media screen and (max-width: 768px) {

		.dashboard {
			margin-top: 200px;
		}

		.dashboard footer {
			padding: 30px;
			display: block;
		}

		.inner-box {
			box-shadow: 0px 0px 20px black;
			margin-top: 12px;
		}
	}
</style>

<body>

	<div class="topnav" id="myTopnav">
		<a href="adminHome.php">Home<i class="fa fa-home"></i></a>
		<a href="" class="active">Dashboard<i class="fa fa-dashboard"></i></a>
		<a href="addDishes.php">Add Dishes<i class="fa fa-plus"></i></a>
		<a href="removeDishes.php">Remove Dishes<i class="fa fa-minus"></i></a>
		<a href="changeUsername.php">Change Username<i class="fa fa-user"></i></a>
		<a href="changePassword.php">Change Password<i class="fa fa-lock"></i></a>
		<a href="adminSessionLogout.php">Log Out<i class="fa fa-sign-out"></i></a>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			<i class="fa fa-bars"></i>
		</a>
	</div>
	<div class="container">
		<div class="dashboard" id="home">
			<header>Dashboard</header>
			<footer>
				<a href="dashboardUserDetails.php">
					<div class="inner-box">
						<h3>Users</h3>
						<p><?php
							include 'connection.php';
							$q1 = "SELECT COUNT(*) FROM users";
							$result1 = $con->query($q1);
							$num = $result1->fetch_array();
							echo $num[0];
							?></p>
					</div>
				</a>
				<a href="adminShowOrders.php">
					<div class="inner-box">
						<h3>Orders</h3>
						<p><?php
							include 'connection.php';
							$q1 = "SELECT COUNT(uid) FROM orders";
							$result1 = $con->query($q1);
							$num = $result1->fetch_array();
							echo $num[0];
							?></p>
					</div>
				</a>
				<a href="dashboardApproveUser.php">
					<div class="inner-box">
						<h3>Approve</h3>
						<p><?php
							include 'connection.php';
							$q1 = "SELECT COUNT(uid) FROM approve";
							$result1 = $con->query($q1);
							$num = $result1->fetch_array();
							echo $num[0];
							?></p>
					</div>
				</a>
			</footer>
		</div>
	</div>



</body>

</html>