<?php
	session_start();
	$postid = $_GET['pid'];
	$userid = $_SESSION['userid'];

	$link = new mysqli("localhost", "root", "", "MFC_final");

	if ($link -> connect_error) {
		die("ERROR: Could not connect. " . $link -> connect_error);
	}

	$action_taken = mysqli_fetch_assoc(mysqli_query($link, "SELECT action from upvotes where userid='".$userid."' AND postid='".$postid."';"));
	if ($action_taken == NULL)
	{
		$sql = "INSERT into upvotes VALUES ('".$userid."', '".$postid."', 'UP');";
		mysqli_query($link, $sql);
		header("Location: singlepost.php?id=".$postid);
	}
	elseif ($action_taken['action'] == "DOWN")
	{
		$sql = "UPDATE upvotes SET action='UP' where userid='".$userid."' and postid='".$postid."';";
		mysqli_query($link, $sql);
		header("Location: singlepost.php?id=".$postid);

	}
	elseif ($action_taken['action'] == "UP")
	{
		$sql = "DELETE FROM upvotes WHERE userid='".$userid."' and postid='".$postid."';";
		echo $sql;
		mysqli_query($link, $sql);
		header("Location: singlepost.php?id=".$postid);

	}


?>
