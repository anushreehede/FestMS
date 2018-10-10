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
    	 if(is_array($_POST["participants"]))
      { foreach($_POST["participants"] as $part)
        {
         if($_POST["pro"] == 0)
         {
          $sql1 = 'DELETE FROM Event_part WHERE BID = "'.$part.'" AND event_name = "'. $_POST["ename"]. '"';
          mysqli_select_db($conn,'Fest');
          if(!mysqli_query($conn, $sql1))
          echo "Error1";
          $sql2 = 'SELECT COUNT(*) FROM Event_part WHERE BID = "'. $part.'"';
          mysqli_select_db($conn,'Fest');
          $count = mysqli_query($conn, $sql2);
         }
         else
         {
          $sql1 = 'DELETE FROM Audience WHERE BID = "'.$part.'" AND performer = "'. $_POST["ename"]. '"';
          mysqli_select_db($conn,'Fest');
          if(!mysqli_query($conn, $sql1))
            echo "Error1";
          $sql2 = 'SELECT COUNT(*) FROM Audience WHERE BID = "'. $part.'"';
          mysqli_select_db($conn,'Fest');
          $count = mysqli_query($conn, $sql2);
         }
         if ($count == "0")
         {
          $sql3 = 'DELETE FROM Participants WHERE ID = "'.$part.'"';
          mysqli_select_db($conn,'Fest');
          if(!mysqli_query($conn, $sql3))
            echo "Error2";
         }
        }
      }
		  redirect("../index.php");
    }
?>
<?php
   mysqli_close($conn);
?>