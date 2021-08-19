<!DOCTYPE html>
<html>
<body>

<h3>Lista de Contactos</h3>

<?php
	for ($i = 0; $i < count($datos); $i++) {
		echo "Id: " . $datos[$i]["ID"]
		. " - Nombre: " . $datos[$i]["NOMBRE"]
        . "<br>";
	}//Fin For
?>

</body>
</html>