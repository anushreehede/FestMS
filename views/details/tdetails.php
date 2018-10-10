<html>
  <head>
    <meta charset="utf-8"/>
    <title>
     <?php echo $_GET["tname"];
     ?>
    </title>
    <link type="text/css" href="../comp.css" rel="stylesheet"/>
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
		  $sql = 'SELECT * FROM Event, Talk WHERE Event.Ename = "' .$_GET["tname"].'" AND Event.Ename = Talk.Tname';
		  mysqli_select_db('Fest');
		  $competitions = mysqli_query($conn, $sql);
		  if(! $competitions ) {
		  	die('Could not get data: ' . mysqli_error());
          }
		  while($row = mysqli_fetch_array($competitions, MYSQLI_ASSOC)) 
		  {
                echo "<p> <h2>{$_GET["tname"]}</h2></p>
                      <p> Conducted by : {$row["conducted_by"]}</p>
                      <p> Day : {$row["day"]} </p>
                      <p> Start time : {$row["startT"]} </p>
                      <p> End time : {$row["endT"]} </p>
                      <p> Speaker : {$row["speaker_name"]}</p>
                      <p> Speaker email : {$row["email"]} </p>";
          }
          mysqli_close($conn);
?>
<h3>List of all Participants</h3>

<?php 
          $dbhost = "localhost";
          $dbname = "Fest";
          $dbuser = "root";
          $dbpass = "anuhede1997";
          $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
      
          if(! $conn ) {
            die("Could not connect: ". mysqli_error());
          }
$sql2 = 'SELECT Participant.Pname, Participant.ID, Participant.college, Participant.phone, Participant.email FROM Participant, Event_part WHERE Event_part.event_name = "' .$_GET["tname"].'" AND Participant.ID=Event_part.BID';
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
<a href="../index.php" class ="back">Back</a>
    <a href="../displays/addparti_disp.php?ename=<?php echo $_GET['tname']?>&pro=0" class="button">Add Participants</a>
    <a href="../displays/delparti_disp.php?ename=<?php echo $_GET['tname']?>&pro=0" class="button">Delete Participants</a>
    <p></p>
</body>
</html>