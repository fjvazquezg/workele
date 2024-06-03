// Metodo AJAX para el guardado de Experiencia Laboral
{
    $(document).ready(function () {
        $('#formExperienciaLaboral').submit(function (event) {
            event.preventDefault();
            var formData = new FormData($('#formExperienciaLaboral')[0]);
            //var formData = $(this).serialize();
            $.ajax({
                url: '../php/experiencia_laboral.php',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // Maneja la respuesta del archivo PHP aquí
                    console.log(response);
                    if (response == "true") {
                        Swal.fire({
                            title: 'Listo!',
                            text: 'Elemento Guardado',
                            icon: 'success'
                        }).then(function () {
                            window.location.href = "../templates/experiencia_laboral.php";
                        });
                    } else if (response == "errorSave") {
                        Swal.fire({
                            title: 'Error!',
                            text: 'No se ha guardado el elemento',
                            icon: 'error'
                        }).then(function () {
                            window.location.href = "../templates/experiencia_laboral.php";
                        });
                    }
                },
                error: function (xhr, status, error) {
                    // Maneja cualquier error que ocurra durante la solicitud AJAX
                    console.error(error);
                }
            });
        })
    })
};

// Metodo AJAX para el guardado de Formacion Academica
{
    $(document).ready(function () {
        $('#formFormacionAcademica').submit(function (event) {
            event.preventDefault();
            var formData = new FormData($('#formFormacionAcademica')[0]);
            //var formData = $(this).serialize();
            $.ajax({
                url: '../php/formacion_academica.php',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // Maneja la respuesta del archivo PHP aquí
                    console.log(response);
                    if (response == "true") {
                        Swal.fire({
                            title: 'Listo!',
                            text: 'Elemento Guardado',
                            icon: 'success'
                        }).then(function () {
                            window.location.href = "../templates/formacion_academica.php";
                        });
                    } else if (response == "errorSave") {
                        Swal.fire({
                            title: 'Error!',
                            text: 'No se ha guardado el elemento',
                            icon: 'error'
                        }).then(function () {
                            window.location.href = "../templates/formacion_academica.php";
                        });
                    }
                },
                error: function (xhr, status, error) {
                    // Maneja cualquier error que ocurra durante la solicitud AJAX
                    console.error(error);
                }
            });
        })
    })
};

// Metodo AJAX para el guardado de Aficiones
{
    $(document).ready(function () {
        $('#formAficiones').submit(function (event) {
            event.preventDefault();
            var formData = new FormData($('#formAficiones')[0]);
            //var formData = $(this).serialize();
            $.ajax({
                url: '../php/Aficiones.php',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // Maneja la respuesta del archivo PHP aquí
                    console.log(response);
                    if (response == "true") {
                        Swal.fire({
                            title: 'Listo!',
                            text: 'Elemento Guardado',
                            icon: 'success'
                        }).then(function () {
                            window.location.href = "../templates/Aficiones.php";
                        });
                    } else if (response == "errorDuplicado") {
                      Swal.fire({
                        title: 'Error!',
                        text: 'La afición ya está registrada',
                        icon: 'warning'
                    });
                    }
                },
                error: function (xhr, status, error) {
                    // Maneja cualquier error que ocurra durante la solicitud AJAX
                    console.error(error);
                }
            });
        })
    })
};

// Metodo AJAX para el guardado de Vacantes
$(document).ready(function () {
    $('#formVacante').submit(function (event) {
        event.preventDefault();

        var tswTipo = document.getElementById("tswTipo");
        if (tswTipo.checked) {
            var valor = "1"; // Si está seleccionado vacante
        } else {
            var valor = '2'; // Si está seleccionado practica
        }

        var formData = new FormData($('#formVacante')[0]);
        
        // Agregar una variable adicional al FormData
        formData.append('tswTipo', valor);

        //var formData = $(this).serialize();
        $.ajax({
            url: '../php/Vacantes.php',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                // Maneja la respuesta del archivo PHP aquí
                console.log(response);
                if (response == "true") {
                    Swal.fire({
                        title: 'Listo!',
                        text: 'Elemento Guardado',
                        icon: 'success'
                    }).then(function () {
                        window.location.href = "../templates/vacante.php";
                    });
                }
            },
            error: function (xhr, status, error) {
                // Maneja cualquier error que ocurra durante la solicitud AJAX
                console.error(error);
            }
        });
    })
});

// Metodo AJAX para el guardado de Interes
{
    $(document).ready(function () {
        $('#formInteres').submit(function (event) {
            event.preventDefault();
            var formData = new FormData($('#formInteres')[0]);
            $.ajax({
                url: '../php/interes.php',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // Maneja la respuesta del archivo PHP aquí
                    console.log(response);
                    if (response == "true") {
                        Swal.fire({
                            title: '¡Listo!',
                            text: 'Elemento Guardado',
                            icon: 'success'
                        }).then(function () {
                            window.location.href = "../templates/interes.php";
                        });
                    }
                },
                error: function (xhr, status, error) {
                    // Maneja cualquier error que ocurra durante la solicitud AJAX
                    console.error(error);
                }
            });
        })
    })
};
// Metodo AJAX para el guardado de activacion de empresa
{
    $(document).ready(function () {
        $('#formVerificacion').submit(function (event) {
            event.preventDefault();
            var formData = new FormData($('#formVerificacion')[0]);
            $.ajax({
                url: '../php/verifica.php',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // Maneja la respuesta del archivo PHP aquí
                    console.log(response);
                    if (response == "true") {
                        Swal.fire({
                            title: '¡Listo!',
                            text: 'Su usuario fue verificado puede ingresar a la plataforma',
                            icon: 'success'
                        }).then(function () {
                            window.location.href = "https://www.workele.com";
                        });
                    }
                },
                error: function (xhr, status, error) {
                    // Maneja cualquier error que ocurra durante la solicitud AJAX
                    console.error(error);
                }
            });
        })
    })
};
// Metodo AJAX para el guardado de Interes
{
    $(document).ready(function () {
        $('#formPostulacion').submit(function (event) {
            event.preventDefault();
            var formData = new FormData($('#formPostulacion')[0]);
            $.ajax({
                url: '../php/guardar_postulacion.php',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // Maneja la respuesta del archivo PHP aquí
                    console.log(response);
                    if (response == "1") {
                        Swal.fire({
                            title: '¡Listo!',
                            text: 'Elemento Guardado',
                            icon: 'success'
                        }).then(function () {
                            window.location.href = "../templates/buscar_vacantes.php";
                        });
                    } else if (response == "0") {
                        Swal.fire({
                            title: 'Advertencia',
                            text: 'Por favor, complete el registro de datos personales para su curriculum o en su defecto el Video Curriculum para poder postularse en una vacante',
                            icon: 'warning'
                        });
                    }
                },
                error: function (xhr, status, error) {
                    // Maneja cualquier error que ocurra durante la solicitud AJAX
                    console.error(error);
                }
            });
        });
    });    
};
// metodo para confirmar el correo
{
    $(document).ready(function () {
        $('#formConfirmaCorreo').submit(function (event) {
            event.preventDefault();
            var formData = new FormData($('#formConfirmaCorreo')[0]);
            $.ajax({
                url: '../php/confirmacorreo.php',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // Maneja la respuesta del archivo PHP aquí
                    console.log(response);
                    if (response == "true") {
                     Swal.fire({
                             title: '¡Listo!',
                             text: 'Se ha enviado un correo de verificacion, revise su bandeja de entrada de no encontrarlo revise su spam y siga las instrucciones',
                             icon: 'success'
                         }).then(function () {
                             window.location.href = "https://www.workele.com";
                        });
                    }
                },
                error: function (xhr, status, error) {
                    // Maneja cualquier error que ocurra durante la solicitud AJAX
                    console.error(error);
                }
            });
        })
    })
};
// metodo para actulizar la contraseña
{
    $(document).ready(function () {
        $('#frmRenovarpassword').submit(function (event) {
            event.preventDefault();
            var formData = new FormData($('#frmRenovarpassword')[0]);
            $.ajax({
                url: '../php/renovarPassword.php',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // Maneja la respuesta del archivo PHP aquí
                    console.log(response);
                    if (response == "true") {
                     Swal.fire({
                             title: '¡Listo!',
                             text: 'Se ha actualizado la contraseña',
                             icon: 'success'
                         }).then(function () {
                             window.location.href = "https://www.workele.com";
                        });
                    }
                },
                error: function (xhr, status, error) {
                    // Maneja cualquier error que ocurra durante la solicitud AJAX
                    console.error(error);
                }
            });
        })
    })
};
// Metodo AJAX para el guardado de Test Cleaver
// {
//     $(document).ready(function () {
//         $('#formCleaver').submit(function (event) {
//             event.preventDefault();
//             var formData = new FormData($('#formCleaver')[0]);
//             $.ajax({
//                 url: '../php/test_cleaver.php',
//                 method: 'POST',
//                 data: formData,
//                 processData: false,
//                 contentType: false,
//                 success: function (response) {
//                     // Maneja la respuesta del archivo PHP aquí
//                     console.log(response);
//                     if (response == "true") {
//                         Swal.fire({
//                             title: '¡Completado!',
//                             text: 'Respuestas Guardadas',
//                             icon: 'success'
//                         }).then(function () {
//                             window.location.href = "../templates/test_cleaver.php";
//                         });
//                     } else if (response == "errorSave") {
//                         Swal.fire({
//                             title: '¡Error!',
//                             text: '¡No se pudieron guardar sus respuestas!',
//                             icon: 'error'
//                         }).then(function () {
//                             window.location.href = "../templates/test_cleaver.php";
//                         });
//                     }
//                 },
//                 error: function (xhr, status, error) {
//                     // Maneja cualquier error que ocurra durante la solicitud AJAX
//                     console.error(error);
//                 }
//             });
//         })
//     })
// };