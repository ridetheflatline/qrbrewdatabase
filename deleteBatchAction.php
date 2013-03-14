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
$batchId=$_POST["batchId"];

$accessResults = mysql_query("SELECT * from batchAccess where member_id=$member_id and batchId=$batchId");
if(mysql_numrows($accessResults) !== 0)
	$level = mysql_result($accessResults,0,"level");
else
{
	echo "Error while trying to read access rights: " . mysql_error();	
	$level = FALSE;
}

if ($level == "Creator") // Double check access level.
{
	if (mysql_query("UPDATE batches SET state='Deleted' WHERE batchId='$batchId'"))
		header("location: showBatchInfo.php");
	else
		echo "Error while trying to delete batch: " . mysql_error();
}
else
	header("location: message.php?message=AccessDenied");

mysql_close($con);	
?>