$('document').ready(function() {

    $('#btnRegistrar').hide();
    $('#divIniciarSesion').hide();

    //CUANDO EL DOCUMENTO ESTE LISTO ME CAPTURA LA FECHA

    function obtenerFecha() {

        var fecha = new Date();

        var dia = fecha.getDate();
        var mes = fecha.getMonth() + 1;
        var anio = fecha.getFullYear();

        if (dia < 10) {
            dia = '0' + dia;
        }

        if (mes < 10) {
            mes = '0' + mes;
        }

        var fec = anio + "-" + mes + "-" + dia;
        return fec;

    }
            
    // BOton VER TIPOS DE SOLICITUD
    $("#tabTIpoDetalle").on("click", ".verTipos", function(){
     
      var tr = $(this).closest("tr");
        var id = tr.children().first().next().val();
        alert(id);

         var ajax = $.ajax({
            type: "POST",
            url: "../../Controlador/enviarSolicitud.php",
            data: {
                "id": id
            },
            dataType: "json", //aqui se convierte automaticamente a json
            beforeSend: function() {

            },
            error: function(xhr, textStatus, errorThrown) {
                console.log("error");
                console.log(errorThrown);
                console.log(xhr);
                console.log(textStatus);

                $("#mensaje").children().remove();
                $("#mensaje").attr("class", "alert-danger");
                $("#mensaje").attr("role", "alert");
                $("#mensaje").append("<p style='text-align:center;'><strong>Error </<strong></p>");
            }

        });
                
    });

    ////enviar solicitud
    $('#btnEnviarSol').on("click", function() {

        var id_trabajador = $('#idTrabajador').val(); //identificacion del trabajador
        var tp_sol = $('#tp_solicitud option:selected').val(); //tipo-solicitud
        var motivo_sol = $('#m_solicitud').val();
        var otros = null;
        var observaciones = $('#observaciones').val();
        var detail = [];
        var fecha = obtenerFecha();

        if (id_trabajador == "") {
            alert("Para hacer la solicitud debes ingresar tu numero de Cédula");
        }
        else {
            // esta es la funcion para recorrer los checkbox
            $('input:checkbox:checked').each(function() {
                //alert($(this).val());
                if ($(this).val() == 4) {

                    otros = $('#otros').val();
                }
                detail.push($(this).val());

            });

        }

        console.log(id_trabajador, tp_sol, motivo_sol, otros, observaciones, detail, fecha);
        var ajax = $.ajax({
            type: "POST",
            url: "../../Controlador/enviarSolicitud.php",
            data: {
                "id": id_trabajador,
                "fecha": fecha,
                "tipo": tp_sol,
                "motivo": motivo_sol,
                "detalle": detail,
                "otros": otros,
                "obs": observaciones
            },
            dataType: "json", //aqui se convierte automaticamente a json
            beforeSend: function() {

            },
            error: function(xhr, textStatus, errorThrown) {
                console.log("error");
                console.log(errorThrown);
                console.log(xhr);
                console.log(textStatus);

                $("#mensaje").children().remove();
                $("#mensaje").attr("class", "alert-danger");
                $("#mensaje").attr("role", "alert");
                $("#mensaje").append("<p style='text-align:center;'><strong>Error </<strong></p>");
            }

        });
        ajax.done(function(data) {

            console.log(data);
            if (data.isTrue) {
                setTimeout(function() {
                    window.location = "../index.php";;
                }, 4000);
                swal("Te solicitud se ha enviado con exito!", "...", "success");
                //alert("Solicitud Exitosa!");

            }
            else {

                alert("Error Contacte al administrador");

            }

        });





    });

    //busca y muestra los datos del trabajador
    $('#btnBuscar').click(function() {
        $("#idTrabajador").val("0");
        $("#tp_vinculacion").val("");
        $("#primer_Apellido").val("");
        $("#segundo_Apellido").val("");
        $("#nombre_usuario").val("");
        $("#direccion_usuario").val("");
        $("#telefono_usuario").val("");
        $("#correo_electronico").val("");

        cedula = $("#id_usuario").val();
        if (cedula == "") {
            $('#mensaje').html("Debes ingresar un numero de cédula..!");
            $("#mensaje").attr("class", "alert-danger");
        }
        else {
            var ajax = $.ajax({
                type: "POST",
                url: "../../Controlador/buscar.php",
                data: {
                    "id": cedula
                },
                dataType: "json", //aqui se convierte automaticamente a json
                beforeSend: function() {

                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log("error");
                    console.log(errorThrown);
                    console.log(xhr);
                    console.log(textStatus);

                    $("#mensaje").children().remove();
                    $("#mensaje").attr("class", "alert-danger");
                    $("#mensaje").attr("role", "alert");
                    $("#mensaje").append("<p style='text-align:center;'><strong>Error </<strong></p>");
                }

            });

            ajax.done(function(data) {

                if (jQuery.isEmptyObject(data)) {

                    $('#btnRegistrar').show();
                    $('#btnBuscar').hide();
                    //window.location = "Vista/registrar.php"
                    $("#mensaje").html("Ud. no se encuentra en nuestra base de datos... Registrese!");
                    $("#mensaje").attr("class", "alert-danger");

                }
                else {
                    $("#mensaje").html("");
                    $("#idTrabajador").val(data.id);
                    $("#tp_vinculacion").val(data.tvinculacion);
                    $("#primer_Apellido").val(data.apellido);
                    $("#segundo_Apellido").val(data.apellido);
                    $("#nombre_usuario").val(data.nombre);
                    $("#direccion_usuario").val(data.direccion);
                    $("#telefono_usuario").val(data.telefono);
                    $("#correo_electronico").val(data.correo);

                    $('#btnRegistrar').hide();
                    $('#btnBuscar').hide();

                }

            });
        }
    });

    $('#btnEnviar').click(function() {
        //alert($("input[name=estado]:checked").val());

        var identificacion = $('#identificacion').val();
        var pw = $('#password').val();
        var pw2 = $('#password2').val();
        var nombre = $('#nombreempleado').val();
        var apellido = $('#apellidoempleado').val();
        var fecnaci = $('#fechanacimiento').val();
        var telefono = $('#telefono').val();
        var direccion = $('#direccion').val();
        var email = $('#email').val();

        var estado = $("input[name=estado]:checked").val();
        var tpvinculacion = $('#tpVinculacion').val();

        //alert (identificacion + " "+ nombre + " " + estado);

        if (identificacion == "" || pw == "" || pw2 == "" || nombre == "" || apellido == "" || fecnaci == "" || telefono == "" || direccion == "" || email == "" || estado == "" || tpvinculacion == 0) {
            alert("no deben haber campos vacios");
        }
        else {
            if (pw !== pw2) {
                alert("las contraseñas no coinciden");
            }
            else {
                //alert(pw + " = "+ pw2);
                var ajax = $.ajax({
                    type: "POST",
                    url: "../../Controlador/registrarEmpleado.php",
                    data: {
                        "id": identificacion,
                        "password": pw,
                        "nombre": nombre,
                        "apellido": apellido,
                        "fnacimiento": fecnaci,
                        "telefono": telefono,
                        "direccion": direccion,
                        "email": email,
                        "estado": estado,
                        "tpvinculacion": tpvinculacion
                    },
                    dataType: "json", //aqui se convierte automaticamente a json
                    beforeSend: function() {},
                    error: function(xhr, textStatus, errorThrown) {
                        console.log("error");
                        console.log(errorThrown);
                        console.log(xhr);
                        console.log(textStatus);

                        $("#mensaje").children().remove();
                        $("#mensaje").attr("class", "alert-danger");
                        $("#mensaje").attr("role", "alert");
                        $("#mensaje").append("<p style='text-align:center;'><strong>Error </<strong></p>");
                    }

                });
                ajax.done(function(data) {

                    console.log(data);
                    if (data.isTrue) {

                        swal("Te has registrado con exito!", "ya puedes proceder a solicitar tu certificacion", "success");

                        setTimeout(function() {
                            window.location = "solicitud_certificado.php";
                        }, 3000);
                        //alert("Solicitud Exitosa!");



                    }
                    else {

                        alert("Error Contacte al administrador");

                    }

                });
            }
        }

    });


    $('#btnIniciarSesion').click(function() {
        $('#btnIniciarSesion').hide();
        $('#divIniciarSesion').show();

        $('#entrar').click(function() {
            //alert("YUjuuuuuu")
            var usuario = $('#usuario').val();
            var contrasena = $('#contrasena').val();
            var rol = $('#rol').val();

            if (usuario == "" || contrasena == "") {
                alert("Los campos no deben estar vacios!");
            }
            else {

                var ajax = $.ajax({
                    type: "POST",
                    url: "../Controlador/login.php",
                    data: {
                        "usuario": usuario,
                        "contrasena": contrasena,
                        "rol": rol
                    },
                    dataType: "json", //aqui se convierte automaticamente a json
                    beforeSend: function() {

                    },
                    error: function(xhr, textStatus, errorThrown) {
                        console.log("error");
                        console.log(errorThrown);
                        console.log(xhr);
                        console.log(textStatus);

                        $("#iniciaSesion").children().remove();
                        $("#iniciaSesion").attr("class", "alert-danger");
                        $("#iniciaSesion").attr("role", "alert");
                        $("#iniciaSesion").append("<p style='text-align:center;'><strong>Error </<strong></p>");
                    }

                });

                ajax.done(function(data) {
                    console.log(data);

                    if (jQuery.isEmptyObject(data)) {
                        $("#iniciaSesion").html("No Existe");
                        $("#iniciaSesion").attr("class", "alert-danger");

                    }
                    else {
                        if (data.idrol == 1) {
                            window.location = "Vista/panelAdmin.php";
                        }
                        else {
                            if (data.idrol == 2) {
                                window.location = "Vista/panelSecretaria.php";
                            }
                            else {
                                alert("Hola Mundo");
                            }
                        }
                    }

                });
            }

        });
    });
    //FUNCION PARA AGREGAR NOTICIA
    $('#btnNoticia').click(function() {
        
        var fecha = $('#fechaN').val();
        var titulo = $('#tituloN').val();
        var noticia = $('#noticiaN').val();
        
        if (fecha == "" || titulo == "" || noticia == "") {
            alert("no deben haber campos vacios");
        }
        else {
            
            var ajax = $.ajax({
                type: "POST",
                url: "../Controlador/noticias.php",
                data: {
                    "fecha": fecha,
                    "titulo": titulo,
                    "noticia": noticia
                },
                dataType: "json", //aqui se convierte automaticamente a json
                beforeSend: function() {

                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log("error");
                    console.log(errorThrown);
                    console.log(xhr);
                    console.log(textStatus);

                    $("#iniciaSesion").children().remove();
                    $("#iniciaSesion").attr("class", "alert-danger");
                    $("#iniciaSesion").attr("role", "alert");
                    $("#iniciaSesion").append("<p style='text-align:center;'><strong>Error </<strong></p>");
                }

            });

            ajax.done(function(data) {
                console.log(data);
                if (data.isTrue) {
                    swal("Se ha ingresado la noticia con exito","", "success");
                }
                else {
                    alert("Error Contacte al administrador");
                }

            });
        }
    });
    
    //FUNCION PARA CREAR UN EVENTO
    $('#btnEvento').click(function() {
        
        var dia = $('#diaE').val();
        var hora = $('#horaE').val();
        var evento = $('#eventoE').val();
        var lugar = $('#lugarE').val();
        
        alert(dia+" "+hora+" "+evento+" "+lugar);
        
        if (dia == "" || hora == "" || evento == "" || lugar == "") {
            alert("no deben haber campos vacios");
        }
        else {
            
            var ajax = $.ajax({
                type: "POST",
                url: "../Controlador/evento.php",
                data: {
                    "dia": dia,
                    "hora": hora,
                    "evento": evento,
                    "lugar": lugar
                },
                dataType: "json", //aqui se convierte automaticamente a json
                beforeSend: function() {

                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log("error");
                    console.log(errorThrown);
                    console.log(xhr);
                    console.log(textStatus);

                    $("#iniciaSesion").children().remove();
                    $("#iniciaSesion").attr("class", "alert-danger");
                    $("#iniciaSesion").attr("role", "alert");
                    $("#iniciaSesion").append("<p style='text-align:center;'><strong>Error </<strong></p>");
                }

            });

            ajax.done(function(data) {
                console.log(data);
                if (data.isTrue) {
                    swal("Se ha ingresado un evento con exito","", "success");
                }
                else {
                    alert("Error Contacte al administrador");
                }

            });
        }
    });
    
    //CON ESTA FUNCION ACTUALIZA LA NOTICIA
    $('#tblNoticia').on("click",".borrarNoticia" ,function() {
        
        
        var tr = $(this).closest("tr");
        var id = tr.children().first().next().val();
        
        var ajax = $.ajax({
                type: "POST",
                url: "../Controlador/eliminaNoticia.php",
                data: {
                    "id": id
                },
                dataType: "json", //aqui se convierte automaticamente a json
                beforeSend: function() {

                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log("error");
                    console.log(errorThrown);
                    console.log(xhr);
                    console.log(textStatus);

                    $("#iniciaSesion").children().remove();
                    $("#iniciaSesion").attr("class", "alert-danger");
                    $("#iniciaSesion").attr("role", "alert");
                    $("#iniciaSesion").append("<p style='text-align:center;'><strong>Error </<strong></p>");
                }

            });

            ajax.done(function(data) {
                console.log(data);
                if (data.isTrue) {
                    swal("Se ha Eliminado con exito la noticia con exito","", "success");
                }
                else {
                    alert("Error Contacte al administrador");
                }

            });
        
    });
    
    //CON ESTA FUNCION ACTUALIZA EL EVNTO
    $('#tblEvento').on("click",".borraEvento" ,function() {
        
        
        var tr = $(this).closest("tr");
        var id = tr.children().first().next().val();
        
        alert(id);
        
        var ajax = $.ajax({
                type: "POST",
                url: "../Controlador/eliminaEvento.php",
                data: {
                    "id": id
                },
                dataType: "json", //aqui se convierte automaticamente a json
                beforeSend: function() {

                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log("error");
                    console.log(errorThrown);
                    console.log(xhr);
                    console.log(textStatus);

                    $("#iniciaSesion").children().remove();
                    $("#iniciaSesion").attr("class", "alert-danger");
                    $("#iniciaSesion").attr("role", "alert");
                    $("#iniciaSesion").append("<p style='text-align:center;'><strong>Error </<strong></p>");
                }

            });

            ajax.done(function(data) {
                console.log(data);
                if (data.isTrue) {
                    swal("Se ha Eliminado con exito el evento","", "success");
                }
                else {
                    alert("Error Contacte al administrador");
                }

            });
        
    });


});
