// $(document).ready(function(){
//     var offset = 0; // Variable para llevar el seguimiento del offset de las vacantes cargadas

//     function cargarVacantes() {
//         $.ajax({
//             url: "../php/Buscar_vacantes.php",
//             type: "POST",
//             dataType: "json",
//             data: { offset: offset }, // Enviar el offset al servidor
//             success: function(data){
//                 if (data.length > 0) {
//                     var maxHeight = 0;
//                     $.each(data, function(index, vacante){
//                         var datosAdicionales = vacante.datos_adicionales.substring(0, 200); // Limitar texto en la card
//                         var card = '<div class="col-lg-4 col-md-6 col-sm-12">';
//                         card += '<div class="card shadow p-3 mb-5 bg-body rounded">';
//                         card += '<div id="notification-container" class="fixed-bottom mb-3" style="z-index: 1000; right: 0;"></div>';
//                         card += '<div class="card-header">';
//                         card += '<div class="d-flex justify-content-between align-items-center"><h4 class="card-title text-danger mb-0">' + vacante.puesto + '</h4>';
                        
//                         if (vacante.verificacionFav == null){
//                             card += `<div class="ml-auto">
//                                         <button type="button" id="btnfavoritos" class="border-0 bg-white text-secondary p-0 mt-2" data-vacante="`+vacante.id_vacante+`" style="outline: none;"><i id="campana`+vacante.id_vacante+`" class="far fa-bookmark text-primary" style="font-size:1.8rem;transition: transform 0.1s ease;background-color:#f7f7f7;"></i></button>
//                                      </div></div>`;
//                         }else {
//                             card += `<div class="ml-auto">
//                                         <button type="button" id="btnfavoritos" class="border-0 bg-white text-secondary p-0 mt-2" data-vacante="`+vacante.id_vacante+`" style="outline: none;"><i id="campana`+vacante.id_vacante+`" class="fas fa-bookmark text-primary" style="font-size:1.8rem;transition: transform 0.1s ease;background-color:#f7f7f7;"></i></button>
//                                      </div></div>`;
//                         }
                        
//                         card += '</div>';
//                         card += '<div class="card-body">';
//                         card += '<h5 class="card-title">' + vacante.empresa + '</h5>';
//                         // Convertir el valor de vacante.urgente a "Se Precisa Urgente" si es 0
//                         var urgenteTexto = vacante.urgente === 0 ? 'Se Precisa Urgente' : vacante.urgente;
//                         // Mostrar el valor de vacante.urgente solo si no es null
//                         if (vacante.urgente !== null) {
//                             card += '<h6 class="card-title text-warning">' + urgenteTexto + '</h6>';
//                         }
//                         card += '<h6 class="card-title">' + vacante.ciudad + ', ' + vacante.region + '</h6>';
//                         card += '<p class="card-text" style="text-align: justify;">' + datosAdicionales + '...</p>'; // Usar el texto limitado
//                         card += '<form action="seleccionar_vacantes.php" method="POST">';
//                         card += '<input type="text" value="'+vacante.id_vacante+'" name="id_vacante" id="id_vacante" hidden>';
//                         card += '<input type="submit" value="Leer más" class="btn btn-primary btn-vacante" data-vacante2="'+vacante.id_vacante+'">';
//                         card += '</form></div></div></div>';
//                         $('#vacantesContainer').append(card);

//                         // Encontrar la altura máxima
//                         var cardHeight = $('.card').last().height();
//                         if (cardHeight > maxHeight) {
//                             maxHeight = cardHeight;
//                         }
//                     });

//                     // Establecer la altura máxima para todas las tarjetas
//                     $('.card').height(maxHeight);

//                     // Incrementar el offset para la próxima carga
//                     offset += 9;
//                 } else {
//                     $('#vacantesContainer').html('No se encontraron más vacantes.');
//                 }
//             },
//             error: function(xhr, status, error){
//                 console.error(xhr.responseText);
//             }
//         });
//     }

//     // Agregar evento click a los botones "Guardar" de experiencia
//     $(document).on("click", ".btn-vacante", function() {
//         var id_vacante = $(this).data("vacante2");
//         var latitud = $("#latitud").val();
//         var longitud = $("#longitud").val();

//         // Enviar datos al servidor utilizando AJAX
//             $.ajax({
//                 url: '../php/guardar_logusuario.php',
//                 type: 'POST',
//                 data: {
//                     id_vacante: id_vacante,
//                     latitud: latitud,
//                     longitud: longitud,
//                 },
//                 success: function(response) {
//                 },
//                 error: function(xhr, status, error) {
//                     console.error(xhr.responseText);
//                     // Manejar errores aquí
//                 }
//             });
//         });
    

//         $(document).on("mouseover", "#btnfavoritos", function(event) {
//             // Obtener la posición y dimensiones del botón
//             var boton = $(this);
//             var posicion = boton.offset();
//             var anchoBoton = boton.outerWidth();
//             var altoBoton = boton.outerHeight();
            
//             // Crear un elemento span para mostrar el mensaje
//             var mensaje = $('<span class="mensaje-favoritos font-weight-bold shadow px-2">Agregar a Favoritos</span>');
        
//             // Estilo del mensaje emergente
//             mensaje.css({
//                 backgroundColor: '#fff',
//                 color: '#54b689',
//                 padding: '5px',
//                 borderRadius: '5px',
//                 border:'1px solid #dfdfdf',
//                 position: 'absolute',
//                 top: (posicion.top - altoBoton - 12) + 'px', // Posición arriba del botón con 5px de espacio
//                 left: (posicion.left + (anchoBoton / 2) - (mensaje.outerWidth() / 2)) + 'px',
//                 transform: 'translateX(-50%)'
//             });
        
//             // Calcular la posición del mensaje en relación con el ancho total de la ventana del navegador
//             var distanciaHastaBordeDerecho = $(window).width() - (posicion.left + anchoBoton + mensaje.outerWidth());
//             if (distanciaHastaBordeDerecho < $(window).width() * 0.1) {
//                 // Si el mensaje está demasiado cerca del borde derecho, ajustar su posición
//                 var nuevaPosicionIzquierda = $(window).width() * 0.9 - mensaje.outerWidth();
//                 mensaje.css({
//                     left: Math.max(nuevaPosicionIzquierda, 0) + 'px',
//                     transform: 'translateX(0%)'
//                 });
//             }
        
//             // Agregar el mensaje al botón
//             $("body").append(mensaje);
//         });

//         $(document).on("mouseout", "#btnfavoritos", function(event) {
//             // Eliminar el mensaje
//             $("span.mensaje-favoritos").remove();
//         });

//     $(document).on("click", "#btnfavoritos", function(event) {
//         event.preventDefault();
//         var vacanteID = $(this).data("vacante");
//          // Evita que la página se recargue
//         var bell = document.getElementById('campana' + vacanteID);
//         bell.style.transform = 'rotate(15deg)'; // Rotate bell to the right
//         setTimeout(function() {
//             bell.style.transform = 'rotate(-15deg)'; // Rotate bell to the left
//         }, 100);
//         setTimeout(function() {
//             bell.style.transform = 'rotate(10deg)'; // Rotate bell to the right again
//         }, 200);
//         setTimeout(function() {
//             bell.style.transform = 'rotate(-10deg)'; // Rotate bell to the left again
//         }, 300);
//         setTimeout(function() {
//             bell.style.transform = 'rotate(5deg)'; // Rotate bell to the right again
//         }, 400);
//         setTimeout(function() {
//             bell.style.transform = 'rotate(0deg)'; // Rotate bell back to its original position
//         }, 500);
//         var icono = this.querySelector('i');
//         if (icono.classList.contains('far')) {
//           icono.classList.remove('far');
//           icono.classList.add('fas');
//         } else {
//           icono.classList.remove('fas');
//           icono.classList.add('far');
//         }

//         $.ajax({
//             url: '../php/actualizar_favoritos.php', 
//             type: 'POST',
//             data: {
//                 vacanteID: vacanteID,
//             },
//             success: function(response) {
//                 // Determinar el tipo de alerta
//                 var alertType = response === "Se agregó a favoritos" ? "success" : "danger";

//                 // Crear la alerta de Bootstrap
//                 var alertHtml = '<div class="alert alert-' + alertType + ' fade show position-absolute text-center" style="right: 15px; bottom: 15px; left: auto;" role="alert">';
//                 alertHtml += response;
//                 alertHtml += '</div>';

//                 // Agregar la alerta al contenedor
//                 $('#notification-container').html(alertHtml);

//                 // Desvanecer la alerta después de un segundo
//                 setTimeout(function() {
//                     $('.alert-success').fadeOut();
//                     $('.alert-danger').fadeOut();
//                 }, 1000);
//             },
//             error: function(xhr, status, error) {
//                 console.error(xhr.responseText);
//             }
//         });
//     });

    

//     // Cargar las vacantes al cargar la página
//     cargarVacantes();

//     // Manejar el evento de clic en el botón "Siguiente"
//     $('#siguienteBtn').click(function(e){
//         e.preventDefault();
//         cargarVacantes();
//     });
// });

$(document).ready(function(){
    var currentPage = 0; // Variable para llevar el seguimiento de la página actual
    var maxPage = null; // Variable para almacenar el número máximo de páginas
    var TotalVacantes = 3; // Variable para contabilizar el número máximo de páginas según las vacantes

    function cargarVacantes() {
        $.ajax({
            url: "../php/Buscar_vacantes.php",
            type: "POST",
            dataType: "json",
            data: { page: currentPage },
            success: function(data){
                if (data.vacantes.length > 0) {
                    $('#vacantesContainer').empty();
                    renderizarVacantes(data.vacantes);
                    maxPage = data.totalVacantes;
                } else {
                    $('#vacantesContainer').html('No se encontraron más vacantes.');
                }
                actualizarBotones();
            },
            error: function(xhr, status, error){
                console.error(xhr.responseText);
            }
        });
    }
    

    function renderizarVacantes(data) {
        var maxHeight = 0;
        $.each(data, function(index, vacante){
            var datosAdicionales = vacante.datos_adicionales.substring(0, 200); // Limitar texto en la card
            var card = '<div class="col-lg-4 col-md-6 col-sm-12">';
            card += '<div class="card shadow p-3 mb-5 bg-body rounded">';
            card += '<div id="notification-container" class="fixed-bottom mb-3" style="z-index: 1000; right: 0;"></div>';
            card += '<div class="card-header">';
            card += '<div class="d-flex justify-content-between align-items-center"><h4 class="card-title text-danger mb-0">' + vacante.puesto + '</h4>';
                        
            if (vacante.verificacionFav == null){
                card += `<div class="ml-auto">
                            <button type="button" class="border-0 bg-white text-secondary p-0 mt-2 btnfavoritos" data-vacante="`+vacante.id_vacante+`" style="outline: none;"><i id="campana`+vacante.id_vacante+`" class="far fa-bookmark text-primary" style="font-size:1.8rem;transition: transform 0.1s ease;background-color:#f7f7f7;"></i></button>
                            </div></div>`;
            }else {
                card += `<div class="ml-auto">
                            <button type="button" class="border-0 bg-white text-secondary p-0 mt-2 btnfavoritos" data-vacante="`+vacante.id_vacante+`" style="outline: none;"><i id="campana`+vacante.id_vacante+`" class="fas fa-bookmark text-primary" style="font-size:1.8rem;transition: transform 0.1s ease;background-color:#f7f7f7;"></i></button>
                            </div></div>`;
            }
                        
            card += '</div>';
            card += '<div class="card-body">';
            card += '<h5 class="card-title">' + vacante.empresa + '</h5>';
           // Crear una línea combinada para "Prácticas" y "Se Precisa Urgente" si aplican
           var practicasUrgente = '';
           if (vacante.tipo === "2") {
               practicasUrgente += '<span class="text-warning">Prácticas</span>';
           }
           if (vacante.urgente !== null) {
               var urgenteTexto = vacante.urgente === 0 ? 'Se Precisa Urgente' : vacante.urgente;
               if (practicasUrgente !== '') {
                   practicasUrgente += ' <span class="text-warning">, </span> '; // Agregar un separador si ya hay texto
               }
               practicasUrgente += '<span class="text-warning">' + urgenteTexto + '</span>';
           }
           if (practicasUrgente !== '') {
               card += '<h6 class="card-title">' + practicasUrgente + '</h6>';
           }
            card += '<h6 class="card-title">' + vacante.ciudad + ', ' + vacante.region + '</h6>';
            card += '<p class="card-text" style="text-align: justify;">' + datosAdicionales + '...</p>'; // Usar el texto limitado
            card += '<form action="seleccionar_vacantes.php" method="POST">';
            card += '<input type="text" value="'+vacante.id_vacante+'" name="id_vacante" id="id_vacante" hidden>';
            card += '<input type="submit" value="Leer más" class="btn btn-primary btn-vacante" data-vacante2="'+vacante.id_vacante+'">';
            card += '</form></div></div></div>';
            $('#vacantesContainer').append(card);

            // Encontrar la altura máxima
            var cardHeight = $('.card').last().height();
            if (cardHeight > maxHeight) {
                maxHeight = cardHeight;
            }
        });

        // Establecer la altura máxima para todas las tarjetas
        $('.card').height(maxHeight);
    }

    // Agregar evento click a los botones "Guardar" de experiencia
    $(document).on("click", ".btn-vacante", function() {
        var id_vacante = $(this).data("vacante2");
        var latitud = $("#latitud").val();
        var longitud = $("#longitud").val();

        // Enviar datos al servidor utilizando AJAX
            $.ajax({
                url: '../php/guardar_logusuario.php',
                type: 'POST',
                data: {
                    id_vacante: id_vacante,
                    latitud: latitud,
                    longitud: longitud,
                },
                success: function(response) {
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    // Manejar errores aquí
                }
            });
        });
    

        $(document).on("mouseover", ".btnfavoritos", function(event) {
            // Obtener la posición y dimensiones del botón
            var boton = $(this);
            var posicion = boton.offset();
            var anchoBoton = boton.outerWidth();
            var altoBoton = boton.outerHeight();
            
            // Crear un elemento span para mostrar el mensaje
            var mensaje = $('<span class="mensaje-favoritos font-weight-bold shadow px-2">Agregar a Favoritos</span>');
        
            // Estilo del mensaje emergente
            mensaje.css({
                backgroundColor: '#fff',
                color: '#54b689',
                padding: '5px',
                borderRadius: '5px',
                border:'1px solid #dfdfdf',
                position: 'absolute',
                top: (posicion.top - altoBoton - 12) + 'px', // Posición arriba del botón con 5px de espacio
                left: (posicion.left + (anchoBoton / 2) - (mensaje.outerWidth() / 2)) + 'px',
                transform: 'translateX(-50%)'
            });
        
            // Calcular la posición del mensaje en relación con el ancho total de la ventana del navegador
            var distanciaHastaBordeDerecho = $(window).width() - (posicion.left + anchoBoton + mensaje.outerWidth());
            if (distanciaHastaBordeDerecho < $(window).width() * 0.1) {
                // Si el mensaje está demasiado cerca del borde derecho, ajustar su posición
                var nuevaPosicionIzquierda = $(window).width() * 0.9 - mensaje.outerWidth();
                mensaje.css({
                    left: Math.max(nuevaPosicionIzquierda, 0) + 'px',
                    transform: 'translateX(0%)'
                });
            }
        
            // Agregar el mensaje al botón
            $("body").append(mensaje);
        });

        $(document).on("mouseout", ".btnfavoritos", function(event) {
            // Eliminar el mensaje
            $("span.mensaje-favoritos").remove();
        });

    $(document).on("click", ".btnfavoritos", function(event) {
        event.preventDefault();
        var vacanteID = $(this).data("vacante");
         // Evita que la página se recargue
        var bell = document.getElementById('campana' + vacanteID);
        bell.style.transform = 'rotate(15deg)'; // Rotate bell to the right
        setTimeout(function() {
            bell.style.transform = 'rotate(-15deg)'; // Rotate bell to the left
        }, 100);
        setTimeout(function() {
            bell.style.transform = 'rotate(10deg)'; // Rotate bell to the right again
        }, 200);
        setTimeout(function() {
            bell.style.transform = 'rotate(-10deg)'; // Rotate bell to the left again
        }, 300);
        setTimeout(function() {
            bell.style.transform = 'rotate(5deg)'; // Rotate bell to the right again
        }, 400);
        setTimeout(function() {
            bell.style.transform = 'rotate(0deg)'; // Rotate bell back to its original position
        }, 500);
        var icono = this.querySelector('i');
        if (icono.classList.contains('far')) {
          icono.classList.remove('far');
          icono.classList.add('fas');
        } else {
          icono.classList.remove('fas');
          icono.classList.add('far');
        }

        $.ajax({
            url: '../php/actualizar_favoritos.php', 
            type: 'POST',
            data: {
                vacanteID: vacanteID,
            },
            success: function(response) {
                // Determinar el tipo de alerta
                var alertType = response === "Se agregó a favoritos" ? "success" : "danger";

                // Crear la alerta de Bootstrap
                var alertHtml = '<div class="alert alert-' + alertType + ' fade show position-absolute text-center" style="right: 15px; bottom: 15px; left: auto;" role="alert">';
                alertHtml += response;
                alertHtml += '</div>';

                // Agregar la alerta al contenedor
                $('#notification-container').html(alertHtml);

                // Desvanecer la alerta después de un segundo
                setTimeout(function() {
                    $('.alert-success').fadeOut();
                    $('.alert-danger').fadeOut();
                }, 1000);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

// Función para actualizar el estado de los botones de navegación
function actualizarBotones() {
    // Habilitar el botón "Atrás" solo si currentPage es mayor que 0
    $('#btnAtras').prop('disabled', currentPage === 0);

    // Deshabilitar el botón "Siguiente" si no hay más páginas para cargar
    $('#btnSiguiente').prop('disabled', currentPage === maxPage - 1);
}

// Manejar el evento de clic en el botón "Siguiente"
$('#btnSiguiente').click(function () {
    currentPage++;
    cargarVacantes();
});

// Manejar el evento de clic en el botón "Atrás"
$('#btnAtras').click(function () {
    currentPage--;
    cargarVacantes();
});

// Al inicio, deshabilitar el botón "Atrás" y luego cargar las vacantes
actualizarBotones();
cargarVacantes();
});