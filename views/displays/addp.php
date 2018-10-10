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
        if(empty($_POST["performer"]) || empty($_POST["ticket"]))
        {
            echo "Field(s) are blank!";
        }
          //echo "Successfully connected";
          $performer = $_POST["performer"];
          $ticket = $_POST["ticket"];
          $sql1 = "INSERT INTO Proshow(performer, price) VALUES('$performer','$ticket')";
		  //echo "{$sql}";
		  mysqli_select_db('Fest');
		  if(!mysqli_query($conn, $sql1))
		  	echo "Didnt save";
		  echo "done.";
		  redirect("../entities/proshow.php");
    }
?>