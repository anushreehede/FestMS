<?php
          $dbhost = "localhost";
          $dbname = "Fest";
          $dbuser = "root";
          $dbpass = "anuhede1997";
          $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
      
          if(! $conn ) {
            die("Could not connect: ". mysqli_error());
          }
$file = fopen("/home/anushree/foo.txt","w");
if(!$file) echo "Nope";
$sql = 'SELECT * FROM Club WHERE club_name = "Dance Club" ';
mysqli_select_db('Fest');
$competitions = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($competitions, MYSQLI_ASSOC)) 
{
        //echo "<p> <h2>{$_GET["clname"]}</h2></p>
          //    <p> Secretary : {$row["sec_name"]} </p>";
	fwrite($file, $row["club_name"]);
	fwrite($file, $row["sec_name"]);
}
fclose($file);
mysqli_close($conn);
?>