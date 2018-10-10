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
		<h1> Delete Proshow</h1>
		<a href="../entities/proshow.php" class="back">Back</a>
		<p>Pick the proshow(s) you wish to delete.</p>
		<?php 
		$sql = "SELECT performer FROM Proshow";
		  mysqli_select_db('Fest');
		  $performers = mysqli_query($conn, $sql);
		  if(! $performers ) {
		  	die('Could not get data: ' . mysqli_error());
          }
		?>
		<form action='../displays/delp.php' method='post'>
		<?php while($row = mysqli_fetch_array($performers, MYSQLI_ASSOC))
		{ ?>
			<input type="checkbox" name="shows[]" value='<?php echo $row["performer"]?>'> <?=$row["performer"]?> <br>
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