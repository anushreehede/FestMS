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
          $cname = $_POST["cname"];
          $day = $_POST["day"];
          $startT = $_POST["start"];
          $endT = $_POST["end"];
          $conduct = $_POST["conducted_by"];
          $winner = $_POST["winner_name"];
          $prize = $_POST["prize"];
          $jname = $_POST["jname"];
          $jphone = $_POST["jphone"];
          $sql1 = "INSERT INTO Event(Ename, day, startT, endT, conducted_by) VALUES('$cname','$day','$startT','$endT','$conduct')";
		  $sql2 = "INSERT INTO Competition(Cname, winner_name, prize) VALUES('$cname', '$winner', '$prize')";
      $sql3 = "INSERT INTO Judge(Jname, comp_name, phone) VALUES ('$jname', '$cname', '$jphone')";
		  //echo "{$sql}";
		  mysqli_select_db($conn,'Fest');
		  if(!mysqli_query($conn, $sql1))
		  	echo "Didnt save1";
		  if(!mysqli_query($conn, $sql2))
        echo "Didnt save2";
      if(!mysqli_query($conn, $sql3))
		    echo "Didnt save3";
		  redirect("../entities/competition.php");
    }
?>