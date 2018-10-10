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
		<h1> Delete Competition</h1>
		<a href="../entities/workshop.php" class="back">Back</a>
		<p>Pick the workshop(s) you wish to delete.</p>
		<?php 
		$sql = "SELECT Wname FROM Workshop";
		  mysqli_select_db('Fest');
		  $workshops = mysqli_query($conn, $sql);
		  if(! $workshops ) {
		  	die('Could not get data: ' . mysqli_error());
          }
		?>
		<form action='../displays/delw.php' method='post'>
		<?php while($row = mysqli_fetch_array($workshops, MYSQLI_ASSOC))
		{ ?>
			<input type="checkbox" name="works[]" value='<?php echo $row["Wname"]?>'> <?=$row["Wname"]?> <br>
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