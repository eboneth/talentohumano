<?php
    include '../Modelo/conexion.php';

    $id = $_POST['id'];
    $fecha = $_POST['fecha'];
   
    $tp_sol = $_POST['tipo'];
    $det_sol = $_POST['detalle'];
    $mot_sol = $_POST['motivo'];
    $otros = $_POST['otros'];
    $observaciones = $_POST['obs'];
    
    $conexion = new Conexion();
    $conexion ->conectar();
    
    $resul = false;
    $resul = $conexion -> insertarSolicitud($id, $fecha, 1, $tp_sol, $det_sol, $mot_sol, $otros, $observaciones);     
    $conexion ->cerrar();
  
 
    echo json_encode(array("isTrue"=>$resul));    
    
                                 
                                 
                                 
    
    
    
    
?>

