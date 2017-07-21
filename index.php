<?php
    session_start();
    session_destroy();
    
    include 'Modelo/conexion.php'
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Direccion de Talento Humano</title>

        <link rel="stylesheet" type="text/css" href="Vista/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="Vista/css/estilo.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <script type="text/javascript" src="Vista/js/operaciones.js"></script>

    </head>
    <body>
        <div class="cabecera">
            <div class="container">
                <div>
                    <img src="Vista/img/cabecera1.png" class="img-responsive"/>
                </div>
            </div>
            <div>
                <img src="Vista/img/division2.jpg" id="division"/>
            </div>
        </div>

        <div class="container cuerpo">
            <!-- INICIA SLIDER -->

            <div class="col-lg-10 col-sm-10 col-xs-12 col-md-12 slider">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="Vista/img/slider/imagen1.jpg">
                        </div>
                        <div class="item">
                            <img src="Vista/img/slider/imagen2.jpg">
                        </div>
                        <div class="item">
                            <img src="Vista/img/slider/imagen3.jpg">
                        </div>
                        <div class="item">
                            <img src="Vista/img/slider/imagen4.jpg">
                        </div>
                    </div>

                    <!-- CONTROL IZQUIERDO Y DERECHO -->
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <!--FIN DEL SLIDER -->

            <!-- OTROS TEMAS DE INTERES --> 
            <div class="col-lg-2 col-sm-2 col-xs-12 col-md-12 bloque_otros">
                <div class="container otros">
                    <div>
                        <div data-toggle="collapse" data-target="#menu1"><img src="Vista/img/simbolos_inst.jpg"/></div>
                        <div id="menu1" class="collapse">
                            <ul>
                                <li><a data-toggle="modal" data-target="#escudo">Escudo</a></li>
                                <li><a data-toggle="modal" data-target="#himno">Himno</a></li>
                                <li><a data-toggle="modal" data-target="#bandera">Bandera</a></li>
                                <li><a data-toggle="modal" data-target="#logo">Logotipo</a></li>
                            </ul>
                        </div>

                        <!-- MODAL ESCUDO -->

                        <div id="escudo" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Escudo</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <label><img src="Vista/img/escudo.jpg"></label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!--FIN MODAL ESCUDO-->

                        <!-- MODAL LOGOTIPO -->

                        <div id="logo" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Logo</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <label><img src="Vista/img/Logo.jpg" width="550"></label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!--FIN MODAL LOGO-->

                        <!-- MODAL HIMNO -->

                        <div id="himno" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Himno</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <p>Letra <strong>Juan de Dios Martinez Pacheco</strong></p>
                                            <p>Musica <strong>Luis Anaya Guerra</strong></p>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                <p><strong>Coro</strong><br>
                                                    Universidad del Magdalena<br>
                                                    Jubiloso cultivar de inteligencia<br>
                                                    Antorcha luminosa en el caribe<br>
                                                    Insignia de investigación y ciencia<br>
                                                </p>
                                                <p><strong>I</strong><br>
                                                    Majestuosa, altiva y procera<br>
                                                    Entre la sierra nevada y el mar<br>
                                                    Y sus prados, cual manos abrazan<br>
                                                    De Bolívar la patria hecha altar<br>
                                                </p>
                                                <p><strong>II</strong><br>
                                                    Sus sabios principios enmarcan<br>
                                                    Unidad, equidad, pertenencia,<br>
                                                    Su misión humanista prospecta<br>
                                                    Formación integral, excelencia.<br>
                                                </p>                                             
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                <p><strong>III</strong><br>
                                                    Por los anhelos de la región Caribe<br>
                                                    Sueña y marcha la universidad,<br>
                                                    Quien traspasa la montaña y no proscribe<br>
                                                    La recompensa a su utopía llegará<br>
                                                </p>
                                                <p><strong>IV</strong><br>
                                                    Muchos años de historia académica<br>
                                                    En la hidalga ciudad de Bastidas<br>
                                                    Sumergidos, cual fénix los yergue,<br>
                                                    La noble proeza de refundación<br>
                                                </p>
                                                <p><strong>V</strong><br>
                                                    Juventud estudiosa que clamas,<br>
                                                    Por justicia, libertad y paz,<br>
                                                    Por la patria, lanzad la proclama<br>
                                                    Que desde el campus se ha de lograr<br>
                                                </p>                                             
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!--FIN MODAL HIMNO-->
                        
                        <!-- MODAL bandera -->

                        <div id="bandera" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Bandera</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <label><img src="Vista/img/Bandera.jpg" width="550"/></label>                                            
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!--FIN MODAL LOGO-->

                    </div>
                    <div>
                        <div data-toggle="collapse" data-target="#menu6"><img src="Vista/img/btn6.jpg"></div>
                        <div id="menu6" class="collapse">
                            <ul>
                                <li><a data-toggle="modal" data-target="#mision">Mision y Vision</a></li>
                                <li><a data-toggle="modal" data-target="#organigrama">Organigrama Institucional</a></li>
                            </ul>
                        </div>

                        <!-- MODAL QUIENES SOMOS -->

                        <div id="mision" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">DIRECCION DE TALENTO HUMANO</h4>
                                    </div>
                                    
                                    <div class="modal-body">
                                        
                                        
                                        <h4>MISION</h4>
                                        <p>
                                           Potencializar el desarrollo del Talento Humano de la Universidad del Magdalena, fortaleciendo la gestión Administrativa e implementando políticas y estrategias que orienten los fines de la misión institucional y la mejora continua, de los servidores públicos y los procesos en cumplimiento de los fines institucionales.
                                        </p><hr>
                                        <h4>VISION</h4>
                                        <p>
                                            Ser reconocidos como líderes institucionales, por lograr que los servidores públicos, desarrollen su potencial humano y la mejora continua en la prestación de los servicios para la satisfacción del usuario y de estrategia institucional
                                        </p>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!--FIN MODAL QUIENES SOMOS-->

                        <!-- MODAL organigrama -->

                        <div id="organigrama" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Organigrama Institucional</h4>
                                    </div>
                                    <div class="modal-body">
                                        <label><img src="Vista/img/organigrama.png" width="550" height="300"/></label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!--FIN MODAL Organigrama-->

                    </div>
                    <div>
                        <div data-toggle="collapse" data-target="#menu2"><a><img src="Vista/img/btn2.jpg"/></a></div>
                        <div id="menu2" class="collapse">
                            <ul>
                                <li><a href="Vista/pdf/plan_de_formacion.pdf" target="_blank">Programa de Capacitación</a></li>
                                <li><a href="Vista/pdf/Estatuto_Docente.pdf" target="_blank">Estatuto Docente</a></li>
                                <li><a href="Vista/pdf/Resolución143de2012-ManualdeFunciones.pdf" target="_blank">Manual de Funciones Administrativas</a></li>
                                <li><a href="Vista/solicitud_certificado.php">Certificados Laborales</a></li>
                                <li><a href="http://bienestar.unimagdalena.edu.co/">Bienestar</a></li>
                                <!--<li>Beneficios Externos</li>
                                <li>Normas de Conducta Interna</li>-->
                            </ul>
                        </div>
                    </div>
                    <div>
                        <div data-toggle="collapse" data-target="#menu3"><img src="Vista/img/btn3.jpg"/></div>
                        <div id="menu3" class="collapse">
                            <ul>
                                <li><a href="http://talentohumano.unimagdalena.edu.co/">Comprobante de Nomina y Capacidad de Endeudamiento</a></li>
                                <li><a href="https://servicio.nuevosoi.com.co/soi/certificadoAportesCotizante.do">Pago Aportes a Seguridad Social</a></li>
                                <li><a href="Vista/construccion.php">Certificados de Ingresos y Retencion</a></li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <div data-toggle="collapse" data-target="#menu4"><a href="Vista/construccion.php"><img src="Vista/img/btn4.jpg"/></a></div>
                        <div id="" class="collapse">
                            <ul>
                                <li>Coppast</li>
                                <li>Plan de Emergencias</li>
                                <li>Comite de Convivencia Laboral</li>
                                <li>Medicina Preventiva</li>
                                <li>Mapa de Riesgos Ocupacionales</li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <a href="http://cogui.unimagdalena.edu.co/"><img src="Vista/img/btn5.png"/></a>
                    </div>
                </div>
            </div>
            <!-- FIN OTROS TEMAS DE INTERES -->

            <div class="col-lg-5 col-sm-5 col-xs-12 col-md-12 eventos">
                <h4>CUMPLEAÑOS</h4>
                <img src="Vista/img/division.jpg" width="300"/>
                <div>
                    <h5>16 Noviembre:  <strong>Rafael Bonett, Jose Francisco Gomez</strong></h5>
                </div>
                <div>
                    <img src="Vista/img/tarjeta_cumpleaños.jpg"></img>
                </div>
                
                
            </div>

            <div class="col-lg-5 col-sm-5 col-xs-12 col-md-12 noticias">
                <h4>EVENTOS </h4>
                <img src="Vista/img/division.jpg" width="300"/>
                <div>
                    <?php
                        $mostrar = new Conexion();
                        $mostrar -> conectar();
                        $mostrar -> pEventos();
                        $mostrar -> cerrar();
                    ?>

                </div>
                <h4>NOTICIAS </h4>
                <img src="Vista/img/division.jpg" width="300"/>
                <div>
                    <p>
                        <h5><strong>30 Noviembre 2016</strong></h5>
                        UNIMAGDALENA Falcons Elite: Campeones del Capital Cheer Colombia
                    </p><hr>
                    <p>
                        <h5><strong>30 Noviembre 2016</strong></h5>
                        Licenciatura en Preescolar recibió visita de pares para Acreditación
                    </p><hr>
                </div>
         </div>

        </div>

        <div class="footer">
            <div><img src="Vista/img/division2.jpg" id="division"/></div>
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
                    <img src="Vista/img/sello.png" class="img-responsive"/>
                </div>
                <div class="col-lg-4 col-sm-4 col-xs-4 col-md-4 contactenos">
                    <h3>Escribenos:</h3>
                    <input class="form-control" type="text" id="nombre" placeholder="Nombre Completo">
                    <input class="form-control" type="email" id="correo" placeholder="Correo Electronico">
                    <textarea rows="4" class="form-control" cols="30" placeholder="Deje su mensaje!"></textarea>
                    <button class="btn btn-primary">Enviar Mensaje</button>

                </div>
            </div>
            
            <!--AQUI ESTA EL LOGIN-->
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" id="btnIniciarSesion">
                <button class="btn btn-primary">Iniciar Sesion</button>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6" id="divIniciarSesion">
                <div class="form-inline">
                  <div class="form-group">
                    <label class="sr-only" for="ejemplo_email_2">Usuario</label>
                    <input type="email" class="form-control" id="usuario" placeholder="Introduce tu identificacion">
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="ejemplo_password_2">Contraseña</label>
                    <input type="password" class="form-control" id="contrasena" placeholder="Introduce Contraseña">
                    <select id="rol" class="form-control">
                        <option value="1">Adm</option>
                        <option value="2">Sec</option>
                        <option value="3">Emp</option>
                    </select>
                  </div>
                  <button type="button" class="btn btn-primary" id="entrar">Entrar</button>
                </div>
                <div id="iniciaSesion"></div>
            </div>
        </div>





</html>
