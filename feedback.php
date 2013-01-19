<?php
$con = mysql_connect("localhost","beer","cerveza");
if (!$con)
  {
    die('Could not connect: ' . mysql_error());
  }
mysql_select_db("beer", $con);
foreach($_POST as $key => $value)
  {
    echo "$key eaquals $value <br>";
  }

?>