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
<body>
  <?php
    include("navBar.php");
    $con = mysql_connect("localhost","beer","cerveza");
    if (!$con)
      {
	die('Could not connect: ' . mysql_error());
      }
      mysql_select_db("beer", $con);
			if(isset($_GET['batch']))
	      $batch = $_GET["batch"];
			else
				$batch = FALSE;

			if(isset($_GET['bottle']))
      	$bottle = $_GET["bottle"];
			else
				$bottle = FALSE;

      $result = mysql_query("SELECT * FROM batches WHERE batchId = $batch");
			if($result !== FALSE)
      	$row = mysql_fetch_array($result);
			else
				$row = FALSE;

     	$result = mysql_query("SELECT * FROM bottles WHERE bottleNumber = $bottle");
			if($result !== FALSE) {
	      $bottleStuff = mysql_fetch_array($result);
	      $bottlingNumber = $bottleStuff['bottlingNumber'];
	      $result = mysql_query("SELECT * FROM bottlings WHERE bottlingNumber = $bottlingNumber");
	      $bottling = mysql_fetch_array($result);
			}
			else
				$bottleStuff = FALSE;
  ?>
  <div class="hero-unit">
    <center>
      <h2>Brew info</h2>
      <p>
	<?php
	  $date = date_parse($row['brewDate']);
	  if(!$row)
	    {
	      echo "Showing all batches";
	    }
	  else
	    {
	      echo "This brew has batch number " . $row['batchNumber'] . ". <br> It is called  <i>" . $row['batchName'] . "</i>.";
	      echo "<br>";
	      echo "The batchcode is <code>" . $row['batchCode'] . "</code>. <br>";
	      echo "It was brewed <i>" . date("l jS \of F Y", mktime(0,0,0,$date['month'],$date['day'],$date['year'])) . ".</i>";
	      echo "<br>";
        if($bottleStuff)
	        echo "The bottle is number <i>" . $bottleStuff['bottleNumber'] . "</i> out of <i>" . $bottling['bottlesUsed'] . "</i>.";
	    }
	?>
      </p>
      <?php
				if($row) 
					include("heroButtons.php")
			?>
</div>
</p>
</center>
</div>
<?php 
	if($row)
		include("reagentTables.php");
	else
		include("batchesTables.php");
?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
