<?php
require_once 'conf.php';
session_start();
 
// autenticación de Google OAuth Flow 
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);
  
  // obtencion de la informacion del perfil
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->given_name;
  $lastname = $google_account_info->family_name;
 
  $_SESSION['cuenta'] = $email;
  $_SESSION['nombre'] = $name;
  $_SESSION['apellido'] = $lastname;
  
} 

//else {
  
    //$reedireccion = '"'.$client->createAuthUrl().'"';

    //header("Location: $reedireccion");

  //echo "
   // <a id='enlace' href='".$client->createAuthUrl()."'>Google Login</a>
   // <script>
   // var enlace = document.getElementById('enlace');
   // enlace.click();
   // </script>
   // ";
//}
?>