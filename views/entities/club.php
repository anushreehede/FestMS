<html>
	<head>
		<meta charset="utf-8"/>
		<title>
		  <?php echo $_GET["title"];
		  ?>
		</title>
		<link type="text/css" href="../comp.css" rel="stylesheet"/>
	</head>

	<body>
		<a href="../index.php" class="back">Back</a>
		<h1>Clubs</h1>
		<a href="../displays/addclub_disp.php" class="button">Add</a>
		<a href="../displays/delclub_disp.php" class="button">Delete</a><br><br><br><br><br>
		<h3>List of Clubs</h3>
		<p>To know more details, click on the links.</p>
		<p>----------------------</p>
		<ul>
		<?php 
		  $dbhost = "localhost";
          $dbname = "Fest";
          $dbuser = "root";
          $dbpass = "anuhede1997";
          $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
      
          if(! $conn ) {
            die("Could not connect: ". mysqli_error());
          }
		  $sql = "SELECT club_name FROM Club";
		  mysqli_select_db('Fest');
		  $clubs = mysqli_query($conn, $sql);
		  if(! $clubs ) {
		  	die('Could not get data: ' . mysqli_error());
          }
		  while($row = mysqli_fetch_array($clubs, MYSQLI_ASSOC)) 
		  {
             $url = "../details/cldetails.php?clname=".$row["club_name"];
                echo "<p> <a class='my' href=\"" . $url . "\"> {$row["club_name"]}</a></p><br> ";
          }
		?>
		</ul>
	</body>
</html>
<?php
   mysqli_close($conn);
?>