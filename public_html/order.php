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
		 }
	}
    echo $total;
?>