<?php
include("header.php");
include("navBar.php");

	if(isset($_SESSION['SESS_MEMBER_ID']))
		$member_id = $_SESSION['SESS_MEMBER_ID'];
	else
		header("location: message.php?message=NotLoggedIn");

?>
<div class="hero-unit">
	<center>
		<h2>Create new batch</h2>
		<p>These values can be edited later if needed.
	</center>
</div>
<div class="span6 offset4">
<form class="form-horizontal" action="newBatch.php" method="post">
<?php
	// ********* BATCH NUMBER ********* 
	if(isset($_POST["Number"]))
	{
		$number = (float)$_POST["Number"];
		if($number > 0)	// Check if input is valid
		{ // This case shows if all is OK.
			echo '<div class="control-group success">';
			echo '	<label class="control-label" for="Number">Number</label>';
			echo '	<div class="controls">';
			echo '		<input type="text" name="Number" value="' .$number. '">';
			$numberValid = TRUE;
		}
		else
		{	// This case shows if there was an ERROR.	
			echo '<div class="control-group error">';
			echo '	<label class="control-label" for="Number">Number</label>';
			echo '	<div class="controls">';
			echo '		<input type="text" name="Number" value="' .$_POST["Number"]. '">';
			echo '		<span class="help-inline">Batch has to be a number, not 0.</span>';
			$numberValid = FALSE;
		}		
	}
	else
	{ // This case shows if no input variable is posted yet.
		echo '<div class="control-group">';
		echo '	<label class="control-label" for="Number">Number</label>';
		echo '	<div class="controls">';
		echo '		<input type="text" name="Number">';
		$numberValid = FALSE;
	}
	echo '	</div>';
	echo '</div>';
?>

<?php
	// ********* BATCH NAME ********* 
	if(isset($_POST["Name"]))
	{
		if(strlen($_POST["Name"]) > 0 && strlen($_POST["Name"]) < 100)	// Check if input is valid
		{ // This case shows if all is OK.
			echo '<div class="control-group success">';
			echo '	<label class="control-label" for="Name">Name</label>';
			echo '	<div class="controls">';
			echo '		<input type="text" name="Name" value="' .$_POST["Name"]. '">';
			$nameValid = TRUE;
		}
		else
		{	// This case shows if there was an ERROR.	
			echo '<div class="control-group error">';
			echo '	<label class="control-label" for="Name">Name</label>';
			echo '	<div class="controls">';
			echo '		<input type="text" name="Name" value="' .$_POST["Name"]. '">';
			echo '		<span class="help-inline">Batch name too short or too long.</span>';
			$nameValid = FALSE;
		}		
	}
	else
	{ // This case shows if no input variable is posted yet.
		echo '<div class="control-group">';
		echo '	<label class="control-label" for="Name">Name</label>';
		echo '	<div class="controls">';
		echo '		<input type="text" name="Name">';
		$nameValid = FALSE;
	}
	echo '	</div>';
	echo '</div>';
?>

<?php
	// ********* CODE ********* 
	if(isset($_POST["Code"]))
	{
		if(strlen($_POST["Code"]) < 10)	// Check if input is valid
		{ // This case shows if all is OK.
			echo '<div class="control-group success">';
			echo '	<label class="control-label" for="Code">Code</label>';
			echo '	<div class="controls">';
			echo '		<input type="text" Name="Code" value="' .$_POST["Code"]. '">';
			$codeValid = TRUE;
		}
		else
		{	// This case shows if there was an ERROR.	
			echo '<div class="control-group error">';
			echo '	<label class="control-label" for="Code">Code</label>';
			echo '	<div class="controls">';
			echo '		<input type="text" name="Code" value="' .$_POST["Code"]. '">';
			echo '		<span class="help-inline">Batch code can not be longer then 10 charactes.</span>';
			$codeValid = FALSE;
		}		
	}
	else
	{ // This case shows if no input variable is posted yet.
		echo '<div class="control-group">';
		echo '	<label class="control-label" for="Code">Code</label>';
		echo '	<div class="controls">';
		echo '		<input type="text" name="Code">';
		$codeValid = FALSE;
	}
	echo '	</div>';
	echo '</div>';
?>

<?php
	// ********* VOLUME ********* 
	if(isset($_POST["Volume"]))
	{
		$volume = (float)$_POST["Volume"];
		if($volume >= 0)	// Check if input is valid
		{ // This case shows if all is OK.
			echo '<div class="control-group success">';
			echo '	<label class="control-label" for="Volume">Volume</label>';
			echo '	<div class="controls">';
			echo '		<input type="text" name="Volume" value="' .$volume. '">';
			$volumeValid = TRUE;
		}
		else
		{	// This case shows if there was an ERROR.	
			echo '<div class="control-group error">';
			echo '	<label class="control-label" for="Volume">Volume</label>';
			echo '	<div class="controls">';
			echo '		<input type="text" name="Volume" value="' .$_POST["Volume"]. '">';
			echo '		<span class="help-inline">Volume has to be a positive number.</span>';
			$volumeValid = FALSE;
		}		
	}
	else
	{ // This case shows if no input variable is posted yet.
		echo '<div class="control-group">';
		echo '	<label class="control-label" for="Volume">Volume</label>';
		echo '	<div class="controls">';
		echo '		<input type="text" name="Volume">';
		$volumeValid = FALSE;
	}
	echo '	</div>';
	echo '</div>';
?>

<?php
	// ********* DATE ********* 
	if(isset($_POST["Date"]))
	{
		$dateInput = strtotime($_POST["Date"]);
		$date = date("Y-m-d", $dateInput);
		if($dateInput !== -1 && $dateInput !== FALSE)	// Check if input is valid
		{ // This case shows if all is OK.
			echo '<div class="control-group success">';
			echo '	<label class="control-label" for="Date">Date</label>';
			echo '	<div class="controls">';
			echo '		<input type="text" name="Date" value="' .$date. '">';
			$dateValid = TRUE;
		}
		else
		{	// This case shows if there was an ERROR.	
			echo '<div class="control-group error">';
			echo '	<label class="control-label" for="Date">Date</label>';
			echo '	<div class="controls">';
			echo '		<input type="text" name="Date" value="' .$_POST["Date"]. '">';
			echo '		<span class="help-inline">Date invalid format.</span>';
			$dateValid = FALSE;
		}		
	}
	else
	{ // This case shows if no input variable is posted yet.
		echo '<div class="control-group">';
		echo '	<label class="control-label" for="Date">Date</label>';
		echo '	<div class="controls">';
		echo '		<input type="text" name="Date">';
		$dateValid = FALSE;
	}
	echo '	</div>';
	echo '</div>';
?>
	<div class="control-group">
		<label class="control-label" for="Public">Public</label>
		<div class="controls">
			<input type="checkbox" name="Public" checked="TRUE">
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn">Create</button>
		</div>
	</div>
</div>
</form>

<?php
include("connect.php");
if($numberValid && $nameValid && $codeValid && $dateValid && $volumeValid)
{
	$name = $_POST["Name"];
	$code = $_POST["Code"];
	if($_POST["Public"] === "on")
		$public = 1;
	else
	  $public = 0;
	$batchInsertQuery="INSERT INTO batches (batchNumber, batchName, batchCode, batchVolume, brewDate, public) 
																	VALUES ('$number','$name','$code','$volume','$date','$public')";
	$batchInsert = mysql_query($batchInsertQuery);
	if ($batchInsert == FALSE)
	{
		die('Not able to add batch: ' . mysql_error());
	}
	else
	{
		$batchId=mysql_insert_id();
		$accessQuery="INSERT INTO batchAccess (batchId, member_id, level) 
																	VALUES ('$batchId','$member_id','Creator')";
		$batchAccessInsert = mysql_query($accessQuery);
		if ($batchAccessInsert == FALSE)
		{
			die('Not able to give access rights on created batch: ' . mysql_error());
		}
		else	
			header("location: showBatchInfo.php");
	}
}
mysql_close($con);
include("footer.php");
?>