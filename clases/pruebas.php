<form action="pruebas.php" method="POST">
<input type="date" name="edad">
<input type="submit">
</form>
<?php      
$date=new DateTime();
$dateNow = $date->format('Y-m-d');
$anio = substr($dateNow,0,-6);
$edad = $_POST['edad'];
$anioEdad = substr($edad,0,-6);
echo $anio;
echo $anioEdad;


        