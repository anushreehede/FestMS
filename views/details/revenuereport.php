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
		<title>Revenue Report</title>
		<link type="text/css" href="../comp.css" rel="stylesheet" />
	</head>

	<body>
	<a href="../index.php" class="back">Back</a>
		<h1>Revenue Report</h1>
		<h3> The amount of money from the entry fee (Rs. 250 per head) is:</h3>
		<?php
		  $sql1 = 'SELECT COUNT(*) FROM Participant';
		  mysqli_select_db('Fest');
		  $x = mysqli_query($conn, $sql1);
		  $number1 = mysqli_fetch_array($x,MYSQLI_NUM);
		  $number1[0] = $number1[0]*250;
		  echo "Rs. {$number1[0]} <br>";
		?>
		<h3> The amount of money from the workshops is:</h3>
		<?php
		  $sql2 = 'SELECT SUM(fee) FROM (Event_part JOIN Workshop ON Event_part.event_name=Workshop.Wname)';
		  mysqli_select_db('Fest');
		  $x = mysqli_query($conn, $sql2);
		  $number2 = mysqli_fetch_array($x,MYSQLI_NUM);
		  echo "{$number2[0]} <br>";
		?>
		<h3> The amount of money from the pro-shows is:</h3>
		<?php
		  $sql3 = 'SELECT SUM(price) FROM (Audience JOIN Proshow ON Audience.performer=Proshow.performer)';
		  mysqli_select_db('Fest');
		  $x = mysqli_query($conn, $sql3);
		  $number3 = mysqli_fetch_array($x,MYSQLI_NUM);
		  echo "{$number3[0]} <br>";
		?>
		<h3> The total amount of money generated is: </h3>
		<?php
		  $number = $number1[0] + $number2[0] + $number3[0];
		  echo "{$number} <br>";
		?>
	</body>
</html>
<?php mysqli_close($conn); ?>