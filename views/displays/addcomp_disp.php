<html>
		<head>
				<meta charset="utf-8">
				<title>Add a Competition</title>
				<link type="text/css" href="../participant.css" rel="stylesheet" />
		</head>

		<body>
		<?php
          $dbhost = "localhost";
          $dbname = "Fest";
          $dbuser = "root";
          $dbpass = "anuhede1997";
          $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        
          if(! $conn ) {
            die("Could not connect: ". mysqli_error());
          }
          $sql = 'SELECT club_name FROM Club'; 
		  mysqli_select_db($conn,'Fest');
		  $competitions = mysqli_query($conn, $sql);
		  if(! $competitions ) {
		  	die('Could not get data: ' . mysqli_error());
          }
          ?>
				<h1>Add Competition</h1>
				<form action="../displays/addc.php" method="post">
						Competition Name: <input type="text" name="cname" /><p></p>
						Conducted By: 
						<select type="text" name="conducted_by">
						<?php
						  while($row = mysqli_fetch_array($competitions, MYSQLI_ASSOC)) 
		                  {?>
                            <option value="<?php echo $row['club_name']?>"'><?=$row["club_name"]?></option>
                        <?php }
						?>
						</select><p></p>
						Winner Name: <input type="text" name="winner_name" /><p></p>
						Prize: <input type="text" name="prize" /><br><br>
						Judge Name: <input type="text" name="jname"/>
						<p></p>
						Judge Phone Number: <input type="text" name="jphone"/><br><br>
						Day:
						<select name="day">
								<option value="Friday">Friday</option>
								<option value="Saturday">Saturday</option>
								<option value="Sunday">Sunday</option>
						</select>
						Start Time:
						<select name="start">
								<option value="9">9AM</option>
								<option value="10">10AM</option>
								<option value="11">11AM</option>
								<option value="12">12PM</option>
								<option value="13">1PM</option>
								<option value="14">2PM</option>
								<option value="15">3PM</option>
								<option value="16">4PM</option>
								<option value="17">5PM</option>
								<option value="18">6PM</option>
								<option value="19">7PM</option>
						</select>
						End Time:
						<select name="end">
								<option value="10">10AM</option>
								<option value="11">11AM</option>
								<option value="12">12PM</option>
								<option value="13">1PM</option>
								<option value="14">2PM</option>
								<option value="15">3PM</option>
								<option value="16">4PM</option>
								<option value="17">5PM</option>
								<option value="18">6PM</option>
								<option value="19">7PM</option>
								<option value="20">8PM</option>
						</select><p></p>
						<input type="submit" />
				</form>		
		</body>
</html>
<?php mysqli_close($conn); ?>