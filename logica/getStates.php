<?php
	mysql_connect("localhost", "root", "") or die (mysql_error());
	mysql_select_db("corpnet") or die (mysql_error());

	$partialStates = $_POST['numero'];

	$query ="UPDATE portafolio SET calificacion = $partialStates WHERE idPortafolio = 7";
	$resultado = mysql_query($query);
 ?>
