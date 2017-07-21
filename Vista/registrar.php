<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Direccion de Talento Humano</title>

        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <link rel="stylesheet" type="text/css" href="css/sweetalert.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/operaciones.js"></script>
        
        <script type="text/javascript" src="js/sweetalert.min.js"></script>

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

        


        <div class="container cuerpo">
            <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Registrarse</div>
            <div class="panel-body">
                <div class="col-lg">
                    
                    <form class="form-horizontal">
                        <div class="form-group">
        <label class="control-label col-xs-3">Identificacion:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" id="identificacion" placeholder="Ingrese su identificacion">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">Password:</label>
        <div class="col-xs-9">
            <input type="password" class="form-control" id="password" placeholder="ingrese una contraseña">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">Confirmar Password:</label>
        <div class="col-xs-9">
            <input type="password" class="form-control" id="password2" placeholder="Confirmar Contraseña">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">Nombre:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" id="nombreempleado" placeholder="Nombres">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">Apellido:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" id="apellidoempleado" placeholder="Apellidos">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">F. Nacimiento:</label>
        <div class="col-xs-3">
            <input type="date" class="form-control" id="fechanacimiento"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3" >Telefono:</label>
        <div class="col-xs-9">
            <input type="tel" class="form-control" id="telefono" placeholder="Telefono">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">Dirección:</label>
        <div class="col-xs-9">
            <textarea rows="3" class="form-control" id="direccion" placeholder="Dirección"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3" >Correo Electronico:</label>
        <div class="col-xs-9">
            <input type="email" class="form-control" id="email" placeholder="Ingrese su direccion de correo electronico">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3" >¿Se encuentra Ud. laborando actualmente con nosotros? </label>
        <div class="col-xs-2">
            <label>Si<input type="radio" name="estado" value="1"></label>
        </div>
        <div class="col-xs-2">
            <label>No<input type="radio" name="estado" value="0"></label>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">¿Que vinculacion tienes o tenias con esta entidad?</label>
            <div class="col-xs-9">
                <select id="tpVinculacion" class="form-control ">
                <option value="0">Escoger una..</option>
                <?php
                include_once '../Modelo/conexion.php';

                $mostrar = new Conexion();
                $mostrar->conectar();
                $mostrar->tipoVinculacion();
                $mostrar->cerrar();
                ?>
                </select>
            </div>
    </div>
    <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            <input type="button" id="btnEnviar" class="btn btn-primary" value="Registrar">
            <input type="reset" class="btn btn-default" value="Limpiar">
        </div>
    </div>
</form>
                
                </div>
            </div>
        </div>
            
        </div>
        
        
        
        
        
        
        
        

        <div class="footer">
            <div><img src="img/division2.jpg" id="division"/></div>
            <div class="container">
                <div class="col-lg-4 col-sm-4 col-xs-4 col-md-4">
                    <h3>Contactenos</h3>
                    <address>
                        <strong>DIRECCION DE TALENTO HUMANO</strong><br>
                        Carrera 32 No 22 - 08 | Universidad del Magdalena | Sede Principal<br>
                        Bloque Administrativo<br>
                        PBX: (57 - 5) 4301292 | Ext. 2133 - 3208 - 3419<br>
                        E-mail: talentohumano@unimagdalena.edu.co<br>
                        Santa Marta D.T.C.H - Magdalena, Colombia
                    </address>
                </div>
                <div class="col-lg-4 col-sm-4 col-xs-4 col-md-4">
                    <img src="img/sello.png" class="img-responsive"/>
                </div>
                <div class="col-lg-4 col-sm-4 col-xs-4 col-md-4 contactenos">
                    <h3>Escribenos:</h3>
                    <input class="form-control" type="text" id="nombre" placeholder="Nombre Completo">
                    <input class="form-control" type="email" id="correo" placeholder="Correo Electronico">
                    <textarea rows="4" class="form-control" cols="30" placeholder="Deje su mensaje!"></textarea>
                    <button class="btn btn-primary">Enviar Mensaje</button>

                </div>
            </div>
        </div>

</html>
