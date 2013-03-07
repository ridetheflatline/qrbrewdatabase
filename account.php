<?php
	include("header.php");
	include("navBar.php");
	$con = mysql_connect("localhost","beer","cerveza");
	if (!$con)
		die('Could not connect: ' . mysql_error());

 	mysql_select_db("beer", $con);	
	$beerDb = mysql_select_db('beer', $con);
	if (!$beerDb)
    die ('Can\'t open db : ' . mysql_error());

	if(isset($_SESSION['SESS_MEMBER_ID']))
		$member_id = $_SESSION['SESS_MEMBER_ID'];
	else
		header("location: message.php?message=NotLoggedIn");

	$memberResults = mysql_query("SELECT * from members where member_id=$member_id");
	if(!$memberResults)
		die ('Mysql query failed! How did that happen? : ' . mysql_error());
?>
<div class="hero-unit">
	<center>
		<h2>User account</h2>
		<p>Your account information
	</center>
</div>
<div class="span6 offset4">
<form class="form-horizontal" action="updateAccount.php" method="post">
	<div class="control-group">
		<label class="control-label" for="inputFirstName">First name</label>
		<div class="controls">
			<input type="text" name="inputFirstName" value=<?php echo "\"" .mysql_result($memberResults,0,"firstname"). "\""; ?>>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputLastName">Last name</label>
		<div class="controls">
			<input type="text" name="inputLastName" value=<?php echo "\"" .mysql_result($memberResults,0,"lastname"). "\""; ?>>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputLogin">Login</label>
		<div class="controls">
			<input type="text" name="inputLogin" value=<?php echo "\"" .mysql_result($memberResults,0,"login"). "\""; ?>>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputEmail">Email</label>
		<div class="controls">
			<input type="text" name="inputEmail" value=<?php echo "\"" .mysql_result($memberResults,0,"email"). "\""; ?>>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn">Update</button>
		</div>
	</div>
</div>
</form>

<?php
include("footer.php");
?>