<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="postlistStyles.css" />
		<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
		<title> Home </title>
	</head>
	<body>
	<div class="topnav">
			<a class="active" href="postlist.php">Home</a>
			<a href="profile.php">Profile</a>
			<a href="contact.php">Contact</a>
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
			<h2>PurReview
				<br><br>
				<a href="postupload.php"><button>Upload a review</button></a>
				<br>
			</h2>
			<?php
				while($row = mysqli_fetch_assoc($result)) {
					echo "<a href='singlepost.php?id=" . $row['postid'] . "'>";
					echo "<table>";
					echo "<tr><td style = 'color: #f99f38'><strong>" . $row['title'] . "</strong></tr></td>";
					echo "<tr><td>" . $row['content'] . "</tr></td>";
					if ($row['image_name'] != 'NULL')
					{
						echo "<tr><td> <img src='images/" . $row['image_name'] . "' width='730'></tr></td>";
					}
					echo "</table></a><br><br>";
				}
			?>
		</div>
	</body>
</html>
