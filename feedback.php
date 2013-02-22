<?php
include 'header.php';
include 'connect.php';

foreach($_POST as $key => $value)
  {
    echo "$key eaquals $value <br>";
  }

$batch=$_POST["batch"];
$batch=$_POST["bottle"];
$commenter=$_POST["commenter"];
$comment=$_POST["comment"];

$commenterQuery="INSERT INTO commenters (commenterName)
VALUES ('$commenter')";

$sql="INSERT INTO comments (FirstName, LastName, Age)
VALUES
('$_POST[firstname]','$_POST[lastname]','$_POST[age]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";

mysql_close($con);

include 'footer.php';

?>