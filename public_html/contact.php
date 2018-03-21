<?php
      
      $emailTo = $_POST['email'];
      $subject = "Order number: ".$_POST['order-number'];
      $body = "Thank you for reaching out to us! We'll contact you soon!";
	  $headers = "From: woolavenue@maiqtran.com";
      mail($emailTo, $subject, $body, $headers);
      if (mail($emailTo, $subject, $body, $headers)){
		   $successMessage = '<div class="alert alert-success" role="alert">Your message was sent, we\'ll get back to you ASAP!</div>';
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

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #21304a;"> <a class="navbar-brand logo" href="home-member.html"><img src="cgi-bin/assets/images/logo.png" height="50px"  style="margin-left: 5px;"></a>
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
    
    
    <a href="cart-member.html"><img src="cgi-bin/assets/images/cart.png" height="50px" style="margin: 0 35px;"></a>
    
  </div>
</nav>

<div class="container" style="padding-top: 100px;">
	<h2>Customer Support</h2>
	<div id="error"><? echo $error.$successMessage; ?></div>
	<form method="post" id="contact-form">
  <div class="form-group">
    <label for="email1">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  
  <div class="form-group">
    <label for="order number">Order number</label>
    <input type="text" class="form-control" id="order-number" name="order-number" aria-describedby="emailHelp" placeholder="12-digit order number">
  </div>


  <div class="form-group">
    <label for="issue">Issue</label>
    <textarea class="form-control" id="issue" name="issue" rows="4"></textarea>
  </div>
  <button id="submit-form" class="btn btn-primary">Submit</button>
  <input type="button" onClick="location.href='home-member.html'" class="btn" value="Return to homepage">
  
  
  
</form>
  
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