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
		<title>Insights Report</title>
		<link type="text/css" href="../comp.css" rel="stylesheet" />
	</head>

	<body>
		<h1>Insights Report</h1>
		</body>
		<?php
		$sql1 = 'SELECT Ename, MAX(endT-startT) FROM Event';
		$sql2 = 'SELECT Ename, MIN(endT-startT) FROM Event';
		$sql3 = 'SELECT Proshow.performer,SUM(price) FROM Audience JOIN Proshow ON Audience.performer=Proshow.performer GROUP BY Proshow.performer';
		$sql4 = 'SELECT club_name, COUNT(*) FROM Club JOIN Event ON Club.club_name=Event.conducted_by GROUP BY club_name';
		$sql5 = 'SELECT day, COUNT(DISTINCT BID) FROM Event JOIN Event_part ON Event.Ename=Event_part.event_name GROUP BY day';
		  mysqli_select_db('Fest');
		?>
		<h3> The event for the longest duration: </h3>
		<?php
		   $x = mysqli_query($conn, $sql1);
		   $number = mysqli_fetch_array($x,MYSQLI_ASSOC);
		   echo "{$number["Ename"]} for {$number["MAX(endT-startT)"]} hours <br>";
		?>
		<h3> The event for the shortest duration: </h3>
		<?php
		   $x = mysqli_query($conn, $sql2);
		   $number = mysqli_fetch_array($x,MYSQLI_ASSOC);
		   echo "{$number["Ename"]} for {$number["MIN(endT-startT)"]} hours <br>";
		?>
		
		<?php 
		  $x = mysqli_query($conn, $sql3);
		  $min=0; $max=0;
		  while($number = mysqli_fetch_array($x,MYSQLI_NUM))
		  {
		  	if($number["SUM(price)"]>$max)
		  		{
		  			$max=$number["SUM(price)"];
		  			$max_show=$number["Proshow.performer"];
		  		}
		  	if($number["SUM(price)"]<$min)
		  		{
		  			$min=$number["SUM(price)"];
		  			$min_show=$number["Proshow.performer"];
		  		}
		  }
		  echo "
		<h3> The most profitable proshow is: </h3> {$max_show} <br> 
		<h3> The least profitable proshow is: </h3> {$min_show} <br>";
		?>
		<?php 
		  $x = mysqli_query($conn, $sql4);
		  $min=0; $max=0;
		  while($number = mysqli_fetch_array($x,MYSQLI_NUM))
		  {
		  	if($number["COUNT(*)"]>$max)
		  		{
		  			$max=$number["COUNT(*)"];
		  			$max_show=$number["club_name"];
		  		}
		  	if($number["COUNT(*)"]<$min)
		  		{
		  			$min=$number["COUNT(*)"];
		  			$min_show=$number["club_name"];
		  		}
		  }
		     echo "
		    <h3> The club with the most events is: </h3> {$max_show} <br> 
		    <h3> The club with the least events is </h3> {$min_show} <br>";
		?>
		<h3> The day with the most event footfall is: </h3> <br>
        <?php 
		  $x = mysqli_query($conn, $sql5);
		  $max=0;
		  while($number = mysqli_fetch_array($x,MYSQLI_NUM))
		  {
		  	if($number["COUNT(DISTINCT BID)"]>$max)
		  		{
		  			$max=$number["COUNT(DISTINCT BID)"];
		  			$max_show=$number["day"];
		  		}
		  }
		  echo "
		    <h3> The day with the most event footfall is: </h3> {$max_show} <br> ";
		?>
	</body>
</html>
<?php mysqli_close($conn); ?>