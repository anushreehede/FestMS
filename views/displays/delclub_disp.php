<html>
	<head>
		<meta charset="utf=8"/>
		<title>Delete</title>
		<link type="text/css" href="../comp.css" rel="stylesheet" />
	</head>

	<body>
	<?php 
		  $dbhost = "localhost";
          $dbname = "Fest";
          $dbuser = "root";
          $dbpass = "anuhede1997";
          $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
      
          if(! $conn ) {
            die("Could not connect: ". mysqli_error());
          }
    ?>
		<h1> Delete Club</h1>
		<a href="../entities/club.php" class="back">Back</a>
		<p>Pick the club(s) you wish to delete.</p>
		<?php 
		$sql = "SELECT club_name FROM Club";
		  mysqli_select_db('Fest');
		  $clubs = mysqli_query($conn, $sql);
		  if(! $clubs ) {
		  	die('Could not get data: ' . mysqli_error());
          }
		?>
		<form action='../displays/delcl.php' method='post'>
		<?php while($row = mysqli_fetch_array($clubs, MYSQLI_ASSOC))
		{ ?>
			<input type='checkbox' name='clubs[]' value='<?php echo $row["club_name"]?>'> <?=$row["club_name"]?><br>
			<br><br><br>
		<?php } 
	    ?>
			<input type='submit' value='Submit'>
		</form> 
	</body>
</html>
<?php
   mysqli_close($conn);
?>