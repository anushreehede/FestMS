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
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Event Report</title>
		<link type="text/css" href="../comp.css" rel="stylesheet" />
	</head>

	<body>
	<a href="../index.php" class="back">Back</a>
		<h1>Event Report</h1>
		<h3> The events in Pearl ordered by start time is: </h3>
		<?php
		  $sql1 = 'SELECT Ename, startT, endT, day FROM Event ORDER BY day, startT,endT';
		  mysqli_select_db('Fest');
		  $x = mysqli_query($conn, $sql1);
		  while($row = mysqli_fetch_array($x, MYSQLI_ASSOC)) 
		  {
              echo " Event name: {$row["Ename"]}        <br>
               Starts : {$row["startT"]}:00 <br>
               Ends : {$row["endT"]}:00 <br>
              Day : {$row["day"]} <br><br><br>";
          }
		  
		?>
	</body>
</html>
<?php mysqli_close($conn); ?>