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
    	 if(is_array($_POST["talks"]))
      { foreach($_POST["talks"] as $talk)
        {
         $sql1 = 'DELETE FROM Talk WHERE Tname = "'.$talk.'"';
         $sql2 = 'DELETE FROM Event WHERE Ename = "'.$talk.'"';
         mysqli_select_db('Fest');
         if(!mysqli_query($conn, $sql1))
        echo "Didnt save";
         mysqli_query($conn, $sql2);
        }
      }
		  redirect("../entities/talk.php");
    }
?>
<?php
   mysqli_close($conn);
?>