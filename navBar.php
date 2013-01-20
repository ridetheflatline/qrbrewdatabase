<div class="container">
  <div class="navbar">
    <div class="navbar-inner">
      <a class="brand" href="#">Birra!</a>
      <ul class="nav">
      <?php
	include("createNav.php");
	echo createNav("Home","/php/index.php");
	echo createNav("About","/php/about.php");
	echo createNav("Products","/php/products.php");
	echo createNav("Contact","/php/contact.php");
	echo createNav("Brew info","/php/showBatchInfo.php");
	?>
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