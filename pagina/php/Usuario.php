<?php
error_reporting(0);
session_start();
include ('../clases/save.class.php');
include ('../clases/function.class.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use function PHPSTORM_META\type;

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
//require '..\google-api\vendor\autoload.php';
require '../google-api/vendor/autoload.php';

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
$nuevoUsuario = Save::singleton_guardar();
$_findUser = Functions::singleton_functions();
$_compCorreo = Functions::singleton_functions();
$irol = $_SESSION['rol'];
//print_r($_SESSION);
function enviarCorreo($destinatario, $asunto, $mensaje) {
  $mail = new PHPMailer(true); // Inicializar PHPMailer con excepciones activadas

  try {
      // Configurar el servidor SMTP y las credenciales
      $mail->isSMTP();
      $mail->Host = 'mail.workele.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'no-reply@workele.com';
      $mail->Password = 'i7OTm-M6usi]';
      $mail->SMTPSecure = 'ssl'; // O 'ssl' si es necesario
      $mail->Port = 465; // Puerto SMTP

      // Configurar remitente y destinatario
      $mail->setFrom('no-reply@workele.com', 'Equipo workele');
      $mail->addAddress($destinatario);

      // Configurar el contenido del correo
      $mail->isHTML(true); // Habilitar el formato HTML
      $mail->Subject = $asunto;
      $mail->Body = $mensaje;
      $mail->addEmbeddedImage('../../assets/images/Workele.png', 'image_workele');
      // Enviar el correo
      $mail->send();
      //echo "El correo se ha enviado correctamente.";
  } catch (Exception $e) {
    //  echo "Hubo un error al enviar el correo: {$mail->ErrorInfo}";
  }
}
function enviarCorreoverificacion($asunto, $mensaje) {
  $mail = new PHPMailer(true); // Inicializar PHPMailer con excepciones activadas

  try {
      // Configurar el servidor SMTP y las credenciales
      $mail->isSMTP();
      $mail->Host = 'mail.workele.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'no-reply@workele.com';
      $mail->Password = 'i7OTm-M6usi]';
      $mail->SMTPSecure = 'ssl'; // O 'ssl' si es necesario
      $mail->Port = 465; // Puerto SMTP

      // Configurar remitente y destinatario
      $mail->setFrom('no-reply@workele.com', 'Equipo workele');
      $mail->addAddress('verificacion.empresa@workele.com');

      // Configurar el contenido del correo
      $mail->isHTML(true); // Habilitar el formato HTML
      $mail->Subject = $asunto;
      $mail->Body = $mensaje;
      $mail->addEmbeddedImage('../../assets/images/Workele.png', 'image_workele');
      // Enviar el correo
      $mail->send();
      //echo "El correo se ha enviado correctamente.";
  } catch (Exception $e) {
    //  echo "Hubo un error al enviar el correo: {$mail->ErrorInfo}";
  }
}
// Comprobación de que los campos de contraseña NO estén vacíos
if (isset($_POST['txt_PASSWORD']) && (isset($_POST['txt_PASSWORD2']))) {

  if (isset($_FILES['txtruta']['type'])) {
    $_ruta = $_FILES['txtruta'];
  }
  $_cons = $_FILES['txtcons'];

  // Comprobación de que las contraseñas NO sean distintas
  if ($_POST['txt_PASSWORD'] != $_POST['txt_PASSWORD2']) {

    // Alerta cuando las contraseñas NO coincidan.
    echo "errorPassword";
    return;

  } else {
    
    // Comprobación de que la Empresa no llegue con la imagen vacía
    if ($irol == 1 && $_ruta['type'] == null) {
      
      // Alerta cuando la imagen llega vacía con el rol Empresa
      echo "errorImagenEmpresa";
      return;

    } else if ($irol == 1 && $_ruta['type'] == null) {

      // Alerta cuando la constancia llega vacía
      echo "errorConstancia";
      return;

    } else {

      //Asignamos variables con los datos del Usuario
      $f_id_usuario = $_findUser->consec_usuario();
      $_nombre = $_POST['txt_NOMBRE'];
      $_apellido = $_POST['txt_APELLIDOS'];
      $_correo = $_POST['txt_CORREO'];
      $_fecha_nac = $_POST['dateFECHA'];
      $_no_identificacion = $_POST['txt_CURP'];
      $_password = $_POST['txt_PASSWORD'];
      $_sexo = $_POST['cmb_SEXO'];
      $_region = $_POST['cmb_REGION'];
      $_telefono = $_POST['txt_TELEFONO'];
      $_domicilio = $_POST['txt_DOMICILIO'];
      $_razon = $_POST['txt_razon'];
      $_universidad = $_POST['txt_UNIVERSIDAD'];
      $_carrera = $_POST['txt_CARRERA'];
      $_ingreso = $_POST['txt_INGRESO'];
      
      //Asignamos el estatus default
      $_status = 0;

      //Generamos el Token para la verificación
      $_token = rand(1000, 9999);
      $nombreUsuario = $_razon;
      $correoUsuario = $_correo;

      // Guardar el usuario en la base de datos (simulado)
      // ...

      // Llamar a la función enviarCorreo después de guardar al usuario
      $verificationLink = "http://workele.com/site/pagina/templates/verifica.php";

      $asuntoCorreo = "Bienvenido a nuestra plataforma";
      $mensajeCorreo = '
      <!DOCTYPE html>
      <html lang="es">
      <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Correo de ejemplo</title>
      </head>
      <body>
      <div class="mx-auto" style="width: 200px;">
        <img src="cid:image_workele" alt="" style="width: 300px; height: 180;">
      </div>
      <h1>Hola, ' . $_razon . '!</h1>
          <p>Este es un correo de verificacion</p>
          <p>para verificar el registro de tu empresa da click en el enlace que esta en el presente correo</p>
          <p>enlace de verificacion, ' . $verificationLink . '!</p>
          <h2>ingrese el siguiente codigo de verificacion donde lo indica la pagina: ' . $_token . '</h2>
          <p>favor de no contestar este correo, fue enviado automaticamente</p>
      </body>
      </html>
      ';
      $asuntoVerificacion = "se ha agregado una nueva empresa a la plataforma";
      $mensajeCorreoVerificacion = '
      <!DOCTYPE html>
      <html lang="es">
      <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Correo de ejemplo</title>
      </head>
      <body>
      <div class="mx-auto" style="width: 200px;">
        <img src="cid:image_workele" alt="" style="width: 300px; height: 180;">
      </div>
      <h1>Hola equipo workele, !</h1>
          <p>Este es un correo de verificacion se agregado la siguiente empresa ' . $_razon . '</p>
          <p>favor de verificar los datos para que todo este en orden</p>
      </body>
      </html>
      '; 


      //Obtenemos algunos datos necesarios sobre el archivo de la imagen
      $imgTipo = $_FILES['txtruta']['type'];
      $arrayImgExt = explode('/', $imgTipo);
      $imgExt = $arrayImgExt[1];
      $imgName = 'pfp_' . $f_id_usuario . '.' . $imgExt;
      $tamano = $_FILES['txtruta']['size'];
      $temp = $_FILES['txtruta']['tmp_name'];
      $ruta_img = '../userfiles/img/' . $imgName;

      //Obtenemos algunos datos necesarios sobre el archivo de la constancia
      $conTipo = $_FILES['txtcons']['type'];
      $arrayConExt = explode('/', $conTipo);
      $conExt = $arrayConExt[1];
      $conName = 'csf_' . $f_id_usuario . '.' . $conExt;
      $tamanoCons = $_FILES['txtcons']['size'];
      $tempCons = $_FILES['txtcons']['tmp_name'];
      $ruta_pdf = '../userfiles/pdf/' . $conName;

      //Llamamos la función para confirmar que el correo NO esté registrado
      $comp_correo = $_compCorreo->buscar_correo($_correo);

      if ($comp_correo == 0) {

        if ($_ruta['type'] != null) {

          //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
          if (!((strpos($imgTipo, "gif") || strpos($imgTipo, "jpeg") || strpos($imgTipo, "jpg") || strpos($imgTipo, "png") || strpos($imgTipo, "bmp") || strpos($imgTipo, "tiff") || strpos($imgTipo, "webp") || strpos($imgTipo, "svg") || strpos($imgTipo, "raw") || strpos($imgTipo, "psd") || strpos($imgTipo, "ai") || strpos($imgTipo, "eps") || strpos($imgTipo, "pdf") || strpos($imgTipo, "ico") || strpos($imgTipo, "tga") || strpos($imgTipo, "pict") || strpos($imgTipo, "exif") || strpos($imgTipo, "heif") || strpos($imgTipo, "heic") || strpos($imgTipo, "avif") || strpos($imgTipo, "pbm") || strpos($imgTipo, "pgm") || strpos($imgTipo, "ppm") || strpos($imgTipo, "xcf") || strpos($imgTipo, "arw") || strpos($imgTipo, "cr2") || strpos($imgTipo, "nef") || strpos($imgTipo, "orf") || strpos($imgTipo, "rw2") || strpos($imgTipo, "dng") || strpos($imgTipo, "crw") || strpos($imgTipo, "srw") || strpos($imgTipo, "raf") || strpos($imgTipo, "mrw") || strpos($imgTipo, "erf") || strpos($imgTipo, "kdc") || strpos($imgTipo, "mos") || strpos($imgTipo, "nrw") || strpos($imgTipo, "obm") || strpos($imgTipo, "pef") || strpos($imgTipo, "x3f") || strpos($imgTipo, "rawzor") || strpos($imgTipo, "pxr") || strpos($imgTipo, "srf") || strpos($imgTipo, "3fr") || strpos($imgTipo, "qtk") || strpos($imgTipo, "rwz") || strpos($imgTipo, "xbm") || strpos($imgTipo, "wdp") || strpos($imgTipo, "hdp") || strpos($imgTipo, "ktx") || strpos($imgTipo, "kro") || strpos($imgTipo, "hdr") || strpos($imgTipo, "jxr") || strpos($imgTipo, "apng") || strpos($imgTipo, "jp2") || strpos($imgTipo, "jls") || strpos($imgTipo, "jpf") || strpos($imgTipo, "jpm") || strpos($imgTipo, "jpx") || strpos($imgTipo, "bpg") || strpos($imgTipo, "flif")) && ($tamano < 2000000))) {
            
            //Alerta cuando la imagen NO es valida
            echo "errorImagen";
            return;

          } else {
            //Si la imagen es correcta en tamaño y tipo
            //Se intenta subir al servidor
            if (move_uploaded_file($temp, '../userfiles/img/' . $imgName)) {
              //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
              chmod('../userfiles/img/' . $imgName, 0777);
              //Mostramos el mensaje de que se ha subido con éxito
              //echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
              //Mostramos la imagen subida
              //echo '<p><img src="assets/images/'.$archivo.'"></p>';
            } else {

              //Si no se ha podido subir la imagen, mostramos un mensaje de error
              echo "errorImagenServer";
              return;
            }
          }
        }

        if ($_cons['type'] != null && $irol == 1) {
          //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
          if (!((strpos($conTipo, "jpeg") || strpos($conTipo, "jpg") || strpos($conTipo, "png") || strpos($conTipo, "pdf")) && ($tamanoCons < 20000000))) {

            //Alerta si la constancia NO es valida
            echo "errorConstanciaTipoTamaño";
            return;

          } else {
            //Si la imagen es correcta en tamaño y tipo
            //Se intenta subir al servidor
            if (move_uploaded_file($tempCons, '../userfiles/pdf/' . $conName)) {
              //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
              chmod('../userfiles/pdf/' . $conName, 0777);
              //Mostramos el mensaje de que se ha subido con éxito
              //echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
              //Mostramos la imagen subida
              //echo '<p><img src="assets/images/'.$archivo.'"></p>';
            } else {
              
              //Si no se ha podido subir la imagen, mostramos un mensaje de error
              echo "errorConsServer";
              return;

            }
          }
        }

        //Valida el rol del usuario, si es diferente de Empresa, se asgigna el estatus en 1, sino queda en 0
        if($irol != 1) {
          
          //Asignacion del estatus en 1 para el Usuario/Estudiante
          $_status = 1;

          //Validacion de la diferencia de edad entre la fecha actual y la de nacimiento del Usuario/Estudiante
          $fecha_actual = new DateTime(); // Fecha actual
          $fecha_de_nacimiento = new DateTime($_fecha_nac);
          $edad = $fecha_actual->diff($fecha_de_nacimiento); // Diferencia entre fechas

          // Verificar si el usuario tiene 18 años o más
          if ($edad->y < 18) {

            //Alerta si el Usuario/Estudiante NO es mayor de edad
            echo "errorEdad";
            return;

          }
        }

        //$f_id_usuario = $_findUser -> consec_usuario();
        
        //Guardamos a los usuarios Nuevos
        $newuser = $nuevoUsuario->guardar_usuario($f_id_usuario, $_nombre, $_apellido, $_correo, $_fecha_nac, $_no_identificacion, $_password, $_sexo, $_region, $_telefono, $_domicilio, $irol, $_status, $ruta_img, $ruta_pdf, $_razon, $_token, $_universidad, $_carrera, $_ingreso);
        if($newuser==true){
          if($irol==1){
             enviarCorreo($correoUsuario, $asuntoCorreo, $mensajeCorreo);
             enviarCorreoverificacion($asuntoVerificacion,$mensajeCorreoVerificacion);
           }
           else{
            enviarCorreo($correoUsuario, $asuntoCorreo, $mensajeCorreo);
           }
        }
      } else {

        //Alerta si el Correo está registrado en la base de datos
        echo "errorCorreoDuplicado";

      }

    }

    if ($newuser == true) {
      if ($irol == 1) {
        echo "true1";
        return;
      } else if ($irol == 2) {
        echo "true2";
        return;
      } else if ($irol == 4) {
        echo "true4";
        return;
      }
    }
  }
}
$irol = $_SESSION['rol'];
?>