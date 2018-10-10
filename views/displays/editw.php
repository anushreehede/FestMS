<?php
  $dbhost = "localhost";
  $dbname = "Fest";
  $dbuser = "root";
  $dbpass = "anuhede1997";
  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  if(! $conn ) 
  {
     die("Could not connect: ". mysqli_error());
  }
  //echo "first step";
  function redirect($location)
    {
        if (headers_sent($file, $line))
        {
            trigger_error("HTTP headers already sent at {$file}:{$line}", E_USER_ERROR);
        }
        header("Location: {$location}");
        exit;
    }
  if ($_SERVER["REQUEST_METHOD"] == "POST" )
    {
    	//echo $_SERVER["REQUEST_METHOD"];
        if(empty($_POST["cname"]) || empty($_POST["conducted_by"]) || empty($_POST["prize"]))
        {
            echo "Field(s) are blank!";
        }
          echo "Successfully connected";
          $wname = $_POST["ename"];
          $day = $_POST["day"];
          $startT = $_POST["start"];
          $endT = $_POST["end"];
          $fee = $_POST["fee"];
          $sql1 = "UPDATE Event SET day='$day',startT='$startT',endT='$endT' WHERE Ename='$wname'";
		  $sql2 = "UPDATE Competition SET fee='$fee' WHERE Wname='$wname'";
		  mysqli_select_db('Fest');
		  if(!mysqli_query($conn, $sql1))
		  	echo "Didnt save";
		  mysqli_query($conn, $sql2);
		  redirect("../entities/competition.php");
    }
?>