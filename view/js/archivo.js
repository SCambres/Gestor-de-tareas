$(document).ready(function () {

    //FUNCION LOGIN
    $("#enviar").click(function () {
        var email = $('#email').val();
        var password = $('#password').val();

        if (email === "") {
            $('#errorEmail').text('Campo requerido');
            return false;
        } else {
            $('#errorEmail').empty();
        }

        if (password === "") {
            $('#errorPassword').text('Campo requerido');
            return false;
        } else {
            $('#errorPassword').empty();
        }
        $.ajax({
            type: 'POST',
            url: '/controller/ajax/LoginAjax.php',
            data: {email: email, password: password},
            success: function (data) {
                if (data) {

                    window.location.assign('/wellcome/');
                } else {
                    alert('Email o contraseña incorrectos');
                }
            },
            error: function () {
                alert('Fallo en la llamada a Ajax');
            }
        });
    });
    //EVENTO ASOCIADO EL ENTER DEL TECLADO
    $('#password, #email').keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            $("#enviar").click();

        }
    });
    //REGISTRO USUARIO COTROLANDO CONFIRMACION DE PASSWORD Y CAMPOS REQUERIDOS--EVENTO PARA EL ENTER DEL TECLADO
    $(document).on('keypress',function(e) {
        if(e.which == 13) {
            $('#guardarRegistro').click();
        }
    });

    //FUNCION PARA REGISTRAR NUEVO USUARIO CONTROLANDO QUE NO HAYA CAMPOS VACIOS Y DEVOLVIENDO CONTROL DE ERRORES
    $("#guardarRegistro").click(function(){
        var formData = new FormData();
        var Name = $('#Name').val();
        var Email = $('#Email').val();
        var Password = $('#Password').val();
        var ConfirmPassword = $('#ConfirmPassword').val();
        var files = $('#fileToUpload')[0].files[0];

        formData.append('Name', Name);
        formData.append('Email', Email);
        formData.append('Password', Password);
        formData.append('ConfirmPassword', ConfirmPassword);
        formData.append('file', files);

        if (Name === "") {
            $('#errorName').text('Campo requerido');
            return false;
        } else {
            $('#errorName').empty();
        }

        if (Email === "") {
            $('#errorEmail').text('Campo requerido');
            return false;
        } else {
            $('#errorEmail').empty();
        }

        if (Password === "") {
            $('#errorPassword').text('Campo requerido');
            return false;
        } else {
            $('#errorPassword').empty();
        }

        if (ConfirmPassword === "") {
            $('#errorConfirmPassword').text('Campo requerido');
            return false;
        } else {
            $('#errorConfirmPassword').empty();
        }

        if (Password !== ConfirmPassword) {
            alert('La contraseña de verificación no coincide');
            return false;
        }

        $.ajax({
            type: 'POST',
            url: '/controller/ajax/RegistroAjax.php',
            data: formData,
            processData: false,
            contentType: false,
            //CONTROL DE ERRORES RECOGIENDO LO QUE NOS VIENE POR EL DATA DEL PHP
            success: function (data){
                if (data == "EmailExist"){
                    console.log(data);
                    alert('Ese email ya esta registrado');

                } if (data == "errorFile") {
                    console.log(data);
                    alert('Error al cargar la imagen');
                } if (data == "InvalidFile") {
                    console.log(data);
                    alert('Formato de imagen incorrecto');
                } else {
                    console.log(data);
                    alert('Usuario registrado correctamente');
                    window.location.assign('/login/');
                }
            },
            error: function (){
                alert('Fallo en la llamada a Ajax');
            }
        });
    });

    //FUNCION PARA MODIFICAR EL NOMBRE DEL PERFIL DE USUARIO
    $('#modificarName').click(function (){
        var Name = $('#name').val();
        var Id = $('#name').data('id');

        $.ajax({
            type: 'POST',
            url: '/controller/ajax/EditarusuarioAjax.php',
            data: {Name: Name, Id: Id},

            success: function(response) {
                alert("Nombre actualizado correctamente")
                location.reload();
            },
            error: function() {
                alert('Fallo en la llamada a Ajax');
            }
        });
    })

    //FUNCION PARA MODIFICAR EL EMAIL DEL PERFIL DE USUARIO
    $('#modificarEmail').click(function (){
        var Email = $('#email').val();
        var Id = $('#email').data('id');
        // console.log(Id);
        $.ajax({
            type: 'POST',
            url: '/controller/ajax/EditarusuarioAjax.php',
            data: {Email: Email, Id: Id},

            success: function(response) {
                alert("Email actualizado correctamente")
                location.reload();
            },
            error: function() {
                alert('Fallo en la llamada a Ajax');
            }
        });
    })
    //MODIFICAR IMAGEN NO FUNCIONA, ABORDARLO EN OTRO MOMENTO
    // $('#modificarImagen').click(function (){
    //     var Id = $('#email').data('id');
    //     var ImageBorrar = $("#imagePerfil").attr("src").split("/").pop();
    //     $('#f_subir').click();
    //     console.log(ImageBorrar);
    //     console.log(Id);
    //     $.ajax({
    //         type: 'POST',
    //         url: '/controller/ajax/EditarusuarioAjax.php',
    //         data: {Id: Id, Image: ImageBorrar},
    //
    //         success: function(response) {
    //             alert(" correctamente")
    //             // location.reload();
    //         },
    //         error: function() {
    //             alert('Fallo en la llamada a Ajax');
    //         }
    //     });
    // })
    //EL BOTON APARECE CUANDO SE INTRODUCE INFORMACION
    $('.input-save').each(function() {
        var $input = $(this);
        var $button = $input.next('.btn-save');

        $input.on('input', function() {
            $button.show();
        });

        $button.on('click', function() {
            $button.hide();
        });
    });

    //EVENTO CHANGE PARA EL SELECT DE ESTADOS, CAMBIAR LA TAREA DE ESTADO Y SE ACTUALICE EN LA VISTA
    $('.nuevoEstado').change(function() {
        var estado = $(this).val();
        var idTarea = $(this).data('id');

        $.ajax({
            type: 'POST',
            url: '/controller/ajax/CambiarestadotareaAjax.php',
            data: {estado: estado, idTarea: idTarea},

            success: function(response) {
                location.reload();
            },
            error: function() {
                alert('Fallo en la llamada a Ajax');
            }
        });
    });

    $("#crearTarea").click(function(){
        var formData = new FormData();
        var NameTarea = $('#NameTarea').val();
        var Descripcion = $('#Descripcion').val();
        var FechaInicio = $('#FechaComienzo').val();
        var FechaFinal = $('#FechaFinalizacion').val();
        var ProyectoSeleccionado = $('#ProyectoId').val();

        formData.append('NameTarea', NameTarea);
        formData.append('Descripcion', Descripcion);
        formData.append('FechaInicio', FechaInicio);
        formData.append('FechaFinal', FechaFinal);
        formData.append('NumeroProyecto', ProyectoSeleccionado);
        // formData.append('UserId', UserId);

        if (NameTarea === "") {
            $('#errorNameTarea').text('Campo requerido');
            return false;
        } else {
            $('#errorNameTarea').empty();
        }

        if (Descripcion === "") {
            $('#errorDescripcion').text('Campo requerido');
            return false;
        } else {
            $('#errorDescripcion').empty();
        }

        if (FechaInicio === "") {
            $('#errorComienzo').text('Campo requerido');
            return false;
        } else {
            $('#errorComienzo').empty();
        }

        if (FechaFinal === "") {
            $('#errorFinalizacion').text('Campo requerido');
            return false;
        } else {
            $('#errorFinalizacion').empty();
        }

        $.ajax({
            type: 'POST',
            url: '/controller/ajax/CreartareaAjax.php',
            data: formData,
            processData: false,
            contentType: false,
            //CONTROL DE ERRORES RECOGIENDO LO QUE NOS VIENE POR EL DATA DEL PHP
            success: function (data) {
                if (data) {
                    alert("Tarea introducida con exito");
                    window.location.assign('/wellcome/');
                } else {
                    alert('Problema al introducir la tarea');
                }
            },
            error: function () {
                alert('Fallo en la llamada a Ajax');
            }
        });
    });

    //ASIGNAR TAREA POR USUARIO ADMINISTRADOR
    $("#asignarTarea").click(function(){
        var formData = new FormData();

        var NameTarea = $('#NameTarea').val();
        var Descripcion = $('#Descripcion').val();
        var FechaInicio = $('#FechaComienzo').val();
        var FechaFinal = $('#FechaFinalizacion').val();
        var ProyectoSeleccionado = $('#ProyectoId').val();
        var UsuarioSeleccionado = $('#UserId').val();

        formData.append('NameTarea', NameTarea);
        formData.append('Descripcion', Descripcion);
        formData.append('FechaInicio', FechaInicio);
        formData.append('FechaFinal', FechaFinal);
        formData.append('NumeroProyecto', ProyectoSeleccionado);
        formData.append('NumeroUsuario', UsuarioSeleccionado);
        // formData.append('UserId', UserId);

        if (NameTarea === "") {
            $('#errorNameTarea').text('Campo requerido');
            return false;
        } else {
            $('#errorNameTarea').empty();
        }

        if (Descripcion === "") {
            $('#errorDescripcion').text('Campo requerido');
            return false;
        } else {
            $('#errorDescripcion').empty();
        }

        if (FechaInicio === "") {
            $('#errorComienzo').text('Campo requerido');
            return false;
        } else {
            $('#errorComienzo').empty();
        }

        if (FechaFinal === "") {
            $('#errorFinalizacion').text('Campo requerido');
            return false;
        } else {
            $('#errorFinalizacion').empty();
        }

        $.ajax({
            type: 'POST',
            url: '/controller/ajax/AsignartareaAjax.php',
            data: formData,
            processData: false,
            contentType: false,
            //CONTROL DE ERRORES RECOGIENDO LO QUE NOS VIENE POR EL DATA DEL PHP
            success: function (data) {
                if (data) {
                    alert("Tarea asignada con exito");
                    window.location.assign('/wellcome/');
                } else {
                    alert('Problema al introducir la tarea');
                }
            },
            error: function () {
                alert('Fallo en la llamada a Ajax');
            }
        });
    });

    //SELECCIONAR PROYECTO Y ACTUALIZAR LA INFORMACION CON CHANGE
    $("#proyectoSelect").on('change', function (){
        var IdProyecto = $(this).val();
        console.log(value);
        alert(value);
        $.ajax({
            type: 'POST',
            url: '',
            data: {IdProyecto: IdProyecto},

            success: function(data) {

            },
            error: function() {
                alert('Fallo en la llamada a Ajax');
            }
        });
    })

    // $('#NameTarea, #Descripcion, #FechaComienzo, #FechaFinalizacion, #ProyectoId').keypress(function(event){
    //     var keycode = (event.keyCode ? event.keyCode : event.which);
    //     if(keycode == '13'){
    //         $("#crearTarea").click();
    //
    //     }
    // });
});




