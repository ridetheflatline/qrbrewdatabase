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

		if((mysql_result($maltResults,$i,"public") == 1) || $level)
			{
	  	echo "<tr>";
				echo '<td>';
					if($level == "Creator")
						echo '<i class="icon-remove"></i>&nbsp;';
					if($level == "Creator" || $level == "Editer")
						echo '<i class="icon-pencil"></i>&nbsp;';
					echo '<A HREF="showBatchInfo.php?batch='.mysql_result($maltResults,$i,"batchId").'"><i class="icon-eye-open"></i></a>';
					echo '</td>';
	  	  echo '<td>' .mysql_result($maltResults,$i,"batchNumber").'</td>';
	  	  echo "<td>" .mysql_result($maltResults,$i,"batchName"). "</td>";
	  	  echo "<td>" .mysql_result($maltResults,$i,"batchCode"). "</td>";
				echo "<td>" .mysql_result($maltResults,$i,"batchVolume"). "</td>";
				echo "<td>" .mysql_result($maltResults,$i,"brewDate"). "</td>";
	  	echo "</tr>";
			}	  
		$i++;
	}
	?>
        </tbody>
      </table>
