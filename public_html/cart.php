<?php

	$link = mysqli_connect( "shareddb1c.hosting.stackcp.net", "accounts-31368cbb", "yHih/2KjeTZR", "accounts-31368cbb" );
	if ( mysqli_connect_error() ) {
		die( "There was an error connecting to the database" );
	}
	$item = '';
    $total = 0;
	$query = "SELECT * FROM `cart`";
	if ($result = mysqli_query($link, $query)) {
		 while($row = mysqli_fetch_array($result)){
	    $id = $row['id'];
	    $quantity = $row['quantity'];
	    $find = "SELECT * FROM `products` WHERE id='$id'";
	    $cart = mysqli_query($link, $find);
	    $row1 = mysqli_fetch_array( $cart );
	    $total += $row1['price'] * $quantity;
		$item .= '<div class="row" style="margin-bottom: 10px">
	<div class="col-12">
		<div class="card">
  <div class="card-block">
  
   <div class="row">
   <div class="col-sm-10">
    <img src="'.$row1['photo'].'" class="rounded float-left img-thumbnail img-fluid" style="width: 200px; margin-right: 10px; height: 180px">
    <h4>'.$row1['name'].'</h4>
   <span style="color: 	#8e90a8">In Stock</span><br>
   Price: $'.$row1['price'].'<br>
   <span id="delete" style="color: #21304a"><a href="delete-cart.php?id='.$row['id'].'" style="text-decoration: none">Delete</a></span>
   </div>
   <div class="col-sm-2">
   	<select class="form-control" name="quantity" id="quantity">
                <option value="'.$quantity.'">'.$quantity.'</option>
                <option value="1">1</option>             
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
              </select>
   </div>
  </div>
  </div>
</div>
	</div>
</div>';}
		$item .='<hr><h2 style="text-align: right" id="subtotal">Subtotal: $'.$total.'</h2>';
	

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
        <div id="login" class="dropdown-menu" style="padding:15px; width: 200px">
          <form class="form">
            <div class="form-group">
              <input class="form-control" name="email" id="email" type="text" placeholder="Email" style="margin-bottom: 5px;">
              <input class="form-control" name="password" id="password" type="password" placeholder="Password">
              <br>
              <a href="cart-member.php"><button type="button" id="btnLogin" class="btn">Login</button></a>
            </div>
          </form>
          New user?<br>
          <a href="create-account.html">Create an account</a><br>
          <a href="password-reset.php">Forgot your password</a> </div>
      </li>
    </ul>
    <a href="cart.php"><img src="cgi-bin/assets/images/cart.png" height="50px" style="margin: 0 25px; border-left: solid 1px #e0d9df; padding-left: 35px"></a>
</nav>
<div class="container" style="padding-top: 100px; width: 80%;">
  <h2>Shopping Cart</h2>
  <p style="text-align: right; padding-right: 30px; font-size: 18px; color: #21304a; font-weight: bold">Quantity</p>
 <div>
			<? echo $item ?>
		</div>

<div class="row">
	<div class="col-sm-8"></div>
	<div class="col-sm-4">
	<p align="right">
		<a href="home.php"><button type="button" class="btn">Continue shopping</button></a>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Check out</button>
		
		<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">Login for faster checkout</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">Please log in your account so we can use your default shipping and payment information. If you don't have an account and don't want to create one, you can still use guest check out.</div>
            <div class="modal-footer"> 
          
              <button type="button" class="btn" data-dismiss="modal" onClick="$('#login').toggle();">Log in</button>
              
             <a href="checkout.html">
              <button type="button" class="btn" >Guest check out</button>
              </a> </div>
          </div>
        </div>
      </div>
		</p>
	</div>
</div>
</div>

<!-- Optional JavaScript --> 
<!-- jQuery first, then Popper.js, then Bootstrap JS --> 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script> 
<script type="text/javascript">

    function toggler(login){
		$("#" + login).toggle();
	}
	$("#quantity").change(function(){
		var selectedQuantity = $("#quantity").val();
		var total = selectedQuantity * 24.32;
		$("#subtotal").html("Subtotal: $" + total.toFixed(2));
		
			});
	$("#delete").click(function(){
		$("#item1").css("display", "none");
		$("#subtotal").html("Subtotal: $0");
	})
	</script>
</body>
</html>