<?php
	session_start();
	$email = $_POST['email'];
	$password = $_POST['password'];

	$link = new mysqli("localhost", "root", "", "MFC_final");

	if($link -> connect_error) {
        die("ERROR: Could not connect. " . $link -> connect_error);
    }

	$sql = "SELECT * FROM accounts where email='".$email."'";
	$result = $link -> query($sql);

	if ($result -> num_rows > 0) {
		while ($row = $result -> fetch_assoc()) {
			if (password_verify($password, $row['password'])) {
				session_start();
				$_SESSION['email'] = $email;
				$_SESSION['fname'] = $row['fname'];
				$_SESSION['lname'] = $row['lname'];
				$_SESSION['userid'] = $row['userid'];
				header("Location: postlist.php");
        	}

    		else {
            	echo '<script>alert("Username or password is incorrect")</script>';
				header("Location: loginpage.php");
        	}
		}
	}
	else {
		echo '<script>alert("Username or password is incorrect")</script>';
	}

?>
