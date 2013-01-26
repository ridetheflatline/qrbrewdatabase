<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!--[if IE]><![endif]-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Adding hops to a list.</title>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" />
</head>
<!-- !Body -->
<body>
	<div id="container">
		<header>
			<h1>Hops</h1>
		</header><!-- /header -->
		<section id="main">
		<form class="form-inline">
		<p>
			<span id="addVar"><button class="btn" type="button">Add</button></span>
			<button type="submit" class="btn">Save</button>
		</p>
		</form>
		</section><!-- /main -->
		<footer>
		</footer><!-- /footer -->
	</div><!--!/#container -->
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
	<script>
	//initialize with 3
	var startingNo = 1;
	var $node = "";
	for(varCount=0;varCount<=startingNo;varCount++){
		var displayCount = varCount+1;
		$node += '<input type="text" name="var'+displayCount+'" id="var'+displayCount+ '">&nbsp;'+
		'<label for="var'+displayCount+'"></label>' +
		'<input type="text" name="var'+
		displayCount+'" id="var'+displayCount+ '">&nbsp;'+
		' <span class="removeVar"><button class="btn btn-danger btn-mini"'+
		' type="button"><i class="icon-remove"></i></button></span></p>';
	}
	$('form').prepend($node);
	
	$('form').on('click', '.removeVar', function(){
		$(this).parent().remove();
		varCount--;
	});

	$('#addVar').on('click', function(){
		//new node
		varCount++;
		$node = '<p><label for="var'+varCount+
		'">Variable '+varCount+': </label><input type="text" name="var'+
		varCount+'" id="var'+varCount+
		'">&nbsp;<span class="removeVar">'+
		'<button class="btn btn-danger btn-mini" type="button">'+
		'<i class="icon-remove"></i></button></span></p>';
		$(this).parent().before($node);
	});
	</script>
</body>
</html>

