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
        if(empty($_POST["club_name"]) || empty($_POST["sec_name"]))
        {
            echo "Field(s) are blank!";
        }
          //echo "Successfully connected";
          $club = $_POST["club_name"];
          $name = $_POST["sec_name"];
          //$sql3 = "SELECT Mem_name FROM Member WHERE ID_no='$secID'";
          //$sec_name = mysqli_query($conn, $sql3);
          $sql1 = "INSERT INTO Club(club_name, sec_name) VALUES('$club','$name')";
		  //echo "{$sql}";
		  mysqli_select_db('Fest');
		  if(!mysqli_query($conn, $sql1))
		  	echo "Didnt save";
		  //echo "done.";
		  redirect("../entities/club.php");
    }
    mysqli_close($conn);
?>