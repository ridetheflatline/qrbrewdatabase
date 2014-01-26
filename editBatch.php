<?php
	include("header.php");
	include("navBar.php");
	include("connect.php");

 // First make sure that there is a user logged in.

	if(isset($_SESSION['SESS_MEMBER_ID']))
		$member_id = $_SESSION['SESS_MEMBER_ID'];
	else
		header("location: message.php?message=NotLoggedIn");

// Check if a batch has been specified to be edited.

	if(isset($_GET['batchId']))
		$batchId = $_GET["batchId"];
	else
		header("location: message.php?message=NoBatchSelected");

// Then make sure the user has edit rights to the batch.
	$accessResults = mysql_query("SELECT * from batchAccess where member_id=$member_id and batchId=$batchId");
	if(mysql_numrows($accessResults) !== 0)
	{
		$level = mysql_result($accessResults,0,"level");
		if($level == 'Creator' || $level == 'Editer')
			$edit = 'OK';
		else
			header("location: message.php?message=NoBatchEditRights");
	}
	else
		header("location: message.php?message=NoBatchEditRights");
	
?>
<div class="hero-unit">
	<center>
		<h2>Edit batch</h2>
		<p>Batch name
	</center>
</div>

<?php
if(isset($edit))
{
	include("tableTest2.php");
}

mysql_close($con);
include("footer.php");
?>