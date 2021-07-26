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
      $apellido2 = recoge("apellido2");
      $idDestino   = recoge("idDestino");
      $idDia        = recoge("idDia");
      $idMes       = recoge("idMes");
      $year         = recoge("year");
      $cantidad = recoge("cantidad");
      $comentario       = recoge("comentario");

      $nombrePersonaOk  = false;
      $apellido1Ok  = false;
      $apellido2Ok  = false;
      $idDestinoOk    = false;
      $idDiaOk         = false;
      $idMesOk          = false;
      $yearOk          = false;
      $comentarioOk        = false;

      if ($nombrePersona == "") {
        print "  <p class=\"aviso\">No ha escrito el nombre del paciente.</p>\n";
        print "\n";
      } else {
        $nombrePersonaOk = true;
      }

      if ($idDestino == "") {
        print "  <p class=\"aviso\">No ha seleccionado al Doctor.</p>\n";
        print "\n";
      } elseif (!is_numeric($idDoctor)) {
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
      } elseif ($idDia < 1 || $idDia > 5) {
        print "  <p class=\"aviso\">El día es incorrecto.</p>\n";
        print "\n";
      } else {
        $idDiaOk = true;
      }

      if ($hora == "") {
        print "  <p class=\"aviso\">No ha indicado la hora.</p>\n";
        print "\n";
      } elseif ($hora != "10" && $hora != "12" && $hora != "16" && $hora != "18") {
        print "  <p class=\"aviso\">Por favor, indique la hora de la cita.</p>\n";
        print "\n";
      } else {
        $horaOk = true;
      }

      if ($padecimiento == "") {
        print "  <p class=\"aviso\">No ha escrito el padecimiento.</p>\n";
        print "\n";
      } else {
        $padecimientoOk = true;
      }

      if ($nombrePacienteOk && $idDoctorOk && $idDiaOk && $horaOk && $padecimientoOk) {
        print "  <p>El paciente ingresado es <strong>$nombrePaciente</strong>.</p>\n";
        print "\n";
        $Doctor = "";
        switch ($idDoctor) {
          case '1':
            $Doctor = "Eduardo González Paniagua";
            break;
          case '2':
            $Doctor = "Armenia Monge Soto";
            break;
          case '3':
            $Doctor = "Cleimer Solis Vargas";
            break;
          case '4':
            $Doctor = "Andrea Rodriguez Vargas";
            break;
          case '5':
            $Doctor = "José Angel Cedeño Nuñez";
            break;
          default:
            $Doctor = "No es válido";
            break;
        }
        print "  <p>El Doctor seleccionado es <strong>$Doctor</strong>.</p>\n";
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
          default:
            $dia = "No es válido";
            break;
        }
        print "  <p>El dia seleccionado es <strong>$dia</strong>.</p>\n";
        print "\n";

        if ($hora == 10) {
          print "  <p>La hora seleccionada fue <strong>10</strong>.</p>\n";
        } elseif ($hora == 12) {
          print "  <p>La hora seleccionada fue <strong>12</strong>.</p>\n";
        } elseif ($hora == 16) {
          print "  <p>La hora seleccionada fue <strong>16</strong>.</p>\n";
        } elseif ($hora == 18) {
          print "  <p>La hora seleccionada fue <strong>18</strong>.</p>\n";
        } else {
          print "  <p> <strong>NO selecciono la hora</strong>.</p>\n";
        }
        print "\n";

        print "  <p>El padecimiento a tratar es <strong>$padecimiento</strong>.</p>\n";

        //Una vez validados los datos vamos a proceder a insertarlos en base de datos
        echo InsertaDatos($nombrePaciente, $idDoctor, $idDia, $hora, $padecimiento);
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

      function InsertaDatos($pnombrePaciente, $pidDoctor, $pidDia, $phora, $ppadecimiento)
      {
        $response = "";
        $conn = Conecta();
        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO citaMedica (paciente, idDoctor, idDia, hora, padecimiento) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("siiis", $inombre, $iDoctor, $idia, $ihora, $ipadecimiento);

        // set parameters and execute
        $inombre = $pnombrePaciente;
        $iDoctor = $pidDoctor;
        $idia = $pidDia;
        $ihora = $phora;
        $ipadecimiento = $ppadecimiento;

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