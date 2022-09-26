<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="postlistStyles.css" />
		<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
		<title> Contact </title>
	</head>
	<body>
	<div class="topnav">
			<a href="postlist.php">Home</a>
			<a href="profile.php">Profile</a>
			<a class="active" href="contact.php">Contact</a>
			<a href="about.php">About</a>
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
			<h1>Contact Us</h1><br>
            <h2 id="contactus_text">For any queries, contact us at purreview@gmail.com <br><br>
            Or call us on +91 9867656453</h2>
		</div>
	</body>
</html>
