<?php
include("header.php");
include("navBar.php");
?>
  <div class="hero-unit">
    <center>
      <h2>User account</h2>
      <p>Your account information
		</center>
	</div>
<div class="span6 offset4">
<form class="form-horizontal">
	<div class="control-group">
		<label class="control-label" for="inputFirstName">First name</label>
		<div class="controls">
			<input type="text" id="inputFirstName" placeholder="Load from sql..">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputLastName">Last name</label>
		<div class="controls">
			<input type="text" id="inputLastName" placeholder="Load from sql..">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputLogin">Login</label>
		<div class="controls">
			<input type="text" id="inputLogin" placeholder="Load from sql..">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputEmail">Email</label>
		<div class="controls">
			<input type="text" id="inputEmail" placeholder="Load from sql..">
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn">Update</button>&nbsp;&nbsp;&nbsp;&nbsp;
			<button type="submit" class="btn">Reset password</button>
		</div>
	</div>
</div>
</form>

<?php
include("footer.php");
?>