<div class="container">
  <div class="navbar">
    <div class="navbar-inner">
      <a class="brand" href="#">Birra!</a>
      <ul class="nav">
      <?php
				//echo createNav("Home","/qr/index.php");
				//echo createNav("About","/qr/about.php");
				//echo createNav("Products","/qr/products.php");
				echo createNav("Brew info","/qr/showBatchInfo.php");
				echo createNav("Contact","/qr/contact.php");
			?>
      </ul>
     	<ul class="nav pull-right">
      	<li id="fat-menu" class="dropdown">
          <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">Account<b class="caret"></b></a>
          <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
          <li><a tabindex="-1" href="#">Login</a></li>
          <!--<li><a tabindex="-1" href="#">Another action</a></li>
          <li><a tabindex="-1" href="#">Something else here</a></li>
          <li class="divider"></li>
          <li><a tabindex="-1" href="#">Separated link</a></li>-->
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
