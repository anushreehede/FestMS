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
    	 if(is_array($_POST["shows"]))
      { foreach($_POST["shows"] as $show)
        {
         $sql1 = 'DELETE FROM Proshow WHERE performer = "'.$show.'"';
         mysqli_select_db('Fest');
         if(!mysqli_query($conn, $sql1))
        echo "Didnt save";
        }
      }
		  redirect("../entities/proshow.php");
    }
?>
<?php
   mysqli_close($conn);
?>