<?php
    require_once "connection.php";

class Rerseva extends Conexion{

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
    
    
    //asigna valor
    //$pnombre = 'Juanki';
    //$papellido = 'loco';

    //funcion insert de datos en el package PACK_INSERT 
    public function insertaReserva($pfecha,$pdestino, $pnombre, $papellido1, $papellido2, $pCedula, $pIdioma, $pTelefono, $pEmail, $pCantidad, $pComentario)
    {

        $conexion = Conexion::connectDB();
        //insercion preparada Query
        $INSERTAR = oci_parse($conexion, 
        'EXECUTE PACK_INSERT.P_INSERT_RESERVA (to_date(:pFecha), :pDestino, :pNombre, :pApellido1, :pApellido2, :pCedula, :pIdioma, :pTelefono, :pEmail, :pCantidad, :pComentario)'
        );
        $fecha = $pfecha;
        $destino = $pdestino;
        $nombre = $pnombre;
        $apellido1 = $papellido1;
        $apellido2 = $papellido2;
        $cedula = $pCedula;
        $idioma = $pIdioma;
        $telefono = $pTelefono;
        $email = $pEmail;
        $cantidad = $pCantidad;
        $comentario = $pComentario;
        oci_bind_by_name($INSERTAR, ':pFecha', $fecha);
        oci_bind_by_name($INSERTAR, ':pDestino', $destino);
        oci_bind_by_name($INSERTAR, ':pNombre', $nombre);
        oci_bind_by_name($INSERTAR, ':pApellido1', $apellido1);
        oci_bind_by_name($INSERTAR, ':pApellido2', $apellido2);
        oci_bind_by_name($INSERTAR, ':pCedula', $cedula);
        oci_bind_by_name($INSERTAR, ':pIdioma', $idioma);
        oci_bind_by_name($INSERTAR, ':pTelefono', $telefono);
        oci_bind_by_name($INSERTAR, ':pEmail', $email);
        oci_bind_by_name($INSERTAR, ':pCantidad', $cantidad);
        oci_bind_by_name($INSERTAR, ':pComentario', $comentario);


        $resultado = oci_execute($INSERTAR); //commit

        //valida que la insercion fue exitosa
        if ($resultado) {
        echo 'Insercion Exitosa';
        }

        oci_free_statement($INSERTAR); //cerrar sesion

        oci_close($conexion); //cerrar conexion

        //fin insersion preparada

    }
}

?>