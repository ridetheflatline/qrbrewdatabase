<?php
	include("header.php");
	include("navBar.php");
	include("connect.php");

if(isset($_SESSION['SESS_MEMBER_ID']))
	$member_id = $_SESSION['SESS_MEMBER_ID'];
else
	header("location: message.php?message=NotLoggedIn");

if(isset($_POST["passwordOrig"]) && isset($_POST["passwordNew1"]) && isset($_POST["passwordNew2"]))
{
	if($_POST["passwordNew1"] == $_POST["passwordNew2"])
	{	
		$matchPass = TRUE;
		$passmd5 = md5($_POST['passwordOrig']);
		$newPassmd5 = md5($_POST['passwordNew1']);
		$memberResults = mysql_query("SELECT * FROM members WHERE member_id=$member_id AND passwd='$passmd5'");
		if(mysql_numrows($memberResults) == 1)	// Old password matches!
		{
			if (mysql_query("UPDATE members SET state='None', passwd='$newPassmd5' WHERE member_id='$member_id'"))
			{
				$passUpdated = TRUE;
				header("location: message.php?message=PasswordChanged");
			}
			else
			{
				echo "Error while trying to change password: " . mysql_error();
				$passUpdated = FALSE;
			}
			$oldPassOk = TRUE;
		}
		else
			$oldPassOk = FALSE;
	}
	else
		$matchPass = FALSE;
}

?>
<div class="hero-unit">
	<center>
		<h2>Change password</h2>
		<p>Please enter your current password first.
	</center>
</div>
<div class="span6 offset4">
	<form class="form-horizontal" action="changePassword.php" method="post">
<?php 
	if(isset($oldPassOk))
	{
		if($oldPassOk)
			echo '<div class="control-group success">'."\n";
		else
			echo '<div class="control-group error">'."\n";
	}
	else
		echo '<div class="control-group">'."\n";
?>
			<label class="control-label" for="passwordOrig">Password</label>
			<div class="controls">
<?php
	if($oldPassOk)
	{
		echo '	<input type="password" name="passwordOrig">'."\n";
		echo '	<span class="help-inline">Password successfully updated!.</span>'."\n";
	}
	else
		if(isset($oldPassOk))
		{
			echo '	<input type="password" name="passwordOrig" value="'.$_POST['passwordOrig'].'">'."\n";
			echo '	<span class="help-inline">Incorrect password!</span>'."\n";
		}	
		else
			echo '<input type="password" name="passwordOrig">'."\n";
?>
			</div>
		</div>
<?php 
	if(isset($matchPass))
	{
		if($matchPass)
			echo '<div class="control-group success">'."\n";
		else
			echo '<div class="control-group error">'."\n";
	}
	else
		echo '<div class="control-group">'."\n";
?>
			<label class="control-label" for="passwordNew1">New password</label>
			<div class="controls">
<?php
	if($matchPass)
	{
		echo '	<input type="password" name="passwordNew1" value="'.$_POST['passwordNew1'].'">'."\n";
		echo '	<span class="help-inline">Passwords match.</span>'."\n";
	}
	else
		if(isset($matchPass))
		{
			echo '	<input type="password" name="passwordNew1" value="'.$_POST['passwordNew1'].'">'."\n";
			echo '	<span class="help-inline">Passwords do not match!</span>'."\n";
		}	
		else
			echo '<input type="password" name="passwordNew1">'."\n";
?>
			</div>
		</div>
<?php 
	if(isset($matchPass))
	{
		if($matchPass)
			echo '<div class="control-group success">'."\n";
		else
			echo '<div class="control-group error">'."\n";
	}
	else
		echo '<div class="control-group">'."\n";
?>
			<label class="control-label" for="passwordNew2">Repeat password</label>
			<div class="controls">
<?php
	if($matchPass)
	{
		echo '	<input type="password" name="passwordNew2" value="'.$_POST['passwordNew2'].'">'."\n";
	}
	else
		if(isset($matchPass))
		{
			echo '	<input type="password" name="passwordNew2" value="'.$_POST['passwordNew2'].'">'."\n";
		}	
		else
			echo '<input type="password" name="passwordNew2">'."\n";
?>
			</div>
		</div>
			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn">Send</button>
				</div>
			</div>
		</div>
	</form>
</div>

<?php
mysql_close($con);
include("footer.php");
?>