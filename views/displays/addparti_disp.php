<html>
	<head>
		<meta charset="utf-8" />
		<title>Add Participant</title>
		<link type="text/css" href="../comp.css" rel="stylesheet">
	</head>

	<body>
		<h1>Add Participant: <?php echo $_GET["ename"]?> 
		</h1>
		<a href="../index.php" class="back">Back</a>
		<form action='../displays/addparti.php' method='post'>
			Name: <input type="text" name="p_name" /> <br><br>
			ID: <input type="text" name="id" /> <br><br>
			College: <input type="text" name="college" /> <br><br>
			Phone: <input type="text" name="phone" /> <br><br>
			Email: <input type="text" name="email" /> <br><br>
			<input type="hidden" name="ename" value="<?php echo $_GET['ename']?>" />
			<input type="hidden" name="pro" value="<?php echo $_GET['pro'] ?>" />
			<br><br><br>
			<input type="submit" />
		</form>
	</body>
</html>