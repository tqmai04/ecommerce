<?php


  $link = mysqli_connect("shareddb1c.hosting.stackcp.net", "accounts-31368cbb", "yHih/2KjeTZR", "accounts-31368cbb");
   if  (mysqli_connect_error()){
	   die( "There was an error connecting to the database");
   }
   $item_list = '';
   $query="SELECT * FROM `inventory`";
   if ($result = mysqli_query($link, $query)){
	   while($row = mysqli_fetch_array($result)){
		   $item_list .='<div class="row" style="margin-bottom: 10px">
    <div class="col-12">
      <div class="card">
        <div class="card-block">
          <div class="row">
            <div class="col-sm-8"> <img src="cgi-bin/assets/images/placeholder.jpg" class="rounded float-left img-thumbnail" style="width: 200px; margin-right: 10px;">
              <h4 style="font-size: 18px; font-weight: bold; margin-top:10px">'.$row['prod_name'].'</h4>
              <span style="color: 	#030612">In Stock</span><br>
              Price: $'.$row['price'].'<br>
              <a href="edit-item.php?id='.$row['id'].'" style="text-decoration: none"><button type="button" class="btn" style="margin-top: 10px;">Edit</button></a>
			  <a href="delete.php?id='.$row['id'].'" style="text-decoration: none;"><button type="button" class="btn" style="margin-top: 10px; background-color: #B22222">Delete</button></a>
			  </div>
			  
            <div class="col-sm-2">
              <p align="center">0</p>
            </div>
            <div class="col-sm-2">
              <p align="center">'.$row['stock'].'</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>';
	   }
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<!-- Custom CSS -->
<link type="text/css" rel="stylesheet" href="main.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #21304a;"> <a class="navbar-brand logo" href="home.php"><img src="cgi-bin/assets/images/logo.png" height="50px"  style="margin-left: 5px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-md-0">
    </ul>
    <ul class="nav">
          <li class="dropdown" id="menuLogin">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">
            <img src="cgi-bin/assets/images/profile-icon.png" height="50px" style="margin: 0 25px;"></a>
            <div class="dropdown-menu" style="padding:15px; width: 200px">
              <h4>Hi, Mai</h4>
              <a href="user-profile.html" style="text-decoration: none">Profile</a><br>
              <a href="order-history.html" style="text-decoration: none">Order history</a><br>
              <a href="inventory.php" style="text-decoration: none">Your inventory</a><br>
               <a href="index.php"><button type="button" id="btnLogin" class="btn" style="margin-top: 10px;">Log out</button></a>
            </div>
          </li>
        </ul>
   <a href="cart-member.php"><img src="cgi-bin/assets/images/cart.png" height="50px" style="margin: 0 25px; border-left: solid 1px #e0d9df; padding-left: 35px"></a> </div>
</nav>
<div class="container" style="padding-top: 100px; padding-bottom: 50px; width: 80%;">
  <h2>Your Inventory</h2>
  <div class="row">
    <div class="col-sm-8">
      <div class="row">
        <a href="add-inventory.php"><button type="button" class="btn" style="margin-bottom: 10px;">Add new item</button></a>
      </div>
    </div>
    <div class="col-sm-2">
      <p align="center" style="font-size: 18px; color: #21304a; font-weight: bold"># Sold</p>
    </div>
    <div class="col-sm-2">
      <p align="center" style="font-size: 18px; color: #21304a; font-weight: bold"># Available</p>
    </div>
  </div>

 <div ><? echo $item_list ?></div>
</div>

<!-- Optional JavaScript --> 
<!-- jQuery first, then Popper.js, then Bootstrap JS --> 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script> 

</body>
</html>