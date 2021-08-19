<?php

class Conexion{
    public function connectDB()
    {
        $server = "localhost/orcl";
        $user = "ESTUDIANTE";
        $pass = "FIDE";

        $conexion = oci_connect($user, $pass, $server); 
        
        if (!$conexion) {    
            $m = oci_error();    
            echo $m['message'], "n";    
            exit; 
        } else {    
             return $conexion;
        } 
    }

    public function disconnectDB($conexion){

        $close = oci_close($conexion);
            
        if($close){
            //echo 'La desconexion de la base de datos se ha hecho satisfactoriamente';
        }else{
            //echo 'Ha sucedido un error inexperado en la desconexion de la base de datos';
        }   
            
        return $close;
    }
}
    
?>