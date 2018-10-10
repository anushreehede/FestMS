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
    	 if(is_array($_POST["clubs"]))
      { foreach($_POST["clubs"] as $club)
        {
         $sql1 = 'DELETE FROM Club WHERE club_name = "'.$club.'"';
         mysqli_select_db('Fest');
         if(!mysqli_query($conn, $sql1))
        echo "Didnt save";
        }
      }
		  redirect("../entities/club.php");
    }
?>
<?php
   mysqli_close($conn);
?>