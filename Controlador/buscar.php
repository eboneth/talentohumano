<?php
    include '../Modelo/conexion.php';

    $id_trabajador = $_POST['id'];
    
    $conexion = new Conexion();
    $conexion ->conectar();
    $resul = $conexion->buscarTrabajadores($id_trabajador);
    $conexion ->cerrar();
    echo json_encode($resul);
    

?>
