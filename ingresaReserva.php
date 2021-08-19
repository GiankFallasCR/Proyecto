<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViajiTico<</title>
</head>
<body>
  <!-- The flexible grid (content) -->
  <div class="row">
    
    <div class="main">
      <?php
      function recoge($var, $m = "")
      {
        //isset devolverá FALSE cuando verifique una variable que se haya asignado a NULL
        if (!isset($_REQUEST[$var])) {
          //is_array Encuentra si una variable esta en una matriz.
          $tmp = (is_array($m)) ? [] : "";
        } elseif (!is_array($_REQUEST[$var])) {
          //trim recorta caracteres desde el principio y el final de una cadena
          //htmlspecialchars Convierta caracteres especiales en entidades HTML
          // ENT_COMPAT: predeterminado. Codifica solo comillas dobles
          // ENT_QUOTES - Codifica comillas dobles y simples
          // ENT_NOQUOTES: no codifica ninguna cita
          $tmp = trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"));
        } else {
          $tmp = $_REQUEST[$var];
          // La función array_walk_recursive () ejecuta cada elemento de la matriz en una función 
          //definida por el usuario. Las claves y los valores de la matriz son parámetros en la función. 
          //La diferencia entre esta función y la función array_walk () es que con esta función puede trabajar 
          //con matrices más profundas (una matriz dentro de una matriz).
          /* <?php
      function myfunction($value,$key)
      {
      echo "The key $key has the value $value<br>";
      }
      $a1=array("a"=>"red","b"=>"green");
      $a2=array($a1,"1"=>"blue","2"=>"yellow");
      array_walk_recursive($a2,"myfunction");
      ?> */
          array_walk_recursive($tmp, function (&$valor) {
            $valor = trim(htmlspecialchars($valor, ENT_QUOTES, "UTF-8"));
          });
        }
        return $tmp;
      }

      $nombrePersona = recoge("nombrePersona");
      $apellido1 = recoge("apellido1");
      $apellido2 = recoge("apellido2");
      $cedula = recoge("cedula");
      $telefono = recoge("telefono");
      $email = recoge("email");
      $idioma= recoge("idioma");
      $idDestino   = recoge("idDestino");
      $idFecha = recoge("fecha");
      $cantidad = recoge("cantidad");
      $comentario       = recoge("comentario");

      $nombrePersonaOk  = false;
      $apellido1Ok   = false;
      $apellido2Ok   = false;
      $cedulaOk      = false;
      $telefonoOk    = false;
      $emailOk       = false;
      $idiomaOk      = false;
      $idDestinoOk   = false;
      $idDiaOk       = false;
      $idMesOk       = false;
      $yearOk        = false;
      $comentarioOk  = false;

      if ($nombrePersona == "") {
        print "  <p class=\"aviso\">No ha escrito el nombre del paciente.</p>\n";
        print "\n";
      } else {
        $nombrePersonaOk = true;
      }

      if ($idDestino == "") {
        print "  <p class=\"aviso\">No ha seleccionado al Doctor.</p>\n";
        print "\n";
      } elseif (!is_numeric($idDestino)) {
        print "  <p class=\"aviso\">El dato del Doctor no es válido.</p>\n";
        print "\n";
      } else {
        $idDestinoOk = true;
      }

      if ($idFecha == "") {
        print "  <p class=\"aviso\">No ha seleccionado el día.</p>\n";
        print "\n";
      } elseif (!is_numeric($idFecha)) {
        print "  <p class=\"aviso\">El dato del día no es válido.</p>\n";
        print "\n";
      } else {
        $idFecha = true;
      }

      if ($comentario == "") {
        print "  <p class=\"aviso\">No ha escrito el comentario.</p>\n";
        print "\n";
      } else {
        $cometarioOk = true;
      }

      if ($nombrePersonaOk && $idDestinoOk && $idDiaOk && $mesOk && $yearOk && $comentarioOk) {
        print "  <p>El paciente ingresado es <strong>$nombrePaciente</strong>.</p>\n";
        print "\n";
        $Destino = "";
        switch ($idDestino) {
          case '1':
            $Destino = "Teatro Nacional";
            break;
          case '2':
            $Destino = "Parque Nacional Volcan Irazu";
            break;
          case '3':
            $Destino = "Parque Nacional Manuel Antonio";
            break;
          case '4':
            $Destino = "Parque Nacional Volcán Tenorio";
            break;
          case '5':
            $Destino = "Parque Nacional Tortuguero";
            break;
          default:
            $Destino = "No es válido";
            break;
        }
        print "  <p>El Destino seleccionado es <strong>$Destino</strong>.</p>\n";
        print "\n";

        print "  <p>El comentario es <strong>$comentario</strong>.</p>\n";

        //Una vez validados los datos vamos a proceder a insertarlos en base de datos
        //echo InsertaDatos($nombrePersona,$apellido1,$apellido2, $cedula, $telefono, $email, $idioma, $idDestino, $idDia, $idMes, $year, $cantidad, $comentario);
      }

      // crear conexion con oracle
      function Conecta()
      {
        $conexion = oci_connect("ESTUDIANTE", "FIDE", "localhost/orcl"); 
 
        if (!$conexion) {    
          $m = oci_error();    
          echo $m['message'], "n";    
          exit; 
        } else {    
          echo "Conexión con éxito a Oracle!"; 
          return $conexion;
        } 
      }

      function insertaReserva($pfecha,$pdestino, $pnombre, $papellido1, $papellido2, $pCedula, $pIdioma, $pTelefono, $pEmail, $pCantidad, $pComentario)
    {

        $conexion = Conecta();
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
      ?>

    </div>
  </div>
</body>
</html>