<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>BEER!</title>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" />
</head>
<?php
  $batch = $_GET["batch"];
  $bottle = $_GET["bottle"];
  if($batch!=0)
  {
    if($bottle==0)
      $bottle=0;
    header( 'Location: /qr/showBatchInfo.php?batch=' . $batch . '&bottle=' . $bottle) ;
  }
  include("navBar.php");
?>
<body>
  <div class="hero-unit">
    <center>
      <h2>Welcome!</h2>
      <p>Greetings to you my friend
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
