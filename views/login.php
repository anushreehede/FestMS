<?php
          $dbhost = "localhost";
          $dbname = "Fest";
          $dbuser = "root";
          $dbpass = "anuhede1997";
          $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
      
          if(! $conn ) {
            die("Could not connect: ". mysqli_error());
          }
          // write SQL queries over here 
    function redirect($location)
    {
        if (headers_sent($file, $line))
        {
            trigger_error("HTTP headers already sent at {$file}:{$line}", E_USER_ERROR);
        }
        header("Location: {$location}");
        exit;
    }
		$user = $_POST["uname"];
    $pass = $_POST["psw"];
    if($user != "root" || $pass!="anuhede1997")
    {
      echo "alert('Wrong credentials')";
      redirect("login_disp.php");
    }
    else
      redirect("index.php");
    mysqli_close($conn);
    
?>