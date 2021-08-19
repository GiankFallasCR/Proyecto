<?php
    require_once "connection.php";

class Prueba extends Conexion{

    public function muestraReserva()
    {
        
        $conexion = Conexion::connectDB();
        $stid = oci_parse($conexion, 'SELECT * FROM prueba');

        //select * from de la table prueba
        
        oci_execute($stid);

        echo "<table border='1'>\n";
        while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
        echo "<tr>\n";
        foreach ($row as $item) {
            echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "") . "</td>\n";
        }
        echo "</tr>\n";
        }
        echo "</table>\n";
        //fin select * from
        oci_close($conexion); 
    }
    
    /*
    //asigna valor
    $pnombre = 'Juanki';
    $papellido = 'loco';

    //funciona insert de datos de la table Prueba
    function inserta($pnombre, $papellido)
    {

        $conexion = connectDB();
        //insercion preparada Query
        $INSERTAR = oci_parse($conexion, 'INSERT INTO prueba (nombre, apellido) values (:pnombre, :papellido)');

        $nombre = $pnombre;
        $apellido = $papellido;
        oci_bind_by_name($INSERTAR, ':pnombre', $nombre);
        oci_bind_by_name($INSERTAR, ':papellido', $apellido);

        $resultado = oci_execute($INSERTAR); //commit

        //valida que la insercion fue exitosa
        if ($resultado) {
        echo 'Insercion Exitosa';
        }

        oci_free_statement($INSERTAR); //cerrar sesion

        oci_close($conexion); //cerrar conexion

        //fin insersion preparada

    }
    */
}

?>