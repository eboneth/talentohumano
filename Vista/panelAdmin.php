<?php
session_start();

if(isset($_SESSION['empleado'])){
    
    $usuario = $_SESSION['empleado'];

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Direccion de Talento Humano</title>

        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        
        
        <link rel="stylesheet" type="text/css" href="css/dataTables.css">
        <link rel="stylesheet" type="text/css" href="css/sweetalert.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        
        <script type="text/javascript" src="js/operaciones.js"></script>
        <script type="text/javascript" src="js/sweetalert.min.js"></script>
        <script src="js/dataTables.js"></script>

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
           
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>NOTICIAS</h4>
                            <a data-toggle="modal" data-target="#noticia"><span class="glyphicon glyphicon-plus"></span> Agregar</a>
                        </div>
                        
                        <div class="modal fade" id="noticia" role="dialog">
                            <div class="modal-dialog">
    
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Nueva Noticia</h4>
                                </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="fechaN">Fecha:</label>
                                    <input type="date" class="form-control" value="" id="fechaN"/>
                                </div>
                                <div class="form-group">
                                    <label for="tituloN">Titulo</label>
                                    <input type="text" id="tituloN" value="" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="noticia">Noticia</label>
                                    <textarea id="noticiaN" class="form-control" rows="5" ></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="btnNoticia" class="btn btn-primary" data-dismiss="modal">Agregar</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                    </div>
                </div>
            </div>
                        
                        <div class="panel-body">
                            <table class="table table-hover" id="tblNoticia">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fecha</th>
                                        <th>Titulo</th>
                                        <th>Descripcion</th>
                                        <th colspan="2">Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    include_once '../Modelo/conexion.php';
                                    $conexion = new Conexion();
                                    $conexion -> conectar();
                                    $conexion -> mostrarNoticias();
                                    $conexion -> cerrar();
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>EVENTOS</h4>
                            <a data-toggle="modal" data-target="#evento"><span class="glyphicon glyphicon-plus"></span> Agregar</a>
                        </div>
                        
                        <div class="modal fade" id="evento" role="dialog">
                            <div class="modal-dialog">
    
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Nuevo Evento</h4>
                                </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="diaE">Fecha: </label>
                                    <input type="date" class="form-control" id="diaE"/>
                                    <label for="horaE">Hora: </label>
                                    <input type="time" class="form-control" id="horaE"/>
                                </div>
                                <div class="form-group">
                                    <label for="eventoE">Evento: </label>
                                    <input type="text" class="form-control" id="eventoE"/>
                                    <label for="lugarE">Lugar: </label>
                                    <input type="text" class="form-control" id="lugarE"/>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="btnEvento" class="btn btn-primary" data-dismiss="modal">Agregar</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                    </div>
                </div>
            </div>
                        
                        
                        
                        
                        <div class="panel-body">
                            <table class="table table-hover" id="tblEvento">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Titulo</th>
                                    <th>Lugar</th>
                                    <th colspan="2">Accion</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $eventos = new Conexion();
                                    $eventos -> conectar();
                                    $eventos -> mostrarEventos();
                                    $eventos -> cerrar();  
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
