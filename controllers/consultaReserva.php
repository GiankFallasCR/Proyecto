<?php
	require_once("../models/reservacion.php");
    $instancia_claseModelo = new Rerseva();
    $datos = $instancia_claseModelo->muestraReserva();
    //require_once("../views/vistaPrueba.php");
?>