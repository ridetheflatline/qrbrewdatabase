<div class="container">
  <div class="navbar">
    <div class="navbar-inner">
      <a class="brand" href="index.php">Birra!</a>
      <ul class="nav">
      <?php
				//echo createNav("Home","/qr/index.php");
				//echo createNav("About","/qr/about.php");
				//echo createNav("Products","/qr/products.php");
				echo createNav("Brew info","/qr/showBatchInfo.php");
				echo createNav("Contact","/qr/contact.php");
			?>
      </ul>
			<center>
     	<ul class="nav pull-right">
      	<li id="fat-menu" class="dropdown">
         
					<?php
					session_start();
					if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == ''))
						include("navBarNoUser.php");
					else
					{
						echo '<a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">'.$_SESSION['SESS_FIRST_NAME'].'<b class="caret"></b></a>';
						echo '<ul class="dropdown-menu" role="menu" aria-labelledby="drop3">';
						echo '<li><a href="newBatch.php" type="submit" name="Submit" value="createBatch">New batch</a></li>';
						echo '<li><a href="account.php" type="submit" name="Submit" value="account">Account</a></li>';
						echo '<li class="divider"></li>';
						echo '<li><a href="Login/logout.php" type="submit" name="Submit" value="Logout">Logout</a></li>';
					}
					?>	
          </ul>
        </li>
			</center>
      </ul>			
    </div>
  </div>
</div>
<?php
function createNav($title, $link){
  if(basename($link) == basename($_SERVER['PHP_SELF'])){
      return "<li class=\"active\"><a href=\"#\">".$title."</a></li>\r";
   }else{
      return "<li><a href=\"".$link."\">".$title."</a></li>\r";
   }
}
?>
