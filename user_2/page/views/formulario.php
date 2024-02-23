<?php
include '../controllers/usuariosController.php';

$anio = $_POST['anio'];
$mes = $_POST['mes'];

usuariosController($anio,$mes);


?>