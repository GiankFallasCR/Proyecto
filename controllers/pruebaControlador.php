<?php
	require_once("../models/prueba.php");
    $instancia_claseModelo = new Prueba();
    $datos = $instancia_claseModelo->muestraPrueba();
    //require_once("../views/vistaPrueba.php");
?>