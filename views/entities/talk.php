<html>
	<head>
		<meta charset="utf-8"/>
		<title>
		 <?php echo $_GET["title"];
		 ?>
		</title>
		<link type="text/css" href="../comp.css" rel="stylesheet"/>
	</head>

	<body>
		<a href="../index.php" class ="back">Back</a>
		<h1>Talks</h1>
		<a href="../displays/addtalk_disp.php" class="button">Add</a>
		<a href="../displays/deltalk_disp.php" class="button">Delete</a><br><br>
		<div class="images">
					<img src="../talk1.jpg" style="width:300px; height:228px;">
					<img src="../talk2.jpg" style="width:300px; height:228px;"">
					<img src="../talk3.jpg" style="width:300px; height:228px;">
		</div>
		<h3>List of talks</h3>
		<p>To know more details, click on the links.</p>
		<p>----------------------</p>
		<ul>
		 <?php
		  $dbhost = "localhost";
          $dbname = "Fest";
          $dbuser = "root";
          $dbpass = "anuhede1997";
          $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
      
          if(! $conn ) {
            die("Could not connect: ". mysqli_error());
          }
          //echo "Successfully connected";
		  $sql = "SELECT Tname FROM Talk";
		  //echo "{$sql}";
		  mysqli_select_db('Fest');
		  $talks = mysqli_query($conn, $sql);
		  if(! $talks ) {
		  	die('Could not get data: ' . mysqli_error());
          }
		  while($row = mysqli_fetch_array($talks, MYSQLI_ASSOC)) 
		  {
            $url = "../details/tdetails.php?tname=".$row["Tname"];
            echo "<p> <a class='my' href=\"" . $url . "\"> {$row["Tname"]}</a></p> <br> ";
          }
		 ?>
		</ul>
	</body>
</html>