<html>
	<head>
		<meta charset="utf-8"/>
		<title>Login - Pearl Database</title>
		<link type="text/css" href="login.css" rel="stylesheet" />
	</head>

	<body>
		<h1>Pearl Management System</h1>
		<form action='login.php' method='post'>
			<div class="container">
				<label><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="uname" required>

				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="psw" required>

				<button type="submit">Login</button>
			</div>
		</form>
	</body>
</html>