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

        <div class="container">

            <div class="panel panel-default registro">
                <div class="panel-heading">DATOS DEL SOLICITANTE</div>
                <div class="panel-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div id="mensaje"></div>
                        <input type="hidden" id="idTrabajador" value="">
                        <div class="form-group col-lg-7 col-md-7 col-sm-7 col-xs-7">
                            <label>Identificacion</label>
                            <input  type="text" id="id_usuario" class="form-control " placeholder="Introduce tu identificacion"/>
                            <div id="btnBuscar"><a class="btn btn-primary" id="buscar">Buscar</a></div>
                            <div id="btnRegistrar"><a type="button" class="btn btn-primary" id="registrar" href="registrar.php">Registrar</a></div>
                        </div>
                    
                        <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-5">
                            <label>Tipo de vinculacion</label>
                            <input disabled type="text" id="tp_vinculacion" class="form-control" value="" placeholder="Tipo de Vinculacion"/>
                        </div>
                       </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class=" form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <label>Apellidos</label>
                            <input disabled type="text" id="primer_Apellido" class="form-control" value="" placeholder="Introduce tu primer Apellido"/>
                        </div>
                        <div class=" form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <label>Nombre</label>
                            <input disabled type="text" id="nombre_usuario" value="" class="form-control" placeholder="Introduce tu nombre completo"/>
                        </div>
                        <div class=" form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <label>Direccion</label>
                            <input disabled type="text" id="direccion_usuario" value="" class="form-control" placeholder="Introduce tu direccion"/>
                        </div>
                        <div class=" form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <label>Telefono</label>
                            <input disabled type="text" id="telefono_usuario" value="" class="form-control" placeholder="Introduce tu Telefono"/>
                        </div>
                        <div class=" form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <label>email</label>
                            <input disabled type="text" id="correo_electronico" value="" class="form-control" placeholder="Introduce tu correo electronico"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">INFORMACION DE LA SOLICITUD</div>
                <div class="panel-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-5">
                            <label>Tipo de solicitud</label>
                            <select id="tp_solicitud" class="form-control ">
                                <option>Escoge tu tipo de solicitud</option>
                                <?php
                                include_once '../Modelo/conexion.php';

                                $mostrar = new Conexion();
                                $mostrar->conectar();
                                $mostrar->solicitud();
                                $mostrar->cerrar();
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <div class=" form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label>Motivo de la solicitud</label>
                            <textarea cols="150" rows="5" id="m_solicitud"></textarea>
                        </div>
                        <div class="panel-heading">DETALLES DE LA SOLICITUD</div>
                        <div class=" form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <label>Tiempo Laborado</label>
                            <input type="checkbox" value="1" id="tiempo_laborado"/>
                        </div>
                        <div class=" form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <label>Salario</label>
                            <input type="checkbox" value="2" id="salario"/>
                        </div>
                        <div class=" form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <label>Funciones</label>
                            <input type="checkbox" value="3" id="funciones"/>
                        </div>
                        <div class=" form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label>Otros <input type="checkbox" value="4" id="funciones"/></label>
                            
                            <textarea cols="150" rows="5" id="otros"></textarea>
                        </div>
                        <div class=" form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label>Observaciones</label>
                            <textarea cols="150" rows="5" id="observaciones"></textarea>
                        </div>
                        <div class=" form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><button id="btnEnviarSol" type="button" class="btn btn-primary">Enviar</button></div>
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
