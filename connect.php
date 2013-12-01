<?php

$con = mysql_connect("localhost","beer","cerveza");
if (!$con)
  {
    die('Could not connect: ' . mysql_error());
  }

$beerDb = mysql_select_db('beer', $con);
	if (!$beerDb)
    die ('Can\'t open db : ' . mysql_error());

?>