<?php
	$con = mysql_connect("localhost","beer","cerveza");
	if (!$con)
		die('Could not connect: ' . mysql_error());

 	mysql_select_db("beer", $con);	
	$beerDb = mysql_select_db('beer', $con);
	if (!$beerDb)
    die ('Can\'t open db : ' . mysql_error());
	
	session_start();

	if(isset($_SESSION['SESS_MEMBER_ID']))
		$member_id = $_SESSION['SESS_MEMBER_ID'];
	else
	{
		header("location: message.php?message=NotLoggedIn");
	}
	// These are the user inputs:
$firstName=clean($_POST["inputFirstName"]);
$lastName=clean($_POST["inputLastName"]);
$login=clean($_POST["inputLogin"]);
$email=clean($_POST["inputEmail"]);

	// These are the data from the sql
$sqlFirstName=$_POST["sqlFirstName"];
$sqlLastName=$_POST["sqlLastName"];
$sqlLogin=$_POST["sqlLogin"];
$sqlEmail=$_POST["sqlEmail"];

echo $member_id;

	// Checking for changes
if ($firstName !== $sqlFirstName)
	{
	mysql_query("UPDATE members SET firstname='$firstName' WHERE member_id='$member_id'");
	$_SESSION['SESS_FIRST_NAME'] = $firstName;
	}
if ($lastName !== $sqlLastName)
	mysql_query("UPDATE members SET lastname='$lastName' WHERE member_id=$member_id'");
if ($login !== $sqlLogin)
	mysql_query("UPDATE members SET login='$login' WHERE member_id='$member_id'");
if ($email !== $sqlEmail)
	mysql_query("UPDATE members SET email='$email' WHERE member_id='$member_id'");

mysql_close($con);
	
header("location: account.php");

function clean($str){
  $str = @trim($str);
  if(get_magic_quotes_gpc()) 
    {
      $str = stripslashes($str);
    }
  return mysql_real_escape_string($str);
}

?>