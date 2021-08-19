<?php
	require_once("../models/reservacion.php");
    $instancia_claseModelo = new Rerseva();
    $datos = $instancia_claseModelo->insertaReserva($fecha,$destino, $nombre, $apellido1, $apellido2, $cedula, $idioma, $telefono, $email, $cantidad, $comentario);
    require_once("../models/reservacion.php");
    //require_once("../views/vistaPrueba.php");
?>