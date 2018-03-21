<?php
      
      $emailTo = $_POST['email'];
      $subject = "Reset password for your account";
      $body = "Please follow this link to reset your password: http://maiqtran-com.stackstaging.com/reset.php";
	  $headers = "From: woolavenue@maiqtran.com";
      mail($emailTo, $subject, $body, $headers);
      if (mail($emailTo, $subject, $body, $headers)){
		   $successMessage = '<div class="alert alert-success" role="alert">Please check your email for direction to reset your password.</div>';
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
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #21304a;"> <a class="navbar-brand logo" href="index.php"><img src="cgi-bin/assets/images/logo.png" height="50px"  style="margin-left: 5px;"></a>
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
<div class="container" style="padding-top: 250px; width: 50%">

 <form method="post" id="contact-form">
  <h2>Please enter your email address and we will send you a link to reset your password.</h2>
   <div id="error"><? echo $error.$successMessage; ?></div>
  <div class="row"><div class="col-sm-12">
    <div class="form-group">
    <label for="email1">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	  </div></div>
  </div>
  <div class="row">
	
	<div class="col-sm-12">
	<p align="right">
		<button class="btn"> Submit </button>
      
   <input type="button" onClick="location.href='index.php'" class="btn" value="Return to homepage">
    
 
		</p>
	</div>
	 </div></form>
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