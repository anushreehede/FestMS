<html>
	<head>
		<meta charset="utf-8"/>
		<title>
		 <?php echo "{$_GET["title"]}";
		 ?>
		</title>
		<link type="text/css" href="../comp.css" rel="stylesheet"/>
	</head>

	<body>
		<a href="../index.php" class="back" >Back</a>
		<h1>Competitions</h1>
		
		<a href="../displays/addcomp_disp.php" class="button">Add</a>
		<a href="../displays/delcomp_disp.php" class="button">Delete</a>
		<p></p>
		<div class="images">
					<img src="../comp1.jpg" style="width:300px; height:228px;">
					<img src="../comp2.jpg" style="width:300px; height:228px;"">
					<img src="../comp3.jpg" style="width:300px; height:228px;">
		</div>
		<h3>List of competitions</h3>
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
		  $sql = "SELECT Cname FROM Competition";
		  //echo "{$sql}";
		  mysqli_select_db($conn,'Fest');
		  $competitions = mysqli_query($conn, $sql);
		  if(! $competitions ) {
		  	die('Could not get data: ' . mysqli_error());
          }
		  while($row = mysqli_fetch_array($competitions, MYSQLI_ASSOC)) 
		  {
		    	$url = "../details/cdetails.php?cname=".$row["Cname"];
                echo "<p> <a class='my' href=\"" . $url . "\"> {$row["Cname"]}</a></p> <br> ";
          }
		?>
		</ul>
	</body>
</html>
<?php
   mysqli_close($conn);
?>