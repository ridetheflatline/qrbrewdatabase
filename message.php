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
			else if($message=="Logout")
			{
				echo '<h2> Logged out. </h2>';
      	echo '<p>You are now logged out.';
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
