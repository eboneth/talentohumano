<?php
session_start();

if(isset($_SESSION['empleado'])){
    
    $usuario = $_SESSION['empleado'];
    
     include_once '../Modelo/conexion.php';
                        $mostrar = new Conexion();
                        $mostrar -> conectar();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Direccion de Talento Humano</title>

        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <link rel="stylesheet" type="text/css" href="css/dataTables.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <script src="js/operaciones.js"></script>
        <script src="js/dataTables.js"></script>
        
        <script type="text/javascript">
            $(document).ready(function(){
               $('#tblSolicitud').DataTable(); 
            });
        </script>
        
    </head>
    <body>
        <div class="cabecera">
            <div class="container">
                <div>
                    <img src="img/cabecera.png" class="img-responsive"/>
                </div>
            </div>
            <div>
                <img src="img/division2.jpg" id="division"/>
            </div>
        </div>
        <div class="container-fluid">
            <div class="navbar-header">
                <p class="navbar-text navbar-right">Bienvenido <?php echo $usuario->nombres;?> <a href="../Controlador/cerrar.php" class="navbar-link">Cerrar Sesion</a></p>
            </div>
        </div>

        <div class="container cuerpo">
            <div class="col-md-7">
           <table id="tblSolicitud" class="table table-sm">
                <thead>
                    <tr class="success">
                        <th></th>
                        <th>#</th>
                        <th>Cedula</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Opci&oacute;n</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                       
                        $mostrar -> mostrarSolicitudes();
                        $mostrar -> cerrar();
                    ?>
                </tbody>
            </table>
            </div>
            <div class="col-md-5">
                <div class="panel panel-success">
                  <!-- Default panel contents -->
                  <div class="panel-heading">Solicitudes del empleado</div>
                
                  <!-- Table -->
                    <table id="tabTIpoDetalle" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>IDSolicitud</th>
                                <th>Fecha</th>
                                <th>Tipo</th>
                                <th>Motivo</th>
                                <th>Observación</th>
                                <th>Ver Detalles</th>
                                
                                
                            </tr>
                            </thead>
                            <tbody id="tipSolicitud">
                                
                                
                            </tbody>
                            
                            
                    </table>
                </div>
            </div>
        </div>

        <div class="footer">
            <div><img src="img/division2.jpg" id="division"/></div>
            <div class="container">
               

            </div>
        </div>
</html>

<?php
}else{
    echo 'Lo siento debes registrarte';
    echo '<a href="../index.php">Regresar a la pagina Inicio</a>';
}
?>
