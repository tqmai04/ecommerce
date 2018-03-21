<?php

if ( isset( $_GET[ "id" ] ) ) {
	$id = $_GET[ "id" ];

	$link = mysqli_connect( "shareddb1c.hosting.stackcp.net", "accounts-31368cbb", "yHih/2KjeTZR", "accounts-31368cbb" );
	if ( mysqli_connect_error() ) {
		die( "There was an error connecting to the database" );
	}
	$item = '';
	$query = "SELECT * FROM `products` WHERE id='$id'";
	if ( $result = mysqli_query( $link, $query ) ) {
		$row = mysqli_fetch_array( $result );
		$item .= '<div class="row">
      <div class="col-sm-4">
       <div class="row">
        <div class="col-sm-12">
          <div class="card"> <img class="card-img img-fluid" src="'.$row['photo'].'" style="height: 200px"> </div>
        </div>

        </div>
        </div>
        <div class="col-sm-8">
          <h4>'.$row['name'].'</h4>
          <a href="review.html">(1 customer review)<br></a>
          Price: $'.$row['price'].'<br>
          In stock: '.$row['stock'].' items<br>
		  <div class="row">
		  <div class="col-sm-4"><form method="post"><div class="form-group">
          <input class="form-control" type="number" value="1" id="quantity" name="quantity"></div></div></div>
            <button type="submit" class="btn btn-primary" name="submit" >Add to cart</button>
  
            </form>
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top: 10px; width: 100%"> Options </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width: 100%"> <a class="dropdown-item" href="#">Red</a> <a class="dropdown-item" href="#">Blue</a> <a class="dropdown-item" href="#">White</a> </div>
          </div>
          <p>
          '.$row['summary'].'
          </p>
        </div>
      </div>
      <div class="row">
       <div class="col-sm-12">
        <h4>Product Description</h4>
        
         <b>'.$row['name'].'</b><br>
        '.$row['description'].'
       
      </div>
	  </div>';
	}
}
if ( !empty( $_POST ) ) {
	$query = "INSERT INTO `cart`(`quantity`, `id`) VALUES ('" . mysqli_real_escape_string( $link, $_POST['quantity'] ) . "', $id)";

	if ( mysqli_query( $link, $query ) ) {
		header( "Location: cart.php" ); /* Redirect browser */
		exit();
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
      <li class="dropdown" id="menuLogin"> <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin"><img src="cgi-bin/assets/images/profile-icon.png" height="50px" style="margin: 0 25px;"></a>
        <div class="dropdown-menu" style="padding:15px; width: 200px">
          <form class="form">
            <div class="form-group">
              <input class="form-control" name="email" id="email" type="text" placeholder="Email" style="margin-bottom: 5px;">
              <input class="form-control" name="password" id="password" type="password" placeholder="Password">
              <br>
              <button type="button" id="btnLogin" class="btn">Login</button>
            </div>
          </form>
          New user?<br>
          <a href="create-account.html">Create an account</a><br>
          <a href="password-reset.php">Forgot your password</a> </div>
      </li>
    </ul>
   <a href="cart.php"><img src="cgi-bin/assets/images/cart.png" height="50px" style="margin: 0 25px; border-left: solid 1px #e0d9df; padding-left: 35px"></a> </div>
</nav>
<div class="container-fluid" style="padding: 100px 100px">
 
  <div class="row">
    <div class="col-sm-10">
      <div>
			<? echo $item ?>
		</div>
    </div>
	<div class="col-sm-2">
		<h4 style="font-size: 18px;">Related Products</h4>
		<div class="card"><img class="card-img-top" src="https://images-na.ssl-images-amazon.com/images/I/31b6xCajnPL.jpg">
            <div class="card-block">
              <h3 class="card-title" style="font-size: 16px; font-weight: bold">Apple Wireless Keyboard with Bluetooth </h3>
              <p class="card-text" align="center">$41.19</p>
			  </div></div>
	</div>
  </div>
</div>

<!-- Optional JavaScript --> 
<!-- jQuery first, then Popper.js, then Bootstrap JS --> 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script> 
<script type="text/javascript">
	
	</script>
</body>
</html>