<?php
	include("header.php");
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

<?php
	include("footer.php");
?>
