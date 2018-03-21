<?php


  $link = mysqli_connect("shareddb1c.hosting.stackcp.net", "accounts-31368cbb", "yHih/2KjeTZR", "accounts-31368cbb");
   if  (mysqli_connect_error()){
	   die( "There was an error connecting to the database");
   }
   $query="SELECT * FROM `products` WHERE `name` LIKE '%".$_POST['value']."%'";
   $count =0;
   if ($result = mysqli_query($link, $query)){
	   while($row = mysqli_fetch_array($result)){
		   $stars = array("", "", "", "", "");
		   $index = 0;
		   if ($row['rating'] == 5){
			   $index = 5;
		   }
		   else if ($row['rating'] < 5 && $row['rating'] >= 4){
			   $index = 4;
		   }
		   else if ($row['rating'] < 4 && $row['rating'] >= 3){
			   $index = 3;
		   }
		   else if ($row['rating'] < 3 && $row['rating'] >= 2){
			   $index = 2;
		   }
		   else{
			   $index = 1;
		   }
		   for ($i = 0; $i < $index; $i++){
			   $stars[$i] = "checked";
		   }
		   if ($count == 0){
			   echo ' <div class="row" style="padding: 10px 5px;">';
		   }
		   echo '<div class="col-sm-4">
          <a href="item.php?id='.$row['id'].'" style="text-decoration:none"><div class="card" style="height: 350px">
           <img class="card-img-top" src="'.$row['photo'].'" style="height: 180px">
            <div class="card-block">
              <div style="height: 120px"><h3 class="card-title">'.$row['name'].'</h3></div>
              <div style="margin-left: 10px"><p class="card-text">Price: $ '.$row['price'].'   <span class="fa fa-star '.$stars[0].'"></span><span class="fa fa-star '.$stars[1].'"></span><span class="fa fa-star '.$stars[2].'"></span><span class="fa fa-star '.$stars[3].'"></span><span class="fa fa-star '.$stars[4].'"></span></p></div>
			  </div></div></a>
        </div>';
       if ($count == 2){
			   echo '</div>';
		       $count = 0;
		   }
		   else{
			    $count++;
		   }
      
		  
	   }
   }

?>