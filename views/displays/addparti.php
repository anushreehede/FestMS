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
        if(empty($_POST["p_name"]) || empty($_POST["id"]) || empty($_POST["college"]) || empty($_POST["phone"]) )
        {
            echo "Field(s) are blank!";
        }
          $ename = $_POST["ename"];
          $pname = $_POST["p_name"];
          $id = $_POST["id"];
          $college = $_POST["college"];
          $phone = $_POST["phone"];
          $email = $_POST["email"];
          $sql1 = "INSERT INTO Participant(Pname, ID, college, phone, email) VALUES('$pname','$id', '$college', '$phone', '$email')";
          if($_POST["pro"] == 0)
          {
            $sql2 = "INSERT INTO Event_part(BID, event_name) VALUES('$id', '$ename')";
          }
          else
          {
            $sql2 = "INSERT INTO Audience(performer, BID) VALUES('$ename', '$id')";
          }
		  mysqli_select_db($conn,'Fest');
		  if(!mysqli_query($conn, $sql1))
      {
        if(!mysqli_query($conn, $sql2))
        {
          echo "alert('Error- participant exists')";
		  	  // alert box and redirect
        }
      }
      else 
        mysqli_query($conn, $sql2);        
      echo "Added Successfully";
		  //redirect("../index.php");
    }
?>