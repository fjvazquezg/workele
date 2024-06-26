<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum</title>
    <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
    <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
    <link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
    <link rel="icon" href="../../assets/images/WorkeleWB.ico" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/notificacion.js"></script>
 
    <script>
      // funcion para solo letras mayúsculas, minúsculas y espacios
      function validarLetras(event) {
          var charCode = event.charCode;
          // Permitir letras (mayúsculas y minúsculas) y espacios
          return (charCode >= 65 && charCode <= 90) || // Letras mayúsculas
                (charCode >= 97 && charCode <= 122) || // Letras minúsculas
                charCode === 32; // Espacio
      }
    </script>

  </head>

  <!-- {*Codigo de CSS para el diseño personalisado del curriculum*} -->
  <style>
    .pregresp {
      border: 0.5px solid lightgrey;
      padding: 10px;
      margin: 10px;
      border-radius: 0.4rem;
    }

    .titulo {
      color: #20c997;
    }
  </style>

  <body style="background-color: #F8F6F3;">

    <!-- {*Conexion de librerias de JavaScript y bootstrap*} -->
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!--Barra de navegacion para Empresa-->
    <?php include("navbar_empresa.php") ?>
    
    <!-- {*Card del curriculum del usuario*} -->
    <div class="card border-primary shadow mb-5 rounded" style="max-width: 80%; margin:auto; margin-top:30px;">
      <div class="card-header text-center bg-primary">
        <h2 class="card-title titulo text-white">CURRICULUM</h2>
      </div>
    
      <center>
        <div class="card-body">
          <div class="row">
            <div class="col"></div>
            <div class="col">
              <!-- {*Boton para enviar tests*} -->
              <div class="row justify-content-center align-items-center" id="btn_enviartest">
              </div>
            </div>
          </div>
          <div class="row align-items-center pregresp shadow mt-3">

            <!-- {*Datos del usuario*} -->
            
              <div class="col">
                <h4 class="text-white bg-dark py-2"><b>USUARIO</b></h4>
                <div id="tabla_usu">
                </div>
              </div>

              

            <!-- {*Datos de la vacante*} -->
              <div class="col">
                  <h4 class="text-white bg-dark py-2"><b>VACANTE</b></h4>
                  <div id="tabla_vacante">
                  </div>
              </div>

          </div> 

          <!-- {*Datos de la experiencia laboral del usuario*} -->
          <div class="pregresp shadow mt-4">
            <h4 class="text-white bg-dark py-2"><b>EXPERIENCIA LABORAL</b></h4>
            <div id="tabla_exp">
              
            </div><br>
          </div>
          
          <div class="pregresp shadow mt-4">
            <h4 class="text-white bg-dark py-2"><b>FORMACIÓN ACADÉMICA</b></h4>
            <div id='tabla_formacion'>
              
            </div><br>
          </div>
          
          <!-- {*Datos de las aficiones del usuario*} -->
          <div class="pregresp shadow mt-4">
            <h4 class="text-white bg-dark py-2"><b>AFICIONES</b></h4>
            <div class="row align-items-center">
              <div class="col">
                <div id="tabla_aficion">
                </div>
              </div>
            </div><br>
          </div>
          
          <!-- {*Datos de los intereses del usuario*} -->
          <div class="pregresp shadow mt-4">
            <h4 class="text-white bg-dark py-2"><b>INTERESES</b></h4>
            <div class="row align-items-center">
              <div class="col">
                <div id="tabla_interes">
                </div>
              </div>
            </div><br>
          </div>

        </div>
      </center>
    </div>
    
  </body>
  <script>
        $(document).ready(function() {
            // Extraer los parámetros de la URL
            var urlParams = new URLSearchParams(window.location.search);
            var id_usuario = urlParams.get('id_usuario');

            $.ajax({
                url: "../php/curriculum.php",
                type: "GET",
                data: { id_usuario: id_usuario },
                dataType: "json",
                success: function(data) {
                  // //Mostrar datos del Usuario y la Vacante
                  // tabla_usuario = "<table class='table table-hover mt-1'><thead class='text-primary'><tr><th class='text-center border-0' style='font-size:1.2rem;'>Nombre</th></thead></tr>"
                  // tabla_vacante = "<table class='table table-hover mt-1'><thead class='text-primary'><tr><th class='text-center border-0' style='font-size:1.2rem;'>Puesto</th></thead></tr>"
                  // $.each(data.postulaciones, function(index, postulaciones) {
                  //   tabla_usuario += `<tbody class='text-center'>
                  //                       <tr>
                  //                         <td>` + postulaciones.nombreUsuario + `</td>
                  //                       </tr>
                  //                     </tbody>`;
                  //   tabla_vacante += `<tbody class='text-center'>
                  //                       <tr>
                  //                         <td>` + postulaciones.puesto + `</td>
                  //                       </tr>
                  //                     </tbody>`;
                  //   btn_enviartest = `<div class="col"><a href="../php/enviartest.php?vac=`+postulaciones.puesto+`&ie=`+postulaciones.id_usuario+`"><input class="btn btn-info w-75" name="btntest" type="submit" value="Enviar Test" hidden></a></div>`
                  //   btn_enviartest += `<div class="col px-0"><a href="../php/pdf.php?vac=`+postulaciones.id_postulacion+`&ie=`+postulaciones.id_usuario+`" target="_blank"><input class="btn btn-success text-white w-75" name="btnpdf" type="submit" value="Imprimir"></a><div>`
                  // });
                  // tabla_usuario += "</table>"
                  // tabla_vacante += "</table>"
                  // $("#tabla_usuario").html(tabla_usuario);
                  // $("#tabla_vacante").html(tabla_vacante);
                  // $("#btn_enviartest").html(btn_enviartest);
                  
                  //Mostrar datos de la Experiencia Laboral
                  tabla_exp = "<table class='table table-hover mt-1'><thead class='text-primary'><tr><th class='text-center border-0'style='font-size:1.2rem;'>Descripción</th><th class='text-center border-0' style='font-size:1.2rem;'>Empresa</th><th class='text-center border-0' style='font-size:1.2rem;'>Periodo</th></thead></tr>"
                  $.each(data.experiencia, function(index, experiencia) {
                    tabla_exp += `<tbody class='text-center'>
                                      <tr>
                                        <td>` + experiencia.descripcion_puesto + `</td>
                                        <td>` + experiencia.empresa + `</td>
                                        <td>` + experiencia.periodo + `</td>
                                      </tr>
                                  </tbody>`;
                  });
                  tabla_exp += "</table>"
                  $("#tabla_exp").html(tabla_exp);

                   //Mostrar datos de vacantes
                   tabla_vacante = "<table class='table table-hover mt-1'><thead class='text-primary'><tr><th class='text-center border-0'style='font-size:1.2rem;'>Nombre</th></tr>"
                  $.each(data.postulaciones, function(index, postulaciones) {
                    tabla_vacante += `<tbody class='text-center'>
                                      <tr>
                                        <td> - - - - - - </td>
                                      </tr>
                                  </tbody>`;
                  });
                  tabla_vacante += "</table>"
                  $("#tabla_vacante").html(tabla_vacante);



                   //Mostrar datos de Usuario
                   tabla_usu = "<table class='table table-hover mt-1'><thead class='text-primary'><tr><th class='text-center border-0'style='font-size:1.2rem;'>Nombre</th></tr>"
                  $.each(data.usuarios, function(index, usuarios) {
                    tabla_usu += `<tbody class='text-center'>
                                      <tr>
                                        <td>` + usuarios.nombreUsuario + `</td>
                                      </tr>
                                  </tbody>`;
                  });
                  tabla_usu += "</table>"
                  $("#tabla_usu").html(tabla_usu);


                  
                  //Mostrar datos de la Formacion Academica
                  tabla_formacion = "<table class='table table-hover mt-1'><thead class='text-primary'><tr><th class='text-center border-0' style='font-size:1.2rem;'>Descripción</th><th class='text-center border-0' style='font-size:1.2rem;'>Ubicación</th><th class='text-center border-0' style='font-size:1.2rem;'>Periodo</th></thead></tr>"
                  $.each(data.formacion, function(index, formacion) {
                    tabla_formacion += `<tbody class='text-center'>
                                            <tr>
                                              <td>` + formacion.descripcion + `</td>
                                              <td>` + formacion.ubicacion + `</td>
                                              <td>` + formacion.periodo + `</td>
                                            </tr>
                                          </tbody>`;
                  });
                  tabla_formacion += "</table>"
                  $("#tabla_formacion").html(tabla_formacion);

                  //Mostrar datos de las Aficiones
                  tabla_aficion = "<table class='table table-hover mt-1'><thead class='text-primary'><tr><th class='text-center border-0' style='font-size:1.2rem;'>Descripción</th></thead></tr>"
                  $.each(data.aficion, function(index, aficion) {
                    tabla_aficion += `<tbody class='text-center'>
                                            <tr>
                                              <td>` + aficion.descripcion + `</td>
                                            </tr>
                                          </tbody>`;
                  });
                  tabla_aficion += "</table>"
                  $("#tabla_aficion").html(tabla_aficion);

                  //Mostrar datos de los Intereses
                  tabla_interes = "<table class='table table-hover mt-1'><thead class='text-primary'><tr><th class='text-center border-0' style='font-size:1.2rem;'>Descripción</th></thead></tr>"
                  $.each(data.interes, function(index, interes) {
                    tabla_interes += `<tbody class='text-center'>
                                            <tr>
                                              <td>` + interes.descripcion + `</td>
                                            </tr>
                                          </tbody>`;
                  });
                  tabla_interes += "</table>"
                  $("#tabla_interes").html(tabla_interes);
                },
                error: function(xhr, status, error) {
                    // Manejar errores si es necesario
                    alert("Error al obtener los datos del curriculum.");
                    console.error(xhr, status, error);
                }
            });
        });
    </script>
</html>