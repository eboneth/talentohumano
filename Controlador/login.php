<?php
    session_start();


    include '../Modelo/conexion.php';
    
    $user = $_POST['usuario'];
    $pass = $_POST['contrasena'];
    $rol = $_POST['rol'];
    
    $conexion = new Conexion();
    $conexion -> conectar();
    $resul = $conexion -> loguearse($user, $pass, $rol);
    $conexion ->cerrar();
    
    
    $_SESSION['empleado']= $resul;
    
    echo json_encode($resul);
    
    
?>