<html>
	<head>
		<meta charset="utf-8" />
		<title>Delete Participant</title>
		<link type="text/css" href="../comp.css" rel="stylesheet">
	</head>

	<body>
	<a href="../index.php" class="back">Back</a>
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
		<h1>Delete Participant from Event: <?php echo $_GET["ename"]?>
		</h1>
		<p>Pick the participants you wish to delete.</p>
		<?php 
		if($_GET["pro"] == 0)
		{
		  $sql = 'SELECT Pname,ID FROM Participant, Event_part WHERE event_name = "'.$_GET["ename"].'" AND BID=ID';
		}
		else
		{
		  $sql = 'SELECT Pname,ID FROM Participant, Audience WHERE performer = "'.$_GET["ename"].'" AND BID=ID';
		}	
		  mysqli_select_db($conn,'Fest');
		  $parts = mysqli_query($conn, $sql);
		  if(! $parts ) {
		  	die('Could not get data: ' . mysqli_error());
          }
		?>
		<form action='../displays/delparti.php' method='post'>
		<?php while($row = mysqli_fetch_array($parts, MYSQLI_ASSOC))
		{ ?>
			<input type="checkbox" name="participants[]" value="<?php echo $row["ID"]?>"><?=$row["Pname"]?><br><br><br>
		<?php } 
	    ?>
			<input type="hidden" name="ename" value="<?php echo $_GET['ename']?>" />
			<input type="hidden" name="pro" value="<?php echo $_GET['pro'] ?>" />
			<input type="submit" />
		</form>
	</body>
</html>