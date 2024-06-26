<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagina Principal</title>
  <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
  <link rel="icon" href="../../assets/images/WorkeleWB.ico" type="image/x-icon">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
  <script src="../js/noticias.js"></script>
</head>
<body>

  <!-- Barra de navegacion del index principal -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <center>
      <a href="login.php?xd=1">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Soy Empresa</button>
      </a>
      <a href="login.php?xd=2">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Soy Usuario</button>
      </a>
      <a href="login.php?xd=3">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Soy Administrador</button>
      </a>
      <a href="login.php?xd=4">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Soy Estudiante</button>
      </a>
    </center>
  </nav>

  <!-- Imagen principal del index -->
  <div class="row align-items-center" style="margin-left:10px; margin-left:10px">
    <div class="col">
      <figure class="text-center">
        <h2>Encuentra el empleo que encaja contigo.</h2>
        <h2>Miles de empresas más tienen las mejores vacantes para ti</h2>
      </figure>
    </div>
    <div class="col">
      <input type="image"
        src="https://tmt.group/wp-content/uploads/2021/08/20943777-1-1-scaled.jpg"
        height="70%" width="70%" style="margin-left:10%" />
    </div>
  </div>
  <br><br>

  <!-- Imagenes dinamicas de las vacantes -->
  <div class="row align-items-center"
    style="padding-left:7%;padding-top:50px;padding-bottom:50px;background-color:#eeeeeed9">
    <?php foreach ($Bvacante as $vacantes): ?>
      <div class="col">
        <input type="image" onclick="location.href='login.php?xd=2&vacante=<?php echo $vacantes['idvacante']; ?>'"
          src="../../proyecto-web/pagina/img/<?php echo $vacantes['rutaimg']; ?>" style="border: double;" height="200" width="200" />
        <h5><?php echo $vacantes['puesto']; ?></h5>
      </div>
      <?php endforeach; ?>
  </div>
  <br><br>

  <!-- Cards de las noticias -->
  <center>
  <div class="row align-items-center justify-content-md-center"
  style="padding-top:50px;padding-bottom:50px;">
    <div class="row" id="card-container">
      <?php foreach ($Noticias as $noticia): ?>
        <div class="card border-primary shadow p-3 mb-5 bg-body rounded"
          style="max-width: 40rem; margin:auto; margin-top:30px;">
          <div class="card-body">
            <h4 id="notifecha" class="card-title" style="display:inline;"></h4> <br><br> 
            <p id="notinota" class="card-text"></p>
          </div>
        </div>
        <?php endforeach; ?>
    </div>
  </div>
  </center>
  <!-- Footer -->
  <footer class="page-footer font-small pt-4 border-top border-primary">
    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">
      <!-- Grid row -->
      <div class="row">
        <!-- Grid column -->
        <div class="col-md-6 mt-md-0 mt-3">
          <h5 class="text-uppercase">Estamos a su disposición</h5>
          <p>Visite nuestras redes para ver las respuestas a las preguntas más frecuentes o póngase en contacto con
            nosotros.</p>
        </div>
        <!-- Grid column -->
        <hr class="clearfix w-100 d-md-none pb-3">
        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">
          <!-- Links -->
          <h5 class="text-uppercase">Nosotros</h5>
          <ul class="list-unstyled">
            <li>
              <a href="#!" style="color:black">Acerca de</a>
            </li>
            <li>
              <a href="#!" style="color:black">Seguridad</a>
            </li>
            <li>
              <a href="#!" style="color:black">Cookies</a>
            </li>
            <li>
              <a href="#!" style="color:black">Política de privacidad</a>
            </li>
          </ul>

        </div>
        <!-- Grid column -->
        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">
          <!-- Links -->
          <h5 class="text-uppercase">Redes Sociales</h5>
          <ul class="list-unstyled">
            <li>
              <a href="#!" style="color:black">Facebook</a>
            </li>
            <li>
              <a href="#!" style="color:black">Twitter</a>
            </li>
            <li>
              <a href="#!" style="color:black">Linkedin</a>
            </li>
            <li>
              <a href="#!" style="color:black">Youtube</a>
            </li>
          </ul>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
    <!-- Footer Links -->
    <!-- Copyright -->
  </footer>
  <div class="footer-copyright text-center py-3 bg-primary">© 2023 Copyright:
    <a href="#!" style="color:black"> ISOF 6to Semestre</a>
  </div>
  <!-- Copyright -->

  <!-- Footer -->
  <!-- Conexion de librerias de JavaScript y bootstrap -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
  <script src="ajax.js"></script> 
</body>

</html>