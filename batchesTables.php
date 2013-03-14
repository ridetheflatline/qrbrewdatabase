<h2> Batches: </h2>
<table class="table table-striped">
        <thead>
          <tr>
						<th>Actions</th>
            <th>Batch#</th>
            <th>Name</th>
            <th>Code</th>
						<th>Volume</th>
						<th>Brew date</th>
          </tr>
        </thead>
        <tbody>
	<?php
	include("deleteBatchButton.php");	// Include function to create the delete 'X' buttons.

  $maltResults = mysql_query("SELECT * FROM batches");
	$num = mysql_numrows($maltResults);
	if(isset($_SESSION['SESS_MEMBER_ID']))
		$member_id = $_SESSION['SESS_MEMBER_ID'];
	else
		$member_id = 0;
	$i=0;
	while($i < $num)
	{
		$batchId = mysql_result($maltResults,$i,"batchId");
		$accessResults = mysql_query("SELECT * from batchAccess where member_id=$member_id and batchId=$batchId");
		if(mysql_numrows($accessResults) !== 0)
			$level = mysql_result($accessResults,0,"level");
		else
			$level = FALSE;

		if(((mysql_result($maltResults,$i,"public") == 1) || $level) && (mysql_result($maltResults,$i,"state") == 'None'))
			{
	  	echo "<tr>"."\n";
				echo '<td>'."\n";
					if($level == "Creator")
						createDeleteButton(mysql_result($maltResults,$i,"batchName"),mysql_result($maltResults,$i,"batchId"));
					if($level == "Creator" || $level == "Editer")
						echo '<i class="icon-pencil"></i>'."\n";
				echo '<A HREF="showBatchInfo.php?batch='.mysql_result($maltResults,$i,"batchId").'"><i class="icon-eye-open"></i></a>'."\n";
				echo '</td>'."\n";
	  	  echo '<td>' .mysql_result($maltResults,$i,"batchNumber").'</td>'."\n";
	  	  echo "<td>" .mysql_result($maltResults,$i,"batchName"). "</td>"."\n";
	  	  echo "<td>" .mysql_result($maltResults,$i,"batchCode"). "</td>"."\n";
				echo "<td>" .mysql_result($maltResults,$i,"batchVolume"). "</td>"."\n";
				echo "<td>" .mysql_result($maltResults,$i,"brewDate"). "</td>"."\n";
	  	echo "</tr>"."\n";
			}	  
		$i++;
	}

	?>
        </tbody>
      </table>
