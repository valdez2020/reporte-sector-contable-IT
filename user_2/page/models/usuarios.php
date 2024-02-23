<?php

require_once 'conexion_bd.php';
require_once '../controllers/usuariosController.php';


    function obtenerUsuarios($anio,$mes){
        if ($anio != null || $dia != null) {
        $objetoUsuarios = consulta($anio,$mes); //esto llama al archivo conexion
        $arrayUsuarios = MostrarDatosUsuarios($objetoUsuarios);
        var_dump($arrayUsuarios);

        $archivo_csv = '../../resultado.csv';
        $gestor = fopen($archivo_csv,'w');
        foreach($arrayUsuarios as $fila){
            fputcsv($gestor,$fila);
        }
        fclose($gestor);
        } else {
            echo "la fecha no es válida";
        }
    }



?>