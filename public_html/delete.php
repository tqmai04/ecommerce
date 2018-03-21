<?php

  if (isset($_GET["id"])){
	  $id = $_GET["id"];
  
  $link = mysqli_connect("shareddb1c.hosting.stackcp.net", "accounts-31368cbb", "yHih/2KjeTZR", "accounts-31368cbb");
   if  (mysqli_connect_error()){
	   die( "There was an error connecting to the database");
   }
	  
	  $query="DELETE FROM `inventory` WHERE id='$id'";
	  if (mysqli_query($link, $query)){
      header("Location: inventory.php"); /* Redirect browser */
      exit();
   }
	  else{
		  echo "Wait for it";
	  }
  }
?>