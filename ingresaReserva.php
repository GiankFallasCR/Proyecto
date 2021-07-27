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
      $idDia        = recoge("idDia");
      $idMes       = recoge("idMes");
      $year         = recoge("year");
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

      if ($idDia == "") {
        print "  <p class=\"aviso\">No ha seleccionado el día.</p>\n";
        print "\n";
      } elseif (!is_numeric($idDia)) {
        print "  <p class=\"aviso\">El dato del día no es válido.</p>\n";
        print "\n";
      } elseif ($idDia < 1 || $idDia > 7) {
        print "  <p class=\"aviso\">El día es incorrecto.</p>\n";
        print "\n";
      } else {
        $idDiaOk = true;
      }

      if ($idMes == "") {
        print "  <p class=\"aviso\">No ha seleccionado el mes.</p>\n";
        print "\n";
      } elseif (!is_numeric($idMes)) {
        print "  <p class=\"aviso\">El dato del mes no es válido.</p>\n";
        print "\n";
      } elseif ($idMes < 1 || $idMes > 12) {
        print "  <p class=\"aviso\">El mes es incorrecto.</p>\n";
        print "\n";
      } else {
        $idMesOk = true;
      }


      if ($year == "") {
        print "  <p class=\"aviso\">No ha indicado el año.</p>\n";
        print "\n";
      } elseif ($year != "2021" && $year != "2022") {
        print "  <p class=\"aviso\">Por favor, indique el año de la reservacion.</p>\n";
        print "\n";
      } else {
        $yearOk = true;
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

        $dia = "";
        switch ($idDia) {
          case '1':
            $dia = "lunes";
            break;
          case '2':
            $dia = "martes";
            break;
          case '3':
            $dia = "miercoles";
            break;
          case '4':
            $dia = "jueves";
            break;
          case '5':
            $dia = "viernes";
            break;
          case '6':
            $dia = "sabado";
            break;
          case '7':
            $dia = "domingo";
            break;
          default:
            $dia = "No es válido";
            break;
        }
        print "  <p>El dia seleccionado es <strong>$dia</strong>.</p>\n";
        print "\n";

        $mes = "";
        switch ($idMes) {
          case '1':
            $mes = "enero";
            break;
          case '2':
            $mes  = "febrero";
            break;
          case '3':
            $mes  = "marzo";
            break;
          case '4':
            $mes  = "abril";
            break;
          case '5':
            $mes  = "mayo";
            break;
          case '6':
            $mes  = "junio";
            break;
          case '7':
            $mes = "julio";
            break;
          case '8':
            $mes = "agosto";
            break;
          case '9':
            $mes = "septiembre";
            break;
          case '10':
            $mes = "octubre";
            break;
          case '11':
            $mes = "noviembre";
            break;
          case '12':
            $mes = "diciembre";
            break;
          default:
          $mes  = "No es válido";
            break;
        }
        print "  <p>El mes seleccionado es <strong>$mes</strong>.</p>\n";
        print "\n";

        if ($year == 2021) {
          print "  <p>El año aseleccionado fue <strong>2021</strong>.</p>\n";
        } elseif ($year == 2022) {
          print "  <p>El año aseleccionado fue <strong>2022</strong>.</p>\n";
        } else {
          print "  <p> <strong>NO selecciono el año</strong>.</p>\n";
        }
        print "\n";

        print "  <p>El comentario es <strong>$comentario</strong>.</p>\n";

        //Una vez validados los datos vamos a proceder a insertarlos en base de datos
        echo InsertaDatos($nombrePersona,$apellido1,$apellido2, $cedula, $telefono, $email, $idioma, $idDestino, $idDia, $idMes, $year, $cantidad, $comentario);
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

      function InsertaDatos($pnombrePersona, $pidDestino, $pidDia, $pidMes, $pyear, $pcomentario)
      {
        $response = "";
        $conn = Conecta();
        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO reservacion (ID_FECHA, ID_DESTINO, COD_CLIENTE, ID_CANTIDAD) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("siiis", $inombre, $iDestino, $idia, $imes, $iyear, $ipcomentario);

        // set parameters and execute
        $inombre = $pnombrePersona;
        $iDestino = $pidDestino;
        $idia = $pidDia;
        $imes = $pidMes;
        $iyear = $pyear;
        $ipcomentario= $pcomentario;

        $stmt->execute();

        $response = "Se almaceno la cita satisfactoriamente";

        $stmt->close();
        $conn->close();

        return $response;

      }

      ?>
    </div>
  </div>
</body>
</html>