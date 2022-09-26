

<!DOCTYPE html>
<html>
	<head>
	    <title>Login</title>
	    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
	    <link rel="stylesheet" href="loginstyle.css">
	    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
		
	</head>

	<script type="text/javascript" src="loginJS.js"></script>

	<body>
	    <image class="cat" src="cat_temp_4.png"></image>
	    <form method="POST" action="loginaction.php">
	        <div class="container">
	            <div class="login_box">
	                <input type="email" id="t1" placeholder="Enter Email" name="email"> <br>
	                <input type="password" id="t2" placeholder="Enter Password" style="margin-top: 10%;" name="password">
	                <i class="bi bi-eye-slash" id="togglePassword" onclick="javascript:showpass()"></i> <br>
	                <button type="submit">LOGIN</button>
	                <br>
	                <p class="signup">Don't have an account? Sign up <a href="register.html" id="signup">here</a></p>
	            </div>
	        </div>
	    </form>
		<script>
			function showpass() {
				var x = document.getElementById("t2");
				if (x.type === "password") {
					x.type = "text";
					}
				else {
					x.type = "password";
				}
			};
		</script>
	</body>
</html>
