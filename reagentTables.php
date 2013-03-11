<?php
  $result = mysql_query("SELECT boilNumber FROM boilings WHERE batchId=$batch");
  $resultArray = mysql_fetch_array($result);
  $boilNumber = $resultArray['boilNumber'];
  $result = mysql_query("SELECT mashNumber FROM mashings WHERE batchId=$batch");
  $resultArray = mysql_fetch_array($result);
  $mashNumber = $resultArray['mashNumber'];
?>
<div class="row">    
<div class="span6">
<h2> Malt: </h2>

<table class="table table-striped">
        <thead>
          <tr>
            <th>Malt</th>
            <th>EBC</th>
            <th>Weight</th>
          </tr>
        </thead>
        <tbody>
	<?php
        $maltResults = mysql_query("SELECT * FROM maltAdds WHERE mashNumber=$mashNumber");
	$num = mysql_numrows($maltResults);
	$i=0;
	while($i < $num)
	  {
	    echo "<tr>";
	    echo "<td>" .mysql_result($maltResults,$i,"maltType"). "</td>";
	    echo "<td>" .mysql_result($maltResults,$i,"maltEbc"). "</td>";
	    echo "<td>" .mysql_result($maltResults,$i,"maltMass"). "</td>";
	    echo "</tr>";
	    $i++;
	  }
	?>
        </tbody>
      </table>
		</div>

    <div class="span6">
<h2> Mash: </h2>
<table class="table table-striped">
        <thead>
          <tr>
            <th>Stage</th>
            <th>Time</th>
            <th>Temperature</th>
          </tr>
        </thead>
        <tbody>
	<?php
        $mashResults = mysql_query("SELECT * FROM mashStages WHERE mashNumber=$mashNumber");
	$num = mysql_numrows($mashResults);
	$i=0;
	while($i < $num)
	  {
	    echo "<tr>";
	    echo "<td>" .mysql_result($mashResults,$i,"mashStage"). "</td>";
	    echo "<td>" .mysql_result($mashResults,$i,"time"). "</td>";
	    echo "<td>" .mysql_result($mashResults,$i,"temp"). "</td>";
	    echo "</tr>";
	    $i++;
	  }
	?>
        </tbody>
      </table>
		</div>
    </div>
<h2> Hops: </h2>
<table class="table table-striped">
        <thead>
          <tr>
            <th>Hop</th>
            <th>Alpha acid</th>
            <th>Weight</th>
            <th>Boil time</th>
            <th>Type</th>
          </tr>
        </thead>
        <tbody>
	<?php
        $hoppingsResults = mysql_query("SELECT * FROM hoppings WHERE boilNumber=$boilNumber");
	$num = mysql_numrows($hoppingsResults);
	$i=0;
	while($i < $num)
	  {
	    echo "<tr>";
	    echo "<td>" .mysql_result($hoppingsResults,$i,"hopName"). "</td>";
	    echo "<td>" .mysql_result($hoppingsResults,$i,"hopAlpha"). "%</td>";
	    echo "<td>" .mysql_result($hoppingsResults,$i,"hopMass"). "g</td>";
	    echo "<td>" .mysql_result($hoppingsResults,$i,"boilTime"). "min</td>";
	    echo "<td>" .mysql_result($hoppingsResults,$i,"hopType"). "</td>";
	    echo "</tr>";
	    $i++;
	  }
	?>
        </tbody>
      </table>
  
  
