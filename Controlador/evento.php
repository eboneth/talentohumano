<?php

    session_start();
    include '../Modelo/conexion.php';
    $usuario = $_SESSION['empleado'];
    
    $id = $usuario->idempleados;
    
    $dia = $_POST['dia'];
    $hora = $_POST['hora'];
    $evento = $_POST['evento'];
    $lugar = $_POST['lugar'];
    
    
    $resul = false;
    $conexion = new Conexion();
    $conexion ->conectar();
    $resul = $conexion -> registraEvento($dia,$hora,$evento,$lugar,$id);
    $conexion ->cerrar();

    echo json_encode(array("isTrue"=>$resul));


?>