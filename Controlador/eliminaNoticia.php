<?php

    include '../Modelo/conexion.php';

    $idUsuario = $_POST['id'];
    
    $rs = false;
    $noticia = new Conexion();
    $noticia -> conectar();
    $rs = $noticia -> eliminarNoticia($idUsuario);
    $noticia -> cerrar();
    
    echo json_encode(array("isTrue"=>$rs));

?>