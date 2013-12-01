<?php
	include("header.php");
		if(isset($_GET['batch']))
  		$batch = $_GET["batch"];
		else
			$batch = FALSE;

		if(isset($_GET['bottle']))
  		$bottle = $_GET["bottle"];
		else
			$bottle = FALSE;

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
