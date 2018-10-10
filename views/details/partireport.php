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
		<title>Event Participant Report</title>
		<link type="text/css" href="../comp.css" rel="stylesheet" />
	</head>

	<body>
	<a href="../index.php" class="back">Back</a>
		<h1>Event Participant Report</h1>
		<h3> The details of the participants in Pearl are: </h3>
		<?php
		  $sql1 = 'SELECT ID, Pname, phone, email, event_name FROM Event_part JOIN Participant ON Participant.ID = Event_part.BID';
		  mysqli_select_db('Fest');
		  $x = mysqli_query($conn, $sql1);
		  while($row = mysqli_fetch_array($x, MYSQLI_ASSOC)) 
		  {
              echo "<br> Participant name: {$row["Pname"]}
              <br> ID : {$row["ID"]}:00 
              <br> Phone : {$row["phone"]}:00
              <br> Email : {$row["email"]}
              <br> Events : {$row["event_name"]} <br><br>";
          }
		  
		?>
	</body>
</html>
<?php mysqli_close($conn); ?>