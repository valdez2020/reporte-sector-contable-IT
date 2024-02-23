<?php 
require_once '../controllers/usuariosController.php';


function consulta($anio,$mes){
$conexion = mysqli_connect("localhost","root","","db1");
//comprobando la conexión

        if(mysqli_connect_errno()){
            echo "la conexión a la base de datos a fallado".mysqli_connect_error();
        }else{

                $resultadoQuery = mysqli_query($conexion,"
                SELECT
                    CONCAT(resource.firstname, ' ', COALESCE(resource.lastname, '')) AS 'Nombre completo del recurso',
                    work_order.project_id AS 'Nro de proyecto',
                    DATE(work_order.created) AS 'Fecha de la orden de trabajo',
                    task.id AS 'Nro de tarea',
                    task_count.unit_price AS 'Precio unitario de la tarea',
                    task_count.count AS 'Cantidad',
                    task_count.amount AS 'Monto',
                    work_order.id AS 'Nro de orden de trabajo'
                FROM
                    task
                    JOIN work_order ON task.task_status_id = 4
                    JOIN resource ON resource.id = task.resource_id_assigned
                    JOIN task_count ON task_count.task_id = task.id
                WHERE
                    YEAR(work_order.created) = $anio
                        AND MONTH(work_order.created) = $mes
                        AND task_count.amount > (
                                        SELECT AVG(task_count.amount)
                                        FROM task_count)
                            GROUP BY resource.firstname, resource.lastname, YEAR(work_order.created), MONTH(work_order.created), task.id;
                            ");
                            return $resultadoQuery;
    }
}

//Esta función se emplea para pasar la información resultante de la consulta de un tipo OBJECT a un ARRAY ASOCIATIVO
function MostrarDatosUsuarios($objetoUsuarios){
   if($objetoUsuarios){
        while($fila = mysqli_fetch_assoc($objetoUsuarios)){
            $datosUsuarios[] = $fila;
        }
        return $datosUsuarios;
   }else{
        echo "Error en la consulta ".mysqli_error($conexion);
   }

   return $datosUsuarios;
}
?>