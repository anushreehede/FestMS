<html>
	<head>
		<meta charset="utf-8"/>
		<title>Proshows</title>
		<link type="text/css" href="../comp.css" rel="stylesheet"/>
	</head>

	<body>
		<a href="../index.php" class="back">Back</a>
		<h1>Proshows</h1>
		<a href="../displays/addproshow_disp.php" class="button">Add</a>
		<a href="../displays/delproshow_disp.php" class="button">Delete</a>
		<p></p>
		<div class="images">
					<img src="../proshow1..jpg" style="width:300px; height:228px;">
					<img src="../proshow2.jpg" style="width:300px; height:300px;"">
					<img src="../proshow3.jpg" style="width:300px; height:228px;">
		</div>
		<h3>List of proshows</h3>
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
		  $sql = "SELECT performer FROM Proshow";
		  //echo "{$sql}";
		  mysqli_select_db('Fest');
		  $proshows = mysqli_query($conn, $sql);
		  if(! $proshows ) {
		  	die('Could not get data: ' . mysqli_error());
          }
		  while($row = mysqli_fetch_array($proshows, MYSQLI_ASSOC)) 
		  {
                $url = "../details/pdetails.php?pname=".$row["performer"];
                echo "<p> <a class='my' href=\"" . $url . "\"> {$row["performer"]}</a></p> <br> ";
          }
		?>
		</ul>
	</body>
</html>