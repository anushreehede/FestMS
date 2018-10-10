<html>
</!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Edit Competition </title>
	<link type="text/css" href="../comp.css" rel="stylesheet" />
</head>
<body>
	<h1>Edit Competition</h1>
	<form action='../displays/editc.php' method='post'>
		<p>Insert new values for: </p>
		Day:
						<select name="day">
								<option value="Friday">Friday</option>
								<option value="Saturday">Saturday</option>
								<option value="Sunday">Sunday</option>
						</select>
		Start Time:
						<select name="start">
								<option value="9AM">9AM</option>
								<option value="10AM">10AM</option>
								<option value="11AM">11AM</option>
								<option value="12PM">12PM</option>
								<option value="1PM">1PM</option>
								<option value="2PM">2PM</option>
								<option value="3PM">3PM</option>
								<option value="4PM">4PM</option>
								<option value="5PM">5PM</option>
								<option value="6PM">6PM</option>
								<option value="7PM">7PM</option>
						</select>
		End Time:
						<select name="end">
								<option value="10AM">10AM</option>
								<option value="11AM">11AM</option>
								<option value="12PM">12PM</option>
								<option value="1PM">1PM</option>
								<option value="2PM">2PM</option>
								<option value="3PM">3PM</option>
								<option value="4PM">4PM</option>
								<option value="5PM">5PM</option>
								<option value="6PM">6PM</option>
								<option value="7PM">7PM</option>
								<option value="8PM">8PM</option>
						</select><p></p>
		<br>
		Prize Money: <input type="text" name="prize" /> <br><br>
		Winner: <input type="text" name="winner_name" /> <br><br>
		<input type='submit'/>
		<input type='hidden' name='ename' value="<?php echo $_GET['ename']?>" />
	</form>
</body>
</html>