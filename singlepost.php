<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="postlistStyles.css" />
		<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
		<title> Post </title>
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
			$userid = $_SESSION['userid'];
			$link = new mysqli("localhost", "root", "", "MFC_final");

			if ($link -> connect_error) {
				die("ERROR: Could not connect. " . $link -> connect_error);
			}
			$postid=$_GET['id'];
			$sql1 = "SELECT * FROM post where postid='" . $_GET['id'] . "'";
			$result1 = mysqli_query($link, $sql1);
		?>
		<p style="text-align: right; margin-right: 1em; font-weight: bold;">Signed in as <?php echo $name; ?><br><br> <a href="logout.php"><button id="logout">Logout</button></a></p>
		
		<div class="table-data">
			
			<?php
				$row = mysqli_fetch_assoc($result1);
				echo "<table>";
				echo "<tr><td style = 'color: #f99f38'><strong>" . $row['title'] . "</strong></tr></td>";
				echo "<tr><td>" . $row['content'] . "</tr></td>";
				if ($row['image_name'] != 'NULL')
				{
					echo "<tr><td> <img src='images/" . $row['image_name'] . "' width='730'></tr></td>";
				}
				echo "<br>";
				

				$upvotes = mysqli_fetch_assoc(mysqli_query($link, "select COUNT(userid) as upvotes from upvotes where action='UP';"))['upvotes'];
				$downvotes = mysqli_fetch_assoc(mysqli_query($link, "select COUNT(userid) as downvotes from upvotes where action='DOWN';"))['downvotes'];
				
				$action_taken = mysqli_fetch_assoc(mysqli_query($link, "SELECT action from upvotes where userid='".$userid."' AND postid='".$_GET['id']."';"));
				?>

				<div class='upvotebox'>
					<tr><td>
					<span style='display: inline-block;'>

						<?php
						if ($action_taken == NULL) {
							echo "<a href='upvote.php?pid=".$postid."'><img src='upvote_not_clicked.png' style='height: 1em;'></a>";
							echo "&nbsp";
							echo $upvotes - $downvotes;
							echo "&nbsp";
							echo "<a href='downvote.php?pid=".$postid."'><img src='downvote_not_clicked.png' style='height: 1em;'></a>";
						}

						else {
							$action = $action_taken['action'];
							if ($action == 'UP') {
							echo "<a href='upvote.php?pid=".$postid."'><img src='upvote.png' style='height: 1em;'></a>";
							echo "&nbsp";
							echo $upvotes - $downvotes;
							echo "&nbsp";
							echo "<a href='downvote.php?pid=".$postid."'><img src='downvote_not_clicked.png' style='height: 1em;'></a>";
							}
							elseif ($action == 'DOWN') {
							echo "<a href='upvote.php?pid=".$postid."'><img src='upvote_not_clicked.png' style='height: 1em;'></a>";
							echo "&nbsp";
							echo $upvotes - $downvotes;
							echo "&nbsp";
							echo "<a href='downvote.php?pid=".$postid."'><img src='downvote.png' style='height: 1em;'></a>";
							}
						}
						?>
					</span>
					</td><tr>
				</table>
				<br><br>
				</div>

				<?php

				$sql2 = "SELECT a.fname, a.lname, pc.date, pc.comment FROM accounts a, post_comments pc  where postid='" . $_GET['id'] . "' and a.userid=pc.userid;";
				$result2 = mysqli_query($link, $sql2);

				while($row = mysqli_fetch_assoc($result2)) {
					echo "<table>";
					echo "<tr><td style='color:#2596be;font-weight: bold;'>" . $row['fname'] . " " . $row['lname'] . "</td><td style='text-align: right; padding-right: 0.5em'>" . $row['date'] . "</td></tr>";
					echo "<tr><td>" . $row['comment'] . "</td></tr>";
					echo "</table><br>";
				}
			?>
			<div class="CommentContainer">
				<form action="comment.php" method="get">
				<textarea id="desc" name="content" rows="4" placeholder="Enter Comment"></textarea> 
				<input type="hidden" name="pid" value="<?php echo $postid;?>">
				<input type="hidden" name="uid" value="<?php echo $userid;?>">
				<br><br>
				<button type="submit" id="commentbutton">Post Comment</button><br><br>
				</form>
			</div>
			<br>
			<div style='text-align: center;'>
				<a href='postlist.php'><button id="back">Go back</button></a>
			</div>
		</div>
	</body>
</html>
