<?php
    session_start();
    include '../Modelo/conexion.php';
    $usuario = $_SESSION['empleado'];
    
    $id = $usuario->idempleados;
    
    $fecha = $_POST['fecha'];
    $titulo = $_POST['titulo'];
    $noticia = $_POST['noticia'];
    

    $resul = false;
    $conexion = new Conexion();
    $conexion ->conectar();
    $resul = $conexion ->registrarNoticias($fecha,$titulo,$noticia,$id);
    $conexion ->cerrar();

    echo json_encode(array("isTrue"=>$resul));
    
    
    
    
    
?>