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
		<h1> Delete Talk </h1>
		<a href="../entities/talk.php" class="back">Back</a>
		<p>Pick the competition(s) you wish to delete.</p>
		<?php 
		$sql = "SELECT Tname FROM Talk";
		  mysqli_select_db('Fest');
		  $talks = mysqli_query($conn, $sql);
		  if(! $talks ) {
		  	die('Could not get data: ' . mysqli_error());
          }
		?>
		<form action='../displays/delt.php' method='post'>
		<?php while($row = mysqli_fetch_array($talks, MYSQLI_ASSOC))
		{ ?>
			<input type="checkbox" name="talks[]" value='<?php echo $row["Tname"]?>'> <?=$row["Tname"]?> <br>
			<br><br><br>
		<?php } 
	    ?>
			<input type="submit" value="Submit">
		</form>
	</body>
</html>
<?php
   mysqli_close($conn);
?>