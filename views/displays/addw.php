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
        if(empty($_POST["wname"]) || empty($_POST["conducted_by"]) || empty($_POST["organiser_name"]))
        {
            echo "Field(s) are blank!";
        }
          echo "Successfully connected";
          $cname = $_POST["wname"];
          $day = $_POST["day"];
          $startT = $_POST["start"];
          $endT = $_POST["end"];
          $conduct = $_POST["conducted_by"];
          $organiser = $_POST["organiser_name"];
          $fee = $_POST["fee"];
          $sql1 = "INSERT INTO Event(Ename, day, startT, endT, conducted_by) VALUES('$cname','$day','$startT','$endT','$conduct')";
		  $sql2 = "INSERT INTO Workshop(Wname, organiser_name, fee) VALUES('$cname', '$organiser', '$fee')";
		  //echo "{$sql}";
		  mysqli_select_db('Fest');
		  if(!mysqli_query($conn, $sql1))
		  	echo "Didnt save";
		  mysqli_query($conn, $sql2);
		  echo "done.";
		  redirect("../entities/workshop.php");
    }
?>