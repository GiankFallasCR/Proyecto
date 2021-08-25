<?php
    session_start();
    include_once './library/configServer.php';
    include_once './library/consulSQL.php';

        
        $filas = 0;
        $stmt = ejecutarSQL::consultar('SELECT * FROM DESTINO');        // Preparar la sentencia
         $ok   = oci_execute($stmt);              // Ejecutar la sentencia

         while(($row = oci_fetch_array($destinos, OCI_BOTH)) != false){
            echo '<option value="'.$row['ID_DESTINO'].'">'.$row['DES_ACTIVIDAD'].'</option>';
        }
    

