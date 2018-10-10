<html>
  <head>
    <meta charset="utf-8"/>
    <title>
     <?php echo $_GET["cname"];
     ?>
    </title>
    <link type="text/css" href="../comp.css" rel="stylesheet"/>
  </head>

  <body><br>
  <a href="../index.php" class ="back">Back</a><br><br><br>
  <a href="../displays/editcomp_disp.php?ename=<?php echo $_GET['cname']?>" class="button" id="edit">Edit details</a><br><br><br>
    <?php
          $dbhost = "localhost";
          $dbname = "Fest";
          $dbuser = "root";
          $dbpass = "anuhede1997";
          $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
      
          if(! $conn ) {
            die("Could not connect: ". mysqli_error());
          }
		  $sql = 'SELECT * FROM Event,Competition,Judge WHERE Event.Ename = "' .$_GET["cname"].'" AND Event.Ename = Competition.Cname AND Judge.comp_name = Competition.Cname';
		  mysqli_select_db($conn,'Fest');
		  $competitions = mysqli_query($conn, $sql);
		  if(! $competitions ) {
		  	die('Could not get data: ' . mysqli_error());
          }
		  while($row = mysqli_fetch_array($competitions, MYSQLI_ASSOC)) 
		  {
                echo "<h2><u>{$_GET["cname"]}</u></h2>
                      <br>Conducted by : {$row["conducted_by"]}
                      <br> Day : {$row["day"]} 
                      <br> Start time : {$row["startT"]} 
                      <br> End time: {$row["endT"]}
                      <br> Prize money : {$row["prize"]}
                      <br> Winner: {$row["winner_name"]}
                      <br> Judge Name: {$row["Jname"]} 
                      <br> Judge Phone: {$row["phone"]}<br><br><br>";
          }

          //mysqli_close($conn);
?>

<h2>List of all Participants</h2>

<?php
$sql2 = 'SELECT Participant.Pname, Participant.ID, Participant.college, Participant.phone, Participant.email FROM Participant, Event_part WHERE Event_part.event_name = "' .$_GET["cname"].'" AND Participant.ID=Event_part.BID';
      mysqli_select_db($conn,'Fest');
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

    <a href="../displays/addparti_disp.php?ename=<?php echo $_GET['cname']?>&pro=0" class="button">Add Participants</a>
    <a href="../displays/delparti_disp.php?ename=<?php echo $_GET['cname']?>&pro=0" class="button">Delete Participants</a>
    <p></p>
</body>
</html>