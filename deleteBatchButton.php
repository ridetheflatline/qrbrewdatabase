<?php
function createDeleteButton($batchName, $batchIdToDelete)
{
	$modalName = preg_replace( '/\s+/', '', $batchName ).'-'.$batchIdToDelete;
	$modalLabel = $modalName.'Label';
	echo '<form style="display: inline" action="deleteBatchAction.php" method="post">'."\n";
	echo '<input name="batchId" type="hidden" value="'.$batchIdToDelete.'">'."\n";
	// Trigger
	echo '	<a href="#'.$modalName.'" role="button" data-toggle="modal"><i class="icon-remove"></i></a>'."\n";
    
	// Modal
	echo '	<div id="'.$modalName.'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="'.$modalLabel.'" aria-hidden="true">'."\n";
	echo '		<div class="modal-header">'."\n";
	echo '			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>'."\n";
	echo '			<h3 id="'.$modalLabel.'">Delete batch.</h3>'."\n";
	echo '		</div>'."\n";
	echo '		<div class="modal-body">'."\n";
	echo '			<fieldset>'."\n";
	echo '				<legend>Really delete batch: '.$batchName.'?</legend>'."\n";
	echo '				<label>Deleting the batch is not permanent. You can recover it from or delete it permanently from the "trash can" user menu.</label>'."\n";
	echo '			</fieldset>'."\n";
	echo '	</div>'."\n";
	echo '		<div class="modal-footer">'."\n";
	echo '			<button type="submit" class="btn btn-primary btn-danger">Delete</button>'."\n";
	echo '		</div>'."\n";
	echo '	</div>'."\n";
	echo '</form>'."\n";
}
?>