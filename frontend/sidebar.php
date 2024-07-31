<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="/css/dashstyle.css">
    <script src="/script/dashscript.js"></script>
	<style>
		a{
			text-decoration: none !important;
		}
	</style>

	<title>AdminHub</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">AdminHub</span>
			
		</a>
		<div style="margin-left: 20px;">
			<h2>hello <?php echo $_SESSION['name']; ?></h2></h2>
		</div>
		
		<ul class="side-menu top">
			<li class="active">
				<a href="createstudent.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Create Students</span>
				</a>
			</li>
			<li>
				<a href="studenttable.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">View Students</span>
				</a>
			</li>
			
			<li>
				<a href="createteacher.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text"> Create Teacher</span>
				</a>
			</li>
			<li>
				<a href="teachertable.php">
					<i class='bx bxs-group' ></i>
					<span class="text">View Teacher</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="./frontend/logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->

	
	

	<script src="script.js"></script>
</body>
</html>