<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="postlistStyles.css" />
		<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
		<title> About </title>
	</head>
	<body>
	<div class="topnav">
			<a href="postlist.php">Home</a>
			<a href="profile.php">Profile</a>
			<a href="contact.php">Contact</a>
			<a class="active" href="about.php">About</a>
		  </div>
		<?php
			session_start();
			if (!isset($_SESSION['email'])) {
				header("Location: loginpage.php");
			}
			else {
				$name = $_SESSION['fname'] . " " . $_SESSION['lname'];
			}

			$link = new mysqli("localhost", "root", "", "MFC_final");

			if ($link -> connect_error) {
				die("ERROR: Could not connect. " . $link -> connect_error);
			}

			$sql = "SELECT * FROM post ORDER BY postid DESC";
			$result = mysqli_query($link, $sql);
		?>
		
		<p style="text-align: right; margin-right: 1em; font-weight: bold;">Signed in as <?php echo $name; ?><br><br> <a href="logout.php"><button id="logout">Logout</button></a></p>
		<div class="table-data">
			<h1 style = "margin-bottom: 1.2em">About</h1>
			<h2>
				
				<p id = "about_text">PurReview is a review website where you can post reviews about any product! Like what you see? Give the post an upvote and let them know what you think in the comment section. 

					<br><br>The main aim of PurReview is to help you make a good decision before buying your product. Ever wanted to know about a product and get opinions from people who have used it? We've got you covered!
				</p>
				<br>
				<img id = "about_logo" src = "cat_logo_black.png" width = "150px" class = "center">
			</h2>
			
		</div>
	</body>
</html>
