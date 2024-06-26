<?php 
  $id_vacante = $_POST['id_vacante'];
  echo'<input type="hidden" name="id_vacante" id="id_vacante" value="'.$id_vacante.'">';
  $_SESSION['id_vacante'] = $id_vacante;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Selección de Vacante</title>
  <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/css/styles.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
  <link rel="icon" href="../../assets/images/WorkeleWB.ico" type="image/x-icon">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="../js/notificacion_usuario.js"></script>
  <script src="../js/seleccionar_vacantes.js"></script>

</head>

<body style="background-color: #F8F6F3;">

  <!-- Barra de navegación para Usuarios -->
  <?php include("navbar_usuario.php"); ?>

  <div style="margin-top:4%" id="vacantesContainer"></div>

  <!-- Modal -->
  <div class="modal" tabindex="-1" id="postularseModal" role="dialog">
    <form id="formPostulacion" method="POST">
    <!-- <form id="formPostulacion" method="POST"> -->
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h5 class="modal-title text-white">Confirmación de postulación</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <center>¿Estás seguro de que deseas postularte a esta vacante?</center>
            <div class="row mt-4">
              <div class="col text-center ">
                <button type="button" class="btn btn-secondary w-75" data-dismiss="modal">Cancelar</button>
              </div>
              <div class="col text-center">
                <input class="btn btn-primary w-75" type="submit" value="Postularse">
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

  <!-- <script>
    document.getElementById('guardar').onclick = function() {
        Swal.fire({
            title: '¡Listo!',
            text: 'Elemento Guardado',
            icon: 'success'
        }).then(function () {
            window.location.href = "../templates/seleccionar_vacantes.php";
        });
    };
  </script> -->

  <!-- Conexion de librerias de JavaScript y bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>
  <script src="../js/insert.js"></script>

</body>


</html>