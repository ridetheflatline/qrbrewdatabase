<?php
include 'header.php';
include 'connect.php';

foreach($_POST as $key => $value)
  {
    echo "$key eaquals $value <br>";
  }

include 'footer.php';
?>