<?php

include '../Modelo/conexion.php';

$id = $_POST['id'];
$pass = $_POST['password'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fechaNac = $_POST['fnacimiento'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$estado = $_POST['estado'];
$vinculacion = $_POST['tpvinculacion'];


$clave = "GodIsReign";
$encriptar = new Encriptar();
$contrasena = $encriptar ->encriptar_AES($pass,$clave);

$resul = false;
$conexion = new Conexion();
$conexion ->conectar();
$resul = $conexion ->registrarEmpleado($id,$contrasena, $nombre, $apellido, $fechaNac, $telefono, $direccion, $email, $estado, $vinculacion);
$conexion ->cerrar();

echo json_encode(array("isTrue"=>$resul))

                                
?>