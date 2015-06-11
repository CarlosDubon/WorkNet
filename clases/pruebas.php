<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

	<script type="text/javascript">
	
	function getStates(value){

		$.post("getStates.php", {partialState:value}, function(data) {
			$("#results").html(data);
		});
	}
	</script>	
</head>
<body>
	<input type="text" onkeyup="getStates(this.value)"/>
	<br>
	<div id="results"></div>  
</body>
</html>