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
		<h1>Workshops</h1>
		<a href="../displays/addworkshop_disp.php" class="button">Add</a>
		<a href="../displays/delworkshop_disp.php" class="button">Delete</a><br><br>
		<div class="images">
					<img src="../w1.jpg" style="width:300px; height:228px;">
					<img src="../w2.jpg" style="width:300px; height:228px;"">
					<img src="../w3.jpg" style="width:300px; height:228px;">
		</div>
		<h3>List of workshops</h3>
		<p>To know more details, click on the links.</p>
		<p>----------------------</p>
		<ul class="list">
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
		  $sql = "SELECT Wname FROM Workshop";
		  //echo "{$sql}";
		  mysqli_select_db('Fest');
		  $workshops = mysqli_query($conn, $sql);
		  if(! $workshops) {
		  	die('Could not get data: ' . mysqli_error());
          }
		  while($row = mysqli_fetch_array($workshops, MYSQLI_ASSOC)) 
		  {
             $url = "../details/wdetails.php?wname=".$row["Wname"];
             echo "<p> <a class='my' href=\"" . $url . "\"> {$row["Wname"]}</a></p> <br> ";
          }
		?>
		</ul>
	</body>
</html>