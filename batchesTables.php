<?php
  $result = mysql_query("SELECT boilNumber FROM boilings WHERE batchNumber=$batch");
  $resultArray = mysql_fetch_array($result);
  $boilNumber = $resultArray['boilNumber'];
  $result = mysql_query("SELECT mashNumber FROM mashings WHERE batchNumber=$batch");
  $resultArray = mysql_fetch_array($result);
  $mashNumber = $resultArray['mashNumber'];
?>
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
	$i=0;
	while($i < $num)
	{
	  echo "<tr>";
			echo '<td>';
				if(isset($_SESSION['SESS_MEMBER_ID']))
				{
					echo '<i class="icon-remove"></i>&nbsp;';
					echo '<i class="icon-pencil"></i>&nbsp;';
				}
				echo '<A HREF="showBatchInfo.php?batch='.mysql_result($maltResults,$i,"batchNumber").'"><i class="icon-eye-open"></i></a>';
				echo '</td>';
	    echo '<td>' .mysql_result($maltResults,$i,"batchNumber").'</td>';
	    echo "<td>" .mysql_result($maltResults,$i,"batchName"). "</td>";
	    echo "<td>" .mysql_result($maltResults,$i,"batchCode"). "</td>";
			echo "<td>" .mysql_result($maltResults,$i,"batchVolume"). "</td>";
			echo "<td>" .mysql_result($maltResults,$i,"brewDate"). "</td>";
	  echo "</tr>";
	  $i++;
	}
	?>
        </tbody>
      </table>
