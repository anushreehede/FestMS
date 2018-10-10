<html>
  <head>
    <meta charset="utf-8"/>
    <title>
     <?php echo $_GET["pname"];
     ?>
    </title>
    <link type="text/css" href="../comp.css" rel="stylesheet"/>
  </head>

  <body>
  <a href="../index.php" class ="back">Back</a>
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
		  $sql = 'SELECT * FROM Proshow WHERE performer = "' .$_GET["pname"]. '"';
		  mysqli_select_db('Fest');
		  $competitions = mysqli_query($conn, $sql);
		  if(! $competitions ) {
		  	die('Could not get data: ' . mysqli_error());
          }
		  while($row = mysqli_fetch_array($competitions, MYSQLI_ASSOC)) 
		  {
                echo "<p> <h2>{$_GET["pname"]}</h2></p>
                      <p> Ticket Price : {$row["price"]}</p>";
          }
          mysqli_close($conn);
?>

<h3>List of all Audience Members</h3>

<?php 
          $dbhost = "localhost";
          $dbname = "Fest";
          $dbuser = "root";
          $dbpass = "anuhede1997";
          $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
      
          if(! $conn ) {
            die("Could not connect: ". mysqli_error());
          }
$sql2 = 'SELECT Participant.Pname, Participant.ID, Participant.college, Participant.phone, Participant.email FROM Participant, Audience WHERE Audience.performer = "' .$_GET["pname"].'" AND Participant.ID=Audience.BID';
      mysqli_select_db('Fest');
      $parts = mysqli_query($conn, $sql2);
      if(! $parts ) {
        die('Could not get data::: ' . mysqli_error());
          }
      while($row = mysqli_fetch_array($parts, MYSQLI_ASSOC)) 
      {
                echo "<p> Name : {$row["Pname"]}</p>
                      <p> ID : {$row["ID"]} </p>
                      <p> College : {$row["college"]} </p>
                      <p> Phone: {$row["phone"]} </p>
                      <p> Email : {$row["email"]} </p> <br>";
          }
          mysqli_close($conn);
?>
<br> <br>

    <a href="../displays/addparti_disp.php?ename=<?php echo $_GET['pname']?>&pro=1" class="button">Add Participants</a>
    <a href="../displays/delparti_disp.php?ename=<?php echo $_GET['pname']?>&pro=1" class="button">Delete Participants</a>
    <p></p>
</body>
</html>