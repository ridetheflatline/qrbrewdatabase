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
		<p>Awesome :)
	</center>
</div>
<div class="span6 offset4">
<form class="form-horizontal" action="newBatch.php" method="post">
<?php
	// BATCH NUMBER
	if(isset($_POST["Number"]))
	{
		$number = (float)$_POST["Number"];
		if($number > 0)	// Check if input is valid
		{
			echo '<div class="control-group">';
			echo '	<label class="control-label" for="Number">Number</label>';
			echo '	<div class="controls">';
			echo '		<input type="text" name="Number" value="' .$number. '">';
			echo '	</div>';
			echo '</div>';
			$numberValid = TRUE;
		}
		else
		{
			echo '<div class="control-group error">';
			echo '	<label class="control-label" for="Number">Number</label>';
			echo '	<div class="controls">';
			echo '		<input type="text" name="Number" value="' .$_POST["Number"]. '">';
			echo '		<span class="help-inline">Batch has to be a number, not 0.</span>';
			echo '	</div>';
			echo '</div>';
			$numberValid = FALSE;
		}		
	}
	else
	{
		echo '<div class="control-group">';
		echo '	<label class="control-label" for="Number">Number</label>';
		echo '	<div class="controls">';
		echo '		<input type="text" name="Number">';
		echo '	</div>';
		echo '</div>';
	}
?>
	<div class="control-group">
		<label class="control-label" for="Name">Name</label>
		<div class="controls">
			<input type="text" name="Name">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="Code">Code</label>
		<div class="controls">
			<input type="text" name="Code">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="Volume">Volume</label>
		<div class="controls">
			<input type="text" name="Volume">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="Date">Date</label>
		<div class="controls">
			<input type="text" name="Date">
		</div>
	</div>
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
include("footer.php");
?>