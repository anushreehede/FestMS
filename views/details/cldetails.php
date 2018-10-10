

<head>
  <link type="text/css" href="../comp.css" rel="stylesheet" />
</head>

<?php
          $dbhost = "localhost";
          $dbname = "Fest";
          $dbuser = "root";
          $dbpass = "anuhede1997";
          $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
      
          if(! $conn ) {
            die("Could not connect: ". mysqli_error());
          }
          // write SQL queries over here 
		  $sql = 'SELECT * FROM Club WHERE club_name = "' .$_GET["clname"].'" ';
      $sql1 = 'SELECT Ename FROM Event WHERE conducted_by = "'.$_GET["clname"].'"';
		  mysqli_select_db('Fest');
		  $competitions = mysqli_query($conn, $sql);
		  if(! $competitions ) {
		  	die('Could not get data: ' . mysqli_error());
          }
		  while($row = mysqli_fetch_array($competitions, MYSQLI_ASSOC)) 
		  {
        echo "<p> <h2>{$_GET["clname"]}</h2></p>
              <p> Secretary : {$row["sec_name"]} </p>";
      }
      $events = mysqli_query($conn, $sql1);
      if(! $events ) {
        die('Could not get data: ' . mysqli_error());
          }
      echo "<h2><b> Events </b></h2>";
      while($row = mysqli_fetch_array($events, MYSQLI_ASSOC)) 
      {
        echo "<br><br>{$row["Ename"]}";
      }
      mysqli_close($conn);
?>