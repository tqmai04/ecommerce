<?php

if ( isset( $_GET[ "id" ] ) ) {
	$id = $_GET[ "id" ];

	$link = mysqli_connect( "shareddb1c.hosting.stackcp.net", "accounts-31368cbb", "yHih/2KjeTZR", "accounts-31368cbb" );
	if ( mysqli_connect_error() ) {
		die( "There was an error connecting to the database" );
	}
	$item = '';
	$query = "SELECT * FROM `inventory` WHERE id='$id'";
	if ( $result = mysqli_query( $link, $query ) ) {
		$row = mysqli_fetch_array( $result );
		$express = '';
		$ground = '';
		$standard = '';
		if ( $row[ 'express' ] == 'on' ) {
			$express .= 'checked';
		}
		if ( $row[ 'ground' ] == 'on' ) {
			$ground .= 'checked';
		}
		if ( $row[ 'standard' ] == 'on' ) {
			$standard .= 'checked';
		}

		$item .= '<div class="row">
	   <h2>Edit item</h2>
	   		<form method="post">
    <div class="col-sm-12">
      <div class="row">
        <div class="col-sm-4">
         <div class="row">
          <div class="card overview-card">
           <img class="card-img" src="cgi-bin/assets/images/placeholder.jpg" style="margin-top: 5px;"></div>
          </div>
          <div class="row">
          <div class="col-12">
          	<p align="left"><button type="button" class="btn" style="margin-top: 10px;">Manage Images (optional)</button></p>
          	</div>
          </div>
        </div>
        <div class="col-sm-8">
          <div class="form-group row">
            <label for="product-name" class="col-4 col-form-label">Product name</label>
            <div class="col-8">
              <input class="form-control" type="text"' . 'value="' . $row[ 'prod_name' ] . '"id="product-name" name="product-name">
            </div>
          </div>
          <div class="form-group row">
            <label for="price" class="col-4 col-form-label">Price (in USD)</label>
            <div class="col-8">
              <input class="form-control" type="text"' . 'value="' . $row[ 'price' ] . '"id="price" name="price">
            </div>
          </div>
          <div class="form-group row">
            <label for="stock" class="col-4 col-form-label">Current Stock</label>
            <div class="col-8">
              <input class="form-control" type="text"' . 'value="' . $row[ 'stock' ] . '"id="stock" name="stock">
            </div>
          </div>
           <div class="form-group row">
            <label for="category" class="col-4 col-form-label">Category</label>
            <div class="col-8">
              <input class="form-control" type="text"' . 'value="' . $row[ 'catogory' ] . '"id="category" name="category">
            </div>
          </div>
          <div class="row">
            <div class="col-4">Shipping options</div>
            <div class="col-8">
              <div class="row">
                <div class="col-12">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" id="express-shipping" name="express" aria-label="Express Shipping"' . $express . '>
                      Express Shipping </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" id="ground-shipping" name="ground" aria-label="Ground Shipping"' . $ground . '>
                      Ground Shipping </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" id="standard-shipping" name="standard" aria-label="Standard Shipping"' . $standard . '>
                      Standard Shipping </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row">
								<label for="stock" class="col-4 col-form-label">Variations</label>
								<div class="col-8">
									<input class="form-control" type="text"'.'value="'.$row[ 'variations' ] .'"id="options" placeholder="color 1, color 2, color 3, etc..." name="options">
								</div>
							</div>
          <div class="form-group">
            <label for="desc">Product Description</label>
            <textarea class="form-control" id="desc" name="desc" rows="6">' . $row[ 'prod_desc' ] . '</textarea>
          </div>
        </div>
      </div>
      <div class="row">
       <div class="col-12">
      
        <p align="right">
           <a href="inventory.php">
          <button type="button" class="btn">Return to your inventory</button>
          </a>
          <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
        </p>
	  </div></div>
    </div></form>
  </div>';
	}
}
if ( !empty( $_POST ) ) {
	$query = "UPDATE `inventory` SET `prod_name`='" . mysqli_real_escape_string( $link, $_POST[ 'product-name' ] ) . "',`price`='" . mysqli_real_escape_string( $link, $_POST[ 'price' ] ) . "', `stock`='" . mysqli_real_escape_string( $link, $_POST[ 'stock' ] ) . "', `catogory`='" . mysqli_real_escape_string( $link, $_POST[ 'category' ] ) . "', `express`='" . mysqli_real_escape_string( $link, $_POST[ 'express' ] ) . "', `ground`='" . mysqli_real_escape_string( $link, $_POST[ 'ground' ] ) . "', `standard`='" . mysqli_real_escape_string( $link, $_POST[ 'standard' ] ) . "', `variations`='" . mysqli_real_escape_string( $link, $_POST[ 'options' ] ) . "', `prod_desc`='" . mysqli_real_escape_string( $link, $_POST[ 'desc' ] ) . "' WHERE id='$id'";

	if ( mysqli_query( $link, $query ) ) {
		header( "Location: inventory.php" ); /* Redirect browser */
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
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #21304a;"> <a class="navbar-brand logo" href="index.html"><img src="cgi-bin/assets/images/logo.png" height="50px"  style="margin-left: 5px;"></a>
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
						<a href="index.html"><button type="button" id="btnLogin" class="btn" style="margin-top: 10px;">Log out</button></a>
					</div>
				</li>
			</ul>
			<a href="cart.html"><img src="cgi-bin/assets/images/cart.png" height="50px" style="margin: 0 35px;"></a> </div>
	</nav>
	<div class="container-fluid" style="padding: 100px 100px">
		<div>
			<? echo $item ?>
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