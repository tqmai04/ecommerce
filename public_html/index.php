<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="main.css">
	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>

	<script type="text/javascript">
		$( function () {
			var department = ''; //product department
			var value = ''; //search keyword
			var	min = 0;
			var	max = 10000;
			var rate = 0;
			$( document ).ready( function () {
				var value = '';
				$.post( 'search.php', {
					value: value
				}, function ( data ) {
					$( "#search_results" ).html( data );
					
				} );
				return false;
			} );
		$( "#find" ).bind( 'submit', function () {
				value = $( '#str' ).val();
	        	$.post( 'search.php', {
					value: value,
				}, function ( data ) {
					$( "#search_results" ).html( data );
				} );
			min = 0;
			max = 10000;
			rate = 0;
			$('#min').val(null);
			$('#max').val(null);
				return false;
			} );

			$( ".dpt" ).click( function () {
				department = this.id;
				$.post( 'filter.php', {
					value: value,
					department: department, 
					min: min,
					max: max,
					rate: rate
				}, function ( data ) {
					$( "#search_results" ).html( data );

				} );
			});
					 
			$( "#price-filter" ).bind( 'submit', function () {
				min = $('#min').val();
				max = $('#max').val();
				$.post( 'filter.php', {
					value: value,
					department: department, 
					min: min,
					max: max,
					rate: rate
				}, function ( data ) {
					$( "#search_results" ).html( data );

				} );
				return false;
			} );
			
			$( ".star" ).click( function () {
				console.log("Halo");
				rate = parseFloat(this.id);
				console.log(rate);
				$.post( 'filter.php', {
					value: value,
					department: department, 
					min: min,
					max: max, rate: rate
				}, function ( data ) {
					$( "#search_results" ).html( data );

				} );
			});
		} );
	</script>
	<style>
		.checked {
			color: orange;
		}
		
		.fa {
			font-size: 20px;
		}
	</style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #21304a; z-index: 9999;"> <a class="navbar-brand logo" href="index.php"><img src="cgi-bin/assets/images/logo.png" height="50px"  style="margin-left: 5px;"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>


		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
			<ul class="navbar-nav mr-auto mt-2 mt-md-0">

			</ul>

			<ul class="nav">
				<li class="dropdown" id="menuLogin">
					<a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">
            <img src="cgi-bin/assets/images/profile-icon.png" height="50px"></a>
				

					<div class="dropdown-menu" style="padding:15px; width: 200px">
						<form class="form">
							<div class="form-group">
								<input class="form-control" name="email" id="email" type="text" placeholder="Email" style="margin-bottom: 5px;">
								<input class="form-control" name="password" id="password" type="password" placeholder="Password"><br>
								<a href="home.php"><button type="button" id="btnLogin" class="btn">Login</button></a>
							</div>
						</form>
						New user?<br>
						<a href="create-account.html">Create an account</a><br>
						<a href="password-reset.php">Forgot your password</a>
					</div>
				</li>
			</ul>


			<a href="cart.php"><img src="cgi-bin/assets/images/cart.png" height="50px" style="margin: 0 25px; border-left: solid 1px #e0d9df; padding-left: 35px"></a>

		</div>
	</nav>

	<div class="container-fluid h-100">
		<div class="row h-100">
			<div class="col-sm-3 h-100" style="background-color: #505e7a; padding: 10px; padding-top: 80px; text-align: center; color: #ffffff;">
				<h3>Departments</h3>
				<div class="btn-group-vertical" style="width: 95%;">
					<button type="button" class="dpt btn btn-space" id="beauty">Beauty and Health</button>
					<button type="button" class="dpt btn btn-space" id="books">Books</button>
					<button type="button" class="dpt btn btn-space" id="electronics">Electronics</button>
					<button type="button" class="dpt btn btn-space" id="food">Food and Grocery</button>
					<button type="button" class="dpt btn btn-space" id="garden">Home, Garden and Tools</button>
					<button type="button" class="dpt btn btn-space" id="outdoors">Sports and Outdoors</button>
				</div>
				<h3>Refine by</h3>

				<div class="card" style="width: 95%; margin: auto; background-color: #505e7a; color: #ffffff; border: 1px solod white;">
					<h3 class="card-header" style="background-color: #21304a; color: white; ">Price</h3>
					<div class="card-block">
						<p class="card-text">
							<form id="price-filter" action="">
							<div class="row" style="margin-bottom: 10px">
								<div class="col-6">
									<input type="number" class="form-control" name="min" id="min" placeholder="Min">
								</div>
								<div class="col-6">
									<input type="number" class="form-control" name="max" id="max" placeholder="Max">
								</div>
							</div>
							<input type="submit" class="btn btn-outline-dark my-2 my-sm-0" value="Apply" >
							</form>
						</p>
						<h3 class="card-header" style="background-color: #21304a; color: white; margin-bottom: 10px;">Rating</h3>
						<a href="#" style="text-decoration: none; color: #ffffff"><p class="card-text star" id="4">
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"> &amp; Up</span>
						</p></a>
						<a href="#" style="text-decoration: none; color: #ffffff"><p class="card-text star"id="3">
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"> &amp; Up</span>
						</p></a>
				<a href="#" style="text-decoration: none; color: #ffffff"><p class="card-text star"id="2">
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"> &amp; Up</span>
						</p></a>
						<a href="#" style="text-decoration: none; color: #ffffff"><p class="card-text star"id="1">
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"> &amp; Up</span>
						</p></a>
					</div>
				</div>
			</div>
			<div class="col-sm-9" style="padding: 20px; padding-top: 85px;">
				<div class="row">
				<!--	<div class="col-sm-1">
						<div class="dropdown">
							<button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Sort by </button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="#">Price (ascending)</a> <a class="dropdown-item" href="#">Price (descending)</a> </div>
						</div>
					</div>-->
					<div class="col-sm-12">
						<form class="form-inline my-2 my-lg-0" id="find" action="">
							<div class="col-sm-9">
								<input class="form-control" type="text" placeholder="Search" aria-label="Search" name="str" id="str" style="width: 100%;">
							</div>
							<input type="submit" class="btn btn-outline-dark my-2 my-sm-0" value="Search">

						</form>
					</div>
				</div>
				<div id="search_results"></div>


			</div>
		</div>
	</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	<script type="text/javascript">
	</script>
</body>

</html>