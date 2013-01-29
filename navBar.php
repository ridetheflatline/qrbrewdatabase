<div class="container">
  <div class="navbar">
    <div class="navbar-inner">
      <a class="brand" href="#">Birra!</a>
      <ul class="nav">
      <?php
				include("createNav.php");
				echo createNav("Home","/qr/index.php");
				echo createNav("About","/qr/about.php");
				echo createNav("Products","/qr/products.php");
				echo createNav("Contact","/qr/contact.php");
				echo createNav("Brew info","/qr/showBatchInfo.php");
			?>
	  					<li class="dropdown">
				   	 	<a href="#" class="dropdown-toggle pull-right" data-toggle="dropdown">
			      	Account
			     	 	<b class="caret"></b>
    					</a>
    					<ul class="dropdown-menu pull-right">
      				Login
    					</ul>
  						</li>
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
