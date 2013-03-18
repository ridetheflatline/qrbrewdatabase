<?php
	include("header.php");
	include("navBar.php");
	include("connect.php");

if(isset($_POST["email"]))
{
	$email=$_POST["email"];
	$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
	$newPass = '';
	for ($i = 0; $i < 8; $i++) 
	{
      $newPass .= $characters[rand(0, strlen($characters) - 1)];
 	}

	$memberResults = mysql_query("SELECT * from members where email='$email'");
	if(mysql_numrows($memberResults) !== 0)
	{
		$sqlLogin=mysql_result($memberResults,0,"login");
		if (mysql_query("UPDATE members SET state='TempPass', passwd='".md5($newPass)."' WHERE email='$email'"))
		{
			$message = 'Your username is: '.$sqlLogin.', your temporary password is: ' .$newPass. "\nPlease change this password when you log in.";	
			mail($email, 'Forgot your password...', $message);
			$mailSendt = TRUE;
		}
		else
		{
			echo "Error while trying to reset password: " . mysql_error();
			$mailSendt = FALSE;
		}
	}
	else
		$mailSendt = FALSE;
}
else
	$mailSendt = FALSE;

?>
<div class="hero-unit">
	<center>
		<h2>Forgot password</h2>
		<p>Please enter your e-mail.
	</center>
</div>
<div class="span6 offset4">
<form class="form-horizontal" action="forgotPassword.php" method="post">
<?php 
	if($mailSendt)
		echo '	<div class="control-group success">'."\n";
	else
		if(isset($_POST["email"]))
			echo '	<div class="control-group error">'."\n";		
		else		
			echo '	<div class="control-group">' ."\n";
?>
	<label class="control-label" for="inputFirstName">E-mail</label>
	<div class="controls">
<?php
	if($mailSendt)
	{
		echo '	<input type="text" name="email" value="'.$email.'">'."\n";
		echo '	<span class="help-inline">A temporary password was sendt to this address.</span>'."\n";
	}
	else
		if(isset($_POST["email"]))
		{
			echo '	<input type="text" name="email" value="'.$email.'">'."\n";
			echo '	<span class="help-inline">No account is registered with this e-mail.</span>'."\n";
		}	
		else
			echo '<input type="text" name="email">'."\n";
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

<?php
mysql_close($con);
include("footer.php");
?>