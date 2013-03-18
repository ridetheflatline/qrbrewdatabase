<?php
	include("header.php");
	include("navBar.php");
	include("connect.php");

	if(isset($_SESSION['SESS_MEMBER_ID']))
		$member_id = $_SESSION['SESS_MEMBER_ID'];
	else
		header("location: message.php?message=NotLoggedIn");

	$memberResults = mysql_query("SELECT * from members where member_id=$member_id");
	if(!$memberResults)
		die ('Mysql query failed! How did that happen? : ' . mysql_error());
	
	$sqlFirstName=mysql_result($memberResults,0,"firstname");
	$sqlLastName=mysql_result($memberResults,0,"lastname");
	$sqlLogin=mysql_result($memberResults,0,"login");
	$sqlEmail=mysql_result($memberResults,0,"email");

?>
<div class="hero-unit">
	<center>
		<h2>User account</h2>
		<p>Your account information
	</center>
</div>
<div class="span6 offset4">
<form style="display: inline" class="form-horizontal" action="updateAccount.php" method="post">
	<div class="control-group">
		<label class="control-label" for="inputFirstName">First name</label>
		<div class="controls">
			<input type="text" name="inputFirstName" value='<?php echo $sqlFirstName; ?>'>
			<input type="hidden" name="sqlFirstName" value='<?php echo $sqlFirstName; ?>'>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputLastName">Last name</label>
		<div class="controls">
			<input type="text" name="inputLastName" value='<?php echo $sqlLastName; ?>'>
			<input type="hidden" name="sqlLastName" value='<?php echo $sqlLastName; ?>'>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputLogin">Login</label>
		<div class="controls">
			<input type="text" name="inputLogin" value='<?php echo $sqlLogin; ?>'>
			<input type="hidden" name="sqlLogin" value='<?php echo $sqlLogin; ?>'>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputEmail">Email</label>
		<div class="controls">
			<input type="text" name="inputEmail" value='<?php echo $sqlEmail; ?>'>
			<input type="hidden" name="sqlEmail" value='<?php echo $sqlEmail; ?>'>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<span><button type="submit" class="btn">Update</button></span>
			</form>
			<form style="display: inline" action="changePassword.php">
			<span><input type="submit" class="btn" value="Change Password"></span>
			</form>
		</div>
	</div>
</div>

<?php
mysql_close($con);
include("footer.php");
?>