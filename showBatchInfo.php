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
    <center>
      <h1>Brew info</h1>
      <p>
	<?php
	  $date = date_parse($row['brewDate']);
	  if(!$row or !$bottleStuff)
	    {
	      echo "Batch not found";
	    }
	  else
	    {
	      echo "This brew has batch number " . $row['batchNumber'] . ". It is called  <i>" . $row['batchName'] . "</i>.";
	      echo "<br>";
	      echo "The batchcode is <code>" . $row['batchCode'] . "</code>. Look for it on the bootlecap!";
	      echo "<br>";
	      echo "We brewed it <i>" . date("l jS \of F Y", mktime(0,0,0,$date['month'],$date['day'],$date['year'])) . ".</i>";
	      echo "<br>";
	      echo "The bottle is number <i>" . $bottleStuff['bottleNumber'] . "</i> out of <i>" . $bottling['bottlesUsed'] . "</i>.";
	    }
	?> 
      </p>
      <p>
	<a class="btn btn-primary btn-large">
	  Learn more
	</a>
	<form>
		<!-- Button to trigger modal -->
    <a href="#myModal" role="button" class="btn btn-large" data-toggle="modal">Launch demo modal</a>
    
    <!-- Modal -->
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="myModalLabel">Modal header</h3>
    </div>
    <div class="modal-body">
	<fieldset>
	  <legend>Legend</legend>
	  <label>Label name</label>
	  <input type="textarea" placeholder="Type something…">
	    <span class="help-block">Example block-level help text here.</span>
	    <label class="checkbox">Example
    <input type="checkbox"> Check me out
    </label>
    </fieldset>
</div>
<div class="modal-footer">
  <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>
</p>
</center>
</div>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>