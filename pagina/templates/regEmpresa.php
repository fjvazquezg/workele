<?php
error_reporting(0);
session_start();
include '../google-api/redirect.php';
$_SESSION['rol'] = 1;

if ($_SESSION['cuenta']) {
  $correo = $_SESSION['cuenta'];
}

//print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro Usuario</title>
  <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/css/styles.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/inactividad.js"></script>
  
</head>

<body style="background-color: #F8F6F3;">
  <p>
    <?php $_SESSION['rol'] ?>
  </p>
  <!-- Conexion a un archivo javascript -->
  <script src="../js/curp.js"></script>

  <div class="container-fluid">
    <!-- Form para el registrod de usuarios -->
    <form method="POST" id="miFormulario">
      <!-- Card del registro de usuarios -->
      <div class="card shadow mb-3" style="max-width: 50rem; margin:auto; margin-top:30px; border-radius:25px;">
        <div class="card-header text-center bg-primary" style="border-top-left-radius:25px;border-top-right-radius:25px;">
          <!-- Header para empresa -->
          <h4 class="text-white">REGISTRO DE NUEVA EMPRESA</h4>
        </div>
        <div class="card-body">
          <label class="text-primary">Los campos marcados con asterisco (*) son obligatorios</label><br>

          <!-- Campos para empresa -->
          <div class="form-floating mb-3 mt-4">
            <input class="form-control" type="text" name="txt_razon" class="texto" id="razon" placeholder="Ingresa el Nombre de la Empresa" required="true">
            <label for="floatingInput">Razón Social *</label>
          </div>
          <div class="mb-3 mt-4">
            <label for="formFile" class="text-primary">Seleccionar Imagen de Perfil *</label><br>
            <label for="formFile" class="text-primary" style="font-size: small;">GIF, JPG, JPEG y PNG</label>
            <input class="form-control" type="file" name="txtruta" id="txtruta">
          </div>
          <div class="mb-3 mt-4">
            <label for="formFile" class="text-primary">Seleccionar archivo de constancia de situacion fiscal *</label><br>
            <label for="formFile" class="text-primary" style="font-size: small;">JPG, JPEG, PNG y PDF</label>
            <input class="form-control" type="file" name="txtcons" id="txtcons"><br>
          </div>
          <div class="form-floating mb-3">
            <input class="form-control" type="email" name="txt_CORREO" class="texto" id="correo" placeholder="Ejemplo@dominio.com" pattern=".+.com" maxlength="100" required value="<?php if ($correo != "") {
              echo $correo;
            } ?>"><br>
            <label for="floatingInput">Correo Electronico *</label>
          </div>
          <div class="form-row mb-3" id="password_div">
            <div class="form-group col-md-6">
              <div class="form-floating" style="height: 4rem;">
                <input oninput="verificarContrasenas()" onfocus="display_passwordrules()" pattern="(?=.*\d)(?=.*[A-Z]).{8,}" class="form-control validate password" type="password" name="txt_PASSWORD" class="texto" minlength="8" id="txt_PASSWORD" maxLength="30" placeholder="Escriba la Contraseña" required="true"><br>
                <label class="d-inline">Contraseña *</label><br>
              </div>
              <span class="password-toggle-icon"><i class="fas fa-eye"></i></span>
            </div>
            <div class="form-group col-md-6">
              <div class="form-floating" style="height: 4rem;">
                <input oninput="verificarContrasenas()" onfocus="display_passwordrules()" class="form-control" type="password" name="txt_PASSWORD2" class="texto validate passwordConfirm" minlength="8" id="txt_PASSWORD2" maxLength="30" placeholder="Confirme la Contraseña" required="true"><br>
                <label>Confirme Contraseña *</label><br>
              </div>
            </div>
          </div>
          <div id="password_rules" style="display: none;">
            <label>Las contraseñas deben cumplir estos requisitos:</label>
            <ul>
              <li class="password_length incomplete">Contener al menos 8 carácteres</li>
              <li class="password_uppercase incomplete">Al menos 1 letra mayuscula</li>
              <li class="password_number incomplete">Al menos 1 numero</li>
              <li class="password_match incomplete">Las contraseñas deben coincidir</li>
            </ul>
          </div>
          <div class="form-row">
            <div class="form-group col">
              <div class="form-floating" style="height: 4rem;">
                <select class="form-select" name="cmb_REGION" id="region" style="width: 100%;">
                  <option value="52">México</option>
                  <option value="54">Argentina</option>
                  <option value="591">Bolivia</option>
                  <option value="55">Brasil</option>
                  <option value="56">Chile</option>
                  <option value="57">Colombia</option>
                  <option value="506">Costa Rica</option>
                  <option value="53">Cuba</option>
                  <option value="593">Ecuador</option>
                  <option value="503">El Salvador</option>
                  <option value="1473">Granada</option>
                  <option value="502">Guatemala</option>
                  <option value="592">Guayana</option>
                  <option value="509">Haití</option>
                  <option value="504">Honduras</option>
                  <option value="1876">Jamaica</option>
                  <option value="505">Nicaragua</option>
                  <option value="507">Panamá</option>
                  <option value="595">Paraguay</option>
                  <option value="51">Perú</option>
                  <option value="1">Puerto Rico</option>
                  <option value="1809">República Dominicana</option>
                  <option value="597">Surinam</option>
                  <option value="598">Uruguay</option>
                  <option value="58">Venezuela</option>
                </select>
                <label class="form_label">Region *</label>
              </div>
            </div>
            <div class="form-group col">
              <div class="form-floating" style="height: 4rem;">
                <input class="form-control" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="txt_TELEFONO" class="texto" id="telefono" minlength="10" maxLength="10" placeholder="Escriba su Número" required="true"><br>
                <label>Telefono *</label><br>
              </div>
            </div>
          </div>
          <div class="form-floating mb-3 mt-4">
            <input class="form-control" type="text" name="txt_DOMICILIO" class="texto" id="domicilio" placeholder="Escriba su Domicilio" required="true"><br>
            <label>Domicilio *</label><br>
          </div>
          <div class="container text-center mt-4">
            <input class="btn btn-primary" type="submit" value="Guardar" id="miBoton">
            <button type="button" class="btn btn-secondary" onclick="location.href='login.php?xd=1'">Volver</button>
          </div>
        </div>
      </div>
    </form>
  </div>

  <!-- Conexion de librerias de JavaScript y bootstrap -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>

  <script src="../js/password.js"></script>
  <script src="../js/registro.js"></script>
</body>

</html>

<?php

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "db_web";

// Verificar si se envió el formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $correo = $_POST["txt_correo"];

    // Generar un token de verificación único
    $token = random(1000,9999);

    // Enviar el correo electrónico con el token de verificación
    $sql = "INSERT INTO tbl_usuario (correo, token) VALUES ('$correo', '$token')";
    if ($conn->query($sql) == TRUE) {

        // Enviar el correo electrónico con el token de verificación
        $para = $correo;
        $titulo = 'Token de verificación';
        $mensaje = 'Tu token de verificación es: ' . $token;
        $cabeceras = 'From: kevin.vall328@gmail.com';
    
        if (mail($para, $titulo, $mensaje, $cabeceras)) {
            echo "Se ha enviado un correo electrónico con el token de verificación.";
        } else {
            echo "Error al enviar el correo electrónico.";
        }
    } else {
        echo "Error al registrar el usuario: " . $conn->error;
    }
    
}
?>
