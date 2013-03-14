<a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">Account<b class="caret"></b></a>
	<ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
	<li><p></p></li>
	<li><a href="createAccount.php" type="submit" name="Submit" value="createAccount">Create account</a></li>
	<li class="divider"></li>
<form id="loginForm" name="loginForm" method="post" action="Login/login.php">
	<li><input name="login" type="text" class="textfield input-small" id="login" placeholder="Username"/></li>
	<li><input name="password" type="password" class="textfield input-small" id="password" placeholder="Password" /></li>
	<li><a href="#" onclick="$(this).closest('form').submit()">Login</a></li>
</form>
