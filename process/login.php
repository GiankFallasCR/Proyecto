<?php
    session_start();
    include '../library/configServer.php';
    include '../library/consulSQL.php';

    $nombre=consultasSQL::clean_string($_POST['nombre-login']);
    $clave=consultasSQL::clean_string($_POST['clave-login']);
    $radio=consultasSQL::clean_string($_POST['optionsRadios']);
    if($nombre!="" && $clave!=""){
        if($radio=="option2"){

          $verAdmin=ejecutarSQL::consultar('SELECT * FROM ADMINISTRADOR WHERE NOMBRE = :pNombre AND CLAVE = :pClave');
          $pNombre = $nombre;
          $pClave = $clave;
          oci_bind_by_name($verAdmin, ':pNombre', $pNombre);
          oci_bind_by_name($verAdmin, ':pClave', $pClave);
          oci_execute($verAdmin);
        
        $listaArray  = array(0);
        while (($row = oci_fetch($verAdmin)) != false) {
            $id = oci_result($verAdmin, 'ID');
            $nombre = oci_result($verAdmin, 'NOMBRE'); 
            $clave = oci_result($verAdmin, 'CLAVE');
            $x = array(
                "ID"=>$id, 
                "NOMBRE"=>$nombre, 
                "CLAVE"=>$clave
            );
            array_push($listaArray, $x);
        }

          $AdminC=oci_num_rows($verAdmin);
            if(oci_num_rows($verAdmin)>0){
                $_SESSION['nombreAdmin']=$nombre;
                $_SESSION['claveAdmin']=$clave;
                $_SESSION['UserType']="Admin";
                $_SESSION['adminID']=$id;
                echo '<script> location.href="index.php"; </script>';
            }else{
              echo 'Error nombre o contraseña invalido';
            }
            oci_free_statement($verAdmin);
            oci_close(ejecutarSQL::conectar());
        }
        if($radio=="option1"){
            $verUser=ejecutarSQL::consultar($conexion,"SELECT * FROM cliente WHERE Nombre=:pNombre AND Clave=:pClave");
            oci_bind_by_name($verUser, ':pNombre', $nombre);
            oci_bind_by_name($verUser, ':pClave', $clave);
            oci_execute($verUser);
            $filaU=oci_fetch_array($verUser, OCI_ASSOC + OCI_RETURN_NULLS);
            $UserC=oci_num_rows($verUser);
            if($UserC>0){
                $_SESSION['nombreUser']=$nombre;
                $_SESSION['claveUser']=$clave;
                $_SESSION['UserType']="User";
                $_SESSION['UserNIT']=$filaU['NIT'];
                echo '<script> location.href="index.php"; </script>';
            }else{
                echo 'Error nombre o contraseña invalido';
            }
        }

    }else{
        echo 'Error campo vacío<br>Intente nuevamente';
    }
    
