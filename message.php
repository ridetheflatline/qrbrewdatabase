<?php
include("header.php");
$message = $_GET["message"];
include("navBar.php");

echo '<body>';
  echo ' <div class="hero-unit">';
    echo '<center>';
			if($message=="LoginFailed")
			{
				echo '<h2>Login failed!</h2>';
      	echo '<p>Username and/or password was wrong.';
			}			
			else if($message=="LoginSuccess")
			{
				echo '<h2>Welcome ' .$_SESSION['SESS_FIRST_NAME'].' </h2>';
      	echo '<p>Your login was successful.';
			}			
			else if($message=="RegSuccess")
			{
				echo '<h2>Registration successful!</h2>';
      	echo '<p>But you are not logged in yet.';
			}		
			else if($message=="Logout")
			{
				echo '<h2> Logged out. </h2>';
      	echo '<p>You are now logged out.';
			}			
			else if($message=="NotLoggedIn")
			{
				echo '<h2>Not logged in</h2>';
      	echo '<p>Please log in to access this page.';
			}			
			else if($message=="AccessDenied")
			{
				echo '<h2>Access denied!</h2>';
      	echo '<p>You do not have access to do that.';
			}	
			else if($message=="PasswordChanged")
			{
				echo '<h2>Password updated!</h2>';
      	echo '<p>Your password was successfully updated.';
			}	
			else if($message=="NoBatchSelected")
			{
				echo '<h2>No batch selected!</h2>';
      	echo '<p>The page you tried to enter requires a input in the url. Please tell us how you ended up here.';
			}	
			else if($message=="NoBatchEditRights")
			{
				echo '<h2>Batch access denied!</h2>';
      	echo '<p>You do not have the correct privileges to edit this batch.';
			}	
			else
			{
      	echo '<h2>Unknown error</h2>';
      	echo '<p>Not able to find the message you are looking for.';
			}
		echo '</center>';
	echo '</div>';
include("footer.php");
?>
