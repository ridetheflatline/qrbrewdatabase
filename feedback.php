
<?php
include 'header.php';
include 'connect.php';
include("navBar.php");
#foreach($_POST as $key => $value)
#  {
#    echo "$key eaquals $value <br>";
#  }
?>

<div class="hero-unit">
<center>
<?php
$batch=$_POST["batch"];
$bottle=$_POST["bottle"];
$commenter=clean($_POST["commenter"]);
$comment=clean($_POST["comment"]);
$member_id=clean($_POST["member_id"]);

if(isset($_POST["commenter"]))
  {
    $result = mysql_query("SELECT * FROM commenters WHERE commenterName='$commenter'");
    trigger_error("SELECT * FROM commenters WHERE commenterName='$commenter'");
    if (mysql_num_rows($result) == 0 )
      {	
	$commenterQuery="INSERT INTO commenters (commenterName) VALUES ('$commenter')";
	$result = mysql_query($commenterQuery);
      }
    $result = mysql_query("SELECT * FROM commenters WHERE commenterName='$commenter'");
    $resultArray = mysql_fetch_array($result);
    $commenterId = $resultArray['commenterId'];
    $commentQuery="INSERT INTO comments (commentText, commenterId, batchId, bottleNumber) VALUES ('$comment','$commenterId','$batch','bottle')";
    $insertComment = mysql_query($commentQuery);
    if ($insertComment == FALSE)
      {
	die('Could not insert comment into database: ' . mysql_error());
      }
    else
      {
	echo "Comment added!";
      }
  }

if(isset($_POST["member_id"]))
  {
    $commentQuery="INSERT INTO comments (commentText, member_id, batchId, bottleNumber) VALUES ('$comment','$member_id','$batch','bottle')";
    $result = mysql_query($commentQuery);
  }


?>
</div>
<?php
mysql_close($con);


include 'footer.php';

function clean($str){
  $str = @trim($str);
  if(get_magic_quotes_gpc()) 
    {
      $str = stripslashes($str);
    }
  return mysql_real_escape_string($str);
}
	
?>