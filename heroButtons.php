<p>
	<a class="btn btn-primary btn-large">
	  Learn more
	</a>
	<form action="feedback.php" method="post">
	  <input name="batch" type="hidden" value="<?php if(isset($_GET['batch'])) echo htmlspecialchars($_GET['batch'], ENT_QUOTES); ?>">
	  <input name="bottle" type="hidden" value="<?php if(isset($_GET['bottle'])) echo htmlspecialchars($_GET['bottle'], ENT_QUOTES); ?>"> 

	  <!-- Button to trigger modal -->
		<a href="#myModal" role="button" class="btn btn-large" data-toggle="modal">Leave message</a>
    
		<!-- Modal -->
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="myModalLabel">Feedback form</h3>
      </div>
      <div class="modal-body">
      <fieldset>
	<legend>Tell us something</legend>
	<label>Go on..</label>
	<?php
	  if(isset($_SESSION['SESS_MEMBER_ID']))
	    {
	      echo 'Posting as <i>'.$_SESSION['SESS_FIRST_NAME'].'.</i> If you want to post under another name, please log out.';
	      echo  '<input name="member_id" type="hidden" value='.$_SESSION["SESS_MEMBER_ID"].'>';
	    }
	  else
	    {
	      echo 'Name: <input type="text" name="commenter" placeholder="Put your name in this box."><br>';
	    }
	?>
	<div>
	 Comment: <textarea name="comment" rows="5" cols="10" ></textarea>
	</div>
	<span class="help-block">Your feedback is the most important thing in the world to us.</span>
      </fieldset>
      </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
