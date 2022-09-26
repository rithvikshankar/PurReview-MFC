<?php
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$dob = $_POST['dob'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$hash_p = password_hash($password, PASSWORD_DEFAULT);

	$link = new mysqli("localhost", "root", "", "MFC_final");

	if ($link -> connect_error) {
		die("ERROR: Could not connect. " . $link -> connect_error);
	}

	$stmt = $link->prepare("INSERT INTO accounts (fname, lname, dob, email, password) values (?, ?, ?, ?, ?)");

	$stmt -> bind_param("sssss", $fname, $lname, $dob, $email, $hash_p);

	$execval = $stmt->execute();

	echo "<script>alert('Successfully registered!')</script>";

	$stmt->close();
	$link->close();

	header("location: loginpage.php");
?>
