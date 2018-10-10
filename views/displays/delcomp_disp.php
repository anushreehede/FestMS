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
		<a href="../entities/competition.php" class="back">Back</a>
		<p>Pick the competition(s) you wish to delete.</p>
		<?php 
		$sql = "SELECT Cname FROM Competition";
		  mysqli_select_db('Fest');
		  $competitions = mysqli_query($conn, $sql);
		  if(! $competitions ) {
		  	die('Could not get data: ' . mysqli_error());
          }
		?>
		<form action='../displays/delc.php' method='post'>
		<?php while($row = mysqli_fetch_array($competitions, MYSQLI_ASSOC))
		{ ?>
			<input type="checkbox" name="comps[]" value='<?php echo $row["Cname"]?>'> <?=$row["Cname"]?> <br>
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