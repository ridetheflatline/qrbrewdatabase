<!DOCTYPE html>
<html>
<head>
<title>BEER!</title>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
  
  <?php
    
    $con = mysql_connect("localhost","beer","cerveza");
    if (!$con)
      {
	die('Could not connect: ' . mysql_error());
      }
      mysql_select_db("beer", $con);
      $batch = $_GET["batch"];
      $bottle = $_GET["bottle"];
      $result = mysql_query("SELECT * FROM batches WHERE batchNumber = $batch");
      $row = mysql_fetch_array($result);
      $result = mysql_query("SELECT * FROM bottles WHERE bottleNumber = $bottle");
      $bottleStuff = mysql_fetch_array($result);
      $bottlingNumber = $bottleStuff['bottlingNumber'];
      $result = mysql_query("SELECT * FROM bottlings WHERE bottlingNumber = $bottlingNumber");
      $bottling = mysql_fetch_array($result);
  ?>
  <div class="hero-unit">
    <h1>Brew info</h1>
    <p>
      <?php
	$date = date_parse($row['brewDate']);
	echo "This brew, has batch number " . $row['batchNumber'] . ". It is called  <i>" . $row['batchName'] . "</i>.";
	echo "<br />";
	echo "The batchcode is <i>" . $row['batchCode'] . "</i>. Look for it on the bootlecap!";
	echo "<br>";
	echo "We brewed it <i>" . date("l jS \of F Y", mktime(0,0,0,$date['month'],$date['day'],$date['year'])) . ".</i>";
	echo "<br>";
	echo "The bottle is number <i>" . $bottleStuff['bottleNumber'] . "</i> out of <i>" . $bottling['bottlesUsed'] . "</i>.";
      ?> 
    </p>
    <p>
      <a class="btn btn-primary btn-large">
	Learn more
      </a>
      <a class="btn btn-large">
	Leave a message
      </a>
    </p>
  </div>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
  
  