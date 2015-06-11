<?php 
	mysql_connect("localhost", "root", "") or die (mysql_error());
	mysql_select_db("corpnet") or die (mysql_error());

	$partialStates = $_POST['partialState'];

	$kueri = "SELECT Usuario FROM cuenta WHERE Usuario LIKE '%$partialStates%'";
	$states = mysql_query($kueri) or die ("Error en " . mysql_error());
	while ($state = mysql_fetch_array($states)) {
		echo "<div>".$state['Usuario']."</div>";
	}
 ?>