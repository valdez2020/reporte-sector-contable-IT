<?php 
require_once '../models/usuarios.php';
$usuarios;
$anio = $_POST['anio'];
$mes = $_POST['mes'];
 function usuariosController($anio,$mes){

    $usuarios = obtenerUsuarios($anio,$mes); //Dirección -> models/usuarios.php    
};

usuariosController($anio,$mes); //dirección -> usuariosController.php


?>