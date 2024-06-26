<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio Usuario</title>
  <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
  <link rel="icon" href="../../assets/images/WorkeleWB.ico" type="image/x-icon">
  <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
  <script src="../php/reenvio.php"></script>
  <script src="../js/inactividad.js"></script>

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

<body>
  {*Barra de navegacion de Usuarios*}
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="indexPrincipal.php">Inicio</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor03">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" href="experiencia_laboral.php">Experiencia Laboral
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="formacion_academica.php">Formacion Academica
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="Aficiones.php">Aficiones
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="interes.php">Interes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="buscar_vacantes.php">Buscar Vacantes</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <!-- {if $COUNT >= 1}
            <a class="btn demo-btn-on-bg text-white font-weight-bold ml-2 mt-2 mt-lg-0" data-toggle="modal" data-target="#exampleModal">
              <span class="fa-layers fa-fw mr-2 fa-lg">
                <i class="fas fa-bell"></i>
                <span class="fa-layers-counter" style="background:Tomato">{$COUNT}</span>
              </span>{$smarty.session.nomusuario}</a>
          </li>
          {else}
            <li class="nav-link active">{$smarty.session.nomusuario}</li>
          {/if} -->
            {* Creacion de la modal de notificaciones *}
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-bell"></i> Notificaciones</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- {if $COUNTLAB >= 1}
                  <a class="nav-link" href="experiencia_laboral.php" style="color: blue;">Aun no ha registrado sus datos de Experiencia Laboral, click aqui para ir al registro</a>
                  {/if}
                  {if $COUNFOR >= 1}
                  <a class="nav-link" href="formacion_academica.php" style="color: blue;">Aun no ha registrado Formacion Academica, click aqui para ir al registro</a>
                  {/if}
                  {if $COUNTAFI >= 1}
                  <a class="nav-link" href="aficiones.php" style="color: blue;">Aun no ha registrado Experiencia Profesional, click aqui para ir al registro</a>
                  {/if}
                  {if $COUNTINT >= 1}
                  <a class="nav-link" href="interes.php" style="color: blue;">Aun no ha registrado sus datos de Interes, click aqui para ir al registro</a>
                  {/if} -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>
            {*Boton para cerrar la sesion*}
            <a class="nav-link active text-danger" href="https://www.workele.com" style="font-weight:bold;">Cerrar Sesión</a>
        </ul>
      </div>
    </div>
  </nav>

  {*Formulario para el reenvio al index*}
  <form action="indexPrincipal.php" method="POST">
    <div class="card  mb-4" style="max-width: 30rem; margin:auto; margin-top:30px;">
      <div class="card-body">
        <br>
        <h6 class="card-title" style="text-align: center; margin-top:5%; font-size:30px;">Reenvio a pagina principal.</h6><br><br>
        <h6 class="card-title" style="text-align: center; margin-top:5%;color:#4B4B4B;">el test ya ha sido realizado</h6>

        {*Campos internos para la ubicacion*}
        <input name="txtlatitud" id="latitud" type="hidden" value="25.56801775">
        <input name="txtlongitud" id="longitud" type="hidden" value="-108.44480150000001">

        {*Boton de aceptar*}
        <input class="btn btn-primary" style="margin-left:180px;" type="submit" value="ACEPTAR">
      </div>
    </div>
  </form>

  {*Conexion de librerias de JavaScript y bootstrap*}
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.5/push.js" integrity="sha512-dzuBh7UxT5g4MmnbR3ybHMK2g2zxGXILXHuLsUwo8XJmoW2JTTqcg4bFFu0RnBO+kPTvKafgVYh8hnCN/l8ijQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.5/push.min.js" integrity="sha512-1zotA6QprPWXVvgx8KFnvanxTZhm7P/uadmELhEUs3fHYvGDqkYa0ZUc3Q0m+3w7AUcgG5k4rUiFDdSkRJhqaA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>